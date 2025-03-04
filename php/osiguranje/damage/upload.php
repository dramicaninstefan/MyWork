<?php
// Uključite config.php za povezivanje sa bazom
include('../config.php'); // Ovaj fajl mora biti u istoj fascikli ili navedite apsolutnu putanju

$id = isset($_POST['damage_id']) ? $_POST['damage_id'] : null;
$klijent_id = isset($_POST['klijent_id']) ? $_POST['klijent_id'] : null;
$punomoc = isset($_FILES['punomoc']) && $_FILES['punomoc']['error'] == 0 ? file_get_contents($_FILES['punomoc']['tmp_name']) : NULL;
$opis = isset($_POST['opis']) ? $_POST['opis'] : null;  // Dodato za opis

$fileNames = [
    'osteceni_licna_prednja', 'osteceni_licna_zadnja', 'osteceni_saobracajna_prednja',
    'osteceni_saobracajna_zadnja', 'osteceni_vozacka_prednja', 'osteceni_vozacka_zadnja',
    'osteceni_izjava', 'osteceni_polisa', 'osteceni_tekuci', 'emin_procena',
    'stetnik_licna_prednja', 'stetnik_licna_zadnja', 'stetnik_saobracajna_prednja',
    'stetnik_saobracajna_zadnja', 'stetnik_vozacka_prednja', 'stetnik_vozacka_zadnja',
    'stetnik_izjava', 'stetnik_polisa',
    'dodatni_dokument1', 'dodatni_dokument2', 'dodatni_dokument3',
    'dodatni_dokument4', 'dodatni_dokument5', 'dodatni_dokument6',
    'dodatni_dokument7', 'dodatni_dokument8', 'dodatni_dokument9',
    'dodatni_dokument10', 'dodatni_dokument11', 'dodatni_dokument12',
    'dodatni_dokument13', 'dodatni_dokument14', 'dodatni_dokument15',
    'dodatni_dokument16'
];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fileContents = [];
    $fileExtensions = [];
    $hasFiles = false; // Flag za proveru da li su fajlovi poslati
    
    foreach ($fileNames as $fileName) {
        if (isset($_FILES['data_files']['tmp_name'][$fileName]) && $_FILES['data_files']['error'][$fileName] == 0) {
            // Čuvanje sadržaja fajla
            $fileContent = file_get_contents($_FILES['data_files']['tmp_name'][$fileName]);
            $fileContents[$fileName] = $conn->real_escape_string($fileContent);

            // Čuvanje ekstenzije fajla
            $fileExtension = pathinfo($_FILES['data_files']['name'][$fileName], PATHINFO_EXTENSION);
            $fileExtensions[$fileName] = $conn->real_escape_string($fileExtension);

            $hasFiles = true; // Ako je makar jedan fajl pronađen, setujemo flag
        }
    }

    // Ako nema nijednog fajla, samo preusmeri korisnika bez SQL upita
    // if (!$hasFiles && !$opis) {
    //     echo '
    //     <script>
    //         sessionStorage.setItem("status", "info");
    //         sessionStorage.setItem("message", "Nema novih fajlova ili opisa za dodavanje.");
    //         window.location.href = "/client_damage";
    //     </script>';
    //     exit;
    // }

    // Formiranje SQL upita samo ako postoje novi fajlovi ili opis
    $updateQuery = "UPDATE klijenti_stete SET ";
    $updates = [];
    
    // Dodajemo fajlove i ekstenzije u upit
    foreach ($fileContents as $column => $value) {
        $updates[] = "$column = '$value'";
        $extensionColumn = $column . "_extension";  // Dodajemo naziv kolone za ekstenziju
        $updates[] = "$extensionColumn = '{$fileExtensions[$column]}'";
    }

    // Dodajemo punomoć, ako postoji
    if ($punomoc !== NULL) {
        $punomoc = $conn->real_escape_string($punomoc); // Obezbediti da nema SQL injekcija
        $updates[] = "punomoc = '$punomoc'";
    }

    // Dodajemo opis u upit, ako postoji
    if ($opis !== null) {
        $opis = $conn->real_escape_string($opis); // Obezbediti da nema SQL injekcija
        $updates[] = "opis = '$opis'";
    }

    $updateQuery .= implode(", ", $updates) . " WHERE id = $id and klijent_id = $klijent_id";

    if ($conn->query($updateQuery) === TRUE) {
        echo '
        <script>
            sessionStorage.setItem("status", "success");
            sessionStorage.setItem("message", "Uspešno sačuvano!");
            window.location.href = "/client_damage";
        </script>';
    } else {
        echo '
        <script>
            sessionStorage.setItem("status", "error");
            sessionStorage.setItem("message", "Došlo je do greške, molim vas pokušajte ponovo!");
            window.location.href = "/client_damage";
        </script>';
    }
}

$conn->close();
?>