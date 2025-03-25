<?php
// Uključite config.php za povezivanje sa bazom
include('../config.php'); // Ovaj fajl mora biti u istoj fascikli ili navedite apsolutnu putanju

// Uzimanje podataka iz POST zahteva
$klijent_id = $_POST['klijent_id'];
$opis = $_POST['opis'];
$reg_oznaka = $_POST['reg_oznaka']; // Dodato polje za registarsku oznaku
$osig_kuca = $_POST['osig_kuca']; // Dodato polje za registarsku oznaku
$status = "U pripremi"; // ili vrednost koja ti odgovara
$poslato = NULL; // ili vrednost koja ti odgovara
$created_at = date('Y-m-d H:i:s'); // trenutni datum i vreme

// Funkcija za učitavanje fajlova i ekstenzija
function uploadFiles($fileNames) {
    $uploadedFiles = [];
    $uploadedExtensions = [];
    
    foreach ($fileNames as $fileName) {
        if (isset($_FILES[$fileName]) && $_FILES[$fileName]['error'] == 0) {
            $uploadedFiles[$fileName] = file_get_contents($_FILES[$fileName]['tmp_name']);
            $uploadedExtensions[$fileName . '_extension'] = pathinfo($_FILES[$fileName]['name'], PATHINFO_EXTENSION);
        } else {
            $uploadedFiles[$fileName] = NULL;
            $uploadedExtensions[$fileName . '_extension'] = NULL;
        }
    }

    return [$uploadedFiles, $uploadedExtensions];
}

// Spisak fajlova za učitavanje
$fileNames = [
    'osteceni_licna_prednja', 'osteceni_licna_zadnja', 'osteceni_saobracajna_prednja', 'osteceni_saobracajna_zadnja',
    'osteceni_vozacka_prednja', 'osteceni_vozacka_zadnja', 'osteceni_izvestaj', 'osteceni_izjava', 'osteceni_polisa',
    'osteceni_tekuci', 'stetnik_licna_prednja', 'stetnik_licna_zadnja', 'stetnik_saobracajna_prednja',
    'stetnik_saobracajna_zadnja', 'stetnik_vozacka_prednja', 'stetnik_vozacka_zadnja', 'stetnik_izjava',
    'stetnik_polisa', 'evropski_izvestaj', 'dodatni_dokument1', 'dodatni_dokument2', 'dodatni_dokument3',
    'dodatni_dokument4', 'dodatni_dokument5', 'dodatni_dokument6', 'dodatni_dokument7', 'dodatni_dokument8',
    'dodatni_dokument9', 'dodatni_dokument10', 'dodatni_dokument11', 'dodatni_dokument12', 'dodatni_dokument13',
    'dodatni_dokument14', 'dodatni_dokument15', 'dodatni_dokument16'
];

// Učitaj fajlove i njihove ekstenzije
list($uploadedFiles, $uploadedExtensions) = uploadFiles($fileNames);

// Učitavanje fajla "punomoc"
$punomoc = NULL;
$punomoc_extension = NULL;
if (isset($_FILES['punomoc']) && $_FILES['punomoc']['error'] == 0) {
    $punomoc = file_get_contents($_FILES['punomoc']['tmp_name']);
    $punomoc_extension = pathinfo($_FILES['punomoc']['name'], PATHINFO_EXTENSION);
}

// Učitavanje fajla "emin_procena"
$emin_procena = NULL;
$emin_procena_extension = NULL;
if (isset($_FILES['emin_procena']) && $_FILES['emin_procena']['error'] == 0) {
    $emin_procena = file_get_contents($_FILES['emin_procena']['tmp_name']);
    $emin_procena_extension = pathinfo($_FILES['emin_procena']['name'], PATHINFO_EXTENSION);
}

// Formiramo SQL upit za umetanje podataka
$columns = array_merge(
    ['klijent_id', 'opis', 'reg_oznaka', 'osig_kuca_stetnik', 'status_izvrsenja', 'poslato', 'created_at', 'punomoc', 'punomoc_extension', 'emin_procena', 'emin_procena_extension'],
    array_keys($uploadedFiles),
    array_keys($uploadedExtensions)
);

$placeholders = implode(',', array_fill(0, count($columns), '?'));
$columnNames = implode(',', $columns);
$values = array_merge(
    [$klijent_id, $opis, $reg_oznaka, $osig_kuca, $status, $poslato, $created_at, $punomoc, $punomoc_extension, $emin_procena, $emin_procena_extension],
    array_values($uploadedFiles),
    array_values($uploadedExtensions)
);

// Priprema upita
$stmt = $conn->prepare("INSERT INTO `klijenti_stete` ($columnNames) VALUES ($placeholders)");

$types = str_repeat('s', count($values)); // Postavljanje tipova podataka
$stmt->bind_param($types, ...$values);

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
$conn->close();
?>