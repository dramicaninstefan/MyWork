<?php
include('config.php');

// Upit za dobijanje podataka iz tabele 'skadencar' gde je brokerska_kuca != NULL i nije prazna
$sql = "SELECT *, GREATEST(
    COALESCE(brokerska_kuca_uplata_datum, '0000-00-00'),
    COALESCE(brokerska_kuca_uplata_rata1_datum, '0000-00-00'),
    COALESCE(brokerska_kuca_uplata_rata2_datum, '0000-00-00'),
    COALESCE(brokerska_kuca_uplata_rata3_datum, '0000-00-00'),
    COALESCE(brokerska_kuca_uplata_rata4_datum, '0000-00-00'),
    COALESCE(brokerska_kuca_uplata_rata5_datum, '0000-00-00'),
    COALESCE(brokerska_kuca_uplata_rata6_datum, '0000-00-00'),
    COALESCE(brokerska_kuca_uplata_rata7_datum, '0000-00-00'),
    COALESCE(brokerska_kuca_uplata_rata8_datum, '0000-00-00'),
    COALESCE(brokerska_kuca_uplata_rata9_datum, '0000-00-00'),
    COALESCE(brokerska_kuca_uplata_rata10_datum, '0000-00-00'),
    COALESCE(brokerska_kuca_uplata_rata11_datum, '0000-00-00'),
    COALESCE(brokerska_kuca_uplata_rata12_datum, '0000-00-00')
) AS last_date
FROM skadencar 
WHERE brokerska_kuca IS NOT NULL AND brokerska_kuca != ''
";
$result = $conn->query($sql);

// Grupisanje po brokerska_kuca
$groupedData = [];

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $groupedData[$row['brokerska_kuca']][] = $row;
    }
}
?>

