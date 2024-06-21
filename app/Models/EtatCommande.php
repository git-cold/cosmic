<?php

namespace App\Models;

class EtatCommande extends ModelInsertUpdate
{
    protected $fillable = ['etatCommandeLib'];


    public function insert_or_update(array $tab, array|null $tab2 = null)
    {
        parent::insert_or_update($tab);
    }
}
