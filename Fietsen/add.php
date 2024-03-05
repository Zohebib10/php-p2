<?php
// Auteur: Mikail Korkut
// Functie: voeg nieuwe fiets toe

// Connect database
include "fietsen.php";

// Initialize variables to hold input values
$merk = $type = $prijs = "";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize input values
    $merk = htmlspecialchars($_POST["merk"]);
    $type = htmlspecialchars($_POST["type"]);
    $prijs = htmlspecialchars($_POST["prijs"]);

    // Prepare SQL statement to insert data into the database
    $sql = "INSERT INTO fietsen (merk, type, prijs) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);

    // Bind parameters and execute the statement
    $stmt->bindParam(1, $merk);
    $stmt->bindParam(2, $type);
    $stmt->bindParam(3, $prijs);
    if ($stmt->execute()) {
        // Redirect to the main page after successful addition
        header("Location: crud.php");
        exit();
    } else {
        echo "Fout bij het toevoegen van de fiets: " . $stmt->error;
    }

    // Close statement
    $stmt->close();
}

// If form is not submitted or if there was an error, display the form
?>

<!DOCTYPE html>
<html>
<head>
    <title>Fiets Toevoegen</title>
</head>
<body>
    <h2>Voeg een nieuwe fiets toe</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        Merk: <input type="text" name="merk" required><br>
        Type: <input type="text" name="type" required><br>
        Prijs: <input type="text" name="prijs" required><br>
        <input type="submit" value="Toevoegen">
    </form>
</body>
</html>