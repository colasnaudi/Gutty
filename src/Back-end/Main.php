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

//RECETTE DE PAIN
$recette = new Recette(1, "Pain", 0.5, 0.5);
$recette->ajouteIngredient($farine);
$recette->ajouteIngredient($eau);
$recette->ajouteIngredient($sel);



$oeuf=new Ingredient(4, "Oeuf", 2.9, "kg");
$tomate=new Ingredient(5, "Tomate", 4, "kg");
$fromage=new Ingredient(6, "Fromage", 10, "kg");
$jambon=new Ingredient(7, "Jambon", 10, "kg");
$oignon=new Ingredient(8, "Oignon", 1.2, "kg");
$olives=new Ingredient(9, "Olives", 15, "kg");

//RECETTE DE PIZZA
$recette2 = new Recette(2, "pizza", 0.5, 0.5);
$recette2->ajouteIngredient($farine);
$recette2->ajouteIngredient($eau);
$recette2->ajouteIngredient($sel);
$recette2->ajouteIngredient($oeuf);
$recette2->ajouteIngredient($tomate);
$recette2->ajouteIngredient($fromage);
$recette2->ajouteIngredient($jambon);
$recette2->ajouteIngredient($oignon);
$recette2->ajouteIngredient($olives);

$creme_fraiche=new Ingredient(10, "Creme fraiche", 4, "kg");
$poivre=new Ingredient(11, "Poivre", 40, "kg");
$pates=new Ingredient(12, "Pates", 1, "kg");
$lardons=new Ingredient(13, "Lardons", 6.7, "kg");


//RECETTE DE PATES CARBONARA
$recette3 = new Recette(3, "pates carbonara", 0.5, 0.5);
$recette3->ajouteIngredient($creme_fraiche);
$recette3->ajouteIngredient($poivre);
$recette3->ajouteIngredient($pates);
$recette3->ajouteIngredient($lardons);
$recette3->ajouteIngredient($sel);
$recette3->ajouteIngredient($oeuf);
$recette3->ajouteIngredient($oignon);

$carotte=new Ingredient(14, "Carotte", 1, "kg");
$beurre=new Ingredient(15, "Beurre", 7, "kg");
$bourgignon=new Ingredient(16, "Bourgignon", 16.5, "kg");
$vin_rouge=new Ingredient(17, "Vin rouge", 7, "L");

//RECETTE DE BOEUF BOURGUIGNON
$recette4 = new Recette(4, "boeuf bourguignon", 0.5, 0.5);
$recette4->ajouteIngredient($carotte);
$recette4->ajouteIngredient($beurre);
$recette4->ajouteIngredient($bourgignon);
$recette4->ajouteIngredient($vin_rouge);
$recette4->ajouteIngredient($sel);
$recette4->ajouteIngredient($poivre);
$recette4->ajouteIngredient($oignon);


$livreRecette = new LivreRecette();



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

$ingredient = new Ingredient(1, "Farine", 0.5, "kg");
$ingredient->modifierIngredient(2, "Eau", 0.5, "L");

echo $ingredient->toString();