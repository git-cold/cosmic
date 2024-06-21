<?php

namespace App\Models;

abstract class TypeLivraison
{
    protected float $add ;
    protected float $mult;
    public function __construct(array $attributes = [])
    {
        $this->add = $attributes[0];
        $this->mult = $attributes[1];
    }
    abstract function calculPrix(int $nbArticle, float $prix); // Calcule les frais de livraison
}
