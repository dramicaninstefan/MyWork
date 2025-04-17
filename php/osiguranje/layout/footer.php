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

let shouldWarnOnUnload = true;

// Deaktiviramo upozorenje kada korisnik klikne na interni link
document.addEventListener("click", function(e) {
    const target = e.target.closest("a");
    if (target && target.href && target.origin === location.origin) {
        // Kliknut je interni link — ne prikazuj upozorenje
        shouldWarnOnUnload = false;
    }
});
</script>

</body>

</html>