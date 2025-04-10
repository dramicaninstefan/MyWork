<?php
// Uključite config.php za povezivanje sa bazom
include('config.php'); // Ovaj fajl mora biti u istoj fascikli ili navedite apsolutnu putanju

// Izvlačenje podataka
$query = "SELECT t.id, t.klijent_id, k.ime_prezime, k.kontakt, t.preporucilac, t.status_izvrsenja, t.poslato,
                t.created_at, t.emin_procena_status, t.punomoc_status, t.sluzbena_beleska_poslata, t.sluzbena_beleska_status, 
                t.odstetni_zahtev_status, t.vrsta_stete
          FROM klijenti_stete t 
          JOIN klijent k ON t.klijent_id = k.id ORDER BY t.created_at DESC;";

$result = $conn->query($query);

// Proveri da li je upit uspeo i koliko redova je vraćeno
if (!$result) {
    die("Greška u upitu: " . $conn->error);
}
?>

<div class="container mt-5">
    <h2 class="mb-4">Štete</h2>

    <!-- Search input -->
    <div class="mb-3 position-relative">
        <input type="text" id="searchInput" class="form-control ps-5" placeholder="Pretraži štete...">
        <i class="bi bi-search position-absolute top-50 start-0 translate-middle-y ms-3"></i>
    </div>

    <!-- Dugme za otvaranje modala -->
    <button type="button" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#dodajStetuModal">
        Kreiraj novu štetu
    </button>

    <table class="table table-bordered" id="steteTable">
        <thead class="table-dark">
            <tr>
                <th style="max-width: 100px">Ime i Prezime</th>
                <th style="width: 135px">Kontakt</th>
                <!-- <th style="width: 90px">Punomoć</th> -->
                <th style="width: 60px; text-align: center;">Procena</th>
                <th style="width: 60px; text-align: center;">MUP</th>
                <th style="width: 60px; text-align: center;">OZ</th>
                <th></th>
                <!-- <th style="width: 180px">Vreme slanja</th> -->
                <th style="width: 100px;">Kreirano</th>
                <th style="width: 130px;">Vrsta štete</th>
                <th style="width: 100px">Preporuč.</th>
                <th style="width: 110px">Status</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($result->num_rows > 0): ?>
            <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td>
                    <?php echo htmlspecialchars($row['ime_prezime']); ?>
                </td>
                <td>
                    <?php
                    $broj = $row['kontakt'];
                    $broj_bez_plus = ltrim($broj, '+');
                    ?>
                    <a class="link-primary link-offset-2 link-offset-3-hover"
                        href="viber://chat/?number=%2B<?php echo $broj_bez_plus;?>">
                        <?php echo htmlspecialchars( $row['kontakt']); ?>
                    </a>
                </td>


                <td>
                    <div class="<?php echo $row['emin_procena_status'] == 0 ? 'status-red' : 'status-green'; ?>">
                        <?php echo $row['emin_procena_status'] == 0 ? '0' : '1'; ?>
                    </div>
                </td>

                <td>
                    <div class="<?php echo $row['sluzbena_beleska_status'] == 0 ? 'status-red' : 'status-green'; ?>">
                        <?php echo $row['sluzbena_beleska_status'] == 0 ? '0' : '1'; ?>
                    </div>
                </td>

                <td>
                    <div class="<?php echo $row['odstetni_zahtev_status'] == 0  ? 'status-red' : 'status-green'; ?>">
                        <?php echo $row['odstetni_zahtev_status'] == 0 ? '0' : '1'; ?>
                    </div>
                </td>

                </td>
                <td class="d-flex justify-content-between gy-5">
                    <div class="d-flex">
                        <form action="/uredi_stetu" method="post">
                            <input type="hidden" name="id" value="<?php echo htmlspecialchars($row['id']); ?>">
                            <input type="hidden" name="klijent_id"
                                value="<?php echo htmlspecialchars($row['klijent_id']); ?>">
                            <button type="submit" class="btn btn-sm btn-primary">
                                <i class="bi bi-pencil-square"></i>
                                Uredi
                            </button>
                        </form>

                        <div class="dropdown mx-2">
                            <button class="btn btn-sm btn-secondary dropdown-toggle" type="button"
                                id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-file-earmark"></i> Dokumenta
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <li class="px-1">
                                    <?php
                                    // Provera statusa i postavljanje disabled atributa ako neka vrednost nije 1
                                    $disabled = ($row['odstetni_zahtev_status'] == 1) ? '' : '';
                                    ?>
                                    <!-- Dugme za prosleđivanje podataka -->
                                    <form action="/odstetni_zahtev_m" method="post">
                                        <input type="hidden" name="id"
                                            value="<?php echo htmlspecialchars($row['id']); ?>">
                                        <input type="hidden" name="klijent_id"
                                            value="<?php echo htmlspecialchars($row['klijent_id']); ?>">
                                        <button type="submit" class="dropdown-item w-100 d-flex align-items-center"
                                            <?php echo $disabled; ?>>
                                            Odštetni zahtev (materijalna)
                                        </button>
                                    </form>
                                </li>

                                <li class="px-1  mt-2">
                                    <?php
                                    // Provera statusa i postavljanje disabled atributa ako neka vrednost nije 1
                                    $disabled = ($row['odstetni_zahtev_status'] == 1) ? '' : '';
                                    ?>
                                    <!-- Dugme za prosleđivanje podataka -->
                                    <form action="/odstetni_zahtev_nm" method="post">
                                        <input type="hidden" name="id"
                                            value="<?php echo htmlspecialchars($row['id']); ?>">
                                        <input type="hidden" name="klijent_id"
                                            value="<?php echo htmlspecialchars($row['klijent_id']); ?>">
                                        <button type="submit" class="dropdown-item w-100 d-flex align-items-center"
                                            <?php echo $disabled; ?>>
                                            Odštetni zahtev (nematerijalna)
                                        </button>
                                    </form>
                                </li>

                                <li class="px-1 mt-2">
                                    <?php
                                    // Provera statusa i postavljanje disabled atributa ako neka vrednost nije 1
                                    $disabled = ($row['sluzbena_beleska_poslata'] == 1 || $row['sluzbena_beleska_status'] == 1) ? '' : '';
                                    ?>

                                    <!-- Dugme za prosleđivanje podataka -->
                                    <form action="/sluzbena_beleska" method="post">
                                        <input type="hidden" name="id"
                                            value="<?php echo htmlspecialchars($row['id']); ?>">
                                        <input type="hidden" name="klijent_id"
                                            value="<?php echo htmlspecialchars($row['klijent_id']); ?>">
                                        <button type="submit" class="dropdown-item w-100 d-flex align-items-center"
                                            <?php echo $disabled; ?>>
                                            Službena beleška
                                        </button>
                                    </form>
                                </li>
                            </ul>

                        </div>
                    </div>

                    <?php
                    // Provera statusa i postavljanje disabled atributa ako neka vrednost nije 1
                    $disabled = ($row['emin_procena_status'] != 1 || $row['odstetni_zahtev_status'] != 1 || $row['punomoc_status'] != 1 || $row['sluzbena_beleska_status'] != 1) ? 'disabled' : '';


                    // Provera statusa izvršenja i postavljanje teksta dugmeta
                    $button_text = ($row['status_izvrsenja'] === "Poslato") ? "Pošalji ponovo" : "Pošalji";
                    ?>

                    <form id="emailForm" action="/potvrdi" method="post">
                        <input type="hidden" name="id" value="<?php echo htmlspecialchars($row['id']); ?>">
                        <input type="hidden" name="klijent_id"
                            value="<?php echo htmlspecialchars($row['klijent_id']); ?>">
                        <button type="submit" class="btn btn-sm btn-success" <?php echo $disabled ?>>
                            <?php echo $button_text; ?>
                        </button>
                    </form>

                </td>

                <td style="text-align: center;">
                    <?php echo date('d/m/Y', strtotime($row['created_at'])); ?>
                </td>

                <td>
                    <?php echo htmlspecialchars($row['vrsta_stete']); ?>
                </td>

                <td>
                    <?php echo htmlspecialchars($row['preporucilac']); ?>
                </td>

                <td>
                    <?php
                    // menja boju na osnovu statusa
                    $statusClass = '';
                    switch (strtolower($row['status_izvrsenja'])) {
                        case 'u pripremi':  
                            $statusClass = 'status-u-izradi';
                            break;
                        case 'poslato':
                            $statusClass = 'status-poslato';
                            break;
                        default:
                            $statusClass = '';
                            break;
                    }
                    ?>


                    <div class="<?php echo htmlspecialchars($statusClass); ?>">
                        <?php echo htmlspecialchars($row['status_izvrsenja']); ?>
                    </div>
                </td>
            </tr>
            <?php endwhile; ?>
            <?php else: ?>
            <tr>
                <td colspan="10">Nema kreiranih šteta</td>
            </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <!-- Modal kreiraj novu stetu -->
    <div class="modal fade" id="dodajStetuModal" tabindex="-1" aria-labelledby="dodajStetuModalLabel"
        data-bs-backdrop="static" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content modal-custom">
                <div class="modal-header">
                    <h5 class="modal-title" id="dodajStetuModalLabel">Kreiraj novu štetu</h5>
                    <!-- Dodaj HTML za poruku -->
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div>
                        <!-- Informativna poruka -->
                        <div class="mb-4 alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>NAPOMENA:</strong> Pre kreiranja štete,<strong> OBAVEZNO</strong> kompresovati slike
                            i
                            pdf kako bi
                            smanjili veličinu fajla i ubrzali učitavanje sistema.
                            <br>
                            Koristi sledeće alate za kompresiju:
                            <a href="https://www.ilovepdf.com/compress_pdf" target="_blank" class="alert-link">iLovePDF
                                (za PDF fajlove)</a> |
                            <a href="https://www.iloveimg.com/compress-image" target="_blank"
                                class="alert-link">iLoveIMG (za
                                slike)</a>.
                        </div>
                    </div>



                    <form method="POST" action="../damage/add_client_damage.php" enctype="multipart/form-data"
                        class="needs-validation" novalidate>

                        <!-- Pretraga klijenata i Select sa filtriranjem -->
                        <div class="form-floating mt-2 position-relative">
                            <input type="text" id="searchKlijentSteta" name="searchKlijentSteta" class="form-control"
                                placeholder="Pretraži klijente..." autocomplete="off" required>
                            <label for="searchKlijentSteta">Ime i prezime</label>
                            <div class="invalid-feedback">Ime i prezime je obavezno!</div>


                            <!-- Dugme X za resetovanje -->
                            <button type="button" tabindex="-1" id="resetSearch" class="btn btn-light position-absolute"
                                style="right: 10px; top: 50%; transform: translateY(-50%); display: none;">
                                <i class="bi bi-arrow-clockwise"></i>
                            </button>
                        </div>

                        <!-- Select za klijente -->
                        <div class="mb-2">
                            <select class="form-select" autocomplete="off" name="klijent_id" id="klijentSteta" size="5"
                                style="display: none;">
                                <?php
                            include('config.php');

                            $sql = "SELECT * FROM klijent";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo '<option value="' . $row['id'] . '" data-mbpib="' . $row['jmbg'] . '">' . $row['ime_prezime'] . '</option>';
                                }
                            } else {
                                echo '<option value="">Nema klijenata</option>';
                            }
                            ?>
                            </select>
                        </div>

                        <!-- JavaScript -->
                        <script>
                        // Dodajte event listener na prvi input polje
                        document.getElementById('searchKlijentSteta').addEventListener('keydown', function(event) {
                            // Ako je pritisnut taster "ArrowDown" (strelica na dole)
                            if (event.key === "ArrowDown") {
                                event.preventDefault(); // Sprečava default ponašanje (ako je potrebno)
                                // Premesti fokus na sledeći input
                                document.getElementById('klijentSteta').focus();
                            }
                        });

                        document.addEventListener("DOMContentLoaded", function() {
                            let searchInput = document.getElementById("searchKlijentSteta");
                            let selectKlijent = document.getElementById("klijentSteta");
                            let resetButton = document.getElementById("resetSearch");

                            let options = document.querySelectorAll("#klijentSteta option");

                            // Stilizacija opcija u select-u
                            options.forEach((option) => {
                                option.style.backgroundColor = "#fff";

                                option.addEventListener("mouseenter", function() {
                                    this.style.backgroundColor = "#e7ecef";
                                });

                                option.addEventListener("mouseleave", function() {
                                    this.style.backgroundColor = "#fff";
                                });
                            });

                            // Prikaz select-a pri fokusu na pretragu
                            searchInput.addEventListener("focus", function() {
                                selectKlijent.style.display = "block";
                            });

                            // Filtriranje opcija
                            searchInput.addEventListener("keyup", function() {
                                let filter = this.value.toLowerCase();
                                let hasValue = this.value.trim() !== "";

                                options.forEach(option => {
                                    let text = option.textContent.toLowerCase();
                                    option.style.display = text.includes(filter) || option
                                        .value ===
                                        "" ? "" : "none";
                                });

                                // Prikaz dugmeta X ako postoji unos
                                resetButton.style.display = hasValue ? "block" : "none";
                            });

                            // Zatvaranje select-a klikom van njega
                            document.addEventListener("click", function(e) {
                                if (!selectKlijent.contains(e.target) && e.target !== searchInput) {
                                    selectKlijent.style.display = "none";
                                }
                            });

                            // Postavljanje vrednosti u input polja i sakrivanje MB/PIB inputa
                            selectKlijent.addEventListener("change", function() {
                                let selectedOption = this.options[this.selectedIndex];

                                if (selectedOption.value !== "") {
                                    searchInput.value = selectedOption.textContent;
                                } else {
                                    searchInput.value = '';
                                    "block"; // Prikazuje MB/PIB input ako ništa nije odabrano
                                }

                                resetButton.style.display = "block"; // Prikaz dugmeta X nakon izbora
                            });

                            // Reset dugme - briše unos i prikazuje MB/PIB input
                            resetButton.addEventListener("click", function() {
                                searchInput.value = "";
                                selectKlijent.style.display = "none"; // Sakriva select
                                resetButton.style.display = "none"; // Sakriva X dugme
                            });

                            // Dodajemo blur event na search input
                            selectKlijent.addEventListener("blur", function() {
                                setTimeout(function() { // Koristimo setTimeout da bismo sačekali da tab navigacija završi
                                    selectKlijent.style.display = "none";
                                }, 100);
                            });
                        });
                        </script>

                        <div class="form-check  mb-2">
                            <input class="form-check-input" type="checkbox" id="disableCheckbox">
                            <label class="form-check-label" for="disableCheckbox">
                                Nema preporučilac
                            </label>
                        </div>

                        <div class="form-floating mb-5">
                            <input type="text" class="form-control" id="preporucilac" name="preporucilac"
                                placeholder="Preporučilac" autocomplete="off" required>
                            <label for="preporucilac">Preporučilac</label>
                            <div class="invalid-feedback">Ako nema preporučioca, otkačiti Nema preporučioca.</div>
                        </div>

                        <script>
                        document.getElementById('disableCheckbox').addEventListener('change', function() {
                            document.getElementById('preporucilac').disabled = this.checked;
                        });
                        </script>

                        <div class="row">
                            <div class="col-4">
                                <div class="form-floating mb-2">
                                    <input type="text" class="form-control" id="regOznaka" name="reg_oznaka"
                                        placeholder="Registarska oznaka (Oštećenog)" autocomplete="off" required>
                                    <label for="regOznaka">Registarska oznaka (Oštećenog)</label>
                                    <div class="invalid-feedback">Registraciona oznaka (Oštećenog) je obavezna.</div>
                                </div>
                            </div>

                            <div class="col-4">

                                <div class="form-floating mb-2">
                                    <select class="form-select" name="osig_kuca" autocomplete="off" required>
                                        <option value="">Izaberi...</option>
                                        <option value="Dunav Osiguranje">Dunav osiguranje</option>
                                        <option value="DDOR Osiguranje">DDOR Novi Sad</option>
                                        <option value="Uniqa Osiguranje">Uniqa osiguranje</option>
                                        <option value="Triglav Osiguranje">Triglav osiguranje</option>
                                        <option value="Generali Osiguranje">Generali osiguranje</option>
                                        <option value="Wiener Osiguranje">Wiener Stadtische</option>
                                        <option value="Sava Osiguranje">Sava osiguranje</option>
                                        <option value="Milenijum Osiguranje">Milenijum osiguranje</option>
                                        <option value="Globos Osiguranje">Globos osiguranje</option>
                                        <option value="AMS Osiguranje">AMS osiguranje</option>
                                        <option value="GRAWE Osiguranje">Grawe osiguranje</option>
                                        <option value="Ne zna se">Ne zna se</option>
                                    </select>
                                    <label for="regOznaka">Osiguravajuća kuća (Štetnika)</label>
                                    <div class="invalid-feedback">Osiguravajuća kuća (Štetnika) je obavezna.</div>
                                </div>
                            </div>

                            <div class="col-4">
                                <div class="form-floating mb-2">
                                    <select class="form-select" name="vrsta_stete" autocomplete="off" required>
                                        <option value="">Izaberi...</option>
                                        <option value="Materijalna">Materijalna</option>
                                        <option value="Nematerijalna">Nematerijalna</option>
                                    </select>
                                    <label for="regOznaka">Vrsta stete</label>
                                    <div class="invalid-feedback">Vrsta stete je obavezna.</div>
                                </div>
                            </div>
                        </div>

                        <div class="form-floating">
                            <textarea class="form-control" name="opis" placeholder="Leave a comment here"
                                id="floatingTextarea2" style="height: 100px"></textarea>
                            <label for="floatingTextarea2">Telo mejla - Komentar</label>
                        </div>

                        <div class="row">
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

                            <div class="accordion my-5" id="fileAccordion">
                                <h5>Dokumenta</h5>

                                <!-- Input za punomoć odmah ispod h5 -->
                                <div class="col-md-12 mb-3">
                                    <label for="punomoc" class="form-label">Zakači fajl punomoć:</label>
                                    <input type="file" name="punomoc" id="punomoc" class="form-control" required>
                                    <div class="invalid-feedback">Punomoć je obavezna</div>
                                </div>

                                <div class="row">
                                    <!-- Checkbox za emin_procena -->
                                    <div class="col-6 mb-3">
                                        <input type="checkbox" id="disable_emin_procena" name="disable_emin_procena"
                                            value="1">
                                        <label for="disable_emin_procena">Onemogući Emin procenu</label>
                                    </div>

                                    <!-- Checkbox za sluzbena_beleska -->
                                    <div class="col-6 mb-3">
                                        <input type="checkbox" id="disable_sluzbena_beleska"
                                            name="disable_sluzbena_beleska" value="1">
                                        <label for="disable_sluzbena_beleska">Onemogući Službenu Belešku</label>
                                    </div>

                                    <div class="col-6 mb-3">
                                        <label for="emin_procena" class="form-label">Zakači fajl emin_procena:</label>
                                        <input type="file" name="emin_procena" id="emin_procena" class="form-control">
                                        <input type="hidden" name="emin_procena_disabled" id="emin_procena_hidden">
                                    </div>

                                    <div class="col-6 mb-3">
                                        <label for="sluzbena_beleska" class="form-label">Zakači fajl
                                            sluzbena_beleska:</label>
                                        <input type="file" name="sluzbena_beleska" id="sluzbena_beleska"
                                            class="form-control">
                                        <input type="hidden" name="sluzbena_beleska_disabled"
                                            id="sluzbena_beleska_hidden">
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
                                                <div class="col-md-6 mb-3">
                                                    <label for="<?= $fileName ?>" class="form-label">Zakači fajl
                                                        <?= $fileName ?>:</label>
                                                    <input type="file" name="<?= $fileName ?>" id="<?= $fileName ?>"
                                                        class="form-control">
                                                </div>
                                                <?php endforeach; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success">Završi krerianje štete</button>

                    </form>

                    <div id="limitMessage" class="alert alert-warning mt-4" style="display: none;" tabindex="0">
                        Dostignut je maksimalan broj fajlova za unos (10). Završi kreiranje i nastavi dodavanje u uredi
                        štetu.
                    </div>


                </div>
            </div>
        </div>
    </div>



    <script>
    // Funkcija za praćenje broja popunjenih inputa
    document.addEventListener('DOMContentLoaded', function() {
        const fileInputs = document.querySelectorAll('input[type="file"]');
        const limitMessage = document.getElementById('limitMessage');
        let fileCount = 0;

        fileInputs.forEach(input => {
            input.addEventListener('change', function() {
                fileCount = 0;

                // Broji popunjene fajl inpute
                fileInputs.forEach(input => {
                    if (input.files.length > 0) {
                        fileCount++;
                    }
                });

                // Ograničava broj popunjenih inputa na 10
                if (fileCount >= 10) {
                    fileInputs.forEach(input => {
                        if (input.files.length === 0) {
                            input.disabled = true; // Onemogućava unos novih fajlova
                        }
                    });

                    limitMessage.style.display = 'block'; // Prikazuje poruku
                    limitMessage.scrollIntoView({
                        behavior: 'smooth',
                        block: 'center'
                    }); // Skroluje do poruke

                    // Dodaje pulsirajuću animaciju
                    limitMessage.classList.add('pulse');

                    // Uklanja pulsiranje nakon što animacija završi (0.8s)
                    setTimeout(() => {
                        limitMessage.classList.remove('pulse');
                    }, 800);
                } else {
                    fileInputs.forEach(input => {
                        input.disabled =
                            false; // Omogućava unos fajlova ako nije dostignut limit
                    });

                    limitMessage.style.display =
                        'none'; // Sakriva poruku ako broj nije dostigao limit
                }
            });
        });
    });


    // Funkcija koja uklanja dijakritike (č, ć, š, ž...)
    function removeDiacritics(str) {
        return str.normalize("NFD").replace(/[\u0300-\u036f]/g, "");
    }

    // Pretraga u tabeli šteta (bez č, ć, š, ž...)
    document.getElementById('searchInput').addEventListener('keyup', function() {
        let filter = removeDiacritics(this.value.toLowerCase());
        let rows = document.querySelectorAll("#steteTable tbody tr");

        rows.forEach(row => {
            let text = removeDiacritics(row.innerText.toLowerCase());
            row.style.display = text.includes(filter) ? '' : 'none';
        });
    });


    const editButtons = document.querySelectorAll('.edit-button');
    editButtons.forEach(button => {
        button.addEventListener('click', () => {
            const klijentId = button.getAttribute('data-klijent-id');
            const ime = button.getAttribute('data-ime');
            const status = button.getAttribute('data-status');
            const poslato = button.getAttribute('data-poslato');
            const poslatoKada = button.getAttribute('data-poslato-kada');

            // Popuni formu
            document.getElementById('edit_klijent_id_hidden').value = klijentId;
            document.getElementById('edit_status').value = status;
            document.getElementById('edit_poslato').value = poslato;
            document.getElementById('edit_poslato_kada').value = poslatoKada;
        });
    });
    </script>


    <?php
// Zatvaranje konekcije
$conn->close();
?>