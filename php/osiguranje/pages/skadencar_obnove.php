<?php
include('config.php');

$sql = "SELECT *, DATE_FORMAT(skadencar_pocetak, '%m/%Y') AS mesec_godina 
        FROM skadencar 
        ORDER BY YEAR(skadencar_pocetak) DESC, MONTH(skadencar_pocetak) DESC";
$result = $conn->query($sql);
?>

<div class="container-fluid mt-5">
    <h2 class="mb-4">Skadencar</h2>

    <!-- Search input i dugme za reload -->
    <div class="mb-3 position-relative">
        <input type="text" id="searchInput" class="form-control ps-5" placeholder="Pretraži skadencar...">
        <i class="bi bi-search position-absolute top-50 start-0 translate-middle-y ms-3"></i>

        <!-- Dugme za reload stranice -->
        <button id="reloadButton" class="btn btn-sm btn-light position-absolute top-50 end-0 translate-middle-y me-2">
            PONIŠTI PRETRAGU <i class="bi bi-arrow-clockwise"></i>
        </button>
    </div>

    <table class="table table-bordered" id="skadencarTable">
        <thead class="table-dark">
            <tr>
                <th>Broj polise</th>
                <th>Ime i Prezime</th>
                <th>MB/PIB</th>
                <th>Osig. kuća</th>
                <th>Skadencar početak</th>
                <th>Grana Tarife</th>
                <th>Premija bez poreza</th>
                <th>Premija sa porezom</th>
                <th>Način plaćanja</th>
                <th>Brokerska kuća</th>
                <th>Skadencar istek</th>
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
                                <td colspan='11' class='text-center fw-bold'>Mesec: $trenutna_grupa</td>
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
                <td>
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
                    <?php echo htmlspecialchars($row['nacin_placanja']); ?>
                </td>
                <td>
                    <?php echo htmlspecialchars($row['brokerska_kuca']); ?>
                </td>
                <td style="<?php echo $stil; ?>">
                    <?php echo date('d/m/Y', strtotime($row['skadencar_kraj'])); ?>
                </td>
            </tr>
            <?php endwhile; ?>
            <?php else: ?>
            <tr>
                <td colspan="11">Nema unetih polisa u skadencaru</td>
            </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?php require './modal/add_new_skadencar_modal.php'; ?>

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
</script>