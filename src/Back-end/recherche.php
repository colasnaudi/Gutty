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

<div class="recherche">
<?php
include 'Classes/Ingredient.php';
include 'Classes/LivreIngredient.php';
include 'Classes/Frigo.php';

session_start();
$livreIngredient = $_SESSION['livreIngredient'];

if(isset($_REQUEST['Ingredient']) && !empty($_REQUEST['Ingredient'])) {
    if(is_array($_REQUEST['Ingredient'])) {
        $ingredients = $_REQUEST['Ingredient'];
        echo '<form action="../Back-end/affichageRecette.php" method="post">';
        foreach($ingredients as $ingredient) {
            echo '<label for="quantite" class="ing">'.$ingredient. '</label> <br>';
            echo "<input type='number' class='quantiteIng' name='quantite[]' min='0' step='0.1'>";
            echo "<input type='hidden' name='ingredient[]' value='$ingredient'>";
            echo '<br>';
        }
        echo '<input type="submit" value="Ajouter au frigo" id="value">';
        echo '</form>';
    }
}
else
{
    echo "Aucun ingrédient sélectionné";
}
?>
</div>
