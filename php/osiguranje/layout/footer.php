<!-- <div id="loader" class="loader-container">
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
            showLoader(); // Prikaži loader samo ako je validacija uspešna
        }
        form.classList.add("was-validated"); // Bootstrap stilovi za validaciju
    }, false);
});
</script> -->

<?php require './modal/kreiraj_punomoc_modal.php'?>


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