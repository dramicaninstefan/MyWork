<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

include('../config.php');

// Proveri da li je fajl postavljen i da li je CSV
if (isset($_FILES['csv_file']) && $_FILES['csv_file']['error'] == 0) {
    $fileTmpPath = $_FILES['csv_file']['tmp_name'];
    $fileName = $_FILES['csv_file']['name'];
    $fileSize = $_FILES['csv_file']['size'];
    $fileType = $_FILES['csv_file']['type'];

    // Proveri da li je fajl CSV
    $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
    if ($fileExtension != 'csv') {
        die("Molimo vas, postavite CSV fajl.");
    }

    // Otvori CSV fajl
    if (($handle = fopen($fileTmpPath, 'r')) !== FALSE) {
        // Preskoči prvi red (zaglavlje)
        fgetcsv($handle, 1000, ',', '"', '');

        // Prolazi kroz redove CSV fajla i unosi podatke u bazu
        while (($data = fgetcsv($handle, 1000, ',', '"', '')) !== FALSE) {
            // Proveri da li red CSV fajla ima tačno 12 kolona
            if (count($data) !== 43) {
                echo '
                <script>
                    sessionStorage.setItem("status", "error");
                    sessionStorage.setItem("message", "CSV fajl mora imati tačno 43 kolona. Proveri format fajla!");
                    window.location.href = "/skadencar_unos";
                </script>';
                exit();
            }

            $komentar = trim($data[0] ?? '');
            $broj_polise = trim($data[1] ?? '');
            $ime_prezime = trim($data[2] ?? '');
            $mb_pib = trim($data[3] ?? '');
            $osig_kuca = strtoupper(trim($data[4] ?? ''));
            $skadencar_pocetak = trim($data[5] ?? '');
            $skadencar_kraj = trim($data[6] ?? '');
            $skadencar_obnova = trim($data[7] ?? '');
            $grana_tarifa = strtoupper(trim($data[8] ?? ''));
            $premija_bez_poreza = trim($data[9] ?? '');
            $premija_sa_porezom = trim($data[10] ?? '');
            $nacin_placanja = strtoupper(trim($data[11] ?? ''));
            $brokerska_kuca = strtoupper(trim($data[12] ?? ''));
            $brokerska_kuca_isplaceno = trim($data[13] ?? '');
            $brokerska_kuca_procenat = trim($data[14] ?? '');
            $brokerska_kuca_uplata = trim($data[15] ?? '');
            $brokerska_kuca_uplata_datum = trim($data[16] ?? '');
            $brokerska_kuca_uplata_rata1 = trim($data[17] ?? '');
            $brokerska_kuca_uplata_rata1_datum = trim($data[18] ?? '');
            $brokerska_kuca_uplata_rata2 = trim($data[19] ?? '');
            $brokerska_kuca_uplata_rata2_datum = trim($data[20] ?? '');
            $brokerska_kuca_uplata_rata3 = trim($data[21] ?? '');
            $brokerska_kuca_uplata_rata3_datum = trim($data[22] ?? '');
            $brokerska_kuca_uplata_rata4 = trim($data[23] ?? '');
            $brokerska_kuca_uplata_rata4_datum = trim($data[24] ?? '');
            $brokerska_kuca_uplata_rata5 = trim($data[25] ?? '');
            $brokerska_kuca_uplata_rata5_datum = trim($data[26] ?? '');
            $brokerska_kuca_uplata_rata6 = trim($data[27] ?? '');
            $brokerska_kuca_uplata_rata6_datum = trim($data[28] ?? '');
            $brokerska_kuca_uplata_rata7 = trim($data[29] ?? '');
            $brokerska_kuca_uplata_rata7_datum = trim($data[30] ?? '');
            $brokerska_kuca_uplata_rata8 = trim($data[31] ?? '');
            $brokerska_kuca_uplata_rata8_datum = trim($data[32] ?? '');
            $brokerska_kuca_uplata_rata9 = trim($data[33] ?? '');
            $brokerska_kuca_uplata_rata9_datum = trim($data[34] ?? '');
            $brokerska_kuca_uplata_rata10 = trim($data[35] ?? '');
            $brokerska_kuca_uplata_rata10_datum = trim($data[36] ?? '');
            $brokerska_kuca_uplata_rata11 = trim($data[37] ?? '');
            $brokerska_kuca_uplata_rata11_datum = trim($data[38] ?? '');
            $brokerska_kuca_uplata_rata12 = trim($data[39] ?? '');
            $brokerska_kuca_uplata_rata12_datum = trim($data[40] ?? '');
            $brokerska_kuca_uplata_nacin_placanja_toggle = strtoupper(trim($data[41] ?? ''));
            $created_at = trim($data[42] ?? '');


                // Očisti eventualne nevidljive karaktere (posebno iz Excela)
            // $skadencar_pocetak = preg_replace('/[^\d\.]/', '', $skadencar_pocetak);

            // Debug
            // echo '<pre>'; var_dump($skadencar_pocetak); echo '</pre>'; exit;

            // $skadencar_pocetak_obj = DateTime::createFromFormat('d/m/Y', $skadencar_pocetak);

            // if (!$skadencar_pocetak_obj) {
            //     echo '
            //     <script>
            //         sessionStorage.setItem("status", "error");
            //         sessionStorage.setItem("message", "Neispravan format datuma: ' . $skadencar_pocetak . '");
            //         window.location.href = "/skadencar_unos";
            //     </script>';
            //     exit();
            // }

            // $skadencar_pocetak = $skadencar_pocetak_obj->format('Y-m-d');


            // Provera da li su neka ključna polja prazna
            if (
                $broj_polise === '' || $ime_prezime === '' || $mb_pib === '' || $osig_kuca === '' ||
                $skadencar_pocetak === '' || $grana_tarifa === '' || $premija_sa_porezom === '' || $nacin_placanja === ''
            ) {
                echo '
                <script>
                    sessionStorage.setItem("status", "error");
                    sessionStorage.setItem("message", "Greška: Neke od obaveznih vrednosti su prazne. Proveri format fajla! (Broj polise, Ime i prezime, MB/PIB, Osig. kuća, Skadencar početak, Grana tarifa, Premija sa porezom, Način plaćanja)");
                    window.location.href = "/skadencar_unos";
                </script>';
                exit();
            }

            $stmt = $conn->prepare("
            INSERT INTO skadencar (
                komentar, broj_polise, ime_prezime, mb_pib, osig_kuca, skadencar_pocetak, skadencar_kraj, skadencar_obnova, grana_tarifa, 
                premija_bez_poreza, premija_sa_porezom, nacin_placanja, brokerska_kuca, brokerska_kuca_isplaceno, brokerska_kuca_procenat, 
                brokerska_kuca_uplata, brokerska_kuca_uplata_datum, brokerska_kuca_uplata_rata1, brokerska_kuca_uplata_rata1_datum, 
                brokerska_kuca_uplata_rata2, brokerska_kuca_uplata_rata2_datum, brokerska_kuca_uplata_rata3, brokerska_kuca_uplata_rata3_datum, 
                brokerska_kuca_uplata_rata4, brokerska_kuca_uplata_rata4_datum, brokerska_kuca_uplata_rata5, brokerska_kuca_uplata_rata5_datum, 
                brokerska_kuca_uplata_rata6, brokerska_kuca_uplata_rata6_datum, brokerska_kuca_uplata_rata7, brokerska_kuca_uplata_rata7_datum, 
                brokerska_kuca_uplata_rata8, brokerska_kuca_uplata_rata8_datum, brokerska_kuca_uplata_rata9, brokerska_kuca_uplata_rata9_datum, 
                brokerska_kuca_uplata_rata10, brokerska_kuca_uplata_rata10_datum, brokerska_kuca_uplata_rata11, brokerska_kuca_uplata_rata11_datum, 
                brokerska_kuca_uplata_rata12, brokerska_kuca_uplata_rata12_datum, brokerska_kuca_uplata_nacin_placanja_toggle, created_at
            ) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
        ");
        

        $stmt->bind_param(
            'sssssssssssssssssssssssssssssssssssssssssss',  // string parametri
            $komentar,
            $broj_polise,
            $ime_prezime,
            $mb_pib,
            $osig_kuca,
            $skadencar_pocetak,
            $skadencar_kraj,
            $skadencar_obnova,
            $grana_tarifa,
            $premija_bez_poreza,
            $premija_sa_porezom,
            $nacin_placanja,
            $brokerska_kuca,
            $brokerska_kuca_isplaceno,
            $brokerska_kuca_procenat,
            $brokerska_kuca_uplata,
            $brokerska_kuca_uplata_datum,
            $brokerska_kuca_uplata_rata1,
            $brokerska_kuca_uplata_rata1_datum,
            $brokerska_kuca_uplata_rata2,
            $brokerska_kuca_uplata_rata2_datum,
            $brokerska_kuca_uplata_rata3,
            $brokerska_kuca_uplata_rata3_datum,
            $brokerska_kuca_uplata_rata4,
            $brokerska_kuca_uplata_rata4_datum,
            $brokerska_kuca_uplata_rata5,
            $brokerska_kuca_uplata_rata5_datum,
            $brokerska_kuca_uplata_rata6,
            $brokerska_kuca_uplata_rata6_datum,
            $brokerska_kuca_uplata_rata7,
            $brokerska_kuca_uplata_rata7_datum,
            $brokerska_kuca_uplata_rata8,
            $brokerska_kuca_uplata_rata8_datum,
            $brokerska_kuca_uplata_rata9,
            $brokerska_kuca_uplata_rata9_datum,
            $brokerska_kuca_uplata_rata10,
            $brokerska_kuca_uplata_rata10_datum,
            $brokerska_kuca_uplata_rata11,
            $brokerska_kuca_uplata_rata11_datum,
            $brokerska_kuca_uplata_rata12,
            $brokerska_kuca_uplata_rata12_datum,
            $brokerska_kuca_uplata_nacin_placanja_toggle,
            $created_at
        );
        



            // Izvrši upit
            if($stmt->execute()){
                echo '
                <script>
                    sessionStorage.setItem("status", "success");
                    sessionStorage.setItem("message", "Uspešno uneti podaci iz CVS fajla!");
                    window.location.href = "/skadencar_unos";
                </script>';
            }
            else {
                echo '
                <script>
                    sessionStorage.setItem("status", "error");
                    sessionStorage.setItem("message", "Došlo je do greške, pokušaj ponovo!");
                    window.location.href = "/skadencar_unos";
                </script>';
            }
        }


        // Zatvori fajl
        fclose($handle);

        echo "Podaci su uspešno uneseni u bazu.";
    } else {
        echo '<script>
                    sessionStorage.setItem("status", "error");
                    sessionStorage.setItem("message", "Došlo je do greške prilikom otvaranja fajla, pokušaj ponovo ili kontaktiraj podršku!");
                    window.location.href = "/skadencar_obnove";
                </script>';
    }
} else {
    echo "Molimo vas da izaberete CSV fajl.";
}

// Zatvori konekciju
$conn->close();
?>