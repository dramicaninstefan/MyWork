<?php
require '../vendor/autoload.php'; // Prilagodi put ako ti vendor folder nije tu

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

include('../config.php');

// Upit ka bazi - dodajemo više kolona za eksport
$query = "SELECT 
            *
          FROM klijenti_stete";

$result = $conn->query($query);

if ($result->num_rows === 0) {
    echo '<script>
            sessionStorage.setItem("status", "info");
            sessionStorage.setItem("message", "Baza je prazna. Nema podataka za eksport.");
            window.location.href = "/stete";  
        </script>';
    exit();
}

// Kreiraj novi Excel fajl
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

$headers = ['id', 'klijent_id', 'opis', 'mail_subject', 'vrsta_stete', 'preporucilac', 'reg_oznaka', 'reg_oznaka_stetnik', 'broj_polise_stetnik', 'osig_kuca_stetnik',
            'status_izvrsenja', 'poslato', 'created_at'];

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
        if ($field === '') {
            // Preskoči praznu kolonu
            $col++;
        } else {
            $sheet->setCellValue($col . $row, $data[$field]);
            $col++;
        }
    }
    $row++;
}

// Generiši fajl za download
$filename = 'stete_export_' . date('d-m-Y') . '.xlsx';

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header("Content-Disposition: attachment; filename=\"$filename\"");
header('Cache-Control: max-age=0');

$writer = new Xlsx($spreadsheet);
$writer->save('php://output');

exit;
?>