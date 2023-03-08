<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Front-end/bootstrap-3.3.7-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../Front-end/choixQuantite.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <title>Accueil-Gutty</title>
</head>
<body>
<?php
include_once '../Front-end/header.html';
?>
    <main>
        <h2 id="titre">Ingredients choisis:</h2>
        <div class="container recherche">
            <div class="row">
        <?php
        include 'Classes/Ingredient.php';
        include 'Classes/LivreIngredient.php';
        include 'Classes/Frigo.php';

        session_start();
        $livreIngredient = $_SESSION['livreIngredient'];

        if(isset($_REQUEST['Ingredient']) && !empty($_REQUEST['Ingredient'])) {
            if(is_array($_REQUEST['Ingredient'])) {
                $ingredients = $_REQUEST['Ingredient'];

                echo '<form action="resultatRechercheIngredientEtQuantite.php" method="post" id="mesIng">';
                foreach($ingredients as $ingredient) {
                    echo "<div class='col-lg-3 recherche_ing'>";
                    echo '<label for="quantite" id="ing">'.$ingredient. '</label> <br>';
                    echo "<input type='number' class='quantiteIng' name='quantite[]' min='0' step='0.01' required value='0'>";
                    echo "<input type='hidden' name='ingredient[]' value='$ingredient'>";
                    echo '<br>';
                    echo "</div>";
                }
                echo '<input type="submit" value="Ajouter au frigo" id="value">';
                echo '</form>';
            }
        }
        else
        {
            echo "Aucun ingrédient sélectionné";
        }
        ?>
            </div>
        </div>
    </main>
</body>
</html>