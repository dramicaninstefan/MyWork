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
    $email_to = $_ENV['MAIL_USERNAME'];
    $subject = trim($_POST['subject'] . " Steta");  // Subject je sada ime klijenta
    $message = trim($_POST['message']);
    $client_id = isset($_POST['client_id']) ? (int) $_POST['client_id'] : null;


    // Validacija za email, subject, i message
    if (empty($email_to)) {
        $errors[] = "Email je obavezan.";
    } elseif (!filter_var($email_to, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Email nije validan.";
    }

    if (empty($subject)) {
        $errors[] = "Naslov je obavezan.";
    }

    // Obavezni fajlovi
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

    // Dodatna dokumenta (neobavezna)
    $optionalFiles = ['dodatni_dokument1', 'dodatni_dokument2', 'dodatni_dokument3', 'dodatni_dokument4', 'dodatni_dokument5', 'dodatni_dokument6'];
    
    // Ako nema grešaka, nastavi sa slanjem email-a
    if (empty($errors)) {
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
            $mail->addAddress($email_to);
            $mail->Subject = $subject;
            $mail->isHTML(true);
            $mail->Body = !empty($message) ? nl2br($message) : 'Prijava stete';

            $stmt = $pdo->prepare("INSERT INTO email_logs (id, email_to, subject, message, sent_at) VALUES (:id, :email_to, :subject, :message, NOW())");
            $stmt->bindParam(':id', $client_id, PDO::PARAM_INT);
            $stmt->bindParam(':email_to', $email_to);
            $stmt->bindParam(':subject', $subject);
            $stmt->bindParam(':message', $message);
            $stmt->execute();

            // Ažuriranje polja za klijenta u bazi - postavljanje poslato = 1 i dodavanje vremena
            $updateStmt = $pdo->prepare("UPDATE klijenti SET poslato = 1, poslato_kada = NOW() WHERE id = :client_id");
            $updateStmt->bindParam(':client_id', $client_id, PDO::PARAM_INT);
            $updateStmt->execute();

            // Dodavanje obaveznih fajlova
            $attachment_ids = [];
            foreach ($requiredFiles as $file) {
                if (!empty($_FILES[$file]['name'])) {
                    $file_data = file_get_contents($_FILES[$file]['tmp_name']);
                    $mail->addAttachment($_FILES[$file]['tmp_name'], $_FILES[$file]['name']);

                    $stmt = $pdo->prepare("INSERT INTO email_attachments (email_log_id, file_name, file_data) VALUES (:email_log_id, :file_name, :file_data)");
                    $stmt->bindParam(':email_log_id', $client_id, PDO::PARAM_INT);
                    $stmt->bindParam(':file_name', $_FILES[$file]['name']);
                    $stmt->bindParam(':file_data', $file_data, PDO::PARAM_LOB);
                    $stmt->execute();
                    $attachment_ids[] = $pdo->lastInsertId();
                }
            }

            // Dodavanje neobaveznih fajlova
            foreach ($optionalFiles as $file) {
                if (!empty($_FILES[$file]['name'])) {
                    $file_data = file_get_contents($_FILES[$file]['tmp_name']);
                    $mail->addAttachment($_FILES[$file]['tmp_name'], $_FILES[$file]['name']);

                    $stmt = $pdo->prepare("INSERT INTO email_attachments (email_log_id, file_name, file_data) VALUES (:email_log_id, :file_name, :file_data)");
                    $stmt->bindParam(':email_log_id', $client_id, PDO::PARAM_INT);
                    $stmt->bindParam(':file_name', $_FILES[$file]['name']);
                    $stmt->bindParam(':file_data', $file_data, PDO::PARAM_LOB);
                    $stmt->execute();
                    $attachment_ids[] = $pdo->lastInsertId();
                }
            }


            $mail->send();

                    // localStorage.clear();
            

            echo '<script type="text/javascript">
                    setTimeout(function() {
                        window.location.href = "email_logs.php";
                    }, 1000);
                  </script>';
            exit();
        } catch (Exception $e) {
            echo "Greška prilikom slanja email-a: {$mail->ErrorInfo}";
        }
    } else {
        foreach ($errors as $error) {
            echo "<p class='text-danger'>$error</p>";
        }
    }
}
?>