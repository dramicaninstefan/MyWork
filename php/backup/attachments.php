<?php
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

// Provera da li je client_id postavljen
$client_id = isset($_GET['client_id']) ? $_GET['client_id'] : null;

if (!$client_id) {
    die("Email log ID nije postavljen.");
}

// SQL upit za dobijanje fajlova koji su povezani sa određenim client_id
$stmt = $pdo->prepare("SELECT id, file_name FROM email_attachments WHERE email_log_id = :client_id");
$stmt->bindParam(':client_id', $client_id, PDO::PARAM_INT);
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
    "Dodatna dokumenta:",
    "Dodatna dokumenta:",
    "Dodatna dokumenta:",
    "Dodatna dokumenta:",
    "Dodatna dokumenta:",
    "Dodatna dokumenta:"
];
?>

<!DOCTYPE html>
<html lang="sr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fajlovi za Email Log</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
    table {
        border: 2px solid black;
    }

    td {
        padding: 15px;
    }
    </style>
</head>

<body>
    <div class="container">
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Ime Fajla</th>
                    <th>Preuzmi</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                if (empty($attachments)) {
                    echo '<tr><td colspan="2" class="text-center">Nema dostupnih dokumenata.</td></tr>';
                } else {
                    $index = 0;
                    echo '<tr><td colspan="2"><b>Oštećeni</b></td></tr>';
                    foreach ($attachments as $attachment): ?>
                <tr>
                    <td>
                        <?php echo isset($fajl_list[$index]) ? htmlspecialchars($fajl_list[$index]) : "Nepoznata stavka"; ?>
                        :
                        <?php echo htmlspecialchars($attachment['file_name']); ?>
                    </td>
                    <td><a href="download.php?attachment_id=<?php echo $attachment['id']; ?>"
                            class="btn btn-success">Preuzmi</a></td>
                </tr>
                <?php   
                        if ($index == 9) {
                            echo '<tr><td colspan="2"></td></tr><tr><td colspan="2"><b>Štetnik</b></td></tr>';
                        }

                        if ($index == 17) {
                            echo '<tr><td colspan="2"></td></tr><tr><td colspan="2"><b>Dodatna dokumenta:</b></td></tr>';
                        }
                        $index++;
                    endforeach;
                }
                ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>