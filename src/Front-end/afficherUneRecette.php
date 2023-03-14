<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc" crossorigin="anonymous">
    <link rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <title>Affichage recette-Gutty</title>
</head>
<body>
<?php
include_once 'header.html';

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
        echo "<a href='#TitreCommentaires'> avis</a>";
        echo "</div>";

        echo "<div class='affichageImage'>";
        echo "<img src= ". $recette->getImageRecette() ." alt='Image de la recette'>";
        echo "<h4>Temps de préparation: ". $recette->getTemps() ." | Temps de cuisson: ".$recette->getTypeCuisson()." | Nombre de personnes: " .$recette->getNbPersonne()."</h4>";
        echo "<div class='TitreIngredient'>";
        echo "<p>Ingrédients</p></div>";
        echo "<p> ________________________________________________________________________________________________________</p>";
        echo "<div class='container partieRecette'>";


            foreach ($quantite as $index => $quantiteRecette) {
                    echo "<div class='vignette'>";

                    echo "<p class='IngredientRecette'>" . $ingredient[$index]->getNomIngredient() . "</p>";
                    echo "<p>" . $quantiteRecette;
                    echo "<p> " . strtoupper($ingredient[$index]->getUnite()) . "</p>";
                echo "</div>";

            }
    }
}
        echo "<div class='TitrePreparation'>";
        echo "<p>Préparation</p></div>";
        echo "<p> ________________________________________________________________________________________________________</p>";

        echo "<div class='vignettePreparation'>";
        echo"</div>";

        echo "<div id='TitreCommentaires'>";
        echo "<p>Commentaires</p></div>";
        echo "<p> ________________________________________________________________________________________________________</p>";

        echo "<h3>Donnez votre avis</h3>";
        echo "<div class='partieCommentaires'>";
        echo"<form action='Commentaires' method='post' id='comm'>";
        echo"<div class='btns'>";
                        echo"<input type='text' placeholder= 'Ajouter un avis'/></div>";
                    echo"<div>";
                        echo"<button type='submit'>Envoyer</button>";
                    echo"</div>";
    echo"</div>";



session_destroy();
?>
