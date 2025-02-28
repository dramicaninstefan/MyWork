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
                    </div>
                    <div class="mb-3 position-relative">
                        <i class="bi bi-telephone position-absolute top-50 start-0 translate-middle-y ms-3"></i>
                        <input type="text" class="form-control ps-5" name="kontakt"
                            placeholder="Unesite kontakt (Broj mora početi sa +381)" pattern="\+381\d{5,12}" required>
                        <!-- <div class="invalid-feedback">Broj mora početi sa +3816 i imati između 5 i 10 cifara.</div> -->
                    </div>
                    <div class="mb-3 position-relative">
                        <i class="bi bi-envelope position-absolute top-50 start-0 translate-middle-y ms-3"></i>
                        <input type="text" class="form-control ps-5" name="email" placeholder="Unesite email">
                    </div>
                    <div class="mb-3 position-relative">
                        <i class="bi bi-card-text position-absolute top-50 start-0 translate-middle-y ms-3"></i>
                        <input type="text" class="form-control ps-5" name="jmbg" pattern="\d{13}"
                            placeholder="Unesite JMBG (13 cifara)" required>
                    </div>
                    <div class="mb-3 position-relative">
                        <i class="bi bi-house position-absolute top-50 start-0 translate-middle-y ms-3"></i>
                        <input type="text" class="form-control ps-5" name="adresa" placeholder="Unesite adresu i broj"
                            required>
                    </div>
                    <div class="mb-3 position-relative">
                        <i class="bi bi-geo-alt position-absolute top-50 start-0 translate-middle-y ms-3"></i>
                        <input type="text" class="form-control ps-5" name="mesto" placeholder="Unesite mesto" required>
                    </div>
                    <button type="submit" class="btn btn-success">Dodaj</button>
                </form>
            </div>
        </div>
    </div>
</div>