<?php

namespace App\Http\Controllers\Client;

use App\Models\Client;
use App\Models\Adresse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class MonCompteController extends Controller
{
    public function index(){
        /*
         * Renvoie la page compte si l'utilisateur connecté est un cient
         */
        if (session('user_status') == "client") {
            $adresse = Adresse::find(Session::get("client")->adresseId);
            return view('monCompte',compact("adresse"));
        }
        return redirect()->intended(route("auth.login"));
    }

    public function modifierCompte(Request $request){
        /*
         * Modifie les données du compte, l'email et le mdp ne sont pas modifiables
         * Renvoie la page compte avec un message de validation du changement pour toutes les entrées correctes
         */
        if (session('user_status') == "client") {
            // Récupérer l'utilisateur actuel et son adresse
            $client = Client::find(Session::get("client")->id);
            $adresse = Adresse::find($client->adresseId);

            // Valider les données entrantes
            $validatedData = $request->validate([
                // Validation pour les champs du client
                'telephone' => 'required',
                'nom' => 'required',
                'prenom' => 'required',
                // Validation pour les champs de l'adresse
                'numero' => 'required|numeric',
                'rue' => 'required|string',
                'codePostal' => 'required|numeric',
                'ville' => 'required|string',
                'pays' => 'required|string',
            ]);

            // MAJ le client
            $client->insert_or_update(array(
                "telephone"=>$validatedData['telephone'],
                "prenom"=>$validatedData['prenom'],
                "nom"=>$validatedData['nom'],
            ));

            // Mettre à jour l'adresse lié au client
            $adresse->insert_or_update(array("codePostal"=>$validatedData['codePostal'],
                    "ville"=>$validatedData['ville'],
                    "pays"=>$validatedData['pays'],
                    "rue"=>$validatedData['rue'],
                    "numero"=>$validatedData['numero'])
            );

            // Mettre à jour les informations dans la session
            session(['client' => $client]);

            return redirect()->route('monCompte')->with('success', 'Compte modifié avec succès');
        }
        return redirect()->intended(route("auth.login"));
    }
}
