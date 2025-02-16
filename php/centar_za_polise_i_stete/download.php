<?php
use Dotenv\Dotenv;

require "vendor/autoload.php";  // Uključite PHPMailer

// Učitaj .env fajl
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load(); 

// Konekcija sa bazom podataka (PDO)
try {
    $pdo = new PDO("mysql:host=" . $_ENV['DB_HOST'] . ";dbname=" . $_ENV['DB_NAME'], $_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD']);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Greška sa bazom podataka: " . $e->getMessage());
}

// Pronalazak attachment_id iz GET parametra
$attachment_id = isset($_GET['attachment_id']) ? $_GET['attachment_id'] : null;

if (!$attachment_id) {
    die("Attachment ID nije postavljen.");
}

// Pronaći fajl iz baze prema attachment_id
$stmt = $pdo->prepare("SELECT file_name, file_data FROM email_attachments WHERE id = :attachment_id");
$stmt->bindParam(':attachment_id', $attachment_id, PDO::PARAM_INT);
$stmt->execute();
$file = $stmt->fetch(PDO::FETCH_ASSOC);

if ($file) {
    // Detekcija MIME tipa na osnovu ekstenzije fajla
    $mimeType = mime_content_type($file['file_name']);  // Detekcija MIME tipa fajla
    header('Content-Type: ' . $mimeType);
    header('Content-Disposition: attachment; filename="' . $file['file_name'] . '"');
    header('Content-Length: ' . strlen($file['file_data']));  // Dužina sadržaja fajla
    
    // Slanje fajla korisniku
    echo $file['file_data'];
} else {
    echo "Fajl nije pronađen.";
}
?>
