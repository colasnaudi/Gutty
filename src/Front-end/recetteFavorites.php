<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="recettesFavorites.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <title>Accueil-Gutty</title>
</head>
<body>
<?php
include_once 'header.html';
?>
<main>
    <div class="container listeRecette">
        <h2>Vos recettes favorites</h2>
        <?php
        include '../Back-end/Classes/BaseDeDonnees.php';
        include '../Back-end/Classes/Recette.php';
        include '../Back-end/Classes/Ingredient.php';
        include '../Back-end/Classes/LivreIngredient.php';
        include '../Back-end/Classes/LivreRecette.php';
        include '../Back-end/Classes/Etape.php';

        $bddGutty = new BaseDeDonnees();
        session_start();
        $idUtilisateur = $bddGutty->getIdUtilisateur($_SESSION['nom']);
        $resultatRecettes = $bddGutty->recettesFavorites($idUtilisateur);

        echo '<div class="recette">';
        foreach($resultatRecettes as $resultat) {
        $recette = new Recette($resultat['nom'],[],$resultat['image'],$resultat['temps'],$resultat['etat'],$resultat['nbPersonnes'],$resultat['idUtilisateur'],$resultat['typeCuisson'],[],[]);
        ?>
        <a href="../Front-end/afficherUneRecette.php?recette=<?php echo $recette->getNomRecette();?>" alt="Lien vers la page de la recette <?php echo $recette->getNomRecette(); ?>" class="col-lg-3 col-sm-12 col-xs-12 vignette">
            <?php
            echo '<div class="col-lg-12">';
            $lienImage = "Images/" . $recette->getImageRecette();
            echo '<img src="'.$lienImage.'" alt="Image de la recette" >';
            echo '<h3>'.$recette->getNomRecette().'</h3>';
            echo '</div>';
            echo '</a>';
            }
            ?>
    </div>
</main>

<footer>

</footer>
</body>
</html>

