<?php
include('config.php');

$sql = "SELECT *, DATE_FORMAT(skadencar_pocetak, '%m/%Y') AS mesec_godina 
        FROM skadencar 
        ORDER BY YEAR(skadencar_pocetak) ASC, MONTH(skadencar_pocetak) ASC";
$result = $conn->query($sql);
?>

<div class="container-fluid mt-5">

    <div class="sticky-top py-2 modal-custom" style="z-index: 1010; top: 56px;">
        <h2 class="mb-4">Skadencar obnove</h2>

        <div class="row" style="z-index: 1030;">
            <div class="col-11">
                <!-- Search input i dugme za reload -->
                <div class="mb-3 position-relative">
                    <input type="text" id="searchInput" class="form-control ps-5" placeholder="Pretraži skadencar...">
                    <i class="bi bi-search position-absolute top-50 start-0 translate-middle-y ms-3"></i>

                    <!-- Dugme za reload stranice -->
                    <button id="reloadButton"
                        class="btn btn-sm btn-light position-absolute top-50 end-0 translate-middle-y me-2">
                        PONIŠTI FILTER <i class="bi bi-x-lg"></i>
                    </button>


                </div>

            </div>
            <div class="col-1 p-0">
                <!-- Dugme za collapse -->
                <button class="btn btn-dark mb-3 " type="button" data-bs-toggle="collapse"
                    data-bs-target="#filterCollapse" aria-expanded="false" aria-controls="filterCollapse">
                    FILTERI <i class="bi bi-funnel"></i>
                </button>
            </div>
        </div>

        <!-- Filteri -->
        <div class="collapse" id="filterCollapse">
            <div class="row">
                <div class="col-4 mb-2">
                    <label for="filterBrojPolise">Broj polise:</label>
                    <input type="text" id="filterBrojPolise" class="form-control" placeholder="Unesi broj polise">
                </div>

                <div class="col-4 mb-2">
                    <label for="filterImePrezime">Ime i Prezime:</label>
                    <input type="text" id="filterImePrezime" class="form-control" placeholder="Unesi ime i prezime">
                </div>

                <div class="col-4 mb-2">
                    <label for="filterMBPIB">MB/PIB:</label>
                    <input type="text" id="filterMBPIB" class="form-control" placeholder="Unesi MB/PIB">
                </div>

                <div class="col-4 mb-2">
                    <label for="filterOsigKuca">Osiguravajuća Kuća:</label>
                    <select id="filterOsigKuca" class="form-select">
                        <option value="">Odaberi osiguravajuću kuću</option>
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
                </div>

                <div class="col-4 mb-2">
                    <label for="filterBrokerskaKuca">Brokerska Kuća:</label>
                    <input type="text" id="filterBrokerskaKuca" class="form-control" placeholder="Unesi brokersku kuću">
                </div>

                <div class="col-4 mb-2">
                    <label for="filterGranaTarife">Grana Tarife:</label>
                    <select id="filterGranaTarife" class="form-select">
                        <option value="">Odaberi granu tarife</option>
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
                </div>

                <div class="col-4 mb-4">
                    <label for="filterNacinPlacanja">Način Plaćanja:</label>
                    <select id="filterNacinPlacanja" class="form-select">
                        <option value="">Odaberi način plaćanja</option>
                        <option value="U CELOSTI">U celosti</option>
                        <option value="NA RATE">Na rate</option>
                    </select>
                </div>
            </div>
        </div>
    </div>

    <table class="table table-bordered" id="skadencarTable">
        <thead class="table-dark sticky-top" style="top: 185px; z-index: 1000;">
            <tr>
                <th>Broj polise</th>
                <th>Ime i Prezime / Naziv firme</th>
                <th>MB/PIB</th>
                <th>Osig. kuća</th>
                <th>Skadencar početak</th>
                <th>Grana Tarife</th>
                <th style="max-width: 100px">Premija bez poreza</th>
                <th style="max-width: 100px">Premija sa porezom</th>
                <th>Način plaćanja</th>
                <th>Brokerska kuća</th>
                <th>Skadencar istek</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
            $trenutna_grupa = "";
            $grupa_suma = 0;

            if ($result->num_rows > 0):
                while ($row = $result->fetch_assoc()):
                    if ($row['mesec_godina'] !== $trenutna_grupa) {
                        $trenutna_grupa = $row['mesec_godina'];
                        $grupa_suma = 0;

                        echo "<tr class='table-warning'>
                                <td colspan='12' class='text-center fw-bold'>Mesec: $trenutna_grupa</td>
                            </tr>";
                    }

                    $grupa_suma += floatval($row['premija_bez_poreza']);

                    // Izračunavanje broja dana do isteka
                    $kraj_timestamp = strtotime($row['skadencar_kraj']);
                    $danas = strtotime(date('Y-m-d'));
                    $dana_do_kraja = ($kraj_timestamp - $danas) / (60 * 60 * 24);
                    $klasa_reda_obnova = ($dana_do_kraja <= 20 && $row['skadencar_obnova'] != 1) ? 'table-danger' : '';
                    $klasa_reda_obnovljeno = ($row['skadencar_obnova'] == 1) ? 'table-success' : '';
                    $stil = ($dana_do_kraja <= 20 && $row['skadencar_obnova'] != 1) ? 'font-weight: bold; color: red;' : '';
                    
                    ?>
            <tr class="<?php echo $row['skadencar_obnova'] == 1 ? $klasa_reda_obnovljeno : $klasa_reda_obnova; ?>">

                <td>
                    <?php echo htmlspecialchars($row['broj_polise']); ?>
                </td>
                <td style="max-width: 200px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                    <?php echo htmlspecialchars($row['ime_prezime']); ?>
                </td>
                <td>
                    <?php echo htmlspecialchars($row['mb_pib']); ?>
                </td>
                <td>
                    <?php echo htmlspecialchars($row['osig_kuca']); ?>
                </td>
                <td>
                    <?php echo date('d/m/Y', strtotime($row['skadencar_pocetak'])); ?>
                </td>
                <td>
                    <?php echo htmlspecialchars($row['grana_tarifa']); ?>
                </td>
                <td class="text-center">
                    <?php echo number_format($row['premija_bez_poreza'], 2, ',', '.'); ?>
                </td>
                <td class="text-center">
                    <?php echo number_format($row['premija_sa_porezom'], 2, ',', '.'); ?>
                </td>
                <td>
                    <?php echo ucfirst(strtolower($row['nacin_placanja'])); ?>
                </td>
                <td style="max-width: 100px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                    <?php echo ucfirst(strtolower($row['brokerska_kuca'])); ?>
                </td>
                <td style="<?php echo $stil; ?>">
                    <?php echo date('d/m/Y', strtotime($row['skadencar_kraj'])); ?>
                </td>
                <td>
                    <?php 
                    $disabledObnova = ($dana_do_kraja <= 20 && $row['skadencar_obnova'] != 1) ? '' : 'disabled';
                    ?>

                    <form action="../skadar/rucna_skadencar_obnova.php" method="post">
                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                        <button class="btn btn-sm btn-success" <?php echo $disabledObnova ?>>Obnovi</button>
                    </form>
                </td>
                <!-- <td>
                    <button title="Uredi polisu" class="btn btn-sm btn-warning" onclick="editSkadarModal(
                                '<?php echo htmlspecialchars($row['id']); ?>',
                                '<?php echo htmlspecialchars($row['broj_polise']); ?>',
                                '<?php echo htmlspecialchars($row['ime_prezime']); ?>',
                                '<?php echo htmlspecialchars($row['osig_kuca']); ?>',
                                '<?php echo htmlspecialchars($row['skadencar_pocetak']); ?>',
                                '<?php echo htmlspecialchars($row['grana_tarifa']); ?>',
                                '<?php echo htmlspecialchars($row['premija_sa_porezom']); ?>',
                                '<?php echo htmlspecialchars($row['nacin_placanja']); ?>',
                                '<?php echo htmlspecialchars($row['brokerska_kuca']); ?>',
                                '<?php echo htmlspecialchars($row['komentar']); ?>'
                            )">
                        <i class="bi bi-pencil-square"></i>
                    </button>
                </td> -->
            </tr>
            <?php endwhile; ?>
            <?php else: ?>
            <tr>
                <td colspan="12">Nema unetih polisa u skadencaru</td>
            </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?php require './modal/edit_new_skadencar_modal.php'; ?>


