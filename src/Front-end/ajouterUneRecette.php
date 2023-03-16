<!DOCTYPE html>
<html lang="fr" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Front-end/ajouterUneRecette.css">
    <script type = "text/javascript" src="ajouterUneRecette.js" defer></script>
    <title>Ajouter votre recette</title>
</head>
<body>
<?php
include_once "../Front-end/header.html";
?>
<main>
    <div class="formulaire">
            <form method="post" action="ajouterUneRecetteEnBdd.php" class="formRecette" enctype="multipart/form-data">
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
                        <input type="number" name="heuresRecette" id="heuresTempsRecette" value=0 min=0 max=24 required>
                        <span>heures</span>
                        <input type="number" name="minutesRecette" id="minutesTempsRecette" min=0 max=59 required>
                        <span>minutes</span>
                        <br>
                    </div>
                    <div class="typeCuisson">
                        <label for="typeCuisson">Type de cuisson</label>
                        <br>
                        <div id="btn1" onclick="changeBackground1()">Four</div>
                        <div id="btn2" onclick="changeBackground2()">Plaque</div>
                        <div id="btn3" onclick="changeBackground3()">Sans plaque</div>
                        <div id="btn4" onclick="changeBackground4()">Autre</div>
                        <input type="hidden" name="typeCuisson" id="typeCuisson" value="None">
                    </div>
                    <div class="imageRecette">
                        <label for="image">Image</label>
                        <br>
                        <img id="imageRecette" src="#" alt="Aperçu de l'image de la recette">
                        <input type="file" id="inputImageRecette" name="image" accept="image/*" required>
                        <br>
                    </div>
                    <div class="ajouterIngredient">
                        <input type="submit" value="Ajouter les ingrédients">
                    </div>
                </div>
            </form>
        </div>
    </body>
</main>
</body>
</html>



