<main class="main">

    <!-- Page Title -->
    <div class="page-title dark-background" style="background-image: url(assets/img/page-title-bg.jpg);">
        <div class="container position-relative">
            <h1>Kontakt</h1>
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="/">Početna</a></li>
                    <li class="current">Kontakt</li>
                </ol>
            </nav>
        </div>
    </div><!-- End Page Title -->

    <!-- Contact Section -->
    <section id="contact" class="contact section">

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row gy-4">

                <div class="col-lg-6">
                    <div class="info-item d-flex flex-column justify-content-center align-items-center"
                        data-aos="fade-up" data-aos-delay="200">
                        <i class="bi bi-geo-alt"></i>
                        <h3>Adresa</h3>
                        <p>Ulica Bezbednosti 24, 11000 Beograd, Srbija</p>
                    </div>
                </div><!-- End Info Item -->

                <div class="col-lg-3 col-md-6">
                    <div class="info-item d-flex flex-column justify-content-center align-items-center"
                        data-aos="fade-up" data-aos-delay="300">
                        <i class="bi bi-telephone"></i>
                        <h3>Pozovite nas</h3>
                        <p>+381 64 123 4567</p>
                    </div>
                </div><!-- End Info Item -->

                <div class="col-lg-3 col-md-6">
                    <div class="info-item d-flex flex-column justify-content-center align-items-center"
                        data-aos="fade-up" data-aos-delay="400">
                        <i class="bi bi-envelope"></i>
                        <h3>Email</h3>
                        <p>kontakt@interbell.rs</p>
                    </div>
                </div><!-- End Info Item -->

            </div>

            <div class="row gy-4 mt-1">
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="300">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d48389.78314118045!2d-74.006138!3d40.710059!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25a22a3bda30d%3A0xb89d1fe6bc499443!2sDowntown%20Conference%20Center!5e0!3m2!1sen!2sus!4v1676961268712!5m2!1sen!2sus"
                        frameborder="0" style="border:0; width: 100%; height: 400px;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div><!-- End Google Maps -->

                <div class="col-lg-6">
                    <form id="contactForm" action="../core/send_email.php" method="post" class="needs-validation"
                        novalidate>
                        <div id="responseMessage" class="my-2"></div>

                        <div class="row gy-3">
                            <div class="col-12">
                                <input type="text" name="name" class="form-control" placeholder="Ime i Prezime"
                                    required>
                            </div>

                            <div class="col-12">
                                <input type="email" class="form-control" name="email" placeholder="Email" required>
                            </div>

                            <div class="col-12">
                                <input type="text" class="form-control" name="phone" placeholder="Telefon" required>
                            </div>

                            <div class="col-12">
                                <textarea class="form-control" name="message" rows="6" placeholder="Poruka"
                                    required></textarea>
                            </div>

                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-primary">Pošaljite ponudu</button>
                            </div>
                        </div>
                    </form>

                    <!-- Prikazivanje poruke o uspehu ili grešci -->


                    <!-- Prikazivanje poruke o uspehu ili grešci -->
                    <div id="responseMessage"></div>

                    <script>
                    document.getElementById("contactForm").addEventListener("submit", function(e) {
                        e.preventDefault(); // Sprečava reload stranice

                        // Provera validnosti forme
                        if (!this.checkValidity()) {
                            // Ako forma nije validna, pokaži poruku
                            this.classList.add("was-validated");
                            return; // Ne šaljemo formu
                        }

                        let formData = new FormData(this); // Prikuplja podatke sa forme

                        // AJAX zahtev
                        fetch("../core/send_email.php", {
                                method: "POST",
                                body: formData
                            })
                            .then(response => response.json()) // Očekuje JSON odgovor
                            .then(data => {
                                if (data.status === "success") {
                                    // Ako je email uspešno poslat, prikazujemo poruku i resetujemo formu
                                    document.getElementById("responseMessage").innerHTML =
                                        `<div class="alert alert-success">${data.message}</div>`;
                                    this.reset(); // Resetuje formu (očistiti inpute)
                                } else {
                                    // Ako nije uspešno, prikazuje grešku
                                    document.getElementById("responseMessage").innerHTML =
                                        `<div class="alert alert-danger">${data.message}</div>`;
                                }
                            })
                            .catch(error => {
                                console.error("Greška:", error);
                                document.getElementById("responseMessage").innerHTML =
                                    `<div class="alert alert-danger">Došlo je do greške. Pokušajte ponovo.</div>`;
                            });
                    });
                    </script>
                </div><!-- End Contact Form -->

            </div>

        </div>

    </section><!-- /Contact Section -->

</main>