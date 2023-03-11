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


    <div class="container">
        <div class="boutonRecettes">
            <button onclick="window.location.href='mesRecettes.php'">Mes recettes</button>
        </div>
        <div class="boutonDeconnexion">
            <button onclick="window.location.href='connexion.php'">DECONNEXION</button>
        </div>
        <div class="profilUser">
            <img id="aperçu-photo" src="#" alt="Aperçu photo de profil">
            <label for="photo-profil" class="bouton-photo">Changer la photo de profil</label>
            <input type="file" id="photo-profil" name="photo-profil" accept="image/*">
            <script src="modifCompte.js"></script>




            <div class="inputModif">

                    <input type="text" placeholder=<?php echo $nom ?>  >

                    <input type="text" placeholder=<?php echo  $bdd->getMail($nom) ?>>

            </div>
        </div>

    </div>
    <div class="boutonSupprimer">
        <button onclick="window.location.href='supprimerCompte.php'">Supprimer mon compte</button>
    </div>

</main>


<footer>

</footer>
</body>
</html>
