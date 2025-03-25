<?php
require '../config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ime_prezime = $_POST['ime_prezime'];
    $kontakt = $_POST['kontakt'];
    $email = $_POST['email'];
    $jmbg = $_POST['jmbg'];
    $adresa = $_POST['adresa'];
    $mesto = $_POST['mesto'];

    $sql = "INSERT INTO klijent (ime_prezime, kontakt, email, jmbg, adresa, mesto) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssss", $ime_prezime, $kontakt, $email, $jmbg, $adresa, $mesto);

    try {
        if ($stmt->execute()) {
            // Redirekcija ili poruka o uspehu
            echo '<script>
                sessionStorage.setItem("status", "success");
                sessionStorage.setItem("message", "Uspesno dodat klijent!");
                window.location.href = "/client_list";
            </script>';

            
        } else {
            // U slučaju greške, redirekcija sa greškom
            echo '<script>
                    sessionStorage.setItem("status", "error");
                    sessionStorage.setItem("message", "Došlo je do greške, molim vas pokušajte ponovo!");
                    window.location.href = "/client_list";
                </script>';
        }
    } catch (mysqli_sql_exception $e) {
        if ($e->getCode() == 1062) { // Kod greške za duplikate
            echo '<script>
                    sessionStorage.setItem("status", "error");
                    sessionStorage.setItem("message", "Klijent sa unetim JMBG-om već postoji!");
                    window.location.href = "/client_list";
                </script>';
        } else {
            // Druga greška
            echo '<script>
                    sessionStorage.setItem("status", "error");
                    sessionStorage.setItem("message", "Došlo je do greške, molim vas pokušajte ponovo!");
                    window.location.href = "/client_list";
                </script>';
        }
    }

    $stmt->close();
    $conn->close();
} else {
    header("Location: /");

    exit();
}
?>