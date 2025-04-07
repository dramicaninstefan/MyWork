<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php'; // ako koristiš Composer
require '../config.php'; // konekcija ka bazi

// Danas + 14 dana
$target_date = date('Y-m-d', strtotime('+20 days'));

$sql = "SELECT * FROM skadencar WHERE DATE(skadencar_kraj) = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $target_date);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $subject = "Obaveštenje: Polisa ističe uskoro ({$row['broj_polise']})";

        $message = "
                Poštovani,<br><br>
                Obaveštavamo vas da polisa <strong>#{$row['broj_polise']}</strong> za <strong>{$row['ime_prezime']}</strong> ističe za 14 dana, <strong>{$row['skadencar_kraj']}</strong>.<br><br>

                <table border='1' cellpadding='8' cellspacing='0' style='border-collapse: collapse; font-family: Arial, sans-serif;'>
                    <thead style='background-color: #f2f2f2;'>
                        <tr>
                            <th>MB/PIB</th>
                            <th>Osiguravajuća kuća</th>
                            <th>Grana tarife</th>
                            <th>Premija sa porezom</th>
                            <th>Brokerska kuća</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{$row['mb_pib']}</td>
                            <td>{$row['osig_kuca']}</td>
                            <td>{$row['grana_tarifa']}</td>
                            <td>" . number_format($row['premija_sa_porezom'], 2, ',', '.') . " RSD</td>
                            <td>{$row['brokerska_kuca']}</td>
                        </tr>
                    </tbody>
                </table>

                <br><br>Srdačno,<br>Vaš tim
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

            
            if($mail->send()){
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
    echo "Nema polisa koje ističu za 14 dana.";
}
?>