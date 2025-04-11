<!-- Modal za dodavanje novog klijenta-->
<div class="modal fade" id="addNewSkadencarModal" tabindex="-1" aria-labelledby="exampleModalLabel"
    data-bs-backdrop="static" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content modal-custom">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Dodaj Klijenta</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="./skadar/add_skadencar.php" method="POST" class="needs-validation" novalidate>
                    <div class="form-floating mt-2">
                        <input type="text" class="form-control" id="broj_polise" name="broj_polise"
                            placeholder="Unesite ime i prezime" autocomplete="off" required>
                        <label for="broj_polise">Broj polise</label>
                        <div class="invalid-feedback">Morate uneti broj polise.</div>
                    </div>

                    <!-- <div class="form-floating mt-2">
                        <input type="text" class="form-control" id="ime_prezime" name="ime_prezime"
                            placeholder="Unesite ime i prezime" autocomplete="off" required>
                        <label for="ime_prezime">Ime i prezime</label>
                        <div class="invalid-feedback">Morate uneti ime i prezime.</div>
                    </div> -->

                    <!-- Pretraga klijenata i Select sa filtriranjem -->
                    <div class="form-floating mt-2 position-relative">
                        <input type="text" id="searchSkadarKlijent" name="searchSkadarKlijent" class="form-control"
                            placeholder="Pretraži klijente..." autocomplete="off" required>
                        <label for="searchSkadarKlijent">Ime i prezime</label>
                        <div class="invalid-feedback">Ime i prezime je obavezno!</div>


                        <!-- Dugme X za resetovanje -->
                        <button type="button" tabindex="-1" id="resetSearch" class="btn btn-light position-absolute"
                            style="right: 10px; top: 50%; transform: translateY(-50%); display: none;">
                            <i class="bi bi-arrow-clockwise"></i>
                        </button>
                    </div>

                    <!-- Select za klijente -->
                    <div class="mb-2">
                        <select class="form-select" autocomplete="off" name="klijent_id" id="klijentSkadar" size="5"
                            style="display: none;">
                            <option value="">...</option>
                            <?php
                            include('config.php');

                            $sql = "SELECT * FROM klijent";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo '<option value="' . $row['id'] . '" data-mbpib="' . $row['jmbg'] . '">' . $row['ime_prezime'] . '</option>';
                                }
                            } else {
                                echo '<option value="">Nema klijenata</option>';
                            }
                            ?>
                        </select>
                    </div>

                    <!-- Input za MB/PIB -->
                    <div class="form-floating mb-2" id="mb_pib_container">
                        <input type="text" class="form-control" id="mb_pib" name="mb_pib" required pattern="\d{13}"
                            placeholder="MB/PIB" autocomplete="off">
                        <label for="mb_pib">MB/PIB</label>
                        <div class="invalid-feedback">MB/PIB mora imati tačno 13 cifara.</div>
                    </div>

                    <!-- JavaScript -->
                    <script>
                    // Dodajte event listener na prvi input polje
                    document.getElementById('searchSkadarKlijent').addEventListener('keydown', function(event) {
                        if (event.key === "ArrowDown") {
                            event.preventDefault();

                            const selectEl = document.getElementById('klijentSkadar');
                            const options = Array.from(selectEl.options).filter(opt => opt.style.display !==
                                'none');

                            if (options.length > 0) {
                                selectEl.style.display = "block";
                                selectEl.focus();
                                selectEl.value = options[0].value; // selektuj prvi vidljivi
                            }
                        }
                    });


                    document.addEventListener("DOMContentLoaded", function() {
                        let searchInput = document.getElementById("searchSkadarKlijent");
                        let mbPibContainer = document.getElementById("mb_pib_container");
                        let mbPibInput = document.getElementById("mb_pib");
                        let selectKlijent = document.getElementById("klijentSkadar");
                        let resetButton = document.getElementById("resetSearch");

                        let options = document.querySelectorAll("#klijentSkadar option");

                        // Stilizacija opcija u select-u
                        options.forEach((option) => {
                            option.style.backgroundColor = "#fff";

                            option.addEventListener("mouseenter", function() {
                                this.style.backgroundColor = "#e7ecef";
                            });

                            option.addEventListener("mouseleave", function() {
                                this.style.backgroundColor = "#fff";
                            });
                        });

                        // Prikaz select-a pri fokusu na pretragu
                        searchInput.addEventListener("focus", function() {
                            selectKlijent.style.display = "block";
                        });

                        // Filtriranje opcija
                        searchInput.addEventListener("keyup", function() {
                            let filter = this.value.toLowerCase();
                            let hasValue = this.value.trim() !== "";

                            options.forEach(option => {
                                let text = option.textContent.toLowerCase();
                                option.style.display = text.includes(filter) || option.value ===
                                    "" ? "" : "none";
                            });

                            // Prikaz dugmeta X ako postoji unos
                            resetButton.style.display = hasValue ? "block" : "none";
                        });

                        // Zatvaranje select-a klikom van njega
                        document.addEventListener("click", function(e) {
                            if (!selectKlijent.contains(e.target) && e.target !== searchInput) {
                                selectKlijent.style.display = "none";
                            }
                        });

                        // Postavljanje vrednosti u input polja i sakrivanje MB/PIB inputa
                        selectKlijent.addEventListener("change", function() {
                            let selectedOption = this.options[this.selectedIndex];

                            if (selectedOption.value !== "") {
                                searchInput.value = selectedOption.textContent;
                                mbPibInput.value = selectedOption.getAttribute("data-mbpib") || "";
                                mbPibContainer.style.display = "none"; // Sakriva MB/PIB input
                                mbPibInput.removeAttribute(
                                    "required"); // Uklanja required atribut sa MB/PIB inputa
                            } else {
                                searchInput.value = '';
                                mbPibContainer.style.display =
                                    "block"; // Prikazuje MB/PIB input ako ništa nije odabrano
                                mbPibInput.setAttribute("required",
                                    "required"); // Dodaje required atribut na MB/PIB input
                            }

                            resetButton.style.display = "block"; // Prikaz dugmeta X nakon izbora
                        });

                        // Reset dugme - briše unos i prikazuje MB/PIB input
                        resetButton.addEventListener("click", function() {
                            searchInput.value = "";
                            mbPibInput.value = "";
                            mbPibContainer.style.display = "block"; // Prikazuje MB/PIB input
                            selectKlijent.style.display = "none"; // Sakriva select
                            resetButton.style.display = "none"; // Sakriva X dugme
                        });

                        // Dodajemo blur event na search input
                        selectKlijent.addEventListener("blur", function() {
                            setTimeout(function() { // Koristimo setTimeout da bismo sačekali da tab navigacija završi
                                selectKlijent.style.display = "none";
                            }, 100);
                        });


                    });
                    </script>


                    <!-- <div class="form-floating mt-2">
                        <input type="text" class="form-control" id="kontakt" name="kontakt"
                            placeholder="Unesite kontakt (broj mora početi sa +381)" pattern="\+381\d{5,12}"
                            autocomplete="off">
                        <label for="kontakt">Kontakt (broj mora početi sa +381)</label>
                        <div class="invalid-feedback">Broj mora početi sa +381 i imati između 5 i 12 cifara.</div>
                    </div> -->

                    <div class="form-floating mb-2">
                        <select class="form-select mb-2" name="osig_kuca" autocomplete="off" required>
                            <option value="">Izaberi...</option>
                            <option value="DUNAV">Dunav osiguranje</option>
                            <option value="DDOR">DDOR Novi Sad</option>
                            <option value="AMS">AMS osiguranje</option>
                            <option value="GLOBOS">Globos osiguranje</option>
                            <option value="UNIQA">Uniqa osiguranje</option>
                            <option value="TRIGLAV">Triglav osiguranje</option>
                            <option value="GENARALI">Generali osiguranje</option>
                            <option value="MILENIJUM">Milenijum osiguranje</option>
                            <option value="WIENER">Wiener Stadtische</option>
                            <option value="GRAWE">Grawe osiguranje</option>
                            <option value="SAVA">Sava osiguranje</option>
                        </select>
                        <label for="osig_kuca">Osiguravajuća kuća</label>
                        <div class="invalid-feedback">Osiguravajuća kuća je obavezna!</div>
                    </div>

                    <div class="form-floating mt-2 mb-2">
                        <input type="date" class="form-control" id="skadencar_pocetak" name="skadencar_pocetak"
                            placeholder="Unesite skadencar_pocetak" autocomplete="off" required>
                        <label for="skadencar_pocetak">Skadenca početak</label>
                        <div class="invalid-feedback">Početak datuma skadencara je obavezan!</div>
                    </div>

                    <div class="form-floating mb-2">
                        <select class="form-select mb-2" name="grana_tarifa" autocomplete="off" required>
                            <option value="">Izaberi...</option>
                            <option value="CMR">CMR</option>
                            <option value="IMOVINA">Imovina</option>
                            <option value="KASKO">Kasko</option>
                            <option value="NEZGODA">Nezgoda</option>
                            <option value="ODGOVORNOST">Odgovornost</option>
                            <option value="PAKET PUTNOG">Paket putnog</option>
                            <option value="POLJOPRIVREDA">Poljoprivreda</option>
                            <option value="POMOĆ NA PUTU">Pomoć na putu</option>
                            <option value="PZO">PZO</option>
                            <option value="STAKLA">Stakla</option>
                            <option value="USEVI">Usevi</option>
                            <option value="ZDRAVSTVENO">Zdravstveno</option>
                            <option value="ŽIVOTNO">Životno</option>
                            <option value="ŽIVOTNO KREDIT">Životno kredit</option>

                        </select>
                        <label for="grana_tarifa">Grana tarife</label>
                        <div class="invalid-feedback">Grana tarife je obavezna!</div>
                    </div>

                    <div class="form-floating mt-2 mb-2">
                        <input type="number" step="0.01" min="0" class="form-control" id="premija_sa_porezom"
                            name="premija_sa_porezom" placeholder="Unesite premija_sa_porezom" autocomplete="off"
                            required>
                        <label for="premija_sa_porezom">Premija sa porezom</label>
                        <div class="invalid-feedback">Premija je obavezna!</div>
                    </div>

                    <div>
                        <div class="form-floating mb-2">
                            <select class="form-select mb-2" name="nacin_placanja" autocomplete="off" required>
                                <option value="">Izaberi...</option>
                                <option value="U CELOSTI">U celosti</option>
                                <option value="NA RATE">Na rate</option>
                            </select>
                            <label for="regOznaka">Način plaćanja</label>
                            <div class="invalid-feedback">Način plaćanja je obavezan!</div>
                        </div>
                    </div>

                    <!-- <div class="form-floating mt-2 mb-4">
                        <input type="text" class="form-control" id="brokerska_kuca" name="brokerska_kuca"
                            placeholder="Unesite brokerska_kuca" autocomplete="off">
                        <label for="brokerska_kuca">Brokerska kuća</label>
                        <div class="invalid-feedback">Morate uneti mesto.</div>
                    </div> -->



                    <!-- Pretraga brokerskih kuća -->
                    <div class="form-floating mt-2 position-relative">
                        <input type="text" id="searchBrokerska" name="searchBrokerska" class="form-control"
                            placeholder="Pretraži brokerske kuće..." autocomplete="off">
                        <label for="searchBrokerska">Brokerska kuća</label>
                        <div class="invalid-feedback">Polje je obavezno.</div>

                        <!-- Reset dugme -->
                        <button type="button" tabindex="-1" id="resetBrokerskaSearch"
                            class="btn btn-light position-absolute"
                            style="right: 10px; top: 50%; transform: translateY(-50%); display: none;">
                            <i class="bi bi-arrow-clockwise"></i>
                        </button>
                    </div>

                    <!-- Select brokerskih kuća -->
                    <div class="mb-2">
                        <select class="form-select" autocomplete="off" name="brokerska_kuca_id" id="brokerskaSelect"
                            size="5" style="display: none;">
                            <option value="">...</option>
                            <?php
                                include('config.php');

                                $sql = "SELECT * FROM brokerska_kuca";
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo '<option value="' . $row['id'] . '">' . $row['naziv'] . '</option>';
                                    }
                                } else {
                                    echo '<option value="">Nema kuća</option>';
                                }
                                ?>
                        </select>
                    </div>

                    <!-- Ovde će se prikazati radio dugmići -->
                    <div id="procentiContainer" class="mb-3"></div>

                    <!-- Input za procenat -->
                    <div class="form-floating mb-2">
                        <input type="number" class="form-control" id="procenatInput" name="procenatInput"
                            placeholder="Unesite procenat" min="0" max="100" step="1">
                        <label for="procenatInput">Unesite drugi procenat</label>
                        <div class="invalid-feedback">Procenat je obavezan i mora biti između 0 i 100.</div>
                    </div>


                    <script>
                    document.addEventListener("DOMContentLoaded", function() {
                        const searchInput = document.getElementById("searchBrokerska");
                        const selectEl = document.getElementById("brokerskaSelect");
                        const resetBtn = document.getElementById("resetBrokerskaSearch");
                        const procentiContainer = document.getElementById("procentiContainer");
                        const procenatInput = document.getElementById("procenatInput");

                        const options = document.querySelectorAll("#brokerskaSelect option");

                        options.forEach((option) => {
                            option.style.backgroundColor = "#fff";
                            option.addEventListener("mouseenter", function() {
                                this.style.backgroundColor = "#e7ecef";
                            });
                            option.addEventListener("mouseleave", function() {
                                this.style.backgroundColor = "#fff";
                            });
                        });

                        searchInput.addEventListener("focus", () => {
                            selectEl.style.display = "block";
                        });

                        searchInput.addEventListener("keyup", function() {
                            const filter = this.value.toLowerCase();
                            const hasValue = this.value.trim() !== "";

                            options.forEach(option => {
                                const text = option.textContent.toLowerCase();
                                option.style.display = text.includes(filter) || option.value ===
                                    "" ? "" : "none";
                            });

                            resetBtn.style.display = hasValue ? "block" : "none";
                        });

                        document.addEventListener("click", function(e) {
                            if (!selectEl.contains(e.target) && e.target !== searchInput) {
                                selectEl.style.display = "none";
                            }
                        });

                        selectEl.addEventListener("change", function() {
                            const selectedOption = this.options[this.selectedIndex];
                            if (selectedOption.value !== "") {
                                searchInput.value = selectedOption.textContent;
                                fetchProcenti(selectedOption.value);
                            } else {
                                searchInput.value = '';
                                procentiContainer.innerHTML = '';
                            }
                            resetBtn.style.display = "block";
                        });

                        resetBtn.addEventListener("click", function() {
                            searchInput.value = "";
                            selectEl.style.display = "none";
                            resetBtn.style.display = "none";
                            procentiContainer.innerHTML = '';
                            removeSelectedRadio();
                        });

                        selectEl.addEventListener("blur", function() {
                            setTimeout(() => {
                                selectEl.style.display = "none";
                            }, 100);
                        });

                        function fetchProcenti(brokerskaId) {
                            // AJAX poziv za dohvatanje procenata
                            fetch(`../skadar/get_procenti_brokerska_kuca.php?brokerska_kuca_id=${brokerskaId}`)
                                .then(res => res.json())
                                .then(data => {
                                    if (data.length > 0) {
                                        let html = '<label class="form-label">Procenat:</label><div>';
                                        data.forEach((item, index) => {
                                            html += `
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="procenat" id="procenat${index}" value="${item.id}">
                                                        <label class="form-check-label" for="procenat${index}">
                                                            ${item.procenat}%
                                                        </label>
                                                    </div>
                                                `;

                                        });
                                        html += '</div>';
                                        procentiContainer.innerHTML = html;

                                        // Dodaj event listener na radio button
                                        document.querySelectorAll("input[name='procenat']").forEach(
                                            radio => {
                                                radio.addEventListener("change", function() {
                                                    // Kada se izabere radio dugme, ukloni "required" sa svih relevantnih polja
                                                    procenatInput.removeAttribute("required");
                                                    searchInput.removeAttribute("required");
                                                });
                                            });
                                    } else {
                                        procentiContainer.innerHTML = "<p>Nema definisanih procenata.</p>";
                                    }
                                })
                                .catch(err => {
                                    console.error("Greška prilikom dohvatanja procenata:", err);
                                    procentiContainer.innerHTML = "<p>Greška pri učitavanju.</p>";
                                });
                        }

                        searchInput.addEventListener("keydown", function(e) {
                            if (e.key === "ArrowDown") {
                                const visibleOptions = Array.from(selectEl.options).filter(opt => opt
                                    .style.display !== "none");

                                if (visibleOptions.length > 0) {
                                    e.preventDefault();
                                    selectEl.style.display = "block";
                                    selectEl.focus();
                                    selectEl.selectedIndex = [...selectEl.options].indexOf(
                                        visibleOptions[0]);
                                }
                            }
                        });

                        // Funkcija za uklanjanje selektovanog radio dugmeta
                        procenatInput.addEventListener("input", function() {
                            removeSelectedRadio();
                        });

                        // Funkcija koja uklanja selektovani radio dugmić
                        function removeSelectedRadio() {
                            const radios = document.querySelectorAll("input[name='procenat']");
                            radios.forEach(radio => {
                                radio.checked = false; // Uklanja selekciju sa svih radio dugmadi
                            });
                            procenatInput.removeAttribute("required"); // Uklanja required sa inputa
                            searchInput.removeAttribute("required"); // Uklanja required sa inputa
                        }
                    });
                    </script>



                    <button type="submit" class="btn btn-success">Dodaj</button>
                </form>
            </div>
        </div>
    </div>
</div>