<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page de Connexion</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>
@if (session('success'))
<div class="alert alert-success">
    <span class="alert-closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
    {{ session('success') }}
</div>
@endif
<h1>Connexion </h1>
<!-- Formulaire de connexion -->
<form action="{{ route('auth.login') }}" method="post">
    @csrf

    <div for="connexion">

        <label>Email:</label>
        <input type="email" id="email" name="email" value="{{ old('email') }}" >
        <br>

        <label for="password">Mot de passe:</label>
        <input type="password" id="password" name="password" >
        <br>

        @error("connexion")
        <div style="color: red;">{{ $message }}</div>
        @enderror

        <br>
        <input type="submit" value="Se connecter">
        <p class="link-left">
            <a href="{{ route('nousContacter') }}">Mot de passe oublié?</a>
        </p>
    </div>
    <hr>
    <div class="form-link">
        <a href="{{ route('register') }}" class="register-link">S'inscrire</a>
    </div>
    <p class="link-left">
        <a href="{{ route('home') }}">retourner à l'accueil</a>
    </p>
</form>
</body>
</html>
