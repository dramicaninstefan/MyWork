<?php
require 'config.php';

$sql = "SELECT * FROM klijent";
$result = $conn->query($sql);
?>

<div class="container mt-5">
    <h2 class="mb-4">Lista Klijenata</h2>

    <!-- Search input -->
    <div class="mb-3 position-relative">
        <input type="text" id="searchInput" class="form-control ps-5" placeholder="Pretraži email logove...">
        <i class="bi bi-search position-absolute top-50 start-0 translate-middle-y ms-3"></i>
    </div>

    <button class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#addClientModal">Novi klijent</button>

    <table class="table table-bordered" id="klijentTable">
        <thead class="table-dark">
            <tr>
                <th>Ime i Prezime</th>
                <th>Kontakt</th>
                <th>JMBG</th>
                <th>Adresa</th>
                <th>Mesto</th>
                <th>Akcije</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo htmlspecialchars($row['ime_prezime']); ?></td>
                <td><?php echo htmlspecialchars($row['kontakt']); ?></td>
                <td><?php echo htmlspecialchars($row['jmbg']) ?: 'N/A'; ?></td>
                <td><?php echo htmlspecialchars($row['adresa']) ?: 'N/A'; ?></td>
                <td><?php echo htmlspecialchars($row['mesto']) ?: 'N/A'; ?></td>
                <td>
                    <button class="btn btn-warning"
                        onclick="openEditModal(<?php echo htmlspecialchars($row['id']); ?>, '<?php echo htmlspecialchars($row['ime_prezime']); ?>', '<?php echo htmlspecialchars($row['kontakt']); ?>', '<?php echo htmlspecialchars($row['jmbg']); ?>', '<?php echo htmlspecialchars($row['adresa']); ?>', '<?php echo htmlspecialchars($row['mesto']); ?>')">
                        <i class="bi bi-pencil-square"></i>
                    </button>
                </td>
            </tr>
            <?php } ?>
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

(function() {
    'use strict'
    var forms = document.querySelectorAll('.needs-validation')
    Array.prototype.slice.call(forms)
        .forEach(function(form) {
            form.addEventListener('submit', function(event) {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }
                form.classList.add('was-validated')
            }, false)
        })
})()
</script>