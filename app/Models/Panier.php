<?php

namespace App\Models;

class Panier extends ModelInsertUpdate
{
    protected $fillable = ['nbArticle','prixTotal'];


    public function insert_or_update(array $tab, array|null $tab2 = null)
    {
        parent::insert_or_update($tab);
    }

}
