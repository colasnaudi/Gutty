<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Front-end/rechercheParIngredient.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <title>Accueil-Gutty</title>
</head>
<body>
<?php
include_once "../Front-end/header.html";

include_once 'CreationIngredient.php';

$ingredientFrigos = array();

$livreIngredient = $_SESSION['livreIngredient'];
$livreRecette = $_SESSION['livreRecette'];

if(isset($_REQUEST['Ingredient']) && !empty($_REQUEST['Ingredient'])) {
    if (is_array($_REQUEST['Ingredient'])) {
        $ingredients = $_REQUEST['Ingredient'];

        foreach($ingredients as $ingredient){
            $ingredientFrigos[] = $livreIngredient->retrouverIngredient($ingredient);
        }
        $frigo = new Frigo($ingredientFrigos, null);

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

<div class="recipes-container">
    <h2>Liste de recettes <?php echo "(".sizeof($recetteTriee)." recettes)"  ?></h2>
    <ul>
        <?php for($i=0; $i<sizeof($recetteTriee); $i++){ ?>
            <li class="recipe">
                <a href="afficherUneRecette.php?recette=<?php echo $recetteTriee[$i]->getNomRecette(); ?>">
                    <?php
                    echo $recetteTriee[$i]->getNomRecette() . " : " . $recetteTriee[$i]->getPrixRecette() . "€ "
                        . "Ingrédients utilisés : " . $recetteTriee[$i]->getNbIngredientCommun() . "/" . count($frigo->getIngredients())?>
            </li>
        <?php } ?>
    </ul>
</div>
</body>
</html>