<?php
session_start();


// Proverite da li je korisnik prijavljen
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php'); // Ako nije prijavljen, preusmerite ga na login
    exit;
}

$user_id = $_SESSION['user_id'];  // ID korisnika iz sesije

// Povezivanje sa bazom podataka (koristite vašu konekciju sa bazom)
$mysqli = new mysqli("localhost", "root", "", "interbell"); // Zamenite sa stvarnim podacima

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// SQL upit za preuzimanje podataka korisnika
$sql = "SELECT k.*, p.*
        FROM korpa k 
        JOIN proizvodi p ON k.proizvod_id = p.id 
        WHERE k.user_id = $user_id";

$result = $conn->query($sql);

?>

<!-- Page Title -->
<div class="page-title dark-background" style="background-image: url(assets/img/page-title-bg.jpg);">
    <div class="container position-relative">
        <h1>Zavrsi kupovinu</h1>
        <nav class="breadcrumbs">
            <ol>
                <li><a href="/">Home</a></li>
                <li class="current">Zavrsi kupovinu</li>
            </ol>
        </nav>
    </div>
</div><!-- End Page Title -->

<div class="container mt-5">
    <form action="../core/zavrsi-porudzbinu.php" method="POST" class="row">



        <div class="col-xl-8">

            <div class="card">
                <div class="card-body">
                    <ol class="activity-checkout mb-0 px-4 mt-3">
                        <li class="checkout-item">
                            <div class="avatar checkout-icon p-1">
                                <div class="avatar-title rounded-circle bg-primary">
                                    <i class="bi bi-receipt-cutoff"></i>
                                </div>
                            </div>
                            <div class="feed-item-list">
                                <div>
                                    <h5 class="font-size-16 mb-1">Detalji kupovine</h5>
                                    <p class="text-muted text-truncate mb-4">Unesite Vaše podatke</p>
                                    <div class="mb-3">
                                        <div id="form1">
                                            <div>
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="mb-3">
                                                            <label class="form-label" for="billing-name">Ime i
                                                                Prezime</label>
                                                            <input type="text" class="form-control" id="billing-name"
                                                                name="billing-name" placeholder="Unesite ime">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="mb-3">
                                                            <label class="form-label" for="billing-email-address">Email
                                                                Adresa</label>
                                                            <input type="email" class="form-control"
                                                                id="billing-email-address" name="billing-email-address"
                                                                placeholder="Unesite email">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="mb-3">
                                                            <label class="form-label"
                                                                for="billing-phone">Telefon</label>
                                                            <input type="text" class="form-control" id="billing-phone"
                                                                name="billing-phone"
                                                                placeholder="Unesite broj telefona">
                                                        </div>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label class="form-label" for="billing-address">Adresa</label>
                                                        <input type="text" class="form-control" id="billing-address"
                                                            name="billing-address" placeholder="Unesite adresu">
                                                    </div>

                                                    <div class="col-lg-4">
                                                        <div class="mb-4 mb-lg-0">
                                                            <label class="form-label"
                                                                for="billing-country">Država</label>
                                                            <input type="text" class="form-control" id="billing-country"
                                                                name="billing-country" placeholder="Unesite državu">
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-4">
                                                        <div class="mb-4 mb-lg-0">
                                                            <label class="form-label" for="billing-city">Grad</label>
                                                            <input type="text" class="form-control" id="billing-city"
                                                                name="billing-city" placeholder="Unesite grad">
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-4">
                                                        <div class="mb-0">
                                                            <label class="form-label" for="zip-code">Poštanski
                                                                broj</label>
                                                            <input type="text" class="form-control" id="zip-code"
                                                                name="zip-code" placeholder="Unesite poštanski broj">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>

                        <li class="checkout-item">
                            <div class="avatar checkout-icon p-1">
                                <div class="avatar-title rounded-circle bg-primary">
                                    <i class="bi bi-truck"></i>
                                </div>
                            </div>
                            <div class="feed-item-list">
                                <div>
                                    <h5 class="font-size-16 mb-1">Detalji kupovine</h5>
                                    <p class="text-muted text-truncate mb-4">Unesite Vaše podatke</p>
                                    <div class="mb-3">
                                        <button type="button" id="toggle-form" class="btn btn-primary mb-4"> Adresa za
                                            dostavu je
                                            ista
                                        </button>

                                        <div id="form2" style="display: block;">
                                            <div>
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="mb-3">
                                                            <label class="form-label" for="delivery-name">Ime i
                                                                Prezime</label>
                                                            <input type="text" class="form-control" id="delivery-name"
                                                                name="delivery-name" placeholder="Unesite ime">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="mb-3">
                                                            <label class="form-label" for="delivery-email-address">Email
                                                                Adresa</label>
                                                            <input type="email" class="form-control"
                                                                id="delivery-email-address"
                                                                name="delivery-email-address"
                                                                placeholder="Unesite email">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="mb-3">
                                                            <label class="form-label"
                                                                for="delivery-phone">Telefon</label>
                                                            <input type="text" class="form-control" id="delivery-phone"
                                                                name="delivery-phone"
                                                                placeholder="Unesite broj telefona">
                                                        </div>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label class="form-label" for="delivery-address">Adresa</label>
                                                        <input type="text" class="form-control" id="delivery-address"
                                                            name="delivery-address" placeholder="Unesite adresu">
                                                    </div>

                                                    <div class="col-lg-4">
                                                        <div class="mb-4 mb-lg-0">
                                                            <label class="form-label"
                                                                for="delivery-country">Država</label>
                                                            <input type="text" class="form-control"
                                                                id="delivery-country" name="delivery-country"
                                                                placeholder="Unesite državu">
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-4">
                                                        <div class="mb-4 mb-lg-0">
                                                            <label class="form-label" for="delivery-city">Grad</label>
                                                            <input type="text" class="form-control" id="delivery-city"
                                                                name="delivery-city" placeholder="Unesite grad">
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-4">
                                                        <div class="mb-0">
                                                            <label class="form-label" for="delivery-zip-code">Poštanski
                                                                broj</label>
                                                            <input type="text" class="form-control"
                                                                id="delivery-zip-code" name="delivery-zip-code"
                                                                placeholder="Unesite poštanski broj">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <script>
                                document.getElementById('toggle-form').addEventListener('click', function() {
                                    var form2 = document.getElementById('form2');

                                    // Ako je forma sakrivena, prikaži je
                                    if (form2.style.display === 'none' || form2.style.display === '') {
                                        form2.style.display = 'block'; // Prikazivanje forme
                                    } else {
                                        form2.style.display = 'none'; // Sakrivanje forme
                                    }
                                });
                                </script>

                        </li>

                        <li class="checkout-item">
                            <div class="avatar checkout-icon p-1">
                                <div class="avatar-title rounded-circle bg-primary">
                                    <i class="bi bi-credit-card"></i>
                                </div>
                            </div>
                            <div class="feed-item-list">
                                <div>
                                    <h5 class="font-size-16 mb-1">Plaćanje</h5>
                                    <p class="text-muted text-truncate mb-4">Odaberite način plaćanja</p>
                                </div>
                                <div>
                                    <h5 class="font-size-14 mb-3">Način plaćanja:</h5>
                                    <div class="row">
                                        <div class="col-lg-3 col-sm-6">
                                            <div>
                                                <label class="card-radio-label">
                                                    <input type="radio" name="pay-method" id="pay-methodoption1"
                                                        class="card-radio-input" checked="">

                                                    <span class="card-radio py-3 text-center text-truncate">
                                                        <i class="bi bi-cash d-block h2 mb-3"></i>
                                                        <span>Pouzećem</span>
                                                    </span>
                                                </label>
                                            </div>
                                        </div>

                                        <div class="col-lg-3 col-sm-6">
                                            <div>
                                                <label class="card-radio-label">
                                                    <input type="radio" name="pay-method" id="pay-methodoption2"
                                                        class="card-radio-input" disabled>
                                                    <span class="card-radio py-3 text-center text-truncate">
                                                        <i class="bi bi-paypal d-block h2 mb-3"></i>
                                                        PayPal (uskoro)
                                                    </span>
                                                </label>
                                            </div>
                                        </div>

                                        <div class="col-lg-3 col-sm-6">
                                            <div>
                                                <label class="card-radio-label">
                                                    <input type="radio" name="pay-method" id="pay-methodoption3"
                                                        class="card-radio-input" disabled>
                                                    <span class="card-radio py-3 text-center text-truncate">
                                                        <i class="bi bi-credit-card d-block h2 mb-3"></i>
                                                        Kartica (uskoro)
                                                    </span>
                                                </label>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </li>
                    </ol>
                </div>
            </div>

            <div class="row my-4">
                <div class="col">
                    <a href="/korpa" class="btn btn-outline-dark"><i class="bi bi-arrow-left me-2"></i>Nazad u korpu</a>
                </div> <!-- end col -->
                <div class="col">
                    <div class="text-end mt-2 mt-sm-0">
                        <button class="btn btn-success" type="submit">Poruči</button>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row-->

        </div>
        <div class="col-xl-4">
            <div class="card checkout-order-summary">
                <div class="card-body">
                    <div class="p-3 bg-light mb-3">
                        <?php
                        // Generiši jedinstveni broj za svaki red
                        $unique_id = 'N' . strtoupper(uniqid()); // Dodaj prefiks "N" i koristi funkciju uniqid() za jedinstven ID
                        ?>

                        <h5 class="font-size-16 mb-0">Detalji kupovine <span
                                class="float-end ms-2"><?php echo $unique_id; ?></span></h5>

                        <!-- Dodavanje hidden inputa -->
                        <input type="hidden" name="unique_id" value="<?php echo $unique_id; ?>">
                    </div>

                    <div class="table-responsive">
                        <table class="table table-centered mb-0 table-nowrap">
                            <thead>
                                <tr>
                                    <th class="border-top-0" style="width: 110px;" scope="col"></th>
                                    <th class="border-top-0" scope="col"></th>
                                    <th class="border-top-0" scope="col"></th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                $total = 0;
                                $row_number = 0; // Inicijalizacija brojača
                                
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()){
                                        $ukupna_cena = $row['cena'] * $row['kolicina'];
                                        $total += $ukupna_cena;
                                        
                                        $row_number++; // Povećavamo brojač za svaki red
                                        ?>
                                <tr>
                                    <th scope="row">
                                        <?php
                                        if ($row['slika']) {
                                            $imageData = base64_encode($row['slika']);
                                            $imageType = $row['ekstenzija']; // Ekstenzija slike
                                            echo '<img src="data:image/' . $imageType . ';base64,' . $imageData . '"
                                                class="img-fluid rounded" alt="Product">';
                                            } else {
                                            // Ako nema slike, koristi default sliku
                                            echo '<img src="../assets/img/no_image_available.jpg" class="img-fluid rounded"
                                                alt="Product">';
                                            }
                                        ?>
                                    </th>
                                    <td>
                                        <h5 class="font-size-16 text-truncate">
                                            <!-- ID proizvoda -->
                                            <input type="hidden" name="products[<?php echo $row_number?>][id]"
                                                value="<?php echo $row['id']?>">
                                            <!-- cena proizvoda -->
                                            <input type="hidden" name="products[<?php echo $row_number?>][cena]"
                                                value="<?php echo $row['cena']?>">
                                            <!-- kolicina proizvoda -->
                                            <input type="hidden" name="products[<?php echo $row_number?>][kolicina]"
                                                value="<?php echo $row['kolicina']?>">
                                            <!-- naslov proizvoda -->
                                            <input type="hidden" name="products[<?php echo $row_number?>][naslov]"
                                                value="<?php echo $row['naslov']?>">
                                            <a href="#" class="text-dark"><?php echo $row['naslov']?></a>
                                        </h5>
                                        <p class="text-muted mb-0 mt-1">
                                            <?php echo number_format($row['cena'], 2, ',', '.') . ' x ' . $row['kolicina']?>
                                        </p>
                                    </td>
                                    <td style="text-align: right;">
                                        <?php echo number_format($row['cena'] * $row['kolicina'], 2, ',', '.') . ' RSD'; ?>
                                    </td>

                                </tr>
                                <?php
                                      }
                                    } else {
                                        echo "Nema proizvoda u korpi.";
                                    }
                                ?>
                                <tr>
                                    <td colspan="1">
                                        <h5 class="font-size-14 m-0">Ukupno:</h5>
                                    </td>
                                    <td colspan="2" style="text-align: right;">
                                        <?= number_format($total, 2, ',', '.') ?> RSD
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="1">
                                        <h5 class="font-size-14 m-0">Dostava:</h5>
                                    </td>
                                    <td colspan="2" style="text-align: right;">
                                        500.00 RSD
                                    </td>
                                </tr>

                                <tr class="bg-light">
                                    <td colspan="2">
                                        <h5 class="font-size-14 m-0">Ukupno za naplatu:</h5>
                                    </td>
                                    <td style="text-align: right;">
                                        <?= number_format($total + 500.00, 2, ',', '.') ?> RSD
                                        <!-- Dodavanje hidden inputa -->
                                        <input type="hidden" name="total_amount" value="<?= $total + 500.00 ?>">
                                    </td>
                                </tr>

                            </tbody>

                        </table>

                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- end row -->

</div>

<?php
$stmt->close();
$mysqli->close();
?>