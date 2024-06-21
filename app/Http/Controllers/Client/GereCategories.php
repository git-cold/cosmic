<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Categorie;
use Illuminate\Http\Request;

class GereCategories extends Controller
{
    function index(Categorie $cat,Request $request) {
        /*
         * Renvoie une page avec tous les articles selon les filtres entrés
        */
        $minPrice = $request->input('minPrice', 0);
        $maxPrice = $request->input('maxPrice', PHP_INT_MAX);
        $selectedMaterials = $request->input('materiaux');
        $selectedColor = $request->input('couleur');
        // Donne tous les articles qui correspondent à la catégorie et qui ont encore du stock
        $articles = Article::where([['catID',$cat->id],['qteStock','>',0]])->get();

        // Filtre les articles entre le prix minimum et le prix maximum entrés
        if ($minPrice !== 0 || $maxPrice !== PHP_INT_MAX) {
            $articles = $articles->whereBetween('prix', [$minPrice, $maxPrice]);
        }

        // Si des matériaux sont sélectionnés, filtre les articles
        if (!empty($selectedMaterials)) {
            $articles = $articles->whereIn('materiauxFiltre', $selectedMaterials);
        }

        // Si des couleurs sont sélectionnées, filtrer les articles
        if (!empty($selectedColor)){
            $articles = $articles->whereIn('couleurFiltre',$selectedColor);
        }

        if ($request->isMethod('post')) {
            return redirect()->route('cat', [
                'cat' => $cat->id,
                'minPrice' => $minPrice,
                'maxPrice' => $maxPrice,
                'materiaux' => $selectedMaterials,
                'couleur' => $selectedColor,
            ]);
        }
        return view("categories",compact('articles','cat'));
    }
}
