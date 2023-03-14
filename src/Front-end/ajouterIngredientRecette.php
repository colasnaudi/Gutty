<!DOCTYPE html>
<html lang="fr" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Front-end/ajouterIngredientRecette.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <script type = "text/javascript" src="ajouterIngredientRecette.js" defer></script>
    <title>Ajouter votre recette</title>
</head>
<body>
<?php
include_once '../Front-end/header.html';
?>
<main>
    <?php
    session_start();
    $titreRecette = $_SESSION['titre'];
    echo "<h1>$titreRecette</h1>";
    ?>
    <div class="formulaire">
        <form action="javascript:ajouterIngredient()">
            <input type="number" name="quantite" id="quantite" placeholder="Quantité" required>
            <input type="text" name="unite" id="unite" placeholder="Unité" required>
            <input type="text" name="ingredient" id="ingredient" placeholder="Ingrédient" required>
            <br>
            <input type="submit" value="Ajouter un ingrédient" id="boutonAjouterIngredient">
        </form>
    </div>
    <div id="mesIngredients">
        <h2>Mes ingrédients</h2>
    </div>
    <div class="formulaire">
        <form onsubmit="return false">
            <textarea name="etape" id="etape" placeholder="Etape" cols="73%" ></textarea>
            <br>
            <input type="submit" value="Ajouter une étape" id="boutonAjouterEtape" onclick="ajouterEtape()">
        </form>
        <div id="mesEtapes">
            <h2>Mes étapes</h2>
            <ol id="toutesLesEtapes">
            </ol>
        </div>
    </div>
    <form class="formulaire" action="../Front-end/ajouterIngredientRecetteEnBdd.php" method="post" id="formulaireCacher">
        <input type="submit" value="Ajouter votre recette" id="boutonAjouterRecette">
    </form>
</main>
