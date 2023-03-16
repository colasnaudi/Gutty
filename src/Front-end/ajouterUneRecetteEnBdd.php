<?php
include "../Back-end/Classes/BaseDeDonnees.php";

$bdd = new BaseDeDonnees();
$dossier = "../Front-end/Images/";

session_start();
$nom=$_SESSION['nom'];
$titre = $_POST['titre'];
$nbPersonnes = $_POST['nbPersonnes'];
$heuresRecette = $_POST['heuresRecette'];
$minutesRecette = $_POST['minutesRecette'];
$typeCuisson = $_POST['typeCuisson'];

$image = $_FILES['image']['name'];
$imageTemp = $_FILES['image']['tmp_name'];

if(is_uploaded_file($imageTemp)) {
    move_uploaded_file($imageTemp, $dossier . $image);
}

$tempsRecette = strval($heuresRecette)."heures".strval($minutesRecette);

$bdd->insererDebutRecette($titre, $nbPersonnes, $tempsRecette, $typeCuisson, $image, $nom);

session_start();
$_SESSION['titre'] = $titre;
header('Location: ../Front-end/ajouterIngredientRecette.php');
