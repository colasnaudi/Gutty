<?php
require "Frigo.php";
require "Recette.php";


$Ingredient1 = new Ingredient(1, "Oeuf", 0.15, "unite");
$Ingredient2 = new Ingredient(2, "Lait", 1.04, "litre");
$Ingredient3 = new Ingredient(3, "Salade", 2, "unite");
$Ingredient4 = new Ingredient(4, "Chorizo", 5, "kg");
$Ingredient5 = new Ingredient(5, "Feta", 9.80, "kg");
$Ingredient6 = new Ingredient(6, "Thon", 17.83, "kg");
$Ingredient7 = new Ingredient(7, "Mayonnaise", 6.99, "kg");
$Ingredient8 = new Ingredient(8, "Riz", 1.96, "kg");

$listeIngredients = array($Ingredient1, $Ingredient2, $Ingredient3);
$listeQuantites = array(2, 1, 1);

$Frigo = new Frigo($listeIngredients, $listeQuantites);

echo $Frigo->toString();


