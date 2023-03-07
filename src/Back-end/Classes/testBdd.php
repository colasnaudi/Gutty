<?php
include 'BaseDeDonnees.php';
include 'Ingredient.php';

$bddGutty = new BaseDeDonnees();

$table = 'Ingredient';

$resultat = $bddGutty->getColumns($table);


$object = $bddGutty->objectToObject($resultat, $table);

var_dump($object);