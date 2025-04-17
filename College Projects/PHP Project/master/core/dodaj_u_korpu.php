<?php
session_start();
require('../config.php');

// Proveri da li je korisnik prijavljen (primer)
$user_id = $_SESSION['user_id'] ?? null;

if (!$user_id) {
    header("Location: ../auth/login.php");
    exit;
}

if (isset($_POST['proizvod_id'])) {
    $proizvod_id = (int)$_POST['proizvod_id'];
    $quantity = (int)$_POST['quantity'];

    // Provera da li proizvod već postoji u korpi
    $check = $conn->prepare("SELECT * FROM korpa WHERE user_id = ? AND proizvod_id = ?");
    $check->bind_param("ii", $user_id, $proizvod_id);
    $check->execute();
    $result = $check->get_result();

    if ($result->num_rows > 0) {
        // Ako postoji, samo povećaj količinu
        $update = $conn->prepare("UPDATE korpa SET kolicina = kolicina + ? WHERE user_id = ? AND proizvod_id = ?");
        $update->bind_param("iii", $quantity, $user_id, $proizvod_id);
        $update->execute();
    } else {
        // Ako ne postoji, dodaj novi zapis
        $stmt = $conn->prepare("INSERT INTO korpa (user_id, proizvod_id, kolicina) VALUES (?, ?, ?)");
        $stmt->bind_param("iii", $user_id, $proizvod_id, $quantity);
        $stmt->execute();
    }

    echo '<script>
                window.location.href = "/korpa";
            </script>';
} else {
    echo "Nedostaje ID proizvoda.";
}
?>