<?php
// Uključite config.php za povezivanje sa bazom
include('config.php');

// SQL upit za dobijanje podataka sa JOIN-om
$sql = "SELECT o.*, k.*, s.osig_kuca_stetnik, s.preporucilac as steta_preporucilac
        FROM obracun_stete o
        JOIN klijent k ON o.klijent_id = k.id
        JOIN klijenti_stete s ON o.steta_id = s.id";
$result = $conn->query($sql);

// Inicijalizacija ukupnog zbirnog iznosa
$total_sum_zbir = 0;

// Obrada podataka koji su poslati sa forme
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Uzimanje vrednosti iz POST-a
    $id = $_POST['id']; // ID za koji šaljemo promene
    $isplaceno_klijent = $_POST['isplaceno_klijent'];
    $advokatski_troskovi = $_POST['advokatski_troskovi'];
    $emin_procena = $_POST['emin_procena'];
    $uplatnica = $_POST['uplatnica'];
    $preporucilac = $_POST['preporucilac'];
    $trosak1 = $_POST['trosak1'];
    $trosak2 = $_POST['trosak2'];
    $trosak3 = $_POST['trosak3'];

    // SQL upit za ažuriranje podataka
    $update_sql = "UPDATE obracun_stete SET 
                   isplaceno_klijent = ?, 
                   advokatski_troskovi = ?, 
                   emin_procena = ?, 
                   uplatnica = ?, 
                   preporucilac = ?, 
                   trosak1 = ?, 
                   trosak2 = ?, 
                   trosak3 = ? 
                   WHERE obracun_id = ?";
                   
    $stmt = $conn->prepare($update_sql);
    $stmt->bind_param("ddddddddi", 
                      $isplaceno_klijent, 
                      $advokatski_troskovi, 
                      $emin_procena, 
                      $uplatnica, 
                      $preporucilac, 
                      $trosak1, 
                      $trosak2, 
                      $trosak3, 
                      $id);
    $stmt->execute();
}
?>

<div class="container mt-5">
    <h2 class="mb-4">Obračuni šteta</h2>

    <!-- Search input -->
    <div class="mb-3 position-relative">
        <input type="text" id="searchInput" class="form-control ps-5" placeholder="Pretraži štete...">
        <i class="bi bi-search position-absolute top-50 start-0 translate-middle-y ms-3"></i>
    </div>

    <table class='table table-bordered' id="obracunTable">
        <thead class='table-dark'>
            <tr>
                <th>Ime i prezime</th>
                <th>TOTAL</th>
                <th>Kontakt</th>
                <th>Osig. štetnika</th>
                <th style="width: 120px;">Ispl. klijentu</th>
                <th style="width: 120px;">% usluge</th>
                <th style="width: 100px;">AT</th>
                <th style="width: 100px;">Procenitelj</th>
                <th style="width: 100px;">Preporučilac</th>
                <th style="width: 100px">Taksa</th>
                <!-- <th>Trošak 1</th> -->
                <!-- <th>Trošak 2</th>
                <th>Trošak 3</th> -->
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php if ($result->num_rows > 0): ?>
            <?php while($row = $result->fetch_assoc()): ?>
            <?php
                    // Računanje zbirnog iznosa za svaki red
                    $total = $row["nas_procenat"]  + 
                             $row["advokatski_troskovi"] -
                             $row["emin_procena"] - 
                             $row["uplatnica"] - 
                             $row["preporucilac"];
                    
                    // Dodavanje u ukupni zbir
                    $total_sum_zbir += $total;
            ?>
            <form action="../damage/save_obracun.php" method="POST">
                <tr>

                    <td><?php echo $row["ime_prezime"]; ?></td>
                    <td>
                        <div
                            class="<?php echo $total > 0 ? 'status-green-white' : ($total < 0 ? 'status-red-white' : 'status-neutral-white'); ?>">
                            <?php echo number_format($total, 2); ?>
                        </div>

                    </td>
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
                    <td><?php echo $row["osig_kuca_stetnik"]; ?></td>

                    <td><input type="number" name="isplaceno_klijent" step="0.01"
                            value="<?php echo $row["isplaceno_klijent"]; ?>" class="form-control" min="0"></td>

                    <td><input type="number" name="nas_procenat" value="<?php echo $row["nas_procenat"]; ?>"
                            class="form-control" min="0" readonly></td>

                    <td><input type="number" name="advokatski_troskovi"
                            value="<?php echo $row["advokatski_troskovi"]; ?>" class="form-control" min="0"></td>
                    <td>
                        <input type="number" name="emin_procena" value="<?php echo $row["emin_procena"]; ?>"
                            class="form-control <?php echo $row["emin_procena"] == 0 ? 'status-red-white' : 'status-green-white'; ?>"
                            min="0">
                    </td>

                    <?php
                    // Provera statusa i postavljanje disabled atributa ako neka vrednost nije 1
                    $disabled = ($row['steta_preporucilac'] == NULL) ? 'disabled' : '';
                    ?>

                    <td>
                        <input type="number" name="preporucilac" value="<?php echo $row["preporucilac"]; ?>"
                            class="form-control <?php echo $row["preporucilac"] == 0 ? 'status-red-white' : 'status-green-white'; ?>"
                            min="0" <?php echo $disabled; ?>>
                    </td>

                    <td><input type="number" name="uplatnica" value="<?php echo $row["uplatnica"]; ?>"
                            class="form-control" min="0"></td>
                    <!-- <td><input type="number" name="trosak1" value="<?php echo $row["trosak1"]; ?>" class="form-control"
                            min="0"></td> -->
                    <!-- <td><input type="number" name="trosak2" value="<?php echo $row["trosak2"]; ?>" class="form-control"
                            min="0"></td>
                    <td><input type="number" name="trosak3" value="<?php echo $row["trosak3"]; ?>" class="form-control"
                            min="0"></td> -->
                    <td>
                        <input type="hidden" name="id" value="<?php echo $row["obracun_id"];?>">
                        <button type="submit" class="btn btn-primary">
                            Sačuvaj
                        </button>
                    </td>
                </tr>
            </form>
            <?php endwhile; ?>
            <?php else: ?>
            <tr>
                <td colspan="11">Nema obračuna</td>
            </tr>
            <?php endif; ?>
        </tbody>
    </table>


</div>

<script>
// Pretraga u tabeli klijenata
document.getElementById('searchInput').addEventListener('keyup', function() {
    let filter = this.value.toLowerCase();
    let rows = document.querySelectorAll("#obracunTable tbody tr");

    rows.forEach(row => {
        let text = row.innerText.toLowerCase();
        row.style.display = text.includes(filter) ? '' : 'none';
    });
});
</script>

<?php
$conn->close();
?>