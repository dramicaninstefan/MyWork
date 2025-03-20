<div class="modal fade " id="prijavaModal" tabindex="-1" aria-labelledby="prijavaModalLabel" aria-hidden="true"
    data-bs-backdrop="static">
    <div class="modal-dialog modal-xl ">
        <div class="modal-content modal-custom">
            <div class="modal-header">
                <h5 class="modal-title" id="prijavaModalLabel">Prijava štete</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="stetaForm" action="../damage/odstetni_zahtev.php" method="POST" class="needs-validation"
                    novalidate>
                    <h6>Podaci o oštećenom</h6>

                    <!-- Pretraga klijenata i Select sa filtriranjem -->
                    <div class="mb-3">
                        <label for="searchKlijentOZ" class="form-label">Izaberite klijenta</label>
                        <input type="text" id="searchKlijentOZ" class="form-control" placeholder="Pretraži klijente..."
                            autocomplete="off" required>
                    </div>

                    <div class="mb-3">
                        <select class="form-select" name="klijent_id" id="klijentOZ" required size="5"
                            style="display: none;">
                            <?php
                            include('config.php');

                            $sql = "SELECT * FROM klijent";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo '<option value="' . $row['id'] . '">' . $row['ime_prezime'] . '</option>';
                                }
                            } else {
                                echo '<option value="">Nema klijenata</option>';
                            }
                            ?>
                        </select>
                    </div>

                    <!-- JavaScript za filtriranje, otvaranje select-a, i postavljanje vrednosti u input -->
                    <script>
                    // Otvori select kada se klikne na pretragu
                    document.getElementById('searchKlijentOZ').addEventListener('focus', function() {
                        document.getElementById('klijentOZ').style.display = 'block'; // Prikazati select
                    });

                    // Filtriranje opcija u select-u dok korisnik unosi tekst
                    document.getElementById('searchKlijentOZ').addEventListener('keyup', function() {
                        let filter = this.value.toLowerCase();
                        let options = document.querySelectorAll("#klijentOZ option");

                        options.forEach(option => {
                            let text = option.textContent.toLowerCase();
                            option.style.display = text.includes(filter) || option.value === "" ?
                                "" :
                                "none";
                        });
                    });

                    // Zatvori select ako korisnik klikne izvan njega
                    document.addEventListener('click', function(e) {
                        let select = document.getElementById('klijentOZ');
                        if (!select.contains(e.target) && e.target !== document.getElementById(
                                'searchKlijentOZ')) {
                            select.style.display = 'none'; // Zatvori select ako klikneš izvan njega
                        }
                    });

                    // Postavljanje vrednosti u input kada je odabran klijent iz select-a
                    document.getElementById('klijentOZ').addEventListener('change', function() {
                        let selectedOption = this.options[this.selectedIndex];
                        let searchInput = document.getElementById('searchKlijentOZ');
                        if (selectedOption.value !== "") {
                            searchInput.value = selectedOption
                                .textContent; // Postavi naziv odabranog klijenta u input
                        } else {
                            searchInput.value = ''; // Ako nije odabran klijent, input ostaje prazan
                        }
                        // Zatvori select nakon što je odabran klijent
                        document.getElementById('klijentOZ').style.display = 'none';
                    });
                    </script>

                    <input class="form-control mb-2" type="text" name="marka_tip_vozila"
                        placeholder="Marka i tip vozila" required>
                    <input class="form-control mb-2" type="text" name="registraciona_oznaka"
                        placeholder="Registraciona oznaka" required>
                    <input class="form-control mb-2" type="text" name="broj_racuna" placeholder="Broj računa oštećenog"
                        required>
                    <input class="form-control mb-2" type="text" name="naziv_banke" placeholder="Naziv banke" required>

                    <h6>Podaci o štetniku</h6>
                    <input class="form-control mb-2" type="text" name="ime_prezime_stetnik" placeholder="Ime i prezime"
                        required>
                    <input class="form-control mb-2" type="text" name="mb_pib_stetnik" placeholder="MB/PIB" required>
                    <input class="form-control mb-2" type="text" name="adresa_stetnik" placeholder="Adresa" required>
                    <input class="form-control mb-2" type="text" name="marka_tip_vozila_stetnik"
                        placeholder="Marka i tip vozila" required>
                    <input class="form-control mb-2" type="text" name="registraciona_oznaka_stetnik"
                        placeholder="Registraciona oznaka" required>
                    <select class="form-select mb-2" name="osiguranje" required>
                        <option value="">Izaberite osiguranje</option>
                        <option value="Dunav Osiguranje">Dunav osiguranje</option>
                        <option value="DDOR Osiguranje">DDOR Novi Sad</option>
                        <option value="Uniqa Osiguranje">Uniqa osiguranje</option>
                        <option value="Triglav Osiguranje">Triglav osiguranje</option>
                        <option value="Generali Osiguranje">Generali osiguranje</option>
                        <option value="Wiener Osiguranje">Wiener Stadtische</option>
                        <option value="Sava Osiguranje">Sava osiguranje</option>
                        <option value="Milenijum Osiguranje">Milenijum osiguranje</option>
                        <option value="Globos Osiguranje">Globos osiguranje</option>
                        <option value="AMS Osiguranje">AMS osiguranje</option>
                        <option value="GRAWE Osiguranje">Grawe osiguranje</option>
                    </select>
                    <input class="form-control mb-2" type="text" name="broj_polise" placeholder="Broj polise" required>

                    <h6>Podaci o nezgodi</h6>
                    <input class="form-control mb-2" type="date" name="datum_nezgode" required>
                    <input class="form-control mb-2" type="text" name="mesto_nezgode" placeholder="Mesto nezgode"
                        required>
                    <input class="form-control mb-2" type="text" name="ulica_broj" placeholder="Ulica i broj" required>

                    <h6>Odaberite tip prijave</h6>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="tipPrijave" id="tip1" value="1" required>
                        <label class="form-check-label" for="tip1">Zapisnik policije o izvršenom uviđaju</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="tipPrijave" id="tip2" value="2" required>
                        <label class="form-check-label" for="tip2">Evropski izveštaj bez službene beleške</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="tipPrijave" id="tip3" value="3" required>
                        <label class="form-check-label" for="tip3">Evropski izveštaj sa službenom beleškom</label>
                    </div>

                    <h6>Cifra</h6>
                    <input class="form-control mb-2" type="number" name="iznos_za_naplatu"
                        placeholder="Iznos za naplatu" required>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Zatvori</button>
                <button type="submit" class="btn btn-primary" form="stetaForm">Pošalji</button>
            </div>
        </div>
    </div>
