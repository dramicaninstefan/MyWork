<?php
require('config.php');
session_start();

$user_id = $_SESSION['user_id'] ?? null;
$broj_proizvoda = 0;

if ($user_id) {
    $stmt = $conn->prepare("SELECT SUM(kolicina) AS ukupno FROM korpa WHERE user_id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $broj_proizvoda = $row['ukupno'] ?? 0;
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>INTERBELL DOO</title>
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="assets/css/main.css" rel="stylesheet">

</head>

<body class="index-page">

    <header id="header" class="header d-flex flex-column align-items-center fixed-top">
        <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

            <a href="index.html" class="logo d-flex align-items-center">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <!-- <img src="assets/img/logo.png" alt=""> -->
                <h1 class="sitename">INTERBELL</h1> <span>.</span>
            </a>

            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="/" class="active">Početna</a></li>
                    <li><a href="/o-nama">O nama</a></li>
                    <li><a href="/prodavnica">Prodavnica</a></li>
                    <!-- <li><a href="/projects">Projects</a></li> -->
                    <li><a href="/blog">Blog</a></li>

                    <li><a href="/kontakt">Kontakt</a></li>

                    <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
                    <li>
                        <a href="/admin_page">Admin panel</a>
                    </li>
                    <?php endif; ?>

                    <?php if (!isset($_SESSION['user_id'])): ?>
                    <li>
                        <a href="/auth/login.php">Login</a>
                    </li>
                    <?php endif; ?>

                    <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
                    <li>
                        <a href="/auth/logout.php">Logout</a>
                    </li>
                    <?php endif; ?>

                    <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'client'): ?>
                    <li>
                        <a href="/korpa">
                            MOJA KORPA
                            <i style="font-size: 15px; padding-bottom: 5px;" class="bi bi-cart4"></i>
                            <span class="badge bg-danger rounded-pill"
                                style="font-size: 13px;"><?php echo $broj_proizvoda; ?></span>
                        </a>
                    </li>


                    <li class="dropdown">

                        <a>
                            <img src="../assets/img/user.png" alt="" class="img-fluid" style="width:30px">
                        </a>
                        <ul>
                            <li>
                                <a href="/moj-profil">Moj Profil</a>
                            </li>
                            <li>
                                <a href="/moje-porudzbine">Moj Porudžbine</a>
                            </li>
                            <li>
                                <a href="/auth/logout.php">Logout</a>
                            </li>
                        </ul>
                    </li>
                    <?php endif; ?>
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>

        </div>
        <!-- Alert za prikaz statusa -->
        <div class="container alert alert-success alert-dismissible fade show" id="statusAlert" role="alert"
            style="display: none;">
            <strong id="statusAlertTitle"></strong>
            <span id="statusAlertMessage"></span>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>


        <script>
        // Dohvati trenutni path (npr. "/about", "/services")
        const currentPath = window.location.pathname;

        // Selektuj sve navigacione linkove
        const navLinks = document.querySelectorAll('#navmenu ul li a');

        navLinks.forEach(link => {
            // Uporedi href atribut sa trenutnim path-om
            if (link.getAttribute('href') === currentPath) {
                // Ukloni prethodnu "active" klasu (ako postoji)
                navLinks.forEach(l => l.classList.remove('active'));
                // Dodaj "active" klasu na odgovarajući link
                link.classList.add('active');
            }

        });

        const statusAlert = document.getElementById('statusAlert');
        const statusAlertTitle = document.getElementById('statusAlertTitle');
        const statusAlertMessage = document.getElementById('statusAlertMessage');

        const status = sessionStorage.getItem("status");
        const message = sessionStorage.getItem("message");

        if (status === "success") {
            statusAlertTitle.textContent = 'Uspešno!';
            statusAlertMessage.textContent = message;
            statusAlert.classList.add('alert-success');
            statusAlert.style.display = 'block';
        }
        if (status === "info") {
            statusAlertTitle.textContent = 'Info!';
            statusAlertMessage.textContent = message;
            statusAlert.classList.add('alert-info');
            statusAlert.style.display = 'block';
        } else if (status === "error") {
            statusAlertTitle.textContent = 'Greška!';
            statusAlertMessage.textContent = message;
            statusAlert.classList.add('alert-danger');
            statusAlert.style.display = 'block';
        }

        // Sakrij alert posle 5 sekundi
        setTimeout(() => {
            if (statusAlert.style.display === 'block') {
                statusAlert.style.display = 'none';
            }
            sessionStorage.removeItem("status");
            sessionStorage.removeItem("message");
        }, 3000); // 5000 ms = 5 sekundi
        </script>
    </header>