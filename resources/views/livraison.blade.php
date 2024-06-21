@section('title', 'Adresse de livraison ')

@section('css-js')
    <link rel="stylesheet" href="{{ asset('css/deliveryLayout.css') }}">
    <link rel="stylesheet" href="{{ asset("css/baseLayoutStyle.css") }}">
    <link rel="stylesheet" href="{{ asset("js/addProduct.js") }}" defer>
@endsection
@extends('layouts.navbar')
@extends('layouts.command-status-nav')
<!-- Barre de navigation -->
@section('class', 'delivery-container')
@section('container')

    <form class="delivery-all-container" method="POST" action ="{{url("commande/paiement")}}">
        @csrf
        @section('status-bar')
        @endsection
        @section('panier', 'active')
        @section('livraison', 'active')


        <div class="delivery-informations-container">
            <div class="radio-container">
                    @foreach($liv as $index => $typeliv)
                        <p>
                            <label class="label-container" for="{{$typeliv->id}}">
                                {{$typeliv->livraisonLib}}
                                <input class="input-radio" id="{{$typeliv->id}}" type="radio" name="liv" value="{{$typeliv->id}}" {{ $index === 0 ? 'checked' : '' }}>
                                <span class="checkmark"></span>
                            </label>
                        </p>
                    @endforeach
            </div>

            <div class="line-separator"></div>


            <h1 class="delivery-text">
                Informations de livraisons
            </h1>
            <div class="input-container">

                <input class="input-information" id = "numero_adress" placeholder="Numéro*" type="number" name="numero" value="{{ $adresse->numero }}" placeholder >

                <input class="input-information" id = "rue" placeholder="Rue*" type="text" name="rue" value="{{ $adresse->rue }}">

                <input class="input-information" type="number" placeholder="Code postal*" id ="postal-code" name="codePostal" value="{{ $adresse->codePostal }}">

                <input class="input-information" type="text" placeholder="Ville*" id = "ville" name="ville" value="{{ $adresse->ville }}">

                <input class="input-information" type="text" placeholder="Pays*" id = "pays" name="pays" value="{{ $adresse->pays }}">
            </div>
            <label class="secondary-text">Sauvegarder cette adresse pour votre compte ?
                <input type="checkbox" name="check">
            </label>
        </div>




        <button class="paiement-step" type="submit" value="Passer au paiement">
            Passer au paiement
        </button>
    </form>
    </div>
@endsection
