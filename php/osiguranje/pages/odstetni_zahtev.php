<?php

// Uključite config.php za povezivanje sa bazom
include('config.php'); // Ovaj fajl mora biti u istoj fascikli ili navedite apsolutnu putanju

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $steteId = $_POST['id'];
    $klijentId = $_POST['klijent_id']; // ili iz $_GET, zavisno od toga kako prosleđujete id

    // Upit sa JOIN-om za pretragu klijenta po steteId
    $sql = "SELECT k.ime_prezime, ks.osig_kuca_stetnik
            FROM klijent k
            JOIN klijenti_stete ks ON k.id = ks.klijent_id
            WHERE ks.id = ?";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $steteId);
    $stmt->execute();
    $result = $stmt->get_result();

    // Ako je klijent pronađen, postavite ime u input polje
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $klijentIme = $row['ime_prezime'];
        $osig_kuca_stetnik = $row['osig_kuca_stetnik'];
    } else {
        $klijentIme = ''; // Ako klijent nije pronađen, ostavite prazno
        $osig_kuca_stetnik = ''; // Ako klijent nije pronađen, ostavite prazno
    }
}
?>


<div class="container mt-5">
    <!-- <h2>Unesite podatke za odštetni zahtev</h2> -->

    <form id="stetaForm" action="../damage/kreiraj_odstetni_zahtev.php" method="POST" class="needs-validation mb-5"
        novalidate>
        <div class="sticky-top pt-5 d-flex justify-content-between modal-custom">

            <h3 class="text-center">Klijent: <?php echo $klijentIme?></h3>
            <div class='d-flex'>
                <!-- Button to trigger the modal -->
                <a class="btn btn-dark mb-3" href="javascript:void(0)" id="cancelButton"
                    style="margin-right: 10px;">Odustani</a>
                <button type="submit" class="btn btn-primary mb-3">Kreiraj odštetni zahtev</button>
            </div>
        </div>

        <!-- <div class="form-floating mt-4">
            <select class="form-select mb-2" name="oz_select" id="oz_select">
                <?php
            // SQL upit za dobijanje podataka
            $sql = "SELECT * FROM odstetni_zahtev WHERE stete_id = ? AND klijent_id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ii", $steteId, $klijentId);
            $stmt->execute();
            $result = $stmt->get_result();

            // Prikazivanje podataka u select opcijama
            while ($row = $result->fetch_assoc()) {
                echo '<option value="' . $row['id'] . '">' . $row['created_date'] . '</option>';
            }

            // Zatvorite konekciju
            $stmt->close();
            $conn->close();
            ?>
            </select>
            <label for="oz_select">ISTORIJA ODŠTETNI ZAHTEVI</label>
        </div> -->

        <!-- Skriveni input za ID -->
        <input type="hidden" id="modalRowId" name="row_id">

        <h6 class="mt-3">Podaci o oštećenom</h6>

        <!-- Skriveni input za stete_id i klijent_id -->
        <input type="hidden" name="stete_id" id="stete_id" value="<?php echo isset($steteId) ? $steteId : ''; ?>">
        <input type="hidden" name="klijent_id" id="klijent_id"
            value="<?php echo isset($klijentId) ? $klijentId : ''; ?>">

        <!-- Input za ime klijenta -->
        <div class="mb-2">
            <div class="form-floating mb-4 ">
                <input type="text" class="form-control" id="klijentIme" placeholder="Marka i tip vozila"
                    value="<?php echo htmlspecialchars($klijentIme); ?>" readonly>
                <label for="klijentIme">Ime i prezime / Naziv firme</label>
            </div>
        </div>

        <div class="row">
            <!-- Polja za unos -->
            <div class="col-6">
                <div class="form-floating mb-2">
                    <input type="text" class="form-control" id="marka_tip_vozila" name="marka_tip_vozila"
                        placeholder="Marka i tip vozila" autocomplete="off" required>
                    <label for="marka_tip_vozila">Marka i tip vozila</label>
                </div>
            </div>

            <div class="col-6">
                <div class="form-floating mb-2">
                    <input type="text" class="form-control" id="registraciona_oznaka" name="registraciona_oznaka"
                        placeholder="Registraciona oznaka" autocomplete="off" required>
                    <label for="registraciona_oznaka">Registraciona oznaka</label>
                </div>
            </div>

            <div class="col-6">
                <div class="form-floating mb-2">
                    <input type="text" class="form-control" id="broj_racuna" name="broj_racuna"
                        placeholder="Broj računa oštećenog" autocomplete="off" required>
                    <label for="broj_racuna">Broj računa</label>
                </div>
            </div>

            <div class="col-6">
                <div class="form-floating mb-2">
                    <input type="text" class="form-control" id="naziv_banke" name="naziv_banke"
                        placeholder="Naziv banke" autocomplete="off" required>
                    <label for="naziv_banke">Naziv banke</label>
                </div>
            </div>
        </div>



        <h6 class="mt-3">Podaci o štetniku</h6>
        <div class="row">
            <div class="col-6">
                <div class="form-floating mb-2">
                    <input type="text" class="form-control" id="ime_prezime_stetnik" name="ime_prezime_stetnik"
                        placeholder="Ime i prezime / Naziv firme" autocomplete="off" required>
                    <label for="ime_prezime_stetnik">Ime i prezime / Naziv firme</label>
                </div>
            </div>

            <div class="col-6">
                <div class="form-floating mb-2">
                    <input type="text" class="form-control" id="mb_pib_stetnik" name="mb_pib_stetnik"
                        placeholder="MB/PIB" autocomplete="off" required>
                    <label for="mb_pib_stetnik">MB/PIB</label>
                </div>
            </div>

            <div class="col-6">
                <div class="form-floating mb-2">
                    <input type="text" class="form-control" id="adresa_stetnik" name="adresa_stetnik"
                        placeholder="Adresa" autocomplete="off" required>
                    <label for="adresa_stetnik">Adresa</label>
                </div>
            </div>

            <div class="col-6">
                <div class="form-floating mb-2">
                    <input type="text" class="form-control" id="marka_tip_vozila_stetnik"
                        name="marka_tip_vozila_stetnik" placeholder="Marka i tip vozila" autocomplete="off" required>
                    <label for="marka_tip_vozila_stetnik">Marka i tip vozila</label>
                </div>
            </div>

            <div class="col-6">
                <div class="form-floating mb-2">
                    <input type="text" class="form-control" id="registraciona_oznaka_stetnik"
                        name="registraciona_oznaka_stetnik" placeholder="Registraciona oznaka" autocomplete="off"
                        required>
                    <label for="registraciona_oznaka_stetnik">Registraciona oznaka</label>
                </div>
            </div>
        </div>

        <div class="row">

            <div class="col-6">
                <!-- Input za osig_kuca_stetnik -->
                <div class="form-floating mt-4">
                    <input type="text" class="form-control" id="klijentIme" name="osiguranje"
                        placeholder="Marka i tip vozila" value="<?php echo htmlspecialchars($osig_kuca_stetnik); ?>"
                        readonly>
                    <label for="klijentIme">Osiguravajuća kuća</label>
                </div>
            </div>

            <div class="col-6">
                <div class="form-floating mt-4">
                    <input type="text" class="form-control" id="broj_polise" name="broj_polise"
                        placeholder="Broj polise" autocomplete="off" required>
                    <label for="broj_polise">Broj polise</label>
                </div>
            </div>
        </div>

        <h6 class="mt-3">Podaci o nezgodi</h6>
        <div class="row">
            <div class="col-6">
                <div class="form-floating mb-2">
                    <input type="date" class="form-control" id="datum_nezgode" name="datum_nezgode"
                        placeholder="Datum nezgode" autocomplete="off" required>
                    <label for="datum_nezgode">Datum nezgode</label>
                </div>

                <!-- stavlja max date na Today -->
                <script>
                document.addEventListener("DOMContentLoaded", function() {
                    let today = new Date().toISOString().split('T')[0];
                    document.getElementById("datum_nezgode").setAttribute("max", today);
                });
                </script>
            </div>

            <div class="col-6">
                <div class="form-floating mb-2">
                    <input type="text" class="form-control" id="mesto_nezgode" name="mesto_nezgode"
                        placeholder="Mesto nezgode" autocomplete="off" required>
                    <label for="mesto_nezgode">Mesto nezgode</label>
                </div>
            </div>

            <div class="col-6">
                <div class="form-floating mb-2">
                    <input type="text" class="form-control" id="ulica_broj" name="ulica_broj" placeholder="Ulica i broj"
                        autocomplete="off" required>
                    <label for="ulica_broj">Ulica i broj</label>
                </div>
            </div>
        </div>

        <h6 class="mt-3">Odaberite tip prijave</h6>

        <div class="form-check">
            <input class="form-check-input" type="radio" name="tipPrijave" id="tip1" value="1" autocomplete="off"
                required>
            <label class="form-check-label" for="tip1">Zapisnik policije o izvršenom uviđaju</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="tipPrijave" id="tip2" value="2" autocomplete="off"
                required>
            <label class="form-check-label" for="tip2">Evropski izveštaj bez službene beleške</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="tipPrijave" id="tip3" value="3" autocomplete="off"
                required>
            <label class="form-check-label" for="tip3">Evropski izveštaj sa službenom beleškom</label>
        </div>

        <h6 class="mt-3">Procena sudskog veštaka</h6>

        <div class="form-floating mb-2">
            <input type="text" class="form-control" id="iznos_za_naplatu" name="iznos_za_naplatu"
                oninput="formatirajIznos(this)" placeholder="Iznos za naplatu">
            <label for="iznos_za_naplatu">Iznos za naplatu</label>
        </div>



        <script>
        function formatirajIznos(input) {
            // Uklanjamo sve što nije broj
            let vrednost = input.value.replace(/\D/g, '');

            // Ako je broj manji od 2 cifre, prikazujemo ga normalno
            if (vrednost.length < 3) {
                input.value = vrednost;
                return;
            }

            // Ubacujemo zarez za decimalni deo (poslednje dve cifre)
            let iznos = vrednost.slice(0, -2) + ',' + vrednost.slice(-2);

            // Dodajemo tačke za hiljade
            input.value = dodajTacke(iznos);
        }

        // Funkcija za dodavanje tačaka na hiljade
        function dodajTacke(iznos) {
            let delovi = iznos.split(',');
            delovi[0] = delovi[0].replace(/\B(?=(\d{3})+(?!\d))/g, '.');
            return delovi.join(',');
        }
        </script>
    </form>
