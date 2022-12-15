<?php
$Liste1 = array(1, 2, 3, 4, 5, 6, 7, 8);
$Liste2 = array('a','b','c','d','e','f','g','h');

foreach (array_combine($Liste1, $Liste2) as $chiffre => $lettre) {
    echo $chiffre . " => " . $lettre . "<br>";
}


