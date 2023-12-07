<?php
function berekenCirkel($straal) {
    $pi = 3.14;
    $omtrek = 2 * $pi * $straal;
    $oppervlakte = $pi * pow($straal, 2);

    echo "Omtrek: " . $omtrek . "<br>";
    echo "Oppervlakte: " . $oppervlakte;
}

berekenCirkel(5);
?>