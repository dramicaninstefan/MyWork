<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';
require '../config.php';

if (!isset($_POST['id'])) {
    echo '<script>
        sessionStorage.setItem("status", "error");
        sessionStorage.setItem("message", "Nije prosleđen ID.");
        window.location.href = "/skadencar_unos";
    </script>';
    exit;
}

$id = intval($_POST['id']);

$sql = "SELECT * FROM skadencar WHERE id = ?";
$stmt = $conn->prepare($sql);

if (!$stmt) {
    echo '<script>
        sessionStorage.setItem("status", "error");
        sessionStorage.setItem("message", "Greška prilikom pripreme SQL upita!");
        window.location.href = "/skadencar_unos";
    </script>';
    exit;
}

$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    echo '<script>
        sessionStorage.setItem("status", "error");
        sessionStorage.setItem("message", "Polisa nije pronađena.");
        window.location.href = "/skadencar_unos";
    </script>';
    exit;
}

$row = $result->fetch_assoc();

if ($row['skadencar_obnova'] == 1) {
    echo '<script>
        sessionStorage.setItem("status", "info");
        sessionStorage.setItem("message", "Polisa je već obnovljena.");
        window.location.href = "/skadencar_unos";
    </script>';
    exit;
}

if (trim($row['grana_tarifa']) === 'PZO') {
    $update_sql = "UPDATE skadencar SET skadencar_obnova = 1 WHERE id = ?";
    $update_stmt = $conn->prepare($update_sql);
    $update_stmt->bind_param("i", $row['id']);
    $update_stmt->execute();

    echo '<script>
        sessionStorage.setItem("status", "success");
        sessionStorage.setItem("message", "PZO polisa automatski obnovljena.");
        window.location.href = "/skadencar_unos";
    </script>';
    exit;
}

$skadencar_pocetak = date('d/m/Y', strtotime($row['skadencar_pocetak']));
$skadencar_kraj = date('d/m/Y', strtotime($row['skadencar_kraj']));

$subject = "Obnova: {$row['ime_prezime']} {$row['broj_polise']} {$skadencar_pocetak} {$skadencar_kraj} {$row['grana_tarifa']} {$row['premija_sa_porezom']} {$row['osig_kuca']} {$row['nacin_placanja']} {$row['premija_bez_poreza']} {$row['mb_pib']}";

$message = "
    Poštovani,<br><br>
    Molim vas predlog obnove.<br><br>
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

$mail = new PHPMailer(true);
try {
    $mail->CharSet = "UTF-8";
    $mail->Encoding = "base64";
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
        $update_sql = "UPDATE skadencar SET skadencar_obnova = 1 WHERE id = ?";
        $update_stmt = $conn->prepare($update_sql);
        $update_stmt->bind_param("i", $row['id']);
        $update_stmt->execute();

        echo '<script>
            sessionStorage.setItem("status", "success");
            sessionStorage.setItem("message", "Mejl uspešno poslat i polisa označena kao obnovljena.");
            window.location.href = "/skadencar_unos";
        </script>';
    } else {
        echo '<script>
            sessionStorage.setItem("status", "error");
            sessionStorage.setItem("message", "Došlo je do greške prilikom slanja mejla.");
            window.location.href = "/skadencar_unos";
        </script>';
    }

} catch (Exception $e) {
    echo '<script>
        sessionStorage.setItem("status", "error");
        sessionStorage.setItem("message", "Greška pri slanju maila: ' . addslashes($mail->ErrorInfo) . '");
        window.location.href = "/skadencar_unos";
    </script>';
}