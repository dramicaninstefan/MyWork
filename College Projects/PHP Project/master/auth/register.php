<?php
session_start();
require '../config.php'; // Datoteka za konekciju s bazom

$error = "";
$success = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ime_prezime = trim($_POST['ime_prezime']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    // Provera da li je email već u upotrebi
    $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $error = "Korisnik sa ovom email adresom već postoji.";
    } else {
        // Sve ok, kreiramo novog korisnika
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $default_role = 'client';

        $stmt = $conn->prepare("INSERT INTO users (ime_prezime, email, password, role) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $ime_prezime, $email, $hashed_password, $default_role);

        if ($stmt->execute()) {
            $success = "Uspešno ste registrovani. Možete se sada prijaviti.";
            $_SESSION['user_id'] = $stmt->insert_id;
            $_SESSION['role'] = $default_role;
            header("Location: /");
            exit();
        } else {
            $error = "Došlo je do greške prilikom registracije.";
        }
    }

    $stmt->close();
}
?>


<!DOCTYPE html>
<html lang="sr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <style>
    body {
        background-image: url("../assets/img/login1.jpg");
        background-position: center center;
        background-size: cover;
    }
    </style>

    <link rel="stylesheet" href="../assets/css/main.css">
</head>

<body class="d-flex justify-content-center align-items-center vh-100 scrolled">
    <header id="header" class="header d-flex align-items-center fixed-top">
        <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

            <a href="index.html" class="logo d-flex align-items-center">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <!-- <img src="assets/img/logo.png" alt=""> -->
                <h1 class="sitename">INTERBELL</h1> <span>.</span>
            </a>

            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="/">Početna</a></li>
                    <li><a href="/about">O nama</a></li>
                    <li><a href="/services">Prodavnica</a></li>
                    <!-- <li><a href="/projects">Projects</a></li> -->
                    <li><a href="/blog">Blog</a></li>
                    <!-- <li class="dropdown"><a href="#"><span>Dropdown</span> <i
                                class="bi bi-chevron-down toggle-dropdown"></i></a>
                        <ul>
                            <li><a href="#">Dropdown 1</a></li>
                            <li class="dropdown"><a href="#"><span>Deep Dropdown</span> <i
                                        class="bi bi-chevron-down toggle-dropdown"></i></a>
                                <ul>
                                    <li><a href="#">Deep Dropdown 1</a></li>
                                    <li><a href="#">Deep Dropdown 2</a></li>
                                    <li><a href="#">Deep Dropdown 3</a></li>
                                    <li><a href="#">Deep Dropdown 4</a></li>
                                    <li><a href="#">Deep Dropdown 5</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Dropdown 2</a></li>
                            <li><a href="#">Dropdown 3</a></li>
                            <li><a href="#">Dropdown 4</a></li>
                        </ul>
                    </li> -->
                    <li><a href="/contact">Kontakt</a></li>

                    <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
                    <li>
                        <a href="/admin_page">Admin panel</a>
                    </li>
                    <?php endif; ?>

                    <?php if (isset($_SESSION['user_id'])): ?>
                    <li>
                        <a href="/auth/logout.php">Logout</a>
                    </li>
                    <?php else: ?>
                    <li>
                        <a class="active" href="/auth/login.php">Login</a>
                    </li>
                    <?php endif; ?>
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>

        </div>
    </header>

    <div class="card shadow-lg w-100" style="max-width: 480px;">
        <div class="card-body">
            <div class="text-center">
                <h1 class="card-title h3">Registracija</h1>
            </div>

            <?php if (!empty($error)): ?>
            <div class="alert alert-danger text-center">
                <?php echo $error; ?>
            </div>
            <?php endif; ?>

            <div class="mt-2">
                <form action="" method="POST" class="needs-validation" novalidate>
                    <div class="mb-4">
                        <label for="ime_prezime" class="form-label text-muted">Ime i prezime</label>
                        <input type="text" class="form-control" id="ime_prezime" autocomplete="off" name="ime_prezime"
                            placeholder="Ime i prezime" required>
                        <div class="invalid-feedback">Unesite Vaše ime i prezime.</div>
                    </div>

                    <div class="mb-4">
                        <label for="email" class="form-label text-muted">Email adresa</label>
                        <input type="email" class="form-control" id="email" autocomplete="off" name="email"
                            placeholder="Email adresa" required>
                        <div class="invalid-feedback">Unesite Vaš email.</div>
                    </div>
                    <div class="mb-4">
                        <label for="password" class="form-label text-muted">Lozinka </label>
                        <input type="password" class="form-control" id="password" autocomplete="off" name="password"
                            placeholder="Lozinka" required>
                        <div class="invalid-feedback">Unesite Vašu lozinku.</div>
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-dark btn-lg">Registruj se</button>
                    </div>
                    <p class="text-center text-muted mt-4">Imate nalog?
                        <a href="./login.php" class="text-decoration-none">Prijavite se</a>.
                    </p>
                </form>
            </div>
        </div>
    </div>


    <script>
    // Bootstrap validacija
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