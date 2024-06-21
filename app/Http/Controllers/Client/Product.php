<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\articleDansPanier;
use App\Models\Panier;
use Illuminate\Support\Facades\Session;

class Product extends Controller
{
    function index(Article $article){
        /*
         * Renvoie la page article
         */
        return view("article")->with("product",$article);
}


    function addpanier(Article $product, $quantity) {
        /*
         * Ajoute quantity exemplaires de cet article au panier
         */
        $panier = Session::get('panier');
        // Si l'article n'est pas déjà dans le panier, ajout dans celui-ci
        if (!articleDansPanier::where([['panierID',$panier->id],['articleID',$product->id]])->exists()){
            $adp = new articleDansPanier;
            $adp->insert_or_update(array("articleID"=>$product->id,"panierID"=>$panier->id,"quantite"=>intval($quantity)));
        // Sinon, modification de la quantite de cet article dans le panier
        }else{
            articleDansPanier::where([['panierID',$panier->id],['articleID',$product->id]])->increment('quantite', intval($quantity));
        }

        // MAJ les données du panier
        $panier->increment('nbArticle', intval($quantity));
        $panier->insert_or_update(array("prixTotal"=> $panier->prixTotal + $product->prix*(100-$product->tauxRemise)/100));

        return redirect()->route("article" ,["article"=>$product->nom]);
    }
}