</div>






<!-- Modal kreiraj punomoć -->
<div class="modal fade" id="punomocModal" tabindex="-1" aria-labelledby="punomocModalLabel" aria-hidden="true"
    data-bs-backdrop="static">
    <div class="modal-dialog  modal-lg">
        <div class="modal-content" style="background-color: #dbe2e8;">
            <div class="modal-header">
                <h5 class="modal-title" id="punomocModalLabel">Unesite podatke za punomoć</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Forma za unos podataka -->
                <form id="clientForm" action="" method="post" class="needs-validation" novalidate>
                    <!-- Select za advokate (ručno uneti) -->
                    <div class="mb-3">
                        <label for="advokat" class="form-label">Izaberite advokata</label>
                        <select class="form-select" name="advokat" id="advokat" required onchange="setFormAction()">
                            <option value="">Izaberite advokata</option>
                            <option value="1">Advokat Marija Kozomora</option>
                            <option value="2">Advokat Strahinja Mavrenski</option>
                            <option value="3">Advokat Ozren Slović</option>
                        </select>
                    </div>

                    <!-- Pretraga klijenata i Select sa filtriranjem -->
                    <div class="mb-3">
                        <label for="searchKlijent" class="form-label">Izaberite klijenata</label>
                        <input type="text" id="searchKlijent" class="form-control" placeholder="Pretraži klijente..."
                            autocomplete="off" required>
                    </div>

                    <div class="mb-3">
                        <select class="form-select" name="klijent_id" id="klijent" required size="5"
                            style="display: none;">
                            <?php
                            include('config.php');

                            $sql = "SELECT * FROM klijent";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo '<option value="' . $row['id'] . '">' . $row['ime_prezime'] . '</option>';
                                }
                            } else {
                                echo '<option value="">Nema klijenata</option>';
                            }
                            ?>
                        </select>
                    </div>

                    <!-- JavaScript za filtriranje, otvaranje select-a, i postavljanje vrednosti u input -->
                    <script>
                    // Otvori select kada se klikne na pretragu
                    document.getElementById('searchKlijent').addEventListener('focus', function() {
                        document.getElementById('klijent').style.display = 'block'; // Prikazati select
                    });

                    // Filtriranje opcija u select-u dok korisnik unosi tekst
                    document.getElementById('searchKlijent').addEventListener('keyup', function() {
                        let filter = this.value.toLowerCase();
                        let options = document.querySelectorAll("#klijent option");

                        options.forEach(option => {
                            let text = option.textContent.toLowerCase();
                            option.style.display = text.includes(filter) || option.value === "" ? "" :
                                "none";
                        });
                    });

                    // Zatvori select ako korisnik klikne izvan njega
                    document.addEventListener('click', function(e) {
                        let select = document.getElementById('klijent');
                        if (!select.contains(e.target) && e.target !== document.getElementById(
                                'searchKlijent')) {
                            select.style.display = 'none'; // Zatvori select ako klikneš izvan njega
                        }
                    });

                    // Postavljanje vrednosti u input kada je odabran klijent iz select-a
                    document.getElementById('klijent').addEventListener('change', function() {
                        let selectedOption = this.options[this.selectedIndex];
                        let searchInput = document.getElementById('searchKlijent');
                        if (selectedOption.value !== "") {
                            searchInput.value = selectedOption
                                .textContent; // Postavi naziv odabranog klijenta u input
                        } else {
                            searchInput.value = ''; // Ako nije odabran klijent, input ostaje prazan
                        }
                        // Zatvori select nakon što je odabran klijent
                        document.getElementById('klijent').style.display = 'none';
                    });
                    </script>


                    <div class="row">
                        <!-- Input za unos procenta -->
                        <div class="mb-3 col-6">
                            <label for="procenat" class="form-label">Procenat</label>
                            <input type="number" class="form-control" name="procenat" id="procenat" min="0" max="100"
                                step="1" required>
                        </div>

                        <div class="mb-3 col-6">
                            <label for="dinara" class="form-label">Dinara</label>
                            <input type="number" class="form-control" name="dinara" id="dinara" required>
                        </div>
                    </div>

                    <!-- Checkbox za prikaz dodatnih polja -->
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="toggleFields" onclick="toggleExtraFields()">
                        <label class="form-check-label" for="toggleFields">Štikliraj za posebnu punomomoć</label>
                    </div>

                    <!-- Sekcija koja se pojavljuje kada je checkbox označen -->
                    <div id="extraFields" style="display: none;">
                        <!-- Select za osiguravajuće kuće -->
                        <div class="mb-3">
                            <label for="osig_kuce" class="form-label">Izaberite kuću</label>
                            <select class="form-select" name="osig_kuce" id="osig_kuce">
                                <option value="">Osiguravajuća kuća</option>
                                <option value="DDOR">DDOR Osiguranje</option>
                                <option value="Dunav">Dunav Osiguranje</option>
                                <option value="AMS">AMS Osiguranje</option>
                                <option value="Generali">Generali Osiguranje</option>
                                <option value="Milenijum">Milenijum Osiguranje</option>
                                <option value="Uniqa">Uniqa Osiguranje</option>
                                <option value="Globos">Globos Osiguranje</option>
                                <option value="Triglav">Triglav Osiguranje</option>
                                <option value="Wiener">Wiener Osiguranje</option>
                                <option value="GRAWE">GRAWE Osiguranje</option>
                                <option value="SAVA">SAVA Osiguranje</option>
                            </select>
                        </div>

                        <!-- Input za unos broja štete -->
                        <div class="mb-3">
                            <label for="broj_stete" class="form-label">Broj štete</label>
                            <input type="text" class="form-control" name="broj_stete" id="broj_stete">
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Kreiraj punomoć</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>



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
            showLoader(); // Prikaži loader samo ako je validacija uspešna
        }
        form.classList.add("was-validated"); // Bootstrap stilovi za validaciju
    }, false);
});
</script>

