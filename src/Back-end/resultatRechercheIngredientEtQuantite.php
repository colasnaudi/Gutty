<?php

include_once 'CreationIngredient.php';
include_once '../Back-end/Classes/BaseDeDonnees.php';
$bdd = new BaseDeDonnees();
$ingredientFrigos = array();
$quantiteFrigos = array();

$livreIngredient = $_SESSION['livreIngredient'];
$livreRecette = $_SESSION['livreRecette'];

if(isset($_POST['quantite']) && !empty($_POST['quantite'])) {
    $ingredients = $_POST['ingredient'];
    $quantite = $_POST['quantite'];

    $listeIngredient = $bdd->getIngredientsParNom($ingredients);
    $listeQuantite = array_map('floatval', $quantite);

    $frigo = new Frigo($listeIngredient, $listeQuantite);

}
else
{
    echo "aucun ingrédient récupéré";
}

//Test generer suggestion
//Generation des recettes possibles
$recettePossible = $frigo->genererPossibleRecette($livreRecette);

//Calcul du prix frigo et ajout des recettes possibles
foreach ($recettePossible as $recette) {
    $recette->calculerPourcentageFrigo($frigo);
}

//Tri des recettes possibles par PourcentageFrigo
$recetteTriee = $frigo->trierSuggestionAvecQuantite($recettePossible);

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Front-end/bootstrap-3.3.7-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../Front-end/resultatQuantiteRecette.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <title>Accueil-Gutty</title>
</head>
<body>
    <?php
    include_once "../Front-end/header.html";
    ?>
<main>
        <div class="container recipes-container">
            <h2>Recettes suggérées <?php echo "(".sizeof($recetteTriee)." recettes)" ?></h2>
            <div class="row">
            <ul>
                <?php for($i=0; $i<sizeof($recetteTriee); $i++){ ?>
                <a href="../Front-end/afficherUneRecette.php?recette=<?php echo $recetteTriee[$i]->getNomRecette(); ?>" class="col-lg-4">
                    <li class="recipe">
                        <?php
                            $lienImage = "../Front-end/Images/" . $recetteTriee[$i]->getImageRecette();
                            echo '<img src="'.$lienImage.'" alt="Image de la recette" id="menu" >';
                        ?>
                        <br>
                        <div class="info">
                            <div class="name">
                                <?php
                                echo $recetteTriee[$i]->getNomRecette(). " ";
                                echo $recetteTriee[$i]->getPrixRecette() . "€ ";
                                ?>
                            </div>
                            <?php
                            echo "<br>";
                            echo"   Prix d'ajout = " . $recetteTriee[$i]->getPrixAjout() . "€";
                            echo "<br>";
                            echo "  Pourcentage utilisé =  " . $recetteTriee[$i]->getPourcentageFrigo() . "%"?>
                        </div>
                        <img src="../Front-end/Images/logo.png" id="user">
                    </li>
                </a>
                <?php } ?>
            </ul>
            </div>
        </div>
</main>
</body>
</html>