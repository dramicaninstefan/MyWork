<?php
    require 'config.php'; // Uključi konekciju sa bazom

    use Dotenv\Dotenv;

    require "vendor/autoload.php";  // Uključivanje Dotenv biblioteke

    // Učitaj .env fajl
    $dotenv = Dotenv::createImmutable(__DIR__);
    $dotenv->load(); 

    // Prikazivanje svih klijenata iz baze
    $sql    = "SELECT * FROM klijenti ORDER BY vreme_prijave DESC";
    $result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="sr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista Klijenata</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Dodajte ovaj link za Bootstrap ikone -->

    <style>
    .status-green {
        background-color: green;
        color: white;
        padding: 5px;
        border-radius: 5px;
        text-align: center;
    }

    .status-red {
        background-color: red;
        color: white;
        padding: 5px;
        border-radius: 5px;
        text-align: center;
    }
    </style>
</head>

<body class="container mt-5">

    <h2 class="mb-4">Lista Klijenata</h2>

    <!-- Search input -->
    <div class="mb-3 position-relative">
        <input type="text" id="searchInput" class="form-control ps-5" placeholder="Pretraži email logove...">
        <i class="bi bi-search position-absolute top-50 start-0 translate-middle-y ms-3"></i>
    </div>

    <div class="d-flex justify-content-between">
        <div class="d-flex">
            <!-- Dugme za otvaranje modala -->
            <button type="button" class="btn btn-success m-1" data-bs-toggle="modal" data-bs-target="#prijavaModal">
                <i class="bi bi-person-add" style="font-size: 15px; margin-right: 5px;"></i> Dodaj Klijenta
            </button>

            <form method="post">
                <button type="submit" name="redirect" class="btn btn-danger m-1">
                    <i class="bi bi-clock-history" style="font-size: 15px; margin-right: 5px;"></i> Istorija
                    prijava</button>
            </form>
        </div>

        <button type="button" class="btn btn-primary m-1" data-bs-toggle="modal" data-bs-target="#fileUploadModal">
            <i class="bi bi-send" style="font-size: 15px; margin-right: 5px;"></i> Prijavi štetu
        </button>
    </div>

    <?php
    if (isset($_POST['redirect'])) {
        header("Location: email_logs.php");
        exit();
    }
    ?>

    <!-- Prikazivanje liste klijenata -->
    <table class="table table-bordered mt-4" id="klijentTable">
        <thead class="table-dark">
            <tr>
                <th>Ime i Prezime</th>
                <th>Kontakt</th>
                <th>JMBG</th>
                <th>Vreme Prijave</th>
                <th>Poslato</th>
                <th>Akcije</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($result->num_rows > 0): ?>
            <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo htmlspecialchars($row['ime_prezime']) ?></td>
                <td><?php echo htmlspecialchars($row['kontakt']) ?></td>
                <td><?php echo htmlspecialchars($row['jmbg'] ?: 'N/A') ?></td>
                <td><?php echo $row['vreme_prijave'] ?></td>
                <td>
                    <div class="<?php echo $row['poslato'] ? 'status-green' : 'status-red'; ?>">
                        <?php echo $row['poslato'] ? 'DA' : 'NE'; ?>
                    </div>
                </td>
                <td>
                    <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editModal"
                        onclick="editKlijent(<?php echo htmlspecialchars(json_encode($row)); ?>)">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-pencil-square" viewBox="0 0 16 16">
                            <path
                                d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                            <path fill-rule="evenodd"
                                d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                        </svg>
                    </button>
                </td>
            </tr>
            <?php endwhile; ?>
            <?php else: ?>
            <tr>
                <td colspan="7" class="text-center">Nema unetih klijenata</td>
            </tr>
            <?php endif; ?>
        </tbody>
    </table>


    <!-- Modal za upload fajlova -->
    <div class="modal fade" id="fileUploadModal" tabindex="-1" aria-labelledby="fileUploadModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="fileUploadModalLabel">Dodavanje Fajlova</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="send_email.php" method="POST" enctype="multipart/form-data" class="needs-validation"
                        novalidate>
                        <!-- Select za Primaoca Emaila (Advokati) -->
                        <!-- <div class="mb-3">
                            <label for="email_to" class="form-label fw-bold">Izaberite advokata:</label>
                            <select class="form-select" name="email_to" id="email_to" required>
                                <option value="">Izaberite advokata</option>
                                <option value="dramicanin.stefan@gmail.com">Stefan Dramićanin
                                    (dramicanin.stefan@gmail.com)
                                </option>
                                <option value="">Advokat 2</option>
                            </select>
                            <div class="invalid-feedback">Molimo vas izaberite advokata.</div>
                        </div> -->

                        <!-- Email -->
                        <div class="mb-3">
                            <label for="email_to" class="form-label fw-bold">Email:</label>
                            <input type="text" class="form-control" name="email_to" id="email_to"
                                value="<?php echo $_ENV['MAIL_FROM']?>" disabled>
                            <div class="invalid-feedback">Polje za naslov je obavezno.</div>
                        </div>

                        <!-- Polje za izbor klijenta -->
                        <div class="mb-3">
                            <label for="client_select" class="form-label fw-bold">Izaberite klijenta:</label>
                            <select class="form-select" name="client_id" id="client_select" required>
                                <option value="">Izaberite klijenta</option>
                                <?php include 'get_clients.php'; ?>
                            </select>
                            <div class="invalid-feedback">Molimo vas izaberite klijenta.</div>
                        </div>

                        <!-- Skriveno polje za subject, koje će biti popunjeno sa imenom klijenta -->
                        <input type="hidden" name="subject" id="subject">


                        <!-- Naslov -->
                        <!-- <div class="mb-3">
                            <label for="subject" class="form-label fw-bold">Naslov (Subject):</label>
                            <input type="text" class="form-control" name="subject" id="subject" required>
                            <div class="invalid-feedback">Polje za naslov je obavezno.</div>
                        </div> -->

                        <!-- Poruka (nije obavezna) -->
                        <div class="mb-3">
                            <label for="message" class="form-label fw-bold">Poruka:</label>
                            <textarea class="form-control" name="message" id="message" rows="3" value=""></textarea>
                            <!-- <div class="invalid-feedback">Poruka je obavezna.</div> -->
                        </div>

                        <!-- GRID za Oštećenog i Štetnika -->
                        <div class="row">
                            <!-- Oštećeni -->
                            <div class="col-12">
                                <div class="d-flex justify-content-between align-items-center btn btn-secondary  my-2 py-2"
                                    data-bs-toggle="collapse" href="#osteceni" role="button" aria-expanded="false"
                                    aria-controls="osteceni">
                                    <h5 class="mb-0">Oštećeni</h5>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z" />
                                    </svg>
                                </div>
                                <div class="collapse" id="osteceni">
                                    <hr>
                                    <div class="row">
                                        <!-- Inputi Oštećenog -->
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="osteceni_licna_prednja" class="form-label fw-bold">1.
                                                    Prednja strana lične karte:</label>
                                                <input type="file" class="form-control" name="osteceni_licna_prednja"
                                                    required>
                                                <div class="invalid-feedback">Polje za prednju ličnu kartu je obavezno.
                                                </div>
                                            </div>

                                            <div class="mb-3">
                                                <label for="osteceni_licna_zadnja" class="form-label fw-bold">2. Zadnja
                                                    strana
                                                    lične karte:</label>
                                                <input type="file" class="form-control" name="osteceni_licna_zadnja"
                                                    required>
                                                <div class="invalid-feedback">Polje za zadnju ličnu kartu je obavezno.
                                                </div>
                                            </div>

                                            <div class="mb-3">
                                                <label for="osteceni_saobracajna_prednja" class="form-label fw-bold">3.
                                                    Prednja
                                                    strana saobraćajne:</label>
                                                <input type="file" class="form-control"
                                                    name="osteceni_saobracajna_prednja" required>
                                                <div class="invalid-feedback">Polje za prednju saobraćajnu je obavezno.
                                                </div>
                                            </div>

                                            <div class="mb-3">
                                                <label for="osteceni_saobracajna_zadnja" class="form-label fw-bold">4.
                                                    Zadnja
                                                    strana saobraćajne:</label>
                                                <input type="file" class="form-control"
                                                    name="osteceni_saobracajna_zadnja" required>
                                                <div class="invalid-feedback">Polje za zadnju saobraćajnu je obavezno.
                                                </div>
                                            </div>

                                            <div class="mb-3">
                                                <label for="osteceni_vozacka_prednja" class="form-label fw-bold">5.
                                                    Prednja
                                                    strana vozačke dozvole:</label>
                                                <input type="file" class="form-control" name="osteceni_vozacka_prednja"
                                                    required>
                                                <div class="invalid-feedback">Polje za prednju vozačku dozvolu je
                                                    obavezno.
                                                </div>
                                            </div>

                                            <div class="mb-3">
                                                <label for="osteceni_vozacka_zadnja" class="form-label fw-bold">6.
                                                    Zadnja
                                                    strana
                                                    vozačke dozvole:</label>
                                                <input type="file" class="form-control" name="osteceni_vozacka_zadnja"
                                                    required>
                                                <div class="invalid-feedback">Polje za zadnju vozačku dozvolu je
                                                    obavezno.
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Ostatak inputa za Oštećenog (Evropski izveštaj, Izjava, Polisa) -->
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="osteceni_izvestaj" class="form-label fw-bold">7. Evropski
                                                    izveštaj:</label>
                                                <input type="file" class="form-control" name="osteceni_izvestaj"
                                                    required>
                                                <div class="invalid-feedback">Polje za evropski izveštaj je obavezno.
                                                </div>
                                            </div>

                                            <div class="mb-3">
                                                <label for="osteceni_izjava" class="form-label fw-bold">8.
                                                    Izjava:</label>
                                                <input type="file" class="form-control" name="osteceni_izjava" required>
                                                <div class="invalid-feedback">Polje za izjavu je obavezno.</div>
                                            </div>

                                            <div class="mb-3">
                                                <label for="osteceni_polisa" class="form-label fw-bold">9. AO
                                                    Polisa:</label>
                                                <input type="file" class="form-control" name="osteceni_polisa" required>
                                                <div class="invalid-feedback">Polje za AO polisu je obavezno.</div>
                                            </div>


                                            <div class="mb-3">
                                                <label for="osteceni_tekuci" class="form-label fw-bold">10. Tekuću
                                                    račun:</label>
                                                <input type="file" class="form-control" name="osteceni_tekuci" required>
                                                <div class="invalid-feedback">Polje za Tekući račun je obavezno.</div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Štetnik -->
                            <div class="col-12">
                                <div class="d-flex justify-content-between align-items-center btn btn-secondary  my-2 py-2 "
                                    data-bs-toggle="collapse" href="#stetnik" role="button" aria-expanded="false"
                                    aria-controls="stetnik">
                                    <h5 class="mb-0">Štetnik</h5>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z" />
                                    </svg>
                                </div>

                                <div class="collapse" id="stetnik">
                                    <hr>
                                    <div class="row">
                                        <!-- Inputi Štetnika -->
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="stetnik_licna_prednja" class="form-label fw-bold">1. Prednja
                                                    strana
                                                    lične karte:</label>
                                                <input type="file" class="form-control" name="stetnik_licna_prednja"
                                                    required>
                                                <div class="invalid-feedback">Polje za prednju ličnu kartu je obavezno.
                                                </div>
                                            </div>

                                            <div class="mb-3">
                                                <label for="stetnik_licna_zadnja" class="form-label fw-bold">2. Zadnja
                                                    strana
                                                    lične karte:</label>
                                                <input type="file" class="form-control" name="stetnik_licna_zadnja"
                                                    required>
                                                <div class="invalid-feedback">Polje za zadnju ličnu kartu je obavezno.
                                                </div>
                                            </div>

                                            <div class="mb-3">
                                                <label for="stetnik_saobracajna_prednja" class="form-label fw-bold">3.
                                                    Prednja
                                                    strana saobraćajne:</label>
                                                <input type="file" class="form-control"
                                                    name="stetnik_saobracajna_prednja" required>
                                                <div class="invalid-feedback">Polje za prednju saobraćajnu je obavezno.
                                                </div>
                                            </div>

                                            <div class="mb-3">
                                                <label for="stetnik_saobracajna_zadnja" class="form-label fw-bold">4.
                                                    Zadnja
                                                    strana saobraćajne:</label>
                                                <input type="file" class="form-control"
                                                    name="stetnik_saobracajna_zadnja" required>
                                                <div class="invalid-feedback">Polje za zadnju saobraćajnu je obavezno.
                                                </div>
                                            </div>

                                            <div class="mb-3">
                                                <label for="stetnik_vozacka_prednja" class="form-label fw-bold">5.
                                                    Prednja
                                                    strana vozačke dozvole:</label>
                                                <input type="file" class="form-control" name="stetnik_vozacka_prednja"
                                                    required>
                                                <div class="invalid-feedback">Polje za prednju vozačku dozvolu je
                                                    obavezno.
                                                </div>
                                            </div>

                                            <div class="mb-3">
                                                <label for="stetnik_vozacka_zadnja" class="form-label fw-bold">6. Zadnja
                                                    strana
                                                    vozačke dozvole:</label>
                                                <input type="file" class="form-control" name="stetnik_vozacka_zadnja"
                                                    required>
                                                <div class="invalid-feedback">Polje za zadnju vozačku dozvolu je
                                                    obavezno.
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Ostatak inputa za Štetnika (Izjava, Polisa) -->
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="stetnik_izjava" class="form-label fw-bold">7.
                                                    Izjava:</label>
                                                <input type="file" class="form-control" name="stetnik_izjava" required>
                                                <div class="invalid-feedback">Polje za izjavu je obavezno.</div>
                                            </div>

                                            <div class="mb-3">
                                                <label for="stetnik_polisa" class="form-label fw-bold">8. AO
                                                    Polisa:</label>
                                                <input type="file" class="form-control" name="stetnik_polisa" required>
                                                <div class="invalid-feedback">Polje za AO polisu je obavezno.</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Dodatna dokumenta -->
                            <div class="col-12">
                                <div class="d-flex justify-content-between align-items-center btn btn-secondary  my-2 py-2 "
                                    data-bs-toggle="collapse" href="#dodatna_dokumenta" role="button"
                                    aria-expanded="false" aria-controls="dodatna_dokumenta">
                                    <h5 class="mb-0">Dodatna dokumenta</h5>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z" />
                                    </svg>
                                </div>

                                <div class="collapse" id="dodatna_dokumenta">
                                    <hr>
                                    <div class="row">
                                        <!-- Ostatak inputa za Štetnika (Izjava, Polisa) -->
                                        <div class="col-6">
                                            <div class="mb-3">
                                                <label for="dodatni_dokument1" class="form-label fw-bold">1.
                                                    Dodatna dokumenta:</label>
                                                <input type="file" class="form-control" name="dodatni_dokument1">
                                                <div class="invalid-feedback">Polje za izjavu je obavezno.</div>
                                            </div>

                                            <div class="mb-3">
                                                <label for="dodatni_dokument2" class="form-label fw-bold">2.
                                                    Dodatna dokumenta:</label>
                                                <input type="file" class="form-control" name="dodatni_dokument2">
                                                <div class="invalid-feedback">Polje za izjavu je obavezno.</div>
                                            </div>

                                            <div class="mb-3">
                                                <label for="dodatni_dokument3" class="form-label fw-bold">3.
                                                    Dodatna dokumenta:</label>
                                                <input type="file" class="form-control" name="dodatni_dokument3">
                                                <div class="invalid-feedback">Polje za izjavu je obavezno.</div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="mb-3">
                                                <label for="dodatni_dokument4" class="form-label fw-bold">4.
                                                    Dodatna dokumenta:</label>
                                                <input type="file" class="form-control" name="dodatni_dokument4">
                                                <div class="invalid-feedback">Polje za izjavu je obavezno.</div>
                                            </div>

                                            <div class="mb-3">
                                                <label for="dodatni_dokument5" class="form-label fw-bold">5.
                                                    Dodatna dokumenta:</label>
                                                <input type="file" class="form-control" name="dodatni_dokument5">
                                                <div class="invalid-feedback">Polje za izjavu je obavezno.</div>
                                            </div>

                                            <div class="mb-3">
                                                <label for="dodatni_dokument6" class="form-label fw-bold">6.
                                                    Dodatna dokumenta:</label>
                                                <input type="file" class="form-control" name="dodatni_dokument6">
                                                <div class="invalid-feedback">Polje za izjavu je obavezno.</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>

                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-success btn-lg w-100">Prijavi štetu</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    </div>


    <!-- Modal za prijavu klijenta -->
    <div class="modal fade" id="prijavaModal" tabindex="-1" aria-labelledby="prijavaModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="prijavaModalLabel">Forma za prijavu klijenata</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Forma za prijavu klijenata -->
                    <form action="add_klijent.php" method="post" class="needs-validation" novalidate>
                        <div class="mb-3">
                            <label for="ime_prezime" class="form-label">Ime i Prezime:</label>
                            <input type="text" class="form-control" id="ime_prezime" name="ime_prezime" required>
                            <div class="invalid-feedback">Molimo unesite ime i prezime.</div>
                        </div>
                        <div class="mb-3">
                            <label for="kontakt" class="form-label">Kontakt (broj telefona):</label>
                            <input type="text" class="form-control" id="kontakt" name="kontakt" pattern="^\+?\d{6,15}$"
                                required>
                            <div class="invalid-feedback">Unesite ispravan broj telefona (min. 6 cifara, opcioni +).
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="jmbg" class="form-label">JMBG (opciono):</label>
                            <input type="text" class="form-control" id="jmbg" name="jmbg" pattern="^\d{13}$">
                            <div class="invalid-feedback">JMBG mora imati tačno 13 cifara.</div>
                        </div>
                        <button type="submit" class="btn btn-success">Dodaj klijenta</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal za izmenu klijenta -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Izmeni Email Log</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editForm" method="POST" action="edit_klijent.php">
                        <input type="hidden" name="id" id="editId">

                        <div class="mb-3">
                            <label for="editFirstLast">Ime i prezime</label>
                            <input type="text" name="ime_prezime" id="editFirstLast" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="editKontakt">Kontakt</label>
                            <input type="text" name="kontakt" id="editKontakt" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="editJMBG">JMBG</label>
                            <input type="text" name="jmbg" id="editJMBG" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="editSent">Isplaćeno</label>
                            <select name="poslato" id="editSent" class="form-control form-select">
                                <option value="1">Isplaćeno</option>
                                <option value="0">Nije isplaćeno</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-success">Sačuvaj</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
    // Kada korisnik izabere klijenta, postavite ime klijenta kao subject
    document.getElementById('client_select').addEventListener('change', function() {
        var clientSelect = this;
        var subjectField = document.getElementById('subject');

        // Ako je izabran klijent, postavljamo ime klijenta kao subject
        if (clientSelect.value) {
            var clientName = clientSelect.options[clientSelect.selectedIndex].text;
            subjectField.value = clientName; // Postavljamo ime klijenta u hidden input za subject
        } else {
            subjectField.value = ''; // Ako nije izabran klijent, clear-ujemo subject
        }
    });

    document.addEventListener("DOMContentLoaded", function() {
        document.querySelectorAll('input[type="file"]').forEach(input => {
            const storedFile = localStorage.getItem(input.name);

            if (storedFile) {
                const blob = new Blob([new Uint8Array(JSON.parse(storedFile).data)], {
                    type: JSON.parse(storedFile).type
                });
                const file = new File([blob], JSON.parse(storedFile).name, {
                    type: JSON.parse(storedFile).type
                });

                const dataTransfer = new DataTransfer();
                dataTransfer.items.add(file);
                input.files = dataTransfer.files;
            }

            input.addEventListener("change", function(event) {
                const file = event.target.files[0];

                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        const fileData = {
                            name: file.name,
                            type: file.type,
                            data: Array.from(new Uint8Array(e.target.result))
                        };

                        localStorage.setItem(input.name, JSON.stringify(fileData));
                    };
                    reader.readAsArrayBuffer(file);
                }
            });
        });
    });


    // Pretraga u tabeli klijenata
    document.getElementById('searchInput').addEventListener('keyup', function() {
        let filter = this.value.toLowerCase();
        let rows = document.querySelectorAll("#klijentTable tbody tr");

        rows.forEach(row => {
            let text = row.innerText.toLowerCase();
            row.style.display = text.includes(filter) ? '' : 'none';
        });
    });


    // Bootstrap validacija (JS)
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


    function editKlijent(log) {
        document.getElementById('editId').value = log.id;
        document.getElementById('editFirstLast').value = log.ime_prezime;
        document.getElementById('editKontakt').value = log.kontakt;
        document.getElementById('editJMBG').value = log.jmbg;
        document.getElementById('editSent').value = log.poslato;
    }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

</body>

</html>

<?php
    $conn->close(); // Zatvaranje konekcije sa bazom
?>