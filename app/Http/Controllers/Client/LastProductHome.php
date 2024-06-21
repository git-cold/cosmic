<?php

namespace App\Http\Controllers\Client;

use App\Models\Categorie;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Http\Controllers\Controller;


class LastProductHome extends Controller
{
    public function index() {
        /*
         * Donne les 4 derniers articles créés, peut en donner moins
         * Renvoie la page d'accueil
         */
        $articles = Article::latest()->take(4)->get();
        $categories = Categorie::all();
        return view('cosmicHome', compact('articles','categories'));
    }
}
