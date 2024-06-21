<!-- resources/views/editArticle.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier l'article</title>
    <link rel="stylesheet" href="{{ asset('css/editArticle_style.css')}} ">
</head>
<body>
<div class="edit">
    <div class="titreEdit">
        <h1 class="titre">Modifier l'article</h1>
    </div>
    <div class="formEdit">
        <!-- Formulaire de modification d'un article -->
        <form action="{{url('GestionStock/updateArticle')}}" method="post">
            @csrf
            <!--Utilisez la méthode HTTP PUT pour les mises à jour (simulée avec @method('put') pour le formulaire HTML)-->
            @method('put')

            <!--Vos champs de formulaire ici (productName, price, quantity, etc.) pré-remplis avec les données de l'article-->
            <input type="hidden" id="id" name="id" value="{{$article->id}}" required>

            <label for="nom">Nom du produit:</label>
            <input type="text" id="nom" name="nom" value="{{$article->nom}}" required>

            <label for="prix">Prix:</label>
            <input type="text" id="prix" name="prix" value="{{$article->prix}}" required>

            <label for="qteStock">Quantité:</label>
            <input type="text" id="qteStock" name="qteStock" value="{{$article->qteStock}}" required>

            <label for="tauxRemise">Remise:</label>
            <input type="text" id="tauxRemise" name="tauxRemise" value="{{$article->tauxRemise}}">

            <label for="articleImg">Image URL:</label>
            <input type="text" id="articleImg" name="articleImg" value="{{$article->articleImg}}" required>

            <label for="artDescr">Description:</label>
            <input type="text" id="artDescr" name="artDescr" value="{{$article->artDescr}}" required>

            <label for="color1">color1:</label>
            <input type="text" id="color1" name="color1" value="{{$article->color1}}" required>

            <label for="color2">color2:</label>
            <input type="text" id="color2" name="color2" value="{{$article->color2}}">

            <label for="materiaux">materiaux:</label>
            <input type="text" id="materiaux" name="materiaux" value="{{$article->materiaux}}" required>

            <label for="accroche">accroche:</label>
            <input type="text" id="accroche" name="accroche" value="{{$article->accroche}}" required>

            <label for="style">style:</label>
            <input type="text" id="style" name="style" value="{{$article->style}}" required>

            <label for="couleurFiltre">couleurFiltre:</label>
            <input type="text" id="couleurFiltre" name="couleurFiltre" value="{{$article->couleurFiltre}}" required>

            <label for="materiauxFiltre">materiauxFiltre:</label>
            <input type="text" id="materiauxFiltre" name="materiauxFiltre" value="{{$article->materiauxFiltre}}" required>

            <label for="catID">Categorie ID</label>
            <input type="text" id="catID" name="catID" value="{{$article->catID}}" required>

            <button type="submit">Enregistrer les modifications</button>
        </form>
    </div>
</div>
</body>
</html>
