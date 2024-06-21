
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="{{ asset('js/navbarScroll.js') }}" defer></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/navbarLayout.css')}} ">
    <script src="{{ asset('js/JavaScript_Home.js') }}" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.4/gsap.min.js" integrity="sha512-EZI2cBcGPnmR89wTgVnN3602Yyi7muWo8y1B3a8WmIv1J9tYG+udH4LvmYjLiGp37yHB7FfaPBo8ly178m9g4Q==" crossorigin="anonymous" referrerpolicy="no-referrer" defer></script>

    @yield('css-js')
    <title>@yield('title')</title>
</head>
<body>
    @php

    $panier = Session::get('panier');

    @endphp

<nav class="navbar">
        <!-- Logo -->
        <a href="{{url('/')}}"><img src="{{ asset('logo/logo2_cosmic.svg') }}" alt="Image du logo" class="cosmic-logo"></img></a>

        <!-- Liens  -->
        <ul class="menu">
            <li><a href="{{url('/')}}" class="link">Accueil</a></li>
            <li><a href="/tousProduits" class="link">Nos Produits</a></li>
            <li><a href="/nouveauxProduits" class="link">Nouveautés</a></li>
            <li><a href="/aPropos" class="link">À propos</a></li>
            <li><a href="{{url('/nousContacter')}}" class="link">Nous contacter</a></li>
        </ul>

        <!-- Logo rechercher, Panier, Compte -->
        <div class="icon-container">
            <!-- Search bar -->
            <form action="{{route("allProducts")}}" method="post">
                @csrf
                <input type="text" name="search-bar" id="search-bar" class="user-search" placeholder="Rechercher">
            </form>


            <!-- Search -->
            <i class="fa-solid fa-magnifying-glass fa-2xl navbar-icon" style="color: #333"></i>

            <!-- Panier -->
            @if(session('user_status') == "admin")
                <a href="<?=route('voir_produit')?>"><i class="fa-solid fa-warehouse fa-2xl navbar-icon" style="color: #333;"></i></a>
            @else
                @if (\Illuminate\Support\Facades\Session::has('panier'))
                    <?php $panier = \Illuminate\Support\Facades\Session::get('panier') ?>
                    <a href="<?=url("/panier/$panier->id ")?>"><i class="fa-solid fa-cart-shopping fa-2xl navbar-icon" style="color: #333;"></i></a>
                @else
                    <a href="<?=url("/login")?>"><i class="fa-solid fa-cart-shopping fa-2xl navbar-icon" style="color: #333;"></i></a>
                @endif
            @endif

            <!-- Compte -->

            @guest
            <!-- Si l'utilisateur n'est pas connecté, afficher un lien pour se connecter -->
            <a href="{{ route('auth.login') }}">
                <i class="fa-solid fa-user fa-2xl navbar-icon" style="color: #333;"></i>
            </a>
            @endguest

            @auth
                <!-- Script JavaScript intégré -->
                <script>
                    document.addEventListener('DOMContentLoaded', function () {
                        document.getElementById('userIcon')?.addEventListener('click', function() {
                            var popup = document.getElementById('userPopup');
                            popup.style.display = popup.style.display === 'none' ? 'block' : 'none';
                        });
                    });
                </script>

                <!-- Image sur laquelle l'utilisateur authentifié clique -->
                <i class="fa-solid fa-user fa-2xl navbar-icon" style="color: #333;" id="userIcon"></i>

                <!-- Popup qui s'affiche après le clic sur l'image pour un utilisateur authentifié -->
                <div id="userPopup" style="display: none;">
                    <div class="infos_rapide">
                        @if(session('user_status') == "client")
                            {{ session('client')->prenom }} ({{ session('user_status') }})
                        @elseif(session('user_status') == "admin")
                            admin ({{ session('user_status') }})
                        @endif
                    </div>

                    @if(session('user_status') == "client")
                        <div>
                            <a href="{{ route('monCompte') }}" class="account_link">Mon compte</a>
                        </div>
                    @endif

                    <form action="{{ route('auth.logout') }}" method="POST" class="fake_form">
                        @method('delete')
                        @csrf
                        <button type="submit" class="logout-button">
                            Se déconnecter
                        </button>
                    </form>
                </div>
            @endauth
        </div>


        @if(session('user_status') != "admin")
            <div class="nb-article-panier-indic">

           <div class="quantity-panier">
               @if ($panier == null)
                   0

               @else
               {{$panier->nbArticle}}
               @endif
           </div>
        @endif

    </nav>
    <div class = @yield('class')>
        @yield('container')
    </div>
</body>
</html>
