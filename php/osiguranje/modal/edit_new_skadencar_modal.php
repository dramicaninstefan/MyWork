<!-- Modal za dodavanje novog klijenta-->
<div class="modal fade" id="editSkadarModal" tabindex="-1" aria-labelledby="exampleModalLabel" data-bs-backdrop="static"
    aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content modal-custom">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Uredi polisu</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="../skadar/edit_skadencar.php" method="POST" class="needs-validation no-loader" novalidate>
                    <input type="hidden" id="editId" name="id">

                    <div class="form-floating mb-2">
                        <input type="text" class="form-control" id="editBrojPolise" name="broj_polise"
                            placeholder="Unesite ime i prezime" autocomplete="off" required>
                        <label for="broj_polise">Broj polise</label>
                        <div class="invalid-feedback">Morate uneti broj polise.</div>
                    </div>

                    <div class="form-floating mb-2">
                        <input type="text" class="form-control" id="editImePrezime" name="ime_prezime"
                            placeholder="Unesite ime i prezime" autocomplete="off" required>
                        <label for="ime_prezime">Ime i prezime</label>
                        <div class="invalid-feedback">Morate uneti ime i prezime.</div>
                    </div>

                    <!-- <div class="form-floating mt-2">
                        <input type="text" class="form-control" id="kontakt" name="kontakt"
                            placeholder="Unesite kontakt (broj mora početi sa +381)" pattern="\+381\d{5,12}"
                            autocomplete="off">
                        <label for="kontakt">Kontakt (broj mora početi sa +381)</label>
                        <div class="invalid-feedback">Broj mora početi sa +381 i imati između 5 i 12 cifara.</div>
                    </div> -->

                    <div class="form-floating mb-2">
                        <select class="form-select mb-2" id="editOsigKuca" name="osig_kuca" autocomplete="off" required>
                            <option value="">Izaberi...</option>
                            <option value="DUNAV">Dunav osiguranje</option>
                            <option value="DDOR">DDOR Novi Sad</option>
                            <option value="AMS">AMS osiguranje</option>
                            <option value="GLOBOS">Globos osiguranje</option>
                            <option value="UNIQA">Uniqa osiguranje</option>
                            <option value="TRIGLAV">Triglav osiguranje</option>
                            <option value="GENARALI">Generali osiguranje</option>
                            <option value="MILENIJUM">Milenijum osiguranje</option>
                            <option value="WIENER">Wiener Stadtische</option>
                            <option value="GRAWE">Grawe osiguranje</option>
                            <option value="SAVA">Sava osiguranje</option>
                        </select>
                        <label for="osig_kuca">Osiguravajuća kuća</label>
                        <div class="invalid-feedback">Osiguravajuća kuća je obavezna!</div>
                    </div>

                    <div class="form-floating mb-2">
                        <input type="date" class="form-control" id="editSkadencarPocetak" name="skadencar_pocetak"
                            placeholder="Unesite skadencar_pocetak" autocomplete="off" required>
                        <label for="skadencar_pocetak">Skadenca početak</label>
                        <div class="invalid-feedback">Početak datuma skadencara je obavezan!</div>
                    </div>

                    <div class="form-floating mb-2">
                        <select class="form-select mb-2" id="editGranaTarifa" name="grana_tarifa" autocomplete="off"
                            required>
                            <option value="">Izaberi...</option>
                            <option value="CMR">CMR</option>
                            <option value="IMOVINA">Imovina</option>
                            <option value="KASKO">Kasko</option>
                            <option value="NEZGODA">Nezgoda</option>
                            <option value="ODGOVORNOST">Odgovornost</option>
                            <option value="PAKET PUTNOG">Paket putnog</option>
                            <option value="POLJOPRIVREDA">Poljoprivreda</option>
                            <option value="POMOĆ NA PUTU">Pomoć na putu</option>
                            <option value="PZO">PZO</option>
                            <option value="STAKLA">Stakla</option>
                            <option value="USEVI">Usevi</option>
                            <option value="ZDRAVSTVENO">Zdravstveno</option>
                            <option value="ŽIVOTNO">Životno</option>
                            <option value="ŽIVOTNO KREDIT">Životno kredit</option>

                        </select>
                        <label for="grana_tarifa">Grana tarife</label>
                        <div class="invalid-feedback">Grana tarife je obavezna!</div>
                    </div>

                    <div class="form-floating mt-2 mb-2">
                        <input type="number" step="0.01" min="0" class="form-control" id="editPremijaSaPorezom"
                            name="premija_sa_porezom" placeholder="Unesite premija_sa_porezom" autocomplete="off"
                            required>
                        <label for="premija_sa_porezom">Premija sa porezom</label>
                        <div class="invalid-feedback">Premija je obavezna!</div>
                    </div>

                    <div>
                        <div class="form-floating mb-2">
                            <select class="form-select mb-2" id="editNacinPlacanja" name="nacin_placanja"
                                autocomplete="off" required>
                                <option value="">Izaberi...</option>
                                <option value="U CELOSTI">U celosti</option>
                                <option value="NA RATE">Na rate</option>
                            </select>
                            <label for="regOznaka">Način plaćanja</label>
                            <div class="invalid-feedback">Način plaćanja je obavezan!</div>
                        </div>
                    </div>

                    <div class="form-floating mb-2">
                        <input type="text" class="form-control" id="editBrokerskaKuca" name="brokerska_kuca"
                            placeholder="Unesite brokerska_kuca" autocomplete="off">
                        <label for="brokerska_kuca">Brokerska kuća</label>
                        <div class="invalid-feedback">Morate uneti mesto.</div>
                    </div>

                    <div class="form-floating mb-2">
                        <textarea class="form-control" id="editKomentar" name="komentar" placeholder="Unesite komentar"
                            autocomplete="off" style="height: 100px"></textarea>
                        <label for="komentar">Komentar</label>
                    </div>


                    <button type="submit" class="btn btn-success">Sačuvaj promene</button>
                    <button type="button" class=" btn btn-danger">Obriši polisu</button>

                </form>



            </div>

        </div>
    </div>
</div>


<script>
function editSkadarModal(id, broj_polise, ime_prezime, osig_kuca, skadencar_pocetak, grana_tarifa, premija_sa_porezom,
    nacin_placanja, brokerska_kuca, komentar) {
    document.getElementById('editId').value = id;
    document.getElementById('editBrojPolise').value = broj_polise;
    document.getElementById('editImePrezime').value = ime_prezime;
    document.getElementById('editOsigKuca').value = osig_kuca;
    document.getElementById('editSkadencarPocetak').value = skadencar_pocetak;
    document.getElementById('editGranaTarifa').value = grana_tarifa;
    document.getElementById('editPremijaSaPorezom').value = premija_sa_porezom;
    document.getElementById('editNacinPlacanja').value = nacin_placanja;
    document.getElementById('editBrokerskaKuca').value = brokerska_kuca;
    document.getElementById('editKomentar').value = komentar;

    var editSkadarModal = new bootstrap.Modal(document.getElementById('editSkadarModal'));
    editSkadarModal.show();
}
</script>