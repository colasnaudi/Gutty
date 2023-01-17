<?php
include '../back-end/Classes/Ingredient.php';
include '../back-end/Classes/LivreIngredient.php';
$farine=new Ingredient(1, "Farine", 1.1, "kg");
$eau=new Ingredient(2, "Eau", 0, "L");
$sel=new Ingredient(3, "Sel", 2, "unite");
$oeuf=new Ingredient(4, "Oeuf", 0.4, "unite");
$tomate=new Ingredient(5, "Tomate", 1.30, "unite");
$fromage=new Ingredient(6, "Fromage", 10, "kg");
$jambon=new Ingredient(7, "Jambon", 10, "kg");
$oignon=new Ingredient(8, "Oignon", 1.2, "unite");
$olives=new Ingredient(9, "Olives", 15, "kg");
$levure=new Ingredient(10, "Levure", 0.10, "unite");
$poivre=new Ingredient(11, "Poivre", 2, "kg");
$pates=new Ingredient(12, "Pates", 1, "kg");
$lardons=new Ingredient(13, "Lardons", 6.7, "kg");
$carotte=new Ingredient(14, "Carotte", 1.4, "unite");
$beurre=new Ingredient(15, "Beurre", 7, "kg");
$bourgignon=new Ingredient(16, "Bourgignon", 16.5, "kg");
$vin_rouge=new Ingredient(17, "Vin rouge", 7, "L");
$creme_fraiche=new Ingredient(18, "Creme fraiche", 4, "L");
$champignon=new Ingredient(19, "Champignon", 1.2, "kg");
$ail=new Ingredient(20, "Ail", 0.5, "unite");
$saumon=new Ingredient(21, "Saumon", 1.5, "kg");
$aneth=new Ingredient(22, "Aneth", 0.5, "unite");
$poisson=new Ingredient(23, "Poisson", 1.5, "kg");
$poireau=new Ingredient(24, "Poireau", 1.5, "kg");
$chou=new Ingredient(25, "Chou", 1.5, "kg");
$saucisse=new Ingredient(26, "Saucisse", 1.5, "kg");
$lentilles=new Ingredient(27, "Lentilles", 1.5, "kg");
$riz=new Ingredient(28, "Riz", 1.5, "kg");
$haricot=new Ingredient(29, "Haricot", 1.5, "kg");
$steak=new Ingredient(30, "Steak", 1.5, "kg");
$cotelette=new Ingredient(31, "Cotelette", 1.5, "kg");

?>

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
                session_start();
                $listeIngredients = array();
                if (!isset($_SESSION['livreIngredient'])) {
                    $livreIngredient = new LivreIngredient($listeIngredients);
                    $_SESSION['livreIngredient'] = $livreIngredient;
                } else {
                    $livreIngredient = $_SESSION['livreIngredient'];
                }


                $livreIngredient->ajouteIngredient($farine);
                $livreIngredient->ajouteIngredient($eau);
                $livreIngredient->ajouteIngredient($sel);
                $livreIngredient->ajouteIngredient($oeuf);
                $livreIngredient->ajouteIngredient($tomate);
                $livreIngredient->ajouteIngredient($fromage);
                $livreIngredient->ajouteIngredient($jambon);
                $livreIngredient->ajouteIngredient($oignon);
                $livreIngredient->ajouteIngredient($olives);
                $livreIngredient->ajouteIngredient($levure);
                $livreIngredient->ajouteIngredient($poivre);
                $livreIngredient->ajouteIngredient($pates);
                $livreIngredient->ajouteIngredient($lardons);
                $livreIngredient->ajouteIngredient($carotte);
                $livreIngredient->ajouteIngredient($beurre);
                $livreIngredient->ajouteIngredient($vin_rouge);
                $livreIngredient->ajouteIngredient($creme_fraiche);
                $livreIngredient->ajouteIngredient($ail);
                $livreIngredient->ajouteIngredient($saumon);
                $livreIngredient->ajouteIngredient($aneth);
                $livreIngredient->ajouteIngredient($poisson);
                $livreIngredient->ajouteIngredient($poireau);
                $livreIngredient->ajouteIngredient($chou);
                $livreIngredient->ajouteIngredient($saucisse);
                $livreIngredient->ajouteIngredient($lentilles);
                $livreIngredient->ajouteIngredient($riz);
                $livreIngredient->ajouteIngredient($haricot);
                $livreIngredient->ajouteIngredient($steak);
                $livreIngredient->ajouteIngredient($cotelette);

                    foreach($livreIngredient->getIngredients() as $ingredient) {
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
