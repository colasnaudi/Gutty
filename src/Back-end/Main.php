<?php
/**
 * @created 2022-12-12
 * @author CELLE Guillian, GARCIA Angel, LAGÜE Mathis
 * @version 1.0
 * @description Main du projet
 */

//INCLUSIONS
include_once 'Classes/Ingredient.php';
include_once 'Classes/Recette.php';
include_once 'Classes/LivreIngredient.php';
include_once 'Classes/LivreRecette.php';
include_once  'Classes/Frigo.php';


$farine=new Ingredient(1, "Farine", 1.1, "kg");
$eau=new Ingredient(2, "Eau", 0, "L");
$sel=new Ingredient(3, "Sel", 2, "kg");
$levure=new Ingredient(10, "Levure", 0.10, "unite");

//RECETTE DE PAIN
$recette = new Recette(1, "Pain", 0.5, 0.5);
$recette->ajouteIngredient($farine, 0.5);
$recette->ajouteIngredient($eau, 0.300);
$recette->ajouteIngredient($sel, 1);
$recette->ajouteIngredient($levure, 1);
$oeuf=new Ingredient(4, "Oeuf", 2.9, "unite");
$tomate=new Ingredient(5, "Tomate", 1.30, "unite");
$fromage=new Ingredient(6, "Fromage", 10, "kg");
$jambon=new Ingredient(7, "Jambon", 10, "kg");
$oignon=new Ingredient(8, "Oignon", 1.2, "unite");
$olives=new Ingredient(9, "Olives", 15, "kg");


//RECETTE DE PIZZA
$recette2 = new Recette(2, "pizza", 0.5, 0.5);
$recette2->ajouteIngredient($farine, 0.350 );
$recette2->ajouteIngredient($eau, 0.250);
$recette2->ajouteIngredient($sel, 1);
$recette2->ajouteIngredient($levure, 1);
$recette2->ajouteIngredient($tomate, 3);
$recette2->ajouteIngredient($fromage, 0.5);
$recette2->ajouteIngredient($jambon, 0.5);
$recette2->ajouteIngredient($oignon, 2);
$recette2->ajouteIngredient($olives, 0.1);

$creme_fraiche=new Ingredient(10, "Creme fraiche", 4, "kg");
$poivre=new Ingredient(11, "Poivre", 40, "kg");
$pates=new Ingredient(12, "Pates", 1, "kg");
$lardons=new Ingredient(13, "Lardons", 6.7, "kg");


//RECETTE DE PATES CARBONARA
$recette3 = new Recette(3, "pates carbonara", 0.5, 0.5);
$recette3->ajouteIngredient($creme_fraiche, 0.5);
$recette3->ajouteIngredient($poivre, 1);
$recette3->ajouteIngredient($pates, 0.5);
$recette3->ajouteIngredient($lardons, 0.250);
$recette3->ajouteIngredient($sel, 1);
$recette3->ajouteIngredient($oeuf, 3);
$recette3->ajouteIngredient($oignon, 1);

$carotte=new Ingredient(14, "Carotte", 1, "unite");
$beurre=new Ingredient(15, "Beurre", 7, "kg");
$bourgignon=new Ingredient(16, "Bourgignon", 16.5, "kg");
$vin_rouge=new Ingredient(17, "Vin rouge", 7, "L");

//RECETTE DE BOEUF BOURGUIGNON
$recette4 = new Recette(4, "boeuf bourguignon", 0.5, 0.5);
$recette4->ajouteIngredient($carotte, 4);
$recette4->ajouteIngredient($beurre, 0.100);
$recette4->ajouteIngredient($bourgignon, 0.6 );
$recette4->ajouteIngredient($vin_rouge, 0.75);
$recette4->ajouteIngredient($sel,1);
$recette4->ajouteIngredient($poivre, 1);
$recette4->ajouteIngredient($oignon, 4);


$livreRecette = new LivreRecette();

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

$ingredient = new Ingredient(1, "Farine", 0.5, "kg");
$ingredient->modifierIngredient(2, "Eau", 0.5, "L");

echo $ingredient->toString();

$recetteX = new Recette(1, "Pain", 0.5, 0.5);
$recetteX->ajouteIngredient(new Ingredient(1, "Farine", 0.5, "kg"),2);
$recetteX->ajouteIngredient(new Ingredient(2, "Eau", 0.5, "l"),1);
$recetteX->ajouteIngredient(new Ingredient(3, "Sel", 0.5, "kg"),0.5);

foreach($recetteX->getQuantite() as $quantite) {
    echo $recetteX->convertirQuantite($quantite, "kg", "mg") . "<br>";
}
