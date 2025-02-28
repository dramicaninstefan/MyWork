<!-- Modal kreiraj punomoć -->
<div class="modal fade" id="punomocModal" tabindex="-1" aria-labelledby="punomocModalLabel" aria-hidden="true"
    data-bs-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="punomocModalLabel">Unesite podatke za punomoć</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Forma za unos podataka -->
                <form action="../damage/punomoc.php" method="post" class="needs-validation" novalidate>
                    <!-- Select za klijente -->
                    <div class="mb-3">
                        <label for="klijent" class="form-label">Izaberite klijenta</label>
                        <select class="form-select" name="klijent_id" id="klijent" required onchange="setClientId()">
                            <option value="">Izaberite klijenta</option>
                            <!-- Opcije dolaze iz PHP-a -->
                            <?php
                            // Uključite config.php za povezivanje sa bazom
                            include('config.php'); // Ovaj fajl mora biti u istoj fascikli ili navedite apsolutnu putanju


                            // SQL upit za SELECT *
                            $sql = "SELECT * FROM klijent";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                // Ispisivanje opcija za klijente
                                while ($row = $result->fetch_assoc()) {
                                    echo '<option value="' . $row['id'] . '">' . $row['ime_prezime'] . '</option>';
                                }
                            } else {
                                echo '<option value="">Nema klijenata</option>';
                            }
                            $conn->close();
                            ?>
                        </select>
                    </div>

                    <!-- Input za unos procenta -->
                    <div class="mb-3">
                        <label for="procenat" class="form-label">Procenat</label>
                        <input type="number" class="form-control" name="procenat" id="procenat" min="0" max="100"
                            step="0.01" required>
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