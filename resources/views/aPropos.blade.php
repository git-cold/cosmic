@section('css-js')
    <link rel="stylesheet" href="{{ asset('css/aPropos_style.css')}} ">
    <link rel="stylesheet" href="{{ asset('css/baseLayoutStyle.css') }}">
@endsection
    @extends('layouts.navbar')
    @section('class', 'aPropos-container')
    @section('container')



        <section class = "hero-section" id = "hero-section">

            <div class="container hero-container">
                <div class="container-text">
                    <div class="fond">
                        <!-- Hero texte primaire -->
                        <h1 class="primary">À propos.</h1>

                        <!-- Hero texte secondaire -->
                        <div class="texte-secondaire">
                            <p class="paragraphe paragraphe1">
                                Bienvenue sur Cosmic, l'espace où la créativité rencontre le confort, et où chaque pièce devient une toile pour exprimer votre style unique. Nous sommes un groupe passionné d'étudiants dédiés à transformer les espaces en sanctuaires personnalisés, reflétant la personnalité et le goût individuels.
                            </p>
                            <p class="paragraphe paragraphe2">
                                Notre mission est de rendre la décoration d'intérieur accessible à tous, en proposant des idées inspirantes et des solutions pratiques qui transcendent les tendances éphémères. Que vous cherchiez à rénover une pièce spécifique ou à redéfinir l'ensemble de votre espace, nous sommes là pour vous guider à chaque étape du processus.
                            </p>
                            <p class="paragraphe paragraphe4">
                                Parcourez nos articles et galeries pour trouver une source infinie d'inspiration, des idées créatives et des conseils pratiques pour chaque pièce de votre maison.

                                Explorez notre sélection soigneusement choisie de produits de décoration d'intérieur de qualité, allant des meubles aux accessoires, pour donner vie à vos idées.

                                Bénéficiez de nos services de consultation pour une guidance personnalisée. Nos experts sont là pour vous aider à concrétiser vos visions et à créer un espace qui vous ressemble vraiment.
                            </p>
                        </div>
                    </div>

                </span>
                </div>
            </div>



        </section>
    @endsection

