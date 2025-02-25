<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$servername = "localhost";
$username = "root"; // tvoj MySQL username
$password = ""; // tvoj MySQL password
$dbname = "osiguranje";

// Povezivanje na bazu podataka
$conn = new mysqli($servername, $username, $password, $dbname);

// Provera konekcije
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Proveri da li su podaci poslati POST metodom
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Uzimanje podataka iz forme
    $klijent_id = $_POST['klijent_id'];
    
    // Postavi status i poslato
    $status = 0; // ili vrednost koja ti odgovara
    $poslato = 0; // ili vrednost koja ti odgovara

    // Pripremi i izvrši INSERT upit
    $stmt = $conn->prepare("INSERT INTO klijenti_stete (klijent_id, status, poslato, poslato_kada) VALUES (?, ?, ?, NOW())");
    $stmt->bind_param("iii", $klijent_id, $status, $poslato);

    try {
        if ($stmt->execute()) {
            // Redirekcija ili poruka o uspehu
            echo '<script>
                sessionStorage.setItem("status", "success");
                sessionStorage.setItem("message", "Uspesno ste kreirali štetu!");
                window.location.href = "/client_damage";
            </script>';

            
        } else {
            // U slučaju greške, redirekcija sa greškom
            echo '<script>
                    sessionStorage.setItem("status", "error");
                    sessionStorage.setItem("message", "Došlo je do greške, molim vas pokušajte ponovo!");
                    window.location.href = "/client_damage";
                </script>';
        }
    } catch (mysqli_sql_exception $e) {
        if ($e->getCode() == 1062) { // Kod greške za duplikate
            echo '<script>
                    sessionStorage.setItem("status", "error");
                    sessionStorage.setItem("message", "Šteta sa odabranim klijentom već postoji!");
                    window.location.href = "/client_damage";
                </script>';
        } else {
            // Druga greška
            echo '<script>
                    sessionStorage.setItem("status", "error");
                    sessionStorage.setItem("message", "Došlo je do greške, molim vas pokušajte ponovo!");
                    window.location.href = "/client_damage";
                </script>';
        }
    }

    // Zatvaranje pripremljenog upita
    $stmt->close();
}

// Zatvaranje konekcije
$conn->close();
?>