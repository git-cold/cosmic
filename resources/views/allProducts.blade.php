@section('css-js')
    <script src="{{asset('js/allProduct.js')}}" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/14.7.0/nouislider.min.css" />

    <!-- Inclure noUiSlider et son dépendance (jQuery) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-rc.0/css/select2.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/semantic-ui@2.2.13/dist/semantic.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-rc.0/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/14.7.0/nouislider.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/semantic-ui@2.2.13/dist/semantic.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/allProducts_style.css')}} ">
    <link rel="stylesheet" href="{{ asset('css/baseLayoutStyle.css')}} ">

@endsection
@extends('layouts.navbar')
@section('class', 'allProduct-container')
@section('container')



                @if($articles->isNotEmpty())
                <div class="cats">
                    <div class="formulaire">
                        <button class="bouton-filtre"><i class="fa-solid fa-filter"></i></button>
                        <nav id="slide-menu">
                            <form action="{{ route('allProducts') }}" method="post" id="priceFilterForm">
                                @csrf
                                <div class="price-slider-container">
                                    <div class="price-filter">
                                        <label class="titre-filtre" for="priceRange">Plage de prix:</label>
                                        <div class="slider">
                                            <input type="text" id="minPrice" name="minPrice" class="form-control transparent-input min" readonly>
                                            <div id="priceRange" class="price-slider"></div>
                                            <input type="text" id="maxPrice" name="maxPrice" class="form-control transparent-input max" readonly>
                                        </div>
                                    </div>
                                    <div class="lesDifferentsSelect">
                                        <div class="materials-filter filter">
                                            <div class="content">
                                                <label>
                                                    <select name="materiaux[]" class="ui fluid selection dropdown no label" multiple="">
                                                        <option value="">Matériaux</option>
                                                        <option value="bois">Bois</option>
                                                        <option value="tissu">Tissu</option>
                                                        <option value="soie">Soie</option>
                                                        <option value="marbre">Marbre</option>
                                                        <option value="laine">Laine</option>
                                                        <option value="verre">Verre</option>
                                                        <option value="acier">Acier</option>
                                                        <option value="cuir">Cuir</option>
                                                    </select>
                                                </label>
                                            </div>
                                        </div>

                                        <div class="color-filter filter">
                                            <div class="content">
                                                <label>
                                                    <select name="couleur[]" class="ui fluid selection dropdown no label" multiple="">
                                                        <option value="">Couleur</option>
                                                        <option value="gris">Gris</option>
                                                        <option value="blanc">Blanc</option>
                                                        <option value="noir">Noir</option>
                                                        <option value="or">Or</option>
                                                        <option value="bleu">Bleu</option>
                                                        <option value="marron">Marron</option>
                                                    </select>
                                                </label>
                                            </div>
                                        </div>

                                        <div class="categorie-filter filter">
                                            <div class="content">
                                                <label>
                                                    <select name="categorie[]" class="ui fluid selection dropdown no label" multiple="">
                                                        <option value="">Catégorie</option>
                                                        <option value="1">Canapés</option>
                                                        <option value="2">Tables</option>
                                                        <option value="3">Decorations</option>
                                                        <option value="4">Meubles</option>
                                                    </select>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="lesDeuxBoutons">
                                        <button type="submit" class="btnPrice" id="filterButton">Filtrer</button>
                                        <a href="{{ url('/tousProduits')}}"><button class="btnReset blue-text">Réinitialiser</button></a>
                                    </div>
                                </div>

                            </form>
                        </nav>
                    </div>


                    <div class="article-entier">
                        <div class="articles-carousel">

                            <div class="carousel-container">


                                @forelse($articles as $index => $article)
                                    <a href="product/{{$article->nom}}" class="article {{ $index == 0 ? 'active' : '' }}">
                                        <img src="article_image/{{$article->articleImg}}/image1.png" alt="{{$article->nom}}" class="article-image">
                                        <div class="article-content">
                                            <h2 class="article-title">{{$article->nom}}</h2>
                                            <p class="article-price">{{$article->prix}} €</p>
                                        </div>
                                    </a>
                                @empty
                                    <div class="filter-not-found">
                                        <i class="fas fa-exclamation-triangle"></i>
                                        <div class="empty-article-text">Aucun article ne correspond à votre recherche</div>
                                        <a href="{{ url('/tousProduits')}}"><button class="button-continue-search">Continuer à chercher</button></a>
                                    </div>
                                @endforelse
                            </div>
                            <div class="prev-arrow" id="prevArrow">
                                <i class="fa-solid fa-chevron-left"></i>
                            </div>
                            <div class="next-arrow" id="nextArrow">
                                <i class="fa-solid fa-chevron-right"></i>
                            </div>


                        </div>
                        <div class="carousel-navigation">
                            @foreach($articles as $index => $article)
                                <div class="carousel-dots {{ $index == 0 ? 'active' : '' }}" onclick="currentSlide({{ $index + 1 }})"></div>
                            @endforeach
                        </div>
                    </div>
                    </div>

                @else
                    <div class="filter-not-found">
                        <i class="fas fa-exclamation-triangle"></i>
                        <div class="empty-article-text">Aucun article ne correspond à votre recherche !</div>
                        <a href="{{ url('/tousProduits')}}"><button class="button-continue-search">Continuer à chercher</button></a>
                    </div>
                @endif


@endsection

