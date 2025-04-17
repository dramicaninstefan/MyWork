<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../config.php';

// Proveri da li su svi podaci poslati putem forme
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Uzimanje podataka sa forme
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];

    // Kreiranje PHPMailer objekta
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->CharSet = "UTF-8"; // Postavlja charset na UTF-8
        $mail->Encoding = "base64"; // Osigurava ispravan prenos specijalnih karaktera
        $mail->isSMTP();
        $mail->Host = $_ENV['MAIL_HOST'];
        $mail->SMTPAuth = true;
        $mail->Username = $_ENV['MAIL_USERNAME'];
        $mail->Password = $_ENV['MAIL_PASSWORD'];
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        $mail->setFrom($_ENV['MAIL_USERNAME']);
        $mail->addAddress($_ENV['MAIL_USERNAME']);

        $unique_id = preg_replace('/[^a-zA-Z0-9]/', '', uniqid('ID', true));

        // Sadržaj email-a
        $mail->isHTML(true);
        $mail->Subject = 'Kontakt - ' . $unique_id;
        $mail->Body    = "
            <h3>Informacije</h3>
            <p><strong>Ime i Prezime:</strong> $name</p>
            <p><strong>Email:</strong> $email</p>
            <p><strong>Telefon:</strong> $phone</p>
            <p><strong>Poruka:</strong> $message</p>
        ";

        // Slanje email-a
        $mail->send();
        
        // Vraćanje JSON odgovora
        echo json_encode([
            "status" => "success",
            "message" => "Poruka je uspešno poslata."
        ]);
    } catch (Exception $e) {
        // Vraćanje JSON odgovora u slučaju greške
        echo json_encode([
            "status" => "error",
            "message" => "Poruka nije mogla da bude poslata. Greška: {$mail->ErrorInfo}"
        ]);
    }
}

?>