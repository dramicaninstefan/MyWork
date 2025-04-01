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

// Kreiranje PDF-a za odstetni_zahtev
$pdfOdstetni = new FPDI();
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
        ['data' => $row['sluzbena_beleska'], 'extension' => $row['sluzbena_beleska_extension']],
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
        $imageExtension = strtolower($image['extension']); // Pretvorimo u mala slova

        // Unikatno ime za privremeni fajl
        $uniqueId = uniqid();
        
        if (in_array($imageExtension, ['jpg', 'jpeg', 'png'])) {
            // Kreiranje unikatnog privremenog fajla za sliku
            $tempImageFile = "temp_image_{$uniqueId}.{$imageExtension}";

            // Provera da li je moguće sačuvati sliku
            if (file_put_contents($tempImageFile, $image['data']) === false) {
                echo "Greška pri čuvanju slike u privremeni fajl.";
                exit;
            }

            // Dobijanje dimenzija slike
            list($imgWidth, $imgHeight) = getimagesize($tempImageFile);

            // Veličina A4 stranice u mm
            $pdfWidth = 210; // širina A4 u mm (standardni format u portrait režimu)
            $pdfHeight = 297; // visina A4 u mm

            // Skaliranje slike tako da zauzme celu stranicu bez izobličenja
            $imgRatio = $imgWidth / $imgHeight;
            $pdfRatio = $pdfWidth / $pdfHeight;

            if ($imgRatio > $pdfRatio) {
                // Slika je šira - prilagođavamo širinu
                $newWidth = $pdfWidth;
                $newHeight = $pdfWidth / $imgRatio;
                $x = 0;
                $y = ($pdfHeight - $newHeight) / 2;
            } else {
                // Slika je viša - prilagođavamo visinu
                $newHeight = $pdfHeight;
                $newWidth = $pdfHeight * $imgRatio;
                $x = ($pdfWidth - $newWidth) / 2;
                $y = 0;
            }

            // Dodajte novu stranicu za svaku sliku
            $pdf->AddPage();

            // Dodajte sliku u PDF tako da zauzima celu stranicu
            try {
                $pdf->Image($tempImageFile, $x, $y, $newWidth, $newHeight);
                unlink($tempImageFile); // Brišemo privremeni fajl nakon dodavanja u PDF
            } catch (Exception $e) {
                echo "Greška prilikom dodavanja slike u PDF: " . $e->getMessage();
            }
        } elseif ($imageExtension === 'pdf') {
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
        $punomocData = $row['punomoc'];  // Binardni podaci iz baze
        $punomocExtension = strtolower($row['punomoc_extension']); // Ekstenzija fajla

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
        } elseif (in_array($punomocExtension, ['jpg', 'jpeg', 'png'])) {
            // Ako je punomoć slika, ubacujemo je u PDF
            $tempImageFile = "temp_punomoc_{$uniqueId}.{$punomocExtension}";

            // Sačuvamo sliku kao privremeni fajl
            if (file_put_contents($tempImageFile, $punomocData) === false) {
                echo "Greška pri čuvanju slike punomoći.";
                exit;
            }

            // Dodavanje nove stranice u PDF i umetanje slike
            try {
                list($width, $height) = getimagesize($tempImageFile);
                $pdfPunoMoc->AddPage();
                $pdfPunoMoc->Image($tempImageFile, 10, 10, 190); // Postavljamo sliku u PDF
                unlink($tempImageFile); // Brišemo privremeni fajl nakon umetanja
            } catch (Exception $e) {
                echo "Greška prilikom umetanja slike punomoći: " . $e->getMessage();
            }
        } else {
            echo "Nepodržani tip fajla za punomoć: " . $punomocExtension;
        }
    }


        // Ako postoji odštetni zahtev, dodajemo ga u PDF
    if ($row['odstetni_zahtev']) {
        $odstetniZahtevData = $row['odstetni_zahtev'];  // Binardni podaci iz baze
        $odstetniZahtevExtension = strtolower($row['odstetni_zahtev_extension']); // Ekstenzija fajla

        if (strpos($odstetniZahtevExtension, 'pdf') !== false) {
            // Unikatno ime za odštetni zahtev PDF fajl
            $tempOdstetniFile = "temp_odstetni_{$uniqueId}.pdf";

            // Sačuvajte PDF fajl kao privremeni fajl
            if (file_put_contents($tempOdstetniFile, $odstetniZahtevData) === false) {
                echo "Greška pri čuvanju odštetnog zahteva kao privremeni fajl.";
                exit;
            }

            // Učitavanje postojećeg PDF-a i umetanje stranica u PDF odštetnog zahteva
            try {
                $pageCount = $pdfOdstetni->setSourceFile($tempOdstetniFile);

                for ($i = 1; $i <= $pageCount; $i++) {
                    $templateId = $pdfOdstetni->importPage($i);
                    $pdfOdstetni->AddPage();
                    $pdfOdstetni->useTemplate($templateId);
                }

                unlink($tempOdstetniFile); // Brišemo privremeni PDF fajl nakon umetanja
            } catch (Exception $e) {
                echo "Greška prilikom umetanja odštetnog zahteva: " . $e->getMessage();
            }
        } elseif (in_array($odstetniZahtevExtension, ['jpg', 'jpeg', 'png'])) {
            // Ako je odštetni zahtev slika, ubacujemo je u PDF
            $tempImageFile = "temp_odstetni_{$uniqueId}.{$odstetniZahtevExtension}";

            // Sačuvamo sliku kao privremeni fajl
            if (file_put_contents($tempImageFile, $odstetniZahtevData) === false) {
                echo "Greška pri čuvanju slike odštetnog zahteva.";
                exit;
            }

            // Dodavanje nove stranice u PDF i umetanje slike
            try {
                list($width, $height) = getimagesize($tempImageFile);
                $pdfOdstetni->AddPage();
                $pdfOdstetni->Image($tempImageFile, 10, 10, 190); // Postavljamo sliku u PDF
                unlink($tempImageFile); // Brišemo privremeni fajl nakon umetanja
            } catch (Exception $e) {
                echo "Greška prilikom umetanja slike odštetnog zahteva: " . $e->getMessage();
            }
        } else {
            echo "Nepodržani tip fajla za odštetni zahtev: " . $odstetniZahtevExtension;
        }
    }


    

    $ime_prezime = $row['ime_prezime'];
    $reg_oznaka = $row['reg_oznaka'];
    $osig_kuca_stetnik = $row['osig_kuca_stetnik'];
    $opis_text = $row['opis'] ? $row['opis'] : " ";
    
    $weTransfer_link = $row['weTransfer_link'];
    
    // Asocijativni niz sa osiguranjima i njihovim adresama
    $osiguranjeMejlAdrese = [
        "Dunav Osiguranje" => "kontaktcentar@dunav.com",
        "DDOR Osiguranje" => "epsbg@ddor.rs",
        "Uniqa Osiguranje" => "info.stete@uniqa.rs",
        "Triglav Osiguranje" => "stete.vozila@triglav.rs",
        "Generali Osiguranje" => "kontakt@generali.rs",
        "Wiener Osiguranje" => "stete.mv@wiener.co.rs",
        "Sava Osiguranje" => "sava.stete@sava-osiguranje.rs",
        "Milenijum Osiguranje" => "prijava@milenijum-osiguranje.rs",
        "Globos Osiguranje" => "prijava.ak@globos.rs",
        "AMS Osiguranje" => "prijava.stete@ams.co.rs",
        "GRAWE Osiguranje" => "stete.mv@grawe.rs"
    ];

    $mejlAdresaOsiguranje = isset($osiguranjeMejlAdrese[$osig_kuca_stetnik]) ? $osiguranjeMejlAdrese[$osig_kuca_stetnik] : "Adresa nije dostupna";
}

