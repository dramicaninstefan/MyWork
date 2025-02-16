<?php
use Dotenv\Dotenv;

require "vendor/autoload.php";  

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load(); 

try {
    $pdo = new PDO("mysql:host=" . $_ENV['DB_HOST'] . ";dbname=" . $_ENV['DB_NAME'], $_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD']);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Greška sa bazom podataka: " . $e->getMessage());
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $stmt = $pdo->prepare("SELECT * FROM email_logs WHERE id = ?");
    $stmt->execute([$id]);
    $log = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$log) {
        die("Log nije pronađen.");
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $email_to = $_POST['email_to'];
    $subject = $_POST['subject'];
    $status = $_POST['status'];
    $number = $_POST['number'];
    $comment = $_POST['comment'];
    $money = $_POST['money'];
    

    $stmt = $pdo->prepare("UPDATE email_logs SET email_to = ?, subject = ?, status = ?, number = ?, comment = ?, money = ? WHERE id = ?");
    $stmt->execute([$email_to, $subject, $status, $number, $comment, $money, $id]);

    header("Location: email_logs.php"); // Vrati se na glavnu stranicu
    exit();
}
?>