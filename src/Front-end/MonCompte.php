<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="MonCompte.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <title>Mon compte</title>
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
            <button onclick="window.location.href='mesRecettes.php'">Mes recettes</button>
        </div>
        <div class="boutonModif">
            <button onclick="window.location.href='modifCompte.php'">Modifier mon compte</button>
            <a href="modifCompte.php"></a>
        </div>
        <div class="boutonSupprimer">
            <button onclick="window.location.href='supprimerCompte.php'">Supprimer mon compte</button>

        </div>
        <div class="profilUser">
            <a href="">
                <i class="material-icons iconeCompte">person</i>
            </a>
            <h2>PSEUDO</h2>
            <h3>Adresse@mail.com</h3>
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
