<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <title>Affichage recette-Gutty</title>
</head>
<body>
<header>
    <div class="partieHaute">
        <div class="logoEtTitre">
            <img src="logo.png" alt="Logo temporaire">
            <h1>Gutty</h1>
        </div>
        <div class="recherche">
            <input type="text" name="" id="ing_recherche" placeholder="Je recherche" />
            <a class="bouton_recherche" href="#">
                <i class="material-icons iconeRecherche">search</i>
            </a>
        </div>
        <div class="monCompte">
            <i class="material-icons iconeCompte">person</i>
        </div>
    </div>
    <div class="partieBasse">
        <div class="rechercheIngredient">
            <button>Recherche par ingrédient</button>
        </div>
        <div class="ajouterRecette">
            <button>Ajouter une recette</button>
        </div>
        <div class="recettesFavorites">
            <button>Recettes favorites</button>
        </div>


    </div>
</header>
<main>


</main>


<?php

//INCLUSIONS

include_once '../Back-end/CreationIngredient.php';

$ingredientFrigos = array();
$quantiteFrigos = array();


$livreIngredient = $_SESSION['livreIngredient'];
$livreRecette = $_SESSION['livreRecette'];

//boucle qui affiche les ingredients associés à la recette cliquée
foreach ($livreRecette->getListeRecettes() as $recette) {
    $quantite = $recette->getQuantite();
    $ingredient = $recette->getIngredients();
    if (isset($_GET['recette']) && $_GET['recette'] == $recette->getNomRecette()) {
        echo "<div class='nomRecette'><h2>Recette : " . $recette->getNomRecette() . "</h2></div>";
        echo "<div class='star-rating'>";
        echo "<span class='fa fa-star '></span>";
        echo "<span class='fa fa-star '></span>";
        echo "<span class='fa fa-star '></span>";
        echo "<span class='fa fa-star '></span>";
        echo "<span class='fa fa-star '></span></div>";
        echo "<div class='note'>";
        echo "<span> avis</span>";
        echo "</div>";

        echo "<h2>Image recette en dessous</h2>";
        echo "<img src= '' alt='Image de la recette'>";
        echo "<h3>Temps de préparation | Temps de cuisson</h3>";
        echo "<p class='traitIngredient'>Ingrédients</p>";
        //echo "<div class='trait'>";
        echo "<div class='partieRecette'>";
        foreach ($quantite as $index => $value)
            echo "<p class='IngredientRecette'>" . $ingredient[$index]->getNomIngredient() . "</p>";
        echo "<p>" . $quantite[$index];
        echo " " . $ingredient[$index]->getUnite() . "</p>";


    }
}
    echo "<p class='traitPreparation'>Préparation</p>";
    echo "<p class='traitCommentaires'>Commentaires</p>";


session_destroy();
?>
