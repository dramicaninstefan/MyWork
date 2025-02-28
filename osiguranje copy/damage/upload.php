<?php
// Uključite config.php za povezivanje sa bazom
include('config.php'); // Ovaj fajl mora biti u istoj fascikli ili navedite apsolutnu putanju

$id = isset($_POST['damage_id']) ? $_POST['damage_id'] : null;
$klijent_id = isset($_POST['klijent_id']) ? $_POST['klijent_id'] : null;


$fileNames = [
    "osteceni_licna_prednja", "osteceni_licna_zadnja", "osteceni_saobracajna_prednja", "osteceni_saobracajna_zadnja",
    "osteceni_vozacka_prednja", "osteceni_vozacka_zadnja", "osteceni_izvestaj", "osteceni_izjava",
    "osteceni_polisa", "osteceni_tekuci", "stetnik_licna_prednja", "stetnik_licna_zadnja",
    "stetnik_saobracajna_prednja", "stetnik_saobracajna_zadnja", "stetnik_vozacka_prednja", "stetnik_vozacka_zadnja",
    "stetnik_izjava", "stetnik_polisa", "emin_procena", "dodatni_dokument1",
    "dodatni_dokument2", "dodatni_dokument3", "dodatni_dokument4", "dodatni_dokument5", "dodatni_dokument6"
];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fileContents = [];
    $hasFiles = false; // Flag za proveru da li su fajlovi poslati
    
    foreach ($fileNames as $fileName) {
        if (isset($_FILES['data_files']['tmp_name'][$fileName]) && $_FILES['data_files']['error'][$fileName] == 0) {
            $fileContent = file_get_contents($_FILES['data_files']['tmp_name'][$fileName]);
            $fileContents[$fileName] = $conn->real_escape_string($fileContent);
            $hasFiles = true; // Ako je makar jedan fajl pronađen, setujemo flag
        }
    }

    // Ako nema nijednog fajla, samo preusmeri korisnika bez SQL upita
    if (!$hasFiles) {
        echo '
        <script>
            sessionStorage.setItem("status", "info");
            sessionStorage.setItem("message", "Nema novih fajlova za dodavanje.");
            window.location.href = "/client_damage";
        </script>';
        exit;
    }

    // Formiranje SQL upita samo ako postoje novi fajlovi
    $updateQuery = "UPDATE klijenti_stete SET ";
    $updates = [];
    foreach ($fileContents as $column => $value) {
        $updates[] = "$column = '$value'";
    }
    $updateQuery .= implode(", ", $updates) . " WHERE id = $id and klijent_id = $klijent_id";

    if ($conn->query($updateQuery) === TRUE) {
        echo '
        <script>
            sessionStorage.setItem("status", "success");
            sessionStorage.setItem("message", "Uspešno ste dodali slike za predmet!");
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