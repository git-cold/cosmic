<?php

namespace App\Models;

class LivraisonStandard extends TypeLivraison
{
    function calculPrix(int $nbArticle, float $prix)
    {
        return $prix + $this->add + $this->mult * $nbArticle;
    }
}
