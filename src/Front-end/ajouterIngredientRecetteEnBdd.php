<?php
$nbIngredients = $_POST['nbIngredients'];
$nbEtapes = $_POST['nbEtapes'];

echo "Nb Ingredients : ".$nbIngredients;
echo "<br>";
echo "Nb Etapes : ".$nbEtapes;
echo "<br>";



for ($i=1; $i < $nbIngredients; $i++) {
    $quantite = $_POST['quantite'.$i];
    $unite = $_POST['unite'.$i];
    $ingredient = $_POST['ingredient'.$i];
    echo "Quantité : ".$quantite;
    echo "<br>";
    echo "Unité : ".$unite;
    echo "<br>";
    echo "Ingrédient : ".$ingredient;
    echo "<br>";
}
echo "<br>";

for ($i=1; $i < $nbEtapes; $i++) {
    $etape = $_POST['etape'.$i];
    echo "Etape : ".$etape;
    echo "<br>";
}
