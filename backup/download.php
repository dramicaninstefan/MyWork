<?php
use Dotenv\Dotenv;

require "vendor/autoload.php";  // Uključivanje Dotenv biblioteke

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

// Pronalazak attachment_id iz GET parametra
$attachment_id = isset($_GET['attachment_id']) ? (int)$_GET['attachment_id'] : null;

if (!$attachment_id) {
    die("Attachment ID nije postavljen.");
}

// Pronaći fajl iz baze prema attachment_id
$stmt = $pdo->prepare("SELECT file_name, file_data FROM email_attachments WHERE id = :attachment_id");
$stmt->bindParam(':attachment_id', $attachment_id, PDO::PARAM_INT);
$stmt->execute();
$file = $stmt->fetch(PDO::FETCH_ASSOC);

if ($file) {
    // Određivanje MIME tipa na osnovu ekstenzije
    $ext = pathinfo($file['file_name'], PATHINFO_EXTENSION);
    $mimeTypes = [
        'png' => 'image/png',
        'jpg' => 'image/jpeg',
        'jpeg' => 'image/jpeg',
        'gif' => 'image/gif',
        'pdf' => 'application/pdf',
        'txt' => 'text/plain',
        'zip' => 'application/zip',
    ];
    $mimeType = $mimeTypes[strtolower($ext)] ?? 'application/octet-stream';  // Podrazumevani MIME tip

    // Postavljanje zaglavlja za preuzimanje fajla
    header('Content-Type: ' . $mimeType);
    header('Content-Disposition: attachment; filename="' . basename($file['file_name']) . '"');
    header('Content-Length: ' . strlen($file['file_data']));
    
    // Slanje fajla korisniku
    echo $file['file_data'];
    exit();  // Obavezno zaustavi izvršavanje posle slanja fajla
} else {
    echo "Fajl nije pronađen.";
}
?>