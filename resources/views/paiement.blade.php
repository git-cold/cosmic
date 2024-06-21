@extends('layouts.navbar')
@extends('layouts.command-status-nav')

@section('title', "Paiement")

@section('css-js')
<script src="{{asset('js/paiement.js')}}" defer></script>
<link rel="stylesheet" href="{{asset('css/paiement.css')}}">
<link rel="stylesheet" href="{{ asset('css/baseLayoutStyle.css')}}">
@endsection
@section ('class', 'paiement-container')
@section('container')

@section ('status-bar')
@endsection
@section('panier','active')
@section('livraison', 'active')
@section('paiement', 'active')

<div class="content">
    <div class="Payment">
        <div class="commande">
            <div class="numero">
                <div class="titreCommande">N° de commande :</div>
                <div class="numeroCommande">{{$commande->id}}</div>
            </div>
            <div class="prix">
                <div class="titrePrix">Prix :</div>
                <div class="prixCommande">{{$prix_final}} €</div>
            </div>
        </div>
        <div class="MethodePaiement">
            <div class="CarteCredit">
                <div class="ButtonRadio">
                    <div class="Paiement">
                        <div class="Information">Informations de paiement</div>
                    </div>
                    <div class="logo"><img src="{{ asset('page_image/Visa.svg') }}" alt="logo visa"></img></div>
                </div>
                <div class="Achat">
                    <div>
                        <label for="utilisateur">Numéro de carte</label>
                        <input type="text" id="utilisateur" name="nom" placeholder="1234 5678 1234 5678" required>
                    </div>
                    <div>
                        <label for="utilisateur">Date d'expiration</label>
                        <input type="text" id="utilisateur" name="nom" placeholder="mm/aa" required>
                    </div>
                    <div>
                        <label for="utilisateur">Nom sur la carte</label>
                        <input type="text" id="utilisateur" name="nom" placeholder="Simon Strueux" required>
                    </div>
                    <div>
                        <label for="utilisateur">CVC</label>
                        <input type="text" id="utilisateur" name="nom" placeholder="123" required>
                    </div>
                </div>
            </div>


        </div>

        <div class="Confirmation">
            <div class="titre">Confirmation</div>
            <div class="SousTitre">Nous arrivons vers la fin, ecnore quelques clics et votre commande sera prête !</div>
            <div class="Accepte">
                <div>
                    <input type="checkbox" id="utilisateur">
                    <label for="utilisateurs">J'accepte de recevoir des offres promotionnelles <span class="text-optionel"> &nbsp;(optionnelle)</span></label>
                </div>
                <div>
                    <input class="obligatory" type="checkbox" id="utilisateur">
                    <label for="utilisateurs">J'accepte les conditions de vente et la politique privée du site</label>
                </div>
            </div>
            <form method="get" action="{{url("commande/validation/$commande->id")}}">
            <button type="submit" class="button button_conditionnal" disabled>Acheter</button>
            </form>
        </div>
    </div>
    <div>

    </div>
</div>
@endsection






