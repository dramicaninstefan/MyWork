<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Dobijanje podataka iz forme
    $name = trim($_POST['name']);
    $phone = trim($_POST['phone']);
    $email = trim($_POST['email']);
    $message = trim($_POST['message']);

    require "vendor/autoload.php";

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;

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
    
        $mail->Username = "dramicanin.stefan@gmail.com";
        $mail->Password = "PoOk12345@";
    
        $mail->setFrom($email, $name);
        $mail->addAddress("dramicanin.stefan@gmail.com", "Stefan");
    
        $mail->Subject = "Test";
        $mail->Body = $message;
    
        $mail->send();

        header("Location: sent.html");

        // Slanje email-a
        // if (mail($to, $subject, $email_message, $headers)) {
        //     echo "<p class='text-success'>Poruka uspešno poslata!</p>";
        // } else {
        //     echo "<p class='text-danger'>Greška pri slanju poruke. Pokušajte ponovo.</p>";
        // }
    }
}
?>
