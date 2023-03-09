<!DOCTYPE html>
<html lang="fr" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Front-end/ajouterUneRecette.css">
    <title>Ajouter votre recette</title>
</head>
<body>
<?php
include_once "../Front-end/header.html";
?>
<main>
    <body>
        <div class="formulaire">
                <form method="post" action="../Back-end/verifAjoutRecette.php" class="formRecette">
                    <div class="recette">
                        <div class="titre">
                            <label for="titre">Titre</label>
                            <br>
                            <input type="text" name="titre" id="titre" placeholder="Titre de la recette" required>
                            <br>
                        </div>
                        <div class="nbPersonne">
                            <label for="nbPersonnes">Nombre de personnes</label>
                            <br>
                            <input type="number" name="nbPersonnes" id="nbPersonnes" value=2 min=1 required>
                            <br>
                        </div>
                        <div class="tempsRecette">
                            <label for="tempsRecette">Temps de la recette</label>
                            <br>
                            <input type="number" name="tempsRecette" id="heuresTempsRecette" value=0 min=0 max=24 required>
                            <span>heures</span>
                            <input type="number" name="tempsRecette" id="minutesTempsRecette" min=0 max=59 required>
                            <span>minutes</span>
                            <br>
                        </div>
                        <div class="typeCuisson">
                            <label for="typeCuisson">Type de cuisson</label>
                            <br>
                            <button>Four</button>
                            <button>Plaque</button>
                            <button>Pas de cuisson</button>
                            <button>Autre</button>
                        </div>
                        <div class="imageRecette">
                            <label for="image">Image</label>
                            <br>
                            <input type="text" name="image" id="image" placeholder="Image" required>
                            <br>
                        </div>
                        <input type="submit" value="Ajouter les ingrédients">
                    </div>
                </form>
            </div>
    </body>
</main>
</body>
</html>



