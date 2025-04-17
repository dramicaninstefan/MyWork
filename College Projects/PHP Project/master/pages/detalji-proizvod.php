<?php
// detalji-proizvod.php

// Provera da li je POST-ovan ID proizvoda
if (!isset($_POST['proizvod_id'])) {
    header("Location: /"); // ili možeš prikazati poruku
    exit();
}

$proizvod_id = (int) $_POST['proizvod_id'];

// Konekcija sa bazom (prilagodi po tvom setupu)
$mysqli = new mysqli("localhost", "root", "", "interbell");

if ($mysqli->connect_error) {
    die("Greška prilikom konekcije: " . $mysqli->connect_error);
}

// Priprema i izvršavanje upita
$stmt = $mysqli->prepare("SELECT * FROM proizvodi WHERE id = ?");
$stmt->bind_param("i", $proizvod_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    echo "Proizvod nije pronađen.";
    exit();
}

$proizvod = $result->fetch_assoc();

// Priprema i izvršavanje upita
$stmt = $mysqli->prepare("SELECT AVG(ocena) AS avg_ocena
                 FROM proizvod_recenzije
                 WHERE proizvod_id = ?");
$stmt->bind_param("i", $proizvod_id);
$stmt->execute();
$resultAvgOcena = $stmt->get_result();

if ($resultAvgOcena->num_rows === 0) {
    echo "Proizvod nije pronađen.";
    exit();
}

$avg_ocena = $resultAvgOcena->fetch_assoc();

$reviewsQuery = "SELECT r.*, u.ime_prezime, u.email 
                FROM proizvod_recenzije r 
                JOIN users u ON r.user_id = u.id 
                WHERE r.proizvod_id = $proizvod_id 
                ORDER BY r.datum DESC LIMIT 3";

$resultReviews = $conn->query($reviewsQuery);


// Pretpostavljamo da tabela proizvodi ima kolone: naziv, opis, cena, slika1, slika2, sku, stara_cena
?>

<!-- HTML prikaz stranice -->
<div class="page-title dark-background" style="background-image: url(assets/img/page-title-bg.jpg);">
    <div class="container position-relative">
        <h1>Detalji proizvoda</h1>
        <nav class="breadcrumbs">
            <ol>
                <li><a href="/">Početna</a></li>
                <li class="current">Detalji proizvoda</li>
            </ol>
        </nav>
    </div>
</div>

<div class="container mt-5" style="min-height: 800px">
    <div class="row">
        <!-- Slike proizvoda -->
        <div class="col-md-6 mb-4">
            <?php
                // Glavna slika
                if ($proizvod['slika']) {
                    $imageData = base64_encode($proizvod['slika']);
                    $imageType = $proizvod['ekstenzija']; 
                    echo '<img id="mainImage" src="data:image/' . $imageType . ';base64,' . $imageData . '" class="img-fluid rounded mb-3 product-image" alt="Product">';
                } else {
                    echo '<img id="mainImage" src="../assets/img/no_image_available.jpg" class="img-fluid rounded mb-3 product-image" alt="Product">';
                }
                ?>

            <div class="d-flex">
                <?php
                // Mini slike
                if ($proizvod['slika']) {
                    $imageData = base64_encode($proizvod['slika']);
                    $imageType = $proizvod['ekstenzija']; 
                    echo '<img src="data:image/' . $imageType . ';base64,' . $imageData . '" class="thumbnail rounded me-3 active" alt="Product" onclick="changeMainImage(this)">';
                } else {
                    echo '<img src="../assets/img/no_image_available.jpg" class="thumbnail rounded me-3" alt="Product" onclick="changeMainImage(this)">';
                }   

                if ($proizvod['slika1']) {
                    $imageData = base64_encode($proizvod['slika1']);
                    $imageType = $proizvod['ekstenzija1']; 
                    echo '<img src="data:image/' . $imageType . ';base64,' . $imageData . '" class="thumbnail rounded me-3" alt="Product" onclick="changeMainImage(this)">';
                } else {
                    echo '<img src="../assets/img/no_image_available.jpg" class="thumbnail rounded me-3" alt="Product" onclick="changeMainImage(this)">';
                }

                if ($proizvod['slika2']) {
                    $imageData = base64_encode($proizvod['slika2']);
                    $imageType = $proizvod['ekstenzija2']; 
                    echo '<img src="data:image/' . $imageType . ';base64,' . $imageData . '" class="thumbnail rounded me-3" alt="Product" onclick="changeMainImage(this)">';
                } else {
                    echo '<img src="../assets/img/no_image_available.jpg" class="thumbnail rounded me-3" alt="Product" onclick="changeMainImage(this)">';
                }
                ?>
            </div>
        </div>


        <script>
        function changeMainImage(thumbnail) {
            // Pronađi glavnu sliku
            var mainImage = document.getElementById("mainImage");

            // Postavi src glavne slike na src kliknute mini slike
            mainImage.src = thumbnail.src;

            // Ukloni "active" klasu sa svih thumbnail slika
            var thumbnails = document.querySelectorAll('.thumbnail');
            thumbnails.forEach(function(thumb) {
                thumb.classList.remove('active');
            });

            // Dodaj "active" klasu kliknutoj slici
            thumbnail.classList.add('active');
        }
        </script>

        <!-- Detalji proizvoda -->
        <div class="col-md-6">
            <h2 class="mb-1"><?= htmlspecialchars($proizvod['naslov']) ?></h2>
            <p class="text-muted mb-4">ŠIFRA PROIZVODA: <?= htmlspecialchars($proizvod['sifra_proizvoda']) ?></p>
            <div class="mb-3">
                <span class="h4 me-2"><?= number_format($proizvod['cena'], 2) ?> RSD</span>
                <?php if (!empty($proizvod['stara_cena'])): ?>
                <span class="text-muted"><s><?= number_format($proizvod['stara_cena'], 2) ?> RSD</s></span>
                <?php endif; ?>
            </div>

            <div class="mb-3">
                <?php
                $rating = $avg_ocena['avg_ocena']; // Uzmi ocenu iz baze, može biti decimalna (npr. 4.5)
                $fullStars = floor($rating); // Broj punih zvezda
                $halfStar = ($rating - $fullStars) >= 0.5 ? 1 : 0; // Da li je ostatak 0.5 ili više (dodeliti polovnu zvezdu)

                for ($i = 0; $i < 5; $i++) {
                    if ($i < $fullStars) {
                        echo '<i class="fas fa-star text-warning"></i>'; // Puna zvezda
                    } elseif ($i == $fullStars && $halfStar) {
                        echo '<i class="fas fa-star-half-alt text-warning"></i>'; // Polovina zvezde
                    } else {
                        echo '<i class="fas fa-star text-muted"></i>'; // Prazna zvezda
                    }
                }

                echo '
                <small class="text-muted">(' . number_format($avg_ocena['avg_ocena'], 2) . '/5)</small>
            </div>';
                ?>

                <p class="mb-4">
                    Opis prizvoda:
                    <br>
                    <?= nl2br(htmlspecialchars($proizvod['opis'])) ?>
                </p>

                <div class="mb-5">
                    <h5>Karakteristike:</h5>
                    <ul>
                        <?php
                            // Prikaz osnovnih karakteristika iz polja 'karakteristike' ako je uneta kao tekst sa više linija
                            if (!empty($proizvod['karakteristike'])) {
                                $karakteristike = explode("\n", $proizvod['karakteristike']);
                                foreach ($karakteristike as $karakteristika) {
                                    echo "<li>" . htmlspecialchars(trim($karakteristika)) . "</li>";
                                }
                            }

                            // Dodatne karakteristike iz ostalih kolona
                            for ($i = 1; $i <= 5; $i++) {
                                $key = 'karakteristika' . $i;
                                if (!empty($proizvod[$key])) {
                                    echo "<li>" . htmlspecialchars($proizvod[$key]) . "</li>";
                                }
                            }
                            ?>
                    </ul>
                </div>


                <form method="POST" action="../core/dodaj_u_korpu.php">
                    <div class="mb-4">
                        <label for="quantity" class="form-label">Količina:</label>
                        <input type="number" class="form-control" id="quantity" name="quantity" value="1" min="1"
                            style="width: 80px;">
                    </div>
                    <input type="hidden" name="proizvod_id" value="<?= $proizvod['id'] ?>">
                    <button class="btn btn-primary btn-lg mb-3 me-2">
                        <i class="bi bi-cart-plus"></i> Dodaj u korpu
                    </button>
                </form>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="col-md-12">
            <div class="offer-dedicated-body-left">
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade active show" id="pills-reviews" role="tabpanel"
                        aria-labelledby="pills-reviews-tab">
                        <div id="ratings-and-reviews"
                            class="bg-white rounded shadow-sm p-4 mb-4 clearfix restaurant-detailed-star-rating">
                            <span class="star-rating float-right">
                                <a href="#"><i class="icofont-ui-rating icofont-2x active"></i></a>
                                <a href="#"><i class="icofont-ui-rating icofont-2x active"></i></a>
                                <a href="#"><i class="icofont-ui-rating icofont-2x active"></i></a>
                                <a href="#"><i class="icofont-ui-rating icofont-2x active"></i></a>
                                <a href="#"><i class="icofont-ui-rating icofont-2x"></i></a>
                            </span>
                        </div>
                        <div class="bg-white rounded shadow-sm p-4 mb-4 restaurant-detailed-ratings-and-reviews">
                            <h5 class="mb-1">RECENZIJE</h5>
                            <?php if ($resultReviews->num_rows > 0): ?>
                            <?php while ($row = $resultReviews->fetch_assoc()) { ?>
                            <div class="reviews-members pt-4 pb-4">
                                <div class="media">
                                    <div class="media-body">
                                        <div class="reviews-members-header">
                                            <h6 class="mb-1"><a class="text-black"
                                                    href="#"><?php echo $row['ime_prezime']?></a></h6>
                                            <p class="text-gray">
                                                <?php echo date("D, d M Y", strtotime($row['datum']));?>
                                            </p>
                                            <div class="mb-3">
                                                <?php
                                                $rating = $row['ocena']; // Uzmi ocenu iz baze, može biti decimalna (npr. 4.5)
                                                $fullStars = floor($rating); // Broj punih zvezda
                                                $halfStar = ($rating - $fullStars) >= 0.5 ? 1 : 0; // Da li je ostatak 0.5 ili više (dodeliti polovnu zvezdu)

                                                for ($i = 0; $i < 5; $i++) {
                                                    if ($i < $fullStars) {
                                                        echo '<i class="fas fa-star text-warning"></i>'; // Puna zvezda
                                                    } elseif ($i == $fullStars && $halfStar) {
                                                        echo '<i class="fas fa-star-half-alt text-warning"></i>'; // Polovina zvezde
                                                    } else {
                                                        echo '<i class="fas fa-star text-muted"></i>'; // Prazna zvezda
                                                    }
                                                }

                                                echo '
                                                            <small class="text-muted">(' . $row['ocena'] . '/5)</small>
                                                        </div>';
                                                ?>
                                            </div>
                                            <div class="reviews-members-body">
                                                <p><?php echo $row['recenzija']?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <?php } ?>
                                <?php else: ?>
                                <p>Nema recenzija za ovaj proizvod</p>
                                <?php endif; ?>



                            </div>

                            <div class="bg-white rounded shadow-sm p-4 mb-5 rating-review-select-page">
                                <h5 class="mb-4">Ostavi recenziju</h5>

                                <!-- Form for submitting a review -->
                                <form id="reviewForm">
                                    <!-- Hidden input for product ID -->
                                    <input type="hidden" name="proizvod_id" value="<?php echo $proizvod_id; ?>">

                                    <div class="form-group mb-4">
                                        <label>Vaš Komentar</label>
                                        <textarea class="form-control" name="comment" required></textarea>
                                    </div>

                                    <div style="width:16%" class='mb-4'>
                                        <label for="" class="mb-2">Vaša Ocena</label>
                                        <div class="rating">
                                            <input type="radio" id="star-1" name="star-radio" required value="1">
                                            <label for="star-1">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                    <path pathLength="360"
                                                        d="M12,17.27L18.18,21L16.54,13.97L22,9.24L14.81,8.62L12,2L9.19,8.62L2,9.24L7.45,13.97L5.82,21L12,17.27Z">
                                                    </path>
                                                </svg>
                                            </label>
                                            <input type="radio" id="star-2" name="star-radio" required value="2">
                                            <label for="star-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                    <path pathLength="360"
                                                        d="M12,17.27L18.18,21L16.54,13.97L22,9.24L14.81,8.62L12,2L9.19,8.62L2,9.24L7.45,13.97L5.82,21L12,17.27Z">
                                                    </path>
                                                </svg>
                                            </label>
                                            <input type="radio" id="star-3" name="star-radio" required value="3">
                                            <label for="star-3">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                    <path pathLength="360"
                                                        d="M12,17.27L18.18,21L16.54,13.97L22,9.24L14.81,8.62L12,2L9.19,8.62L2,9.24L7.45,13.97L5.82,21L12,17.27Z">
                                                    </path>
                                                </svg>
                                            </label>
                                            <input type="radio" id="star-4" name="star-radio" required value="4">
                                            <label for="star-4">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                    <path pathLength="360"
                                                        d="M12,17.27L18.18,21L16.54,13.97L22,9.24L14.81,8.62L12,2L9.19,8.62L2,9.24L7.45,13.97L5.82,21L12,17.27Z">
                                                    </path>
                                                </svg>
                                            </label>
                                            <input type="radio" id="star-5" name="star-radio" required value="5">
                                            <label for="star-5">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                    <path pathLength="360"
                                                        d="M12,17.27L18.18,21L16.54,13.97L22,9.24L14.81,8.62L12,2L9.19,8.62L2,9.24L7.45,13.97L5.82,21L12,17.27Z">
                                                    </path>
                                                </svg>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <button class="btn btn-primary btn-sm" type="submit">Submit Comment</button>
                                    </div>
                                </form>

                                <div id="responseMessage"></div>

                                <script>
                                document.getElementById('reviewForm').addEventListener('submit', function(e) {
                                    e.preventDefault();

                                    // Prikupljanje podataka iz forme
                                    const formData = new FormData(this);

                                    // AJAX zahtev
                                    fetch('../core/submit_review.php', {
                                            method: 'POST',
                                            body: formData
                                        })
                                        .then(response => response.json())
                                        .then(data => {
                                            // Prikazivanje poruke korisniku
                                            const responseMessage = document.getElementById(
                                                'responseMessage');
                                            if (data.status === 'success') {
                                                responseMessage.innerHTML =
                                                    '<p class="text-success">Uspešno ste ostavili recenziju!</p>';
                                            } else {
                                                responseMessage.innerHTML =
                                                    '<p class="text-danger">Došlo je do greške, pokušajte ponovo!</p>';
                                            }

                                            // Možeš i da očistiš formu ako je uspešno poslata
                                            document.getElementById('reviewForm').reset();
                                        })
                                        .catch(error => {
                                            console.error('Greška:', error);
                                            document.getElementById('responseMessage').innerHTML =
                                                '<p class="text-danger">Došlo je do greške, pokušajte ponovo!</p>';
                                        });
                                });
                                </script>


                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>