<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Adresse;
use App\Models\Panier;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class Register extends Controller
{
    public function register()
    {
        /*
         * Renvoie la page d'inscirption si l'utilisateur n'est pas déjà connecté
        */
        if (Auth::check()) {
            return redirect()->intended(route("home"));
        }
        return view("auth.register");

    }

    public function verify_register(Request $request){
        /*
         * Crée un compte Client
        */
        if (Auth::check()) {
            return redirect()->intended(route("home"));
        }
        // Messages d'erreur personnalisés
        $messages = [
            'email.required' => 'Le champ email est obligatoire.',
            'email.email' => 'Le format de l\'email n\'est pas valide.',
            'email.unique' => 'Cet email est déjà utilisé.',
            'phone.required' => 'Le champ téléphone est obligatoire.',
            'firstname.required' => 'Le champ prénom est obligatoire.',
            'lastname.required' => 'Le champ nom est obligatoire.',
            'password.required' => 'Le champ mot de passe est obligatoire.',
            'password.min' => 'Le mot de passe doit comporter au moins 4 caractères.',
            'password.confirmed' => 'Les mots de passe ne correspondent pas.',
            'codePostal.required' => 'Le champ code postal est obligatoire.',
            'codePostal.numeric' => 'Le code postal doit être numérique.',
            'ville.required' => 'Le champ ville est obligatoire.',
            'pays.required' => 'Le champ pays est obligatoire.',
            'rue.required' => 'Le champ rue est obligatoire.',
            'numero.required' => 'Le champ numéro est obligatoire.',
            'numero.numeric' => 'Le numéro doit être numérique.',
            'codePostal.numeric' => 'Le code postal doit être numérique.',
            'codePostal.min' => 'Le code postal ne peut pas être négatif.',
            'numero.numeric' => 'Le numéro doit être numérique.',
            'numero.min' => 'Le numéro ne peut pas être négatif.',
        ];

        // Valider les données reçues
        $validatedData = $request->validate([
            'email' => 'required|email|unique:users',
            'phone' => 'required',
            'firstname' => 'required',
            'lastname' => 'required',
            'password' => 'required|min:4|confirmed',
            'codePostal' => 'required|numeric',
            'ville' => 'required|string',
            'pays' => 'required|string',
            'rue' => 'required|string',
            'numero' => 'required|numeric',
            'codePostal' => 'required|numeric|min:0',
            'ville' => 'required|string',
            'pays' => 'required|string',
            'rue' => 'required|string',
            'numero' => 'required|numeric|min:0',
        ], $messages);



        // Créer un nouveau client
        $client = new Client;
        $client->insert_or_update(array("email"=>$validatedData['email'],
            "telephone"=>$validatedData['phone'],
            "prenom"=>$validatedData['firstname'],
            "nom"=>$validatedData['lastname'],
            ),array("codePostal"=>$validatedData['codePostal'],
                "ville"=>$validatedData['ville'],
                "pays"=>$validatedData['pays'],
                "rue"=>$validatedData['rue'],
                "numero"=>$validatedData['numero'])
        );

        User::create([
            "email"=> $validatedData['email'],
            "password"=> Hash::make($validatedData['password']),
            "status" => "client",
        ]);

        // Rediriger l'utilisateur
        return redirect()->route('auth.login')->with('success', 'Votre compte a été créé avec succès.');
    }
}