<script>
// Funkcija koja postavlja client_id na vrednost izabranog klijenta
function setClientId() {
    var clientId = document.getElementById("klijent").value;
    document.getElementById("editClientId").value = clientId;
}

// procenat ili dinara toggle disable input
document.addEventListener("DOMContentLoaded", function() {
    let procenatInput = document.getElementById("procenat");
    let dinaraInput = document.getElementById("dinara");

    function toggleInputs() {
        if (procenatInput.value) {
            dinaraInput.disabled = true;
        } else {
            dinaraInput.disabled = false;
        }

        if (dinaraInput.value) {
            procenatInput.disabled = true;
        } else {
            procenatInput.disabled = false;
        }
    }

    procenatInput.addEventListener("input", toggleInputs);
    dinaraInput.addEventListener("input", toggleInputs);
});


// Toggle ekstra fields
function toggleExtraFields() {
    var extraFields = document.getElementById("extraFields");
    var checkbox = document.getElementById("toggleFields");

    if (checkbox.checked) {
        extraFields.style.display = "block";
        document.getElementById("osig_kuce").setAttribute("required", "required");
        document.getElementById("broj_stete").setAttribute("required", "required");
    } else {
        extraFields.style.display = "none";
        document.getElementById("osig_kuce").removeAttribute("required");
        document.getElementById("broj_stete").removeAttribute("required");
    }
}

// menja advokata
function setFormAction() {
    var form = document.getElementById("clientForm");
    var advokatSelect = document.getElementById("advokat");

    if (advokatSelect.value == 1) {
        form.action = "../damage/punomoc-adv1.php";
    }
    if (advokatSelect.value == 2) {
        form.action = "../damage/punomoc-adv2.php";
    }
    if (advokatSelect.value == 3) {
        form.action = "../damage/punomoc-adv3.php";
    }

}


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