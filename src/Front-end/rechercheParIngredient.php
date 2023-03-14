<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="rechercheParIngredient.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <title>RechercheParIngrédient-Gutty</title>
</head>
<body>
<?php
include_once 'header.html';
?>
<main>
    <div class="recherche_box_ing">
        <input type="text" name="" id="ing_recherche" onkeyup="recherche_ingredient()" placeholder="Rechercher ingrédient" />
        <a class="bouton_rechercher_ing" href="#">
            <i class="fa fa-search" aria-hidden="true"></i>
        </a>
    </div>
    <form action="../Back-end/resultatRechercheIngredientSansQuantite.php" method="post" class="liste-ingredient_bouton">
    <div class="Ingredients">
                <?php
                include_once '../Back-end/CreationIngredient.php';
                include_once '../Back-end/Classes/Recette.php';

                $livreIngredient = $_SESSION['livreIngredient'];
                $livreRecette = $_SESSION['livreRecette'];
                $livreEtape = $_SESSION['livreEtape'];
                foreach($livreIngredient->getListeIngredients() as $ingredient) {
                        echo '<div class="ingredient" id="id'.$ingredient->getNomIngredient().'"onclick="changeColor(event)">';
                        echo '<label for="'.$ingredient->getNomIngredient().'">'.$ingredient->getNomIngredient().'</label>';;
                        echo '<input type="checkbox" id="'.$ingredient->getNomIngredient().'" name="Ingredient[]" value="'.$ingredient->getNomIngredient().'" class="checkbox"/>';
                        echo '</div>';
                    }
                ?>
        </div>
        <div class="bouton_suivant">
            <input type="submit" value="Saisir les quantités" id="SaisirQte" formaction="../Back-end/choixQuantiteRecherche.php">
            <input type="submit" value="Rechercher sans quantité" id="RechercheSansQte" formaction="../Back-end/resultatRechercheIngredientSansQuantite.php">
        </div>
        </form>
</main>
<footer>

</footer>

<script src="Ingredient.js"></script>
<script>
    /*Faire réapparaitre les ingrédients quand on coche une case*/
    document.addEventListener("DOMContentLoaded", function() {
        /*On récupère les informations de la page précédente*/
        document.querySelector("body").addEventListener("change", function(event) {
            /*On vérifie les changements dans les checkbox*/
            if (event.target.matches(".checkbox")) {
                /*si la checkbox est modifiée*/
                document.getElementById('ing_recherche').value = "";
                /*On récupère la liste des ingrédients*/
                recherche_ingredient();
                /*On affiche les ingrédients*/
            }
        });
    });
</script>
</body>
</html>