<?php
include 'Classes/BaseDeDonnees.php';
include 'Classes/Ingredient.php';
include 'Classes/LivreIngredient.php';
include 'Classes/Recette.php';
include 'Classes/LivreRecette.php';
include 'Classes/Frigo.php';

$bddGutty = new BaseDeDonnees();
$listeIngredients = array();
$listeRecettes = array();

//rÃ©cupÃ©rer les ingrÃ©dients de la BDD et les mettre dans $listeIngredients
$resultatIngredient = $bddGutty->getIngredients();

foreach ($resultatIngredient as $i) {
    $ingredient = new Ingredient($i['id'], $i['nom'], $i['image'], $i['prix'], $i['unite']);
    array_push($listeIngredients, $ingredient);
}

//rÃ©cupÃ©rer les recettes de la BDD et les mettre dans $listeRecettes
$resultat = $bddGutty->getRecettes();
foreach ($resultat as $r) {
    $quantite = $bddGutty->getQuantiteIngredientsParRecette($r['nom']);
    $ingredients = $bddGutty->getIngredientsParRecette($r['nom']);
    $recette = new Recette($r['nom'],$r['etape'],$r['image'],$r['temps'],$r['etat'],$r['nbPersonnes'],$r['idUtilisateur'],$r['typeCuisson'],$ingredients,$quantite);
    array_push($listeRecettes, $recette);
}


$livreIngredients = new LivreIngredient($listeIngredients);
$livreRecette = new LivreRecette($listeRecettes);

session_start();

if (!isset($_SESSION['livreIngredient']) && !isset($_SESSION['livreRecette'])) {
    $livreIngredients = new LivreIngredient($listeIngredients);
    $_SESSION['livreIngredient'] = $livreIngredients;
    $livreRecette = new LivreRecette($listeRecettes);
    $_SESSION['livreRecette'] = $livreRecette;
}
else
{
    $livreIngredients = new LivreIngredient($listeIngredients);
    $_SESSION['livreIngredient'] = $livreIngredients;
    $livreRecette = new LivreRecette($listeRecettes);
    $_SESSION['livreRecette'] = $livreRecette;
}
