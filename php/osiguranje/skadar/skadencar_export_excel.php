<?php
require '../vendor/autoload.php'; // Prilagodi put ako ti vendor folder nije tu

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

include('../config.php');

// Upit ka bazi - dodajemo više kolona za eksport
$query = "SELECT 
            *
          FROM skadencar";

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

$headers = ['komentar', 'broj_polise', 'ime_prezime', 'mb_pib', 'osig_kuca', 'skadencar_pocetak', 'skadencar_kraj',
            'skadencar_obnova', 'grana_tarifa', 'premija_bez_poreza', 'premija_sa_porezom', 'nacin_placanja', 'brokerska_kuca', 
            'brokerska_kuca_isplaceno', 'brokerska_kuca_procenat', 'brokerska_kuca_uplata', 
            'brokerska_kuca_uplata_datum', 'brokerska_kuca_uplata_rata1', 'brokerska_kuca_uplata_rata1_datum', 
            'brokerska_kuca_uplata_rata2', 'brokerska_kuca_uplata_rata2_datum', 'brokerska_kuca_uplata_rata3', 
            'brokerska_kuca_uplata_rata3_datum', 'brokerska_kuca_uplata_rata4', 'brokerska_kuca_uplata_rata4_datum', 
            'brokerska_kuca_uplata_rata5', 'brokerska_kuca_uplata_rata5_datum', 'brokerska_kuca_uplata_rata6', 
            'brokerska_kuca_uplata_rata6_datum', 'brokerska_kuca_uplata_rata7', 'brokerska_kuca_uplata_rata7_datum', 
            'brokerska_kuca_uplata_rata8', 'brokerska_kuca_uplata_rata8_datum', 'brokerska_kuca_uplata_rata9', 
            'brokerska_kuca_uplata_rata9_datum', 'brokerska_kuca_uplata_rata10', 'brokerska_kuca_uplata_rata10_datum', 
            'brokerska_kuca_uplata_rata11', 'brokerska_kuca_uplata_rata11_datum', 'brokerska_kuca_uplata_rata12', 
            'brokerska_kuca_uplata_rata12_datum', 'brokerska_kuca_uplata_nacin_placanja_toggle', 'created_at'];

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
$filename = 'skadencar_export_' . date('d-m-Y') . '.xlsx';

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header("Content-Disposition: attachment; filename=\"$filename\"");
header('Cache-Control: max-age=0');

$writer = new Xlsx($spreadsheet);
$writer->save('php://output');

exit;
?>