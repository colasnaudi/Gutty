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

//Ingrédients
$farine=new Ingredient(1, "Farine", 1.1, "kg");
$eau=new Ingredient(2, "Eau", 0, "L");
$sel=new Ingredient(3, "Sel", 2, "unite");
$oeuf=new Ingredient(4, "Oeuf", 0.4, "unite");
$tomate=new Ingredient(5, "Tomate", 1.30, "unite");
$fromage=new Ingredient(6, "Fromage", 10, "kg");
$jambon=new Ingredient(7, "Jambon", 10, "kg");
$oignon=new Ingredient(8, "Oignon", 1.2, "unite");
$olives=new Ingredient(9, "Olives", 15, "kg");
$levure=new Ingredient(10, "Levure", 0.10, "unite");
$poivre=new Ingredient(11, "Poivre", 2, "kg");
$pates=new Ingredient(12, "Pates", 1, "kg");
$lardons=new Ingredient(13, "Lardons", 6.7, "kg");
$carotte=new Ingredient(14, "Carotte", 1.4, "unite");
$beurre=new Ingredient(15, "Beurre", 7, "kg");
$bourgignon=new Ingredient(16, "Bourgignon", 16.5, "kg");
$vin_rouge=new Ingredient(17, "Vin rouge", 7, "L");
$creme_fraiche=new Ingredient(18, "Creme fraiche", 4, "L");

//RECETTE DE PAIN - Prix : 2,65€
//Frigo : 0.5 farine => Prix = 0.55
//Ajout : 2,65 - 0.55 = 2.1
$listeIngredientRecette1 = array($farine, $eau, $sel, $levure);
$listeQuantiteRecette1 = array(0.5, 0.300, 1, 1);
$recette1 = new Recette("Pain", $listeIngredientRecette1, $listeQuantiteRecette1);

//RECETTE DE PIZZA - 15.285€
//Frigo : 0.35 farine, 3 tomates => Prix = 4,285
//Ajout : 15.285 - 4.285 = 11
$listeIngredientRecette2 = array($farine, $eau, $sel, $levure, $tomate, $fromage, $jambon, $oignon, $olives);
$listeQuantiteRecette2 = array(0.350, 0.250, 1, 1, 3, 0.5, 0.5, 2, 0.1);
$recette2 = new Recette("Pizza", $listeIngredientRecette2, $listeQuantiteRecette2);

//RECETTE DE PATES CARBONARA - 8.575€
//Frigo : 3 oeufs => Prix = 1.2
//Ajout : 8.575 - 1.2 = 7.375
$listeIngredientRecette3 = array($creme_fraiche, $poivre, $pates, $lardons, $sel, $oeuf, $oignon);
$listeQuantiteRecette3 = array(0.5, 1, 0.5, 0.250, 1, 3, 1);
$recette3 = new Recette("Pates carbonara", $listeIngredientRecette3, $listeQuantiteRecette3);

//RECETTE DE BOEUF BOURGUIGNON - 27.55€
//Frigo : Rien => Prix = 0
//Ajout : 27.55 - 0 = 27.55
$listeIngredientRecette4 = array($carotte, $beurre, $bourgignon, $vin_rouge, $sel, $poivre, $oignon);
$listeQuantiteRecette4 = array(4, 0.100, 0.6, 0.75, 1, 1, 4);
$recette4 = new Recette("Boeuf bourguignon", $listeIngredientRecette4, $listeQuantiteRecette4);

//Livre de recette
$livreRecette = new LivreRecette();
$livreRecette->ajouteRecette($recette1);
$livreRecette->ajouteRecette($recette2);
$livreRecette->ajouteRecette($recette3);
$livreRecette->ajouteRecette($recette4);

//Un frigo
$ingredientFrigo = array($farine, $oeuf, $tomate);
$quantiteFrigo = array(1, 3, 4);
$frigo = new Frigo($ingredientFrigo, $quantiteFrigo);

//Tests
$str = $frigo->toString();
echo "Frigo : " . $str . "<br>";
foreach ($livreRecette->getRecettes() as $recette) {
    echo $recette->getNomRecette() . " : " . "<br>";
    $recette->calculerPrixFrigo($frigo);
    echo "Prix total : " . $recette->getPrixRecette() . "€" . "<BR>";
    echo "Prix frigo : " . $recette->getPrixFrigo() . "€" . "<BR>";
    echo "Prix ajout : " . $recette->getPrixAjout() . "€" . "<BR>";
    echo "<br>";
}
