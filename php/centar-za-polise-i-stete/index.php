<?php
// Uzimamo putanju iz URL-a
$page = trim($_SERVER['REQUEST_URI'], '/');

// Definišemo dostupne stranice
$allowed_pages = ['klijenti', 'stete', 'skadencar_unos', 'skadencar_obnove', 'skadencar_placanja', 'uredi_stetu',  'kalkulacija_stete', 'odstetni_zahtev_m', 'odstetni_zahtev_nm', 'sluzbena_beleska', 'potvrdi'];

// Ako je korisnik otišao na početnu stranicu, učitavamo home.php
if ($page == '' || $page == 'index.php') {
    require 'pages/home.php';
} 
// Ako stranica postoji u listi dozvoljenih, učitavamo je
elseif (in_array($page, $allowed_pages)) {
    require "./pages/$page.php";
} 
// Ako stranica ne postoji, prikazujemo 404
else {
    require "./pages/404.php";
}

?>