// Generisanje i čuvanje PDF fajla
$pdfOutputPath = 'all.pdf';
$pdf->Output('F', $pdfOutputPath);

// Generisanje i čuvanje PDF-a za punomoć
$pdfPunoMocOutputPath = 'punomoc.pdf';
$pdfPunoMoc->Output('F', $pdfPunoMocOutputPath);

// Generisanje i čuvanje PDF-a za odštetni zahtev
$pdfOdstetniOutputPath = 'odstetni_zahtev.pdf';
$pdfOdstetni->Output('F', $pdfOdstetniOutputPath);

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
    $mail->Subject =  'Odštetni zahtev ' . $reg_oznaka . ' ' . $ime_prezime;
    // $mail->Body = $opis_text;

    $opis = "<p>Šalje se u <strong>" . $osig_kuca_stetnik . "</strong> na sledeću mejl adresu: <strong>" . $mejlAdresaOsiguranje . "</strong></p>";
    $opis .= "<p><br/></p>";
    $opis .= "<p>" . nl2br($opis_text) . "</p>";
    $opis .= "<p>U prilog mejla: </p>";
    $opis .= "<ol style='padding: 0; margin: 0;'>";
    $opis .= "<li>Punomoć</li>";
    $opis .= "<li>Odštetni zahtev</li>";
    $opis .= "<li>Ostala dokumenta</li>";
    $opis .= $weTransfer_link != NULL ? "<li>Link sa fotografijama vozila:</li>" : "";
    $opis .= "</ol>";
    $opis .= $weTransfer_link != NULL ? "<p> " . $weTransfer_link . " 
                                        <br/>Molim Vas da slike brzo preuzmete dok link još uvek traje.</p>" : "";
    $opis .= $weTransfer_link != NULL ? "<p></p>" : "";
    $opis .= "<p>Za sve informacije budite slobodni da nas kontaktirate na ovaj mejl ili broj telefona 0638489439 GORAN.</p>";

    
    $mail->Body = $opis; // Postavljanje tela poruke
    


    $mail->Body = $opis; // Postavljanje tela poruke

    // Prilogaćemo PDF fajl
    $mail->addAttachment($pdfPunoMocOutputPath);
    $mail->addAttachment($pdfOdstetniOutputPath);
    $mail->addAttachment($pdfOutputPath);

    
   // Pošaljite mejl
   if ($mail->send()) {
        // Ažurirajte polje "poslato" sa trenutnim vremenom
        $updateSql = "UPDATE klijenti_stete SET poslato = ? WHERE id = ?";
        $stmt = $conn->prepare($updateSql);
        $currentDateTime = date('Y-m-d H:i:s');
        $stmt->bind_param("si", $currentDateTime, $id);
        $stmt->execute();

        // Priprema SQL upita za unos podataka
        $insertObracun = "INSERT INTO obracun_stete (obracun_id, steta_id, klijent_id, osig_kuca) 
        VALUES (NULL, ?, ?, ?)";

        // Priprema upita
        $stmt = $conn->prepare($insertObracun);
        $stmt->bind_param("iis", $id, $klijent_id, $osig_kuca_stetnik);

        // Izvršavanje upita
        $stmt->execute();
        // Preusmerite korisnika
        echo '
        <script>
            sessionStorage.setItem("status", "success");
            sessionStorage.setItem("message", "Mejl je uspesno poslat!");
            window.location.href = "/stete";
        </script>';
    } else {
        echo '
        <script>
            sessionStorage.setItem("status", "error");
            sessionStorage.setItem("message", "Došlo je do greške, pokušaj ponovo!");
            window.location.href = "/stete";
        </script>';
    }

} catch (Exception $e) {
    echo '
        <script>
            sessionStorage.setItem("status", "error");
            sessionStorage.setItem("message", "Došlo je do greške, neki od fajlova nije kompresovan!");
            window.location.href = "/stete";
        </script>';
}

?>