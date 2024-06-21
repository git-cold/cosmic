<?php

namespace App\Models;


class Livraison extends ModelInsertUpdate
{
    public function insert_or_update(array $tab, ?array $tab2 = null)
    {
        parent::insert_or_update($tab, $tab2);
    }
    static function livraisonFactory(int $id) : TypeLivraison{
        /*
         * Crée une instance de TypeLivraison en fonction de l'id de Livraison
         */
        $liv = Livraison::find($id);
        switch ($liv->livraisonLib) {
            case "Magasin":
                return new LivraisonMagasin(array($liv->additionne,$liv->multiplie));
            case "Rapide":
                return new LivraisonRapide(array($liv->additionne,$liv->multiplie));
            default :
                return new LivraisonStandard(array($liv->additionne,$liv->multiplie));
        }
    }
}
