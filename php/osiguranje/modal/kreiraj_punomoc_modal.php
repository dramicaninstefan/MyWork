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
                    <div class="form-floating mb-2">
                        <select class="form-select" name="advokat" id="advokat" required onchange="setFormAction()">
                            <option value="">Izaberite advokata</option>
                            <!-- <option value="1">Advokat Marija Kozomora</option> -->
                            <!-- <option value="2">Advokat Strahinja Mavrenski</option> -->
                            <option value="3">Advokat Ozren Slović</option>
                        </select>
                        <label for="advokat" class="form-label">Izaberite advokata</label>
                        <div class="invalid-feedback">Advokat je obavezan.</div>
                    </div>

                    <!-- Pretraga klijenata i Select sa filtriranjem -->
                    <div class="form-floating mt-2 position-relative">
                        <input type="text" id="searchKlijent" name="searchKlijent" class="form-control"
                            placeholder="Pretraži klijente..." autocomplete="off" required>
                        <label for="searchKlijent">Ime i prezime</label>
                        <div class="invalid-feedback">Ime i prezime je obavezno.</div>


                        <!-- Dugme X za resetovanje -->
                        <button type="button" tabindex="-1" id="resetSearch" class="btn btn-light position-absolute"
                            style="right: 10px; top: 50%; transform: translateY(-50%); display: none;">
                            <i class="bi bi-arrow-clockwise"></i>
                        </button>
                    </div>

                    <!-- Select za klijente -->
                    <div class="mb-2">
                        <select class="form-select" autocomplete="off" name="klijent_id" id="klijent" size="5"
                            style="display: none;">
                            <?php
                            include('config.php');

                            $sql = "SELECT * FROM klijent";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo '<option value="' . $row['id'] . '" data-mbpib="' . $row['jmbg'] . '">' . $row['ime_prezime'] . '</option>';
                                }
                            } else {
                                echo '<option value="">Nema klijenata</option>';
                            }
                            ?>
                        </select>
                    </div>

                    <!-- JavaScript -->
                    <script>
                    // Dodajte event listener na prvi input polje
                    document.getElementById('searchKlijent').addEventListener('keydown', function(event) {
                        // Ako je pritisnut taster "ArrowDown" (strelica na dole)
                        if (event.key === "ArrowDown") {
                            event.preventDefault(); // Sprečava default ponašanje (ako je potrebno)
                            // Premesti fokus na sledeći input
                            document.getElementById('klijent').focus();
                        }
                    });

                    document.addEventListener("DOMContentLoaded", function() {
                        let searchInput = document.getElementById("searchKlijent");
                        let selectKlijent = document.getElementById("klijent");
                        let resetButton = document.getElementById("resetSearch");

                        let options = document.querySelectorAll("#klijent option");

                        // Stilizacija opcija u select-u
                        options.forEach((option) => {
                            option.style.backgroundColor = "#fff";

                            option.addEventListener("mouseenter", function() {
                                this.style.backgroundColor = "#e7ecef";
                            });

                            option.addEventListener("mouseleave", function() {
                                this.style.backgroundColor = "#fff";
                            });
                        });

                        // Prikaz select-a pri fokusu na pretragu
                        searchInput.addEventListener("focus", function() {
                            selectKlijent.style.display = "block";
                        });

                        // Filtriranje opcija
                        searchInput.addEventListener("keyup", function() {
                            let filter = this.value.toLowerCase();
                            let hasValue = this.value.trim() !== "";

                            options.forEach(option => {
                                let text = option.textContent.toLowerCase();
                                option.style.display = text.includes(filter) || option.value ===
                                    "" ? "" : "none";
                            });

                            // Prikaz dugmeta X ako postoji unos
                            resetButton.style.display = hasValue ? "block" : "none";
                        });

                        // Zatvaranje select-a klikom van njega
                        document.addEventListener("click", function(e) {
                            if (!selectKlijent.contains(e.target) && e.target !== searchInput) {
                                selectKlijent.style.display = "none";
                            }
                        });

                        // Postavljanje vrednosti u input polja i sakrivanje MB/PIB inputa
                        selectKlijent.addEventListener("change", function() {
                            let selectedOption = this.options[this.selectedIndex];

                            if (selectedOption.value !== "") {
                                searchInput.value = selectedOption.textContent;
                            } else {
                                searchInput.value = '';
                            }

                            resetButton.style.display = "block"; // Prikaz dugmeta X nakon izbora
                        });

                        // Reset dugme - briše unos i prikazuje MB/PIB input
                        resetButton.addEventListener("click", function() {
                            searchInput.value = "";
                            selectKlijent.style.display = "none"; // Sakriva select
                            resetButton.style.display = "none"; // Sakriva X dugme
                        });

                        // Dodajemo blur event na search input
                        selectKlijent.addEventListener("blur", function() {
                            setTimeout(function() { // Koristimo setTimeout da bismo sačekali da tab navigacija završi
                                selectKlijent.style.display = "none";
                            }, 100);
                        });
                    });
                    </script>



                    <div class="row">
                        <!-- Input za unos procenta -->
                        <div class="col-6">
                            <div class="form-floating mb-3">
                                <input type="number" class="form-control" name="procenat" id="procenat" min="0"
                                    max="100" step="1" required>
                                <label for="procenat" class="form-label">Procenat</label>
                                <div class="invalid-feedback">Unesi procenat ili dinara.</div>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-floating mb-3">
                                <input type="number" class="form-control" name="dinara" id="dinara" required>
                                <label for="dinara" class="form-label">Dinara</label>
                            </div>
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
                        <div class="form-floating mb-3">
                            <select class="form-select" name="osig_kuce" id="osig_kuce">
                                <option value="">Osiguravajuća kuća</option>
                                <option value="DDOR Osiguranje">DDOR Osiguranje</option>
                                <option value="Dunav Osiguranje">Dunav Osiguranje</option>
                                <option value="AMS Osiguranje">AMS Osiguranje</option>
                                <option value="Globos Osiguranje">Globos Osiguranje</option>
                                <option value="Uniqa Osiguranje">Uniqa Osiguranje</option>
                                <option value="Triglav Osiguranje">Triglav Osiguranje</option>
                                <option value="Generali Osiguranje">Generali Osiguranje</option>
                                <option value="Milenijum Osiguranje">Milenijum Osiguranje</option>
                                <option value="Wiener Osiguranje">Wiener Osiguranje</option>
                                <option value="GRAWE Osiguranje">GRAWE Osiguranje</option>
                                <option value="SAVA Osiguranje">SAVA Osiguranje</option>
                            </select>
                            <label for="osig_kuce" class="form-label">Izaberite kuću</label>
                            <div class="invalid-feedback">Osiguravajuća kuća je obavezna.</div>
                        </div>

                        <!-- Input za unos broja štete -->
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="broj_stete" id="broj_stete">
                            <label for="broj_stete" class="form-label">Broj štete</label>
                            <div class="invalid-feedback">Broj štete je obavezan.</div>
                        </div>
                    </div>

                    <div class="my-4">
                        Logo advokata:
                        <a href="https://www.ilovepdf.com/edit-pdf" target="_blank">iLovePdf - Edit PDF</a>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Kreiraj punomoć</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

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
</script>