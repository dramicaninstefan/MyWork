<?php
require '../vendor/autoload.php'; // Prilagodi put ako ti vendor folder nije tu

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

include('../config.php');

// Upit ka bazi - dodajemo više kolona za eksport
$query = "SELECT 
            *
          FROM obracun_stete";

$result = $conn->query($query);

if ($result->num_rows === 0) {
    echo '<script>
            sessionStorage.setItem("status", "info");
            sessionStorage.setItem("message", "Baza je prazna. Nema podataka za eksport.");
            window.location.href = "/kalkulacija_stete";  
        </script>';
    exit();
}

// Kreiraj novi Excel fajl
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

$headers = ['steta_id', 'klijent_id', 'osig_kuca', 'vrsta_stete', 'mail_subject', 'ime_prezime', 'kontakt',
            'preporucilac_stete', 'sluzbena_beleska_status', 'emin_procena_status', 'nas_procenat', 'isplaceno_klijent', 'advokatski_troskovi', 
            'advokatski_troskovi_uplaceno', 'emin_procena', 'emin_procena_uplaceno', 'uplatnica', 'preporucilac', 'preporucilac_uplaceno', 
            'trosak1', 'trosak2', 'trosak3', 'trosak4', 'trosak5', 'trosak6', 'trosak7', 'total_sum'];

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
$filename = 'kalkulacija_stete_export_' . date('d-m-Y') . '.xlsx';

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header("Content-Disposition: attachment; filename=\"$filename\"");
header('Cache-Control: max-age=0');

$writer = new Xlsx($spreadsheet);
$writer->save('php://output');

exit;
?>