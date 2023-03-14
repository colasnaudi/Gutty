<?php
include '../Back-end/Classes/BaseDeDonnees.php';
include '../Back-end/Classes/Recette.php';
session_start();
$nom=$_SESSION['nom'];
$bdd = new BaseDeDonnees();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="supprimerCompte.css">
    <link rel="stylesheet" href="mesRecettes.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <title>Mes recettes</title>
</head>
<body>
<?php include_once "../Front-end/header.html"; ?>
<main>
    <div class="bandeauCompte">
        <button onclick="window.location.href='MonCompte.php'">Mes recettes</button>
    </div>
    <?php
        //afficher les recettes liées à l'utilisateur connecté

        $bddGutty = new BaseDeDonnees();
        $resultatRecettes = $bddGutty->affichageMesRecettes($nom);
        echo '<div class="recette">';
        foreach($resultatRecettes as $recette) {
            echo '<div class="col-lg-3 col-sm-12 col-xs-12 vignette">';
            $recette = new Recette($recette['nom'],'etape','image','temps',0,0,0, "",[],[]);
            echo '<div class="col-lg-12">';
            echo '<h3>'.$recette->getNomRecette().'</h3>';
            echo '</div>';
            echo '</div>';
        }
        ?>

</main>


<footer>

</footer>
</body>
</html>

