<?php
session_start();
require('../config.php');

// Proveri da li je korisnik prijavljen (primer)
$user_id = $_SESSION['user_id'] ?? null;

if (!$user_id) {
    echo "Morate biti prijavljeni da biste dodali u korpu.";
    exit;
}

if (isset($_POST['proizvod_id'])) {
    $proizvod_id = (int)$_POST['proizvod_id'];

    // Provera da li proizvod već postoji u korpi
    $check = $conn->prepare("SELECT * FROM korpa WHERE user_id = ? AND proizvod_id = ?");
    $check->bind_param("ii", $user_id, $proizvod_id);
    $check->execute();
    $result = $check->get_result();

    if ($result->num_rows > 0) {
        // Ako postoji, samo povećaj količinu
        $update = $conn->prepare("UPDATE korpa SET kolicina = kolicina + 1 WHERE user_id = ? AND proizvod_id = ?");
        $update->bind_param("ii", $user_id, $proizvod_id);
        $update->execute();
    } else {
        // Ako ne postoji, dodaj novi zapis
        $stmt = $conn->prepare("INSERT INTO korpa (user_id, proizvod_id) VALUES (?, ?)");
        $stmt->bind_param("ii", $user_id, $proizvod_id);
        $stmt->execute();
    }

    echo '<script>
                window.location.href = "/prodavnica";
            </script>';
} else {
    echo "Nedostaje ID proizvoda.";
}
?>