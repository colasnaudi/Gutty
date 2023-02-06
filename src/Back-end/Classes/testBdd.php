<?php
include 'BaseDeDonnees.php';

$bddGutty = new BaseDeDonnees();

$pseudo = "MatHis";
$mail = "agarcia026@iutbayonne.univ-pau.fr";
$mdp = "root";
$mdp2 = "root";

echo $bddGutty->checkConnexion($pseudo, $mdp);


