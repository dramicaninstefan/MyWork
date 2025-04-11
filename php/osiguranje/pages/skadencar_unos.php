<?php
    include('config.php');

    $sql = "SELECT DATE_FORMAT(created_at, '%Y-%m-%d') AS grupa_datum, 
    SUM(premija_bez_poreza) AS ukupno_premija,
    COUNT(*) AS broj_polisa
    FROM skadencar 
    GROUP BY grupa_datum
    ORDER BY grupa_datum DESC";
    $result = $conn->query($sql);

    ?>

<div class="container-fluid mt-5">
    <div class="sticky-top py-2 modal-custom" style="z-index: 1010; top: 56px;">
        <h2 class="mb-4">Skadencar unos</h2>

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

                <div class="col-4 mb-2">
                    <label for="filterBrokerskaKuca">Brokerska Kuća:</label>
                    <select id="filterBrokerskaKuca" name="brokerska_kuca" class="form-select">
                        <option value="" selected>Odaberi brokersku kuću</option>
                        <?php
                            include('config.php'); // ili putanja do tvoje konekcije sa bazom

                            $sqlBrokKuca = "SELECT * FROM brokerska_kuca ORDER BY naziv ASC";
                            $resultBrokKuca = $conn->query($sqlBrokKuca);

                            if ($resultBrokKuca->num_rows > 0) {
                                while ($row = $resultBrokKuca->fetch_assoc()) {
                                    echo '<option value="' . strtoupper($row['naziv']) . '">' . htmlspecialchars($row['naziv']) . '</option>';
                                }
                            } else {
                                echo '<option value="">Nema dostupnih kuća</option>';
                            }
                        ?>
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




        <button class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#addNewSkadencarModal">
            Nova polisa
        </button>

        <button type="button" class="btn btn-primary  mb-3" data-bs-toggle="modal" data-bs-target="#csvModal">
            Upload CSV <i class="bi bi-file-earmark-arrow-up"></i>
        </button>

        <form class="d-inline" action="../skadar/skadencar_export_excel.php" method="post" id="exportForm">
            <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal"
                data-bs-target="#confirmDownloadModal">
                Exportuj u Excel <i class="bi bi-file-earmark-arrow-down"></i>
            </button>
        </form>
    </div>


    <table class="table table-bordered" id="skadencarTable">
        <thead class="table-dark sticky-top" style="top: 240px; z-index: 1000;">
            <tr>
                <th>Broj polise</th>
                <th>Ime i Prezime / Naziv firme</th>
                <th>MB/PIB</th>
                <th>Osig. kuća</th>
                <th>Skadencar početak</th>
                <th>Grana Tarife</th>
                <th>Premija bez poreza</th>
                <th>Premija sa porezom</th>
                <th>Način plaćanja</th>
                <th>Brokerska kuća</th>
                <th>Skadencar istek</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0):
                $trenutna_grupa = "";
                $grupa_suma = 0;

                while ($row = $result->fetch_assoc()):
                    if ($row['grupa_datum'] !== $trenutna_grupa) {
                        if ($trenutna_grupa !== "") {
                            echo "<tr class='table-light'>
                                    <td colspan='6' class='text-end fw-bold'>Ukupno za $trenutna_grupa:</td>
                                    <td class='text-center fw-bold'>".number_format($grupa_suma, 2, ',', '.')."</td>
                                    <td colspan='5'></td>
                                </tr>";
                        }

                        $trenutna_grupa = $row['grupa_datum'];
                        $grupa_suma = 0;

                        echo "<tr class='table-warning'>
                                <td colspan='12' class='text-center fw-bold'>Datum: $trenutna_grupa</td>
                            </tr>";
                    }

                    // Prikazivanje podataka iz druge tabele
                    $skadencar_sql = "SELECT * FROM skadencar WHERE DATE_FORMAT(created_at, '%Y-%m-%d') = '$trenutna_grupa'";
                    $skadencar_result = $conn->query($skadencar_sql);
                    while ($skadencar_row = $skadencar_result->fetch_assoc()):

                        $grupa_suma += floatval($skadencar_row['premija_bez_poreza']);

                        $klasa_reda = ($skadencar_row['brokerska_kuca_isplaceno'] == 1) ? 'table-success-strong' : '';
            ?>
            <tr>
                <td>
                    <?php echo htmlspecialchars($skadencar_row['broj_polise']); ?>
                </td>
                <td style="max-width: 200px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                    <?php echo htmlspecialchars($skadencar_row['ime_prezime']); ?>
                </td>
                <td>
                    <?php echo htmlspecialchars($skadencar_row['mb_pib']); ?>
                </td>
                <td>
                    <?php echo htmlspecialchars($skadencar_row['osig_kuca']); ?>
                </td>
                <td>
                    <?php echo date('d/m/Y', strtotime($skadencar_row['skadencar_pocetak'])); ?>
                </td>
                <td>
                    <?php echo htmlspecialchars($skadencar_row['grana_tarifa']); ?></td>
                <td class="text-center">
                    <?php echo number_format($skadencar_row['premija_bez_poreza'], 2, ',', '.'); ?>
                </td>
                <td class="text-center">
                    <?php echo number_format($skadencar_row['premija_sa_porezom'], 2, ',', '.'); ?>
                </td>
                <td>
                    <?php echo ucfirst(strtolower($skadencar_row['nacin_placanja'])); ?>
                </td>
                <td class="<?php echo $klasa_reda?>"
                    style="max-width: 100px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                    <?php echo ucfirst(strtolower($skadencar_row['brokerska_kuca'])); ?>
                </td>
                <td>
                    <?php echo date('d/m/Y', strtotime($skadencar_row['skadencar_kraj'])); ?>
                </td>
                <td>
                    <button title="Uredi polisu" class="btn btn-sm btn-warning" onclick="editSkadarModal(
                                '<?php echo htmlspecialchars($skadencar_row['id']); ?>',
                                '<?php echo htmlspecialchars($skadencar_row['broj_polise']); ?>',
                                '<?php echo htmlspecialchars($skadencar_row['ime_prezime']); ?>',
                                '<?php echo htmlspecialchars($skadencar_row['osig_kuca']); ?>',
                                '<?php echo htmlspecialchars($skadencar_row['skadencar_pocetak']); ?>',
                                '<?php echo htmlspecialchars($skadencar_row['grana_tarifa']); ?>',
                                '<?php echo htmlspecialchars($skadencar_row['premija_sa_porezom']); ?>',
                                '<?php echo htmlspecialchars($skadencar_row['nacin_placanja']); ?>',
                                '<?php echo htmlspecialchars($skadencar_row['brokerska_kuca']); ?>',
                                '<?php echo htmlspecialchars($skadencar_row['komentar']); ?>'
                            )">
                        <i class="bi bi-pencil-square"></i>
                    </button>
                </td>

            </tr>
            <?php endwhile; ?>
            <?php endwhile; ?>
            <!-- Prikaz sume za poslednju grupu -->
            <tr class='table-light'>
                <td colspan='6' class='text-end fw-bold'>Ukupno za <?php echo $trenutna_grupa; ?>:</td>
                <td class='text-center fw-bold'><?php echo number_format($grupa_suma, 2, ',', '.'); ?></td>
                <td colspan='5'></td>
            </tr>
            <?php else: ?>
            <tr>
                <td colspan="12">Nema unetih polisa u skadencaru</td>
            </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <table class="container">
        <tr class="table-light">
            <td colspan='6' class='text-end fw-bold'></td>
            <td class="text-center fw-bold">
                <div id="totalSumDisplay"></div> <!-- Početna vrednost, može biti promenjena dinamički -->
            </td>
            <td colspan='6'></td>
        </tr>
    </table>




