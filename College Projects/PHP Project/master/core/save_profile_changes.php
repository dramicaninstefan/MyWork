<?php
session_start();
include('../config.php'); // Povezivanje sa bazom podataka

// Proveri da li je korisnik prijavljen
if (!isset($_SESSION['user_id'])) {
    header('Location: ../auth/login.php');
    exit();
}

// Pribavi podatke iz POST zahteva
$ime = isset($_POST['ime']) ? $_POST['ime'] : '';
$prezime = isset($_POST['prezime']) ? $_POST['prezime'] : '';
$ime_prezime = $ime . " " . $prezime;

$mobilni_broj = isset($_POST['mobilni_broj']) ? $_POST['mobilni_broj'] : '';
$adresa = isset($_POST['adresa']) ? $_POST['adresa'] : '';
$mesto = isset($_POST['mesto']) ? $_POST['mesto'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$postanski_broj = isset($_POST['postanski_broj']) ? $_POST['postanski_broj'] : '';
$drzava = isset($_POST['drzava']) ? $_POST['drzava'] : '';

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    // Pripremi SQL upit za ažuriranje podataka
    $sql = "UPDATE users SET 
                ime_prezime = ?, 
                email = ?, 
                adresa = ?, 
                mesto = ?, 
                postanski_broj = ?, 
                drzava = ?, 
                kontakt = ?
            WHERE id = ?";

    // Priprema i izvršavanje upita
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param('sssssssi', $ime_prezime, $email, $adresa, $mesto, $postanski_broj, $drzava, $mobilni_broj, $user_id);
        if ($stmt->execute()) {
            // Ako je uspešno izvršeno, možeš preusmeriti korisnika ili prikazati poruku
            echo '<script>
                    sessionStorage.setItem("status", "success");
                    sessionStorage.setItem("message", "Uspešno ste ažurirali Vaše podatke!");
                    window.location.href = "/moj-profil";
                </script>';
        } else {
            echo '<script>
                    sessionStorage.setItem("status", "error");
                    sessionStorage.setItem("message", "Došlo je do greške, pokušaj ponovo!");
                    window.location.href = "/moj-profil";
                </script>';
        }
        $stmt->close();
    } else {
        echo '<script>
                    sessionStorage.setItem("status", "error");
                    sessionStorage.setItem("message", "Došlo je do greške pri pripremi SQL upita, pokušajte ponovo!");
                    window.location.href = "/moj-profil";
                </script>';
    }
} else {
    header('Location: ../auth/login.php');
    exit();
}

// Zatvori konekciju sa bazom
$conn->close();
?>