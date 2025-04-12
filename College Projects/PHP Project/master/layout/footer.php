<div id="loader" class="loader-container">
    <div class="spinner"></div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("loader").style.display = "none"; // Sakrij loader kada se stranica učita
});

function showLoader() {
    document.getElementById("loader").style.display = "flex";
}

document.querySelectorAll("form").forEach(function(form) {
    form.addEventListener("submit", function(event) {
        if (!form.checkValidity()) {
            event.preventDefault(); // Sprečava slanje forme ako validacija nije prošla
            event.stopPropagation();
        } else {
            if (!form.classList.contains("no-loader")) { // Proverava da li forma nema 'no-loader' klasu
                showLoader(); // Prikaži loader samo ako forma nije označena za bez loadera
            }
        }
        form.classList.add("was-validated"); // Bootstrap stilovi za validaciju
    }, false);
});
</script>
<footer id="footer" class="footer dark-background">

    <div class="container footer-top">
        <div class="row gy-4">
            <div class="col-lg-4 col-md-6 footer-about">
                <a href="index.html" class="logo d-flex align-items-center">
                    <span class="sitename">Interbell</span>
                </a>
                <div class="footer-contact pt-3">
                    <p>Ulica Bezbednosti 24</p>
                    <p>11000 Beograd, Srbija</p>
                    <p class="mt-3"><strong>Telefon:</strong> <span>+381 64 123 4567</span></p>
                    <p><strong>Email:</strong> <span>kontakt@interbell.rs</span></p>
                </div>
                <div class="social-links d-flex mt-4">
                    <a href="#" aria-label="Twitter"><i class="bi bi-twitter-x"></i></a>
                    <a href="#" aria-label="Facebook"><i class="bi bi-facebook"></i></a>
                    <a href="#" aria-label="Instagram"><i class="bi bi-instagram"></i></a>
                    <a href="#" aria-label="LinkedIn"><i class="bi bi-linkedin"></i></a>
                </div>
            </div>

            <div class="col-lg-2 col-md-3 footer-links">
                <h4>Korisni linkovi</h4>
                <ul>
                    <li><a href="/">Početna</a></li>
                    <li><a href="/o-nama">O nama</a></li>
                    <li><a href="/prodavnica">Prodavnica</a></li>
                    <li><a href="#">Uslovi korišćenja</a></li>
                    <li><a href="#">Politika privatnosti</a></li>
                </ul>
            </div>

            <div class="col-lg-2 col-md-3 footer-links">
                <h4>Naše usluge</h4>
                <ul>
                    <li><a href="#">Ugradnja interfona</a></li>
                    <li><a href="#">Video nadzor</a></li>
                    <li><a href="#">Kontrola pristupa</a></li>
                    <li><a href="#">Održavanje sistema</a></li>
                    <li><a href="#">Tehnička podrška</a></li>
                </ul>
            </div>

            <div class="col-lg-2 col-md-3 footer-links">
                <h4>Brze informacije</h4>
                <ul>
                    <li><a href="#">Licenciranje</a></li>
                    <li><a href="/kontakt">Kontakt</a></li>
                </ul>
            </div>

            <div class="col-lg-2 col-md-3 footer-links">
                <h4>Radno vreme</h4>
                <ul>
                    <li><a href="#">Pon - Pet: 08:00 - 18:00</a></li>
                    <li><a href="#">Subota: 09:00 - 14:00</a></li>
                    <li><a href="#">Nedelja: Ne radimo</a></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="container copyright text-center mt-4">
        <p>© <span>Copyright</span> <strong class="px-1 sitename">INTERBELL DOO</strong> <span>Sva prava zadržana</span>
        </p>
    </div>

</footer>

<!-- Scroll Top -->
<a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>

<!-- Preloader -->
<div id="preloader"></div>

<!-- Vendor JS Files -->
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/php-email-form/validate.js"></script>
<script src="assets/vendor/aos/aos.js"></script>
<script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
<script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>

<!-- Main JS File -->
<script src="assets/js/main.js"></script>

<script>
//Bootstrap validacija
(function() {
    'use strict'
    var forms = document.querySelectorAll('.needs-validation')
    Array.prototype.slice.call(forms)
        .forEach(function(form) {
            form.addEventListener('submit', function(event) {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }
                form.classList.add('was-validated')
            }, false)
        })
})()
</script>

</body>

</html>