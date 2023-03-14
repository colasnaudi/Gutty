<?php
include 'Classes/BaseDeDonnees.php';
//DECLARATION DES VARIABLES
$loginError = true;


$bdd = new BaseDeDonnees();
$pseudo = $_POST['pseudo'];
$mdp = $_POST['mdp'];

//Check la connexion
if ($bdd->checkConnexion($pseudo, $mdp)) {
    header('Location: ../Front-end/pageAccueil.php');
}
else {
    require '../Front-end/connexion.php';
}
