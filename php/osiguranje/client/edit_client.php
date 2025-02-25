<?php
require '../config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $client_id = $_POST['client_id'];
    $ime_prezime = $_POST['ime_prezime'];
    $kontakt = $_POST['kontakt'];
    $jmbg = $_POST['jmbg'];
    $adresa = $_POST['adresa'];
    $mesto = $_POST['mesto'];

    $sql = "UPDATE klijent SET ime_prezime=?, kontakt=?, jmbg=?, adresa=?, mesto=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssi", $ime_prezime, $kontakt, $jmbg, $adresa, $mesto, $client_id);

    if ($stmt->execute()) {
        // Redirekcija ili poruka o uspehu
        echo '<script>
                sessionStorage.setItem("status", "success");
                sessionStorage.setItem("message", "Uspešno ste ažurirali klijenta!");
                window.location.href = "/client_list";
            </script>';


    } else {
        // Poruka o grešci
        echo '<script>
                sessionStorage.setItem("status", "error");
                sessionStorage.setItem("message", "Došlo je do greške, molim vas pokušajte ponovo!");
                window.location.href = "/client_list";
            </script>';

    }

   

    $stmt->close();
}
$conn->close();
?>