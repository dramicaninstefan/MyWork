<?php
session_start();
// Povezivanje sa bazom (pretpostavljamo da je $conn već definisana veza s bazom)
include '../config.php';  // Učitaj konekciju sa bazom

$user_id = $_SESSION['user_id'];  // ID korisnika iz sesije

// Prvo unosimo podatke u tabelu porudzbine
$billing_name = isset($_POST['billing-name']) ? $_POST['billing-name'] : '';
$billing_email = isset($_POST['billing-email-address']) ? $_POST['billing-email-address'] : '';
$billing_phone = isset($_POST['billing-phone']) ? $_POST['billing-phone'] : '';
$billing_address = isset($_POST['billing-address']) ? $_POST['billing-address'] : '';
$billing_country = isset($_POST['billing-country']) ? $_POST['billing-country'] : '';
$billing_city = isset($_POST['billing-city']) ? $_POST['billing-city'] : '';
$zip_code = isset($_POST['zip-code']) ? $_POST['zip-code'] : '';

$delivery_name = isset($_POST['delivery-name']) ? $_POST['delivery-name'] : '';
$delivery_email = isset($_POST['delivery-email-address']) ? $_POST['delivery-email-address'] : '';
$delivery_phone = isset($_POST['delivery-phone']) ? $_POST['delivery-phone'] : '';
$delivery_address = isset($_POST['delivery-address']) ? $_POST['delivery-address'] : '';
$delivery_country = isset($_POST['delivery-country']) ? $_POST['delivery-country'] : '';
$delivery_city = isset($_POST['delivery-city']) ? $_POST['delivery-city'] : '';
$delivery_zip_code = isset($_POST['delivery-zip-code']) ? $_POST['delivery-zip-code'] : '';

$unique_id = $_POST['unique_id'];  // Jedinstveni ID broj porudzbine
$total_amount = $_POST['total_amount'];  // Ukupna suma porudzbine

// Unos u tabelu porudzbine
$sql = "INSERT INTO porudzbine (billing_name, billing_email, billing_phone, billing_address, billing_country, billing_city, zip_code,
                                delivery_name, delivery_email, delivery_phone, delivery_address, delivery_country, delivery_city, delivery_zip_code, 
                                unique_id, total_amount, user_id) 
        VALUES ('$billing_name', '$billing_email', '$billing_phone', '$billing_address', '$billing_country', '$billing_city', '$zip_code',
                '$delivery_name', '$delivery_email', '$delivery_phone', '$delivery_address', '$delivery_country', '$delivery_city', '$delivery_zip_code',
                '$unique_id', '$total_amount', '$user_id')";

if ($conn->query($sql) === TRUE) {
    $last_id = $conn->insert_id;  // ID poslednje unesene porudzbine (tako dobijamo ID za povezivanje sa porudzbina_proizvodi)
    echo "Porudžbina uspešno unesena. ID porudžbine: " . $last_id;

    // Sada unosimo proizvode u porudzbinu u tabelu porudzbine_proizvodi
    foreach ($_POST['products'] as $product) {
        $proizvod_id = $product['id'];
        $naslov = $product['naslov'];
        $kolicina = $product['kolicina'];
        $cena = $product['cena'];
        $ukupno = $kolicina * $cena;

        // SQL upit za unos proizvoda u porudzbinu
        $sql_proizvod = "INSERT INTO porudzbine_proizvodi (porudzbina_id, proizvod_id, kolicina, cena, ukupno) 
                         VALUES ('$last_id', '$proizvod_id', '$kolicina', '$cena', '$ukupno')";

        if ($conn->query($sql_proizvod) !== TRUE) {
            echo "Greška pri unosu proizvoda u porudžbinu: " . $conn->error;
        } else {
            echo "Proizvod sa ID: $proizvod_id uspešno dodat u porudžbinu.";
        }
    }

    // Brisanje stavki iz tabele korpe za korisnika
    $sql_delete_cart = "DELETE FROM korpa WHERE user_id = ?";
    
    if ($stmt = $conn->prepare($sql_delete_cart)) {
        $stmt->bind_param("i", $user_id); // "i" označava integer tip za user_id
        if ($stmt->execute()) {
            echo "Stavke iz korpe su obrisane.";
        } else {
            echo "Greška pri brisanju stavki iz korpe: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Greška pri pripremi SQL upita: " . $conn->error;
    }

    // Redirektovanje na stranicu hvala-vam
    header("Location: /hvala-vam");
    exit();
} else {
    echo "Greška pri unosu porudžbine: " . $conn->error;
}

// Zatvaranje konekcije
$conn->close();
?>