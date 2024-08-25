<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="./assets/img/favicon.ico" rel="icon">

  <!-- Google Fonts -->
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <title>INTERBELL d.o.o</title>

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center justify-content-between">

      <h1 class="logo"><a href="index.html">INTERBELL
        </a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Početna</a></li>
          <li><a class="nav-link scrollto" href="#about">O nama</a></li>
          <li><a class="nav-link scrollto" href="#services">Usluge</a></li>
          <li><a class="nav-link scrollto" href="#team">Tim</a></li>
          <li><a class="nav-link scrollto" href="#contact">Kontakt</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container position-relative" data-aos="fade-up" data-aos-delay="100">
      <div class="row justify-content-center">
        <div class="col-xl-7 col-lg-9 text-center">
          <h1>INTERBELL d.o.o</h1>
          <h2>Mi smo tim iskusnih majstora</h2>
        </div>
      </div>
      <div class="text-center">
        <a href="#contact" class="btn-get-started scrollto">Kontaktirajte nas</a>
      </div>
      
      <div class="row icon-boxes">
      
      <?php
        $mysqli = new mysqli("localhost", "root", "", "interbell");
        if($mysqli->error){
          die("Greska prilikom konekcije sa bazom");
        }

        $upit = "SELECT * FROM `boxes` ORDER BY `id` ASC";

        $rez = $mysqli->query($upit);
        if(!$rez){
          print("Ne moze se izvrsiti upit!");
        }
        if(!($red=$rez->fetch_assoc())){
          print("Nema nista u bazi!!");
        } else {
          if($rez->num_rows>1){
              while($row = $rez->fetch_assoc()){
                echo "<div class=\"col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0\" data-aos=\"zoom-in\" data-aos-delay=\"200\">
                  <div class=\"icon-box\">
                      <div class=\"icon\"><i class=" . $row['icon'] . "></i></div>
                      <h4 class=\"title\">" . $row['title'] . "</h4>
                      <p class=\"description\">" . $row['description'] . "</p>
                  </div>
                </div>";
              }
            
          }
        }

      ?>

      </div>

    </div>
  </section><!-- End Hero -->


  <!-- ======= Counts Section ======= -->
  <section id="counts" class="counts section-bg">
    <div class="container">

      <div class="row justify-content-end">

        <div class="col-lg-4 col-md-5 col-6 d-md-flex align-items-md-stretch">
          <div class="count-box">
            <span data-purecounter-start="0" data-purecounter-end="1000" data-purecounter-duration="2"
              class="purecounter"></span>
            <p>Zadovoljnih klijenata</p>
          </div>
        </div>

        <div class="col-lg-4 col-md-5 col-6 d-md-flex align-items-md-stretch">
          <div class="count-box">
            <span data-purecounter-start="0" data-purecounter-end="500" data-purecounter-duration="2"
              class="purecounter"></span>
            <p>Projekata</p>
          </div>
        </div>

        <div class="col-lg-4 col-md-5 col-6 d-md-flex align-items-md-stretch">
          <div class="count-box">
            <span data-purecounter-start="0" data-purecounter-end="15" data-purecounter-duration="2"
              class="purecounter"></span>
            <p>Godina iskustva</p>
          </div>
        </div>
      </div>

    </div>
  </section><!-- End Counts Section -->


  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>O nama</h2>
        </div>

        <div class="row content">

        <?php
        $mysqli = new mysqli("localhost", "root", "", "interbell");
        if($mysqli->error){
          die("Greska prilikom konekcije sa bazom");
        }

        $upit = "SELECT * FROM `aboutus`";

        $rez = $mysqli->query($upit);
        if(!$rez){
          print("Ne moze se izvrsiti upit!");
        }
        if(!($red=$rez->fetch_assoc())){
          print("Nema nista u bazi!!");
        } else {
          echo "<div class=\"col-lg-12\">
                <p>" . $red['text'] . "   
                </p>
              </div>";

              echo "<div class=\"col-lg-12 pt-4 pt-lg-0\">
              <ul class=\"pt-4\">
                <li><i class=\"ri-check-double-line\"></i>" . $red['option1'] . " </li>
                <li><i class=\"ri-check-double-line\"></i> " . $red['option2'] . " </li>
                <li><i class=\"ri-check-double-line\"></i>" . $red['option3'] . " </li>
              </ul>
            </div>";
            
        }

      ?>

          
          
        </div>

      </div>
    </section><!-- End About Section -->




    <!-- ======= Services Section ======= -->
    <section id="services" class="services section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Usluge</h2>
        </div>

        <div class="row">
          
        <?php
        $mysqli = new mysqli("localhost", "root", "", "interbell");
        if($mysqli->error){
          die("Greska prilikom konekcije sa bazom");
        }

        $upit = "SELECT * FROM `services` ORDER BY `id` ASC";

        $rez = $mysqli->query($upit);
        if(!$rez){
          print("Ne moze se izvrsiti upit!");
        }
        if(!($red=$rez->fetch_assoc())){
          print("Nema nista u bazi!!");
        } else {
          if($rez->num_rows>1){
              while($row = $rez->fetch_assoc()){
                echo "<div class=\"col-lg-4 col-md-6 d-flex align-items-stretch mb-4\" data-aos=\"zoom-in\" data-aos-delay=\"100\">
                <div class=\"icon-box iconbox-" . $row['iconColor'] . "\">
                  <div class=\"icon\">
                    <svg width=\"100\" height=\"100\" viewBox=\"0 0 600 600\" xmlns=\"http://www.w3.org/2000/svg\">
                      <path stroke=\"none\" stroke-width=\"0\" fill=\"#f5f5f5\"
                        d=\"" . $row['svg'] . "\">
                      </path>
                    </svg>
                    <i class=\"" . $row['icon'] . "\"></i>
                  </div>
            <h4><a href=\"\">" . $row['title'] . "</a></h4>
            <p>" . $row['description'] . "</p>
          </div>
        </div>";
              }
            
          }
        }

      ?>

          </div>
          

        </div>

      </div>
    </section><!-- End Sevices Section -->


    <!-- ======= Clients Section ======= -->
    <section id="clients" class="clients section-bg" style="background-color: #fff; padding-block: 50px;">
      <div class="container">

        <div class="row">

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center" data-aos="zoom-in">
            <img src="./assets/img/clients/client-1.png" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center" data-aos="zoom-in">
            <img src="assets/img/clients/client-2.png" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center" data-aos="zoom-in">
            <img src="assets/img/clients/client-3.png" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center" data-aos="zoom-in">
            <img src="assets/img/clients/client-4.png" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center" data-aos="zoom-in">
            <img src="assets/img/clients/client-5.png" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center" data-aos="zoom-in">
            <img src="assets/img/clients/client-6.png" class="img-fluid" alt="">
          </div>

        </div>

      </div>
    </section><!-- End Clients Section -->

    <!-- ======= Team Section ======= -->
    <section id="team" class="team section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Naš tim</h2>
          <p>Naš tim čine stručnjaci sa dubokim iskustvom u instalaciji i integraciji sistema video nadzora i interfona.
            Posvećeni smo pružanju vrhunskih usluga i obezbeđivanju sigurnih rešenja za naše klijente. Sa timom koji se
            oslanja na inovacije i pažljiv pristup svakom projektu, garantujemo pouzdane i efikasne instalacije koje
            zadovoljavaju najviše standarde kvaliteta i bezbednosti.
          </p>
        </div>

        <div class="row">

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="300">
            <div class="member">
              <div class="member-img">
                <img src="assets/img/team/team-3.jpg" class="img-fluid" alt="">
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
              <div class="member-info">
                <h4>Stevan Ilić</h4>
                <span>Direktor</span>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
            <div class="member">
              <div class="member-img">
                <img src="assets/img/team/team-1.jpg" class="img-fluid" alt="">
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
              <div class="member-info">
                <h4>Stefan Mihajlović</h4>
                <span>Glavni izvođač radova</span>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
            <div class="member">
              <div class="member-img">
                <img src="assets/img/team/team-2.jpg" class="img-fluid" alt="">
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
              <div class="member-info">
                <h4>Filip Sekulić</h4>
                <span>Pomoćni izvođač radova</span>
              </div>
            </div>
          </div>





        </div>

      </div>
    </section><!-- End Team Section -->


    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Contact</h2>
        </div>

        <div>
          <iframe style="border:0; width: 100%; height: 270px;"
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1762.7967947541658!2d20.66958006213666!3d44.866196676037994!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x475a7f1ea328e7b3%3A0x4abbdab966af18d4!2sStevana%20Sremca%2030%2C%20Pan%C4%8Devo!5e0!3m2!1sen!2srs!4v1707579948255!5m2!1sen!2srs"
            frameborder="0" allowfullscreen></iframe>
        </div>

        <div class="row mt-5">

          <div class="col-lg-4">
            <div class="info">
              <div class="address">
                <i class="bi bi-geo-alt"></i>
                <h4>Lokacija:</h4>
                <p>Stevana Sremca 30, Pančevo, 26000</p>
              </div>

              <div class="email">
                <i class="bi bi-envelope"></i>
                <h4>Email:</h4>
                <p>interbell@gmail.com</p>
              </div>

              <div class="phone">
                <i class="bi bi-phone"></i>
                <h4>Telefon:</h4>
                <p>+381 63 321 827</p>
              </div>

            </div>

          </div>

          <div class="col-lg-8 mt-5 mt-lg-0">

            <form action="./forms/contact.php" method="post" role="form" class="php-email-form">
              <div class="row gy-2 gx-md-3">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                </div>
                <div class="col-md-6 form-group">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                </div>
                <div class="form-group col-12">
                  <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
                </div>
                <div class="form-group col-12">
                  <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
                </div>
                <div class="text-center col-12"><button type="submit">Send Message</button></div>
              </div>
            </form>

          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-6 col-md-6 footer-contact">
            <h3>INTERBELL d.o.o</h3>
            <p>
              Stevana Sremca 30 <br>
              Pančevo, 26000<br>
              Srbija <br><br>
              <strong>Telefon:</strong> +381 63 321 827<br>
              <strong>Email:</strong> interbell@gmail.com<br>
            </p>
          </div>



          <div class="col-lg-6 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Ugradnja video nadzora</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Ugradnja alarmnog sistema</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Ugradnja interfonskih sistema</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Ugradnja motora za kapije</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Ugradnja električarske instalacije</a></li>
            </ul>
          </div>

        </div>
      </div>
    </div>

    <div class="container d-md-flex py-4">

      <div class="me-md-auto text-center text-md-start">
        <div class="copyright">
          &copy; Copyright <strong><span>INTERBELL d.o.o</span></strong>. All Rights Reserved
        </div>
      </div>
      <div class="me-md-auto text-center text-md-start"><a href="./adminLoginPage/adminLogin.php">Admin panel</a></div>
      <div class="social-links text-center text-md-right pt-3 pt-md-0">
        <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
        <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- FontAwsome Icons -->
  <script src="https://kit.fontawesome.com/77324969d0.js" crossorigin="anonymous"></script>


  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>