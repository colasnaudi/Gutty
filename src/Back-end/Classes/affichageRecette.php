<?php

//INCLUSIONS
include_once  'Frigo.php';
include_once 'Ingredient.php';
include_once 'Recette.php';
include_once 'LivreIngredient.php';
include_once 'LivreRecette.php';

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
$poivre=new Ingredient(11, "Poivre", 2, "unite");
$pates=new Ingredient(12, "Pates", 1, "kg");
$lardons=new Ingredient(13, "Lardons", 6.7, "kg");
$carotte=new Ingredient(14, "Carotte", 1.4, "unite");
$beurre=new Ingredient(15, "Beurre", 7, "kg");
$bourgignon=new Ingredient(16, "Bourgignon", 16.5, "kg");
$vin_rouge=new Ingredient(17, "Vin rouge", 7, "L");
$creme_fraiche=new Ingredient(18, "Creme fraiche", 4, "L");

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
$listeIngredientRecette4 = array($carotte, $beurre, $bourgignon, $vin_rouge, $sel, $poivre, $oignon);
$listeQuantiteRecette4 = array(4, 0.100, 0.6, 0.75, 1, 1, 4);
$recette4 = new Recette("Boeuf bourguignon", $listeIngredientRecette4, $listeQuantiteRecette4);

//RECETTE TEST MATHIS - 6.125€
$listeIngredientRecette5 = array($creme_fraiche, $poivre, $pates, $lardons, $sel, $oignon);
$listeQuantiteRecette5 = array(0.25, 1, 0.25, 0.250, 1, 1);
$recette5 = new Recette("Pates Mathis", $listeIngredientRecette5, $listeQuantiteRecette5);






?>




<?php
/*
//boucle pour afficher les recettes avec au moins deux ingrédients en commun
for($i=0; $i<sizeof($listeRecettes); $i++){
    $recette1 = $listeRecettes[$i];
    for($j=$i+1; $j<sizeof($listeRecettes); $j++){
        $recette2 = $listeRecettes[$j];
        $listeIngredientsCommuns = $recette1->getIngredientsCommuns($recette2);
        if(sizeof($listeIngredientsCommuns) >= 2){
            echo $recette1->getNomRecette() . " et " . $recette2->getNomRecette() . " ont au moins deux ingrédients en commun : ";
            for($k=0; $k<sizeof($listeIngredientsCommuns); $k++){
                echo $listeIngredientsCommuns[$k]->getNomIngredient() . " ";
            }
            echo "<br>";
        }
    }

}
*/




$listeRecettes = array($recette1, $recette2, $recette3,$recette4, $recette5);

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
    <div class="recipes-container">
        <h2>Liste de recettes</h2>
        <ul>
            <?php for($i=0; $i<sizeof($listeRecettes); $i++){ ?>
                <li class="recipe">
                    <a href="afficheListeRecette.php?recette=<?php echo $listeRecettes[$i]->getNomRecette(); ?>">
                    <?php
                    $listeRecettes[$i]->setPrixAjout($i);
                    $listeRecettes[$i]->setPrixFrigo($i);


                    echo $listeRecettes[$i]->getNomRecette() . " : " . $listeRecettes[$i]->getPrixRecette() . "€"
                        . "   prix ajout = " . $listeRecettes[$i]->getPrixAjout()
                        . "  prix frigo =  " . $listeRecettes[$i]->getPrixFrigo()?>
                </li>
            <?php } ?>
        </ul>
    </div>
    <!--<div class="carac-recette">
        <h2>Caractéristiques</h2>
        <div class="ingredients">
            <div class="row"><h3 class="ingr-titre">nom recette</h3><?php echo $recette3->getNomRecette(); ?></div>
            <div class="row"><p class="ingr-titre"></p> <?php echo $recette4->getNomRecette(); ?></div>
            <div class="row"><p class="ingr-titre"></p> <?php echo $recette1->getNomRecette(); ?></div>
            <div class="row"><p class="ingr-titre"></p> <?php echo $recette2->getNomRecette(); ?></div>
            <div class="row"><p class="ingr-titre"></p> <?php echo $recette5->getNomRecette(); ?></div>

        </div>
            <p></p>
        </div>

-->