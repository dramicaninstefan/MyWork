<?php
$id = isset($_POST['id']) ? $_POST['id'] : NULL;
$klijent_id = isset($_POST['klijent_id']) ? intval($_POST['klijent_id']) : null;
?>

<!-- confirm_send.html -->
<!DOCTYPE html>
<html lang="sr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Potvrda slanja</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="overflow: hidden;">
    <div class="container d-flex justify-content-center vh-100">
        <div class="text-center mt-5">
            <h3>Potvrda slanja</h3>
            <p>Da li ste sigurni da želite da pošaljete mejl advokatu?</p>
            <form action="../damage/send_email.php" method="POST">

                <!-- Hidden input fields for id and klijent_id -->
                <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">
                <input type="hidden" name="klijent_id" value="<?php echo htmlspecialchars($klijent_id); ?>">

                <button type="submit" class="btn btn-primary">Pošaljite</button>
                <a href="/" class="btn btn-secondary">Otkaži</a>
            </form>
        </div>
    </div>
</body>

</html>