<?php
include 'BaseDeDonnees.php';

$bddGutty = new BaseDeDonnees();

$pseudo = "userTest";
$mail = "test@iutbayonne.univ-pau.fr";
$mdp = "root";
$mdp2 = "root";

$bddGutty->bannirUtilsateur($pseudo);