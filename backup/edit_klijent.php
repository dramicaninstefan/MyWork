<?php
require 'config.php';

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
    $ime_prezime = $_POST['ime_prezime'];
    $kontakt = $_POST['kontakt'];
    $jmbg = $_POST['jmbg'];
    $poslato = $_POST['poslato'];

    $stmt = $pdo->prepare("UPDATE klijenti SET ime_prezime = ?, kontakt = ?, jmbg = ?, poslato = ? WHERE id = ?");
    $stmt->execute([$ime_prezime, $kontakt, $jmbg, $poslato, $id]);

    header("Location: index.php"); // Vrati se na glavnu stranicu
    exit();
}
?>
