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
          FROM obracun_stete";
$result = $conn->query($query);

if ($result->num_rows === 0) {
    echo "Baza je prazna. Nema podataka za eksport.";
    exit();
}

// Kreiraj novi Excel fajl
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

$headers = ['steta_id', 'klijent_id', 'osig_kuca', 'vrsta_stete', 'mail_subject', 'ime_prezime', 'kontakt',
            'preporucilac_stete', 'sluzbena_beleska_status', 'emin_procena_status', 'nas_procenat', 'isplaceno_klijent', 'advokatski_troskovi', 
            'advokatski_troskovi_uplaceno', 'emin_procena', 'emin_procena_uplaceno', 'uplatnica', 'preporucilac', 'preporucilac_uplaceno', 
            'trosak1', 'trosak2', 'trosak3', 'trosak4', 'trosak5', 'trosak6', 'trosak7', 'total_sum'];


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
$filename = __DIR__ . '/kalkukulacija_stete_export_' . date('d-m-Y') . '.xlsx'; // Apsolutna putanja do fajla
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
    $mail->addAttachment($filename, 'kalkukulacija_stete_export_' . date('d-m-Y') . '.xlsx');

    // Sadržaj e-maila
    $mail->isHTML(true);
    $mail->Subject = 'Kalkukulacija stete Export '  . date('d-m-Y');
    $mail->Body    = 'E-mail sa priloženim Excel fajlom za kalkukulacijastete export.';

    // Pošaljite e-mail
    $mail->send();
    echo 'E-mail je poslat.';
    
    // Brisanje fajla sa servera nakon slanja e-maila (opciono)
    unlink($filename); // Ovo će obrisati fajl sa servera nakon što je poslat e-mail
} catch (Exception $e) {
    echo "Greška prilikom slanja e-maila. Mailer Error: {$mail->ErrorInfo}";
}
?>