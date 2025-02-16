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

// Provera da li je email_log_id postavljen
$email_log_id = isset($_GET['email_log_id']) ? $_GET['email_log_id'] : null;

if (!$email_log_id) {
    die("Email log ID nije postavljen.");
}

// SQL upit za dobijanje fajlova koji su povezani sa određenim email_log_id
$stmt = $pdo->prepare("SELECT id, file_name FROM email_attachments WHERE email_log_id = :email_log_id");
$stmt->bindParam(':email_log_id', $email_log_id, PDO::PARAM_INT);
$stmt->execute();
$attachments = $stmt->fetchAll(PDO::FETCH_ASSOC);

$fajl_list = [
    "Prednja strana lične karte",
    "Zadnja strana lične karte",
    "Prednja strana saobraćajne",
    "Zadnja strana saobraćajne",
    "Prednja strana vozačke dozvole",
    "Zadnja strana vozačke dozvole",
    "Evropski izveštaj",
    "Izjava",
    "AO Polisa",
    "Tekući račun",
    "Prednja strana lične karte",
    "Zadnja strana lične karte",
    "Prednja strana saobraćajne",
    "Zadnja strana saobraćajne",
    "Prednja strana vozačke dozvole",
    "Zadnja strana vozačke dozvole",
    "Evropski izveštaj",
    "Izjava",
    "AO Polisa",
  ];
?>



<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fajlovi za Email Log</title>
    <!-- Uključivanje Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        table{
            border: 2px solid black;
        }
        
        td{
            padding: 15px;
        }
    </style>
</head>
<body>

<div class="container">
    <!-- Tabela za ispis fajlova -->
    <table class="table table-bordered table-striped">
        <thead class="table-dark ">
            <tr>
                <th>Ime Fajla</th>
                <th>Preuzmi</th>
            </tr>
        </thead>
        <tbody>
        <?php 
$index = 0; // Početni indeks
echo '<tr><td colspan="2"><b>Oštećeni</b></td></tr>';
foreach ($attachments as $attachment): ?>
    <tr>
        <td>
            <?php 
            // Provera da li je indeks validan
            if (isset($fajl_list[$index])) {
                echo htmlspecialchars($fajl_list[$index]);
            } else {
                echo "Nepoznata stavka"; // Ako indeks nije validan
            }
            ?> :
            <?php echo htmlspecialchars($attachment['file_name']); ?>
        </td>
        <td><a href="download.php?attachment_id=<?php echo $attachment['id']; ?>" class="btn btn-success">Preuzmi</a></td>
    </tr>

    <?php 
        

    // Dodaj prazan red nakon 9. indeksa (deseti red)
    if ($index == 9) {
        echo '<tr><td colspan="2"></td></tr><tr><td colspan="2"><b>Štetnik</b></td></tr>';
    }
    $index++; // Povećaj indeks sa svakim prolaskom kroz petlju
endforeach; 
?>

        </tbody>
    </table>
</div>

<!-- Uključivanje Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
