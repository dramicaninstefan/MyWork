<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "osiguranje";

$id = isset($_GET['id']) ? intval($_GET['id']) : null;
$klijent_id = isset($_GET['klijent_id']) ? intval($_GET['klijent_id']) : null;

// Inicijalizacija konekcije
$conn = new mysqli($servername, $username, $password, $dbname);

// Provera konekcije
if ($conn->connect_error) {
    die("Konekcija nije uspela: " . $conn->connect_error);
}

if (isset($_GET['file'])) {
    $fileName = $conn->real_escape_string($_GET['file']); // Sanitizacija ulaza
    $query = "SELECT $fileName FROM klijenti_stete WHERE id = $id";
    $result = $conn->query($query);
    
    if ($result && $row = $result->fetch_assoc()) {
        if (!empty($row[$fileName])) {
            // Postavljanje header-a za sliku
            header('Content-Type: image/jpeg'); // Uverite se da odgovara tipu slike
            echo $row[$fileName];
            exit;
        } else {
            echo "Fajl nije pronađen.";
        }
    } else {
        echo "Greška u upitu: " . $conn->error;
    }
} else {
    echo "Nema zatraženog fajla.";
}

// Zatvaranje konekcije
$conn->close();
?>