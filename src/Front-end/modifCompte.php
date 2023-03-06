<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="modifCompte.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <title>Modifier mon compte</title>
</head>
<body>
<header>
    <div class="partieHaute">
        <div class="logoEtTitre">
            <a href="pageAccueil.php">
                <img src="logo.png" alt="Logo temporaire">
                <h1>Gutty</h1>
            </a>
        </div>
        <div class="monCompte">
            <a href="">
                <i class="material-icons iconeCompte">person</i>
            </a>
        </div>
    </div>
    <div class="partieBasse">
        <div class="bandeauCompte">
            <button>Mon compte</button>
        </div>
    </div>
</header>
<main>
    <div class="container">
        <div class="boutonRecettes">
            <button>Mes recettes</button>
        </div>
        <div class="boutonModif">
            <button>Modifier mon compte</button>
        </div>
        <div class="boutonSupprimer">
            <button>Supprimer mon compte</button>
        </div>
        <div class="profilUser">
            <input type="file" id="photo-profil" name="photo-profil" accept="image/*">
            <img id="aperçu-photo" src="#" alt="Aperçu de la photo de profil">
            <script src="modifCompte.js"></script>
            <a href="">
                <i class="material-icons iconeCompte">person</i>
            </a>


            <div class="inputModif">
                <input type="text" placeholder="PSEUDO"></input>
                <input type="text" placeholder="Adresse@mail.com"></input>
            </div>
        </div>
    </div>
    <div class="boutonDeconnexion">
        <button>DECONNEXION</button>
    </div>

</main>


<footer>

</footer>
</body>
</html>
<?php
