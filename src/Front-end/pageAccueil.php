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
<header>
        <div class="partieHaute">
            <div class="logoEtTitre">
                <a href="#">
                    <img src="logo.png" alt="Logo temporaire">
                    <h1>Gutty</h1>
                </a>
            </div>
            <div class="recherche">
                <input type="text" name="" id="ing_recherche" placeholder="Je recherche" />
                <a class="bouton_recherche" href="#">
                    <i class="material-icons iconeRecherche">search</i>
                </a>
            </div>
            <div class="monCompte">
                <i class="material-icons iconeCompte">person</i>
            </div>
        </div>
        <div class="partieBasse">
            <div class="rechercheIngredient">
                <button>Recherche par ingrédient</button>
            </div>
            <div class="ajouterRecette">
                <button>Ajouter une recette</button>
            </div>
            <div class="recettesFavorites">
                <button>Recettes favorites</button>
            </div>
        </div>
</header>
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
