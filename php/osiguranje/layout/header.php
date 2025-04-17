<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CZPIS WEBPORTAL</title>
    <link rel="icon" href="../assets/img/favicon.png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/main.css">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">




</head>

<!-- navbar.php -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="/">WEBPORTAL</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="/klijenti">
                        Klijenti
                    </a>
                </li>


                <li class="nav-item ">
                    <a href="#" class="nav-link" data-bs-toggle="modal" data-bs-target="#punomocModal">
                        Kreiraj punomoć
                    </a>
                    <!-- <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Punomoć
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li>
                            <a href="#" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#punomocModal">
                                Kreiraj punomoć
                            </a>
                        </li>
                    </ul> -->
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/stete">Štete</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/kalkulacija_stete">Kalkulacija štete</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Skadencar
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li>
                            <a href="/skadencar_unos" class="dropdown-item">
                                Unos
                            </a>
                        </li>
                        <li>
                            <a href="/skadencar_obnove" class="dropdown-item">
                                Obnove
                            </a>
                        </li>
                        <li>
                            <a href="/skadencar_placanja" class="dropdown-item">
                                Placanja %
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Korisni linkovi
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li>
                            <a href="https://uos.rs/lat/servisi-gradjana/" class="dropdown-item" target="_blank">
                                UOS | Provera
                            </a>
                        </li>
                        <li>
                            <a href="https://www.checkpoint.rs/user/loginpage" class="dropdown-item" target="_blank">
                                Checkpoint | Provera kompanija
                            </a>
                        </li>
                        <li>
                            <a href="https://plati.euprava.gov.rs/" class="dropdown-item" target="_blank">
                                ePlati | Izrada uplatnica
                            </a>
                        </li>
                        <li>
                            <a href="https://wetransfer.com/" class="dropdown-item" target="_blank">
                                WeTransfer
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="../auth/logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Alert za prikaz statusa -->
<div class="alert alert-success alert-dismissible fade show" id="statusAlert" role="alert" style="display: none;">
    <strong id="statusAlertTitle"></strong>
    <span id="statusAlertMessage"></span>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>

<script>
// Kada se stranica učita, sakrij loader
window.addEventListener('load', function() {
    document.getElementById('loader').style.display = 'none';
});

// omogucava otvaranje dropdown na hover
// document.querySelectorAll('.nav-item.dropdown').forEach(function(dropdown) {
//     dropdown.addEventListener('mouseenter', function() {
//         this.querySelector('.dropdown-menu').classList.add('show');
//     });

//     dropdown.addEventListener('mouseleave', function() {
//         this.querySelector('.dropdown-menu').classList.remove('show');
//     });
// });

const statusAlert = document.getElementById('statusAlert');
const statusAlertTitle = document.getElementById('statusAlertTitle');
const statusAlertMessage = document.getElementById('statusAlertMessage');

const status = sessionStorage.getItem("status");
const message = sessionStorage.getItem("message");

if (status === "success") {
    statusAlertTitle.textContent = 'Uspešno!';
    statusAlertMessage.textContent = message;
    statusAlert.classList.add('alert-success');
    statusAlert.style.display = 'block';
}
if (status === "info") {
    statusAlertTitle.textContent = 'Info!';
    statusAlertMessage.textContent = message;
    statusAlert.classList.add('alert-info');
    statusAlert.style.display = 'block';
}
if (status === "warning") {
    statusAlertTitle.textContent = 'Upozorenje!';
    statusAlertMessage.textContent = message;
    statusAlert.classList.add('alert-warning');
    statusAlert.style.display = 'block';
} else if (status === "error") {
    statusAlertTitle.textContent = 'Greška!';
    statusAlertMessage.textContent = message;
    statusAlert.classList.add('alert-danger');
    statusAlert.style.display = 'block';
}

// Sakrij alert posle 5 sekundi
setTimeout(() => {
    if (statusAlert.style.display === 'block') {
        statusAlert.style.display = 'none';
    }
    sessionStorage.removeItem("status");
    sessionStorage.removeItem("message");
}, 4000); // 5000 ms = 5 sekundi
</script>