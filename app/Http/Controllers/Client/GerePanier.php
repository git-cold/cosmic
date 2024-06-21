<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\articleDansPanier;
use App\Models\Panier;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;

class GerePanier extends Controller
{
    function index(Panier $panier) {
        /*
         * Renvoie la page panier si l'utilisateur connecté est un client et que c'est bien son panier
         * Sinon renvoie la page de connexion
         */
        if (session('user_status') == "client" && Session::get("panier")->id == $panier->id) {

            // Donne chaque articleDansPanier et l'article qui lui est associé
            $adp = articleDansPanier::where("panierId",$panier->id)->get();
            $articles = array();
            foreach ($adp as $art){
                $article = Article::find($art->articleID);
                // vérifie qu'il n'y avait pas plus d'exemplaires d'un article dans le panier qu'en stock
                if ($art->quantite > $article->qteStock){
                    // met la quantite dans le panier a la quantite du stock
                    $art->insert_or_update(array("quantite"=>$article->qteStock));
                }
                array_push($articles, array($article,$art));
            }

            return view("panier")->with("articles",$articles);
        }
        return redirect()->intended(route("auth.login"));

    }


    function diminue(int $p, int $a){
        /*
         * Reduit la quantité d'un article dans le panier
         */
        if (session('user_status') == "client" && Session::get("panier")->id == $p) {
            $article = Article::find($a);
            $panier = Panier::find($p);
            articleDansPanier::where([['panierID',$panier->id],['articleID',$article->id]])->decrement('quantite');

            //actualise le prix et le nombre d'articles du panier
            $panier::decrement('nbArticle');
            $panier->insert_or_update(array("prixTotal"=> $panier->prixTotal - $article->prix*(100-$article->tauxRemise)/100));
            return redirect()->route("panier" ,["panier"=>$panier]);
        }
        return redirect()->intended(route("auth.login"));

    }


    function augmente(int $p, int $a){
        /*
        * Augmente la quantité d'un article dans le panier
        */
        if (session('user_status') == "client" && Session::get("panier")->id == $p) {
            $article = Article::find($a);
            $panier = Panier::find($p);
            articleDansPanier::where([['panierID',$panier->id],['articleID',$article->id]])->increment('quantite');

            //actualise le prix et le nombre d'articles du panier
            $panier::increment('nbArticle');
            $panier->insert_or_update(array("prixTotal"=> $panier->prixTotal + $article->prix*(100-$article->tauxRemise)/100));
            return redirect()->route("panier" ,["panier"=>$panier]);
        }
        return redirect()->intended(route("auth.login"));

    }


    function supprime(int $p, int $a){
        /*
         * Supprime un article du panier
         */
        if (session('user_status') == "client" && Session::get("panier")->id == $p) {
            $article = Article::find($a);
            $panier = Panier::find($p);
            $adp = articleDansPanier::where([['panierID',$panier->id],['articleID',$article->id]]);
            $z = $adp->get();

            //actualise le prix et le nombre d'articles du panier
            $panier->insert_or_update(array("prixTotal"=> $panier->prixTotal - $article->prix*(100-$article->tauxRemise)/100*$z[0]->quantite,
                "nbArticle"=>$panier->nbArticle - $z[0]->quantite));

            $adp->delete();
            return redirect()->route("panier" ,["panier"=>$panier]);
        }
        return redirect()->intended(route("auth.login"));

    }

}
