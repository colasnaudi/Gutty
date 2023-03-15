<?php
include 'BaseDeDonnees.php';
include 'Recette.php';

$bddGutty = new BaseDeDonnees();

$bddGutty->ajouterCommentaire(2, 'yo', 2, 1);