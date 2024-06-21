@section('css-js')
    <link rel="stylesheet" href="{{ asset('css/nousContacter_style.css')}} ">
    <link rel="stylesheet" href="{{ asset('css/baseLayoutStyle.css') }}">
@endsection
@extends('layouts.navbar')
@section('class', 'aPropos-container')
@section('container')



    <section class = "hero-section" id = "hero-section">

        <div class="container hero-container">
            <div class="container-text">
                <div class="fond">
                    <h1 class="primary">Contactez-nous !</h1>

                    <form class="form" action="{{url('Navbar/envoieEmail')}}" method="get" enctype="multipart/form-data">
                        <div class="form-item">
                            <input type="text" id="prenom" name="prenom" autocomplete="off" required >
                            <label for="prenom">Prénom</label>
                        </div>

                        <div class="form-item">
                            <input type="text" id="nom" name="nom" autocomplete="off" required>
                            <label for="nom">Nom</label>
                        </div>

                        <div class="form-item">
                            <input type="email" id="adresse" name="adresse" autocomplete="off" required>
                            <label for="adresse">Adresse mail</label>
                        </div>

                        <div class="form-item">
                            <input type="file" id="fichier" autocomplete="off">
                        </div>

                        <div class="form-item">
                            <input class="message" type="text" id="message"  name="message" autocomplete="off" required>
                            <label for="message">Message</label>
                        </div>

                        <button type="submit">
                            <div class="btn">
                                <div class="contact">
                                    Contactez-nous !
                                </div>
                                <i class="fa-regular fa-paper-plane"></i>
                            </div>
                        </button>
                    </form>
                </div>
                <!-- Hero texte primaire -->

                </span>
            </div>
        </div>


    </section>
@endsection

