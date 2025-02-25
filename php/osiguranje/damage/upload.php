<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "osiguranje";

$id = isset($_POST['damage_id']) ? $_POST['damage_id'] : null;
$klijent_id = isset($_POST['klijent_id']) ? $_POST['klijent_id'] : null;

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Konekcija nije uspela: " . $conn->connect_error);
}

$fileNames = [
    "osteceni_licna_prednja", "osteceni_licna_zadnja", "osteceni_saobracajna_prednja", "osteceni_saobracajna_zadnja",
    "osteceni_vozacka_prednja", "osteceni_vozacka_zadnja", "osteceni_izvestaj", "osteceni_izjava",
    "osteceni_polisa", "osteceni_tekuci", "stetnik_licna_prednja", "stetnik_licna_zadnja",
    "stetnik_saobracajna_prednja", "stetnik_saobracajna_zadnja", "stetnik_vozacka_prednja", "stetnik_vozacka_zadnja",
    "stetnik_izjava", "stetnik_polisa", "emin_procena", "dodatni_dokument1",
    "dodatni_dokument2", "dodatni_dokument3", "dodatni_dokument4", "dodatni_dokument5", "dodatni_dokument6"
];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fileContents = [];
    
    foreach ($fileNames as $fileName) {
        if (isset($_FILES['data_files']['tmp_name'][$fileName]) && $_FILES['data_files']['error'][$fileName] == 0) {
            $fileContent = file_get_contents($_FILES['data_files']['tmp_name'][$fileName]);
            $fileContents[$fileName] = $conn->real_escape_string($fileContent);
        } else {
            $fileContents[$fileName] = null;
        }
    }

    $updateQuery = "UPDATE klijenti_stete SET ";
    $updates = [];
    foreach ($fileContents as $column => $value) {
        if ($value !== null) {
            $updates[] = "$column = '$value'";
        }
    }
    $updateQuery .= implode(", ", $updates) . " WHERE id = $id and klijent_id = $klijent_id";

    if ($conn->query($updateQuery) === TRUE) {
        // Redirekcija ili poruka o uspehu
        echo '
        <script>
            sessionStorage.setItem("status", "success");
            sessionStorage.setItem("message", "Uspesno ste dodali slike za predmet!");
            window.location.href = "/client_damage";
        </script>';
    } else {
        // Redirekcija ili poruka o uspehu
        echo '
        <script>
            sessionStorage.setItem("status", "error");
            sessionStorage.setItem("message", "Došlo je do greške, molim vas pokušajte ponovo!");
            window.location.href = "/client_damage";
        </script>';
    }
}

$conn->close();
?>