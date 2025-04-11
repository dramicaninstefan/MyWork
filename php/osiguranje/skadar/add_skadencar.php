<?php
include('../config.php'); // Uključi konekciju na bazu

// Provera da li je forma poslata putem POST metode
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Izdvajanje podataka iz forme
    $broj_polise = $_POST['broj_polise'];
    $osig_kuca = $_POST['osig_kuca'];
    $skadencar_pocetak = $_POST['skadencar_pocetak']; // Datum početka
    $grana_tarifa = $_POST['grana_tarifa'];
    $premija_sa_porezom = $_POST['premija_sa_porezom']; // Premija sa porezom
    $nacin_placanja = $_POST['nacin_placanja'];
    $komentar = $_POST['komentar']; // Komentar (može biti null)

    // Dodavanje provere za brokersku kuću
if (isset($_POST['brokerska_kuca_id']) && isset($_POST['procenat']) && $_POST['brokerska_kuca_id'] !== '' && $_POST['procenatInput'] == '') {
    // Ako je prosleđen brokerska_kuca_id, pretraga u brokerska_kuca_procenat
    $brokerska_kuca_id = $_POST['brokerska_kuca_id'];
    $procenat_id = $_POST['procenat']; // Pretpostavljam da se procenat_id takođe prosleđuje

    // SQL upit za pretragu procenta na osnovu brokerska_kuca_id i procenat_id
    $sql_procenat = "SELECT procenat FROM brokerska_kuca_procenti WHERE brokerska_kuca_id = ? AND id = ?";
    if ($stmt_procenat = $conn->prepare($sql_procenat)) {
        $stmt_procenat->bind_param("ii", $brokerska_kuca_id, $procenat_id);
        $stmt_procenat->execute();
        $result_procenat = $stmt_procenat->get_result();

        if ($result_procenat->num_rows > 0) {
            // Ako postoji procenat, preuzimamo ga
            $row_procenat = $result_procenat->fetch_assoc();
            $brokerska_kuca_procenat = $row_procenat['procenat'];
            $brokerska_kuca = strtoupper($_POST['searchBrokerska']); // Ako je prosleđen naziv brokerske kuće
        } else {
            echo "Procenat za ovu brokersku kuću i procenat_id nije pronađen.";
            echo "brokerska_kuca_id: $brokerska_kuca_id, procenat_id: $procenat_id";

            exit();
        }

        $stmt_procenat->close();
    } else {
        echo "Greška prilikom pripreme SQL upita za brokersku_kuca_procenat.";
        exit();
    }
} else {
    // Ako brokerska_kuca_id nije prosleđen, koristi vrednosti iz searchBrokerska i procenat_input
    $brokerska_kuca = strtoupper($_POST['searchBrokerska']); // Ako je prosleđen naziv brokerske kuće
    $brokerska_kuca_procenat = $_POST['procenatInput']; // Ako je prosleđen procenat

    // Proveri da li je procenatInput setovan i nije prazan
    if (isset($_POST['procenatInput']) && $_POST['procenatInput'] !== '') {
        $procenatInput = $_POST['procenatInput'];
        $brokerska_kuca_id = $_POST['brokerska_kuca_id']; // Pretpostavljam da je brokerska_kuca_id postavljen

        // Proveri da li brokerska kuća postoji
        $sql_check_broker = "SELECT id FROM brokerska_kuca WHERE naziv = ?";
        if ($stmt_check_broker = $conn->prepare($sql_check_broker)) {
            $stmt_check_broker->bind_param("s", $brokerska_kuca); // Vežemo naziv brokerske kuće
            $stmt_check_broker->execute();
            $result_check_broker = $stmt_check_broker->get_result();

            if ($result_check_broker->num_rows > 0) {
                // Ako brokerska kuća postoji, preuzimamo njen ID
                $row_broker = $result_check_broker->fetch_assoc();
                $brokerska_kuca_id = $row_broker['id'];
            } else {
                // Ako brokerska kuća ne postoji, unosimo novu brokersku kuću
                $sql_insert_broker = "INSERT INTO brokerska_kuca (naziv) VALUES (?)";
                if ($stmt_insert_broker = $conn->prepare($sql_insert_broker)) {
                    $stmt_insert_broker->bind_param("s", $brokerska_kuca);
                    if ($stmt_insert_broker->execute()) {
                        $brokerska_kuca_id = $stmt_insert_broker->insert_id; // Dobijamo ID nove brokerske kuće
                    } else {
                        echo "Greška prilikom unosa brokerske kuće.";
                        exit();
                    }
                    $stmt_insert_broker->close();
                } else {
                    echo "Greška prilikom pripreme SQL upita za unos brokerske kuće.";
                    exit();
                }
            }

            $stmt_check_broker->close();
        } else {
            echo "Greška prilikom pripreme SQL upita za proveru brokerske kuće.";
            exit();
        }

        // Pre provere duplikata, proveri da li procenat već postoji
        $sql_check_procenat = "SELECT id FROM brokerska_kuca_procenti WHERE brokerska_kuca_id = ? AND procenat = ?";
        if ($stmt_check_procenat = $conn->prepare($sql_check_procenat)) {
            $stmt_check_procenat->bind_param("ii", $brokerska_kuca_id, $procenatInput);
            $stmt_check_procenat->execute();
            $result_check_procenat = $stmt_check_procenat->get_result();

            // if ($result_check_procenat->num_rows > 0) {
                // Ako procenat već postoji, ispiši grešku
                
                // echo "Procenat za ovu brokersku kuću već postoji.";
                // exit();
            // }

            $stmt_check_procenat->close();
        } else {
            echo "Greška prilikom pripreme SQL upita za proveru duplikata procenta.";
            exit();
        }

        // Unos procenta u tabelu brokerska_kuca_procenti
        $sql_insert_procenat = "INSERT INTO brokerska_kuca_procenti (brokerska_kuca_id, procenat) VALUES (?, ?)";
        if ($stmt_insert_procenat = $conn->prepare($sql_insert_procenat)) {
            $stmt_insert_procenat->bind_param("ii", $brokerska_kuca_id, $procenatInput);
            if ($stmt_insert_procenat->execute()) {
                echo "Procenat uspešno unet za brokersku kuću.";
            } else {
                echo "Greška prilikom unosa procenta.";
            }
            $stmt_insert_procenat->close();
        } else {
            echo "Greška prilikom pripreme SQL upita za unos procenta.";
            exit();
        }
    }
}


    if ($klijent_id !== null) {
        // SQL upit za pretragu klijenta prema klijent_id
        $sql = "SELECT * FROM klijent WHERE id = ?";
    
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("i", $klijent_id);  // 'i' jer je id integer tip
            $stmt->execute();
            $result = $stmt->get_result();
    
            if ($result->num_rows > 0) {
                // Ako postoji klijent sa tim ID-jem
                $row = $result->fetch_assoc();
                $ime_prezime = $row['ime_prezime'];
                $mb_pib = $row['jmbg'];
            } else {
                echo "Klijent sa ID: $klijent_id nije pronađen.";
            }
    
            $stmt->close();
        } else {
            echo '<script>
                sessionStorage.setItem("status", "error");
                sessionStorage.setItem("message", "Greška prilikom pripreme SQL upita!");
                window.location.href = "/skadencar_unos";
            </script>';
        }
    } else {
        // Kada klijent_id nije postavljen, proverava se pretraga po JMBG-u
        $ime_prezime = isset($_POST['searchSkadarKlijent']) ? $_POST['searchSkadarKlijent'] : null;
        $mb_pib = $_POST['mb_pib'];
    
        // Proveri da li već postoji klijent sa datim JMBG-om
        $sql_check = "SELECT * FROM klijent WHERE jmbg = ?";
    
        if ($stmt_check = $conn->prepare($sql_check)) {
            $stmt_check->bind_param("s", $mb_pib);  // 's' jer je JMBG string
            $stmt_check->execute();
            $result_check = $stmt_check->get_result();
    
            if ($result_check->num_rows > 0) {
                // Ako postoji klijent sa istim JMBG-om, ignorisati INSERT
                echo '<script>
                        sessionStorage.setItem("status", "warning");
                        sessionStorage.setItem("message", "Klijent sa unetim JMBG-om već postoji! Polisa nije uneta!");
                        window.location.href = "/skadencar_unos";
                    </script>';
                    exit();
                
            } else {
                // Ako klijent ne postoji, izvrši INSERT za novog klijenta
                $sql_insert = "INSERT INTO klijent (ime_prezime, jmbg) VALUES (?, ?)";
    
                if ($stmt_insert = $conn->prepare($sql_insert)) {
                    $stmt_insert->bind_param("ss", $ime_prezime, $mb_pib);
                    if ($stmt_insert->execute()) {
                        echo "Novi klijent je uspešno dodat!";
                    } else {
                        echo "Greška prilikom dodavanja novog klijenta.";
                        echo '<script>
                                sessionStorage.setItem("status", "error");
                                sessionStorage.setItem("message", "Došlo je do greške prilikom dodavanja novog klijenta., pokušaj ponovo ili kontaktiraj podršku!");
                                window.location.href = "/skadencar_unos";
                            </script>';
                            exit();
                    }
                    $stmt_insert->close();
                }
            }
    
            $stmt_check->close();
        } else {
            echo "Greška prilikom pripreme SQL upita za proveru JMBG.";
        }
    }

    // SQL upit za unos podataka u tabelu skadencar
    $sql = "INSERT INTO skadencar (id, broj_polise, ime_prezime, mb_pib, osig_kuca, skadencar_pocetak, grana_tarifa, premija_sa_porezom, nacin_placanja, brokerska_kuca, brokerska_kuca_procenat, komentar)
            VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    // Priprema izjave
    if ($stmt = $conn->prepare($sql)) {
        // Veza parametara sa pripremljenom izjavom
        $stmt->bind_param("ssssssdssds", $broj_polise, $ime_prezime, $mb_pib, $osig_kuca, $skadencar_pocetak, $grana_tarifa, $premija_sa_porezom, $nacin_placanja, $brokerska_kuca, $brokerska_kuca_procenat, $komentar);

        // Izvršavanje upita
        if ($stmt->execute()) {
            echo '<script>
                sessionStorage.setItem("status", "success");
                sessionStorage.setItem("message", "Uspesno dodata polisa u skadencar!");
                window.location.href = "/skadencar_unos";
            </script>';
        } else {
            // U slučaju greške
            echo '<script>
                sessionStorage.setItem("status", "error");
                sessionStorage.setItem("message", "Došlo je do greške, pokušaj ponovo!");
                window.location.href = "/skadencar_unos";
            </script>';
            exit();
        }

        // Zatvaranje pripremljene izjave
        $stmt->close();
    } else {
        // U slučaju greške u pripremi izjave
        echo '<script>
            sessionStorage.setItem("status", "error");
            sessionStorage.setItem("message", "Greška prilikom pripreme SQL upita!");
            window.location.href = "/skadencar_unos";
        </script>';
    }

    // Zatvaranje konekcije na bazu
    $conn->close();
}
?>