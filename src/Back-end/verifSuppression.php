<?php
include 'Classes/BaseDeDonnees.php';
session_start();
//DECLARATION DES VARIABLES
$loginError = true;
$bdd = new BaseDeDonnees();
$pseudo = $_POST['pseudo'];
$mdp = $_POST['mdp'];
$nom = $_SESSION['nom'];

//Check la connexion
if ($bdd->suppressionUtilisateur($pseudo, $mdp, $nom)) {
    header('Location: ../Front-end/connexion.php');
    exit();
}

header('Location: ../Front-end/MonCompte.php');
exit();


