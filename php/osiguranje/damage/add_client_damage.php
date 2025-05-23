<?php
// Uključite config.php za povezivanje sa bazom
include('../config.php'); // Ovaj fajl mora biti u istoj fascikli ili navedite apsolutnu putanju

// Uzimanje podataka iz POST zahteva
$klijent_id = $_POST['klijent_id'];
$emin_procena_disabled = isset($_POST['emin_procena_disabled']) ? intval($_POST['emin_procena_disabled']) : null;
$sluzbena_beleska_disabled = isset($_POST['sluzbena_beleska_disabled']) ? intval($_POST['sluzbena_beleska_disabled']) : null;
$opis = $_POST['opis'];
$vrsta_stete = $_POST['vrsta_stete'];
$preporucilac = $_POST['preporucilac'];
$reg_oznaka = $_POST['reg_oznaka']; // Dodato polje za registarsku oznaku
$reg_oznaka_stetnik = $_POST['reg_oznaka_stetnik']; // Dodato polje za registarsku oznaku
$broj_polise_stetnik = $_POST['broj_polise_stetnik']; // Dodato polje za registarsku oznaku
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

// Učitavanje fajla "punomoc"
$sluzbena_beleska = NULL;
$sluzbena_beleska_extension = NULL;
if (isset($_FILES['sluzbena_beleska']) && $_FILES['sluzbena_beleska']['error'] == 0) {
    $sluzbena_beleska = file_get_contents($_FILES['sluzbena_beleska']['tmp_name']);
    $sluzbena_beleska_extension = pathinfo($_FILES['sluzbena_beleska']['name'], PATHINFO_EXTENSION);
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
    ['klijent_id', 'opis', 'vrsta_stete', 'preporucilac', 'reg_oznaka', 'reg_oznaka_stetnik', 'broj_polise_stetnik', 'osig_kuca_stetnik', 'status_izvrsenja', 'poslato', 'created_at', 'punomoc', 'punomoc_extension', 'sluzbena_beleska', 'sluzbena_beleska_extension',  'sluzbena_beleska_disabled', 'emin_procena', 'emin_procena_extension', 'emin_procena_disabled'],
    array_keys($uploadedFiles),
    array_keys($uploadedExtensions)
);

$placeholders = implode(',', array_fill(0, count($columns), '?'));
$columnNames = implode(',', $columns);
$values = array_merge(
    [$klijent_id, $opis, $vrsta_stete, $preporucilac, $reg_oznaka, $reg_oznaka_stetnik, $broj_polise_stetnik, $osig_kuca, $status, $poslato, $created_at, $punomoc, $punomoc_extension, $sluzbena_beleska, $sluzbena_beleska_extension, $sluzbena_beleska_disabled, $emin_procena, $emin_procena_extension, $emin_procena_disabled],
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
                sessionStorage.setItem("message", "Uspešno kreirana šteta!");
                window.location.href = "/stete";
            </script>';
} else {
    echo '<script>
                sessionStorage.setItem("status", "error");
                sessionStorage.setItem("message", "Došlo je do greške, pokušaj ponovo!");
                window.location.href = "/stete";
            </script>';
            exit();
}

// Zatvori pripremljeni iskaz
$stmt->close();
$conn->close();
?>