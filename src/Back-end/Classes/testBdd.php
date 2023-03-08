<?php
include 'BaseDeDonnees.php';
include 'Ingredient.php';

$bddGutty = new BaseDeDonnees();

$table = 'Ingredient';

$resultat = $bddGutty->getColumns($table);


$object = $bddGutty->objectToObject($resultat, $table);

var_dump($object);

$listeIngredient = array("Lait", "Farine", "Oeuf", "Tomate");
$listeQte = array(1, 2, 3, 4);
//MARCHE
/*
$bddGutty->insererUneRecette("TestAjoutPhp", "Etape1 : Je test \n Etape2 : Je test encore", "X", "10min", 2, 1);
$bddGutty->insererDansComposer("TestAjoutPhp", $listeIngredient, $listeQte);
echo "Recette ajoutée";
*/

$bddGutty->ajouterRecette("TestAjoutPhp", "Etape1 : Je test \nEtape2 : Je test encore", "X", "10min", 2, $listeIngredient, $listeQte);
echo "Recette ajoutée";

