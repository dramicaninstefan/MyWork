<?php
include('../config.php');  // Uključi konekciju na bazu

// Provera da li je forma poslata putem POST metode
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Izdvajanje podataka iz forme
    $broj_polise = $_POST['broj_polise'];
    $klijent_id = $_POST['klijent_id'] ? $_POST['klijent_id'] : null;  // Ime i prezime klijenta
    
    $osig_kuca = $_POST['osig_kuca'];
    $skadencar_pocetak = $_POST['skadencar_pocetak']; // Datum početka
    // $skadenca_kraj = $_POST['skadenca_kraj'];  // Datum kraja (može biti null)
    $grana_tarifa = $_POST['grana_tarifa'];
    // $premija_bez_poreza = $_POST['premija_bez_poreza'];  // Premija bez poreza
    $premija_sa_porezom = $_POST['premija_sa_porezom']; // Premija sa porezom
    $nacin_placanja = $_POST['nacin_placanja'];
    $brokerska_kuca = $_POST['brokerska_kuca'];
    $komentar = $_POST['komentar']; // Komentar (može biti null)

    // Ako je klijent_id postavljen (nije null), pokreće se SELECT upit
if ($klijent_id !== null) {
    // SQL upit za pretragu klijenta prema klijent_id
    $sql = "SELECT * FROM klijent WHERE id = ?";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("i", $klijent_id);  // 'i' jer je id integer tip
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // Ako postoji klijent sa tim ID-jem
            $row = $result->fetch_assoc();
            $ime_prezime = $row['ime_prezime'];
            $mb_pib = $row['jmbg'];
        } else {
            echo "Klijent sa ID: $klijent_id nije pronađen.";
        }

        $stmt->close();
    } else {
        echo '<script>
            sessionStorage.setItem("status", "error");
            sessionStorage.setItem("message", "Greška prilikom pripreme SQL upita!");
            window.location.href = "/skadencar_unos";
        </script>';
    }
} else {
    // Kada klijent_id nije postavljen, proverava se pretraga po JMBG-u
    $ime_prezime = isset($_POST['searchKlijent']) ? $_POST['searchKlijent'] : null;
    $mb_pib = $_POST['mb_pib'];

    // Proveri da li već postoji klijent sa datim JMBG-om
    $sql_check = "SELECT * FROM klijent WHERE jmbg = ?";

    if ($stmt_check = $conn->prepare($sql_check)) {
        $stmt_check->bind_param("s", $mb_pib);  // 's' jer je JMBG string
        $stmt_check->execute();
        $result_check = $stmt_check->get_result();

        if ($result_check->num_rows > 0) {
            // Ako postoji klijent sa istim JMBG-om, ignorisati INSERT
            // echo "Klijent sa JMBG: $mb_pib već postoji.";
            
        } else {
            // Ako klijent ne postoji, izvrši INSERT za novog klijenta
            $sql_insert = "INSERT INTO klijent (ime_prezime, jmbg) VALUES (?, ?)";

            if ($stmt_insert = $conn->prepare($sql_insert)) {
                $stmt_insert->bind_param("ss", $ime_prezime, $mb_pib);
                if ($stmt_insert->execute()) {
                    echo "Novi klijent je uspešno dodat!";
                } else {
                    echo "Greška prilikom dodavanja novog klijenta.";
                    echo '<script>
                            sessionStorage.setItem("status", "error");
                            sessionStorage.setItem("message", "Došlo je do greške prilikom dodavanja novog klijenta., pokušaj ponovo ili kontaktiraj podršku!");
                            window.location.href = "/skadencar_unos";
                        </script>';
                        exit();
                }
                $stmt_insert->close();
            }
        }

        $stmt_check->close();
    } else {
        echo "Greška prilikom pripreme SQL upita za proveru JMBG.";
    }
}


    // Priprema SQL upita za unos podataka u bazu
    $sql = "INSERT INTO skadencar (id, broj_polise, ime_prezime, mb_pib, osig_kuca, skadencar_pocetak, grana_tarifa, premija_sa_porezom, nacin_placanja, brokerska_kuca, komentar) 
            VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    // Priprema izjave
    if ($stmt = $conn->prepare($sql)) {
        // Veza parametara sa pripremljenom izjavom
        $stmt->bind_param("ssssssdsss", $broj_polise, $ime_prezime, $mb_pib, $osig_kuca, $skadencar_pocetak, $grana_tarifa, $premija_sa_porezom, $nacin_placanja, $brokerska_kuca, $komentar);
        
        // Izvršavanje upita
        if ($stmt->execute()) {
            // Redirekcija ili poruka o uspehu
            echo '<script>
                sessionStorage.setItem("status", "success");
                sessionStorage.setItem("message", "Uspesno dodata polisa u skadencar!");
                window.location.href = "/skadencar_unos";
            </script>';
        } else {
            // U slučaju greške, redirekcija sa greškom
            echo '<script>
                    sessionStorage.setItem("status", "error");
                    sessionStorage.setItem("message", "Došlo je do greške, pokušaj ponovo!");
                    window.location.href = "/skadencar_unos";
                </script>';
                exit();
        }

        // Zatvaranje pripremljene izjave
        $stmt->close();
    } else {
        // U slučaju greške u pripremi izjave
        echo '<script>
                sessionStorage.setItem("status", "error");
                sessionStorage.setItem("message", "Greška prilikom pripreme SQL upita!");
                window.location.href = "/skadencar_unos";
            </script>';
    }

    // Zatvaranje konekcije na bazu
    $conn->close();
}
?>