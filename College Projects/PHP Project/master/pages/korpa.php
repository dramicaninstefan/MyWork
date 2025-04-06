<?php
session_start();
require('config.php');

$user_id = $_SESSION['user_id'] ?? 0;

if (!$user_id) {
    echo "Morate biti ulogovani da biste videli korpu.";
    exit;
}

// Ažuriranje količine
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $proizvod_id = $_POST['proizvod_id'];
    $akcija = $_POST['akcija'];

    if ($akcija == 'povecaj') {
        $conn->query("UPDATE korpa SET kolicina = kolicina + 1 WHERE user_id = $user_id AND proizvod_id = $proizvod_id");
    } elseif ($akcija == 'smanji') {
        $conn->query("UPDATE korpa SET kolicina = GREATEST(kolicina - 1, 1) WHERE user_id = $user_id AND proizvod_id = $proizvod_id");
    } elseif ($akcija == 'obrisi') {
        $conn->query("DELETE FROM korpa WHERE user_id = $user_id AND proizvod_id = $proizvod_id");
    }
}

// Prikaz korpe
$sql = "SELECT k.*, p.*
        FROM korpa k 
        JOIN proizvodi p ON k.proizvod_id = p.id 
        WHERE k.user_id = $user_id";

$result = $conn->query($sql);
?>

<!-- Page Title -->
<div class="page-title dark-background" style="background-image: url(assets/img/page-title-bg.jpg);">
    <div class="container position-relative">
        <h1>Moja korpa</h1>
        <nav class="breadcrumbs">
            <ol>
                <li><a href="/">Home</a></li>
                <li class="current">Moja korpa</li>
            </ol>
        </nav>
    </div>
</div><!-- End Page Title -->

<div class="container mt-5">


    <div class="row">
        <div class="col-md-8">
            <div class="card mb-4">
                <?php
                $total = 0;

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $ukupna_cena = $row['cena'] * $row['kolicina'];
                        $total += $ukupna_cena;
                        ?>

                <div class="card-body">
                    <div class="row cart-item mb-3">
                        <div class="col-md-3">
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

                        </div>
                        <div class="col-md-5">
                            <h5 class="card-title"><?= $row['naslov'] ?></h5>
                            <p class="text-muted">Kategorija: <?= $row['kategorija'] ?></p>
                        </div>
                        <div class="col-md-2">
                            <form method="post" class="input-group">
                                <input type="hidden" name="proizvod_id" value="<?= $row['proizvod_id'] ?>">
                                <button class="btn btn-outline-secondary btn-sm" name="akcija" value="smanji">-</button>
                                <input style="max-width:100px" type="text"
                                    class="form-control form-control-sm text-center quantity-input"
                                    value="<?php echo $row['kolicina']?>" readonly>
                                <button class="btn btn-outline-secondary btn-sm" name="akcija"
                                    value="povecaj">+</button>
                            </form>
                        </div>
                        <div class="col-md-2 text-end">
                            <p class="fw-bold"><?= number_format($row['cena'], 2, ',', '.') ?> RSD</p>
                            <form method="post">
                                <input type="hidden" name="proizvod_id" value="<?= $row['proizvod_id'] ?>">
                                <button class="btn btn-sm btn-outline-danger" name="akcija" value="obrisi">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                    <hr>
                </div>
                <?php
                    }
                    
                } else {
                    echo '<div class="card-body">
                            <div class="row cart-item mb-3">
                                <div class="col-12">
                                Vaša korpa je prazna!
                                </div>
                            </div>
                        </div>';
                }
                ?>
            </div>
        </div>

        <div class="col-lg-4">
            <!-- Cart Summary -->
            <div class="card cart-summary">
                <div class="card-body">
                    <h5 class="card-title mb-4">Pregled korpe</h5>
                    <div class="d-flex justify-content-between mb-3">
                        <span>Ukupno</span>
                        <span><?= number_format($total, 2, ',', '.') ?> RSD</span>
                    </div>
                    <div class="d-flex justify-content-between mb-3">
                        <span>Dostava</span>
                        <span>500.00 RSD</span>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between mb-4">
                        <strong>Total</strong>
                        <strong><?= number_format($total + '500.00', 2, ',', '.') ?> RSD</strong>
                    </div>
                    <?php echo $result->num_rows > 0 ? '<a href="/detalji-kupovine" class="btn btn-success w-100">Završi porudžbinu</a>' : ''; ?>
                </div>
            </div>
            <!-- Promo Code -->
            <!-- <div class="card mt-4">
                <div class="card-body">
                    <h5 class="card-title mb-3">Apply Promo Code</h5>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Enter promo code">
                        <button class="btn btn-outline-secondary" type="button">Apply</button>
                    </div>
                </div>
            </div> -->
        </div>

    </div>
    <div class="text-start my-5">
        <a href="/prodavnica" class="btn btn-outline-dark"><i class="bi bi-arrow-left me-2"></i>Nastavi kupovinu</a>
    </div>
</div>



<?php
$conn->close();
?>