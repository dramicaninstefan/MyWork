<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Dotenv\Dotenv;

require "vendor/autoload.php";  // Uključite PHPMailer

// Učitaj .env fajl
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load(); 

// Konekcija sa bazom podataka (PDO)
try {
    $pdo = new PDO("mysql:host=" . $_ENV['DB_HOST'] . ";dbname=" . $_ENV['DB_NAME'], $_ENV['DB_USER'], $_ENV['DB_PASSWORD']);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Greška sa bazom podataka: " . $e->getMessage());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $errors = [];

    // Podaci iz forme
    $email_to = trim($_POST['email_to']);
    $subject = trim($_POST['subject']);
    $message = trim($_POST['message']);

    // Validacija za email, subject, i message
    if (empty($email_to)) {
        $errors[] = "Email je obavezan.";
    } elseif (!filter_var($email_to, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Email nije validan.";
    }

    if (empty($subject)) {
        $errors[] = "Naslov je obavezan.";
    }

    // Validacija fajlova
    $requiredFiles = [
        'osteceni_licna_prednja', 'osteceni_licna_zadnja', 'osteceni_saobracajna_prednja', 'osteceni_saobracajna_zadnja',
        'osteceni_vozacka_prednja', 'osteceni_vozacka_zadnja', 'osteceni_izvestaj', 'osteceni_izjava', 'osteceni_polisa',
        'osteceni_tekuci', 'stetnik_licna_prednja', 'stetnik_licna_zadnja', 'stetnik_saobracajna_prednja', 'stetnik_saobracajna_zadnja',
        'stetnik_vozacka_prednja', 'stetnik_vozacka_zadnja', 'stetnik_izjava', 'stetnik_polisa'
    ];

    foreach ($requiredFiles as $file) {
        if (empty($_FILES[$file]['name'])) {
            $errors[] = "Dokument za '$file' je obavezan.";
        }
    }

    // Ako nema grešaka, nastavi sa slanjem email-a
    if (empty($errors)) {
        // Kreiranje PHPMailer instance
        $mail = new PHPMailer(true);
        try {
            // Podešavanje servera i autentifikacije
            $mail->isSMTP();
            $mail->Host = $_ENV['MAIL_HOST'];  // Vaš SMTP server
            $mail->SMTPAuth = true;
            $mail->Username = $_ENV['MAIL_USERNAME'];  // Vaš email
            $mail->Password = $_ENV['MAIL_PASSWORD'];  // Vaša lozinka
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            // Podešavanje od, za i naslov email-a
            $mail->setFrom($_ENV['MAIL_FROM'], '');
            $mail->addAddress($email_to);  // Primaoc email-a
            $mail->Subject = $subject;
            $mail->Body    = $message;

            // Dodavanje unosa u bazu podataka (email_log)
            $stmt = $pdo->prepare("INSERT INTO email_logs (email_to, subject, message, sent_at) VALUES (:email_to, :subject, :message, NOW())");
            $stmt->bindParam(':email_to', $email_to);
            $stmt->bindParam(':subject', $subject);
            $stmt->bindParam(':message', $message);
            $stmt->execute();

            // Dobijanje ID-a unosa iz email_logs tabele
            $email_log_id = $pdo->lastInsertId();

            // Dodavanje fajlova i priprema za čuvanje u bazi
            $attachment_ids = [];
            foreach ($requiredFiles as $file) {
                if (!empty($_FILES[$file]['name'])) {
                    // Čitanje fajla u binarnom formatu
                    $file_data = file_get_contents($_FILES[$file]['tmp_name']);
                    
                    // Dodavanje fajla kao attachment
                    $mail->addAttachment($_FILES[$file]['tmp_name'], $_FILES[$file]['name']);
                    
                    // Spremanje fajla u bazu
                    $stmt = $pdo->prepare("INSERT INTO email_attachments (email_log_id, file_name, file_data) VALUES (:email_log_id, :file_name, :file_data)");
                    $stmt->bindParam(':email_log_id', $email_log_id);  
                    $stmt->bindParam(':file_name', $_FILES[$file]['name']);
                    $stmt->bindParam(':file_data', $file_data, PDO::PARAM_LOB);
                    $stmt->execute();

                    $attachment_ids[] = $pdo->lastInsertId();  // Čuvanje ID-ja poslednje dodanog fajla
                }
            }

            // Slanje email-a
            $mail->send();

            // Povezivanje fajlova sa email-logom
            foreach ($attachment_ids as $attachment_id) {
                $stmt = $pdo->prepare("UPDATE email_attachments SET email_log_id = :email_log_id WHERE id = :attachment_id");
                $stmt->bindParam(':email_log_id', $email_log_id);
                $stmt->bindParam(':attachment_id', $attachment_id);
                $stmt->execute();
            }

            echo '<script type="text/javascript">
                    localStorage.clear(); // Očisti localStorage
                    setTimeout(function() {
                        window.location.href = "index.php"; // Preusmeri na index.php
                    }, 1000); // Očisti localStorage i preusmeri nakon 2 sekunde
                    </script>';
            exit();
        } catch (Exception $e) {
            echo "Greška prilikom slanja email-a: {$mail->ErrorInfo}";
        }
    } else {
        // Ako postoje greške, prikazujemo ih
        foreach ($errors as $error) {
            echo "<p class='text-danger'>$error</p>";
        }
    }
}
?>