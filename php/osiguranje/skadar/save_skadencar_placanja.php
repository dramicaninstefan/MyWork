<?php
// Uključite config.php za povezivanje sa bazom
include('../config.php');

// Obrada podataka koji su poslati sa forme
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['skadencar_id']; // ID za koji šaljemo promene
    $brokerska_kuca_uplata = floatval($_POST['brokerska_kuca_uplata']);

    // Uzmi vrednosti za sve rate
    $rate = [];
    $ukupnoRate = 0;
    for ($i = 1; $i <= 12; $i++) {
        $vrednost = isset($_POST['input_' . $i]) ? floatval($_POST['input_' . $i]) : 0.00;
        $rate[] = $vrednost;
        $ukupnoRate += $vrednost;
    }

    // Proveri stanje checkbox-a
    $brokerska_kuca_uplata_nacin_placanja_toggle = isset($_POST['brokerska_kuca_uplata_nacin_placanja_toggle']) ? 1 : 0;

    // Dohvati premiju iz baze za tu polisu
    $query = "SELECT premija_bez_poreza FROM skadencar WHERE id = ?";
    $stmtPremija = $conn->prepare($query);
    $stmtPremija->bind_param("i", $id);
    $stmtPremija->execute();
    $result = $stmtPremija->get_result();


    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $osnovica = floatval($row['premija_bez_poreza']) * 0.08;

        // Ako su ili rate ili uplata dovoljne za isplatu
        if (
            round($ukupnoRate, 2) >= round($osnovica, 2) ||
            round($brokerska_kuca_uplata, 2) >= round($osnovica, 2)
        ) {
            $brokerska_kuca_isplaceno = 1;
        } else {
            $brokerska_kuca_isplaceno = 0;
        }
    }
    


    // SQL upit za ažuriranje podataka
    $update_sql = "UPDATE skadencar SET 
        brokerska_kuca_uplata = ?, 
        brokerska_kuca_uplata_rata1 = ?, 
        brokerska_kuca_uplata_rata2 = ?, 
        brokerska_kuca_uplata_rata3 = ?, 
        brokerska_kuca_uplata_rata4 = ?, 
        brokerska_kuca_uplata_rata5 = ?, 
        brokerska_kuca_uplata_rata6 = ?, 
        brokerska_kuca_uplata_rata7 = ?, 
        brokerska_kuca_uplata_rata8 = ?, 
        brokerska_kuca_uplata_rata9 = ?, 
        brokerska_kuca_uplata_rata10 = ?, 
        brokerska_kuca_uplata_rata11 = ?, 
        brokerska_kuca_uplata_rata12 = ?, 
        brokerska_kuca_uplata_nacin_placanja_toggle = ?, 
        brokerska_kuca_isplaceno = ?
        WHERE id = ?";

    // Priprema i izvršenje
    $stmt = $conn->prepare($update_sql);
    $stmt->bind_param("ddddddddddddddii", 
        $brokerska_kuca_uplata, 
        $rate[0], $rate[1], $rate[2], $rate[3], $rate[4], 
        $rate[5], $rate[6], $rate[7], $rate[8], $rate[9], 
        $rate[10], $rate[11], 
        $brokerska_kuca_uplata_nacin_placanja_toggle,
        $brokerska_kuca_isplaceno,
        $id
    );

    if ($stmt->execute()) {
        echo '
        <script>
            sessionStorage.setItem("status", "success");
            sessionStorage.setItem("message", "Uspešno sačuvano!");
            window.location.href = "/skadencar_placanja";
        </script>';
    } else {
        echo '
        <script>
            sessionStorage.setItem("status", "error");
            sessionStorage.setItem("message", "Došlo je do greške, pokušaj ponovo!");
            window.location.href = "/skadencar_placanja";
        </script>';
    }
}
?>