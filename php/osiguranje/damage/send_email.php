<?php
use setasign\Fpdi\FPDF;
use setasign\Fpdi\Fpdi;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once('../vendor/autoload.php'); // Ukoliko koristite Composer
// Uključite config.php za povezivanje sa bazom
include('../config.php'); // Ovaj fajl mora biti u istoj fascikli ili navedite apsolutnu putanju

$id = isset($_POST['id']) ? $_POST['id'] : NULL;
$klijent_id = isset($_POST['klijent_id']) ? intval($_POST['klijent_id']) : null;

// Upit za uzimanje slika i ekstenzija
$sql = "SELECT t.*, k.*
        FROM klijenti_stete t 
        JOIN klijent k ON t.klijent_id = k.id 
        WHERE t.id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);  // Prosleđuješ id i klijent_id
$stmt->execute();
$result = $stmt->get_result();

// Kreiranje novog PDF-a
$pdf = new Fpdi();
$pdf->SetFont('Arial', '', 12);

// Kreiranje PDF-a za punomoć
$pdfPunoMoc = new Fpdi();
$pdfPunoMoc->SetFont('Arial', '', 12);

// Iteracija kroz slike i dodavanje svake slike na novu stranicu
while ($row = $result->fetch_assoc()) {  // Ispravljeno ovde
    // Lista slika i ekstenzija
    $images = [
        ['data' => $row['osteceni_licna_prednja'], 'extension' => $row['osteceni_licna_prednja_extension']],
        ['data' => $row['osteceni_licna_zadnja'], 'extension' => $row['osteceni_licna_zadnja_extension']],
        ['data' => $row['osteceni_saobracajna_prednja'], 'extension' => $row['osteceni_saobracajna_prednja_extension']],
        ['data' => $row['osteceni_saobracajna_zadnja'], 'extension' => $row['osteceni_saobracajna_zadnja_extension']],
        ['data' => $row['osteceni_vozacka_prednja'], 'extension' => $row['osteceni_vozacka_prednja_extension']],
        ['data' => $row['osteceni_vozacka_zadnja'], 'extension' => $row['osteceni_vozacka_zadnja_extension']],
        ['data' => $row['osteceni_izvestaj'], 'extension' => $row['osteceni_izvestaj_extension']],
        ['data' => $row['osteceni_izjava'], 'extension' => $row['osteceni_izjava_extension']],
        ['data' => $row['osteceni_polisa'], 'extension' => $row['osteceni_polisa_extension']],
        ['data' => $row['osteceni_tekuci'], 'extension' => $row['osteceni_tekuci_extension']],
        ['data' => $row['stetnik_licna_prednja'], 'extension' => $row['stetnik_licna_prednja_extension']],
        ['data' => $row['stetnik_licna_zadnja'], 'extension' => $row['stetnik_licna_zadnja_extension']],
        ['data' => $row['stetnik_saobracajna_prednja'], 'extension' => $row['stetnik_saobracajna_prednja_extension']],
        ['data' => $row['stetnik_saobracajna_zadnja'], 'extension' => $row['stetnik_saobracajna_zadnja_extension']],
        ['data' => $row['stetnik_vozacka_prednja'], 'extension' => $row['stetnik_vozacka_prednja_extension']],
        ['data' => $row['stetnik_vozacka_zadnja'], 'extension' => $row['stetnik_vozacka_zadnja_extension']],
        ['data' => $row['stetnik_izjava'], 'extension' => $row['stetnik_izjava_extension']],
        ['data' => $row['stetnik_polisa'], 'extension' => $row['stetnik_polisa_extension']],
        ['data' => $row['evropski_izvestaj'], 'extension' => $row['evropski_izvestaj_extension']],
        ['data' => $row['emin_procena'], 'extension' => $row['emin_procena_extension']],
        ['data' => $row['dodatni_dokument1'], 'extension' => $row['dodatni_dokument1_extension']],
        ['data' => $row['dodatni_dokument2'], 'extension' => $row['dodatni_dokument2_extension']],
        ['data' => $row['dodatni_dokument3'], 'extension' => $row['dodatni_dokument3_extension']],
        ['data' => $row['dodatni_dokument4'], 'extension' => $row['dodatni_dokument4_extension']],
        ['data' => $row['dodatni_dokument5'], 'extension' => $row['dodatni_dokument5_extension']],
        ['data' => $row['dodatni_dokument6'], 'extension' => $row['dodatni_dokument6_extension']],
        ['data' => $row['dodatni_dokument7'], 'extension' => $row['dodatni_dokument7_extension']],
        ['data' => $row['dodatni_dokument8'], 'extension' => $row['dodatni_dokument8_extension']],
        ['data' => $row['dodatni_dokument9'], 'extension' => $row['dodatni_dokument9_extension']],
        ['data' => $row['dodatni_dokument10'], 'extension' => $row['dodatni_dokument10_extension']],
        ['data' => $row['dodatni_dokument11'], 'extension' => $row['dodatni_dokument11_extension']],
        ['data' => $row['dodatni_dokument12'], 'extension' => $row['dodatni_dokument12_extension']],
        ['data' => $row['dodatni_dokument13'], 'extension' => $row['dodatni_dokument13_extension']],
        ['data' => $row['dodatni_dokument14'], 'extension' => $row['dodatni_dokument14_extension']],
        ['data' => $row['dodatni_dokument15'], 'extension' => $row['dodatni_dokument15_extension']],
        ['data' => $row['dodatni_dokument16'], 'extension' => $row['dodatni_dokument16_extension']],
    ];

    // Prolazimo kroz slike
    foreach ($images as $index => $image) {
        if ($image['data']) {
            // Ekstenzija slike
            $imageExtension = $image['extension'];

            // Unikatno ime za privremeni fajl
            $uniqueId = uniqid();
            
            if (strpos($imageExtension, 'jpg') !== false || strpos($imageExtension, 'jpeg') !== false || strpos($imageExtension, 'png') !== false) {
                // Kreiranje unikatnog privremenog fajla za sliku
                $tempImageFile = "temp_image_{$uniqueId}.{$imageExtension}";

                // Provera da li je moguće sačuvati sliku
                if (file_put_contents($tempImageFile, $image['data']) === false) {
                    echo "Greška pri čuvanju slike u privremeni fajl.";
                    exit;
                }

                // Dodajte novu stranicu za svaku sliku
                $pdf->AddPage();
                
                // Dodajte sliku u PDF
                try {
                    $pdf->Image($tempImageFile, 10, 10, 100); // Pozicija i veličina slike
                    unlink($tempImageFile); // Brišemo privremeni fajl nakon dodavanja u PDF
                } catch (Exception $e) {
                    echo "Greška prilikom dodavanja slike u PDF: " . $e->getMessage();
                }
            } else if (strpos($imageExtension, 'pdf') !== false) {
                // Unikatno ime za PDF fajl
                $tempPdfFile = "temp_pdf_{$uniqueId}.pdf";

                // Sačuvajte PDF fajl kao privremeni fajl
                if (file_put_contents($tempPdfFile, $image['data']) === false) {
                    echo "Greška pri čuvanju PDF-a kao privremeni fajl.";
                    exit;
                }

                // Učitavanje postojećeg PDF-a i umetanje stranica u novi PDF
                try {
                    $pageCount = $pdf->setSourceFile($tempPdfFile);

                    for ($i = 1; $i <= $pageCount; $i++) {
                        $templateId = $pdf->importPage($i);
                        $pdf->AddPage();
                        $pdf->useTemplate($templateId);
                    }

                    unlink($tempPdfFile); // Brišemo privremeni PDF fajl nakon umetanja
                } catch (Exception $e) {
                    echo "Greška prilikom umetanja PDF stranica: " . $e->getMessage();
                }
            } else {
                echo "Nepodržani tip fajla: " . $imageExtension;
            }

            // Dodaj kratak delay da se izbegnu prebrza prepisivanja
            usleep(50000); // 50ms
        }
    }


    // Ako postoji punomoć, dodajemo je u PDF
    if ($row['punomoc']) {
        $punomocData = $row['punomoc'];
        $punomocExtension = $row['punomoc_extension'];

        if (strpos($punomocExtension, 'pdf') !== false) {
            // Unikatno ime za punomoć PDF fajl
            $tempPunomocFile = "temp_punomoc_{$uniqueId}.pdf";

            // Sačuvajte PDF fajl kao privremeni fajl
            if (file_put_contents($tempPunomocFile, $punomocData) === false) {
                echo "Greška pri čuvanju punomoći kao privremeni fajl.";
                exit;
            }

            // Učitavanje postojećeg PDF-a i umetanje stranica u PDF punomoć
            try {
                $pageCount = $pdfPunoMoc->setSourceFile($tempPunomocFile);

                for ($i = 1; $i <= $pageCount; $i++) {
                    $templateId = $pdfPunoMoc->importPage($i);
                    $pdfPunoMoc->AddPage();
                    $pdfPunoMoc->useTemplate($templateId);
                }

                unlink($tempPunomocFile); // Brišemo privremeni PDF fajl nakon umetanja
            } catch (Exception $e) {
                echo "Greška prilikom umetanja punomoći: " . $e->getMessage();
            }
        } else {
            echo "Nepodržani tip fajla za punomoć: " . $punomocExtension;
        }
    }

    $ime_prezime = $row['ime_prezime'];
    $reg_oznaka = $row['reg_oznaka'];
    $osig_kuca_stetnik = $row['osig_kuca_stetnik'];
    $opis_text = $row['opis'] ? $row['opis'] : " ";
    $status = $row['status_izvrsenja'];
    $poslato = $row['poslato'];
    $created_at = $row['created_at'];
}

