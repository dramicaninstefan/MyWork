<?php
session_start();
require '../config.php'; // Datoteka za konekciju s bazom

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Korišćenje MySQLi za pripremu i izvršavanje upita
    $stmt = $conn->prepare("SELECT id, password FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    
    if ($stmt->execute()) {
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        // Provera korisnika i hashovane lozinke
        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $username;

            header("Location: /");
            exit();
        } else {
            $error = "Pogrešno korisničko ime ili lozinka.";
        }
    } else {
        $error = "Greška prilikom izvršavanja upita.";
    }
}
?>

<!DOCTYPE html>
<html lang="sr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>

<body class="d-flex justify-content-center align-items-center vh-100 bg-light">
    <div class="card shadow p-4" style="width: 100%; max-width: 400px;">
        <h2 class="text-center">Prijava</h2>

        <?php if (!empty($error)): ?>
        <div class="alert alert-danger text-center">
            <?php echo $error; ?>
        </div>
        <?php endif; ?>

        <form method="POST" action="" class="needs-validation" novalidate>
            <div class="mb-3">
                <label for="username" class="form-label">Korisničko ime:</label>
                <input type="text" name="username" id="username" class="form-control" required>
                <div class="invalid-feedback">Unesite korisničko ime.</div>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Lozinka:</label>
                <input type="password" name="password" id="password" class="form-control" required>
                <div class="invalid-feedback">Unesite lozinku.</div>
            </div>

            <button type="submit" class="btn btn-primary w-100">Prijavi se</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
    (function() {
        'use strict';
        var forms = document.querySelectorAll('.needs-validation');
        Array.prototype.slice.call(forms).forEach(function(form) {
            form.addEventListener('submit', function(event) {
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });
    })();
    </script>
</body>

</html>