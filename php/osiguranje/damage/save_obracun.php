<?php
// Uključite config.php za povezivanje sa bazom
include('../config.php');

// Obrada podataka koji su poslati sa forme
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Uzimanje vrednosti iz POST-a
    $id = $_POST['id']; // ID za koji šaljemo promene
    $isplaceno_klijent = $_POST['isplaceno_klijent'];
    $advokatski_troskovi = $_POST['advokatski_troskovi'];
    $emin_procena = $_POST['emin_procena'];
    $uplatnica = $_POST['uplatnica'];
    $preporucilac = $_POST['preporucilac'];
    $trosak1 = $_POST['trosak1'];
    $trosak2 = $_POST['trosak2'];
    $trosak3 = $_POST['trosak3'];

    // SQL upit za ažuriranje podataka
    $update_sql = "UPDATE obracun_stete SET 
                   isplaceno_klijent = ?, 
                   advokatski_troskovi = ?, 
                   emin_procena = ?, 
                   uplatnica = ?, 
                   preporucilac = ?, 
                   trosak1 = ?, 
                   trosak2 = ?, 
                   trosak3 = ? 
                   WHERE obracun_id = ?";

    $stmt = $conn->prepare($update_sql);
    $stmt->bind_param("ddddddddi", 
                      $isplaceno_klijent, 
                      $advokatski_troskovi, 
                      $emin_procena, 
                      $uplatnica, 
                      $preporucilac, 
                      $trosak1, 
                      $trosak2, 
                      $trosak3, 
                      $id);

    if ($stmt->execute()) {
        echo '
        <script>
            sessionStorage.setItem("status", "success");
            sessionStorage.setItem("message", "Uspesno sačuvano!");
            window.location.href = "/obracun_stete";
        </script>';
    } else {
        
        echo '
        <script>
            sessionStorage.setItem("status", "error");
            sessionStorage.setItem("message", "Došlo je do greške, pokušaj ponovo!");
            window.location.href = "/obracun_stete";
        </script>';
    }
}
?>