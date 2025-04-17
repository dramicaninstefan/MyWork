<?php
require '../vendor/autoload.php'; // Ako koristiš dompdf

use Dompdf\Dompdf;
use Dompdf\Options; // Opcionalno ako koristiš dodatne opcije

require '../config.php';

$id = $_POST['id'];
$klijent_id = $_POST['klijent_id'];

// Polja fajlova
$fileFields = [
    "osteceni_licna_prednja", "osteceni_licna_zadnja", "osteceni_saobracajna_prednja", "osteceni_saobracajna_zadnja",
    "osteceni_vozacka_prednja", "osteceni_vozacka_zadnja", "osteceni_izjava", "osteceni_polisa", "osteceni_tekuci", "evropski_izvestaj",
    "stetnik_licna_prednja", "stetnik_licna_zadnja", "stetnik_saobracajna_prednja", "stetnik_saobracajna_zadnja",
    "stetnik_vozacka_prednja", "stetnik_vozacka_zadnja", "stetnik_izjava", "stetnik_polisa"
];

$fileLabels = [];
foreach ($fileFields as $field) {
    $fileLabels[$field] = ucwords(str_replace("_", " ", $field)); // Pretvara _ u razmak i kapitalizuje
}

$fieldsString = implode(", ", $fileFields);
$query = "SELECT $fieldsString FROM klijenti_stete WHERE id = $id AND klijent_id = $klijent_id";
$result = $conn->query($query);

$nullFilesOsteceni = [];
$nullFilesStetnik = [];


if ($result && $data = $result->fetch_assoc()) {
    foreach ($data as $field => $value) {
        if (is_null($value) || $value === "") {
            if (strpos($field, 'osteceni') !== false) {
                $nullFilesOsteceni[] = $fileLabels[$field];
            } else if (strpos($field, 'stetnik') !== false) {
                $nullFilesStetnik[] = $fileLabels[$field];
            }
        }
    }
}

$queryKlijent = "SELECT ime_prezime FROM klijent WHERE id = $klijent_id";
$resultKlijent = $conn->query($queryKlijent);

if ($resultKlijent && $data = $resultKlijent->fetch_assoc()) {
    $ime_prezime = $data['ime_prezime'];
}

// Pripremi HTML
$html = "<h2>Nedostajući fajlovi: " . $ime_prezime . "</h2>";

if (!empty($nullFilesOsteceni)) {
    $html .= "<h2>Oštećeni</h2><ul>";
    foreach ($nullFilesOsteceni as $file) {
        $html .= "<li>$file</li>";
    }
    $html .= "</ul>";
}

if (!empty($nullFilesStetnik)) {
    $html .= "<h2>Štetnik</h2><ul>";
    foreach ($nullFilesStetnik as $file) {
        $html .= "<li>$file</li>";
    }
    $html .= "</ul>";
}

// Kreiraj Dompdf instancu
$options = new Options();
$options->set('isHtml5ParserEnabled', true);
$options->set('isPhpEnabled', true);
$options->set("defaultFont", "DejaVu Sans"); // Postavljamo Unicode font koji podržava specijalne karaktere

$dompdf = new Dompdf($options);

// Učitaj HTML
$dompdf->loadHtml($html);

// Renderuj PDF
$dompdf->render();

// Stream PDF-a u browser bez preuzimanja
$dompdf->stream("nedostajuci_fajlovi_" . $ime_prezime . ".pdf", ["Attachment" => false]);
?>