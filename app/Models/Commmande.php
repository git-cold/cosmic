<?php

namespace App\Models;


use Illuminate\Support\Facades\Hash;

class Commmande extends ModelInsertUpdate
{
    protected $fillable = ['etatCommandeID','panierID'];
    private TypeLivraison $sysliv;

    protected $casts = [
        'clientID' => 'hashed',
        'adresseId' => 'hashed',
    ];
    public function insert_or_update(array $tab, array|null $tab2 = null)
    {
        parent::insert_or_update($tab);
        $this->sysliv = Livraison::livraisonFactory($this->livID);
    }

    public function calcul_prix_final() : float {
        /*
         * Calcule le prix final avec les frais de livraison
         */
        $panier = Panier::find($this->panierID);
        return $this->sysliv->calculPrix($panier->nbArticle,$panier->prixTotal);
    }

}
