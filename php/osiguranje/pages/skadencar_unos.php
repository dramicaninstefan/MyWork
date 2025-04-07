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
        <h2 class="mb-4">Skadencar</h2>

        <!-- Search input i dugme za reload -->
        <div class="mb-3 position-relative">
            <input type="text" id="searchInput" class="form-control ps-5" placeholder="Pretraži skadencar...">
            <i class="bi bi-search position-absolute top-50 start-0 translate-middle-y ms-3"></i>

            <!-- Dugme za reload stranice -->
            <button id="reloadButton"
                class="btn btn-sm btn-light position-absolute top-50 end-0 translate-middle-y me-2">
                RESETUJ PRETRAGU <i class="bi bi-arrow-clockwise"></i>
            </button>
        </div>

        <button class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#addNewSkadencarModal">
            Nova polisa
        </button>

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
            if ($result->num_rows > 0):
                $trenutna_grupa = "";
                $grupa_suma = 0;

                while ($row = $result->fetch_assoc()):
                    if ($row['grupa_datum'] !== $trenutna_grupa) {
                        if ($trenutna_grupa !== "") {
                            echo "<tr class='table-light'>
                                    <td colspan='6' class='text-end fw-bold'>Ukupno za $trenutna_grupa:</td>
                                    <td class='text-center fw-bold'>".number_format($grupa_suma, 2, ',', '.')."</td>
                                    <td colspan='4'></td>
                                </tr>";
                        }

                        $trenutna_grupa = $row['grupa_datum'];
                        $grupa_suma = 0;

                        echo "<tr class='table-warning'>
                                <td colspan='11' class='text-center fw-bold'>Datum: $trenutna_grupa</td>
                            </tr>";
                    }

                    // Prikazivanje podataka iz druge tabele
                    $skadencar_sql = "SELECT * FROM skadencar WHERE DATE_FORMAT(created_at, '%Y-%m-%d') = '$trenutna_grupa'";
                    $skadencar_result = $conn->query($skadencar_sql);
                    while ($skadencar_row = $skadencar_result->fetch_assoc()):

                        $grupa_suma += floatval($skadencar_row['premija_bez_poreza']);
            ?>
                <tr>
                    <td><?php echo htmlspecialchars($skadencar_row['broj_polise']); ?></td>
                    <td><?php echo htmlspecialchars($skadencar_row['ime_prezime']); ?></td>
                    <td><?php echo htmlspecialchars($skadencar_row['mb_pib']); ?></td>
                    <td><?php echo htmlspecialchars($skadencar_row['osig_kuca']); ?></td>
                    <td><?php echo date('d/m/Y', strtotime($skadencar_row['skadencar_pocetak'])); ?></td>
                    <td><?php echo htmlspecialchars($skadencar_row['grana_tarifa']); ?></td>
                    <td class="text-center">
                        <?php echo number_format($skadencar_row['premija_bez_poreza'], 2, ',', '.'); ?></td>
                    <td class="text-center">
                        <?php echo number_format($skadencar_row['premija_sa_porezom'], 2, ',', '.'); ?></td>
                    <td><?php echo htmlspecialchars($skadencar_row['nacin_placanja']); ?></td>
                    <td><?php echo htmlspecialchars($skadencar_row['brokerska_kuca']); ?></td>
                    <td><?php echo date('d/m/Y', strtotime($skadencar_row['skadencar_kraj'])); ?></td>
                </tr>
                <?php endwhile; ?>
                <?php endwhile; ?>
                <!-- Prikaz sume za poslednju grupu -->
                <tr class='table-light'>
                    <td colspan='6' class='text-end fw-bold'>Ukupno za <?php echo $trenutna_grupa; ?>:</td>
                    <td class='text-center fw-bold'><?php echo number_format($grupa_suma, 2, ',', '.'); ?></td>
                    <td colspan='4'></td>
                </tr>
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
    </script>