<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Adresse;
use App\Models\Article;
use App\Models\articleDansPanier;
use App\Models\Client;
use App\Models\Commmande;
use App\Models\EtatCommande;
use App\Models\Livraison;
use App\Models\Panier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class GereCommande extends Controller
{
    function paiement(Request $request)
    {
        /*
         * Crée une commande avec les données en entrée et renvoie la page de paiement avec le prix final comprenant la livraison
         */
        $adresse = $this->gereAdresse($request);
        $liv =$request->input("liv");
        $panier = Session::get("panier")->id;
        $commande = Commmande::where("panierID",$panier)->first();
        if (!$commande) {
            $commande = new Commmande;
        }
        $commande->insert_or_update(array("panierID"=>$panier,"ClientID"=>Session::get("client")->id,"adresseID"=>$adresse->id,"livID"=>$liv,"etatCommandeID"=>1));
        $prix_final = $commande->calcul_prix_final();
        return view('paiement',compact('commande','prix_final'));
    }

    function livraison()
    {
        /*
         * Renvoie la page de livraison avec les différents types de livraion disponibles
         * Et l'adresse du client qui pourra être utilisée
         */
        $liv = Livraison::all();
        $client = Session::get("client");
        $adresse = Adresse::find($client->adresseId);
        return view('livraison',compact('liv','adresse'));
    }

    private function gereAdresse(Request $request)
    {
        /*
         * Fait la gestion de l'adresse en fonction des données entrées
         * Renvoie l'adresse
         */
        $ville = $request['ville'];
        $pays = $request['pays'];
        $codePostal = $request['codePostal'];
        $rue = $request['rue'] ;
        $numero = $request['numero'];

        // Prend l'adresse si elle existe déjà, null sinon
        $adresse = Adresse::where([
        'ville' => $ville,
        'codepostal' => $codePostal,
        'numero' => $numero,
        'pays' => $pays,
        'rue' => $rue,
        ])->first();

        // Si elle n'existe pas encore, crée une adresse
        if ($adresse == null)
        {
            $adresse = new Adresse;
            $adresse->insert_or_update(array( 'ville' => $ville,
                    'codepostal' => $codePostal,
                    'numero' => $numero,
                    'pays' => $pays,
                    'rue' => $rue)
            );
        }

        // Si la checkbox a été check, l'adresse est enregistrée dans le compte du client
        if ($request->has("check"))
        {
            $client = Session::get("client");
            $client->insert_or_update(array("adresseId"=>$adresse->id));
        }
        return $adresse;
    }

    function commandeValidee(Commmande $commande)
    {
        /*
         * MAJ de l'état de la commande, de la quantité en stock et du panier
         */
        $etatcommande = EtatCommande::find($commande->etatCommandeID);
        $etatcommande->insert_or_update(array("etatCommandeLib"=>2));
        $client = Session::get("client");
        $panier = Session::get("panier");
        $adp = articleDansPanier::where("panierID",$panier->id)->get();

        // MAJ la quantite dans le stock de chaque article
        foreach ($adp as $art){
            $article = Article::find($art->articleID);
            $article->insert_or_update(array("qteStock" => $article->qteStock-$art->quantite));
        }

        //crée le nouveau panier qui sera associé au client et qui sera dans la session
        $panier = new Panier;
        $panier->insert_or_update(array("nbArticle"=>0,"prixTotal"=>0.0));
        $client->insert_or_update(array("panierID"=>$panier->id));
        session(["panier"=>$panier]);

        return redirect()->intended(route('home'));
    }
}
