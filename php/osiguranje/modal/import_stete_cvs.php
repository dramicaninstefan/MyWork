<!-- Modal za upload CSV fajla -->
<div class="modal fade" id="csvDamageModal" tabindex="-1" aria-labelledby="csvDamageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="csvDamageModalLabel">Upload CSV fajla</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-4 alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>NAPOMENA:</strong> Preuzmi šablon, popuni podatke, a zatim konvertuj fajl kako bi smanjio/la
                    njegovu veličinu.
                    <br>
                    Koristi sledeći alat za konverziju:
                    <a href="https://cloudconvert.com/xlsx-to-csv" target="_blank" class="alert-link">XLSX to CSV</a>
                </div>

                <form action="../damage/damage_import_csv.php" method="POST" enctype="multipart/form-data"
                    class="needs-validation" novalidate>
                    <label for="csv_file">Izaberite CSV fajl:</label>
                    <input class="form-control" type="file" name="csv_file" id="csv_file" accept=".csv" required>
                    <br>
                    <input type="submit" value="Upload CSV" class="btn btn-success">
                </form>

                <!-- <p class="mt-3">Exel šablon: <a href="../skadar/podaci_za_bazu_skadencar.xlsx" download>Preuzmi </a></p> -->
            </div>
        </div>
    </div>
</div>