// Generisanje i čuvanje PDF fajla
$pdfOutputPath = 'all.pdf';
$pdf->Output('F', $pdfOutputPath);

// Generisanje i čuvanje PDF-a za punomoć
$pdfPunoMocOutputPath = 'punomoc.pdf';
$pdfPunoMoc->Output('F', $pdfPunoMocOutputPath);

// Slanje PDF-a putem emaila
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

    // Telo mejla
    $mail->isHTML(true);
    $mail->Subject = $reg_oznaka . ' ' . $ime_prezime . ' ODŠTETNI ZAHTEV';
    // $mail->Body = $opis_text;

    $opis = "<p>Šalje se u: <strong>" . $osig_kuca_stetnik . "</strong></p>";
    $opis .= "<p>U prilog mejla: </p>";
    $opis .= "<ol>";
    $opis .= "<li>Punomoć</li>";
    $opis .= "<li>Odštetni zahtev</li>";
    $opis .= "<li>Ostala dokumenta</li>";
    $opis .= "<li>Link sa fotografijama vozila:</li>";
    $opis .= "</ol>";
    $opis .= "<p></p>";
    $opis .= "<p>" . nl2br($opis_text) . "</p>";
    
    $mail->Body = $opis; // Postavljanje tela poruke
    


    $mail->Body = $opis; // Postavljanje tela poruke

    // Prilogaćemo PDF fajl
    $mail->addAttachment($pdfPunoMocOutputPath);
    $mail->addAttachment($pdfOutputPath);

    
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
            sessionStorage.setItem("message", "Mejl je uspesno poslat!");
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

    echo "PDF je uspešno poslat.";
} catch (Exception $e) {
    echo "Došlo je do greške prilikom slanja emaila: " . $mail->ErrorInfo;
}

?>