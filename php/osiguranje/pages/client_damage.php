<?php
// Uključite config.php za povezivanje sa bazom
include('config.php'); // Ovaj fajl mora biti u istoj fascikli ili navedite apsolutnu putanju

// Izvlačenje podataka
$query = "SELECT t.id, t.klijent_id, k.ime_prezime, k.kontakt, t.status_izvrsenja, t.poslato, t.created_at, t.emin_procena_status, t.punomoc_status, t.sluzbena_beleska_poslata, t.sluzbena_beleska_status
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
                <th style="width: 135px">Status</th>
                <!-- <th style="width: 90px">Punomoć</th> -->
                <th style="width: 80px">Procena</th>
                <th style="width: 80px">Beleška</th>
                <th></th>
                <!-- <th style="width: 180px">Vreme slanja</th> -->
                <th style="width: 170px">Datum kreiranja</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($result->num_rows > 0): ?>
            <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo htmlspecialchars($row['ime_prezime']); ?></td>
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


                </td>
                <td class="d-flex justify-content-between gy-5">
                    <div class="d-flex">
                        <form action="/client_damage_files" method="post">
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
                                    <!-- Dugme za prosleđivanje podataka -->
                                    <form action="/odstetni_zahtev" method="post">
                                        <input type="hidden" name="id"
                                            value="<?php echo htmlspecialchars($row['id']); ?>">
                                        <input type="hidden" name="klijent_id"
                                            value="<?php echo htmlspecialchars($row['klijent_id']); ?>">
                                        <button type="submit" class="dropdown-item w-100 d-flex align-items-center">
                                            Odštetni zahtev
                                        </button>
                                    </form>
                                </li>
                                <li class="px-1 mt-2">
                                    <?php
                                    // Provera statusa i postavljanje disabled atributa ako neka vrednost nije 1
                                    $disabled = ($row['sluzbena_beleska_poslata'] == 1) ? 'disabled' : '';
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
                    $disabled = ($row['emin_procena_status'] != 1 || $row['punomoc_status'] != 1 || $row['sluzbena_beleska_status'] != 1) ? 'disabled' : '';

                    // Ako je status_izvrsenja "Poslato", onemogući i input polja
                    $input_disabled = ($row['status_izvrsenja'] === "Poslato") ? 'disabled' : '';

                    // Provera statusa izvršenja i postavljanje teksta dugmeta
                    $button_text = ($row['status_izvrsenja'] === "Poslato") ? "Poslato" : "Pošalji";
                    ?>

                    <form id="emailForm" action="../damage/send_email.php" method="post">
                        <input type="hidden" name="id" value="<?php echo htmlspecialchars($row['id']); ?>"
                            <?php echo $input_disabled; ?>>
                        <input type="hidden" name="klijent_id"
                            value="<?php echo htmlspecialchars($row['klijent_id']); ?>" <?php echo $input_disabled; ?>>
                        <button type="button" class="btn btn-sm btn-success" id="openConfirmModal"
                            <?php echo $disabled . ' ' . $input_disabled; ?>>
                            <?php echo $button_text; ?>
                        </button>
                    </form>

                </td>
                <td><?php echo htmlspecialchars($row['created_at']); ?></td>
            </tr>
            <?php endwhile; ?>
            <?php else: ?>
            <tr>
                <td colspan="7">Nema kreiranih šteta</td>
            </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <!-- Modal za potvrdu slanja  -->
    <div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmModalLabel">Potvrda slanja mejla</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Da li ste sigurni da želite da pošaljete mejl?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Odustani</button>
                    <button type="button" class="btn btn-success" id="confirmSend">Pošalji</button>
                </div>
            </div>
        </div>
    </div>


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
                    <form method="POST" action="../damage/add_client_damage.php" enctype="multipart/form-data"
                        class="needs-validation" novalidate>

                        <div class="form-floating mb-2">
                            <input type="text" class="form-control" id="searchKlijentNew" name="searchKlijentNew"
                                placeholder="Pretraži klijente..." autocomplete="off" required>
                            <label for="searchKlijentNew">Pretraži klijente...</label>
                        </div>

                        <!-- Pretraga klijenata i Select sa filtriranjem -->
                        <!-- <div class="mb-3">
                            <label for="searchKlijentNew" class="form-label">Izaberite klijenta</label>
                            <input type="text" id="searchKlijentNew" class="form-control"
                                placeholder="Pretraži klijente..." autocomplete="off" required>
                        </div> -->

                        <div class="mb-3">
                            <select class="form-select" name="klijent_id" id="klijentNew" required size="5"
                                style="display: none;">
                                <?php
                            include('config.php');

                            $sql = "SELECT * FROM klijent";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo '<option value="' . $row['id'] . '">' . $row['ime_prezime'] . '</option>';
                                }
                            } else {
                                echo '<option value="">Nema klijenata</option>';
                            }
                            ?>
                            </select>
                        </div>

                        <!-- JavaScript za filtriranje, otvaranje select-a, i postavljanje vrednosti u input -->
                        <script>
                        // Otvori select kada se klikne na pretragu
                        document.getElementById('searchKlijentNew').addEventListener('focus', function() {
                            document.getElementById('klijentNew').style.display = 'block'; // Prikazati select
                        });

                        // Filtriranje opcija u select-u dok korisnik unosi tekst
                        document.getElementById('searchKlijentNew').addEventListener('keyup', function() {
                            let filter = this.value.toLowerCase();
                            let options = document.querySelectorAll("#klijentNew option");

                            options.forEach(option => {
                                let text = option.textContent.toLowerCase();
                                option.style.display = text.includes(filter) || option.value === "" ?
                                    "" :
                                    "none";
                            });
                        });

                        // Zatvori select ako korisnik klikne izvan njega
                        document.addEventListener('click', function(e) {
                            let select = document.getElementById('klijentNew');
                            if (!select.contains(e.target) && e.target !== document.getElementById(
                                    'searchKlijentNew')) {
                                select.style.display = 'none'; // Zatvori select ako klikneš izvan njega
                            }
                        });

                        // Postavljanje vrednosti u input kada je odabran klijent iz select-a
                        document.getElementById('klijentNew').addEventListener('change', function() {
                            let selectedOption = this.options[this.selectedIndex];
                            let searchInput = document.getElementById('searchKlijentNew');
                            if (selectedOption.value !== "") {
                                searchInput.value = selectedOption
                                    .textContent; // Postavi naziv odabranog klijenta u input
                            } else {
                                searchInput.value = ''; // Ako nije odabran klijent, input ostaje prazan
                            }
                            // Zatvori select nakon što je odabran klijent
                            document.getElementById('klijentNew').style.display = 'none';
                        });
                        </script>

                        <div class="form-floating mb-2">
                            <input type="text" class="form-control" id="regOznaka" name="reg_oznaka"
                                placeholder="Registarska oznaka (Oštećenog)" autocomplete="off" required>
                            <label for="regOznaka">Registarska oznaka (Oštećenog)</label>
                        </div>

                        <div class="form-floating mb-2">
                            <select class="form-select mb-2" name="osig_kuca" autocomplete="off" required>
                                <option value="">Izaberite...</option>
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
                            </select>
                            <label for="regOznaka">Osiguravajuća kuća (Štetnika)</label>
                        </div>

                        <div class="form-floating">
                            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2"
                                style="height: 100px"></textarea>
                            <label for="floatingTextarea2">Opis (nije obavezno)</label>
                        </div>

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

                            <div class="accordion my-5" id="fileAccordion">
                                <h5>Dokumenta</h5>

                                <!-- Input za punomoć odmah ispod h5 -->
                                <div class="col-md-12 mb-3">
                                    <label for="punomoc" class="form-label">Izaberite punomoć:</label>
                                    <input type="file" name="punomoc" id="punomoc" class="form-control" required>
                                    <div class="invalid-feedback">Punomoć je obavezna</div>
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
                                                <div class="col-md-6 mb-3">
                                                    <label for="<?= $fileName ?>" class="form-label">Izaberite fajl
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

                    <div>
                        <!-- Informativna poruka -->
                        <div class="mt-4 alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Napomena:</strong> Možete uploadovati fajlove u različitim formatima (JPEG, PNG,
                            PDF, itd.), ali
                            imajte na umu da pregled (preview) neće biti dostupan za PDF i druge formate osim slika.
                            Preporučuje se da
                            uploadujete slike (JPEG, PNG) za lakšu obradu i pregled. Hvala na razumevanju!
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <script>
    // otvaranje modala za potvrdu slanja
    document.addEventListener("DOMContentLoaded", function() {
        var confirmModal = new bootstrap.Modal(document.getElementById("confirmModal"));
        var emailForm = document.getElementById("emailForm");

        document.getElementById("openConfirmModal").addEventListener("click", function() {
            confirmModal.show();
        });

        document.getElementById("confirmSend").addEventListener("click", function() {
            emailForm.submit();
        });
    });

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


    // Pretraga u tabeli klijenata
    document.getElementById('searchInput').addEventListener('keyup', function() {
        let filter = this.value.toLowerCase();
        let rows = document.querySelectorAll("#steteTable tbody tr");

        rows.forEach(row => {
            let text = row.innerText.toLowerCase();
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