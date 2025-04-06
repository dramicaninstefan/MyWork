<main class="main">
    <!-- Hero Section -->
    <section id="hero" class="hero section dark-background">

        <div class="info d-flex align-items-center">
            <div class="container">
                <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="100">
                    <div class="col-lg-6 text-center">
                        <h2>Dobrodošli u INTERBELL</h2>
                        <p>Specijalizovani smo za ugradnju savremenih sistema interfona i video nadzora. Naša misija je
                            da obezbedimo sigurnost i komfor vašeg doma i poslovnog prostora pomoću najnovijih
                            tehnologija.</p>
                        <a href="#get-started" class="btn-get-started">Započnite sa nama</a>
                    </div>
                </div>
            </div>
        </div>

        <div id="hero-carousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">

            <div class="carousel-item">
                <img src="assets/img/hero-carousel/hero-carousel-1.jpg" alt="Ugradnja video nadzora">
            </div>

            <div class="carousel-item active">
                <img src="assets/img/hero-carousel/hero-carousel-2.jpg" alt="Savremeni sistemi interfona">
            </div>

            <div class="carousel-item">
                <img src="assets/img/hero-carousel/hero-carousel-3.jpg" alt="Sigurnost doma i firme">
            </div>

            <a class="carousel-control-prev" href="#hero-carousel" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
            </a>

            <a class="carousel-control-next" href="#hero-carousel" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
            </a>

        </div>

    </section><!-- /Hero Section -->

    <!-- Clients Section -->
    <section id="clients" class="clients section light-background">

        <div class="container">

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
                            "slidesPerView": 2,
                            "spaceBetween": 40
                        },
                        "480": {
                            "slidesPerView": 3,
                            "spaceBetween": 60
                        },
                        "640": {
                            "slidesPerView": 4,
                            "spaceBetween": 80
                        },
                        "992": {
                            "slidesPerView": 6,
                            "spaceBetween": 120
                        }
                    }
                }
                </script>
                <div class="swiper-wrapper align-items-center">
                    <div class="swiper-slide"><img src="assets/img/clients/client-1.png" class="img-fluid" alt=""></div>
                    <div class="swiper-slide"><img src="assets/img/clients/client-2.png" class="img-fluid" alt=""></div>
                    <div class="swiper-slide"><img src="assets/img/clients/client-3.png" class="img-fluid" alt=""></div>
                    <div class="swiper-slide"><img src="assets/img/clients/client-4.png" class="img-fluid" alt=""></div>
                    <div class="swiper-slide"><img src="assets/img/clients/client-5.png" class="img-fluid" alt=""></div>
                    <div class="swiper-slide"><img src="assets/img/clients/client-6.png" class="img-fluid" alt=""></div>
                    <div class="swiper-slide"><img src="assets/img/clients/client-7.png" class="img-fluid" alt=""></div>
                    <div class="swiper-slide"><img src="assets/img/clients/client-8.png" class="img-fluid" alt=""></div>
                </div>
            </div>

        </div>

    </section><!-- /Clients Section -->


    <!-- Get Started Section -->
    <section id="get-started" class="get-started section">

        <div class="container">

            <div class="row justify-content-between gy-4">

                <div class="col-lg-6 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="100">
                    <div class="content">
                        <h3>Zaštitite svoj prostor sa najnovijim sistemima</h3>
                        <p>Ugradnja interfona i video nadzora pruža vam potpunu sigurnost za vaš dom i poslovni prostor.
                            Naša rešenja omogućavaju vam praćenje i kontrolu pristupa sa bilo kog mesta na svetu.</p>
                        <p>Bezbednost je prioritet, a mi pružamo najpouzdanije sisteme za video nadzor, kao i moderan
                            interfon sa video funkcijama. Obezbedite svoj prostor najnovijim tehnologijama i budite
                            sigurni u svaki trenutak.</p>
                    </div>
                </div>

                <div class="col-lg-5" data-aos="zoom-out" data-aos-delay="200">
                    <form action="forms/quote.php" method="post" class="php-email-form">
                        <h3>Dobijte ponudu</h3>
                        <p>Popunite formu kako bismo vam poslali personalizovanu ponudu za ugradnju sistema interfona i
                            video nadzora. Naši stručnjaci će vas kontaktirati sa svim informacijama i detaljima.</p>
                        <div class="row gy-3">

                            <div class="col-12">
                                <input type="text" name="name" class="form-control" placeholder="Ime i Prezime"
                                    required="">
                            </div>

                            <div class="col-12">
                                <input type="email" class="form-control" name="email" placeholder="Email" required="">
                            </div>

                            <div class="col-12">
                                <input type="text" class="form-control" name="phone" placeholder="Telefon" required="">
                            </div>

                            <div class="col-12">
                                <textarea class="form-control" name="message" rows="6" placeholder="Poruka"
                                    required=""></textarea>
                            </div>

                            <div class="col-12 text-center">
                                <div class="loading">Učitavanje...</div>
                                <div class="error-message"></div>
                                <div class="sent-message">Vaš zahtev za ponudu je uspešno poslat. Hvala vam!</div>

                                <button type="submit">Pošaljite ponudu</button>
                            </div>

                        </div>
                    </form>
                </div><!-- End Quote Form -->

            </div>

        </div>

    </section><!-- /Get Started Section -->


    <!-- Constructions Section -->
    <section id="constructions" class="constructions section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Naši Projekti</h2>
            <p>Ugradnja interfona i video nadzora u različitim poslovnim i privatnim objektima</p>
        </div><!-- End Section Title -->

        <div class="container">

            <div class="row gy-4">

                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="card-item">
                        <div class="row">
                            <div class="col-xl-5">
                                <div class="card-bg"><img src="assets/img/constructions-1.jpg"
                                        alt="Video nadzor u stambenoj zgradi"></div>
                            </div>
                            <div class="col-xl-7 d-flex align-items-center">
                                <div class="card-body">
                                    <h4 class="card-title">Ugradnja video nadzora u stambenim zgradama</h4>
                                    <p>Naš video nadzor omogućava vam potpuni pregled svih prostorija, s visokim
                                        kvalitetom slike i mogućnostima za daljinsko praćenje. Osigurajte sigurnost
                                        svojih stanova i zajedničkih prostora.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- End Card Item -->

                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="card-item">
                        <div class="row">
                            <div class="col-xl-5">
                                <div class="card-bg"><img src="assets/img/constructions-2.png"
                                        alt="Ugradnja interfona u poslovnim prostorima"></div>
                            </div>
                            <div class="col-xl-7 d-flex align-items-center">
                                <div class="card-body">
                                    <h4 class="card-title">Moderna ugradnja interfona u poslovnim prostorima</h4>
                                    <p>Omogućite efikasan i bezbedan pristup vašem poslovnom prostoru uz najnovije
                                        interfone sa video funkcijama. Idealno rešenje za moderne kancelarije i
                                        preduzeća.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- End Card Item -->

                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="card-item">
                        <div class="row">
                            <div class="col-xl-5">
                                <div class="card-bg"><img src="assets/img/constructions-3.jpg"
                                        alt="Video nadzor u industrijskim objektima"></div>
                            </div>
                            <div class="col-xl-7 d-flex align-items-center">
                                <div class="card-body">
                                    <h4 class="card-title">Video nadzor u industrijskim objektima</h4>
                                    <p>Obezbedite visoki nivo zaštite i kontrole nad industrijskim objektima. Naša
                                        rešenja za video nadzor omogućavaju vam da pratite svaki deo proizvodnog
                                        prostora i pristup omogućen samo ovlašćenim osobama.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- End Card Item -->

                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="400">
                    <div class="card-item">
                        <div class="row">
                            <div class="col-xl-5">
                                <div class="card-bg"><img src="assets/img/constructions-4.jpg"
                                        alt="Ugradnja video nadzora na otvorenom"></div>
                            </div>
                            <div class="col-xl-7 d-flex align-items-center">
                                <div class="card-body">
                                    <h4 class="card-title">Ugradnja video nadzora na otvorenom</h4>
                                    <p>Zaštitite spoljne prostore sa visokokvalitetnim video nadzorom. Idealno za
                                        dvorišta, parkinge, ulaze i druge spoljne lokacije koje zahtevaju stalni nadzor.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- End Card Item -->

            </div>

        </div>

    </section><!-- /Constructions Section -->


    <!-- Services Section -->
    <section id="services" class="services section light-background">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Naše Usluge</h2>
            <p>Pružamo kvalitetna i moderna rešenja za bezbednost vašeg doma, poslovnog prostora i zajednica</p>
        </div><!-- End Section Title -->

        <div class="container">

            <div class="row gy-4">

                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="service-item position-relative">
                        <div class="icon">
                            <i class="fa-solid fa-video"></i>
                        </div>
                        <h3>Ugradnja Video Nadzora</h3>
                        <p>Profesionalna ugradnja sigurnosnih kamera sa snimanjem u visokoj rezoluciji i daljinskim
                            pristupom putem mobilnih uređaja.</p>
                        <!-- <a href="#" class="readmore stretched-link">Detaljnije <i class="bi bi-arrow-right"></i></a> -->
                    </div>
                </div><!-- End Service Item -->

                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="service-item position-relative">
                        <div class="icon">
                            <i class="fa-solid fa-door-open"></i>
                        </div>
                        <h3>Ugradnja Interfona</h3>
                        <p>Klasični i video interfoni za zgrade i kuće. Kontrola pristupa i jednostavno komuniciranje sa
                            posetiocima.</p>
                        <!-- <a href="#" class="readmore stretched-link">Detaljnije <i class="bi bi-arrow-right"></i></a> -->
                    </div>
                </div><!-- End Service Item -->

                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="service-item position-relative">
                        <div class="icon">
                            <i class="fa-solid fa-network-wired"></i>
                        </div>
                        <h3>Instalacija Mrežne Infrastrukture</h3>
                        <p>Postavljanje mrežnih kablova i opreme potrebne za rad video nadzora i interfona uz uredno i
                            sigurno sprovođenje.</p>
                        <!-- <a href="#" class="readmore stretched-link">Detaljnije <i class="bi bi-arrow-right"></i></a> -->
                    </div>
                </div><!-- End Service Item -->

                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
                    <div class="service-item position-relative">
                        <div class="icon">
                            <i class="fa-solid fa-shield-halved"></i>
                        </div>
                        <h3>Sistemi Kontrole Pristupa</h3>
                        <p>Rešenja za elektronsko zaključavanje i evidenciju prolaza sa karticama, šiframa ili
                            biometrijom.</p>
                        <!-- <a href="#" class="readmore stretched-link">Detaljnije <i class="bi bi-arrow-right"></i></a> -->
                    </div>
                </div><!-- End Service Item -->

                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="500">
                    <div class="service-item position-relative">
                        <div class="icon">
                            <i class="fa-solid fa-screwdriver-wrench"></i>
                        </div>
                        <h3>Održavanje i Servis</h3>
                        <p>Redovan servis, zamena oštećenih komponenti i nadogradnje postojećih sistema po potrebi
                            korisnika.</p>
                        <!-- <a href="#" class="readmore stretched-link">Detaljnije <i class="bi bi-arrow-right"></i></a> -->
                    </div>
                </div><!-- End Service Item -->

                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="600">
                    <div class="service-item position-relative">
                        <div class="icon">
                            <i class="fa-solid fa-file-shield"></i>
                        </div>
                        <h3>Konsultacije i Projektovanje</h3>
                        <p>Pomažemo u izboru idealnog sistema za vaše potrebe. Na osnovu objekta izrađujemo optimalna
                            rešenja zaštite.</p>
                        <!-- <a href="#" class="readmore stretched-link">Detaljnije <i class="bi bi-arrow-right"></i></a> -->
                    </div>
                </div><!-- End Service Item -->

            </div>

        </div>

    </section><!-- /Services Section -->


    <!-- Features Section -->
    <section id="features" class="features section">
        <div class="container">

            <ul class="nav nav-tabs row  g-2 d-flex" data-aos="fade-up" data-aos-delay="100" role="tablist">

                <li class="nav-item col-3" role="presentation">
                    <a class="nav-link active show" data-bs-toggle="tab" data-bs-target="#features-tab-1"
                        aria-selected="true" role="tab">
                        <h4>Video nadzor</h4>
                    </a>
                </li>

                <li class="nav-item col-3" role="presentation">
                    <a class="nav-link" data-bs-toggle="tab" data-bs-target="#features-tab-2" aria-selected="false"
                        tabindex="-1" role="tab">
                        <h4>Interfoni</h4>
                    </a>
                </li>

                <li class="nav-item col-3" role="presentation">
                    <a class="nav-link" data-bs-toggle="tab" data-bs-target="#features-tab-3" aria-selected="false"
                        tabindex="-1" role="tab">
                        <h4>Održavanje</h4>
                    </a>
                </li>

                <li class="nav-item col-3" role="presentation">
                    <a class="nav-link" data-bs-toggle="tab" data-bs-target="#features-tab-4" aria-selected="false"
                        tabindex="-1" role="tab">
                        <h4>Konsultacije</h4>
                    </a>
                </li>

            </ul>

            <div class="tab-content" data-aos="fade-up" data-aos-delay="200">

                <div class="tab-pane fade active show" id="features-tab-1" role="tabpanel">
                    <div class="row">
                        <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0 d-flex flex-column justify-content-center">
                            <h3>Savremeni sistemi video nadzora</h3>
                            <p class="fst-italic">
                                Pružamo profesionalnu ugradnju kamera i sistema za video nadzor koji obezbeđuju vašu
                                imovinu 24/7.
                            </p>
                            <ul>
                                <li><i class="bi bi-check2-all"></i> <span>Ugradnja analognih i IP kamera visoke
                                        rezolucije.</span></li>
                                <li><i class="bi bi-check2-all"></i> <span>Mobilni pristup snimcima u realnom
                                        vremenu.</span></li>
                                <li><i class="bi bi-check2-all"></i> <span>Kompletno rešenje za stanove, kuće, poslovne
                                        prostore i hale.</span></li>
                            </ul>
                        </div>
                        <div class="col-lg-6 order-1 order-lg-2 text-center">
                            <img src="assets/img/features-1.jpg" alt="Video nadzor" class="img-fluid">
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="features-tab-2" role="tabpanel">
                    <div class="row">
                        <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0 d-flex flex-column justify-content-center">
                            <h3>Interfonski sistemi nove generacije</h3>
                            <p class="fst-italic">
                                Postavljanje interfona sa audio i video podrškom za potpunu sigurnost ulaza.
                            </p>
                            <ul>
                                <li><i class="bi bi-check2-all"></i> <span>Ugradnja audio i video interfona sa ekranima
                                        u boji.</span></li>
                                <li><i class="bi bi-check2-all"></i> <span>Sistemi za pojedinačne kuće i stambene
                                        zgrade.</span></li>
                                <li><i class="bi bi-check2-all"></i> <span>Integracija sa elektronskim bravama i
                                        daljinskim otvaranjem vrata.</span></li>
                                <li><i class="bi bi-check2-all"></i> <span>Jednostavno korišćenje i moderan dizajn
                                        uređaja.</span></li>
                            </ul>
                        </div>
                        <div class="col-lg-6 order-1 order-lg-2 text-center">
                            <img src="assets/img/features-2.jpg" alt="Interfoni" class="img-fluid">
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="features-tab-3" role="tabpanel">
                    <div class="row">
                        <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0 d-flex flex-column justify-content-center">
                            <h3>Održavanje i servis</h3>
                            <ul>
                                <li><i class="bi bi-check2-all"></i> <span>Brz odziv na kvarove i tehničke
                                        probleme.</span></li>
                                <li><i class="bi bi-check2-all"></i> <span>Redovno održavanje sistema za dugotrajan
                                        rad.</span></li>
                                <li><i class="bi bi-check2-all"></i> <span>Servis postojećih instalacija i zamena
                                        dotrajalih komponenti.</span></li>
                            </ul>
                            <p class="fst-italic">
                                Naš tim je tu da obezbedi besprekorno funkcionisanje svih vaših sigurnosnih sistema.
                            </p>
                        </div>
                        <div class="col-lg-6 order-1 order-lg-2 text-center">
                            <img src="assets/img/features-3.jpg" alt="Održavanje" class="img-fluid">
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="features-tab-4" role="tabpanel">
                    <div class="row">
                        <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0 d-flex flex-column justify-content-center">
                            <h3>Besplatne konsultacije i procena</h3>
                            <p class="fst-italic">
                                Pomažemo vam da pronađete najbolje rešenje za vaš prostor i budžet.
                            </p>
                            <ul>
                                <li><i class="bi bi-check2-all"></i> <span>Izlazak na teren i savetovanje sa
                                        stručnjacima.</span></li>
                                <li><i class="bi bi-check2-all"></i> <span>Prilagođena rešenja za svaku vrstu
                                        objekta.</span></li>
                                <li><i class="bi bi-check2-all"></i> <span>Precizna ponuda i transparentne cene bez
                                        skrivenih troškova.</span></li>
                            </ul>
                        </div>
                        <div class="col-lg-6 order-1 order-lg-2 text-center">
                            <img src="assets/img/features-4.jpg" alt="Konsultacije" class="img-fluid">
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section><!-- /Features Section -->



    <!-- Testimonials Section -->
    <section id="testimonials" class="testimonials section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Iskustva Klijenata</h2>
            <p>Pogledajte šta naši klijenti kažu o kvalitetu usluga ugradnje interfona i video nadzora</p>
        </div><!-- End Section Title -->

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
                                <h3>Marko Petrović</h3>
                                <h4>Stanar zgrade</h4>
                                <div class="stars">
                                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                        class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                                </div>
                                <p>
                                    <i class="bi bi-quote quote-icon-left"></i>
                                    <span>Brza i profesionalna ugradnja interfona. Sve radi savršeno, a tim je bio veoma
                                        ljubazan i efikasan.</span>
                                    <i class="bi bi-quote quote-icon-right"></i>
                                </p>
                            </div>
                        </div>
                    </div><!-- End testimonial item -->

                    <div class="swiper-slide">
                        <div class="testimonial-wrap">
                            <div class="testimonial-item">
                                <h3>Jelena Nikolić</h3>
                                <h4>Vlasnica stana</h4>
                                <div class="stars">
                                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                        class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                        class="bi bi-star-fill"></i>
                                </div>
                                <p>
                                    <i class="bi bi-quote quote-icon-left"></i>
                                    <span>Od kada smo postavili video nadzor, osećamo se mnogo sigurnije. Sve pohvale za
                                        kvalitetnu opremu i uslugu!</span>
                                    <i class="bi bi-quote quote-icon-right"></i>
                                </p>
                            </div>
                        </div>
                    </div><!-- End testimonial item -->

                    <div class="swiper-slide">
                        <div class="testimonial-wrap">
                            <div class="testimonial-item">
                                <h3>Ivan Stanković</h3>
                                <h4>Predsednik skupštine stanara</h4>
                                <div class="stars">
                                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                        class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                                </div>
                                <p>
                                    <i class="bi bi-quote quote-icon-left"></i>
                                    <span>Ekipa je došla tačno na vreme i završila posao za jedan dan. Sve funkcioniše
                                        bez greške. Preporuka!</span>
                                    <i class="bi bi-quote quote-icon-right"></i>
                                </p>
                            </div>
                        </div>
                    </div><!-- End testimonial item -->

                    <div class="swiper-slide">
                        <div class="testimonial-wrap">
                            <div class="testimonial-item">
                                <h3>Milica Jovanović</h3>
                                <h4>Vlasnica salona</h4>
                                <div class="stars">
                                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                        class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                        class="bi bi-star-fill"></i>
                                </div>
                                <p>
                                    <i class="bi bi-quote quote-icon-left"></i>
                                    <span>Instalacija video nadzora u mom lokalu je bila pun pogodak. Sve preporuke za
                                        ovaj tim!</span>
                                    <i class="bi bi-quote quote-icon-right"></i>
                                </p>
                            </div>
                        </div>
                    </div><!-- End testimonial item -->

                    <div class="swiper-slide">
                        <div class="testimonial-wrap">
                            <div class="testimonial-item">
                                <h3>Dragan Kovačević</h3>
                                <h4>Vlasnik kuće</h4>
                                <div class="stars">
                                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                        class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                        class="bi bi-star-fill"></i>
                                </div>
                                <p>
                                    <i class="bi bi-quote quote-icon-left"></i>
                                    <span>Odlična usluga! Video nadzor radi besprekorno, a aplikacija za praćenje je
                                        vrlo jednostavna za korišćenje.</span>
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



    <!-- Recent Blog Posts Section -->
    <section id="recent-blog-posts" class="recent-blog-posts section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Recent Blog Posts</h2>
            <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
        </div><!-- End Section Title -->

        <div class="container">

            <div class="row gy-5">

                <div class="col-xl-4 col-md-6">
                    <div class="post-item position-relative h-100" data-aos="fade-up" data-aos-delay="100">

                        <div class="post-img position-relative overflow-hidden">
                            <img src="assets/img/blog/blog-1.jpg" class="img-fluid" alt="">
                            <span class="post-date">December 12</span>
                        </div>

                        <div class="post-content d-flex flex-column">

                            <h3 class="post-title">Eum ad dolor et. Autem aut fugiat debitis</h3>

                            <div class="meta d-flex align-items-center">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-person"></i> <span class="ps-2">Julia Parker</span>
                                </div>
                                <span class="px-3 text-black-50">/</span>
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-folder2"></i> <span class="ps-2">Politics</span>
                                </div>
                            </div>

                            <hr>

                            <a href="blog-details.html" class="readmore stretched-link"><span>Read More</span><i
                                    class="bi bi-arrow-right"></i></a>

                        </div>

                    </div>
                </div><!-- End post item -->

                <div class="col-xl-4 col-md-6">
                    <div class="post-item position-relative h-100" data-aos="fade-up" data-aos-delay="200">

                        <div class="post-img position-relative overflow-hidden">
                            <img src="assets/img/blog/blog-2.jpg" class="img-fluid" alt="">
                            <span class="post-date">July 17</span>
                        </div>

                        <div class="post-content d-flex flex-column">

                            <h3 class="post-title">Et repellendus molestiae qui est sed omnis</h3>

                            <div class="meta d-flex align-items-center">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-person"></i> <span class="ps-2">Mario Douglas</span>
                                </div>
                                <span class="px-3 text-black-50">/</span>
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-folder2"></i> <span class="ps-2">Sports</span>
                                </div>
                            </div>

                            <hr>

                            <a href="blog-details.html" class="readmore stretched-link"><span>Read More</span><i
                                    class="bi bi-arrow-right"></i></a>

                        </div>

                    </div>
                </div><!-- End post item -->

                <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="post-item position-relative h-100">

                        <div class="post-img position-relative overflow-hidden">
                            <img src="assets/img/blog/blog-3.jpg" class="img-fluid" alt="">
                            <span class="post-date">September 05</span>
                        </div>

                        <div class="post-content d-flex flex-column">

                            <h3 class="post-title">Quia assumenda est et veritati tirana ploder</h3>

                            <div class="meta d-flex align-items-center">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-person"></i> <span class="ps-2">Lisa Hunter</span>
                                </div>
                                <span class="px-3 text-black-50">/</span>
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-folder2"></i> <span class="ps-2">Economics</span>
                                </div>
                            </div>

                            <hr>

                            <a href="blog-details.html" class="readmore stretched-link"><span>Read More</span><i
                                    class="bi bi-arrow-right"></i></a>

                        </div>

                    </div>
                </div><!-- End post item -->

            </div>

        </div>

    </section><!-- /Recent Blog Posts Section -->

</main>