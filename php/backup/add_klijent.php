<?php
require 'config.php';

// Podaci iz forme
$ime_prezime = $_POST['ime_prezime'];
$kontakt = $_POST['kontakt'];
$jmbg = !empty($_POST['jmbg']) ? $_POST['jmbg'] : NULL;

// Insert u tabelu klijenti
$sql = "INSERT INTO klijenti (ime_prezime, kontakt, jmbg, poslato) VALUES (?, ?, ?, 0)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $ime_prezime, $kontakt, $jmbg);

if ($stmt->execute()) {
    echo "<script>window.location.href='index.php';</script>";
    // echo "<script>alert('Uspešno prijavljen klijent!'); window.location.href='klijenti.php';</script>";
} else {
    echo "Greška: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
