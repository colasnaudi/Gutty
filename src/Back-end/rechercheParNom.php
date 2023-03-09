<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Front-end/pageAccueil.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <title>Accueil-Gutty</title>
</head>

<?php
include_once '../Front-end/header.html';
include 'Classes/BaseDeDonnees.php';
$bdd = new BaseDeDonnees();

$recherche = $_POST['recetteRecherche'];

$resultatRecherche = $bdd->rechercherParNom($recherche);

foreach ($resultatRecherche as $recette) {
    echo $recette;
    echo '<br>';
}
