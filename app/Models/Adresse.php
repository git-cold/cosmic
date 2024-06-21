<?php

namespace App\Models;


class Adresse extends ModelInsertUpdate
{
    protected $fillable = ['codePostal','ville','pays','rue','numero'];

    public function insert_or_update(array $tab, array|null $tab2 = null)
    {
        parent::insert_or_update($tab);
    }
}
