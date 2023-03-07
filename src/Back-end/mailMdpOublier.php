<?php

include 'Classes/BaseDeDonnees.php';

$bddGutty = new BaseDeDonnees();

$nom = $_POST['nom'];
$mail = $bddGutty->getMail($nom);

if($mail) {
    $cle = $bddGutty->genererCleVerif($nom);
} else {
    $nomTemp = $bddGutty->getNom($nom);
    if($nomTemp) {
        $mail = $nom;
        $nom = $nomTemp;
        $cle = $bddGutty->genererCleVerif($nom);
    } else {
        echo "Nom ou mail inconnu";
    }
}

if($cle != null) {
    $sujet = "Gutty - Mot de passe oublié";
    $entete = "From: Gutty";
    $message = "Bonjour $nom,\n
    Mot de passe oublié ? Pas de panique, c'est facile de le réinitialiser.\n
    Pour réinitialiser votre mot de passe, veuillez cliquer sur le lien ci-dessous ou copier/coller dans votre navigateur internet.\n
    localhost:63342/Gutty/src/Front-end/resetMdp.php?log='.urlencode($nom).'&cle='.urlencode($cle).'\n
    \n
    ---------------\n
    Ceci est un mail automatique, Merci de ne pas y répondre.";

    mail($mail, $sujet, $message, $entete) ;
}

