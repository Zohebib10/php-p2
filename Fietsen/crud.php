<?php
// Auteur: Mikail Korkut
// Functie: selecteer data

// Connect database
include "select.php";

// Maak een query
$sql = "SELECT * FROM fietsen";
// Prepare
$stmt = $conn->prepare($sql);

// Foutafhandeling toevoegen
if (!$stmt) {
    echo "Fout bij het voorbereiden van de query: " . $conn->error;
    exit();
}

// Uitvoeren
if (!$stmt->execute()) {
    echo "Fout bij het uitvoeren van de query: " . $stmt->errorInfo()[2];
    exit();
}

// Ophalen alle data
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

// print de data rij voor mij
echo "<br>";
echo "<table border=1px>";

// Controleer of er resultaten zijn
if (!empty($result)) {
    // Eerste rij met koprijen
    echo "<tr>";
    echo "<th>Merk</th>";
    echo "<th>Type</th>";
    echo "<th>Prijs</th>";
    echo "<th>id</th>";
    echo "</tr>";

    // Loop door de gegevens en toon elke rij
    foreach($result as $row) {
        echo "<tr>";
        echo "<td>" . $row['merk'] . "</td> ";
        echo "<td>" . $row['type'] . "</td> ";
        echo "<td>" . $row['prijs'] . "</td>";
        echo "<td><a href='edit.php?id=" . $row['id'] . "'>Wijzig</a></td>";
        echo "<td><a href='delete.php?id=" . $row['id'] . "' onclick=\"return confirm('Weet u zeker dat u deze rij wilt verwijderen?')\">Verwijder</a></td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='4'>Geen resultaten gevonden</td></tr>";
}
