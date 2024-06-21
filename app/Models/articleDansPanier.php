<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;

class articleDansPanier extends ModelInsertUpdate
{

    use HasFactory;
    protected $fillable = ["panierID","articleID","quantite"];

    public function insert_or_update(array $tab, array|null $tab2 = null)
    {
        parent::insert_or_update($tab);
    }
}