<div class="container-fluid mt-5">

    <div class="sticky-top py-2 modal-custom" style="z-index: 1010; top: 56px;">
        <h2 class="mb-4">Plaćanje preporučiocima (%)</h2>
        <!-- Search input i dugme za reload -->
        <div class="mb-3 position-relative">
            <input type="text" id="searchInput" class="form-control ps-5" placeholder="Pretraži skadencar...">
            <i class="bi bi-search position-absolute top-50 start-0 translate-middle-y ms-3"></i>

            <!-- Dugme za reload stranice -->
            <button id="reloadButton"
                class="btn btn-sm btn-light position-absolute top-50 end-0 translate-middle-y me-2">
                PONIŠTI PRETRAGU <i class="bi bi-arrow-clockwise"></i>
            </button>
        </div>
    </div>



    <table class="table table-bordered" id="skadencarPlacanjeTable">
        <thead class="table-dark sticky-top" style="top: 235px; z-index: 1020;">
            <tr>
                <th style="width: 150px;">Brokerska Kuća</th>
                <th>Broj Polise</th>
                <th style="width: 250px;">Iznos uplate</th>
                <th style="width: 140px;">Poslednja uplata</th>
                <th>Ime i prezime / Naziv firme</th>
                <th style="width: 140px;">Premija bez poreza</th>
                <th style="width: 140px;">Način plaćanja</th>
                <th style="width: 140px;">Za isplatu</th>
                <th style="width: 140px;">Razlika DUG moj</th>
                <th></th>
                <th style="width: 140px;">Procenat</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($groupedData)): ?>
            <?php foreach ($groupedData as $brokerskaKuca => $rows): ?>
            <!-- Grupa po brokerskoj kući -->
            <tr class="table-warning">
                <td colspan="12" style="font-weight: bold; font-size: 18px;">
                    <?php echo htmlspecialchars($brokerskaKuca); ?>
                </td>
            </tr>

            <?php foreach ($rows as $row): ?>
            <?php
                            $lastDateFormatted = $row['last_date'] ? date('d/m/Y H:i', strtotime($row['last_date'])) : 'Nema uplata';
                            $lastDateFormatted = ($lastDateFormatted === "30/11/-0001 00:00") ? 'Nema uplata' : $lastDateFormatted;

                            $popunjeneRate = 0;
                            for ($i = 1; $i <= 12; $i++) {
                                $rata = $row["brokerska_kuca_uplata_rata{$i}"];
                                if (!is_null($rata) && $rata !== '' && $rata != 0) {
                                    $popunjeneRate++;
                                }
                            }

                            $klasa_reda = ($row['brokerska_kuca_isplaceno'] == 1) ? 'table-success' : '';
                        ?>

            <tr class="<?php echo $klasa_reda?>"
                title="<?php echo $row['brokerska_kuca_isplaceno'] == 1 ? 'Isplaceno' : '' ?>">
                <td><?php echo $row['brokerska_kuca']; ?></td>
                <td style="text-align:center;"><?php echo $row['broj_polise']; ?></td>
                <td>
                    <form action="../skadar/save_skadencar_placanja.php" method="POST">
                        <input type="hidden" name="skadencar_id" value="<?php echo $row['id']; ?>">

                        <div class="d-flex">
                            <div id="brokerskaKucaUplata<?php echo $row['id']; ?>"
                                style="<?php echo ($row['brokerska_kuca_uplata_nacin_placanja_toggle'] == 1) ? 'display: block;' : 'display: none;'; ?>">
                                <input type="number" step="0.01" min="0" name="brokerska_kuca_uplata"
                                    class="form-control p-1" value="<?php echo $row['brokerska_kuca_uplata']?>" required
                                    style="width: 170px">
                            </div>

                            <div id="additionalInputs<?php echo $row['id']; ?>"
                                style="<?php echo ($row['brokerska_kuca_uplata_nacin_placanja_toggle'] == 1) ? 'display: none;' : 'display: block;'; ?>">
                                <div class="dropdown" style="width: 170px">
                                    <button class="btn btn-secondary dropdown-toggle form-control  p-1" type="button"
                                        data-bs-toggle="dropdown">
                                        <?php 
                                                        echo ($row['brokerska_kuca_isplaceno'] == 0) 
                                                            ? 'Rate ' . $popunjeneRate . ' / 12' 
                                                            : 'Isplaceno';
                                                    ?>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <?php for ($i = 1; $i <= 12; $i++) { ?>
                                        <li class="m-2">
                                            <input type="number" step="0.01" min="0"
                                                title="<?php echo $row['brokerska_kuca_uplata_rata' . $i .'_datum']; ?>"
                                                name="input_<?php echo $i;?>" class="form-control"
                                                value="<?php echo ($row['brokerska_kuca_uplata_rata' . $i] == 0.00) ? '' : $row['brokerska_kuca_uplata_rata' . $i]; ?>"
                                                placeholder="Rata <?php echo $i ?>" />
                                        </li>
                                        <?php } ?>
                                        <input type="hidden" name="skadencar_id" value="<?php echo $row['id']; ?>">
                                    </ul>
                                </div>
                            </div>

                            <div class="ms-2">
                                <button type="submit" class="btn btn-sm btn-primary">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                        class="bi bi-floppy-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M0 1.5A1.5 1.5 0 0 1 1.5 0H3v5.5A1.5 1.5 0 0 0 4.5 7h7A1.5 1.5 0 0 0 13 5.5V0h.086a1.5 1.5 0 0 1 1.06.44l1.415 1.414A1.5 1.5 0 0 1 16 2.914V14.5a1.5 1.5 0 0 1-1.5 1.5H14v-5.5A1.5 1.5 0 0 0 12.5 9h-9A1.5 1.5 0 0 0 2 10.5V16h-.5A1.5 1.5 0 0 1 0 14.5z" />
                                        <path
                                            d="M3 16h10v-5.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5zm9-16H4v5.5a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 .5-.5zM9 1h2v4H9z" />
                                    </svg>
                                </button>
                            </div>
                        </div>

                        <script>
                        document.addEventListener("DOMContentLoaded", function() {
                            var id = document.getElementById('hiddenId_<?php echo $row['id']; ?>').value;
                            document.getElementById('toggleInputs_' + id).addEventListener('change',
                                function() {
                                    var additionalInputs = document.getElementById('additionalInputs' + id);
                                    var brokerskaKucaUplata = document.getElementById(
                                        'brokerskaKucaUplata' + id);

                                    if (this.checked) {
                                        additionalInputs.style.display = 'none';
                                        brokerskaKucaUplata.style.display = 'block';
                                    } else {
                                        additionalInputs.style.display = 'block';
                                        brokerskaKucaUplata.style.display = 'none';
                                    }
                                });
                        });
                        </script>
                </td>
                <td><?php echo $lastDateFormatted; ?></td>
                <td style="max-width: 200px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                    <?php echo $row['ime_prezime']; ?></td>
                <td><?php echo $row['premija_bez_poreza']; ?></td>
                <td><?php echo ucfirst(strtolower($row['nacin_placanja'])); ?></td>
                <td><?php echo number_format($row['premija_bez_poreza'] * ($row['brokerska_kuca_procenat'] / 100), 2); ?>
                </td>
                <td>
                    <?php 
                                    $dug = ($row['premija_bez_poreza'] * 0.08);
                                    if ($row['brokerska_kuca_uplata_nacin_placanja_toggle'] == 1) {
                                        $dug -= $row['brokerska_kuca_uplata'];
                                    } else {
                                        for ($i = 1; $i <= 12; $i++) {
                                            $dug -= $row["brokerska_kuca_uplata_rata{$i}"];
                                        }
                                    }
                                    echo number_format($dug, 2);
                                ?>
                </td>
                <td>
                    <div class="form-check">
                        <input type="hidden" id="hiddenId_<?php echo $row['id']; ?>"
                            value="<?php echo $row['id']; ?>" />
                        <input type="checkbox"
                            <?php echo ($row['brokerska_kuca_uplata_nacin_placanja_toggle'] == 1) ? 'checked' : ''; ?>
                            class="form-check-input" id="toggleInputs_<?php echo $row['id']; ?>"
                            name="brokerska_kuca_uplata_nacin_placanja_toggle">
                        <label class="form-check-label" for="toggleInputs_<?php echo $row['id']; ?>">
                            Plaćam odjednom
                        </label>
                    </div>
                </td>
                <td><?php echo $row['brokerska_kuca_procenat']; ?> %</td>
                </form>
            </tr>
            <?php endforeach; ?>
            <?php endforeach; ?>
            <?php else: ?>
            <tr>
                <td colspan="10">Nema podataka u tabeli.</td>
            </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<script>
function removeDiacritics(str) {
    return str.normalize("NFD").replace(/[\u0300-\u036f]/g, "");
}

document.getElementById('searchInput').addEventListener('keyup', function() {
    let filter = removeDiacritics(this.value.toLowerCase());
    let rows = document.querySelectorAll("#skadencarPlacanjeTable tbody tr");

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
    const rows = document.querySelectorAll("#skadencarPlacanjeTable tbody tr");
    const poliseMap = {};

    rows.forEach(row => {
        const polisaCell = row.children[1]; // Broj polise se nalazi u prvoj koloni
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
</script>

<?php $conn->close(); ?>