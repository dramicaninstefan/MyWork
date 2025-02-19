<?php
// get_clients.php
require 'config.php';

$sql = "SELECT * FROM klijenti WHERE poslato = '0'"; // Upit za dobijanje klijenata
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Ispisivanje klijenata u opcijama
    while ($row = $result->fetch_assoc()) {
        echo "<option value='" . $row['id'] . "'>" . $row['ime_prezime'] . "</option>";
    }
} else {
    echo "<option value=''>Nema klijenata</option>";
}

?>