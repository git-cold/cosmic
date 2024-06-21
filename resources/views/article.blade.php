@section('title', 'Article Description')

@php
$id = $product->id;
$panier = Session::get('panier');
@endphp

@section('css-js')
<link rel="stylesheet" href="{{ asset("css/articlePage.css") }}">
<link rel="stylesheet" href="{{ asset("css/carousselArticle.css") }}">
<link rel="stylesheet" href="{{ asset("css/baseLayoutStyle.css") }}">

<link rel="stylesheet" href="{{ asset("js/addProduct.js") }}" defer>

@endsection
@extends('layouts.navbar')
<!-- Barre de navigation -->


@section('class', 'container')
@section('container')
<!-- Ligne de séparation -->

<div class="product-container">
    <div class="line-separator"></div>

    <!-- Carroussel d'image-->
    <div class="product-picture">
        <div>
            <div class="carousel">
              <ul class="slides">
                <input type="radio" name="radio-buttons" id="img-1" checked />
                <li class="slide-container">
                  <div class="slide-image">
                    <img class="article-image" src="{{asset('article_image/' . $product->articleImg . '/image2.png')}}">

                  </div>
                  <div class="carousel-controls">
                    <label for="img-3" class="prev-slide">
                      <span>&lsaquo;</span>
                    </label>
                    <label for="img-2" class="next-slide">
                      <span>&rsaquo;</span>
                    </label>
                  </div>
                </li>
                <input type="radio" name="radio-buttons" id="img-2" />
                <li class="slide-container">
                  <div class="slide-image">
                    <img class="article-image" src="{{asset('article_image/' . $product->articleImg . '/image3.png')}}">
                  </div>

                  <div class="carousel-controls">
                    <label for="img-1" class="prev-slide">
                      <span>&lsaquo;</span>
                    </label>
                    <label for="img-3" class="next-slide">
                      <span>&rsaquo;</span>
                    </label>
                  </div>
                </li>
                <input type="radio" name="radio-buttons" id="img-3" />

                <li class="slide-container">
                  <div class="slide-image">
                    <img class="article-image" src="{{asset('article_image/' . $product->articleImg . '/image4.png')}}">
                  </div>

                  <div class="carousel-controls">
                    <label for="img-2" class="prev-slide">
                      <span>&lsaquo;</span>
                    </label>
                    <label for="img-1" class="next-slide">
                      <span>&rsaquo;</span>
                    </label>
                  </div>
                </li>
                <div class="carousel-dots">
                  <label for="img-1" class="carousel-dot" id="img-dot-1"></label>
                  <label for="img-2" class="carousel-dot" id="img-dot-2"></label>
                  <label for="img-3" class="carousel-dot" id="img-dot-3"></label>
                </div>
              </ul>
            </div>
          </div>

    </div>

    <div class="product-description">
        <div class="product-header">

            <div class="product-price-container">
                <h1 class="product-name">
                    {{$product->nom}}
                </h1>



                    @if ($product->tauxRemise == 0)

                    @php
                    $price = '<div class="product-price">'
                    @endphp
                        {!! $price !!}
                        {{ $product->prix }}€
                        @else

                            @php

                            $price = '<div class="product-price old-price">';

                                @endphp
                                {!! $price !!}
                            <div class="product-price new-price">
                            {{ $product->prix*(100-$product->tauxRemise)/100}}
                            €
                            </div>
                            {!! $price !!}
                        <p class="reduc-container">
                            <span>A l'origine :</span>
                            <span class="barred-price">{{ $product->prix }}
                            €</span>
                            <span class="taux-reduc">
                                -{{$product->tauxRemise}}%
                            </span>
                        </p>

                        </div>






                    @endif

                </div>

                <p class="product-sentance">
                {{$product->accroche}}
            </p>
        </div>


        <div class="product-caracteristic-container">
            <div class="product-caracteristic product-color">
                <div class="description-title">
                    Couleur
                </div>

                <div class="attribute-text">
                  {{  $product->color1 }}
                </div>
            </div>

            <div class="product-caracteristic product-material">
                <div class="description-title">
                    Matériaux
                </div>
                <div class="attribute-text">
                  {{ $product->materiaux }}
                </div>
            </div>

            <div class="product-caracteristic product-style">
                <div class="description-title">
                    Style
                </div>

                <div class="attribute-text">
                  {{ $product->style }}
                </div>
            </div>

            <div class="product-caracteristic product-description-text">
                <div class="description-title description">
                    Description
                </div>

                <div class="attribute-text">
                <?php
                echo $product->artDescr?>
                </div>
            </div>

            @if ($product->qteStock > 0)
            <form id = "cartForm" class="btn-container" method="GET" action="<?=url("product/addPanier/")?>">
                <div class="quantity-controll">
                    <button type="button" onclick="decrement()" class="quantity-btn minus">-</button>
                    <input type="number" id="quantite" name="quantite" value="1" min="1" max="{{$product->qteStock}}">
                    <button type="button" onclick="increment()" class="quantity-btn">+</button>
                    <input id = "cart-number" type="hidden" value="{{$id}}">
                </div>
                    @if (\Illuminate\Support\Facades\Session::has('panier'))
                    <button class="add-to-cart" type="button" value="Panier" onclick="addToCart({{$id}})" >
                        Ajouter au panier
                    </button>
                    @else
                    <button class="add-to-cart" type="button" value="Panier" onclick="location.href='{{url('/login')}}';" >
                        Ajouter au panier
                    </button>
                    @endif
            </form>
            @else
                <div class="description-title" id="indispo">
                    Indisponible actuellement
                </div>
            @endif

            <!--Fonctions JavaScript pour incrémenter et décrémenter la quantité et ajouter au panier -->
            <script>

              var cart_id = document.getElementById('cart-number').value;
              console.log(cart_id)
              function gererToucheEntree(event) {
                if (event.keyCode === 13) {
                  console.log("presse enter")
                  // Empêcher le comportement par défaut du formulaire
                  // Appeler la fonction de traitement du formulaire ici
                  addToCart(cart_id);
                }
              }

              document.getElementById("quantite").addEventListener("keypress", gererToucheEntree);


              function addToCart(id) {
                  var quantite = document.getElementById('quantite').value;
                  event.preventDefault();
                  console.log(quantite);
                  // Mise à jour del'attribut action avec la quantité dans le fragment
                  var quantiteEncodee = encodeURIComponent(quantite);

                  var xhr = new XMLHttpRequest();
                  xhr.open('GET','/product/addPanier/' + id + '/' + quantiteEncodee)

                  xhr.send();
                  animate_cart(quantite);


                }

                //fonction pour animer la pastille à droite du panier
                function animate_cart(quantite){
                  const pastille = document.querySelector('.nb-article-panier-indic');
                  const text_pastille = document.querySelector('.quantity-panier');
                  var nombre = parseInt(pastille.innerText) + parseInt(quantite)
                  console.log(nombre)
                  text_pastille.innerText = nombre;

                  // Ajouter la classe d'animation à la pastille
                  pastille.classList.add('animation');

                  // Supprimer la classe d'animation après l'achèvement de l'animation
                  setTimeout(() => {
                  pastille.classList.remove('animation');
                  }, 300);
                }

                //fonction pour incrementer et décrémenter la quantité
                function increment() {

                document.getElementById('quantite').stepUp();
                console.log(document.getElementById('quantite').value)
                }

                function decrement() {
                    if (document.getElementById('quantite').value == 0){
                        document.querySelector('.quantity-btn.minus').classList.toggle('disabled');
                    }else{
                        document.getElementById('quantite').stepDown();
                    }
                }
            </script>





        </div>

        </div>




</div>
@endsection


