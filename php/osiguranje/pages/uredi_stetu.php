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
        <div class="mb-4 alert alert-danger alert-dismissible fade show" role="alert">
            <strong>NAPOMENA:</strong> Pre dodavanja fajlova,<strong> OBAVEZNO</strong> kompresovati slike i
            pdf kako bi
            smanjili veličinu fajla i ubrzali učitavanje sistema.
            <br>
            Koristi sledeće alate za kompresiju:
            <a href="https://www.ilovepdf.com/compress_pdf" target="_blank" class="alert-link">iLovePDF
                (za PDF fajlove)</a> |
            <a href="https://www.iloveimg.com/compress-image" target="_blank" class="alert-link">iLoveIMG (za
                slike)</a>.
        </div>
    </div>


    <form action="../damage/upload.php" method="POST" enctype="multipart/form-data">
        <div class="sticky-top pt-3 d-flex justify-content-between modal-custom">
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
                <div class="form-floating mb-2">
                    <input type="text" name="preporucilac" id="preporucilac" class="form-control"
                        placeholder="Preporučilac" value="<?php
                                // Preuzimanje postojeće registarske oznake iz baze, ako postoji
                                $regOznakaQuery = "SELECT preporucilac FROM klijenti_stete WHERE id = $id AND klijent_id = $klijent_id";
                                $result = $conn->query($regOznakaQuery);

                                if ($result && $row = $result->fetch_assoc()) {
                                    echo htmlspecialchars($row['preporucilac'] ?? 'Nema preporučioca');
                                }

                            ?>">
                    <label for="regOznaka">Preporučilac</label>
                    <div class="invalid-feedback">Morate uneti adresu i broj.</div>
                </div>
            </div>

            <div class="col-4">
                <div class="form-floating mb-2">
                    <input type="text" name="reg_oznaka" id="reg_oznaka" class="form-control"
                        placeholder="Registarska oznaka (Oštećenog)" value="<?php
                                // Preuzimanje postojeće registarske oznake iz baze, ako postoji
                                $regOznakaQuery = "SELECT reg_oznaka FROM klijenti_stete WHERE id = $id AND klijent_id = $klijent_id";
                                $result = $conn->query($regOznakaQuery);
                                if ($result && $row = $result->fetch_assoc()) {
                                    echo htmlspecialchars($row['reg_oznaka']); // Prikazivanje postojeće registarske oznake
                                }
                            ?>">
                    <label for="regOznaka">Registarska oznaka (Oštećenog)</label>
                    <div class="invalid-feedback">Morate uneti adresu i broj.</div>
                </div>
            </div>

            <div class="col-4">
                <?php
                        // Preuzimanje postojeće registarske oznake iz baze, ako postoji
                        $osig_kucaQuery = "SELECT osig_kuca_stetnik FROM klijenti_stete WHERE id = $id AND klijent_id = $klijent_id";
                        $result = $conn->query($osig_kucaQuery);
                        if ($result && $row = $result->fetch_assoc()) {
                            $selectedValue = $row['osig_kuca_stetnik']; // Vrednost iz baze
                        }
                        ?>

                <div class="form-floating mb-2">
                    <select class="form-select mb-2" name="osig_kuca" autocomplete="off" required>
                        <option value="">Izaberi...</option>
                        <option value="Dunav Osiguranje"
                            <?= ($selectedValue == "Dunav Osiguranje") ? 'selected' : '' ?>>
                            Dunav osiguranje</option>
                        <option value="DDOR Osiguranje" <?= ($selectedValue == "DDOR Osiguranje") ? 'selected' : '' ?>>
                            DDOR
                            Novi Sad</option>
                        <option value="Uniqa Osiguranje"
                            <?= ($selectedValue == "Uniqa Osiguranje") ? 'selected' : '' ?>>
                            Uniqa osiguranje</option>
                        <option value="Triglav Osiguranje"
                            <?= ($selectedValue == "Triglav Osiguranje") ? 'selected' : '' ?>>Triglav osiguranje
                        </option>
                        <option value="Generali Osiguranje"
                            <?= ($selectedValue == "Generali Osiguranje") ? 'selected' : '' ?>>Generali
                            osiguranje
                        </option>
                        <option value="Wiener Osiguranje"
                            <?= ($selectedValue == "Wiener Osiguranje") ? 'selected' : '' ?>>
                            Wiener Stadtische</option>
                        <option value="Sava Osiguranje" <?= ($selectedValue == "Sava Osiguranje") ? 'selected' : '' ?>>
                            Sava
                            osiguranje</option>
                        <option value="Milenijum Osiguranje"
                            <?= ($selectedValue == "Milenijum Osiguranje") ? 'selected' : '' ?>>Milenijum
                            osiguranje
                        </option>
                        <option value="Globos Osiguranje"
                            <?= ($selectedValue == "Globos Osiguranje") ? 'selected' : '' ?>>
                            Globos osiguranje</option>
                        <option value="AMS Osiguranje" <?= ($selectedValue == "AMS Osiguranje") ? 'selected' : '' ?>>AMS
                            osiguranje</option>
                        <option value="GRAWE Osiguranje"
                            <?= ($selectedValue == "GRAWE Osiguranje") ? 'selected' : '' ?>>
                            Grawe osiguranje</option>
                        <option value="Ne zna se" <?= ($selectedValue == "Ne zna se") ? 'selected' : '' ?>>
                            Ne zna se</option>


                    </select>
                    <label for="regOznaka">Osiguravajuća kuća (Štetnika)</label>
                </div>

            </div>

            <div class="col-4">
                <?php
                // Preuzimanje postojeće registarske oznake iz baze, ako postoji
                $vrsta_steteQuery = "SELECT vrsta_stete FROM klijenti_stete WHERE id = $id AND klijent_id = $klijent_id";
                $result = $conn->query($vrsta_steteQuery);
                if ($result && $row = $result->fetch_assoc()) {
                    $selectedVSValue = $row['vrsta_stete']; // Vrednost iz baze
                }
                ?>

                <div class="form-floating mb-2">
                    <select class="form-select mb-2" name="vrsta_stete" autocomplete="off" required>
                        <option value="">Izaberi...</option>
                        <option value="Materijalna" <?= ($selectedVSValue == "Materijalna") ? 'selected' : '' ?>>
                            Materijalna</option>
                        <option value="Ne materijalna" <?= ($selectedVSValue == "Ne materijalna") ? 'selected' : '' ?>>
                            Ne
                            materijalna</option>
                    </select>
                    <label for="regOznaka">Vrsta stete</label>
                </div>
            </div>

            <div class="form-group">
                <div class="form-floating">
                    <textarea class="form-control" name="opis" placeholder="Leave a comment here" id="floatingTextarea2"
                        style="height: 100px"><?php
                        // Preuzimanje postojećeg opisa iz baze, ako postoji
                        $opisQuery = "SELECT opis FROM klijenti_stete WHERE id = $id AND klijent_id = $klijent_id";
                        $result = $conn->query($opisQuery);
                        if ($result && $row = $result->fetch_assoc()) {
                            echo htmlspecialchars($row['opis']); // Prikazivanje postojećeg opisa
                        }
                     ?></textarea>
                    <label for="floatingTextarea2">Telo mejla - Komentar</label>
                </div>
            </div>

            <div class="form-group">
                <div class="form-floating my-2">
                    <input type="text" name="weTransfer_link" id="weTransfer_link" class="form-control"
                        placeholder="WeTransfer Link" value="<?php
                                // Preuzimanje postojeće registarske oznake iz baze, ako postoji
                                $weTransfer_linkQuery = "SELECT weTransfer_link FROM klijenti_stete WHERE id = $id AND klijent_id = $klijent_id";
                                $result = $conn->query($weTransfer_linkQuery);
                                if ($result && $row = $result->fetch_assoc()) {
                                    echo htmlspecialchars($row['weTransfer_link']); // Prikazivanje postojeće registarske oznake
                                }
                            ?>">
                    <label for="regOznaka">WeTransfer Link</label>
                </div>
            </div>

            <!-- Prva kolona za 'osteceni' fajlove -->
            <div class="accordion-item">
                <div id="collapseOsteceni">
                    <div class="accordion-body">
                        <div class="row">


                            <div class="accordion my-3" id="fileAccordion">
                                <h5>Dokumenta</h5>

                                <div class="col-md-12 mb-3">
                                    <label for="punomoc" class="form-label">Zakači fajl punomoć:</label>
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

                                <?php
                                // Preuzimanje postojeće registarske oznake iz baze, ako postoji
                                $osig_kucaQuery = "SELECT emin_procena_disabled, sluzbena_beleska_disabled FROM klijenti_stete WHERE id = $id AND klijent_id = $klijent_id";
                                $result = $conn->query($osig_kucaQuery);
                                if ($result && $row = $result->fetch_assoc()) {
                                    $emin_procena_disabled = $row['emin_procena_disabled']; // Vrednost iz baze
                                    $sluzbena_beleska_disabled = $row['sluzbena_beleska_disabled']; // Vrednost iz baze
                                }
                                ?>

                                <div class="row">
                                    <!-- Checkbox za sluzbena_beleska -->
                                    <div class="col-6 mb-3">
                                        <input type="checkbox" id="disable_emin_procena" name="disable_emin_procena"
                                            value="1" <?php echo ($emin_procena_disabled == 1) ? 'checked' : ''; ?>>
                                        <label for="disable_emin_procena">Onemogući Emin procenu</label>
                                    </div>

                                    <!-- Checkbox za sluzbena_beleska -->
                                    <div class="col-6 mb-3">
                                        <input type="checkbox" id="disable_sluzbena_beleska"
                                            name="disable_sluzbena_beleska" value="1"
                                            <?php echo ($sluzbena_beleska_disabled == 1) ? 'checked' : ''; ?>>
                                        <label for="disable_sluzbena_beleska">Onemogući Službenu Belešku</label>
                                    </div>


                                    <div class="col-6 mb-3">
                                        <input type="hidden" name="emin_procena_disabled" id="emin_procena_hidden"
                                            value="<?php echo $emin_procena_disabled; ?>">

                                        <label for="emin_procena" class="form-label">Zakači fajl emin_procena:</label>
                                        <div class="col-12 d-flex">
                                            <input type="file" name="emin_procena" id="emin_procena"
                                                class="form-control <?php echo ($emin_procena_disabled == 1) ? '' : 'me-2'; ?>"
                                                <?php echo ($emin_procena_disabled == 1) ? 'disabled' : ''; ?>>

                                            <?php
                                        $checkQuery = "SELECT emin_procena FROM klijenti_stete WHERE id = $id AND klijent_id = $klijent_id";
                                        $result = $conn->query($checkQuery);
                                        if($emin_procena_disabled == 0){
                                            if ($result && $row = $result->fetch_assoc()) {
                                                if (!empty($row['emin_procena'])) {
                                                    echo '<button type="button" class="btn btn-sm btn-success" onclick="viewFile(\'emin_procena\', ' . $id . ')">';
                                                    echo '<i class="bi bi-eye"></i></button>'; // Dugme za prikaz fajla
                                                } else {
                                                    echo '<button type="button" class="btn btn-sm btn-danger">';
                                                    echo '<i class="bi bi-exclamation-triangle"></i></button>'; // Dugme za nedostupni fajl
                                                }
                                            } else {
                                                echo '<button type="button" class="btn btn-sm btn-danger">';
                                                echo '<i class="bi bi-exclamation-triangle"></i></button>'; // Dugme za nedostupni fajl
                                            }
                                        }
                                        ?>
                                        </div>
                                    </div>

                                    <div class="col-6 mb-3">
                                        <input type="hidden" name="sluzbena_beleska_disabled"
                                            id="sluzbena_beleska_hidden"
                                            value="<?php echo $sluzbena_beleska_disabled; ?>">
                                        <label for="sluzbena_beleska" class="form-label">Zakači fajl
                                            sluzbena_beleska:</label>
                                        <div class="d-flex">
                                            <input type="file" name="sluzbena_beleska" id="sluzbena_beleska"
                                                class="form-control <?php echo ($sluzbena_beleska_disabled == 1) ? '' : 'me-2'; ?>"
                                                <?php echo ($sluzbena_beleska_disabled == 1) ? 'disabled' : ''; ?>>

                                            <?php
                                        $checkQuery = "SELECT sluzbena_beleska FROM klijenti_stete WHERE id = $id AND klijent_id = $klijent_id";
                                        $result = $conn->query($checkQuery);
                                        if($sluzbena_beleska_disabled == 0){
                                            if ($result && $row = $result->fetch_assoc()) {
                                                if (!empty($row['sluzbena_beleska'])) {
                                                    echo '<button type="button" class="btn btn-sm btn-success" onclick="viewFile(\'sluzbena_beleska\', ' . $id . ')">';
                                                    echo '<i class="bi bi-eye"></i></button>'; // Dugme za prikaz fajla
                                                } else {
                                                    echo '<button type="button" class="btn btn-sm btn-danger">';
                                                    echo '<i class="bi bi-exclamation-triangle"></i></button>'; // Dugme za nedostupni fajl
                                                }
                                            } else {
                                                echo '<button type="button" class="btn btn-sm btn-danger">';
                                                echo '<i class="bi bi-exclamation-triangle"></i></button>'; // Dugme za nedostupni fajl
                                            }
                                        }
                                        
                                        ?>
                                        </div>
                                    </div>
                                </div>

                                <script>
                                document.addEventListener("DOMContentLoaded", function() {
                                    function toggleInput(checkboxId, inputId, hiddenInputId) {
                                        let checkbox = document.getElementById(checkboxId);
                                        let input = document.getElementById(inputId);
                                        let hiddenInput = document.getElementById(hiddenInputId);

                                        checkbox.addEventListener("change", function() {
                                            if (checkbox.checked) {
                                                input.disabled = true;
                                                hiddenInput.value = "1";
                                            } else {
                                                input.disabled = false;
                                                hiddenInput.value = "0";
                                            }
                                        });
                                    }

                                    toggleInput("disable_emin_procena", "emin_procena", "emin_procena_hidden");
                                    toggleInput("disable_sluzbena_beleska", "sluzbena_beleska",
                                        "sluzbena_beleska_hidden");
                                });
                                </script>


                                <div class="col-md-12 mb-3">
                                    <label for="odstetni_zahtev" class="form-label">Zakači fajl odštetni zahtev:</label>
                                    <div class="d-flex">
                                        <input type="file" name="odstetni_zahtev" id="odstetni_zahtev"
                                            class="form-control me-2">
                                        <?php
                                        $checkQuery = "SELECT odstetni_zahtev FROM klijenti_stete WHERE id = $id AND klijent_id = $klijent_id";
                                        $result = $conn->query($checkQuery);
                                        if ($result && $row = $result->fetch_assoc()) {
                                            if (!empty($row['odstetni_zahtev'])) {
                                                echo '<button type="button" class="btn btn-sm btn-success" onclick="viewFile(\'odstetni_zahtev\', ' . $id . ')">';
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

                                <?php
                                $fileGroups = [
                                    "Oštećeni" => [
                                        "osteceni_licna_prednja", "osteceni_licna_zadnja", "osteceni_saobracajna_prednja", "osteceni_saobracajna_zadnja",
                                        "osteceni_vozacka_prednja", "osteceni_vozacka_zadnja", "osteceni_izjava",
                                        "osteceni_polisa", "osteceni_tekuci", "evropski_izvestaj"
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
                                                    <label for="<?= $fileName ?>" class="form-label">Zakači fajl
                                                        <?= $fileName ?>:</label>
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

    <!-- Dugme koje otvara modal -->
    <button type="button" class="btn btn-danger col-12" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal">
        Obriši štetu
    </button>

    <!-- Bootstrap Modal -->
    <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmDeleteModalLabel">Potvrda brisanja</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Zatvori"></button>
                </div>
                <div class="modal-body">
                    <p>Da li si siguran da želiš da obrišeš ovu štetu?</p>
                    <p>Unesi "OBRIŠI" za potvrdu:</p>
                    <input type="text" id="confirmInput" class="form-control" placeholder="OBRIŠI">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Otkaži</button>
                    <button type="button" class="btn btn-danger" id="confirmDelete" disabled>Obriši štetu</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Skrivena forma -->
    <form id="deleteForm" action="../damage/delete_damage.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <input type="hidden" name="klijent_id" value="<?php echo $klijent_id; ?>">
    </form>

    <!-- JavaScript za validaciju unosa i slanje forme -->
    <script>
    const confirmInput = document.getElementById("confirmInput");
    const confirmDeleteButton = document.getElementById("confirmDelete");

    confirmInput.addEventListener("input", function() {
        confirmDeleteButton.disabled = confirmInput.value.trim().toUpperCase() !== "OBRIŠI";
    });

    confirmDeleteButton.addEventListener("click", function() {
        if (confirmInput.value.trim().toUpperCase() === "OBRIŠI") {
            document.getElementById("deleteForm").submit();
        }
    });
    </script>


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
                <img id="fileImage" src="" class="img-fluid d-none" alt="Fajl">
                <iframe id="filePdf" class="w-100 d-none" style="height: 500px;"></iframe>
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

function viewFile(fileName, id, klijent_id) {
    console.log('Učitavam fajl:', fileName, ' sa ID-om:', id, ' i klijent_id:', klijent_id);

    fetch('../damage/view_file.php?file=' + fileName + '&id=' + id + '&klijent_id=' + klijent_id)
        .then(response => {
            const contentType = response.headers.get("Content-Type");

            if (!response.ok) {
                throw new Error('Greška pri učitavanju fajla');
            }
            return response.blob().then(blob => ({
                blob,
                contentType
            }));
        })
        .then(({
            blob,
            contentType
        }) => {
            const url = URL.createObjectURL(blob);
            const img = document.getElementById('fileImage');
            const pdf = document.getElementById('filePdf');

            if (contentType.includes('image')) {
                img.classList.remove('d-none');
                pdf.classList.add('d-none');
                img.src = url;
            } else if (contentType.includes('pdf')) {
                img.classList.add('d-none');
                pdf.classList.remove('d-none');
                pdf.src = url + "#toolbar=0"; // Onemogućava page preview i toolbar
            } else {
                alert("Nepodržan format fajla.");
                return;
            }

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