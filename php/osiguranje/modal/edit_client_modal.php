<!-- Modal za uređivanje klijenta -->
<div class="modal fade" id="editClientModal" tabindex="-1" aria-labelledby="editClientModalLabel"
    data-bs-backdrop="static" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content modal-custom">
            <div class="modal-header">
                <h5 class="modal-title" id="editClientModalLabel">Uredi Klijenta</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editClientForm" action="./client/edit_client.php" method="POST" class="needs-validation"
                    novalidate>
                    <input type="hidden" name="client_id" id="editClientId">

                    <div class="form-floating mt-2">
                        <input type="text" class="form-control" id="editImePrezime" name="ime_prezime"
                            placeholder="Unesite ime i prezime" autocomplete="off" required>
                        <label for="ime_prezime">Ime i prezime</label>
                        <div class="invalid-feedback">Ime i prezime je obavezno.</div>
                    </div>

                    <div class="form-floating mt-2">
                        <input type="text" class="form-control" id="editKontakt" name="kontakt"
                            placeholder="Unesite kontakt (broj mora početi sa +381)" pattern="\+381\d{5,12}"
                            autocomplete="off" required>
                        <label for="kontakt">Kontakt (broj mora početi sa +381)</label>
                        <div class="invalid-feedback">Broj mora početi sa +381 i imati između 5 i 12 cifara.</div>
                    </div>

                    <div class="form-floating mt-2">
                        <input type="email" class="form-control" id="editEmail" name="email" placeholder="Unesite email"
                            autocomplete="off">
                        <label for="email">Email</label>
                        <div class="valid-feedback">Email nije obavezan.</div>
                    </div>

                    <div class="form-floating mt-2">
                        <input type="text" class="form-control" id="editJMBG" name="jmbg" pattern="\d{13}"
                            placeholder="MB/PIB" autocomplete="off" required>
                        <label for="jmbg">MB/PIB</label>
                        <div class="invalid-feedback">MB/PIB mora imati tačno 13 cifara.</div>
                    </div>

                    <div class="form-floating mt-2">
                        <input type="text" class="form-control" id="editAdresa" name="adresa"
                            placeholder="Unesite adresu i broj" autocomplete="off" required>
                        <label for="adresa">Adresa i broj</label>
                        <div class="invalid-feedback">Adresa i broj su obavezni.</div>
                    </div>

                    <div class="form-floating mt-2 mb-4">
                        <input type="text" class="form-control" id="editMesto" name="mesto" placeholder="Unesite mesto"
                            autocomplete="off" required>
                        <label for="mesto">Mesto</label>
                        <div class="invalid-feedback">Mesto je obavezno.</div>
                    </div>


                    <button type="submit" class="btn btn-success">Sačuvaj promene</button>
                </form>

            </div>
        </div>
    </div>
</div>

<script>
function openEditModal(id, ime, kontakt, email, jmbg, adresa, mesto) {
    document.getElementById('editClientId').value = id;
    document.getElementById('editImePrezime').value = ime;
    document.getElementById('editKontakt').value = kontakt;
    document.getElementById('editEmail').value = email;
    document.getElementById('editJMBG').value = jmbg;
    document.getElementById('editAdresa').value = adresa;
    document.getElementById('editMesto').value = mesto;

    // Otvorite modal
    var editClientModal = new bootstrap.Modal(document.getElementById('editClientModal'));
    editClientModal.show();
}
</script>