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
            if (count($data) !== 27) {
                echo '
                <script>
                    sessionStorage.setItem("status", "error");
                    sessionStorage.setItem("message", "CSV fajl mora imati tačno 27 kolona. Proveri format fajla!");
                    window.location.href = "/kalkulacija_stete";
                </script>';
                exit();
            }

            $steta_id = trim($data[0] ?? '');
            $klijent_id = trim($data[1] ?? '');
            $osig_kuca = strtoupper(trim($data[2] ?? ''));
            $vrsta_stete = trim($data[3] ?? '');
            $mail_subject = trim($data[4] ?? '');
            $ime_prezime = trim($data[5] ?? '');
            $kontakt = trim($data[6] ?? '');
            $preporucilac_stete = trim($data[7] ?? '');
            $sluzbena_beleska_status = trim($data[8] ?? '');
            $emin_procena_status = trim($data[9] ?? '');
            $nas_procenat = trim($data[10] ?? '');
            $isplaceno_klijent = trim($data[11] ?? '');
            $advokatski_troskovi = trim($data[12] ?? '');
            $advokatski_troskovi_uplaceno = trim($data[13] ?? '');
            $emin_procena = trim($data[14] ?? '');
            $emin_procena_uplaceno = trim($data[15] ?? '');
            $uplatnica = trim($data[16] ?? '');
            $preporucilac = trim($data[17] ?? '');
            $preporucilac_uplaceno = trim($data[18] ?? '');
            $trosak1 = trim($data[19] ?? '');
            $trosak2 = trim($data[20] ?? '');
            $trosak3 = trim($data[21] ?? '');
            $trosak4 = trim($data[22] ?? '');
            $trosak5 = trim($data[23] ?? '');
            $trosak6 = trim($data[24] ?? '');
            $trosak7 = trim($data[25] ?? '');
            $total_sum = trim($data[26] ?? '');



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
            //         window.location.href = "/kalkulacija_stete";
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
                    window.location.href = "/kalkulacija_stete";
                </script>';
                exit();
            }

            $stmt = $conn->prepare("
            INSERT INTO skadencar (
                steta_id, klijent_id, osig_kuca, vrsta_stete, mail_subject, ime_prezime, kontakt,
                preporucilac_stete, sluzbena_beleska_status, emin_procena_status, nas_procenat, isplaceno_klijent, advokatski_troskovi, 
                advokatski_troskovi_uplaceno, emin_procena, emin_procena_uplaceno, uplatnica, preporucilac, preporucilac_uplaceno, 
                trosak1, trosak2, trosak3, trosak4, trosak5, trosak6, trosak7, total_sum
            ) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
            ");

            $stmt->bind_param(
                'ssssssssssssssssssssssssssssssssssssssssss',  // string parametri
                $steta_id,
                $klijent_id,
                $osig_kuca,
                $vrsta_stete,
                $mail_subject,
                $ime_prezime,
                $kontakt,
                $preporucilac_stete,
                $sluzbena_beleska_status,
                $emin_procena_status,
                $nas_procenat,
                $isplaceno_klijent,
                $advokatski_troskovi,
                $advokatski_troskovi_uplaceno,
                $emin_procena,
                $emin_procena_uplaceno,
                $uplatnica,
                $preporucilac,
                $preporucilac_uplaceno,
                $trosak1,
                $trosak2,
                $trosak3,
                $trosak4,
                $trosak5,
                $trosak6,
                $trosak7,
                $total_sum
            );

            // Izvrši upit
            if($stmt->execute()){
                echo '
                <script>
                    sessionStorage.setItem("status", "success");
                    sessionStorage.setItem("message", "Uspešno uneti podaci iz CVS fajla!");
                    window.location.href = "/kalkulacija_stete";
                </script>';
            }
            else {
                echo '
                <script>
                    sessionStorage.setItem("status", "error");
                    sessionStorage.setItem("message", "Došlo je do greške, pokušaj ponovo!");
                    window.location.href = "/kalkulacija_stete";
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