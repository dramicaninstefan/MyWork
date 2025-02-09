<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use Dotenv\Dotenv;

require "vendor/autoload.php";

// Učitaj .env fajl
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Dobijanje podataka iz forme
    $name = trim($_POST['name']);
    $phone = trim($_POST['phone']);
    $email = trim($_POST['email']);
    $message = trim($_POST['message']);


    $mail = new PHPMailer(true);

    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;

    // Validacija polja
    $errors = [];

    // Provera da li su obavezna polja popunjena
    if (empty($name)) {
        $errors[] = "Ime i prezime su obavezna.";
    }

    if (empty($phone)) {
        $errors[] = "Broj telefona je obavezan.";
    } elseif (!preg_match("/^\+?\d{7,15}$/", $phone)) {
        $errors[] = "Broj telefona nije validan.";
    }

    if (empty($email)) {
        $errors[] = "Email je obavezan.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Email nije validan.";
    }

    if (empty($message)) {
        $errors[] = "Poruka je obavezna.";
    }

    // Ako postoji greška, prikazujemo poruke i vraćamo korisnika na formu
    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo "<p class='text-danger'>$error</p>";
        }
    } else {
        // Ako je sve validno, šaljemo email

        $mail->isSMTP();
        $mail->SMTPAuth = true;
    
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;
    
        $mail->Username = "sdkonsalting.ads@gmail.com";
        $mail->Password = $_ENV['EMAIL_PASSWORD']; // Koristi password iz .env fajla
    
        $mail->setFrom($email, "SDKonsalting");
        // $mail->addAddress("office@sdkonsalting.rs", "SDKonsalting");
        $mail->addAddress("sdkonsalting.ads@gmail.com", "ads");
    
        $mail->Subject = "UPIT SAJT | $name | $phone | $email";
        $mail->Body = "
        Novi upit sa sajta
        Ime: $name
        Telefon: $phone
        Email: $email
        Poruka: $message
                    ";
    
        $mail->send();

        header("Location: thank-you.html");
    }
}
?>