<!-- Skripta za pretragu -->
<script>
function removeDiacritics(str) {
    return str.normalize("NFD").replace(/[\u0300-\u036f]/g, "");
}

document.getElementById('searchInput').addEventListener('keyup', function() {
    let filter = removeDiacritics(this.value.toLowerCase());
    let rows = document.querySelectorAll("#skadencarTable tbody tr");

    rows.forEach(row => {
        const isGroupRow = row.classList.contains('table-primary');
        const isSummaryRow = row.classList.contains('table-light');

        if (isGroupRow || isSummaryRow) {
            row.style.display = 'none';
        } else {
            let rowText = removeDiacritics(row.innerText.toLowerCase());
            row.style.display = rowText.includes(filter) ? '' : 'none';
        }
    });
});

document.getElementById('reloadButton').addEventListener('click', function() {
    location.reload();
});

// Dodavanje funkcionalnosti za reload pri pritisku na ESC taster
document.addEventListener('keydown', function(event) {
    if (event.key === 'Escape') { // Ako je pritisnut ESC taster
        location.reload(); // Reloaduje stranicu
    }
});



// Funkcija za uklanjanje dijakritičkih znakova (ako je potrebno)
function removeDiacritics(str) {
    return str.normalize("NFD").replace(/[\u0300-\u036f]/g, "");
}

