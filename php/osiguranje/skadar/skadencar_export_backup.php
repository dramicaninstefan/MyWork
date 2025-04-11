<?php
require '../vendor/autoload.php'; // Prilagodi put ako ti vendor folder nije tu
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

include('../config.php');

// Upit ka bazi

// Upit ka bazi - dodajemo više kolona za eksport
$query = "SELECT 
            *
          FROM skadencar";
$result = $conn->query($query);

if ($result->num_rows === 0) {
    echo "Baza je prazna. Nema podataka za eksport.";
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


// Popuni podatke iz baze
$row = 2;
while ($data = $result->fetch_assoc()) {
    $col = 'A';
    foreach ($headers as $field) {
        if ($field === '') {
            // Preskoči praznu kolonu
            $col++;
        } else {
            // Ako je polje skadencar_pocetak ili skadencar_kraj, konvertuj u dd/mm/yyyy
            if ($field === 'skadencar_pocetak' || $field === 'skadencar_kraj') {
                $date = DateTime::createFromFormat('Y-m-d', $data[$field]);
                if ($date) {
                    $data[$field] = $date->format('d/m/Y');
                } else {
                    $data[$field] = ''; // Ako nije validan datum, postavi praznu vrednost
                }
            }

            // Postavi vrednost u Excel
            $sheet->setCellValue($col . $row, $data[$field]);
            $col++;
        }
    }
    $row++;
}

// Sačuvaj Excel fajl na serveru
$filename = __DIR__ . '/skadencar_export_' . date('d-m-Y') . '.xlsx'; // Apsolutna putanja do fajla
$writer = new Xlsx($spreadsheet);
$writer->save($filename);

// Slanje fajla putem e-maila koristeći PHP Mailer
$mail = new PHPMailer(true);
try {
    $mail->CharSet = "UTF-8"; // Postavlja charset na UTF-8
    $mail->Encoding = "base64"; // Osigurava ispravan prenos specijalnih karaktera
    $mail->isSMTP();
    $mail->Host = $_ENV['MAIL_HOST'];
    $mail->SMTPAuth = true;
    $mail->Username = $_ENV['MAIL_USERNAME'];
    $mail->Password = $_ENV['MAIL_PASSWORD'];
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    $mail->setFrom($_ENV['MAIL_FROM'], '');
    $mail->addAddress($_ENV['MAIL_FROM']); // Možeš promeniti e-mail odredište

    // Prilozi Excel fajl
    $mail->addAttachment($filename, 'skadencar_export_' . date('d-m-Y') . '.xlsx');

    // Sadržaj e-maila
    $mail->isHTML(true);
    $mail->Subject = 'Skadencar Export '  . date('d-m-Y');
    $mail->Body    = 'E-mail sa priloženim Excel fajlom za skadencar export.';

    // Pošaljite e-mail
    $mail->send();
    echo 'E-mail je poslat.';
    
    // Brisanje fajla sa servera nakon slanja e-maila (opciono)
    unlink($filename); // Ovo će obrisati fajl sa servera nakon što je poslat e-mail
} catch (Exception $e) {
    echo "Greška prilikom slanja e-maila. Mailer Error: {$mail->ErrorInfo}";
}
?>