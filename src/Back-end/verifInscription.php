<?php
include 'Classes/BaseDeDonnees.php';

//DECLARATION DES VARIABLES
$mdpError = false;
$mailError = false;
$nomError = false;
$bdd = new BaseDeDonnees();
$pseudo = $_POST['nom'];
$mail = $_POST['mail'];
$mdp = $_POST['mdp'];
$mdp2 = $_POST['mdp2'];
$resultInscription = $bdd->checkInscription($pseudo, $mail, $mdp, $mdp2);

//Check l'inscription
if ($resultInscription['verif']) {
    header('Location: ../Front-end/pageAccueil.php');
}
else if ($resultInscription['erreur'] == 'mdp'){
    $mdpError = true;
    require '../Front-end/creerCompte.php';
}
else if ($resultInscription['erreur'] == 'mail'){
    $mailError = true;
    require '../Front-end/creerCompte.php';
}
else{
    $nomError = true;
    require '../Front-end/creerCompte.php';
}