</div>

<!-- Modal za potvrdu preuzimanja -->
<div class="modal fade" id="confirmDownloadModal" tabindex="-1" aria-labelledby="confirmDownloadModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmDownloadModalLabel">Potvrdi skidanje</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Da li ste sigurni da želite da eksportujete podatke u Excel?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Otkaži</button>
                <button type="button" class="btn btn-success" id="confirmExportBtn">Eksportuj</button>
            </div>
        </div>
    </div>
</div>

<script>
// Kada korisnik potvrdi akciju
document.getElementById('confirmExportBtn').addEventListener('click', function() {
    // Poslati formu
    document.getElementById('exportForm').submit();
});
</script>


<?php require './modal/add_new_skadencar_modal.php'; ?>
<?php require './modal/import_skadar_cvs.php'; ?>
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
        // Uklanjamo grupne i suma redove iz pretrage
        const isGroupRow = row.classList.contains('table-primary');
        const isSummaryRow = row.classList.contains('table-light');

        if (isGroupRow || isSummaryRow) {
            // Ovi redovi ne treba da budu obuhvaćeni pretragom
            row.style.display = 'none';
        } else {
            // Proveravamo da li se pretraga poklapa sa osnovnim podacima
            let rowText = removeDiacritics(row.innerText.toLowerCase());

            // Ako pretraga odgovara, prikazujemo red
            row.style.display = rowText.includes(filter) ? '' : 'none';
        }
    });
});



