<main class="main">

    <!-- Page Title -->
    <div class="page-title dark-background" style="background-image: url(assets/img/page-title-bg.jpg);">
        <div class="container position-relative">
            <h1>Prodavnica</h1>
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="/">Početna</a></li>
                    <li class="current">Prodavnica</li>
                </ol>
            </nav>
        </div>
    </div><!-- End Page Title -->

    <!-- Menu Section -->
    <section id="menu" class="menu section">

        <div class="container">

            <ul class="nav nav-tabs d-flex justify-content-center" data-aos="fade-up" data-aos-delay="100">

                <li class="nav-item">
                    <a class="nav-link active show" data-bs-toggle="tab" data-bs-target="#shop-all">
                        <h4>Svi proizvodi</h4>
                    </a>
                </li><!-- End tab nav item -->

                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" data-bs-target="#shop-interfoni">
                        <h4>Inrerfoni</h4>
                    </a><!-- End tab nav item -->

                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" data-bs-target="#shop-video-nadzor">
                        <h4>Video nadzor</h4>
                    </a>
                </li><!-- End tab nav item -->

                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" data-bs-target="#shop-kontrola-pristupa">
                        <h4>Kontorla pristupa</h4>
                    </a>
                </li><!-- End tab nav item -->

            </ul>

            <div class="tab-content" data-aos="fade-up" data-aos-delay="200">

                <div class="tab-pane fade active show" id="shop-all">

                    <div class="tab-header text-center">
                        <p>Prodavnica</p>
                        <h3>Svi proizvodi</h3>
                    </div>

                    <div class="row gy-5">
                        <?php
                        require('config.php');

                        // SQL upit za učitavanje svih proizvoda
                        $sql = "SELECT * FROM proizvodi";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo '<div class="col-lg-4 col-md-4">
                                        <div class="product-card bg-white rounded-4 shadow-sm h-100 position-relative" onclick="submitForm(' . $row['id'] . ')" style="cursor: pointer;">
                                            
                                            <div class="overflow-hidden">';

                                            // Prikaz slike
                                            if ($row['slika']) {
                                                $imageData = base64_encode($row['slika']);
                                                $imageType = $row['ekstenzija'];
                                                echo '<img src="data:image/' . $imageType . ';base64,' . $imageData . '" class="product-image w-100" style="height: 400px;" alt="Product">';
                                            } else {
                                                echo '<img src="../assets/img/no_image_available.jpg" class="product-image w-100" style="height: 400px;" alt="Product">';
                                            }

                                    echo '</div>
                                        <div class="p-4">
                                            <h5 class="fw-bold mb-3">' . $row['naslov'] . '</h5>
                                            <div class="d-flex align-items-center mb-3">
                                                <div class="me-2">';

                                                $rating = $row['ocena'];
                                                $fullStars = floor($rating);
                                                $halfStar = ($rating - $fullStars) >= 0.5 ? 1 : 0;

                                                for ($i = 0; $i < 5; $i++) {
                                                    if ($i < $fullStars) {
                                                        echo '<i class="fas fa-star text-warning"></i>';
                                                    } elseif ($i == $fullStars && $halfStar) {
                                                        echo '<i class="fas fa-star-half-alt text-warning"></i>';
                                                    } else {
                                                        echo '<i class="fas fa-star text-muted"></i>';
                                                    }
                                                }

                                    echo '</div>
                                            <small class="text-muted">(' . $row['ocena'] . '/5)</small>
                                        </div>
                                        <p class="text-muted mb-4">' . $row['opis'] . '</p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span class="price">RSD ' . $row['cena'] . '</span>
                                            <form method="POST" action="/detalji-proizvod" id="form-' . $row['id'] . '">
                                                <input type="hidden" name="proizvod_id" value="' . $row['id'] . '">
                                                <button type="submit" class="btn btn-custom text-white px-4 py-2 rounded-pill">
                                                    Detaljnije 
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                    </div>
                                    </div>';

                            }
                        } else {
                            // Ako nema proizvoda u bazi, prikazujemo poruku
                            echo '<div class="col-lg-12 text-center">
                                    <h3>Trenutno nema prizvoda na stanju</h3>
                                </div>';
                        }

                        

                        $conn->close();
                    ?>
                    </div>

                    <script>
                    function submitForm(id) {
                        document.getElementById('form-' + id).submit();
                    }
                    </script>


                </div><!-- End Starter Menu Content -->

                <div class="tab-pane fade" id="shop-interfoni">

                    <div class="tab-header text-center">
                        <p>Prodavnica</p>
                        <h3>Interfoni</h3>
                    </div>

                    <div class="row gy-5">
                        <?php
                        require('config.php');

                        // SQL upit za učitavanje svih proizvoda
                        $sql = "SELECT * FROM proizvodi WHERE kategorija = 'interfon'";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo '<div class="col-lg-4 col-md-4">
                                        <div class="product-card bg-white rounded-4 shadow-sm h-100 position-relative" onclick="submitForm(' . $row['id'] . ')" style="cursor: pointer;">
                                            
                                            <div class="overflow-hidden">';

                                            // Prikaz slike
                                            if ($row['slika']) {
                                                $imageData = base64_encode($row['slika']);
                                                $imageType = $row['ekstenzija'];
                                                echo '<img src="data:image/' . $imageType . ';base64,' . $imageData . '" class="product-image w-100" style="height: 400px;" alt="Product">';
                                            } else {
                                                echo '<img src="../assets/img/no_image_available.jpg" class="product-image w-100" style="height: 400px;" alt="Product">';
                                            }

                                    echo '</div>
                                        <div class="p-4">
                                            <h5 class="fw-bold mb-3">' . $row['naslov'] . '</h5>
                                            <div class="d-flex align-items-center mb-3">
                                                <div class="me-2">';

                                                $rating = $row['ocena'];
                                                $fullStars = floor($rating);
                                                $halfStar = ($rating - $fullStars) >= 0.5 ? 1 : 0;

                                                for ($i = 0; $i < 5; $i++) {
                                                    if ($i < $fullStars) {
                                                        echo '<i class="fas fa-star text-warning"></i>';
                                                    } elseif ($i == $fullStars && $halfStar) {
                                                        echo '<i class="fas fa-star-half-alt text-warning"></i>';
                                                    } else {
                                                        echo '<i class="fas fa-star text-muted"></i>';
                                                    }
                                                }

                                    echo '</div>
                                            <small class="text-muted">(' . $row['ocena'] . '/5)</small>
                                        </div>
                                        <p class="text-muted mb-4">' . $row['opis'] . '</p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span class="price">RSD ' . $row['cena'] . '</span>
                                            <form method="POST" action="/detalji-proizvod" id="form-' . $row['id'] . '">
                                                <input type="hidden" name="proizvod_id" value="' . $row['id'] . '">
                                                <button type="submit" class="btn btn-custom text-white px-4 py-2 rounded-pill">
                                                    Detaljnije 
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                    </div>
                                    </div>';
                            }
                        } else {
                            // Ako nema proizvoda u bazi, prikazujemo poruku
                            echo '<div class="col-lg-12 text-center">
                                    <h3>Trenutno nema prizvoda na stanju</h3>
                                </div>';
                        }

                        $conn->close();
                    ?>
                    </div>

                </div><!-- End Breakfast Menu Content -->

                <div class="tab-pane fade" id="shop-video-nadzor">

                    <div class="tab-header text-center">
                        <p>Prodavnica</p>
                        <h3>Video nadzor</h3>
                    </div>

                    <div class="row gy-5">
                        <?php
                        require('config.php');

                        // SQL upit za učitavanje svih proizvoda
                        $sql = "SELECT * FROM proizvodi WHERE kategorija = 'video nadzor'";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo '<div class="col-lg-4 col-md-4">
                                        <div class="product-card bg-white rounded-4 shadow-sm h-100 position-relative" onclick="submitForm(' . $row['id'] . ')" style="cursor: pointer;">
                                            
                                            <div class="overflow-hidden">';

                                            // Prikaz slike
                                            if ($row['slika']) {
                                                $imageData = base64_encode($row['slika']);
                                                $imageType = $row['ekstenzija'];
                                                echo '<img src="data:image/' . $imageType . ';base64,' . $imageData . '" class="product-image w-100" style="height: 400px;" alt="Product">';
                                            } else {
                                                echo '<img src="../assets/img/no_image_available.jpg" class="product-image w-100" style="height: 400px;" alt="Product">';
                                            }

                                    echo '</div>
                                        <div class="p-4">
                                            <h5 class="fw-bold mb-3">' . $row['naslov'] . '</h5>
                                            <div class="d-flex align-items-center mb-3">
                                                <div class="me-2">';

                                                $rating = $row['ocena'];
                                                $fullStars = floor($rating);
                                                $halfStar = ($rating - $fullStars) >= 0.5 ? 1 : 0;

                                                for ($i = 0; $i < 5; $i++) {
                                                    if ($i < $fullStars) {
                                                        echo '<i class="fas fa-star text-warning"></i>';
                                                    } elseif ($i == $fullStars && $halfStar) {
                                                        echo '<i class="fas fa-star-half-alt text-warning"></i>';
                                                    } else {
                                                        echo '<i class="fas fa-star text-muted"></i>';
                                                    }
                                                }

                                    echo '</div>
                                            <small class="text-muted">(' . $row['ocena'] . '/5)</small>
                                        </div>
                                        <p class="text-muted mb-4">' . $row['opis'] . '</p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span class="price">RSD ' . $row['cena'] . '</span>
                                            <form method="POST" action="/detalji-proizvod" id="form-' . $row['id'] . '">
                                                <input type="hidden" name="proizvod_id" value="' . $row['id'] . '">
                                                <button type="submit" class="btn btn-custom text-white px-4 py-2 rounded-pill">
                                                    Detaljnije 
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                    </div>
                                    </div>';
                            }
                        } else {
                            // Ako nema proizvoda u bazi, prikazujemo poruku
                            echo '<div class="col-lg-12 text-center">
                                    <h3>Trenutno nema prizvoda na stanju</h3>
                                </div>';
                        }

                        $conn->close();
                    ?>
                    </div>

                </div><!-- End Lunch Menu Content -->

                <div class="tab-pane fade" id="shop-kontrola-pristupa">

                    <div class="tab-header text-center">
                        <p>Prodavnica</p>
                        <h3>Kontrola pristupa</h3>
                    </div>

                    <div class="row gy-5">
                        <?php
                        require('config.php');

                        // SQL upit za učitavanje svih proizvoda
                        $sql = "SELECT * FROM proizvodi WHERE kategorija = 'kontrola pristupa'";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo '<div class="col-lg-4 col-md-4">
                                        <div class="product-card bg-white rounded-4 shadow-sm h-100 position-relative" onclick="submitForm(' . $row['id'] . ')" style="cursor: pointer;">
                                            
                                            <div class="overflow-hidden">';

                                            // Prikaz slike
                                            if ($row['slika']) {
                                                $imageData = base64_encode($row['slika']);
                                                $imageType = $row['ekstenzija'];
                                                echo '<img src="data:image/' . $imageType . ';base64,' . $imageData . '" class="product-image w-100" style="height: 400px;" alt="Product">';
                                            } else {
                                                echo '<img src="../assets/img/no_image_available.jpg" class="product-image w-100" style="height: 400px;" alt="Product">';
                                            }

                                    echo '</div>
                                        <div class="p-4">
                                            <h5 class="fw-bold mb-3">' . $row['naslov'] . '</h5>
                                            <div class="d-flex align-items-center mb-3">
                                                <div class="me-2">';

                                                $rating = $row['ocena'];
                                                $fullStars = floor($rating);
                                                $halfStar = ($rating - $fullStars) >= 0.5 ? 1 : 0;

                                                for ($i = 0; $i < 5; $i++) {
                                                    if ($i < $fullStars) {
                                                        echo '<i class="fas fa-star text-warning"></i>';
                                                    } elseif ($i == $fullStars && $halfStar) {
                                                        echo '<i class="fas fa-star-half-alt text-warning"></i>';
                                                    } else {
                                                        echo '<i class="fas fa-star text-muted"></i>';
                                                    }
                                                }

                                    echo '</div>
                                            <small class="text-muted">(' . $row['ocena'] . '/5)</small>
                                        </div>
                                        <p class="text-muted mb-4">' . $row['opis'] . '</p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span class="price">RSD ' . $row['cena'] . '</span>
                                            <form method="POST" action="/detalji-proizvod" id="form-' . $row['id'] . '">
                                                <input type="hidden" name="proizvod_id" value="' . $row['id'] . '">
                                                <button type="submit" class="btn btn-custom text-white px-4 py-2 rounded-pill">
                                                    Detaljnije 
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                    </div>
                                    </div>';
                            }
                        } else {
                            // Ako nema proizvoda u bazi, prikazujemo poruku
                            echo '<div class="col-lg-12 text-center">
                                    <h3>Trenutno nema prizvoda na stanju</h3>
                                </div>';
                        }

                        $conn->close();
                    ?>
                    </div>
                </div><!-- End Dinner Menu Content -->

            </div>

        </div>

    </section><!-- /Menu Section -->

</main>