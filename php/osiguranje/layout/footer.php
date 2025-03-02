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
                        </select>
                    </div>

                    <!-- Select za klijente -->
                    <div class="mb-3">
                        <label for="klijent" class="form-label">Izaberite klijenta</label>
                        <select class="form-select" name="klijent_id" id="klijent" required>
                            <option value="">Izaberite klijenta</option>
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

                <script>
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

                }
                </script>

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