<?php
require '../config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $client_id = $_POST['client_id'];
    $ime_prezime = $_POST['ime_prezime'];
    $kontakt = $_POST['kontakt'];
    $email = $_POST['email'];
    $jmbg = $_POST['jmbg'];
    $adresa = $_POST['adresa'];
    $mesto = $_POST['mesto'];

    $sql = "UPDATE klijent SET ime_prezime=?, kontakt=?, email=?, jmbg=?, adresa=?, mesto=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssi", $ime_prezime, $kontakt, $email, $jmbg, $adresa, $mesto, $client_id);

    try {
        if ($stmt->execute()) {
            echo '<script>
                    sessionStorage.setItem("status", "success");
                    sessionStorage.setItem("message", "Uspešno ažurirani podaci klijenta!");
                    window.location.href = "/client_list";
                </script>';
        }
    } catch (mysqli_sql_exception $e) {
        if (strpos($e->getMessage(), "Duplicate entry") !== false && strpos($e->getMessage(), "for key 'jmbg'") !== false) {
            echo '<script>
                    sessionStorage.setItem("status", "error");
                    sessionStorage.setItem("message", "Klijent sa unetim JMBG-om već postoji!");
                    window.location.href = "/client_list";
                </script>';
        } else {
            echo '<script>
                    sessionStorage.setItem("status", "error");
                    sessionStorage.setItem("message", "Došlo je do greške, molim vas pokušajte ponovo!");
                    window.location.href = "/client_list";
                </script>';
        }
    }

    $stmt->close();
}
$conn->close();
?>