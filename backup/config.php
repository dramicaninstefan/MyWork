<?php
require_once __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

// Parametri za bazu podataka
$servername = $_ENV['DB_HOST'];
$username = $_ENV['DB_USER'];
$password = $_ENV['DB_PASSWORD'];
$dbname = $_ENV['DB_NAME'];

// Prvo, pokušaj sa mysqli
$conn = new mysqli($servername, $username, $password, $dbname);

// Provera mysqli konekcije
if ($conn->connect_error) {
    die("Greška pri povezivanju sa MySQL: " . $conn->connect_error);
} else {
    // echo "Uspešno povezano sa MySQL bazom.";
}

// Drugi pokušaj, korišćenje PDO
try {
    $pdo = new PDO("mysql:host=" . $_ENV['DB_HOST'] . ";dbname=" . $_ENV['DB_NAME'], $_ENV['DB_USER'], $_ENV['DB_PASSWORD']);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Uspešno povezano sa PDO bazom.";
} catch (PDOException $e) {
    die("Greška sa bazom podataka putem PDO: " . $e->getMessage());
}
?>
