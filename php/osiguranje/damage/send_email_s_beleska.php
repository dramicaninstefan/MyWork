<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';

// Uključite config.php za povezivanje sa bazom
include('../config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // $id = '40';
    $id = $_POST['stete_id'];
    $klijent_id = $_POST['klijent_id'];
    $reg_oznaka = $_POST['reg_oznaka'];
    $datum_nezgode = $_POST['datum_nezgode'];
    $formatted_date = date('d.m.Y', strtotime($datum_nezgode));

    $sql = "SELECT t.*, k.*
            FROM klijenti_stete t 
            JOIN klijent k ON t.klijent_id = k.id 
            WHERE t.id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    // Provera da li je slika postavljena
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $fileTmpPath = $_FILES['image']['tmp_name'];
        $fileName = $_FILES['image']['name'];

        while ($row = $result->fetch_assoc()) {
            $ime_prezime = $row['ime_prezime'];
            $jmbg = $row['jmbg'];
            $punomoc = $row['punomoc'];
            $punomoc_extension = $row['punomoc_extension'];
        }

        // Ako postoji punomoć u bazi, kreiraj privremeni fajl
        $punomoc_file_path = null;
        if (!empty($punomoc) && !empty($punomoc_extension)) {
            $punomoc_file_path = sys_get_temp_dir() . "/punomoc_" . time() . "." . $punomoc_extension;
            file_put_contents($punomoc_file_path, $punomoc);
        }

        // Kreiranje PHPMailer objekta
        $mail = new PHPMailer(true);

        try {
            $mail->CharSet = "UTF-8";
            $mail->Encoding = "base64";
            $mail->isSMTP();
            $mail->Host = $_ENV['MAIL_HOST_SB'];
            $mail->SMTPAuth = true;
            $mail->Username = $_ENV['MAIL_USERNAME_SB'];
            $mail->Password = $_ENV['MAIL_PASSWORD_SB'];
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            $mail->setFrom($_ENV['MAIL_FROM_SB'], '');
            $mail->addAddress($_ENV['MAIL_FROM']);

            // Telo mejla
            $mail->isHTML(true);
            $mail->Subject = $ime_prezime . ' UVERENJE SAOBRAĆAJNA POLICIJA';

            $opis = "<p>Poštovani,</p>";
            $opis .= "<p>Molimo Vas da nam dostavite službenu belešku o saobraćajnoj nezgodi u kojoj je učestvovalo vozilo našeg punomoćnika.</p>";
            $opis .= "<p>Podaci o nezgodi:</p>";
            $opis .= "<ul style='list-style: none; padding: 0; margin: 0;'>";
            $opis .= "<li>Ime i Prezime: " . $ime_prezime . "</li>";
            $opis .= "<li>MB/PIB: " . $jmbg . "</li>";
            $opis .= "<li>Datum i mesto nezgode: " . $formatted_date . "</li>";
            $opis .= "<li>Registarski broj vozila: " . $reg_oznaka . "</li>";
            $opis .= "</ul>";
            $opis .= "<p>Kontakt osoba: Goran Dramićanin</p>";
            $opis .= "<p>Kontakt telefon: 0638489439</p>";
            $opis .= "<p>U prilogu dostavljamo dokaz o uplati republičke administrativne takse.</p>";
            $opis .= "<p></p>";
            $opis .= "<p>Unapred hvala na odgovoru.</p>";

            $mail->Body = $opis;

            // Dodavanje slike kao prilog
            $mail->addAttachment($fileTmpPath, $fileName);

            // Dodavanje punomoći kao prilog ako postoji
            if ($punomoc_file_path) {
                $mail->addAttachment($punomoc_file_path, "Punomoc.$punomoc_extension");
            }

            // Slanje email-a
            $mail->send();

            // Brisanje privremenog fajla
            if ($punomoc_file_path) {
                unlink($punomoc_file_path);
            }

            $stmt = $conn->prepare("UPDATE klijenti_stete SET sluzbena_beleska_poslata = 1 WHERE id = ?");
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $stmt->close();
            $conn->close();

            echo '
                <script>
                    sessionStorage.setItem("status", "success");
                    sessionStorage.setItem("message", "Mejl je uspesno poslat!");
                    window.location.href = "/stete";
                </script>';
        } catch (Exception $e) {
            echo '
                <script>
                    sessionStorage.setItem("status", "error");
                    sessionStorage.setItem("message", "Došlo je do greške, pokušaj ponovo!");
                    window.location.href = "/stete";
                </script>';
        }
    } else {
        echo '<script>alert("Nema fajla ili je došlo do greške u uploadu.");</script>';
    }
}
?>