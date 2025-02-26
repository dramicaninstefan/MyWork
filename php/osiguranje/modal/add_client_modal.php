<!-- Modal za dodavanje novog klijenta-->
<div class="modal fade" id="addClientModal" tabindex="-1" aria-labelledby="exampleModalLabel" data-bs-backdrop="static"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Dodaj Klijenta</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="./client/add_client.php" method="POST" class="needs-validation" novalidate>
                    <div class="mb-3 position-relative">
                        <i class="bi bi-person position-absolute top-50 start-0 translate-middle-y ms-3"></i>
                        <input type="text" class="form-control ps-5" name="ime_prezime"
                            placeholder="Unesite ime i prezime" required>
                        <!-- <div class="invalid-feedback">Unesite ime i prezime.</div> -->
                    </div>
                    <div class="mb-3 position-relative">
                        <i class="bi bi-telephone position-absolute top-50 start-0 translate-middle-y ms-3"></i>
                        <input type="text" class="form-control ps-5" name="kontakt" placeholder="Unesite kontakt"
                            required>
                        <!-- <div class="invalid-feedback">Unesite kontakt.</div> -->
                    </div>
                    <div class="mb-3 position-relative">
                        <i class="bi bi-envelope position-absolute top-50 start-0 translate-middle-y ms-3"></i>
                        <input type="text" class="form-control ps-5" name="email" placeholder="Unesite email">
                        <!-- <div class="invalid-feedback">Unesite kontakt.</div> -->
                    </div>
                    <div class="mb-3 position-relative">
                        <i class="bi bi-card-text position-absolute top-50 start-0 translate-middle-y ms-3"></i>
                        <input type="text" class="form-control ps-5" name="jmbg" pattern="\d{13}"
                            placeholder="Unesite JMBG (13 cifara)" required>
                        <!-- <div class="invalid-feedback">Unesite validan JMBG (13 cifara).</div> -->
                    </div>
                    <div class="mb-3 position-relative">
                        <i class="bi bi-house position-absolute top-50 start-0 translate-middle-y ms-3"></i>
                        <input type="text" class="form-control ps-5" name="adresa" placeholder="Unesite adresu i broj"
                            required>
                        <!-- <div class="invalid-feedback">Unesite adresu i broj.</div> -->
                    </div>
                    <div class="mb-3 position-relative">
                        <i class="bi bi-geo-alt position-absolute top-50 start-0 translate-middle-y ms-3"></i>

                        <input type="text" class="form-control ps-5" name="mesto" placeholder="Unesite mesto" required>
                        <!-- <div class="invalid-feedback">Unesite mesto.</div> -->
                    </div>
                    <button type="submit" class="btn btn-success">Dodaj</button>
                </form>
            </div>
        </div>
    </div>
</div>