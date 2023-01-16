<?php
//INCLUSIONS
include_once 'Ingredient.php';
include_once 'Recette.php';
include_once 'LivreIngredient.php';
include_once 'LivreRecette.php';
include_once  'Frigo.php';

$farine=new Ingredient(1, "Farine", 1.1, "kg");
$eau=new Ingredient(2, "Eau", 0, "L");
$sel=new Ingredient(3, "Sel", 2, "kg");

$recette = new Recette(1, "Pain", 0.5, 0.5);
$recette->ajouteIngredient($farine, 1);
$recette->ajouteIngredient($eau, 1);
$recette->ajouteIngredient($sel, 0.1);

$oeuf=new Ingredient(4, "Oeuf", 2.9, "kg");
$tomate=new Ingredient(5, "Tomate", 4, "kg");
$fromage=new Ingredient(6, "Fromage", 10, "kg");
$jambon=new Ingredient(7, "Jambon", 10, "kg");
$oignon=new Ingredient(8, "Oignon", 1.2, "kg");
$olives=new Ingredient(9, "Olives", 15, "kg");


$recette2 = new Recette(2, "Pizza", 0.5, 0.5);
$recette2->ajouteIngredient($farine, 1);
$recette2->ajouteIngredient($eau, 1);
$recette2->ajouteIngredient($sel, 0.1);
$recette2->ajouteIngredient($oeuf, 1);
$recette2->ajouteIngredient($tomate, 1);
$recette2->ajouteIngredient($fromage, 1);
$recette2->ajouteIngredient($jambon, 1);
$recette2->ajouteIngredient($oignon, 1);
$recette2->ajouteIngredient($olives, 1);

$livreRecette = new livreRecette();
$livreRecette->ajouteRecette($recette);
$livreRecette->ajouteRecette($recette2);

$ingredientFrigo = array($farine, $oeuf, $tomate);
$quantiteFrigo = array(1, 3, 4);
$frigo = new Frigo($ingredientFrigo, $quantiteFrigo);

$recettePossible = $frigo->genererPossibleRecette($livreRecette);
foreach ($recettePossible as $recette) {
    echo $recette->getNomRecette();
}