</div>

<!-- Modal za osustani -->
<div class="modal fade" id="confirmationModal" tabindex="-1" aria-labelledby="confirmationModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content modal-custom">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmationModalLabel">Potvrda</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Da li ste sigurni da želite da odustanete? Nesačuvani podaci će biti izgubljeni.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Otkaži</button>
                <a href="/stete" class="btn btn-danger" id="confirmCancelButton">Potvrdi</a>
            </div>
        </div>
    </div>
</div>

<script>
// Otvori modal kada korisnik klikne na "Odustani"
document.getElementById('cancelButton').addEventListener('click', function(event) {
    event.preventDefault(); // Sprečava da link odmah preusmeri
    var myModal = new bootstrap.Modal(document.getElementById('confirmationModal'));
    myModal.show();
});

// Onemogućava zatvaranje moda klikom na backdrop
document.getElementById('confirmationModal').addEventListener('hidden.bs.modal', function(event) {
    var confirmButton = document.getElementById('confirmCancelButton');
    confirmButton.removeAttribute('href'); // Oduzima href dok se modal ne potvrdi
});

// Ako korisnik potvrdi, preusmerava ga na stranicu
document.getElementById('confirmCancelButton').addEventListener('click', function(event) {
    window.location.href = '/stete'; // Preusmeravanje na "/stete"
});
</script>