<?php
session_start();

// Ako korisnik nije prijavljen, preusmeravamo ga na login stranicu
if (!isset($_SESSION['user_id'])) {
    header("Location: ./auth/login.php");
    exit();
}

// Uzimamo putanju iz URL-a
$page = trim($_SERVER['REQUEST_URI'], '/');

// Definišemo dostupne stranice
$allowed_pages = ['klijenti', 'stete', 'skadencar_unos', 'skadencar_obnove', 'skadencar_placanja', 'uredi_stetu',  'kalkulacija_stete', 'odstetni_zahtev_m', 'odstetni_zahtev_nm', 'sluzbena_beleska', 'potvrdi'];

// Učitavamo header (zajednički deo stranica)
require 'layout/header.php';

// Ako je korisnik otišao na početnu stranicu, učitavamo home.php
if ($page == '' || $page == 'index.php') {
    require 'pages/stete.php';
} 
// Ako stranica postoji u listi dozvoljenih, učitavamo je
elseif (in_array($page, $allowed_pages)) {
    require "./pages/$page.php";
} 
// Ako stranica ne postoji, prikazujemo 404
else {
    require "./pages/404.php";
}

// Učitavamo footer (zajednički deo stranica)
require 'layout/footer.php';
?>