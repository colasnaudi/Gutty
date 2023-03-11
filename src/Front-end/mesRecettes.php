<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="supprimerCompte.css">
    <link rel="stylesheet" href="mesRecettes.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <title>Mes recettes</title>
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
            <button>Mes recettes</button>
        </div>
        <div class="boutonModif">
            <button onclick="window.location.href='modifCompte.php'">Modifier mon compte</button>
            <a href="modifCompte.php"></a>
        </div>
        <button id="popup-button">Supprimer mon compte</button>
        <div class="popup-container" id="popup-container">
            <div class="popup-content">

                <button id="close-button">&times;</button>
                <h2>Etes-vous sur de vouloir supprimer votre compte?</h2>
                <h3>Entrez votre email ci dessous:</h3>
                <input type="text" id="email" placeholder="Adresse email"></input>
                <div class="boutons">
                    <!--Bouton pour envoyer le mail avec test si le script écris est bien un mail + redirection sur nouvelle page-->
                    <div id="message"></div>
                    <button type="button" onclick="validerEmail()">Valider</button>
                    <script src="verifMail.js"></script>

                    <button id="bouton-annuler">Annuler</button>
                </div>
            </div>
            <script src="supprimerCompte.js"></script>
    </div>
    <div class="boutonDeconnexion">
        <button onclick="window.location.href='connexion.php'">DECONNEXION</button>
    </div>

</main>


<footer>

</footer>
</body>
</html>

