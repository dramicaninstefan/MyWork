<?php
// send_email.php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Uključi PHPMailer

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $to = $_POST['to'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    $attachment = $_FILES['attachment'];

    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Tvoj SMTP server (npr. smtp.gmail.com)
        $mail->SMTPAuth = true;
        $mail->Username = 'dramicanin.stefan@gmail.com'; // Tvoj email
        $mail->Password = 'acnb dfue kbev rzer'; // Tvoja lozinka
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Recipients
        $mail->setFrom('dramicanin.stefa@gmail.com', 'Stefan');
        $mail->addAddress($to); // Dodaj primalca

        // Attachments
        if ($attachment['error'] == 0) {
            $mail->addAttachment($attachment['tmp_name'], $attachment['name']); // Prilog
        }

        // Content
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = nl2br($message);

        $mail->send(); 
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>
