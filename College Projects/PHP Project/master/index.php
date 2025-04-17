<?php
session_start();


// Ako korisnik nije prijavljen, preusmeravamo ga na login stranicu
// if (!isset($_SESSION['user_id'])) {
//     header("Location: ./auth/login.php");
//     exit();
// }

// Uzimamo putanju iz URL-a
$page = trim($_SERVER['REQUEST_URI'], '/');

// Definišemo stranice bez header i footer
$no_layout_pages = ['hvala-vam']; 

// Definišemo dostupne stranice
$allowed_pages = ['klijenti', 'o-nama', 'prodavnica', 'detalji-proizvod', 'korpa', 'detalji-kupovine', 'kontakt', 'moj-profil', 'moje-porudzbine', 'hvala-vam'];

// Definišemo stranice koje zahtevaju prijavu
$protected_pages = ['admin_panel'];

// Učitavamo header (zajednički deo stranica)
if (!in_array($page, $no_layout_pages)) {
    require 'layout/header.php';
}


// Ako je početna stranica
if ($page == '' || $page == 'index.php') {
    require 'pages/home.php';
} 
// Ako stranica postoji i zahteva login
elseif (in_array($page, $allowed_pages)) {
    if (in_array($page, $protected_pages) && !isset($_SESSION['user_id'])) {
        echo "<div class='container mt-5'><div class='alert alert-warning'>Pristup ovoj stranici zahteva prijavu.</div></div>";
    } else {
        require "./pages/$page.php";
    }
} 
// Ako stranica ne postoji
else {
    require "./pages/404.php";
}

// Učitavamo footer (zajednički deo stranica)
if (!in_array($page, $no_layout_pages)) {
    require 'layout/footer.php';
}
?>