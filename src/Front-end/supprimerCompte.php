<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="supprimerCompte.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <script src="script.js"></script>

    <title>Supprimer mon compte</title>
</head>
<body>
<?php include_once "../Front-end/header.html"; ?>
<main>
    <div class="container">

        <button id="popup-button">Supprimer mon compte</button>
        <div class="popup-container" id="popup-container">
            <div class="popup-content">

                <button id="close-button">&times;</button>
                <h2>Etes-vous sur de vouloir supprimer votre compte?</h2>
                <h3>Entrez votre mot de passe ci-dessous pour supprimer votre compte</h3>
                <input type="text" id="email" placeholder="Adresse email"></input>
                <div class="boutons">
                    <!--Bouton pour envoyer le mail avec test si le script écris est bien un mail + redirection sur nouvelle page-->
                    <div id="message"></div>
                    <button type="button">Valider</button>


                    <button id="bouton-annuler">Annuler</button>
                </div>
            </div>
            <script src="supprimerCompte.js"></script>


</main>


<footer>

</footer>
</body>
</html>


