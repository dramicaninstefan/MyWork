<?php
// Uključite config.php za povezivanje sa bazom
include('config.php'); // Ovaj fajl mora biti u istoj fascikli ili navedite apsolutnu putanju


$id = isset($_POST['id']) ? $_POST['id'] : null;
$klijent_id = isset($_POST['klijent_id']) ? $_POST['klijent_id'] : null;


$query = "SELECT ime_prezime FROM klijent WHERE id = $klijent_id";
$klijent_ime_prezime = $conn->query($query);

?>



<div class="container my-5">
    <div>
        <!-- Informativna poruka -->
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Napomena:</strong> Možete uploadovati fajlove u različitim formatima (JPEG, PNG, PDF, itd.), ali
            imajte na umu da pregled (preview) neće biti dostupan za PDF i druge formate osim slika. Preporučuje se da
            uploadujete slike (JPEG, PNG) za lakšu obradu i pregled. Hvala na razumevanju!
        </div>
    </div>

    <form action="../damage/upload.php" method="post" enctype="multipart/form-data">
        <div class="sticky-top pt-5 d-flex justify-content-between" style='background-color: #fff;'>
            <?php
                if ($klijent_ime_prezime && $row = $klijent_ime_prezime->fetch_assoc()) {
                    $imePrezime = 'Klijent: ' . $row['ime_prezime'];
                } else {
                    $imePrezime = "Klijent nije pronađen.";
                }
                ?>
            <h3 class="text-center"><?php echo $imePrezime?></h3>
            <button type="submit" class="btn btn-primary mb-3">Sačuvaj</button>
        </div>
        <div class="row">

            <!-- prosledjuje steta_id -->
            <input type="hidden" name="damage_id" value="<?php echo $id?>">
            <input type="hidden" name="klijent_id" value="<?php echo $klijent_id?>">


            <!-- Prva kolona za 'osteceni' fajlove -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOsteceni">
                    <button class="btn btn-dark mb-3" style='width: 100%; text-align: left;' type="button"
                        data-bs-toggle="collapse" data-bs-target="#collapseOsteceni" aria-expanded="true"
                        aria-controls="collapseOsteceni">
                        Oštećeni fajlovi
                    </button>
                </h2>
                <div id="collapseOsteceni" class="accordion-collapse collapse show" aria-labelledby="headingOsteceni"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <div class="row">
                            <?php
                        $fileNames = [
                            "osteceni_licna_prednja", "osteceni_licna_zadnja", "osteceni_saobracajna_prednja", "osteceni_saobracajna_zadnja",
                            "osteceni_vozacka_prednja", "osteceni_vozacka_zadnja", "osteceni_izjava",
                            "osteceni_polisa", "osteceni_tekuci", "emin_procena", 
                            "stetnik_licna_prednja", "stetnik_licna_zadnja",
                            "stetnik_saobracajna_prednja", "stetnik_saobracajna_zadnja", "stetnik_vozacka_prednja", "stetnik_vozacka_zadnja",
                            "stetnik_izjava", "stetnik_polisa", "dodatni_dokument1", "dodatni_dokument2", "dodatni_dokument3", "dodatni_dokument4", "dodatni_dokument5", "dodatni_dokument6"
                        ];

                        foreach ($fileNames as $index => $fileName) {
                            // Proširujemo uslov da uključimo 'emin_procena' kao posebnu stavku
                            if (strpos($fileName, 'osteceni') === 0 || $fileName === 'emin_procena') {
                                echo '<div class="col-md-6 mb-3">'; // Dve kolone
                                echo '<label for="file' . $index . '" class="form-label">Izaberite fajl ' . $fileName . ':</label>';
                                echo '<div class="d-flex">';
                                echo '<input type="file" name="data_files[' . $fileName . ']" id="file' . $index . '" class="form-control">';
                                
                                // Proverite da li fajl postoji u bazi i dodajte dugme za prikaz
                                $checkQuery = "SELECT $fileName FROM klijenti_stete WHERE id = $id AND klijent_id = $klijent_id";
                                $result = $conn->query($checkQuery);
                                if ($result && $row = $result->fetch_assoc()) {
                                    if (!empty($row[$fileName])) {
                                        echo '<button type="button" class="btn btn-sm btn-success mx-2" onclick="viewFile(\'' . $fileName . '\', ' . $id . ')">';
                                        echo '<i class="bi bi-eye"></i></button>'; // Dodajemo ikonu oka
                                    } else {
                                        echo '<button type="button" class="btn btn-sm btn-danger mx-2">';
                                        echo '<i class="bi bi-exclamation-triangle"></i></button>'; // Dugme za nedostupni fajl
                                    }
                                } else {
                                    echo '<button type="button" class="btn btn-sm btn-danger mx-2">';
                                    echo '<i class="bi bi-exclamation-triangle"></i></button>'; // Dugme za nedostupni fajl
                                }
                                echo '</div>';
                                echo '</div>'; // Kraj kolone
                            }
                        }
                        ?>


                            <!-- Druga kolona za 'stetnik' fajlove -->
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingStetnik">
                                    <button class="btn btn-dark mb-3" style='width: 100%; text-align: left;'
                                        type="button" data-bs-toggle="collapse" data-bs-target="#collapseStetnik"
                                        aria-expanded="false" aria-controls="collapseStetnik">
                                        Štetnik fajlovi
                                    </button>
                                </h2>
                                <div id="collapseStetnik" class="accordion-collapse collapse"
                                    aria-labelledby="headingStetnik" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <div class="row">
                                            <?php
                            foreach ($fileNames as $index => $fileName) {
                                if (strpos($fileName, 'stetnik') === 0) {
                                    echo '<div class="col-md-6 mb-3">'; // Dve kolone
                                    echo '<label for="file' . $index . '" class="form-label">Izaberite fajl ' . $fileName . ':</label>';
                                    echo '<div class="d-flex">';
                                    echo '<input type="file" name="data_files[' . $fileName . ']" id="file' . $index . '" class="form-control">';
                                    
                                    // Proverite da li fajl postoji u bazi i dodajte dugme za prikaz
                                    $checkQuery = "SELECT $fileName FROM klijenti_stete WHERE id = $id AND klijent_id = $klijent_id";
                                    $result = $conn->query($checkQuery);
                                    if ($result && $row = $result->fetch_assoc()) {
                                        if (!empty($row[$fileName])) {
                                            echo '<button type="button" class="btn btn-sm btn-success mx-2" onclick="viewFile(\'' . $fileName . '\', ' . $id . ')">';
                                            echo '<i class="bi bi-eye"></i></button>'; // Dodajemo ikonu oka
                                        } else {
                                            echo '<button type="button" class="btn btn-sm btn-danger mx-2">';
                                            echo '<i class="bi bi-exclamation-triangle"></i></button>'; // Dugme za nedostupni fajl
                                        }
                                    } else {
                                        echo '<button type="button" class="btn btn-sm btn-danger mx-2">';
                                        echo '<i class="bi bi-exclamation-triangle"></i></button>'; // Dugme za nedostupni fajl
                                    }
                                    echo '</div>';
                                    echo '</div>'; // Kraj kolone
                                }
                            }
                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Treća kolona za 'dodatni_dokument' fajlove -->
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingDodatni">
                                    <button class="btn btn-dark mb-3" style='width: 100%; text-align: left;'
                                        type="button" data-bs-toggle="collapse" data-bs-target="#collapseDodatni"
                                        aria-expanded="false" aria-controls="collapseDodatni">
                                        Dodatni dokumenti
                                    </button>
                                </h2>
                                <div id="collapseDodatni" class="accordion-collapse collapse"
                                    aria-labelledby="headingDodatni" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <div class="row">
                                            <?php
                            foreach ($fileNames as $index => $fileName) {
                                if (strpos($fileName, 'dodatni_dokument') === 0) {
                                    echo '<div class="col-md-6 mb-3">'; // Dve kolone
                                    echo '<label for="file' . $index . '" class="form-label">Izaberite fajl ' . $fileName . ':</label>';
                                    echo '<div class="d-flex">';
                                    echo '<input type="file" name="data_files[' . $fileName . ']" id="file' . $index . '" class="form-control">';
                                        
                                    // Proverite da li fajl postoji u bazi i dodajte dugme za prikaz
                                    $checkQuery = "SELECT $fileName FROM klijenti_stete WHERE id = $id AND klijent_id = $klijent_id AND klijent_id = $klijent_id";
                                    $result = $conn->query($checkQuery);
                                    if ($result && $row = $result->fetch_assoc()) {
                                        if (!empty($row[$fileName])) {
                                            echo '<button type="button" class="btn btn-sm btn-success mx-2" onclick="viewFile(\'' . $fileName . '\', ' . $id . ')">';
                                            echo '<i class="bi bi-eye"></i></button>'; // Dodajemo ikonu oka
                                        } else {
                                            echo '<button type="button" class="btn btn-sm btn-danger mx-2">';
                                            echo '<i class="bi bi-exclamation-triangle"></i></button>'; // Dugme za nedostupni fajl
                                        }
                                    } else {
                                        echo '<button type="button" class="btn btn-sm btn-danger mx-2">';
                                        echo '<i class="bi bi-exclamation-triangle"></i></button>'; // Dugme za nedostupni fajl
                                    }
                                    echo '</div>';
                                    echo '</div>'; // Kraj kolone
                                }
                            }
                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
    </form>



</div>

<!-- Modal za prikaz fajlova -->
<div class="modal fade" id="fileModal" tabindex="-1" aria-labelledby="fileModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="fileModalLabel">Prikaz fajla</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <img id="fileImage" src="" class="img-fluid" alt="Fajl">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Zatvori</button>
            </div>
        </div>
    </div>
</div>

<script>
function viewFile(fileName, id, klijent_id) {
    console.log('Učitavam fajl:', fileName, ' sa ID-om:', id, ' i klijent_id:', klijent_id);
    // Ajax poziv za učitavanje slike
    fetch('../damage/view_file.php?file=' + fileName + '&id=' + id + '&klijent_id=' + klijent_id)
        .then(response => response.blob())
        .then(blob => {
            const url = URL.createObjectURL(blob);
            document.getElementById('fileImage').src = url;
            const modal = new bootstrap.Modal(document.getElementById('fileModal'));
            modal.show();
        })
        .catch(error => console.error('Greška pri učitavanju fajla:', error));
}
</script>

<?php
// Zatvorite konekciju nakon renderovanja
$conn->close();
?>