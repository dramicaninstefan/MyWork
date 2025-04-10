<?php
require '../vendor/autoload.php'; // Prilagodi put ako ti vendor folder nije tu

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

include('../config.php');

// Upit ka bazi
$query = "SELECT ime_prezime, kontakt, email, jmbg, adresa, mesto, punomoc_procenat, punomoc_dinara
          FROM klijent";
$result = $conn->query($query);

if ($result->num_rows === 0) {
    echo '<script>
            sessionStorage.setItem("status", "info");
            sessionStorage.setItem("message", "Baza je prazna. Nema podataka za eksport.");
            window.location.href = "/skadencar_unos";  
        </script>';
    exit();
}

// Kreiraj novi Excel fajl
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

// Postavi zaglavlja
$headers = ['ime_prezime', 'kontakt', 'email', 'jmbg', 'adresa', 'mesto',
            'punomoc_procenat', 'punomoc_dinara'];

$column = 'A';
foreach ($headers as $header) {
    $sheet->setCellValue($column . '1', $header);
    $column++;
}

// Popuni podatke iz baze
$row = 2;
while ($data = $result->fetch_assoc()) {
    $col = 'A';
    foreach ($headers as $field) {
        $sheet->setCellValue($col . $row, $data[$field]);
        $col++;
    }
    $row++;
}

// Generiši fajl za download
$filename = 'klijenti_export_' . date('Y-m-d') . '.xlsx';

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header("Content-Disposition: attachment; filename=\"$filename\"");
header('Cache-Control: max-age=0');

$writer = new Xlsx($spreadsheet);
$writer->save('php://output');

exit;
?>