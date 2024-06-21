<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

abstract class ModelInsertUpdate extends \Illuminate\Database\Eloquent\Model
{
    use HasFactory;
    public function insert_or_update(array $tab, array|null $tab2 = null){
        /*
         * Ajoute ou modifie dans la table en fonction des valeurs dans tab1,
         * Le tab2 n'est pas utilisé dans toutes les sous-classes, c'est pourquoi il est nullable
         */
        foreach ($tab as $key=>$value){
            $this->$key = $value;
        }
        $this->save();
    }
}
