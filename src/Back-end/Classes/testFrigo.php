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

$listeIng1 = array($farine, $eau, $sel);
$listeQte1 = array(2, 1, 0.5);
$recette1 = new Recette(1, $listeIng1, $listeQte1);

$oeuf=new Ingredient(4, "Oeuf", 2.9, "kg");
$tomate=new Ingredient(5, "Tomate", 4, "kg");
$fromage=new Ingredient(6, "Fromage", 10, "kg");
$jambon=new Ingredient(7, "Jambon", 10, "kg");
$oignon=new Ingredient(8, "Oignon", 1.2, "kg");
$olives=new Ingredient(9, "Olives", 15, "kg");

$listeIng2 = array($farine, $eau, $sel, $oeuf, $tomate, $fromage, $jambon, $oignon, $olives);
$listeQte2 = array(2, 1, 0.5, 1, 1, 1, 1, 1, 1);
$recette2 = new Recette(2, $listeIng2, $listeQte2);

$ingredientFrigo = array($farine, $oeuf, $tomate);
$quantiteFrigo = array(1, 3, 4);
$frigo = new Frigo($ingredientFrigo, $quantiteFrigo);

/*
echo $recette->calculPrixRecette();
echo "<br>";
echo $recette2->calculPrixRecette();
*/

$recette1->compterIngredientCommun($frigo);
echo $recette1->getNbIngredientCommun();
echo "<br>";
echo count($recette2->getIngredients());

