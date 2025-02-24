<?php
$servername = "localhost"; // Promenite sa vašim serverom
$username = "root"; // Vaše korisničko ime
$password = ""; // Vaša lozinka
$dbname = "osiguranje"; // Vaša baza podataka

// Kreirajte konekciju
$conn = new mysqli($servername, $username, $password, $dbname);

// Proverite konekciju
if ($conn->connect_error) {
    die("Konekcija nije uspela: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Inicijalizacija sadržaja fajlova
    $fileContent1 = $fileContent2 = $fileContent3 = null;

    // Učitavanje sadržaja fajlova
    for ($i = 0; $i < 3; $i++) {
        if (isset($_FILES['data_files']['tmp_name'][$i]) && $_FILES['data_files']['error'][$i] == 0) {
            $fileContent = file_get_contents($_FILES['data_files']['tmp_name'][$i]);
            $fileContent = $conn->real_escape_string($fileContent);

            // Dodeljujemo sadržaj svakom fajlu
            if ($i == 0) {
                $fileContent1 = $fileContent;
            } elseif ($i == 1) {
                $fileContent2 = $fileContent;
            } elseif ($i == 2) {
                $fileContent3 = $fileContent;
            }
        } else {
            // Možete da obradite greške ili ih ignorisite
            echo "Fajl " . ($_FILES['data_files']['name'][$i] ?? 'nepoznat') . " nije uspeo da se upload-uje.<br>";
        }
    }

    // SQL upit za umetanje
    $sql = "INSERT INTO klijenti_stete (file_data1, file_data2, file_data3) VALUES ('$fileContent1', '$fileContent2', '$fileContent3')";

    if ($conn->query($sql) === TRUE) {
        echo "Fajlovi su uspešno uploadovani.";
    } else {
        echo "Greška prilikom upload-a fajlova: " . $conn->error;
    }
}

$conn->close();
?>