<?php
include '../Back-end/Classes/BaseDeDonnees.php';

$bdd = new BaseDeDonnees();

session_start();
$titreRecette = $_SESSION['titre'];

$nbIngredients = $_POST['nbIngredients'];
$nbEtapes = $_POST['nbEtapes'] +1;

$listeNomIngredients = array();
$listeQuantiteIngredients = array();
$listeEtapes = array();

for ($i = 1; $i < $nbIngredients; $i++) {
    $postIngredientValue = 'ingredient'.$i;
    $postQuantiteValue = 'quantite'.$i;
    array_push($listeNomIngredients, $_POST[$postIngredientValue]);
    array_push($listeQuantiteIngredients, $_POST[$postQuantiteValue]);
}

for ($i = 1; $i < $nbEtapes; $i++) {
    array_push($listeEtapes, $_POST['etape'.$i]);
}

$bdd->insererDansComposer($titreRecette, $listeNomIngredients, $listeQuantiteIngredients);
$bdd->insererDansEtape($titreRecette, $listeEtapes);

header('Location: ../Front-end/pageAccueil.php');