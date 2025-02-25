<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "osiguranje";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Konekcija neuspešna: " . $conn->connect_error);
}
?>