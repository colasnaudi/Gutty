<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc" crossorigin="anonymous">
    <link rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <title>Affichage recette-Gutty</title>
</head>
<body>
<?php
include_once 'header.html';
?>

<main>
    <?php
//INCLUSIONS

include_once '../Back-end/CreationIngredient.php';

$ingredientFrigos = array();
$quantiteFrigos = array();


$livreIngredient = $_SESSION['livreIngredient'];
$livreRecette = $_SESSION['livreRecette'];
$livreEtape = $_SESSION['livreEtape'];
$nom=$_SESSION['nom'];

$bdd = new BaseDeDonnees();
$id = $bdd->getIdUtilisateur($nom);
$idRecette = $bdd->getIdRecette($_GET['recette']);

//Ajouter une recette aux favoris
if (isset($_POST['ajouterFavorites'])) {
    $bdd->ajouterAuFavorites($idRecette, $id);
}

//passer un commentaire en base de données et l'afficher
if (isset($_POST['Submit_comm'])){
    if (isset($_POST['texte']) && !empty($_POST['texte'])) {
        $nom = htmlspecialchars($_SESSION['nom']);
        $commentaire = htmlspecialchars($_POST['texte']);
        $idUser=$bdd->getIdUtilisateur($nom);
        $bdd->ajouterCommentaire($commentaire, $idUser, $idRecette);
    }
    else {
        $c_msg = "Veuillez entrer un commentaire";
    }
}
$commentaires = $bdd->getCommentaires($idRecette);

//boucle qui affiche les ingredients associés à la recette cliquée
foreach ($livreRecette->getListeRecettes() as $recette) {
    $quantite = $recette->getQuantite();
    $ingredient = $recette->getIngredients();


    if (isset($_GET['recette']) && $_GET['recette'] == $recette->getNomRecette()) {
        echo "<div class='nomRecette'><h2>Recette : " . $recette->getNomRecette() . "</h2></div>";
        $form = "<form class='ajouterFav' method='post'>";
        $form .= "<button><input type='submit' name='ajouterFavorites' value='Ajouter à vos recettes favorites'></button>";
        $form .= "</form>";
        echo $form;
        echo "<div class='star-rating'>";
        echo "<span class='fa fa-star '></span>";
        echo "<span class='fa fa-star '></span>";
        echo "<span class='fa fa-star '></span>";
        echo "<span class='fa fa-star '></span>";
        echo "<span class='fa fa-star '></span></div>";
        echo "<div class='note'>";
        echo "<a href='#TitreCommentaires' alt='Lien vers les commentaires'> avis</a>";
        echo "</div>";

        echo "<div class='affichageImage'>";
        echo "<img src= " . $recette->getImageRecette() . " alt='Image de la recette".$recette->getNomRecette()."'>";
        echo "<h4>Temps de préparation: " . $recette->getTemps() . " | Type de cuisson: " . $recette->getTypeCuisson() . " | Nombre de personnes: " . $recette->getNbPersonne() . "</h4>";
        echo "<div class='TitreIngredient'>";
        echo "<p>Ingrédients</p></div>";
        echo "<p> ________________________________________________________________________________________________________</p>";
        echo "<div class='container partieRecette'>";

        foreach ($quantite as $index => $quantiteRecette) {
            echo "<div class='vignette'>";

            echo "<p class='IngredientRecette'>" . $ingredient[$index]->getNomIngredient() . "</p>";
            echo "<p>" . $quantiteRecette;
            echo "<p> " . strtoupper($ingredient[$index]->getUnite()) . "</p>";

            echo "</div>";
        }
    }
}

    echo "<div class='TitrePreparation'>";
    echo "<p>Préparation</p></div>";
    echo "<p> ________________________________________________________________________________________________________</p>";

    echo "<div class='vignettePreparation'>";
    foreach ($livreRecette->getListeRecettes() as $recette) {
        $etape = $recette->getEtapeRecette();
        if (isset($_GET['recette']) && $_GET['recette'] == $recette->getNomRecette()) {
            echo "<div class='container partieRecette'>";
            foreach ($etape as $index => $etapeRecette) {
                echo "<p class='etapeRecette'>".$etapeRecette->getTexte()."</p>";
            }
            echo "</div>";
            echo "</div>";
        }
    }

    echo "<div id='TitreCommentaires'>";
    echo "<p>Commentaires</p></div>";
    echo "<p> ________________________________________________________________________________________________________</p>";

    ?>
    <h3>Donnez votre avis</h3>
    <div class='partieCommentaires'>
    <form class='ajouterComm' method='post' id='comm'>
        <textarea name="texte" type='text' placeholder= 'Ajouter un avis'></textarea>
        <button><input type='submit' name='Submit_comm' value='Envoyer'></button>
    </form>

        <?php
    if (isset($c_msg)) {
        echo $c_msg;
    }
    ?>
    </div>
    <div class="commentaires">
        <?php
        //affichage des commentaires
        foreach ($commentaires as $commentaire) {
            $nomUtilisateur = $bdd->getNomUtilisateur($commentaire['idUtilisateur']);
            echo "<div class='commentaire'>";
            echo "<p class='nomUtilisateur'>" . $nomUtilisateur . "</p>";
            echo "<div class='commentaireTexte'>";
            echo "<p>" . $commentaire['texte'] . "</p>";
            echo "</div>";
            echo "</div>";
        }
        ?>
    </div>
</main>
