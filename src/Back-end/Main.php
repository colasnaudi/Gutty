<?php
/**
 * @created 2022-12-12
 * @author CELLE Guillian, GARCIA Angel, LAGÜE Mathis
 * @version 1.0
 * @description Main du projet
 */

//INCLUSIONS
include_once 'Ingredient.php';
include_once 'Recette.php';
include_once 'LivreIngredient.php';
include_once 'LivreRecette.php';

$recette = new Recette(1, "Pain", 0.5, 0.5);
$recette->ajouteIngredient(new Ingredient(1, "Farine", 0.5, "kg"));
$recette->ajouteIngredient(new Ingredient(2, "Eau", 0.5, "L"));
$recette->ajouteIngredient(new Ingredient(3, "Sel", 0.5, "kg"));
$recette2 = new Recette(2, "pizza", 0.5, 0.5);
$recette2->ajouteIngredient(new Ingredient(1, "Farine", 0.5, "kg"));
$recette2->ajouteIngredient(new Ingredient(2, "Eau", 0.5, "L"));
$recette2->ajouteIngredient(new Ingredient(3, "Sel", 0.5, "kg"));
$recette2->ajouteIngredient(new Ingredient(4, "Oeuf", 0.5, "kg"));
$recette2->ajouteIngredient(new Ingredient(5, "Tomate", 0.5, "kg"));
$recette2->ajouteIngredient(new Ingredient(6, "Fromage", 0.5, "kg"));
$recette2->ajouteIngredient(new Ingredient(7, "Jambon", 0.5, "kg"));
$recette2->ajouteIngredient(new Ingredient(8, "Oignon", 0.5, "kg"));
$recette2->ajouteIngredient(new Ingredient(9, "Olives", 0.5, "kg"));

// get the list of ingredients in the recipe
$ingredients = $recette->getIngredients();
$ingredients2 = $recette2->getIngredients();

echo "<br>";
$livreRecette = new livreRecette();
$livreRecette->ajouteRecette($recette);
$livreRecette->ajouteRecette($recette2);
$Recettes = $livreRecette->getRecettes();

foreach ($Recettes as $recette) {
    echo $recette->toString();
    echo '<br>';
}

echo "<br>";
$livreIngredient = new livreIngredient(array());

foreach ($livreIngredient as $ingredient) {
    foreach ($ingredient as $ingredient2) {
        $livreIngredient->ajouteIngredient($ingredient2);
    }
}

$MesIngredients = $livreIngredient->getIngredients();

foreach ($MesIngredients as $ingredient) {
    echo $ingredient->toString() . "<br>";
}
