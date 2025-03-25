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

<div class="container mt-4">
    <form action="../damage/send_email_s_beleska.php" method="post" enctype="multipart/form-data"
        class="needs-validation" novalidate>
        <div class="sticky-top pt-5 d-flex justify-content-between modal-custom">

            <h3 class="text-center">Klijent: <?php echo $klijentIme?></h3>
            <div class='d-flex'>
                <!-- Button to trigger the modal -->
                <a class="btn btn-dark mb-3" href="javascript:void(0)" id="cancelButton"
                    style="margin-right: 10px;">Odustani</a>
                <button type="submit" class="btn btn-primary mb-3">Pošalji mejl</button>
            </div>
        </div>


        <input type="hidden" name="stete_id" value='<?php echo $steteId?>'>

        <div class="form-floating mb-2">
            <input type="text" class="form-control" id="reg_oznaka" name="reg_oznaka" placeholder="Registarska oznaka"
                autocomplete="off" required>
            <label for="reg_oznaka">Registraciona oznaka</label>
        </div>

        <div class="form-floating mb-2">
            <input type="date" class="form-control" id="datum_nezgode" name="datum_nezgode" placeholder="Datum nezgode"
                autocomplete="off" required>
            <label for="datum_nezgode">Datum nezgode</label>
        </div>

        <!-- Postavlja max date na danasnji dan -->
        <script>
        document.addEventListener("DOMContentLoaded", function() {
            let today = new Date().toISOString().split('T')[0];
            document.getElementById("datum_nezgode").setAttribute("max", today);
        });
        </script>

        <div class="my-4">
            <label for="image" class="form-label">Zakači potvrdu o plaćanju</label>
            <input type="file" class="form-control" name="image" id="image" required>
        </div>

        <div class="my-4">
            Izrada uplatnice:
            <a href="https://plati.euprava.gov.rs/#/" target="_blank">Portal еПлати - Izrada uplatnica</a>
        </div>

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
                <a href="/client_damage" class="btn btn-danger" id="confirmCancelButton">Potvrdi</a>
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
    window.location.href = '/client_damage'; // Preusmeravanje na "/client_damage"
});
</script>