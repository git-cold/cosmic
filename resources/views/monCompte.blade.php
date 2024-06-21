@extends('layouts.navbar')
@section('css-js')
    <link rel="stylesheet" href="{{ asset('css/monCompte.css') }}">
    <link rel="stylesheet" href="{{asset('css/baseLayoutStyle.css')}}">

@endsection

@section('class', 'mon-compte-page')
@section('container')


    <form action="{{ route('modifierCompte') }}" method="post">
        @csrf
        <div class="fiche-compte-container">
            <div class="fiche-compte">
                <h2>Informations du Compte</h2>
                @if (session('success'))
                    <div class="alert alert-success">
                        <span class="alert-closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                        {{ session('success') }}
                    </div>
                @endif

                <div class="info-section">
                    <label>Email :</label>
                    <p>{{ session('client')->email }}</p>

                    <label>Prénom</label>
                    <input type="text" name="prenom" value="{{ session('client')->prenom }}">

                    <label>Nom</label>
                    <input type="text" name="nom" value="{{ session('client')->nom }}">

                    <label>Téléphone</label>
                    <input type="tel" name="telephone" value="{{ session('client')->telephone }}">
                </div>
                <div class="adresse-section">
                    <h2>Adresse</h2>
                    <label>Numéro</label>
                    <input type="number" name="numero" value="{{ $adresse->numero }}">

                    <label>Rue</label>
                    <input type="text" name="rue" value="{{ $adresse->rue }}">

                    <label>Code Postal</label>
                    <input type="number" name="codePostal" value="{{ $adresse->codePostal }}">

                    <label>Ville</label>
                    <input type="text" name="ville" value="{{ $adresse->ville }}">

                    <label>Pays</label>
                    <input type="text" name="pays" value="{{ $adresse->pays }}">
                </div>
                <button type="submit" class="btn-modifier">Sauvegarder les modifications</button>
            </div>
        </div>
    </form>
@endsection
