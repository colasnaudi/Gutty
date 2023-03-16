<?php
include_once "../Back-end/Classes/BaseDeDonnees.php";
session_start();
$nom=$_SESSION['nom'];
$bdd = new BaseDeDonnees();
?>

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
<?php include_once "../Front-end/header.html"; ?>
<div class="bandeauCompte">
    <button onclick="window.location.href='MonCompte.php'">Mon compte</button>
</div>

<div class="container">

    <div class="account-info">
        <h1>Mon compte</h1>
        <div class="user-info">
            <label for="username">Pseudo:</label>
            <input type="text" id="username" placeholder=<?php echo $nom ?> disabled>
            <label for="email">Email:</label>
            <input type="email" id="email" placeholder=<?php echo  $bdd->getMail($nom) ?> disabled>
        </div>
    </div>
    <div class="account-btns">
        <button class="Deconnexion-btn" onclick="window.location.href='connexion.php'">DECONNEXION</button>
        <button class="mesRecettes-btn" onclick="window.location.href='mesRecettes.php'">Mes recettes</button>
    </div>
    <div class="partieSupprimer">
        <button id="popup-button">Supprimer mon compte</button>
    </div>
    <div class="popup-container" id="popup-container">
        <div class="popup-content">

            <button id="close-button">&times;</button>
            <h2>Etes-vous sur de vouloir supprimer votre compte?</h2>
            <h3>Entrez votre mot de passe ci-dessous pour supprimer votre compte:</h3>
            <form method="post" action="../Back-end/verifSuppression.php" class="connexionUtilisateur">
            <input type="text" name="pseudo" id="pseudo" placeholder="Nom d'utilisateur ou adresse mail" required>
            <input type="password" name="mdp" id="mdp" placeholder="Mot de passe" required>
            <div class="boutons">
                <button type="submit">Valider</button>

                <button id="bouton-annuler">Annuler </button>
            </div>
        </div>
        <script src="supprimerCompte.js"></script>
    </div>


</div>



</main>


<footer>

</footer>
</body>
</html>
