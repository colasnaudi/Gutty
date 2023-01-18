<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Accueil.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <title>Accueil-Gutty</title>
</head>
<body>
<header>
    <img src="logo.png" alt="Logo temporaire">
    <h1>Gutty</h1>
</header>
<main>
    <div class="search-box">
        <input type="text" name="" id="search-txt" onkeyup="search_ingredient()" placeholder="Tapez pour rechercher" />
        <a class="search-btn" href="#">
            <i class="fa fa-search" aria-hidden="true"></i>
        </a>
    </div>
    <form action="../Back-end/recherche.php" method="post">
    <div class="Ingredients">
            <ol id="list">
                <?php
                include_once '../Back-end/CreationIngredient.php';
                include_once '../Back-end/Classes/Recette.php';

                $livreIngredient = $_SESSION['livreIngredient'];
                $livreRecette = $_SESSION['livreRecette'];

                foreach($livreIngredient->getListeIngredients() as $ingredient) {
                        echo '<li class="ingredient">';
                        echo '<label for="'.$ingredient->getNomIngredient().'">'.$ingredient->getNomIngredient().'</label>';
                        echo '<input type="checkbox" id="'.$ingredient->getNomIngredient().'" name="Ingredient[]" value="'.$ingredient->getNomIngredient().'" class="checkbox"/>';
                        echo '</li>';
                    }
                ?>
            </ol>
            </div>
            <input type="submit" value="Valider">
        </form>
</main>
<footer>

</footer>

<script src="Ingredient.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        document.querySelector("body").addEventListener("change", function(event) {
            if (event.target.matches(".checkbox")) {
                document.getElementById('search-txt').value = "";
                search_ingredient();
            }
        });
    });

</script>
</body>
</html>
