<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php'; // ako koristiš Composer
require '../config.php'; // konekcija ka bazi

// Danas + 20 dana
$target_date = date('Y-m-d', strtotime('+20 days'));

$sql = "SELECT * FROM skadencar WHERE DATE(skadencar_kraj) = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $target_date);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Proveri da li je skadencar_obnova već postavljen na 1
        if ($row['skadencar_obnova'] == 1) {
            // Ako je već obnovljena, preskoči slanje emaila
            echo "Polisa {$row['broj_polise']} je već obnovljena. Slanje emaila nije potrebno.<br>";
            continue; // Preskoči dalje izvršavanje ovog ciklusa
        }

        // Ako je grana PZO, automatski postavi kao obnovljeno bez slanja maila
        if (trim($row['grana_tarifa']) === 'PZO') {
            echo "Polisa {$row['broj_polise']} (PZO) - automatski označena kao obnovljena bez slanja mejla.<br>";
            $update_sql = "UPDATE skadencar SET skadencar_obnova = 1 WHERE id = ?";
            $update_stmt = $conn->prepare($update_sql);
            $update_stmt->bind_param("i", $row['id']);
            $update_stmt->execute();
            continue; // Preskoči slanje mejla
        }

        $skadencar_pocetak = date('d/m/Y', strtotime($row['skadencar_pocetak']));
        $skadencar_kraj = date('d/m/Y', strtotime($row['skadencar_kraj']));

        $subject = "Obnova: {$row['ime_prezime']} {$row['broj_polise']} {$skadencar_pocetak} {$skadencar_kraj} {$row['grana_tarifa']} {$row['premija_sa_porezom']} {$row['osig_kuca']} {$row['nacin_placanja']} {$row['premija_bez_poreza']} {$row['mb_pib']}";

        // <strong>{$row['broj_polise']}</strong> za <strong>{$row['ime_prezime']}</strong> ističe: <strong>{$row['skadencar_kraj']}</strong>.


        $message = "
            Poštovani,
            <br><br>
            Molim vas predlog obnove.
            <br><br>
            <table border='1' cellpadding='5' cellspacing='0' style='border-collapse: collapse; font-family: Arial, sans-serif;'>
                <thead style='background-color: #f2f2f2;'>
                    <tr>
                        <th>Ime i prezime</th>
                        <th>Broj polise</th>
                        <th>Skadencar početak</th>
                        <th>Skadencar istek</th>
                        <th>Grana tarife</th>
                        <th>Premija sa porezom</th>
                        <th>Osiguravajuća kuća</th>
                        <th>Premija bez poreza</th>
                        <th>Način plaćanja</th>
                        <th>MB/PIB</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{$row['ime_prezime']}</td>
                        <td>{$row['broj_polise']}</td>
                        <td>{$skadencar_pocetak}</td>
                        <td>{$skadencar_kraj}</td>
                        <td>{$row['grana_tarifa']}</td>
                        <td>" . number_format($row['premija_sa_porezom'], 2, ',', '.') . "</td>
                        <td>{$row['osig_kuca']}</td>
                        <td>" . number_format($row['premija_bez_poreza'], 2, ',', '.') . "</td>
                        <td>{$row['nacin_placanja']}</td>
                        <td>{$row['mb_pib']}</td>
                    </tr>
                </tbody>
            </table>
        ";


        // Slanje maila
        $mail = new PHPMailer(true);
        try {
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

            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body = $message;

            if ($mail->send()) {
                echo "Mail poslat za polisu: {$row['broj_polise']}<br>";
                // Ažuriraj skadencar_obnova na 1
                $update_sql = "UPDATE skadencar SET skadencar_obnova = 1 WHERE id = ?";
                $update_stmt = $conn->prepare($update_sql);
                $update_stmt->bind_param("i", $row['id']);
                $update_stmt->execute();
            } else {
                exit();
            }

        } catch (Exception $e) {
            echo "Greška pri slanju maila za {$row['broj_polise']}: {$mail->ErrorInfo}<br>";
        }
    }
} else {
    echo "Nema polisa koje ističu za 20 dana.";
}
?>