<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Front-end/Accueil.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <title>Accueil-Gutty</title>
</head>
<body>
<header>
    <img src="../Front-end/logo.png" alt="Logo temporaire">
    <h1>Gutty</h1>
</header>

<?php
include 'Classes/Ingredient.php';
include 'Classes/LivreIngredient.php';
include 'Classes/Frigo.php';

$ingredientFrigos = array();
$quantiteFrigos = array();

session_start();
$livreIngredient = $_SESSION['livreIngredient'];

if(isset($_POST['quantite']) && !empty($_POST['quantite'])) {
    $ingredients = $_POST['ingredient'];
    $quantite = $_POST['quantite'];

    foreach($ingredients as $ingredient){
        $ingredientFrigos[] = $livreIngredient->retrouverIngredient($ingredient);
    }
    foreach($quantite as $quantites){
        $quantiteFrigos[] = $quantites;
    }
    $frigo = new Frigo($ingredientFrigos, $quantiteFrigos);
    echo "<p>";
    echo $frigo->toString();
    echo"</p>";
}
else
{
    echo "aucun ingrédient récupéré";
}
?>
