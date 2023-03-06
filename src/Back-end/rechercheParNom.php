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
<body>
<header>
    <div class="partieHaute">
        <div class="logoEtTitre">
            <img src="../Front-end/logo.png" alt="Logo temporaire">
            <h1>Gutty</h1>
        </div>
        <div class="recherche">
            <input type="text" name="recetteRecherche" id="ing_recherche" placeholder="Je recherche" />
            <a class="bouton_recherche" href="rechercheParNom.php">
                <i class="material-icons iconeRecherche">search</i>
            </a>
        </div>
        <div class="monCompte">
            <i class="material-icons iconeCompte">person</i>
        </div>
    </div>
    <div class="partieBasse">
        <div class="rechercheIngredient">
            <button onclick="location.href='rechercheParIngredient.php'">Recherche par ingrédient</button>
        </div>
        <div class="ajouterRecette">
            <button>Ajouter une recette</button>
        </div>
        <div class="recettesFavorites">
            <button>Recettes favorites</button>
        </div>
    </div>
</header>

<?php
include 'Classes/BaseDeDonnees.php';
$bdd = new BaseDeDonnees();

$recherche = $_POST['recetteRecherche'];

$resultatRecherche = $bdd->rechercherParNom($recherche);

foreach ($resultatRecherche as $recette) {
    echo $recette;
    echo '<br>';
}