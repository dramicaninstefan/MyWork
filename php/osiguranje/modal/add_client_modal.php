<!-- Modal za dodavanje novog klijenta-->
<div class="modal fade" id="addClientModal" tabindex="-1" aria-labelledby="exampleModalLabel" data-bs-backdrop="static"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content modal-custom">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Dodaj Klijenta</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="./client/add_client.php" method="POST" class="needs-validation" novalidate>
                    <div class="form-floating mt-2">
                        <input type="text" class="form-control" id="ime_prezime" name="ime_prezime"
                            placeholder="Unesite ime i prezime" autocomplete="off" required>
                        <label for="ime_prezime">Ime i prezime</label>
                        <div class="invalid-feedback">Morate uneti ime i prezime.</div>
                    </div>

                    <div class="form-floating mt-2">
                        <input type="text" class="form-control" id="kontakt" name="kontakt"
                            placeholder="Unesite kontakt (broj mora početi sa +381)" pattern="\+381\d{5,12}"
                            autocomplete="off" required>
                        <label for="kontakt">Kontakt (broj mora početi sa +381)</label>
                        <div class="invalid-feedback">Broj mora početi sa +381 i imati između 5 i 12 cifara.</div>
                    </div>

                    <div class="form-floating mt-2">
                        <input type="email" class="form-control" id="email" name="email" placeholder="Unesite email"
                            autocomplete="off">
                        <label for="email">Email</label>
                        <div class="invalid-feedback">Morate uneti ispravan email.</div>
                    </div>

                    <div class="form-floating mt-2">
                        <input type="text" class="form-control" id="jmbg" name="jmbg" pattern="\d{13}"
                            placeholder="MB/PIB" autocomplete="off" required>
                        <label for="jmbg">MB/PIB</label>
                        <div class="invalid-feedback">MB/PIB mora imati tačno 13 cifara.</div>
                    </div>

                    <div class="form-floating mt-2">
                        <input type="text" class="form-control" id="adresa" name="adresa"
                            placeholder="Unesite adresu i broj" autocomplete="off" required>
                        <label for="adresa">Adresa i broj</label>
                        <div class="invalid-feedback">Morate uneti adresu i broj.</div>
                    </div>

                    <div class="form-floating mt-2 mb-4">
                        <input type="text" class="form-control" id="mesto" name="mesto" placeholder="Unesite mesto"
                            autocomplete="off" required>
                        <label for="mesto">Mesto</label>
                        <div class="invalid-feedback">Morate uneti mesto.</div>
                    </div>

                    <button type="submit" class="btn btn-success">Dodaj</button>
                </form>
            </div>
        </div>
    </div>
</div>