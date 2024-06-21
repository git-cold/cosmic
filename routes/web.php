<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [\App\Http\Controllers\Client\LastProductHome::class, 'index'])->name('home');


//Authentication
Route::get('/login', [\App\Http\Controllers\auth\Authentification::class, 'login'])->name('auth.login');
Route::post('/login', [\App\Http\Controllers\auth\Authentification::class, 'verify_login']);
Route::delete('/logout', [\App\Http\Controllers\auth\Authentification::class, 'logout'])->name('auth.logout');


Route::get('/register', [\App\Http\Controllers\auth\Register::class, 'register'])->name('register');
Route::post('/register', [\App\Http\Controllers\auth\Register::class, 'verify_register']);

//Article
Route::get('/product/addPanier/{product}/{quantity}', [\App\Http\Controllers\Client\Product::class, 'addpanier']);
Route::get('/product/{article:nom}', [\App\Http\Controllers\Client\Product::class, 'index'])->name("article");

//Panier

Route::post('/panier/{panier}/diminue/{article}', [\App\Http\Controllers\Client\GerePanier::class, 'diminue']);
Route::post('/panier/{panier}/augmente/{article}', [\App\Http\Controllers\Client\GerePanier::class, 'augmente']);
Route::get('/panier/{panier}/supprime/{article}', [\App\Http\Controllers\Client\GerePanier::class, 'supprime']);
Route::get('/panier/{panier}', [\App\Http\Controllers\Client\GerePanier::class, 'index'])->name("panier");


//Administration
Route::get('/admin', "App\\Http\\Controllers\\Admin\\GestionStock@index")->name("voir_produit");
Route::get('/ModifierProduit/{id}','App\Http\Controllers\Admin\GestionStock@editArticle');
Route::put('/GestionStock/updateArticle', 'App\Http\Controllers\Admin\GestionStock@updateArticle');
Route::get('/DeleteProduit/{id}','App\Http\Controllers\Admin\GestionStock@deleteArticle');
Route::get('/GestionStock/addArticle','App\Http\Controllers\Admin\GestionStock@addArticle');


//Categorie
Route::match(['get', 'post'],'/categorie/{cat}', [\App\Http\Controllers\Client\GereCategories::class, 'index'])->name("cat");

//navbar
//NousContacter
Route::get('/nousContacter', 'App\Http\Controllers\Navbar@nousContacter')->name("nousContacter");
Route::get('/Navbar/envoieEmail','App\Http\Controllers\Navbar@retourEmail');
//Apropos
Route::get('/aPropos', 'App\Http\Controllers\Navbar@aPropos');
//TousLesProduit
Route::match(['get', 'post'], '/tousProduits', 'App\Http\Controllers\Navbar@allProducts')->name('allProducts');

//NouveauxProduit
Route::match(['get', 'post'], '/nouveauxProduits', 'App\Http\Controllers\Navbar@newProducts')->name('newProducts');


//monCompte
Route::get('/monCompte', [\App\Http\Controllers\Client\MonCompteController::class, 'index'])->name('monCompte');
Route::post('/modifierCompte', [\App\Http\Controllers\Client\MonCompteController::class, 'modifierCompte'])->name('modifierCompte');


//commande
Route::post('/commande/paiement', [\App\Http\Controllers\Client\GereCommande::class, 'paiement']);
Route::get('/commande/livraison', [\App\Http\Controllers\Client\GereCommande::class, 'livraison'])->name('livraison');
Route::get('/commande/validation/{commande}', [\App\Http\Controllers\Client\GereCommande::class, 'commandeValidee']);
