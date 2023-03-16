<?php
include_once '../Back-end/CreationIngredient.php';
include_once '../Back-end/Classes/BaseDeDonnees.php';
$bdd = new BaseDeDonnees();
$livreIngredient = $_SESSION['livreIngredient'];
$livreRecette = $_SESSION['livreRecette'];
$livreEtape = $_SESSION['livreEtape'];

$ingredientFrigos = array();

if(isset($_REQUEST['Ingredient']) && !empty($_REQUEST['Ingredient'])) {
    if(is_array($_REQUEST['Ingredient'])) {
        $ingredients = $_REQUEST['Ingredient'];
        $listeIngredient = $bdd->getIngredientsParNom($ingredients);
        $frigo = new Frigo($listeIngredient, null);
    }
}
else
{
    echo "aucun ingrédient récupéré";
    exit();
}

//Test generer suggestion
//Generation des recettes possibles
$recettePossible = $frigo->genererPossibleRecette($livreRecette);
//Calcul du nombre d'ingrédient en commun
foreach ($recettePossible as $recette) {
    $recette->compterIngredientCommun($frigo);
}

//Tri des recettes possibles par PourcentageFrigo
$recetteTriee = $frigo->trierSuggestionSansQuantite($recettePossible);
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
<div class="container recipes-container">
    <h2>Recettes suggérées <?php echo "(".sizeof($recetteTriee)." recettes)"  ?></h2>
    <div class="row">
        <ul>
            <?php for($i=0; $i<sizeof($recetteTriee); $i++){ ?>
            <a href="../Front-end/afficherUneRecette.php?recette=<?php echo $recetteTriee[$i]->getNomRecette(); ?>" class="col-lg-4" alt="Lien vers la page de la recette <?php echo $recetteTriee[$i]->getNomRecette(); ?>">
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
                        echo "Ingrédients utilisés : " . $recetteTriee[$i]->getNbIngredientCommun() . "/" . count($frigo->getIngredients())?>
                        </div>
                    <img src="../Front-end/Images/logo.png" id="user" alt="Image de profil du proprietaire de la recette">
                </li>
            </a>
            <?php } ?>
        </ul>
    </div>
</div>
</body>
</html>