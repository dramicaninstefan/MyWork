<main class="main">

    <!-- Page Title -->
    <div class="page-title dark-background" style="background-image: url(assets/img/page-title-bg.jpg);">
        <div class="container position-relative">
            <h1>Prodavnica</h1>
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="/">Home</a></li>
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
                                // Prikazivanje proizvoda
                                echo '<div class="col-lg-4 col-md-4">
                                        <div class="product-card bg-white rounded-4 shadow-sm h-100 position-relative">
                                            
                                            <div class="overflow-hidden">';
                                
                                // Prikazivanje slike proizvoda
                                if ($row['slika']) {
                                    $imageData = base64_encode($row['slika']);
                                    $imageType = $row['ekstenzija']; // Ekstenzija slike
                                    echo '<img src="data:image/' . $imageType . ';base64,' . $imageData . '" class="product-image w-100" style="height: 400px;" alt="Product">';
                                } else {
                                    // Ako nema slike, koristi default sliku
                                    echo '<img src="../assets/img/no_image_available.jpg" class="product-image w-100" style="height: 400px;" alt="Product">';
                                }

                                echo '  </div>
                                        <div class="p-4">
                                            <h5 class="fw-bold mb-3">' . $row['naslov'] . '</h5>
                                            <div class="d-flex align-items-center mb-3">
                                                <div class="me-2">';
                                                // Prikazivanje ocene u zvezdama
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
                                echo '      </div>
                                            <small class="text-muted">(' . $row['ocena'] . '/5)</small>
                                        </div>
                                        <p class="text-muted mb-4">' . $row['opis'] . '</p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span class="price">RSD ' . $row['cena'] . '</span>
                                            <form method="POST" action="../core/dodaj_u_korpu.php">
                                                <input type="hidden" name="proizvod_id" value="' . $row['id'] . '">
                                                <button type="submit" class="btn btn-custom text-white px-4 py-2 rounded-pill">
                                                    Dodaj u korpu
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
                                // Prikazivanje proizvoda
                                echo '<div class="col-lg-4 col-md-4">
                                        <div class="product-card bg-white rounded-4 shadow-sm h-100 position-relative">
                                            
                                            <div class="overflow-hidden">';
                                
                                // Prikazivanje slike proizvoda
                                if ($row['slika']) {
                                    $imageData = base64_encode($row['slika']);
                                    $imageType = $row['ekstenzija']; // Ekstenzija slike
                                    echo '<img src="data:image/' . $imageType . ';base64,' . $imageData . '" class="product-image w-100" style="height: 400px;" alt="Product">';
                                } else {
                                    // Ako nema slike, koristi default sliku
                                    echo '<img src="../assets/img/no_image_available.jpg" class="product-image w-100" style="height: 400px;" alt="Product">';
                                }

                                echo '  </div>
                                        <div class="p-4">
                                            <h5 class="fw-bold mb-3">' . $row['naslov'] . '</h5>
                                            <div class="d-flex align-items-center mb-3">
                                                <div class="me-2">';
                                                // Prikazivanje ocene u zvezdama
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
                                echo '      </div>
                                            <small class="text-muted">(' . $row['ocena'] . '/5)</small>
                                        </div>
                                        <p class="text-muted mb-4">' . $row['opis'] . '</p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span class="price">RSD ' . $row['cena'] . '</span>
                                            <form method="POST" action="../core/dodaj_u_korpu.php">
                                                <input type="hidden" name="proizvod_id" value="' . $row['id'] . '">
                                                <button type="submit" class="btn btn-custom text-white px-4 py-2 rounded-pill">
                                                    Dodaj u korpu
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
                                // Prikazivanje proizvoda
                                echo '<div class="col-lg-4 col-md-4">
                                        <div class="product-card bg-white rounded-4 shadow-sm h-100 position-relative">
                                            
                                            <div class="overflow-hidden">';
                                
                                // Prikazivanje slike proizvoda
                                if ($row['slika']) {
                                    $imageData = base64_encode($row['slika']);
                                    $imageType = $row['ekstenzija']; // Ekstenzija slike
                                    echo '<img src="data:image/' . $imageType . ';base64,' . $imageData . '" class="product-image w-100" style="height: 400px;" alt="Product">';
                                } else {
                                    // Ako nema slike, koristi default sliku
                                    echo '<img src="../assets/img/no_image_available.jpg" class="product-image w-100" style="height: 400px;" alt="Product">';
                                }

                                echo '  </div>
                                        <div class="p-4">
                                            <h5 class="fw-bold mb-3">' . $row['naslov'] . '</h5>
                                            <div class="d-flex align-items-center mb-3">
                                                <div class="me-2">';
                                                // Prikazivanje ocene u zvezdama
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
                                echo '      </div>
                                            <small class="text-muted">(' . $row['ocena'] . '/5)</small>
                                        </div>
                                        <p class="text-muted mb-4">' . $row['opis'] . '</p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span class="price">RSD ' . $row['cena'] . '</span>
                                            <form method="POST" action="../core/dodaj_u_korpu.php">
                                                <input type="hidden" name="proizvod_id" value="' . $row['id'] . '">
                                                <button type="submit" class="btn btn-custom text-white px-4 py-2 rounded-pill">
                                                    Dodaj u korpu
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
                        $sql = "SELECT * FROM proizvodi WHERE kategorija = 'kontola pristupa'";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                // Prikazivanje proizvoda
                                echo '<div class="col-lg-4 col-md-4">
                                        <div class="product-card bg-white rounded-4 shadow-sm h-100 position-relative">
                                            
                                            <div class="overflow-hidden">';
                                
                                // Prikazivanje slike proizvoda
                                if ($row['slika']) {
                                    $imageData = base64_encode($row['slika']);
                                    $imageType = $row['ekstenzija']; // Ekstenzija slike
                                    echo '<img src="data:image/' . $imageType . ';base64,' . $imageData . '" class="product-image w-100" style="height: 400px;" alt="Product">';
                                } else {
                                    // Ako nema slike, koristi default sliku
                                    echo '<img src="../assets/img/no_image_available.jpg" class="product-image w-100" style="height: 400px;" alt="Product">';
                                }

                                echo '  </div>
                                        <div class="p-4">
                                            <h5 class="fw-bold mb-3">' . $row['naslov'] . '</h5>
                                            <div class="d-flex align-items-center mb-3">
                                                <div class="me-2">';
                                                // Prikazivanje ocene u zvezdama
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
                                echo '      </div>
                                            <small class="text-muted">(' . $row['ocena'] . '/5)</small>
                                        </div>
                                        <p class="text-muted mb-4">' . $row['opis'] . '</p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span class="price">RSD ' . $row['cena'] . '</span>
                                            <form method="POST" action="../core/dodaj_u_korpu.php">
                                                <input type="hidden" name="proizvod_id" value="' . $row['id'] . '">
                                                <button type="submit" class="btn btn-custom text-white px-4 py-2 rounded-pill">
                                                    Dodaj u korpu
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

    <!-- Features Cards Section -->
    <section id="features-cards" class="features-cards section">

        <div class="container">

            <div class="row gy-4">

                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <h3>Quasi eaque omnis</h3>
                    <p>Eius non minus autem soluta ut ui labore omnis quisquam corrupti autem odit voluptas quos commodi
                        magnam occaecati.</p>
                    <ul class="list-unstyled">
                        <li><i class="bi bi-check2"></i> <span>Ullamco laboris nisi ut aliquip</span></li>
                        <li><i class="bi bi-check2"></i> <span>Duis aute irure dolor in reprehenderit</span></li>
                        <li><i class="bi bi-check2"></i> <span>Ullamco laboris nisi ut aliquip ex ea</span></li>
                    </ul>
                </div><!-- End feature item-->

                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <h3>Et nemo dolores consectetur</h3>
                    <p>Ducimus ea quam et occaecati est. Temporibus in soluta labore voluptates aut. Et sit soluta non
                        repellat sed quia dire plovers tradoria</p>

                    <ul class="list-unstyled">
                        <li><i class="bi bi-check2"></i> <span>Enim temporibus maiores eligendi</span></li>
                        <li><i class="bi bi-check2"></i> <span>Ut maxime ut quibusdam quam qui</span></li>
                        <li><i class="bi bi-check2"></i> <span>Officiis aspernatur in officiis</span></li>
                    </ul>
                </div><!-- End feature item-->

                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
                    <h3>Staque laboriosam modi</h3>
                    <p>Velit eos error et dolor omnis voluptates nobis tenetur sed enim nihil vero qui suscipit ipsum at
                        magni. Ipsa architecto consequatur aliquam</p>
                    <ul class="list-unstyled">
                        <li><i class="bi bi-check2"></i> <span>Quis voluptates laboriosam numquam</span></li>
                        <li><i class="bi bi-check2"></i> <span>Debitis eos est est corrupti</span></li>
                    </ul>
                </div><!-- End feature item-->

                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="400">
                    <h3>Dignissimos suscipit iste</h3>
                    <p>Molestiae occaecati assumenda quia saepe nobis recusandae at dicta ducimus sequi numquam commodi
                        est in consequatur ea magnam quia itaque</p>
                    <ul class="list-unstyled">
                        <li><i class="bi bi-check2"></i> <span>Veritatis qui reprehenderit quis</span></li>
                        <li><i class="bi bi-check2"></i> <span>Accusantium vel numquam sunt minus</span></li>
                        <li><i class="bi bi-check2"></i> <span>Voluptatem pariatur est sationem</span></li>
                    </ul>
                </div><!-- End feature item-->

            </div>

        </div>

    </section><!-- /Features Cards Section -->

    <!-- Alt Services 2 Section -->
    <section id="alt-services-2" class="alt-services-2 section">

        <div class="container">

            <div class="row justify-content-around gy-4">

                <div class="col-lg-6 d-flex flex-column justify-content-center order-2 order-lg-1" data-aos="fade-up"
                    data-aos-delay="100">
                    <h3>Enim quis est voluptatibus aliquid consequatur</h3>
                    <p>Esse voluptas cumque vel exercitationem. Reiciendis est hic accusamus. Non ipsam et sed minima
                        temporibus laudantium. Soluta voluptate sed facere corporis dolores excepturi</p>

                    <div class="row">

                        <div class="col-lg-6 icon-box d-flex">
                            <i class="bi bi-easel flex-shrink-0"></i>
                            <div>
                                <h4>Lorem Ipsum</h4>
                                <p>Voluptatum deleniti atque corrupti quos dolores et quas molestias </p>
                            </div>
                        </div><!-- End Icon Box -->

                        <div class="col-lg-6 icon-box d-flex">
                            <i class="bi bi-patch-check flex-shrink-0"></i>
                            <div>
                                <h4>Nemo Enim</h4>
                                <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiise</p>
                            </div>
                        </div><!-- End Icon Box -->

                        <div class="col-lg-6 icon-box d-flex">
                            <i class="bi bi-brightness-high flex-shrink-0"></i>
                            <div>
                                <h4>Dine Pad</h4>
                                <p>Explicabo est voluptatum asperiores consequatur magnam. Et veritatis odit</p>
                            </div>
                        </div><!-- End Icon Box -->

                        <div class="col-lg-6 icon-box d-flex">
                            <i class="bi bi-brightness-high flex-shrink-0"></i>
                            <div>
                                <h4>Tride clov</h4>
                                <p>Est voluptatem labore deleniti quis a delectus et. Saepe dolorem libero sit</p>
                            </div>
                        </div><!-- End Icon Box -->

                    </div>

                </div>

                <div class="features-image col-lg-5 order-1 order-lg-2" data-aos="fade-up" data-aos-delay="200">
                    <img src="assets/img/features-3-2.jpg" alt="">
                </div>

            </div>

        </div>

    </section><!-- /Alt Services 2 Section -->

    <!-- Testimonials Section -->
    <section id="testimonials" class="testimonials section">

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="swiper init-swiper">
                <script type="application/json" class="swiper-config">
                {
                    "loop": true,
                    "speed": 600,
                    "autoplay": {
                        "delay": 5000
                    },
                    "slidesPerView": "auto",
                    "pagination": {
                        "el": ".swiper-pagination",
                        "type": "bullets",
                        "clickable": true
                    },
                    "breakpoints": {
                        "320": {
                            "slidesPerView": 1,
                            "spaceBetween": 40
                        },
                        "1200": {
                            "slidesPerView": 2,
                            "spaceBetween": 20
                        }
                    }
                }
                </script>
                <div class="swiper-wrapper">

                    <div class="swiper-slide">
                        <div class="testimonial-wrap">
                            <div class="testimonial-item">
                                <img src="assets/img/testimonials/testimonials-1.jpg" class="testimonial-img" alt="">
                                <h3>Saul Goodman</h3>
                                <h4>Ceo &amp; Founder</h4>
                                <div class="stars">
                                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                        class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                        class="bi bi-star-fill"></i>
                                </div>
                                <p>
                                    <i class="bi bi-quote quote-icon-left"></i>
                                    <span>Proin iaculis purus consequat sem cure digni ssim donec porttitora entum
                                        suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et.
                                        Maecen aliquam, risus at semper.</span>
                                    <i class="bi bi-quote quote-icon-right"></i>
                                </p>
                            </div>
                        </div>
                    </div><!-- End testimonial item -->

                    <div class="swiper-slide">
                        <div class="testimonial-wrap">
                            <div class="testimonial-item">
                                <img src="assets/img/testimonials/testimonials-2.jpg" class="testimonial-img" alt="">
                                <h3>Sara Wilsson</h3>
                                <h4>Designer</h4>
                                <div class="stars">
                                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                        class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                        class="bi bi-star-fill"></i>
                                </div>
                                <p>
                                    <i class="bi bi-quote quote-icon-left"></i>
                                    <span>Export tempor illum tamen malis malis eram quae irure esse labore quem cillum
                                        quid cillum eram malis quorum velit fore eram velit sunt aliqua noster fugiat
                                        irure amet legam anim culpa.</span>
                                    <i class="bi bi-quote quote-icon-right"></i>
                                </p>
                            </div>
                        </div>
                    </div><!-- End testimonial item -->

                    <div class="swiper-slide">
                        <div class="testimonial-wrap">
                            <div class="testimonial-item">
                                <img src="assets/img/testimonials/testimonials-3.jpg" class="testimonial-img" alt="">
                                <h3>Jena Karlis</h3>
                                <h4>Store Owner</h4>
                                <div class="stars">
                                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                        class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                        class="bi bi-star-fill"></i>
                                </div>
                                <p>
                                    <i class="bi bi-quote quote-icon-left"></i>
                                    <span>Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla
                                        quem veniam duis minim tempor labore quem eram duis noster aute amet eram fore
                                        quis sint minim.</span>
                                    <i class="bi bi-quote quote-icon-right"></i>
                                </p>
                            </div>
                        </div>
                    </div><!-- End testimonial item -->

                    <div class="swiper-slide">
                        <div class="testimonial-wrap">
                            <div class="testimonial-item">
                                <img src="assets/img/testimonials/testimonials-4.jpg" class="testimonial-img" alt="">
                                <h3>Matt Brandon</h3>
                                <h4>Freelancer</h4>
                                <div class="stars">
                                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                        class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                        class="bi bi-star-fill"></i>
                                </div>
                                <p>
                                    <i class="bi bi-quote quote-icon-left"></i>
                                    <span>Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export minim
                                        fugiat minim velit minim dolor enim duis veniam ipsum anim magna sunt elit fore
                                        quem dolore labore illum veniam.</span>
                                    <i class="bi bi-quote quote-icon-right"></i>
                                </p>
                            </div>
                        </div>
                    </div><!-- End testimonial item -->

                    <div class="swiper-slide">
                        <div class="testimonial-wrap">
                            <div class="testimonial-item">
                                <img src="assets/img/testimonials/testimonials-5.jpg" class="testimonial-img" alt="">
                                <h3>John Larson</h3>
                                <h4>Entrepreneur</h4>
                                <div class="stars">
                                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                        class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                        class="bi bi-star-fill"></i>
                                </div>
                                <p>
                                    <i class="bi bi-quote quote-icon-left"></i>
                                    <span>Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor
                                        noster veniam enim culpa labore duis sunt culpa nulla illum cillum fugiat legam
                                        esse veniam culpa fore nisi cillum quid.</span>
                                    <i class="bi bi-quote quote-icon-right"></i>
                                </p>
                            </div>
                        </div>
                    </div><!-- End testimonial item -->

                </div>
                <div class="swiper-pagination"></div>
            </div>

        </div>

    </section><!-- /Testimonials Section -->

</main>