<?php
require '../config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Izdvajanje podataka iz forme
    $id = $_POST['id'];
    $broj_polise = $_POST['broj_polise'];
    $osig_kuca = $_POST['osig_kuca'];
    $skadencar_pocetak = $_POST['skadencar_pocetak']; // Datum početka
    // $skadenca_kraj = $_POST['skadenca_kraj'];  // Datum kraja (može biti null)
    $grana_tarifa = $_POST['grana_tarifa'];
    // $premija_bez_poreza = $_POST['premija_bez_poreza'];  // Premija bez poreza
    $premija_sa_porezom = $_POST['premija_sa_porezom']; // Premija sa porezom
    $nacin_placanja = $_POST['nacin_placanja'];
    $brokerska_kuca = strtoupper($_POST['brokerska_kuca']);
    $komentar = $_POST['komentar']; // Komentar (može biti null)
    
    // Update SQL upit za ažuriranje podataka
    $sql = "UPDATE skadencar 
    SET broj_polise=?, osig_kuca=?, skadencar_pocetak=?, grana_tarifa=?, premija_sa_porezom=?, nacin_placanja=?, brokerska_kuca=?, komentar=? 
    WHERE id=?";

    // Priprema upita
    $stmt = $conn->prepare($sql);

    // Binde parametre sa odgovarajućim tipovima (s = string, d = datum, i = integer, etc.)
    $stmt->bind_param("ssssssssi", $broj_polise, $osig_kuca, $skadencar_pocetak, $grana_tarifa, $premija_sa_porezom, $nacin_placanja, $brokerska_kuca, $komentar, $id);

    // Izvršavanje upita
    try {
    if ($stmt->execute()) {
    echo '<script>
            sessionStorage.setItem("status", "success");
            sessionStorage.setItem("message", "Uspešno ažurirani podaci polise!");
            window.location.href = "/skadencar_unos";  
        </script>';
    }
    } catch (mysqli_sql_exception $e) {
    echo '<script>
        sessionStorage.setItem("status", "error");
        sessionStorage.setItem("message", "Došlo je do greške, pokušaj ponovo!");
        window.location.href = "/skadencar_unos";  
    </script>';
    }
    }

    // Zatvaranje pripremljene izjave
    $stmt->close();
?>