function filterTable() {
    let brokerskaKucaFilter = removeDiacritics(document.getElementById('filterBrokerskaKuca').value.toLowerCase());
    let granaTarifeFilter = removeDiacritics(document.getElementById('filterGranaTarife').value.toLowerCase());
    let imePrezimeFilter = removeDiacritics(document.getElementById('filterImePrezime').value.toLowerCase());
    let osigKucaFilter = removeDiacritics(document.getElementById('filterOsigKuca').value.toLowerCase());
    let brojPoliseFilter = removeDiacritics(document.getElementById('filterBrojPolise').value.toLowerCase());
    let nacinPlacanjaFilter = removeDiacritics(document.getElementById('filterNacinPlacanja').value.toLowerCase());
    let mbPibFilter = removeDiacritics(document.getElementById('filterMBPIB').value.toLowerCase());

    let rows = document.querySelectorAll("#skadencarTable tbody tr");

    // Sakrij sve redove pre filtriranja
    rows.forEach(row => {
        row.style.display = 'none';
    });

    rows.forEach(row => {
        let brokerskaKucaCell = row.children[9]; // Kolona "Brokerska kuća"
        let granaTarifeCell = row.children[5]; // Kolona "Grana tarife"
        let imePrezimeCell = row.children[1]; // Kolona "Ime i Prezime"
        let osigKucaCell = row.children[3]; // Kolona "Osiguravajuca kuca"
        let brojPoliseCell = row.children[0]; // Kolona "Broj polise"
        let nacinPlacanjaCell = row.children[8]; // Kolona "Nacin placanja"
        let mbPibCell = row.children[2]; // Kolona "MB PIB"

        // Ako bilo koja od ćelija nije pronađena, ignorišemo red
        if (!brokerskaKucaCell || !granaTarifeCell || !imePrezimeCell || !osigKucaCell || !brojPoliseCell ||
            !nacinPlacanjaCell || !mbPibCell) return;

        let brokerskaKucaText = removeDiacritics(brokerskaKucaCell.textContent.toLowerCase());
        let granaTarifeText = removeDiacritics(granaTarifeCell.textContent.toLowerCase());
        let imePrezimeText = removeDiacritics(imePrezimeCell.textContent.toLowerCase());
        let osigKucaText = removeDiacritics(osigKucaCell.textContent.toLowerCase());
        let brojPoliseText = removeDiacritics(brojPoliseCell.textContent.toLowerCase());
        let nacinPlacanjaText = removeDiacritics(nacinPlacanjaCell.textContent.toLowerCase());
        let mbPibText = removeDiacritics(mbPibCell.textContent.toLowerCase());

        const isGroupRow = row.classList.contains('table-primary'); // Grupisani red
        const isSummaryRow = row.classList.contains('table-light'); // Summary red

        // Skrivanje grupisanih i summary redova tokom filtriranja
        if (isGroupRow || isSummaryRow) {
            row.style.display = 'none';
        } else {
            // Logika za filtriranje: Ako se bilo koji kriterijum ne poklapa, sakriji red
            if (
                brokerskaKucaText.includes(brokerskaKucaFilter) &&
                granaTarifeText.includes(granaTarifeFilter) &&
                imePrezimeText.includes(imePrezimeFilter) &&
                osigKucaText.includes(osigKucaFilter) &&
                nacinPlacanjaText.includes(nacinPlacanjaFilter) &&
                mbPibText.includes(mbPibFilter) &&
                brojPoliseText.includes(brojPoliseFilter)
            ) {
                row.style.display = ''; // Prikazujemo red
            }
        }
    });
}

// Dodavanje event listenera na input polja
document.getElementById('filterBrokerskaKuca').addEventListener('input', filterTable);
document.getElementById('filterGranaTarife').addEventListener('input', filterTable);
document.getElementById('filterImePrezime').addEventListener('input', filterTable);
document.getElementById('filterOsigKuca').addEventListener('input', filterTable);
document.getElementById('filterBrojPolise').addEventListener('input', filterTable);
document.getElementById('filterNacinPlacanja').addEventListener('input', filterTable);
document.getElementById('filterMBPIB').addEventListener('input', filterTable);


// Zatvori filter kad počne skrolovanje
// window.addEventListener('scroll', function() {
//     var filterCollapse = document.getElementById('filterCollapse');
//     if (filterCollapse.classList.contains('show')) {
//         filterCollapse.classList.remove('show'); // Zatvori filter
//     }
// });
</script>