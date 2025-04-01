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
                <td><?php echo htmlspecialchars($row['email']) ?: 'N/A'; ?></td>
                <td><?php echo htmlspecialchars($row['jmbg']) ?: 'N/A'; ?></td>
                <td><?php echo htmlspecialchars($row['adresa']) ?: 'N/A'; ?></td>
                <td><?php echo htmlspecialchars($row['mesto']) ?: 'N/A'; ?></td>
                <td>
                    <button class="btn btn-sm btn-warning"
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

<script>
// Pretraga u tabeli klijenata
document.getElementById('searchInput').addEventListener('keyup', function() {
    let filter = this.value.toLowerCase();
    let rows = document.querySelectorAll("#klijentTable tbody tr");

    rows.forEach(row => {
        let text = row.innerText.toLowerCase();
        row.style.display = text.includes(filter) ? '' : 'none';
    });
});
</script>