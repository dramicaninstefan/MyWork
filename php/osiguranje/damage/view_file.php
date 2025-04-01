<?php
// Uključite config.php za povezivanje sa bazom
include('../config.php');

$id = isset($_GET['id']) ? intval($_GET['id']) : null;
$fileColumn = isset($_GET['file']) ? $conn->real_escape_string($_GET['file']) : null;

if ($id && $fileColumn) {
    $query = "SELECT $fileColumn, {$fileColumn}_extension AS file_ext FROM klijenti_stete WHERE id = $id";
    $result = $conn->query($query);

    if ($result && $row = $result->fetch_assoc()) {
        if (!empty($row[$fileColumn])) {
            $fileData = $row[$fileColumn];
            $fileExt = strtolower($row['file_ext']);

            // Postavljanje Content-Type zaglavlja na osnovu ekstenzije iz baze
            switch ($fileExt) {
                case 'jpg':
                case 'jpeg':
                case 'png':
                    header("Content-Type: image/$fileExt");
                    break;
                case 'pdf':
                    header("Content-Type: application/pdf");
                    break;
                default:
                    echo "Nepodržan format fajla.";
                    exit;
            }

            echo $fileData;
            exit;
        } else {
            echo "Fajl nije pronađen.";
        }
    } else {
        echo "Greška u upitu: " . $conn->error;
    }
} else {
    echo "Nema zatraženog fajla.";
}

// Zatvaranje konekcije
$conn->close();
?>