<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
    <title>Inscription</title>
</head>
<body>
    <h1>Inscription</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('register') }}" method="post">
        @csrf
        <div class="form-row">
            <div class="form-group">
                <label for="firstname">Prénom</label>
                <input type="text" id="firstname" name="firstname" value="{{ old('firstname') }}" required>
            </div>

            <div class="form-group">
                <label for="lastname">Nom</label>
                <input type="text" id="lastname" name="lastname" value="{{ old('lastname') }}" required>
            </div>
        </div>

        <label for="email">Email</label>
        <input type="email" id="email" name="email" value="{{ old('email') }}" required>

        <label for="phone">Téléphone</label>
        <input type="tel" id="phone" name="phone" value="{{ old('phone') }}" required>

        <!-- Champs pour le mot de passe et la confirmation -->
        <div class="form-row">
            <div class="form-group">
                <label for="password">Mot de passe</label>
                <input type="password" id="password" name="password" required>
            </div>

            <div class="form-group">
                <label for="password_confirmation">Confirmer le mot de passe</label>
                <input type="password" id="password_confirmation" name="password_confirmation" required>
            </div>
        </div>

        <div>
            <h3>Adresse</h3>
            <div class="form-row">
                <div class="form-group">
                    <label for="numero">Numéro</label>
                    <input type="number" id="numero" name="numero" value="{{ old('numero') }}" required>
                </div>

                <div class="form-group">
                    <label for="rue">Rue</label>
                    <input type="text" id="rue" name="rue" value="{{ old('rue') }}" required>
                </div>

            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="codePostal">Code Postal</label>
                    <input type="number" id="codePostal" name="codePostal" value="{{ old('codePostal') }}" required>
                </div>

                <div class="form-group">
                    <label for="ville">Ville</label>
                    <input type="text" id="ville" name="ville" value="{{ old('ville') }}" required>
                </div>

                <div class="form-group">
                    <label for="pays">Pays</label>
                    <input type="text" id="pays" name="pays" value="{{ old('pays') }}" required>
                </div>
            </div>
        </div>

        <div class="form-footer">
            <input type="submit" value="S'inscrire">
            <p>Déjà inscrit? &nbsp; <a href="{{ route('auth.login') }}">Se connecter</a></p>
        </div>

        <a href="{{ route('home') }}">Retourner à l'accueil</a>
    </form>
</body>
</html>
