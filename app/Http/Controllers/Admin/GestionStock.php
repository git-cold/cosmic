<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use PHPUnit\Metadata\After;


class GestionStock extends Controller{
    public function index(){
        /*
            Renvoie la permettant de gérer les articles si l'utilisateur connecté est un admin
        */
        if (session('user_status') == "admin") {
            $articles = Article::all();     // donne tous les articles existant
            return view('gestionArticle',compact('articles'));
        }
        return redirect()->intended(route("home"));
    }

    public function addArticle(Request $request)
    {
        /*
         * Crée un article avec les données rentrées en paramètre si l'utilisateur connecté est un admin
        */
        if (session('user_status') == "admin") {
            // Validation des données (vous pouvez ajouter des règles de validation ici)
            $request->validate([
                'nom' => 'required|string',
                'prix' => 'required|numeric',
                'qteStock' => 'required|integer',
                'tauxRemise' => 'nullable|numeric',
                'articleImg' => 'required|string',
                'artDescr' => 'required|string',
                'color1' => 'required|string',
                'color2' => 'required|string',
                'materiaux' => 'required|string',
                'accroche' => 'required|string',
                'style' => 'required|string',
                'couleurFiltre' => 'required|string',
                'materiauxFiltre' => 'required|string',
                'catID' => 'required|integer'

            ]);

            // Créer un nouvel article en utilisant la méthode create du modèle
            $article = new Article;
            $article->insert_or_update(array("nom"=>request('nom'),
                    "prix"=>request('prix'),
                    "qteStock"=> request('qteStock'),
                    "tauxRemise"=> request('tauxRemise'),
                    "articleImg"=> request('articleImg'),
                    "artDescr"=> request('artDescr'),
                    "color1"=> request('color1'),
                    "color2"=>request('color2'),
                    "materiaux"=> request('materiaux'),
                    "accroche"=> request('accroche'),
                    "style"=> request('style'),
                    "catID"=>request('catID'),
                    "couleurFiltre" => request('couleurFiltre'),
                    'materiauxFiltre' => request('materiauxFiltre'))
            );


            // Rediriger vers la page d'administration
            return redirect()->route('voir_produit');
        }
        return redirect()->intended(route("home"));

    }

    public function editArticle(Request $request )
    {
        /*
         * Redirige vers la page de modification d'article avec l'article choisit
         * Si l'utilisateur est admin
         */
        if (session('user_status') == "admin") {
            $article = Article::find($request->id);
            return view('editArticle',compact('article'));
        }
        return redirect()->intended(route("home"));

    }



    public function updateArticle(Request $request)
    {
        /*
         * Met à jour les données de l'article
         * Si l'utilisateur est admin
         */
        if (session('user_status') == "admin") {
            // Validation des données entrées
            $request->validate([
                'nom' => 'required|string',
                'prix' => 'required|numeric',
                'qteStock' => 'required|integer',
                'tauxRemise' => 'nullable|numeric',
                'articleImg' => 'nullable|string',
                'artDescr' => 'nullable|string',
                'color1' => 'required|string',
                'color2' => 'nullable|string',
                'materiaux' => 'required|string',
                'accroche' => 'required|string',
                'style' => 'required|string',
                'couleurFiltre' => 'required|string',
                'materiauxFiltre' => 'required|string',
                'catID' => 'nullable|string',
            ]);

            // Modifie l'article
            $article = Article::find($request->id);
            $article->insert_or_update(array("nom"=>request('nom'),
                    "prix"=>request('prix'),
                    "qteStock"=> request('qteStock'),
                    "tauxRemise"=> request('tauxRemise'),
                    "articleImg"=> request('articleImg'),
                    "artDescr"=> request('artDescr'),
                    "color1"=> request('color1'),
                    "color2"=>request('color2'),
                    "materiaux"=> request('materiaux'),
                    "accroche"=> request('accroche'),
                    "style"=> request('style'),
                    "catID"=>request('catID'),
                    'materiauxFiltre' => request('materiauxFiltre'),
                    'couleurFiltre' =>request('couleurFiltre'))
            );

            // Rediriger vers la page d'administration
            return redirect()->route('voir_produit');
        }
        return redirect()->intended(route("home"));

    }

    public function deleteArticle(Request $request)
    {
        /*
         * Supprime l'article
         * Si l'utilisateur est admin
         */
        if (session('user_status') == "admin") {
            $article = Article::find($request->id);

            if (!$article) {
                // Article non trouvé, rediriger avec un message d'erreur par exemple
                return redirect()->route('voir_produit')->with('error', 'Article non trouvé');
            }
            $article->delete();

            // Rediriger vers la page d'administration
            return redirect()->route('voir_produit')->with('success', 'Article supprimé avec succès');
        }
        return redirect()->intended(route("home"));
    }
}
