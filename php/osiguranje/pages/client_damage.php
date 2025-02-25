<?php
$servername = "localhost";
$username = "root"; // tvoj MySQL username
$password = ""; // tvoj MySQL password
$dbname = "osiguranje";

// Povezivanje na bazu podataka
$conn = new mysqli($servername, $username, $password, $dbname);

// Provera konekcije
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Izvlačenje podataka
$query = "SELECT t.id, t.klijent_id, k.ime_prezime, t.status, t.poslato, t.poslato_kada 
          FROM klijenti_stete t 
          JOIN klijent k ON t.klijent_id = k.id";

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
        Dodaj novu štetu
    </button>


    <table class="table table-bordered" id="steteTable">
        <thead class="table-dark">
            <tr>
                <th>Ime i Prezime</th>
                <th>Status</th>
                <th>Poslato</th>
                <th>Poslato Kada</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php if ($result->num_rows > 0): ?>
            <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo htmlspecialchars($row['ime_prezime']); ?></td>
                <td><?php echo htmlspecialchars($row['status']); ?></td>
                <td><?php echo htmlspecialchars($row['poslato']); ?></td>
                <td><?php echo htmlspecialchars($row['poslato_kada']); ?></td>
                <td>
                    <form action="/client_damage_files" method="post">
                        <input type="hidden" name="id" value="<?php echo htmlspecialchars($row['id']); ?>">
                        <input type="hidden" name="klijent_id"
                            value="<?php echo htmlspecialchars($row['klijent_id']); ?>">
                        <button type="submit" class="btn btn-primary">Pogledaj fajlove</button>
                    </form>
                </td>
            </tr>
            <?php endwhile; ?>
            <?php else: ?>
            <tr>
                <td colspan="5">Nema podataka</td>
            </tr>
            <?php endif; ?>
        </tbody>
    </table>



    <!-- Modal -->
    <div class="modal fade" id="dodajStetuModal" tabindex="-1" aria-labelledby="dodajStetuModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="dodajStetuModalLabel">Dodaj novu štetu</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="../damage/add_client_damage.php">
                        <div class="form-group">
                            <label for="klijent_id">Odaberite klijenta:</label>
                            <select name="klijent_id" id="klijent_id" class="form-control" required>
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
                        </div>
                        <input type="hidden" name="status" value="0">
                        <input type="hidden" name="poslato" value="0">
                        <input type="hidden" name="poslato_kada" value="<?php echo date('Y-m-d H:i:s'); ?>">
                        <button type="submit" class="btn btn-primary">Dodaj štetu</button>
                    </form>
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