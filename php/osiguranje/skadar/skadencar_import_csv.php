<?php
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
        fgetcsv($handle);

        // Prolazi kroz redove CSV fajla i unosi podatke u bazu
        while (($data = fgetcsv($handle, 1000, ',')) !== FALSE) {
            // Proveri da li red CSV fajla ima tačno 12 kolona
            if (count($data) !== 12) {
                echo '
                <script>
                    sessionStorage.setItem("status", "error");
                    sessionStorage.setItem("message", "CSV fajl mora imati tačno 12 kolona. Proveri format fajla!");
                    window.location.href = "/skadencar_unos";
                </script>';
                exit();
            }

            // Trimuj sve vrednosti i smesti u promenljive radi lakšeg pregleda i provere
            $broj_polise = trim($data[1] ?? '');
            $ime_prezime = trim($data[2] ?? '');
            $mb_pib = trim($data[3] ?? '');
            $osig_kuca = strtoupper(trim($data[4] ?? ''));
            $skadencar_pocetak = trim($data[5] ?? '');
            $skadencar_kraj = trim($data[6] ?? '');
            $grana_tarifa = strtoupper(trim($data[7] ?? ''));
            $premija_bez_poreza = trim($data[8] ?? '');
            $premija_sa_porezom = trim($data[9] ?? '');
            $nacin_placanja = strtoupper(trim($data[10] ?? ''));
            $brokerska_kuca = strtoupper(trim($data[11] ?? ''));
            $komentar = trim($data[0] ?? '');

                // Očisti eventualne nevidljive karaktere (posebno iz Excela)
            // $skadencar_pocetak = preg_replace('/[^\d\.]/', '', $skadencar_pocetak);

            // Debug
            // echo '<pre>'; var_dump($skadencar_pocetak); echo '</pre>'; exit;

            $skadencar_pocetak_obj = DateTime::createFromFormat('d/m/Y', $skadencar_pocetak);

            if (!$skadencar_pocetak_obj) {
                echo '
                <script>
                    sessionStorage.setItem("status", "error");
                    sessionStorage.setItem("message", "Neispravan format datuma: ' . $skadencar_pocetak . '");
                    window.location.href = "/skadencar_unos";
                </script>';
                exit();
            }

            $skadencar_pocetak = $skadencar_pocetak_obj->format('Y-m-d');


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

            // Priprema SQL upita
            $stmt = $conn->prepare("
                INSERT INTO skadencar 
                (broj_polise, ime_prezime, mb_pib, osig_kuca, skadencar_pocetak, grana_tarifa, premija_sa_porezom, nacin_placanja, brokerska_kuca, komentar) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
            ");

            // Bind parametara
            $stmt->bind_param('ssssssssss', 
                $broj_polise,
                $ime_prezime,
                $mb_pib,
                $osig_kuca,
                $skadencar_pocetak,
                $grana_tarifa,
                $premija_sa_porezom,
                $nacin_placanja,
                $brokerska_kuca,
                $komentar
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