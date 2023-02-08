<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Front-end/rechercheParIngredient.css">
    <link rel="stylesheet" href="../Front-end/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <title>Accueil-Gutty</title>
</head>
<body>
<header>
    <img src="../Front-end/logo.png" alt="Logo temporaire">
    <h1>Gutty</h1>
</header>
<?php
//INCLUSIONS

include_once 'CreationIngredient.php';

$ingredientFrigos = array();
$quantiteFrigos = array();

$livreIngredient = $_SESSION['livreIngredient'];
$livreRecette = $_SESSION['livreRecette'];

//boucle qui affiche les ingredients associés à la recette cliquée
foreach ($livreRecette->getListeRecettes() as $recette) {
    $quantite = $recette->getQuantite();
    $ingredient = $recette->getIngredients();
    if (isset($_GET['recette']) && $_GET['recette'] == $recette->getNomRecette()) {
        echo "<h2>Recette : " . $recette->getNomRecette() . "</h2>";
        echo "<h3>Ingredients :</h3>";

        foreach ($quantite as $index => $value) {
            echo "<p class='IngredientRecette'>" . $ingredient[$index]->getNomIngredient() . "</p>";
            echo "<p>" . $quantite[$index];
            echo " " . $ingredient[$index]->getUnite() . "</p>";
        }
    }
}
session_destroy();
?>
