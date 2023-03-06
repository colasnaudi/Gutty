<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="pageAccueil.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <title>Accueil-Gutty</title>
</head>
<body>
<?php
include_once 'header.html';
?>
<main>
    <div class="container listeRecette">
        <h2>Recettes aléatoires</h2>
            <?php
            //AFFICHER 7 RECETTES ALEATOIRES
            include '../Back-end/Classes/BaseDeDonnees.php';

            $bdd = new BaseDeDonnees();
            $resultatRecettes = $bdd->recettesDeLaSemaine();
            echo '<div class="recette">';
            foreach($resultatRecettes as $recette) {
                echo '<div class="col-lg-4 col-sm-12 col-xs-12 vignette">';
                echo '<img src="'.$recette['image'].'" alt="Image de la recette" >';
                echo '<div class="col-lg-12">';
                echo '<h3>'.$recette['nom'].'</h3>';
                echo '<p>' . implode(', ', $bdd->getIngredientsRecette($recette['id'])) . '</p>';
                echo '</div>';
                echo '</div>';
            }
            ?>
        </div>
</main>

<footer>

</footer>
</body>
</html>
