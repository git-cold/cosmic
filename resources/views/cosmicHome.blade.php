    @section('css-js')
    <link rel="stylesheet" href="{{ asset('css/Home_style.css')}} ">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.4/gsap.min.js" integrity="sha512-EZI2cBcGPnmR89wTgVnN3602Yyi7muWo8y1B3a8WmIv1J9tYG+udH4LvmYjLiGp37yHB7FfaPBo8ly178m9g4Q==" crossorigin="anonymous" referrerpolicy="no-referrer" defer></script>
    <script src="https://unpkg.com/scrollreveal"></script>
    <script src="{{asset('js/scrolling_page_accueil.js')}}" defer></script>
    <link rel="stylesheet" href="{{ asset('css/baseLayoutStyle.css')}} ">

     <script src="{{asset('js/homeScrollContainer.js')}}" defer></script>


    @endsection

    @section('title', 'Accueil')
    @section('class', 'home-container')
    @extends('layouts.navbar')
    @section('container')



    <i class="fa-solid fa-chevron-down fa-2xl" style="color: #000000;"></i>




    <!-- Barre de navigation -->


    <section class = "hero-section" id = "hero-section">

        <div class="container hero-container">
            <div class="container-text-btn">

                <!-- Hero texte primaire -->
                <h2 class="primary-text">Faites de vos pièces un lieu unique .</h2>

                <!-- Hero texte secondaire -->
                <p class="secondary-text">
                    Découvrez le mariage parfait entre esthétique et fonctionnalité, et transformez votre domicile en un sanctuaire de beauté et de confort.
                </p>

                <!-- Boutons -->
                <span class = "btn-group">
                    <a href="{{url('/tousProduits')}}">
                        <button class="btn primary-btn">Découvrir nos produits</button>
                    </a>

                </span>
            </div>
        </div>
    </section>

    <div class="svg-container">

        <div class="svg-separator top">

        </div>
        <div class="svg-separator">

        </div>
    </div>

    <section id = "new-product">

        <div class="section-title">
            nouveautés
        </div>
        <div class="scroll-arrows">
            <div class="scroll-arrow left">&lt;</div>
            <div class="scroll-arrow right">&gt;</div>
        </div>
        <div class="new-product-container">
       @foreach ($articles as $index => $article)
            <div class="product-container">


                <a href = "{{url("/product/$article->nom")}}" class="article"><img src = "article_image/{{ $article->articleImg }}/image1.png">

                    <div class="article-content">
                        <h2 class="article-title">
                            {{ $article->nom }}
                        </h2>

                        <p class="article-price">
                            {{ $article->prix}}€
                        </p>
                    </div>
                </a>

            @if (Session::has('panier') and $article->qteStock > 0)
            @php
            $panier = Session::get('panier');
            @endphp
            <a href = "{{url("/product/addPanier/$article->id/1")}}"><button class="add-cart">Ajouter au panier</button></a>

            @else
            <a href = "{{url("/product/$article->nom")}}"><button class="add-cart">Ajouter au panier</button></a>


            @endif


            </div>
            @endforeach

        </div>


        <div class="svg-container">
            <div class="svg-separator top">

            </div>
            <div class="svg-separator section-product-container">
            </div>
        </div>

        <div class="section-title">
            catégories
        </div>
        <div class="new-product-container">
            @foreach ($categories as $index => $categorie)
                <div class="product-container">


                    <a href = "{{url("/categorie/$categorie->id")}}" class="article"><img class="categorieImg" src = "categorie_image/{{ $categorie->id }}/image1.png">

                        <div class="article-content">
                            <h2 class="article-title">
                                {{ $categorie->catLib }}
                            </h2>
                        </div>
                    </a>


                </div>
            @endforeach

        </div>


        <div class="svg-container">
            <div class="svg-separator top">

            </div>
            <div class="svg-separator section-product-container">
            </div>
        </div>
    <section>


    <section id = "cosmic-value">

        <div class="cosmic-value-container">


            <div class="text-image-container">

                <div>
                    <p class="text-naration first">
                        cosmic c'est ...
                    </p>
                    <img class = "image-value menuisier" src="{{ asset('page_image/menuisier_regional_france.jpg') }}" alt="Photos d'un ouvrier de cosmic en action">
                </div>
                <div class="text-container">
                    <h1 class="paragraph-title">
                        Un savoir faire de qualité
                    </h1>
                    <p class="paragraph-text">
                        Chez Cosmic-Home, nous nous engageons à vous offrir bien plus que du mobilier d'intérieur. Chaque pièce que nous créons incarne notre dévouement à l'art de l'aménagement, fusionnant forme et fonctionnalité avec une attention méticuleuse aux détails. Explorez cette collection exclusive et plongez dans l'univers où notre savoir-faire exceptionnel donne vie à des espaces intérieurs empreints d'élégance et de confort incomparables
                    </p>
                </div>
            </div>

            <div class="text-image-container fr">

                <div>
                    <p class="text-naration second">
                        mais aussi
                    </p>

                    <img class = "image-value arbre" src="{{ asset('page_image/arbre_image_environnement.jpg') }}" alt="Photos d'un ouvrier de cosmic en action">
                </div>
                <div class="text-container">
                    <h1 class="paragraph-title">
                        Le respect de l'environement
                    </h1>
                    <p class="paragraph-text">
                       Nos produits sont conçus avec une approche écologique et respectueuse de la nature et notre engagement envers la durabilité guide toutes les étapes de la production, de la sélection responsable des matières premières à la réduction des emballages superflus. Ainsi, en choisissant nos produits, vous contribuez activement à la préservation des forêts et à la promotion d'un mode de vie respectueux de notre précieux écosystème.
                    </p>
                </div>
            </div>
        </div>




    </section>

    <div class="svg-container">
        <div class="svg-separator top with-content">
        </div>
        <div class="svg-separator with-content">
            <div class="svg-text">Paru dans</div>
            <div class="logo-container">
                <div class="magazine-logo img1" style="width : 300px">

                    <img src="https://www.valeursactuelles.com/assets/uploads/2020/10/valeurs-actuelles.svg" alt="logo valeur actuel">
                </div>

                <div style="width: 200px" class="magazine-logo img2">

                    <img src="{{asset('page_image/image_magazine/Aufeminin.svg')}}" alt="" srcset="">
                </div>

                <div style="width : 200px" class="magazine-logo img3">
                    <img src="{{asset('page_image/image_magazine/Forbes-Black.svg')}}" alt="" srcset="">
                </div>

                <div style="width : 200px" class="magazine-logo img4">
                    <img src="{{asset('page_image/image_magazine/Boston-Magazine.svg')}}" alt="" srcset="">
                </div>
            </div>
        </div>
    </div>









    @endsection

