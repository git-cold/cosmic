<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\Client;
use App\Models\Panier;
use App\Models\Adresse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Session;

class Authentification extends Controller
{
    function login(){
        /*
         * Vérifie que l'internaute n'est pas déjà connecté
         * S'il n'est pas connecté, renvoie la page de connexion
         */
        if (Auth::check()) {
            return redirect()->intended(route("home"));
        }
        return view("auth.login");
    }

    function verify_login(LoginRequest $request){
        /*
         * Connecte l'utilisateur à son compte
         */
        // Vérifie qu'il n'est pas déjà connecté
        if (Auth::check()) {
            return redirect()->intended(route("home"));
        }


        $info_connexion = $request->validated();
        // Tente d'effectuer la connexion
        if(Auth::attempt($info_connexion)) {
            $user = Auth::user();    // Donne l'utilisateur connecté
            $status = $user->status; // Obtenir le statut de l'utilisateur

            // Stocker le statut dans la session
            session(['user_status' => $status]);

            $request->session()->regenerate();
            if($status == 'admin'){
                // Renvoie la page de gestion de produit si l'utilisateur est admin
                return redirect()->intended(route('voir_produit'));
            }else{
                // Cherche le client lié à l'utilisateur connecté
                $client = Client::where("email", $user->email)->first();
                // Stocke le client et le panier qui lui est associé dans la session
                session(['client'=>$client]);
                session(['panier'=>Panier::find($client->panierID)]);
                return redirect()->intended(route("home"));
            }
        }

        // renvoie la page de connexion avec des erreurs si la connexion a échoué
        return to_route("auth.login")->withErrors([
            "connexion"=> "Information de connexion invalide"
        ])->onlyInput("email");
    }

    function logout(){
        /*
         * Déconnecte l'utilisateur et supprime les variables de session qui lui sont associées
        */
        Auth::logout();
        Session::forget('user_status');
        Session::forget('client');
        Session::forget('panier');
        return to_route("auth.login");
    }

}
