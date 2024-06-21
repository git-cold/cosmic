@section('css-js')
    <link rel="stylesheet" href="{{ asset('css/emailEnvoyer.css')}} ">
@endsection
<body>
@extends('layouts.navbar')
@section('class', 'aPropos-container')
@section('container')

    <div class="email">
        <i class="fa-solid fa-circle-check"></i>
        <div class="empty-article-text">Email envoyé à {{$adresse}} avec succès !</div>
        <a href="{{ url('/')}}"><button class="retourSite">Retourner au site</button></a>
    </div>

@endsection
</body>

