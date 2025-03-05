<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';

// Uključite config.php za povezivanje sa bazom
include('../config.php'); // Ovaj fajl mora biti u istoj fascikli ili navedite apsolutnu putanju

$id = isset($_POST['id']) ? $_POST['id'] : NULL;
$klijent_id = isset($_POST['klijent_id']) ? intval($_POST['klijent_id']) : null;

// Pretraga u tabeli klijenti_stete na osnovu id-a i klijent_id-a
$sql = "SELECT t.*, k.*, 
                t.punomoc_extension, t.osteceni_licna_prednja_extension, t.osteceni_licna_zadnja_extension, 
                t.osteceni_saobracajna_prednja_extension, t.osteceni_saobracajna_zadnja_extension, 
                t.osteceni_vozacka_prednja_extension, t.osteceni_vozacka_zadnja_extension, 
                t.osteceni_izvestaj_extension, t.osteceni_izjava_extension, t.osteceni_polisa_extension, 
                t.osteceni_tekuci_extension, t.stetnik_licna_prednja_extension, 
                t.stetnik_licna_zadnja_extension, t.stetnik_saobracajna_prednja_extension, 
                t.stetnik_saobracajna_zadnja_extension, t.stetnik_vozacka_prednja_extension, 
                t.stetnik_vozacka_zadnja_extension, t.stetnik_izjava_extension, 
                t.stetnik_polisa_extension, t.evropski_izvestaj_extension, t.emin_procena_extension, t.dodatni_dokument1_extension, 
                t.dodatni_dokument2_extension, t.dodatni_dokument3_extension, 
                t.dodatni_dokument4_extension, t.dodatni_dokument5_extension, 
                t.dodatni_dokument6_extension
        FROM klijenti_stete t 
        JOIN klijent k ON t.klijent_id = k.id 
        WHERE t.id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);  // Prosleđuješ id i klijent_id
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // PHPMailer podešavanje
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->CharSet = "UTF-8"; // Postavlja charset na UTF-8
        $mail->Encoding = "base64"; // Osigurava ispravan prenos specijalnih karaktera
        $mail->isSMTP();
        $mail->Host = $_ENV['MAIL_HOST'];
        $mail->SMTPAuth = true;
        $mail->Username = $_ENV['MAIL_USERNAME'];
        $mail->Password = $_ENV['MAIL_PASSWORD'];
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        $mail->setFrom($_ENV['MAIL_FROM'], '');
        $mail->addAddress($_ENV['MAIL_FROM']);

        // Ime klijenta i informacije u telu mejla
        while ($row = $result->fetch_assoc()) {
            $ime_prezime = $row['ime_prezime'];
            $telefon = $row['kontakt'];
            $opis = $row['opis'] ? $row['opis'] : "Prijava Štete";
            $status = $row['status_izvrsenja'];
            $poslato = $row['poslato'];
            $created_at = $row['created_at'];

            // Telo mejla
            $mail->isHTML(true);
            $mail->Subject = $ime_prezime . ' Šteta  |  ' . $telefon;
            $mail->Body = $opis;

            // Lista svih fajlova (obavezni i neobavezni) sa ekstenzijama
            $files = [
                'punomoc', 'osteceni_licna_prednja', 'osteceni_licna_zadnja', 'osteceni_saobracajna_prednja',
                'osteceni_saobracajna_zadnja', 'osteceni_vozacka_prednja', 'osteceni_vozacka_zadnja',
                'osteceni_izvestaj', 'osteceni_izjava', 'osteceni_polisa', 'osteceni_tekuci',
                'stetnik_licna_prednja', 'stetnik_licna_zadnja', 'stetnik_saobracajna_prednja',
                'stetnik_saobracajna_zadnja', 'stetnik_vozacka_prednja', 'stetnik_vozacka_zadnja',
                'stetnik_izjava', 'stetnik_polisa', 'evropski_izvestaj', 'emin_procena', 'dodatni_dokument1',
                'dodatni_dokument2', 'dodatni_dokument3', 'dodatni_dokument4', 'dodatni_dokument5', 'dodatni_dokument6'
            ];

            foreach ($files as $file) {
                if ($row[$file]) {
                    // Dobavljanje ekstenzije za fajl
                    $extension = $row[$file . '_extension'];

                    // Proveri da li je fajl slika
                    if (strpos($extension, 'jpg') !== false || strpos($extension, 'jpeg') !== false || strpos($extension, 'png') !== false) {
                        // Ako je slika, koristi addAttachment za sliku
                        $imageData = $row[$file]; // Binarni podaci slike u bazi
                        // Koristi ispravan MIME tip za sliku
                        $mail->addStringAttachment($imageData, $file . '.' . $extension, 'base64', 'image/jpeg'); // Pretpostavljamo da je slika JPG
                    } else {
                        // Ako nije slika, koristi addAttachment za fajl, kao PDF
                        $mail->addStringAttachment($row[$file], $file . '.' . $extension, 'base64', 'application/pdf');
                    }
                }
            }

            // Pošaljite mejl
            if ($mail->send()) {
                // Ažurirajte polje "poslato" sa trenutnim vremenom
                $updateSql = "UPDATE klijenti_stete SET poslato = ? WHERE id = ?";
                $stmt = $conn->prepare($updateSql);
                $currentDateTime = date('Y-m-d H:i:s');
                $stmt->bind_param("si", $currentDateTime, $id);
                $stmt->execute();

                // Preusmerite korisnika
                echo '
                <script>
                    sessionStorage.setItem("status", "success");
                    sessionStorage.setItem("message", "Mejl je uspesno poslat advokatu!");
                    window.location.href = "/client_damage";
                </script>';
            } else {
                echo '
                <script>
                    sessionStorage.setItem("status", "error");
                    sessionStorage.setItem("message", "Došlo je do greške, molim vas pokušajte ponovo!");
                    window.location.href = "/client_damage";
                </script>';
            }
           
            echo 'Message has been sent';
        }
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
} else {
    echo "No records found.";
}

$conn->close();
?>