<?php
// Uključivanje konfiguracije za bazu
include('../config.php');

$id = isset($_POST['damage_id']) ? intval($_POST['damage_id']) : null;
$klijent_id = isset($_POST['klijent_id']) ? intval($_POST['klijent_id']) : null;
$opis = isset($_POST['opis']) ? $conn->real_escape_string($_POST['opis']) : null;  

// Provera i obrada fajla "punomoc"
$punomoc = NULL;
$punomoc_extension = NULL;
if (isset($_FILES['punomoc']) && $_FILES['punomoc']['error'] == 0) {
    $punomoc = file_get_contents($_FILES['punomoc']['tmp_name']);
    $punomoc = $conn->real_escape_string($punomoc);
    $punomoc_extension = pathinfo($_FILES['punomoc']['name'], PATHINFO_EXTENSION);
    $punomoc_extension = $conn->real_escape_string($punomoc_extension);
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
    if (!$hasFiles && !$opis && !$punomoc) {
        echo '
        <script>
            sessionStorage.setItem("status", "info");
            sessionStorage.setItem("message", "Nema novih fajlova ili opisa za dodavanje.");
            window.location.href = "/client_damage";
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

    if ($opis !== null) {
        $updates[] = "opis = '$opis'";
    }

    $updateQuery .= implode(", ", $updates) . " WHERE id = $id AND klijent_id = $klijent_id";

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