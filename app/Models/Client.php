<?php

namespace App\Models;


use Illuminate\Support\Facades\Hash;

class Client extends ModelInsertUpdate
{
    protected $fillable = ['email', 'telephone', 'nom', 'prenom', 'panierID'];



    public function insert_or_update(array $tab, ?array $tab2 = null)
    {
        if ($tab2 != null) {
            //Créer un nouveau panier pour l'utilisateur
            $panier = new Panier;
            $panier->insert_or_update(array("nbArticle"=>0,"prixTotal"=> 0.0));

            // Créer une nouvelle adresse pour l'utilisateur
            $adresse = new Adresse;
            $adresse->insert_or_update($tab2);

            $tab["panierID"] = $panier->id;
            $tab["adresseId"] = $adresse->id;
        }
        parent::insert_or_update($tab);
    }
}
