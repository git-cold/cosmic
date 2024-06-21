<?php

namespace App\Models;

class Article extends ModelInsertUpdate
{
    protected $fillable = ['nom', 'prix', 'qteStock', 'tauxRemise', 'articleImg', 'artDescr', 'color1', 'color2', 'materiaux', 'accroche', 'style','couleurFiltre','materiauxFiltre', 'catID'];

    public function insert_or_update(array $tab, array|null $tab2 = null)
    {
        parent::insert_or_update($tab);
    }
}
