<?php
include 'Classes/BaseDeDonnees.php';

//DECLARATION DES VARIABLES
$mdpError = false;
$mailError = false;
$ecritureMailError = false;
$nomError = false;
$bdd = new BaseDeDonnees();

$pseudo = $_POST['nom'];
$mail = $_POST['mail'];
$mdp = $_POST['mdp'];
$mdp2 = $_POST['mdp2'];

$resultInscription = $bdd->checkInscription($pseudo, $mail, $mdp, $mdp2);

//Check l'inscription
if ($resultInscription['verif']) {
    $bdd->ajouterUtilisateur($pseudo, $mail, $mdp);
    header('Location: ../Front-end/pageAccueil.php');
}
if ($resultInscription['erreur'] == 'mdp'){
    $mdpError = true;
}
if ($resultInscription['erreur'] == 'mail'){
    $mailError = true;
}

if ($resultInscription['erreur'] == 'ecritureMail'){
    $ecritureMailError = true;
}

if ($resultInscription['erreur'] == 'nom'){
    $nomError = true;
}

require '../Front-end/creerCompte.php';
