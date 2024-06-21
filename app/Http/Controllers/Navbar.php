<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Mail\ContactUsMail;
use Illuminate\Support\Facades\Mail;


class Navbar extends Controller
{
    public function nousContacter(){
        /*
         * Renvoie la page NousContacter
         */
        return view('nousContacter');
    }

    public function retourEmail(Request $request)
    {
        /*
         * Renvoie la page notifiant que le mail a été envoyé
         */
        $adresse = $request->input('adresse');
        return view('emailEnvoyer',compact('adresse'));

    }

    public function aPropos(){
        /*
         * Renvoie la page aPropos
         */
        return view('aPropos');
    }

    public function allProducts(Request $request)
    {
        /*
         * Renvoie tous les produits avec les filtres
         */
        $minPrice = $request->input('minPrice', 0);
        $maxPrice = $request->input('maxPrice', 4000);
        $selectedMaterials = $request->input('materiaux');
        $selectedColor = $request->input('couleur');
        $selectedCategorie = $request->input('categorie');
        $recherche = $request->input('search-bar');

        // Récupérez tous les articles pour l'affichage initial
        $articles = Article::query();

        // Si des filtres de prix sont définis, filtrez les articles
        if ($minPrice !== 0 || $maxPrice !== 4000) {
            $articles->whereBetween('prix', [$minPrice, $maxPrice]);
        }

        // Si des matériaux sont sélectionnés, filtrez les articles
        if (!empty($selectedMaterials)) {
            $articles->whereIn('materiauxFiltre', $selectedMaterials);
        }

        if (!empty($selectedColor)) {
            $articles->whereIn('couleurFiltre', $selectedColor);
        }

        if (!empty($selectedCategorie)) {
            $articles->whereIn('catID', $selectedCategorie);
        }

        // Si une recherche est effectuée, filtrez les articles par nom
        if (!empty($recherche)) {
            $articles->where('nom', 'like', '%' . $recherche . '%');
        }

        // Obtenez les résultats de la requête
        $articles = $articles->get();

        // Si la requête est de type POST, effectuez une redirection avec les données filtrées
        if ($request->isMethod('post')) {
            return redirect()->route('allProducts', [
                'minPrice' => $minPrice,
                'maxPrice' => $maxPrice,
                'materiaux' => $selectedMaterials,
                'couleur' => $selectedColor,
                'categorie' => $selectedCategorie,
                'search-bar' => $recherche
            ]);
        }

        // Retournez la vue avec les données
        return view('allProducts', compact('articles'));
    }


    public function newProducts(Request $request){
        /*
         * Renvoie la page des nouveaux produits avec les filtres
         */
        $minPrice = $request->input('minPrice', 0);
        $maxPrice = $request->input('maxPrice', PHP_INT_MAX);
        $selectedMaterials = $request->input('materiaux');
        $selectedColor = $request->input('couleur');
        $selectedCategorie = $request->input('categorie');
        $startDateTime = '2024-01-12 17:56:00';

        $articles = Article::latest()->take(4)->get();

        if ($minPrice !== 0 || $maxPrice !== PHP_INT_MAX) {
            $articles = $articles->whereBetween('prix', [$minPrice, $maxPrice]);
        }

        // Si des matériaux sont sélectionnés, filtrez les articles
        if (!empty($selectedMaterials)) {
            $articles = $articles->whereIn('materiauxFiltre', $selectedMaterials);
        }

        if (!empty($selectedColor)){
            $articles = $articles->whereIn('couleurFiltre',$selectedColor);
        }

        if (!empty($selectedCategorie)) {
            $articles = $articles->whereIn('catID',$selectedCategorie);
        }

        // Si la requête est de type POST, effectuez une redirection avec les données filtrées
        if ($request->isMethod('post')) {
            return redirect()->route('newProducts', [
                'minPrice' => $minPrice,
                'maxPrice' => $maxPrice,
                'materiaux' => $selectedMaterials,
                'couleur' => $selectedColor,
                'categorie' => $selectedCategorie
            ]);
        }
        return view('newProducts',compact('articles'));
    }
}
