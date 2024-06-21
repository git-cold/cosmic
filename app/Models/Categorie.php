<?php

namespace App\Models;


class Categorie extends ModelInsertUpdate
{
    protected $fillable = ["catLib","catDescription"];

    public function insert_or_update(array $tab, array|null $tab2 = null)
    {
        parent::insert_or_update($tab);
    }
}
