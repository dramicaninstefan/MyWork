<?php
session_start();
require('config.php');

$user_id = $_SESSION['user_id'] ?? 0;

if (!$user_id) {
    echo json_encode(['success' => false, 'error' => 'Morate biti ulogovani da biste izvršili ovu akciju.']);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $proizvod_id = $_POST['proizvod_id'];
    $akcija = $_POST['akcija'];

    // Ažuriranje količine na osnovu akcije
    if ($akcija == 'povecaj') {
        $conn->query("UPDATE korpa SET kolicina = kolicina + 1 WHERE user_id = $user_id AND proizvod_id = $proizvod_id");
    } elseif ($akcija == 'smanji') {
        $conn->query("UPDATE korpa SET kolicina = GREATEST(kolicina - 1, 1) WHERE user_id = $user_id AND proizvod_id = $proizvod_id");
    } elseif ($akcija == 'obrisi') {
        $conn->query("DELETE FROM korpa WHERE user_id = $user_id AND proizvod_id = $proizvod_id");
    }

    // Dobijanje nove ukupne cene
    $sql = "SELECT p.cena, k.kolicina 
            FROM korpa k 
            JOIN proizvodi p ON k.proizvod_id = p.id 
            WHERE k.user_id = $user_id AND k.proizvod_id = $proizvod_id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    $ukupna_cena = $row['cena'] * $row['kolicina'];

    echo json_encode(['success' => true, 'ukupna_cena' => number_format($ukupna_cena, 2, ',', '.'), 'message' => 'Korpa ažurirana!']);
    exit;
}
?>