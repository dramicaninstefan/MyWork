<?php
// Uključivanje konfiguracije za bazu
include('../config.php');

$id = isset($_POST['damage_id']) ? intval($_POST['damage_id']) : null;
$klijent_id = isset($_POST['klijent_id']) ? intval($_POST['klijent_id']) : null;
$osig_kuca = isset($_POST['osig_kuca']) ? $conn->real_escape_string($_POST['osig_kuca']) : null;  
$weTransfer_link = isset($_POST['weTransfer_link']) ? $conn->real_escape_string($_POST['weTransfer_link']) : null;  
$opis = isset($_POST['opis']) ? $conn->real_escape_string($_POST['opis']) : null;  
$preporucilac = isset($_POST['preporucilac']) && $_POST['preporucilac'] !== 'Nema preporučioca' 
    ? $conn->real_escape_string($_POST['preporucilac']) 
    : null;

$reg_oznaka = isset($_POST['reg_oznaka']) ? $conn->real_escape_string($_POST['reg_oznaka']) : null;  // Dodato za registarsku oznaku

// Provera i obrada fajla "punomoc"
$punomoc = NULL;
$punomoc_extension = NULL;
if (isset($_FILES['punomoc']) && $_FILES['punomoc']['error'] == 0) {
    $punomoc = file_get_contents($_FILES['punomoc']['tmp_name']);
    $punomoc = $conn->real_escape_string($punomoc);
    $punomoc_extension = pathinfo($_FILES['punomoc']['name'], PATHINFO_EXTENSION);
    $punomoc_extension = $conn->real_escape_string($punomoc_extension);
}

// Provera i obrada fajla "odstetni_zahtev"
$odstetni_zahtev = NULL;
$odstetni_zahtev_extension = NULL;
if (isset($_FILES['odstetni_zahtev']) && $_FILES['odstetni_zahtev']['error'] == 0) {
    $odstetni_zahtev = file_get_contents($_FILES['odstetni_zahtev']['tmp_name']);
    $odstetni_zahtev = $conn->real_escape_string($odstetni_zahtev);
    $odstetni_zahtev_extension = pathinfo($_FILES['odstetni_zahtev']['name'], PATHINFO_EXTENSION);
    $odstetni_zahtev_extension = $conn->real_escape_string($odstetni_zahtev_extension);
}

// Provera i obrada fajla "sluzbena_beleska"
$sluzbena_beleska = NULL;
$sluzbena_beleska_extension = NULL;
if (isset($_FILES['sluzbena_beleska']) && $_FILES['sluzbena_beleska']['error'] == 0) {
    $sluzbena_beleska = file_get_contents($_FILES['sluzbena_beleska']['tmp_name']);
    $sluzbena_beleska = $conn->real_escape_string($sluzbena_beleska);
    $sluzbena_beleska_extension = pathinfo($_FILES['sluzbena_beleska']['name'], PATHINFO_EXTENSION);
}
   

// Lista polja za fajlove
$fileNames = [
    'osteceni_licna_prednja', 'osteceni_licna_zadnja', 'osteceni_saobracajna_prednja',
    'osteceni_saobracajna_zadnja', 'osteceni_vozacka_prednja', 'osteceni_vozacka_zadnja',
    'osteceni_izjava', 'osteceni_polisa', 'osteceni_tekuci', 'emin_procena',
    'stetnik_licna_prednja', 'stetnik_licna_zadnja', 'stetnik_saobracajna_prednja',
    'stetnik_saobracajna_zadnja', 'stetnik_vozacka_prednja', 'stetnik_vozacka_zadnja',
    'stetnik_izjava', 'stetnik_polisa', 'evropski_izvestaj',
    'dodatni_dokument1', 'dodatni_dokument2', 'dodatni_dokument3',
    'dodatni_dokument4', 'dodatni_dokument5', 'dodatni_dokument6',
    'dodatni_dokument7', 'dodatni_dokument8', 'dodatni_dokument9',
    'dodatni_dokument10', 'dodatni_dokument11', 'dodatni_dokument12',
    'dodatni_dokument13', 'dodatni_dokument14', 'dodatni_dokument15',
    'dodatni_dokument16'
];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!$id || !$klijent_id) {
        die("Nevalidan ID ili Klijent ID");
    }

    $fileContents = [];
    $fileExtensions = [];
    $hasFiles = false;

    foreach ($fileNames as $fileName) {
        if (isset($_FILES[$fileName]) && $_FILES[$fileName]['error'] == 0) {
            $fileContent = file_get_contents($_FILES[$fileName]['tmp_name']);
            $fileContents[$fileName] = $conn->real_escape_string($fileContent);

            $fileExtension = pathinfo($_FILES[$fileName]['name'], PATHINFO_EXTENSION);
            $fileExtensions[$fileName] = $conn->real_escape_string($fileExtension);

            $hasFiles = true;
        }
    }

    // Ako nema novih fajlova i nema opisa, prekini
    if (!$hasFiles && !$opis && !$punomoc && !$reg_oznaka) {  // Dodato da se proveri registarska oznaka
        echo '
        <script>
            sessionStorage.setItem("status", "info");
            sessionStorage.setItem("message", "Nema novih fajlova ili opisa za dodavanje.");
            window.location.href = "/stete";
        </script>';
        exit;
    }

    // Formiranje SQL upita
    $updateQuery = "UPDATE klijenti_stete SET ";
    $updates = [];

    foreach ($fileContents as $column => $value) {
        $updates[] = "$column = '$value'";
        $extensionColumn = $column . "_extension"; 
        $updates[] = "$extensionColumn = '{$fileExtensions[$column]}'";
    }

    if ($punomoc !== NULL) {
        $updates[] = "punomoc = '$punomoc'";
        $updates[] = "punomoc_extension = '$punomoc_extension'";
    }
    
    if ($odstetni_zahtev !== NULL) {
        $updates[] = "odstetni_zahtev = '$odstetni_zahtev'";
        $updates[] = "odstetni_zahtev_extension = '$odstetni_zahtev_extension'";
    }

    if ($sluzbena_beleska !== NULL) {
        $updates[] = "sluzbena_beleska = '$sluzbena_beleska'";
        $updates[] = "sluzbena_beleska_extension = '$sluzbena_beleska_extension'";
    }

    if ($osig_kuca !== null) {
        $updates[] = "osig_kuca_stetnik = '$osig_kuca'";
    }

    if ($opis !== null) {
        $updates[] = "opis = '$opis'";
    }
    
    if ($preporucilac !== null) {
        $updates[] = "preporucilac = '$preporucilac'";
    }

    if ($reg_oznaka !== null) {  // Dodato da se ažurira registarska oznaka
        $updates[] = "reg_oznaka = '$reg_oznaka'";
    }

    if ($weTransfer_link !== null) {  // Dodato da se ažurira registarska oznaka
        $updates[] = "weTransfer_link = '$weTransfer_link'";
    }

    $updateQuery .= implode(", ", $updates) . " WHERE id = $id AND klijent_id = $klijent_id";

    if ($conn->query($updateQuery) === TRUE) {
        echo '
        <script>
            sessionStorage.setItem("status", "success");
            sessionStorage.setItem("message", "Uspešno sačuvano!");
            window.location.href = "/stete";
        </script>';
    } else {
        echo '
        <script>
            sessionStorage.setItem("status", "error");
            sessionStorage.setItem("message", "Došlo je do greške, pokušaj ponovo!");
            window.location.href = "/stete";
        </script>';
    }
}

$conn->close();
?>