<?php
// Uključite config.php za povezivanje sa bazom
include('config.php'); // Ovaj fajl mora biti u istoj fascikli ili navedite apsolutnu putanju

// Izvlačenje podataka
$query = "SELECT t.id, t.klijent_id, k.ime_prezime, k.kontakt, t.status_izvrsenja, t.poslato, t.created_at
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
                <th style="width: 300px">Ime i Prezime</th>
                <th style="width: 135px">Kontakt</th>
                <th style="width: 135px">Status</th>
                <!-- <th style="width: 180px">Vreme slanja</th> -->
                <th>Akcije</th>
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
                        href="viber://chat/?number=%2B<?php echo $broj_bez_plus;?>" target="_blank" rel="noreferrer">
                        <?php echo htmlspecialchars( $row['kontakt']); ?>
                    </a>
                </td>
                <td>
                    <?php
                    $statusClass = '';
                    switch (strtolower($row['status_izvrsenja'])) {
                        case 'kreirano':
                            $statusClass = 'status-kreirano';
                            break;
                        case 'punomoc':
                            $statusClass = 'status-punomoc';
                            break;
                        case 'u pripremi':  
                        case 'u izradi':
                            $statusClass = 'status-u-izradi';
                            break;
                        case 'poslato':
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
                <!-- <td>
                    <div
                        class="<?php echo $row['poslato'] && $row['poslato'] !== '0000-00-00 00:00:00' ? 'status-green' : 'status-red'; ?>">
                        <?php echo ($row['poslato'] === '0000-00-00 00:00:00' || !$row['poslato']) ? 'NIJE' : $row['poslato']; ?>
                    </div>
                </td> -->
                </td>
                <td>
                    <form action="/client_damage_files" method="post">
                        <input type="hidden" name="id" value="<?php echo htmlspecialchars($row['id']); ?>">
                        <input type="hidden" name="klijent_id"
                            value="<?php echo htmlspecialchars($row['klijent_id']); ?>">
                        <button type="submit" class="btn btn-sm btn-primary">
                            <i class="bi bi-file-earmark"></i>
                            Dokumenta
                        </button>
                    </form>
                </td>
                <td><?php echo htmlspecialchars($row['created_at']); ?></td>
            </tr>
            <?php endwhile; ?>
            <?php else: ?>
            <tr>
                <td colspan="5">Nema kreiranih šteta</td>
            </tr>
            <?php endif; ?>
        </tbody>
    </table>



    <!-- Modal kreiraj novu stetu -->
    <div class="modal fade" id="dodajStetuModal" tabindex="-1" aria-labelledby="dodajStetuModalLabel"
        data-bs-backdrop="static" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content ">
                <div class="modal-header">
                    <h5 class="modal-title" id="dodajStetuModalLabel">Dodaj novu štetu</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="../damage/add_client_damage.php" enctype="multipart/form-data"
                        class="needs-validation" novalidate>
                        <div class="form-group">
                            <h5>Odaberite klijenta:</h5>
                            <select name="klijent_id" id="klijent_id" class="form-control" required>
                                <option value=''>Izaberite klijenta</option>
                                <?php
                                    // Izvlačenje klijenata za padajući meni
                                    $klijentiQuery = "SELECT id, ime_prezime FROM klijent";
                                    $klijentiResult = $conn->query($klijentiQuery);

                                    if ($klijentiResult->num_rows > 0) {
                                        while ($klijent = $klijentiResult->fetch_assoc()) {
                                            echo '<option value="' . htmlspecialchars($klijent['id']) . '">' . htmlspecialchars($klijent['ime_prezime']) . '</option>';
                                        }
                                    } else {
                                        echo '<option value="">Nema dostupnih klijenata</option>';
                                    }
                                ?>
                            </select>
                            <div class="invalid-feedback">Odaberite klijenta</div>
                        </div>


                        <div class="row">
                            <?php
                            $fileGroups = [
                                "Oštećeni" => [
                                    "osteceni_licna_prednja", "osteceni_licna_zadnja", "osteceni_saobracajna_prednja", "osteceni_saobracajna_zadnja",
                                    "osteceni_vozacka_prednja", "osteceni_vozacka_zadnja", "osteceni_izjava",
                                    "osteceni_polisa", "osteceni_tekuci", "emin_procena"
                                ],
                                "Štetnik" => [
                                    "stetnik_licna_prednja", "stetnik_licna_zadnja", "stetnik_saobracajna_prednja", "stetnik_saobracajna_zadnja", 
                                    "stetnik_vozacka_prednja", "stetnik_vozacka_zadnja", "stetnik_izjava", "stetnik_polisa"
                                ],
                                "Dodatna dokumenta" => [
                                    "dodatni_dokument1", "dodatni_dokument2", "dodatni_dokument3", "dodatni_dokument4", "dodatni_dokument5", "dodatni_dokument6"
                                ]
                            ];
                            ?>

                            <div class="accordion my-5" id="fileAccordion">
                                <h5>Dokumenta</h5>
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