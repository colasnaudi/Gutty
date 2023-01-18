<?php
include 'Classes/Ingredient.php';
include 'Classes/LivreIngredient.php';
include 'Classes/Recette.php';
include 'Classes/LivreRecette.php';
include 'Classes/Frigo.php';

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
$champignon=new Ingredient(19, "Champignon", 1.2, "kg");
$ail=new Ingredient(20, "Ail", 0.5, "unite");
$saumon=new Ingredient(21, "Saumon", 1.5, "kg");
$aneth=new Ingredient(22, "Aneth", 0.5, "unite");
$poisson=new Ingredient(23, "Poisson", 1.5, "kg");
$poireau=new Ingredient(24, "Poireau", 1.5, "kg");
$chou=new Ingredient(25, "Chou", 1.5, "kg");
$saucisse=new Ingredient(26, "Saucisse", 1.5, "kg");
$lentilles=new Ingredient(27, "Lentilles", 1.5, "kg");
$riz=new Ingredient(28, "Riz", 1.5, "kg");
$haricot=new Ingredient(29, "Haricot", 1.5, "kg");
$steak=new Ingredient(30, "Steak", 1.5, "kg");
$cotelette=new Ingredient(31, "Cotelette", 1.5, "kg");
$boeuf=new Ingredient(16, "Boeuf", 16.5, "kg");

//RECETTE DE PAIN - Prix : 2,65€
$listeIngredientRecette1 = array($farine, $eau, $sel, $levure);
$listeQuantiteRecette1 = array(0.5, 0.300, 1, 1);
$recette1 = new Recette("Pain", $listeIngredientRecette1, $listeQuantiteRecette1);

//RECETTE DE PIZZA - 15.285€
$listeIngredientRecette2 = array($farine, $eau, $sel, $levure, $tomate, $fromage, $jambon, $oignon, $olives);
$listeQuantiteRecette2 = array(0.350, 0.250, 1, 1, 3, 0.5, 0.5, 2, 0.1);
$recette2 = new Recette("Pizza", $listeIngredientRecette2, $listeQuantiteRecette2);

//RECETTE DE PATES CARBONARA - 8.575€
$listeIngredientRecette3 = array($creme_fraiche, $poivre, $pates, $lardons, $sel, $oeuf, $oignon);
$listeQuantiteRecette3 = array(0.5, 1, 0.5, 0.250, 1, 3, 1);
$recette3 = new Recette("Pates carbonara", $listeIngredientRecette3, $listeQuantiteRecette3);

//RECETTE DE BOEUF BOURGUIGNON - 27.55€
$listeIngredientRecette4 = array($carotte, $beurre, $boeuf, $vin_rouge, $sel, $poivre, $oignon);
$listeQuantiteRecette4 = array(4, 0.100, 0.6, 0.75, 1, 1, 4);
$recette4 = new Recette("Boeuf bourguignon", $listeIngredientRecette4, $listeQuantiteRecette4);

//RECETTE TEST MATHIS - 6.125€
$listeIngredientRecette5 = array($creme_fraiche, $poivre, $pates, $lardons, $sel, $oignon);
$listeQuantiteRecette5 = array(0.25, 1, 0.25, 0.250, 1, 1);
$recette5 = new Recette("Pates Mathis", $listeIngredientRecette5, $listeQuantiteRecette5);

$listeIngredients = array();
$listeRecettes = array();

array_push($listeIngredients, $farine, $eau, $sel, $oeuf, $tomate, $fromage, $jambon, $oignon, $olives, $levure, $poivre, $pates, $lardons, $carotte, $beurre, $bourgignon, $vin_rouge, $creme_fraiche, $champignon, $ail, $saumon, $aneth, $poisson, $poireau, $chou, $saucisse, $lentilles, $riz, $haricot, $steak, $cotelette, $boeuf);
array_push($listeRecettes, $recette1, $recette2, $recette3, $recette4, $recette5);

session_unset();
session_start();

if (!isset($_SESSION['livreIngredient']) && !isset($_SESSION['livreRecette'])) {
    $livreIngredient = new LivreIngredient($listeIngredients);
    $_SESSION['livreIngredient'] = $livreIngredient;

    $livreRecette = new LivreRecette($listeRecettes);
    $_SESSION['livreRecette'] = $livreRecette;
}

else
{
    $livreIngredient = $_SESSION['livreIngredient'];
    $livreRecette = $_SESSION['livreRecette'];
}
