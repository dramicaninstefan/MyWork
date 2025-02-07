<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Dobijanje podataka iz forme
    $name = trim($_POST['name']);
    $phone = trim($_POST['phone']);
    $email = trim($_POST['email']);
    $message = trim($_POST['message']);

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

        // Postavke za email
        $to = "dramicanin.stefan@gmail.com";  // Tvoj email
        $subject = "Novi kontakt upit";
        
        // Kreiranje tela poruke
        $email_message = "Ime i prezime: $name\n";
        $email_message .= "Broj telefona: $phone\n";
        $email_message .= "Email: $email\n";
        $email_message .= "Poruka: $message\n";
        
        // Headers
        $headers = "From: $email\r\n";
        $headers .= "Reply-To: $email\r\n";
        $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

        // Slanje email-a
        if (mail($to, $subject, $email_message, $headers)) {
            echo "<p class='text-success'>Poruka uspešno poslata!</p>";
        } else {
            echo "<p class='text-danger'>Greška pri slanju poruke. Pokušajte ponovo.</p>";
        }
    }
}
?>
