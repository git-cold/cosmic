<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administration des produits</title>
    <link rel="stylesheet" href="{{ asset('css/gestionArticle_style.css')}} ">
</head>
<body>
<div class="administration">
    <div class="titreAdministration">
        <h1 class="titre">Administration des produits</h1>
    </div>

    <!-- Formulaire pour ajouter un produit -->
    <div class="gestion">
        <div class="ajouterProduit">
            <div class="titreAjoutProduit">
                <h2>Ajouter un produit</h2>
            </div>
            <form action="{{url('GestionStock/addArticle')}}" method="get">
                <label for="nom">Nom du produit:</label>
                <input type="text" id="nom" name="nom" required>

                <label for="prix">Prix:</label>
                <input type="text" id="prix" name="prix" required>

                <label for="qteStock">Quantité:</label>
                <input type="text" id="qteStock" name="qteStock" required>

                <label for="tauxRemise">Remise:</label>
                <input type="text" id="tauxRemise" name="tauxRemise">

                <label for="articleImg">Image URL:</label>
                <input type="text" id="articleImg" name="articleImg">

                <label for="artDescr">Description:</label>
                <input type="text" id="artDescr" name="artDescr">

                <label for="color1">color1:</label>
                <input type="text" id="color1" name="color1" required>

                <label for="color2">color2:</label>
                <input type="text" id="color2" name="color2" value="null">

                <label for="materiaux">materiaux:</label>
                <input type="text" id="materiaux" name="materiaux" required>

                <label for="accroche">accroche:</label>
                <input type="text" id="accroche" name="accroche" required>

                <label for="style">style:</label>
                <input type="text" id="style" name="style" required>

                <label for="couleurFiltre">couleurFiltre:</label>
                <input type="text" id="couleurFiltre" name="couleurFiltre" required>

                <label for="materiauxFiltre">materiauxFiltre:</label>
                <input type="text" id="materiauxFiltre" name="materiauxFiltre" required>

                <label for="catID">Catégorie:</label>
                <input type="text" id="catID" name="catID" required>

                <button type="submit" onclick="alert('Ajouter le produit')">Ajouter le produit</button>
            </form>
            <div class="boutonRetour">
                <a class="bouton boutonReturn" href="{{url('/')}}">Retour à l'accueil</a>
            </div>
        </div>



        <div class="listeProduit">
            <!-- Liste des produits avec options de suppression et modification -->
            <div class="titreListeProduit">
                <h2>Liste des produits</h2>
            </div>
            <div class="CaracteristiquesArticle">
                <table>
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nom</th>
                        <th>Prix</th>
                        <th>Quantité</th>
                        <th>Remise</th>
                        <th>Image</th>
                        <th>Description</th>
                        <th>Catégorie</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($articles as $article)
                        <tr>
                            <td>{{$article->id}}</td>
                            <td>{{$article->nom}}</td>
                            <td>{{$article->prix}}</td>
                            <td>{{$article->qteStock}}</td>
                            <td>{{$article->tauxRemise}}</td>
                            <td>{{$article->articleImg}}</td>
                            <td>{{$article->artDescr}}</td>
                            <td>{{$article->catID}}</td>
                            <td><a href="ModifierProduit/{{$article->id}}" class="bouton bouton-modifier">Modifier</a></td>
                            <td><a href="DeleteProduit/{{$article->id}}" class="bouton bouton-supprimer" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet article?')">Supprimer</a></td>
                        </tr>
                    @endforeach
                    <!-- Ajoutez d'autres lignes pour chaque article si nécessaire -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</body>
</html>
