<?php
include "../Back-end/Classes/BaseDeDonnees.php";

$bdd = new BaseDeDonnees();

$titre = $_POST['titre'];
$nbPersonnes = $_POST['nbPersonnes'];
$heuresRecette = $_POST['heuresRecette'];
$minutesRecette = $_POST['minutesRecette'];
$typeCuisson = $_POST['typeCuisson'];
//$imageRecette = $_POST['imageRecette'];
$imageRecette = "X";

$tempsRecette = strval($heuresRecette)."heures".strval($minutesRecette);

$bdd->insererDebutRecette($titre, $nbPersonnes, $tempsRecette, $typeCuisson, $imageRecette);

session_start();
$_SESSION['titre'] = $titre;
header('Location: ../Front-end/ajouterIngredientRecette.php');