// Dodavanje funkcionalnosti za reload dugme
document.getElementById('reloadButton').addEventListener('click', function() {
    location.reload(); // Reloaduje stranicu
});

// Dodavanje funkcionalnosti za reload pri pritisku na ESC taster
document.addEventListener('keydown', function(event) {
    if (event.key === 'Escape') { // Ako je pritisnut ESC taster
        location.reload(); // Reloaduje stranicu
    }
});

// proverava da li u tabeli postoji broj_polise i broji u crveno ako postoji, kao duplikat
document.addEventListener("DOMContentLoaded", function() {
    const rows = document.querySelectorAll("#skadencarTable tbody tr");
    const poliseMap = {};

    rows.forEach(row => {
        const polisaCell = row.children[0]; // Broj polise se nalazi u prvoj koloni
        if (!polisaCell) return;

        const brojPolise = polisaCell.textContent.trim();

        if (poliseMap[brojPolise]) {
            // Oboj samo konkretne <td> elemente, ne cele redove
            polisaCell.classList.add("table-danger");
            poliseMap[brojPolise].classList.add("table-danger");

            polisaCell.style.fontWeight = "bold";
            poliseMap[brojPolise].style.fontWeight = "bold";

            // Dodaj poruku kao tooltip (opciono)
            polisaCell.setAttribute("title", "Duplikat broja polise");
            poliseMap[brojPolise].setAttribute("title", "Duplikat broja polise");
        } else {
            poliseMap[brojPolise] = polisaCell;
        }
    });
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

    // Suma za filtrirane redove
    let totalSum = 0;

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
        let premijaSaPorezomCell = row.children[6]; // Kolona "Premija sa porezom"


        // Ako bilo koja od ćelija nije pronađena, ignorišemo red
        if (!brokerskaKucaCell || !granaTarifeCell || !imePrezimeCell || !osigKucaCell || !brojPoliseCell ||
            !nacinPlacanjaCell || !mbPibCell || !premijaSaPorezomCell) return;

        let brokerskaKucaText = removeDiacritics(brokerskaKucaCell.textContent.toLowerCase());
        let granaTarifeText = removeDiacritics(granaTarifeCell.textContent.toLowerCase());
        let imePrezimeText = removeDiacritics(imePrezimeCell.textContent.toLowerCase());
        let osigKucaText = removeDiacritics(osigKucaCell.textContent.toLowerCase());
        let brojPoliseText = removeDiacritics(brojPoliseCell.textContent.toLowerCase());
        let nacinPlacanjaText = removeDiacritics(nacinPlacanjaCell.textContent.toLowerCase());
        let mbPibText = removeDiacritics(mbPibCell.textContent.toLowerCase());

        // Provera da li red odgovara filterima
        if (
            (brokerskaKucaText.includes(brokerskaKucaFilter)) &&
            (granaTarifeText.includes(granaTarifeFilter)) &&
            (imePrezimeText.includes(imePrezimeFilter)) &&
            (osigKucaText.includes(osigKucaFilter)) &&
            (brojPoliseText.includes(brojPoliseFilter)) &&
            (nacinPlacanjaText.includes(nacinPlacanjaFilter)) &&
            (mbPibText.includes(mbPibFilter))
        ) {
            // Prikazivanje redova koji zadovoljavaju filter
            row.style.display = '';

            // Uzimanje vrednosti premije sa porezom, uklanjanje zareza i pretvaranje u broj
            let premijaSaPorezom = parseFloat(premijaSaPorezomCell.textContent.replace(/\./g, '').replace(',',
                '.'));

            // Provera da li je broj validan
            if (!isNaN(premijaSaPorezom)) {
                totalSum += premijaSaPorezom;
                console.log(totalSum);

            }
        }
    });

    // Formatiranje sume sa lokalizovanim formatom (za srpski jezik sa zarezom kao decimalnim separatorom)
    let formattedTotalSum = new Intl.NumberFormat('sr-RS', {
        style: 'decimal',
        minimumFractionDigits: 2,
        maximumFractionDigits: 2
    }).format(totalSum);

    // Prikazivanje sume na stranici
    document.getElementById("totalSumDisplay").textContent = 'Ukupno: ' + formattedTotalSum + ' RSD';
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