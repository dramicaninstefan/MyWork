<?php
// Uključite config.php za povezivanje sa bazom
include('../config.php'); // Ovaj fajl mora biti u istoj fascikli ili navedite apsolutnu putanju

// Uzimanje podataka iz POST zahteva
$klijent_id = $_POST['klijent_id'];
$opis = $_POST['opis'];
$punomoc = isset($_FILES['punomoc']) && $_FILES['punomoc']['error'] == 0 ? file_get_contents($_FILES['punomoc']['tmp_name']) : NULL;
$status = "U pripremi"; // ili vrednost koja ti odgovara
$poslato = NULL; // ili vrednost koja ti odgovara
$created_at = date('Y-m-d H:i:s'); // trenutni datum i vreme

// Funkcija za učitavanje fajlova
function uploadFiles($fileNames) {
    $uploadedFiles = [];
    foreach ($fileNames as $fileName) {
        if (isset($_FILES[$fileName]) && $_FILES[$fileName]['error'] == 0) {
            $uploadedFiles[$fileName] = file_get_contents($_FILES[$fileName]['tmp_name']);
        } else {
            $uploadedFiles[$fileName] = NULL; // Ako fajl nije učitan, postavi na NULL
        }
    }
    return $uploadedFiles;
}

// Spisak fajlova za učitavanje
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

// Učitaj fajlove
$uploadedFiles = uploadFiles($fileNames);

// Pripremi upit za umetanje podataka
$stmt = $conn->prepare("INSERT INTO `klijenti_stete` (`id`, `klijent_id`, `opis`, `status_izvrsenja`, `poslato`, `created_at`, `punomoc`,
    `osteceni_licna_prednja`, `osteceni_licna_zadnja`, `osteceni_saobracajna_prednja`, 
    `osteceni_saobracajna_zadnja`, `osteceni_vozacka_prednja`, `osteceni_vozacka_zadnja`, 
    `osteceni_izjava`, `osteceni_polisa`, `osteceni_tekuci`, `emin_procena`, 
    `stetnik_licna_prednja`, `stetnik_licna_zadnja`, `stetnik_saobracajna_prednja`, 
    `stetnik_saobracajna_zadnja`, `stetnik_vozacka_prednja`, `stetnik_vozacka_zadnja`, 
    `stetnik_izjava`, `stetnik_polisa`, `dodatni_dokument1`, `dodatni_dokument2`, 
    `dodatni_dokument3`, `dodatni_dokument4`, `dodatni_dokument5`, `dodatni_dokument6`, 
    `dodatni_dokument7`, `dodatni_dokument8`, `dodatni_dokument9`, `dodatni_dokument10`,
    `dodatni_dokument11`, `dodatni_dokument12`, `dodatni_dokument13`, `dodatni_dokument14`, 
    `dodatni_dokument15`, `dodatni_dokument16`) 
VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);");

$stmt->bind_param("isssssssssssssssssssssssssssssssssssssss", 
    $klijent_id, 
    $opis, 
    $status, 
    $poslato, 
    $created_at, 
    $punomoc, 
    ...array_values($uploadedFiles) // Unosi sve učitane fajlove
);

// Izvrši upit
if ($stmt->execute()) {
    echo '<script>
                sessionStorage.setItem("status", "success");
                sessionStorage.setItem("message", "Uspešno ste kreirali štetu!");
                window.location.href = "/client_damage";
            </script>';
} else {
    echo '<script>
                    sessionStorage.setItem("status", "error");
                    sessionStorage.setItem("message", "Došlo je do greške, molim vas pokušajte ponovo!");
                    window.location.href = "/client_damage";
                </script>';
}

// Zatvori pripremljeni iskaz
$stmt->close();
?>