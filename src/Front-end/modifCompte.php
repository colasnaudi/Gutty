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
                <img src="Images/logo.png" alt="Logo temporaire">
                <h1>Gutty</h1>
            </a>
        </div>
        <div class="monCompte">
            <a href="MonCompte.php">
                <i class="material-icons iconeCompte">person</i>
            </a>
        </div>
    </div>
    <div class="partieBasse">
        <div class="bandeauCompte">
            <button onclick="window.location.href='MonCompte.php'">Mon compte</button>
        </div>
    </div>
</header>
<main>
    <div class="container">
        <div class="boutonRecettes">
            <button onclick="window.location.href='mesRecettes.php'">Mes recettes</button>
        </div>
        <div class="boutonModif">
            <button>Modifier mon compte</button>
        </div>
        <div class="boutonSupprimer">
            <button onclick="window.location.href='supprimerCompte.php'">Supprimer mon compte</button>
        </div>
        <div class="profilUser">
            <img id="aperçu-photo" src="#" alt="Aperçu photo de profil">
            <label for="photo-profil" class="bouton-photo">Changer la photo de profil</label>
            <input type="file" id="photo-profil" name="photo-profil" accept="image/*">
            <script src="modifCompte.js"></script>


            <div class="inputModif">
                <input type="text" placeholder="PSEUDO"></input>
                <input type="text" placeholder="Adresse@mail.com"></input>
            </div>
        </div>
    </div>
    <div class="boutonDeconnexion">
        <button onclick="window.location.href='connexion.php'">DECONNEXION</button>
    </div>

</main>


<footer>

</footer>
</body>
</html>
<?php
