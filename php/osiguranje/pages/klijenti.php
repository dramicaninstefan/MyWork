<?php
// Uključite config.php za povezivanje sa bazom
include('config.php'); // Ovaj fajl mora biti u istoj fascikli ili navedite apsolutnu putanju


$sql = "SELECT * FROM klijent";
$result = $conn->query($sql);
?>

<div class="container mt-5">
    <h2 class="mb-4">Klijenti</h2>

    <!-- Search input -->
    <div class="mb-3 position-relative">
        <input type="text" id="searchInput" class="form-control ps-5" placeholder="Pretraži klijente...">
        <i class="bi bi-search position-absolute top-50 start-0 translate-middle-y ms-3"></i>
    </div>

    <button class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#addClientModal">Novi klijent</button>

    <button type="button" class="btn btn-primary  mb-3" data-bs-toggle="modal" data-bs-target="#csvKlijentiModal">
        Upload CSV <i class="bi bi-file-earmark-arrow-up"></i>
    </button>

    <form class="d-inline" action="../client/klijenti_export_excel.php" method="post" id="exportForm">
        <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal"
            data-bs-target="#confirmDownloadKlijentiModal">
            Exportuj u Excel <i class="bi bi-file-earmark-arrow-down"></i>
        </button>
    </form>

    <table class="table table-bordered" id="klijentTable">
        <thead class="table-dark">
            <tr>
                <th>Ime i Prezime</th>
                <th>Kontakt</th>
                <th>Email</th>
                <th>MB/PIB</th>
                <th>Adresa</th>
                <th>Mesto</th>
                <th>Akcije</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($result->num_rows > 0): ?>
            <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td style="max-width: 200px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                    <?php echo htmlspecialchars($row['ime_prezime']); ?></td>

                <td>
                    <?php
                $broj = $row['kontakt'];

                if ($broj != null && $broj != "") {
                    // Ako broj nije null, prikazuje se link
                    $broj_bez_plus = ltrim($broj, '+');
                    ?>
                    <a class="link-primary link-offset-2 link-offset-3-hover"
                        href="viber://chat/?number=%2B<?php echo $broj_bez_plus; ?>">
                        <?php echo htmlspecialchars($broj); ?>
                    </a>
                    <?php
                } else {
                    // Ako broj jeste null, prikazuje se N/A
                    echo "N/A";
                }
                ?>
                </td>

                <td><?php echo htmlspecialchars($row['email']) ?: 'N/A'; ?></td>
                <td><?php echo htmlspecialchars($row['jmbg']) ?: 'N/A'; ?></td>
                <td><?php echo htmlspecialchars($row['adresa']) ?: 'N/A'; ?></td>
                <td><?php echo htmlspecialchars($row['mesto']) ?: 'N/A'; ?></td>
                <td>
                    <button title="Uredi klijenta" class="btn btn-sm btn-warning"
                        onclick="openEditModal(<?php echo htmlspecialchars($row['id']); ?>, '<?php echo htmlspecialchars($row['ime_prezime']); ?>', '<?php echo htmlspecialchars($row['kontakt']); ?>', '<?php echo htmlspecialchars($row['email']); ?>', '<?php echo htmlspecialchars($row['jmbg']); ?>', '<?php echo htmlspecialchars($row['adresa']); ?>', '<?php echo htmlspecialchars($row['mesto']); ?>')">
                        <i class="bi bi-pencil-square"></i>
                    </button>
                </td>
            </tr>
            <?php } ?>
            <?php else: ?>
            <tr>
                <td colspan="7">Nema unetih klijenata</td>
            </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?php require './modal/add_client_modal.php'?>
<?php require './modal/edit_client_modal.php'?>
<?php require './modal/import_klijenti_cvs.php'?>

<!-- Modal za potvrdu preuzimanja -->
<div class="modal fade" id="confirmDownloadKlijentiModal" tabindex="-1"
    aria-labelledby="confirmDownloadModalKlijentiLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmDownloadModalKlijentiLabel">Potvrdi skidanje</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Da li ste sigurni da želite da eksportujete <strong>sve podatke</strong>?
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

<script>
// Funkcija za uklanjanje dijakritika
function removeDiacritics(str) {
    return str.normalize("NFD").replace(/[\u0300-\u036f]/g, "");
}

// Pretraga u tabeli klijenata (bez č, ć, š, ž, đ...)
document.getElementById('searchInput').addEventListener('keyup', function() {
    let filter = removeDiacritics(this.value.toLowerCase());
    let rows = document.querySelectorAll("#klijentTable tbody tr");

    rows.forEach(row => {
        let text = removeDiacritics(row.innerText.toLowerCase());
        row.style.display = text.includes(filter) ? '' : 'none';
    });
});
</script>