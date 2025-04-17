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
            // Proveri da li ima tačno 8 kolona
            if (count($data) !== 8) {
                echo '
                <script>
                    sessionStorage.setItem("status", "error");
                    sessionStorage.setItem("message", "CSV fajl mora imati tačno 8 kolona. Proveri format fajla!");
                    window.location.href = "/klijenti";
                </script>';
                exit();
            }

            // Trimuj i proveri svako od 8 polja
            $ime_prezime = trim($data[0]);
            $kontakt = trim($data[1]);
            $email = trim($data[2]);
            $jmbg = trim($data[3]);
            $adresa = trim($data[4]);
            $mesto = trim($data[5]);
            $punomoc_procenat = trim($data[6]);
            $punomoc_dinara = trim($data[7]);

            if (
                $ime_prezime === '' || $kontakt === '' || $jmbg === '' ||
                $adresa === '' || $mesto === '' || $punomoc_procenat === '' || $punomoc_dinara === ''
            ) {
                echo '
                <script>
                    sessionStorage.setItem("status", "error");
                    sessionStorage.setItem("message", "Greška: Neka od polja u CSV redu su prazna. Proveri unos!");
                    window.location.href = "/klijenti";
                </script>';
                exit();
            }

            // Ako je sve OK, pripremi upit
            $stmt = $conn->prepare("
                INSERT INTO klijent 
                (ime_prezime, kontakt, email, jmbg, adresa, mesto, punomoc_procenat, punomoc_dinara) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?)
            ");

            // Binduj validirane vrednosti
            $stmt->bind_param('ssssssss', 
                $ime_prezime,
                $kontakt,
                $email,
                $jmbg,
                $adresa,
                $mesto,
                $punomoc_procenat,
                $punomoc_dinara
            );


            // Izvrši upit
            if($stmt->execute()){
                echo '
                <script>
                    sessionStorage.setItem("status", "success");
                    sessionStorage.setItem("message", "Uspešno uneti podaci iz CVS fajla!");
                    window.location.href = "/klijenti";
                </script>';
            }
            else {
                echo '
                <script>
                    sessionStorage.setItem("status", "error");
                    sessionStorage.setItem("message", "Došlo je do greške, pokušaj ponovo!");
                    window.location.href = "/klijenti";
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
                    window.location.href = "/klijenti";
                </script>';
        echo "Greška prilikom otvaranja fajla.";
    }
} else {
    echo "Molimo vas da izaberete CSV fajl.";
}

// Zatvori konekciju
$conn->close();
?>