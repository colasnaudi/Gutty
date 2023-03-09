<?php
include 'BaseDeDonnees.php';
include 'Recette.php';

$bddGutty = new BaseDeDonnees();

$table = 'Recette';

$resultat = $bddGutty->getRecettes();

$listeRecettes = array();

foreach ($resultat as $r){
    echo '<p>';
    $recette = new Recette($r['nom'],[],[]);
    echo $r['nom'];
    $recette->setIngredients($bddGutty->getIngredientsRecette($r['id']));
    //var_dump($bddGutty->getIngredientsRecette($r['nom']));
    var_dump($bddGutty->getNomIngredients($recette->getIngredients()));
    array_push($listeRecettes, $recette);
    echo '</p>';
}

//afficher les ingrédients de chaque recette

var_dump($listeRecettes);