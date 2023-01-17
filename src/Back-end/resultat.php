<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Front-end/Accueil.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <title>Accueil-Gutty</title>
</head>
<body>
<header>
    <img src="../Front-end/logo.png" alt="Logo temporaire">
    <h1>Gutty</h1>
</header>
<?php
if(isset($_POST['quantite']) && !empty($_POST['quantite'])) {
    $ingredients = $_POST['ingredient'];
    $quantite = $_POST['quantite'];
    for($i = 0; $i < count($quantite); $i++) {
        echo "Ingredient: " . $ingredients[$i] . "<br>";
        echo "Quantite: " . $quantite[$i] . "<br>";
        echo "<br>";
    }
}
else
{
    echo "aucun ingrédient récupéré";
}
?>

