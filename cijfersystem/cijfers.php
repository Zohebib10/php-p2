<?php
// Auteur: Zoheb Ibrahim
// Functie: selecteer data

// connect database
include "cijferconnect.php";

// Maak een query
$sql = "SELECT * FROM cijfers";
// Prepare
$stmt = $conn->prepare($sql);
// Uitvoeren
$stmt->execute();
// Ophalen alle data
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

// print de data rij voor mij
echo "<br>";
echo "<table border=1px>";

// Controleer of er resultaten zijn
if (!empty($result)) {
    // Eerste rij met koprijen
    echo "<tr>";
    echo "<th>leerling</th>";
    echo "<th>cijfer</th>";
    echo "</tr>";

    // Loop door de gegevens en toon elke rij
    foreach($result as $row) {
        echo "<tr>";
        echo "<td>" . $row['leerling'] . "</td> ";
        echo "<td>" . $row['cijfer'] . "</td> ";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='4'>Geen resultaten gevonden</td></tr>";
}

echo "</table>";
?>