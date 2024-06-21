@php
$panier = Session::get('panier');
$nbArticle = $panier->nbArticle;
$total_price = 0;
@endphp
@section('title', "Mon panier ($nbArticle articles)")

@section('css-js')
<link rel="stylesheet" href="{{ asset('css/panier.layout.css')}}">
<link rel="stylesheet" href="{{ asset('css/baseLayoutStyle.css')}}">

<script>
function increment() {
    document.getElementById('quantite').stepUp();
    console.log(document.getElementById('quantite').value)
    }

    function decrement() {
    if (document.getElementById('quantite').value == 1){
        }else{
            document.getElementById('quantite').stepDown();
            }
        }
</script>
@endsection
@extends('layouts.navbar')
@extends('layouts.command-status-nav')
<!-- Barre de navigation -->

@section('class', 'cart-container')
@section('container')

@section('status-bar')
@endsection

@section('panier', 'active')

@if ($nbArticle == 0)
<div class="empty-cart-container">
    <i class="fa-solid fa-cart-plus fa-2xl"></i>
    <div class="empty-cart-text">Votre panier est vide !</div>

        <a href="{{ url('/tousProduits')}}"><button class="button-continue-achat">Continuer mes achats</button></a>

</div>
@else
<p class="panier-nbArticle">
    <span class="text">Panier</span>
    <span class="nb-article-text">
        {{ Session::get('panier')->nbArticle}} articles
    </span>
</p>

<div class="product-cart-command-container">

    <table class="product-line-container">
        <thead>
        <tr>
            <th>Produit</th>
            <th>Quantité</th>
            <th>Prix</th>
        </tr>
        </thead>
        <tbody>
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                </tr>
            @foreach ($articles as $product)

                <tr>
                    @php
                        $nom_produit = $product[0]->nom;
                        $image = $product[0]->articleImg
                    @endphp
                    <td class = "article"><a href="{{url("product/$nom_produit")}}"><img class="product-image" src="{{ asset("article_image/$image/image2.png") }}" alt="{{ $product[0]->nom }}"></a>
                        <div class="product-name-price">
                            <p class="product-name">
                                {{ $product[0]->nom }}
                            </p>
                            @if ($product[0]->tauxRemise == 0)
                            <div class="product-price">{{ $product[0]->prix}} €</div>
                            @php

                            @endphp
                            @else
                            <div class="product-price old-price">
                                <div class="product-price new-price">
                                    @php
                                    $old_price = $product[0]->prix;
                                    $product[0]->prix = $product[0]->prix * (100 - $product[0]->tauxRemise) / 100
                                    @endphp
                                    {{$product[0]->prix}} €
                                </div>
                                <p class="reduc-container">
                                    <span>A l'origine :</span>
                                    <span class="barred-price">{{ $old_price }} €</span>
                                    <span class="taux-reduc">-{{ $product[0]->tauxRemise }}%</span>
                                </p>
                            </div>
                            @endif

                        </div>
                    </td>
                    <td class="quantite">
                        <div class="quantity-controll">
                            @php
                                $id_prod = $product[0]->id;
                                $idpanier = $product[1]->panierID;
                                $addDisable = "";
                                $removeDisable = "";

                            @endphp

                            @if ($product[0]->qteStock == $product[1]->quantite)
                                @php
                                    $addDisable = "disabled";
                                @endphp
                            @endif

                            @if ($product[1]->quantite == 1)
                                <form action="{{ url("panier/$idpanier/supprime/$id_prod") }}" method="get">
                                    <button type="submit" onclick="decrement()" class="quantity-btn minus" value="-"><i class="fa-solid fa-minus fa-xs"></i></button>
                                </form>
                            @else
                                <form action="{{ url("panier/$idpanier/diminue/$id_prod") }}" method="post">
                                    @csrf
                                    <button  class="quantity-btn minus" value="-"><i class="fa-solid fa-minus fa-xs"></i></button>
                                </form>
                            @endif
                            <a id="quantite" >{{ $product[1]->quantite }}</a>
                            <form action="{{ url("panier/$idpanier/augmente/$id_prod") }}" method="post">
                                @csrf
                                <button type="submit" class="quantity-btn plus" {{$addDisable}}><i class="fa-solid fa-plus fa-xs"></i></button>
                            </form>
                        </div>
                    </td>
                    <td class="total-line-price">
                        @php
                        $total_price = $total_price + $product[0]->prix * $product[1]->quantite
                        @endphp
                       {{$product[0]->prix * $product[1]->quantite}}€
                    </td>

                    <td class="delete"><form method="get" action="<?=url("panier/$idpanier/supprime/$id_prod")?>"><button class="delete-btn"><i class="fa-solid fa-trash-can" style="color: #333;"></i></button></form></td>
                </tr>
            @endforeach
        </tbody>
    </table>

<script>
    function capitalizeInput() {
        console.log("Capital")
      var inputElement = document.getElementById("promo-code");
      inputElement.value = inputElement.value.toUpperCase();
    }
  </script>

    <div class="right-recap">

        <div class="cart-price-container">
            <p class="promo-code-title">        &nbsp;&nbsp; Avez vous un code promo ?
            </p>
            <input type="text" name="promo-code" id="promo-code" placeholder="Entrez votre code" oninput="capitalizeInput()">
            <button class="apply-promo-code">
                Appliquer
            </button>
            <div class="line-separator">

            </div>
            <p class="total sous-total">
                <span>Sous total</span>

                <span>{{number_format(abs($total_price),0, ',', ' ')}}€</span>
            </p>

            <p class="total remise">
                <span>Remise</span>
                <span>-00.00€</span>
            </p>

            <p class="total vrai-total ">
                <span>Total HT</span>
                <span>{{number_format(abs($total_price),0, ',', ' ')}}€</span>
            </p>
        </div>
        <a href="{{url("commande/livraison")}}"><button class="command-checkout">Commander
        </button></a>

    </div>


</div>
@endif


@endsection

