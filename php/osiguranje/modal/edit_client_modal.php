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
                    <div class="mb-3">
                        <label class="form-label">Ime i Prezime</label>
                        <input type="text" class="form-control" name="ime_prezime" id="editImePrezime" required>
                        <div class="invalid-feedback">Unesite ime i prezime.</div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Kontakt</label>
                        <input type="text" class="form-control" name="kontakt" id="editKontakt" required>
                        <div class="invalid-feedback">Unesite kontakt.</div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="text" class="form-control" name="email" id="editEmail">
                        <div class="invalid-feedback">Unesite email.</div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">JMBG</label>
                        <input type="text" class="form-control" name="jmbg" id="editJMBG" pattern="\d{13}">
                        <div class="invalid-feedback">Unesite validan JMBG (13 cifara).</div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Adresa</label>
                        <input type="text" class="form-control" name="adresa" id="editAdresa">
                        <div class="invalid-feedback">Unesite adresu.</div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Mesto</label>
                        <input type="text" class="form-control" name="mesto" id="editMesto">
                        <div class="invalid-feedback">Unesite mesto.</div>
                    </div>
                    <button type="submit" class="btn btn-warning">Sačuvaj</button>
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