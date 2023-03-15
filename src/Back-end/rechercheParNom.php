<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Front-end/RechercheParNom.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <title>Accueil-Gutty</title>
</head>
<body>
<?php
include_once '../Front-end/header.html';
?>
<main>
    <?php
include 'Classes/BaseDeDonnees.php';
$bdd = new BaseDeDonnees();

$recherche = $_POST['recetteRecherche'];

$resultatRecherche = $bdd->rechercherParNom($recherche);
?>
<div class="container listeRecette">
    <h2>Recettes rouvées <?php echo "(".sizeof($resultatRecherche)." recettes)" ?></h2>
    <?php
    foreach ($resultatRecherche as $recette) {?>
            <div class="Recette">
                <a href="../Front-end/afficherUneRecette.php?recette=<?php echo $recette; ?>" alt="Lien vers la page de la recette <?php echo $recette; ?>" class="recette col-lg-4 col-sm-12 col-xs-12">
                    <?php
                    echo '<div class="col-lg-3">';
                    echo '<img src="../Front-end/images/'.$recette.'.jpg" alt="Image de la recette'.$recette.'" >';
                    echo '<h3>'.$recette.'</h3>';
                    echo '</div>';
                    echo '</a>';
echo '</div>';
    }
?>
</main>
</body>
</html>
