<?php
// Uključite config.php za povezivanje sa bazom
include('config.php'); // Ovaj fajl mora biti u istoj fascikli ili navedite apsolutnu putanju


$id = isset($_POST['id']) ? $_POST['id'] : null;
$klijent_id = isset($_POST['klijent_id']) ? $_POST['klijent_id'] : null;


$query = "SELECT ime_prezime FROM klijent WHERE id = $klijent_id";
$klijent_ime_prezime = $conn->query($query);

?>



<div class="container my-5">
    <div>
        <!-- Informativna poruka -->
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Napomena:</strong> Možete uploadovati fajlove u različitim formatima (JPEG, PNG, PDF, itd.), ali
            imajte na umu da pregled (preview) neće biti dostupan za PDF i druge formate osim slika. Preporučuje se da
            uploadujete slike (JPEG, PNG) za lakšu obradu i pregled. Hvala na razumevanju!
        </div>
    </div>

    <form action="../damage/upload.php" method="POST" enctype="multipart/form-data">
        <div class="sticky-top pt-5 d-flex justify-content-between modal-custom">
            <?php
                if ($klijent_ime_prezime && $row = $klijent_ime_prezime->fetch_assoc()) {
                    $imePrezime = 'Klijent: ' . $row['ime_prezime'];
                } else {
                    $imePrezime = "Klijent nije pronađen.";
                }
                ?>
            <h3 class="text-center"><?php echo $imePrezime?></h3>
            <div class='d-flex'>
                <!-- Button to trigger the modal -->
                <a class="btn btn-dark mb-3" href="javascript:void(0)" id="cancelButton"
                    style="margin-right: 10px;">Odustani</a>
                <button type="submit" class="btn btn-primary mb-3">Sačuvaj</button>
            </div>
        </div>
        <div class="row">

            <!-- prosledjuje steta_id -->
            <input type="hidden" name="damage_id" value="<?php echo $id?>">
            <input type="hidden" name="klijent_id" value="<?php echo $klijent_id?>">

            <div class="form-group">
                <h5>Registarska oznaka:</h5>
                <input type="text" name="reg_oznaka" id="reg_oznaka" class="form-control" value="<?php
                    // Preuzimanje postojeće registarske oznake iz baze, ako postoji
                    $regOznakaQuery = "SELECT reg_oznaka FROM klijenti_stete WHERE id = $id AND klijent_id = $klijent_id";
                    $result = $conn->query($regOznakaQuery);
                    if ($result && $row = $result->fetch_assoc()) {
                        echo htmlspecialchars($row['reg_oznaka']); // Prikazivanje postojeće registarske oznake
                    }
                ?>">
            </div>


            <div class="form-group">
                <h5>Opis:</h5>
                <textarea name="opis" id="opis" class="form-control" rows="4"><?php
                // Preuzimanje postojećeg opisa iz baze, ako postoji
                $opisQuery = "SELECT opis FROM klijenti_stete WHERE id = $id AND klijent_id = $klijent_id";
                $result = $conn->query($opisQuery);
                if ($result && $row = $result->fetch_assoc()) {
                    echo htmlspecialchars($row['opis']); // Prikazivanje postojećeg opisa
                }
            ?></textarea>
            </div>

            <!-- Prva kolona za 'osteceni' fajlove -->
            <div class="accordion-item">
                <div id="collapseOsteceni">
                    <div class="accordion-body">

                        <div class="row">
                            <?php
                            $fileGroups = [
                                "Oštećeni" => [
                                    "osteceni_licna_prednja", "osteceni_licna_zadnja", "osteceni_saobracajna_prednja", "osteceni_saobracajna_zadnja",
                                    "osteceni_vozacka_prednja", "osteceni_vozacka_zadnja", "osteceni_izjava",
                                    "osteceni_polisa", "osteceni_tekuci", "emin_procena", "evropski_izvestaj"
                                ],
                                "Štetnik" => [
                                    "stetnik_licna_prednja", "stetnik_licna_zadnja", "stetnik_saobracajna_prednja", "stetnik_saobracajna_zadnja", 
                                    "stetnik_vozacka_prednja", "stetnik_vozacka_zadnja", "stetnik_izjava", "stetnik_polisa"
                                ],
                                "Dodatna dokumenta" => [
                                    "dodatni_dokument1", "dodatni_dokument2", "dodatni_dokument3", "dodatni_dokument4", "dodatni_dokument5", "dodatni_dokument6",
                                    'dodatni_dokument7', 'dodatni_dokument8', 'dodatni_dokument9', 'dodatni_dokument10', 'dodatni_dokument11', 'dodatni_dokument12',
                                    'dodatni_dokument13', 'dodatni_dokument14', 'dodatni_dokument15', 'dodatni_dokument16'
                                ]
                            ];
                            ?>

                            <div class="accordion my-3" id="fileAccordion">
                                <h5>Dokumenta</h5>

                                <div class="col-md-12 mb-3">
                                    <label for="punomoc" class="form-label">Izaberite punomoć:</label>
                                    <div class="d-flex">
                                        <input type="file" name="punomoc" id="punomoc" class="form-control me-2">
                                        <?php
                                        $checkQuery = "SELECT punomoc FROM klijenti_stete WHERE id = $id AND klijent_id = $klijent_id";
                                        $result = $conn->query($checkQuery);
                                        if ($result && $row = $result->fetch_assoc()) {
                                            if (!empty($row['punomoc'])) {
                                                echo '<button type="button" class="btn btn-sm btn-success" onclick="viewFile(\'punomoc\', ' . $id . ')">';
                                                echo '<i class="bi bi-eye"></i></button>'; // Dugme za prikaz fajla
                                            } else {
                                                echo '<button type="button" class="btn btn-sm btn-danger">';
                                                echo '<i class="bi bi-exclamation-triangle"></i></button>'; // Dugme za nedostupni fajl
                                            }
                                        } else {
                                            echo '<button type="button" class="btn btn-sm btn-danger">';
                                            echo '<i class="bi bi-exclamation-triangle"></i></button>'; // Dugme za nedostupni fajl
                                        }
                                        ?>
                                    </div>
                                </div>

                                <?php foreach ($fileGroups as $groupName => $files): ?>
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapse<?= md5($groupName) ?>">
                                            <?= $groupName ?>
                                        </button>
                                    </h2>
                                    <div id="collapse<?= md5($groupName) ?>" class="accordion-collapse collapse"
                                        data-bs-parent="#fileAccordion">
                                        <div class="accordion-body">
                                            <div class="row">
                                                <?php foreach ($files as $fileName): ?>
                                                <div class="col-6 mb-3">
                                                    <label for="<?= $fileName ?>"
                                                        class="form-label"><?= $fileName ?>:</label>
                                                    <div class="d-flex">
                                                        <input type="file" name="<?= $fileName ?>" id="<?= $fileName ?>"
                                                            class="form-control">
                                                        <?php
                                                        // Proverite da li fajl postoji u bazi i dodajte dugme za prikaz
                                                        $checkQuery = "SELECT $fileName FROM klijenti_stete WHERE id = $id AND klijent_id = $klijent_id";
                                                        $result = $conn->query($checkQuery);
                                                        if ($result && $row = $result->fetch_assoc()) {
                                                            if (!empty($row[$fileName])) {
                                                                echo '<button type="button" class="btn btn-sm btn-success mx-2" onclick="viewFile(\'' . $fileName . '\', ' . $id . ')">';
                                                                echo '<i class="bi bi-eye"></i></button>'; // Dugme za prikaz fajla
                                                            } else {
                                                                echo '<button type="button" class="btn btn-sm btn-danger mx-2">';
                                                                echo '<i class="bi bi-exclamation-triangle"></i></button>'; // Dugme za nedostupni fajl
                                                            }
                                                        } else {
                                                            echo '<button type="button" class="btn btn-sm btn-danger mx-2">';
                                                            echo '<i class="bi bi-exclamation-triangle"></i></button>'; // Dugme za nedostupni fajl
                                                        }
                                                        ?>
                                                    </div>
                                                </div>
                                                <?php endforeach; ?>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

</div>

<!-- Modal za prikaz fajlova -->
<div class="modal fade" id="fileModal" tabindex="-1" aria-labelledby="fileModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content modal-custom">
            <div class="modal-header">
                <h5 class="modal-title" id="fileModalLabel">Prikaz fajla</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body d-flex justify-content-center">
                <img id="fileImage" src="" class="img-fluid" alt="Fajl">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Zatvori</button>
            </div>
        </div>
    </div>
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

// otvaranje pregleda fajla
function viewFile(fileName, id, klijent_id) {
    console.log('Učitavam fajl:', fileName, ' sa ID-om:', id, ' i klijent_id:', klijent_id);
    // Ajax poziv za učitavanje slike
    fetch('../damage/view_file.php?file=' + fileName + '&id=' + id + '&klijent_id=' + klijent_id)
        .then(response => response.blob())
        .then(blob => {
            const url = URL.createObjectURL(blob);
            document.getElementById('fileImage').src = url;
            const modal = new bootstrap.Modal(document.getElementById('fileModal'));
            modal.show();
        })
        .catch(error => console.error('Greška pri učitavanju fajla:', error));
}
</script>

<?php
// Zatvorite konekciju nakon renderovanja
$conn->close();
?>