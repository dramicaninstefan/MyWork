<?php
require '../config.php'; // Uključi konekciju na bazu

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Proveri da li su poslati podaci
    if (isset($_POST['id']) && isset($_POST['klijent_id'])) {
        $id = $_POST['id'];
        $klijent_id = $_POST['klijent_id'];

        // Priprema SQL upita za brisanje
        $sql = "DELETE FROM klijenti_stete WHERE id = ? AND klijent_id = ?";
        
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("ii", $id, $klijent_id);
            
            if ($stmt->execute()) {
                // Uspešno obrisano, preusmeravanje
                echo '<script>
                            sessionStorage.setItem("status", "success");
                            sessionStorage.setItem("message", "Uspešno obrisana šteta!");
                            window.location.href = "/stete";
                        </script>';
                exit();
            } else {
                echo '<script>
                            sessionStorage.setItem("status", "error");
                            sessionStorage.setItem("message", "Došlo je do greške pri brisanju, pokušaj ponovo!");
                            window.location.href = "/stete";
                        </script>';
                        exit();
                // echo "Greška pri brisanju: " . $stmt->error;
            }
            $stmt->close();
        }
    } else {
        echo '<script>
                    sessionStorage.setItem("status", "error");
                    sessionStorage.setItem("message", "Došlo je do greške pri brisanju, pokušaj ponovo!");
                    window.location.href = "/stete";
                </script>';
                exit();
        // echo "Nedostaju parametri za brisanje.";
    }
} else {
    echo '<script>
            sessionStorage.setItem("status", "error");
            sessionStorage.setItem("message", "Došlo je do greške pri brisanju, pokušaj ponovo!");
            window.location.href = "/stete";
        </script>';
        exit();
    // echo "Nevažeći zahtev.";
}

$conn->close();
?>