<?php
session_start();


// Proverite da li je korisnik prijavljen
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php'); // Ako nije prijavljen, preusmerite ga na login
    exit;
}

$user_id = $_SESSION['user_id'];  // ID korisnika iz sesije

// Povezivanje sa bazom podataka (koristite vašu konekciju sa bazom)
$mysqli = new mysqli("localhost", "root", "", "interbell"); // Zamenite sa stvarnim podacima

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// SQL upit za preuzimanje podataka korisnika
$sql = "SELECT * FROM users WHERE id = ?";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param('i', $user_id);  // Vežemo parametar za ID korisnika
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Preuzimanje podataka iz baze
    $user_data = $result->fetch_assoc();
    
    // Razdvajanje imena i prezimena
    $full_name = htmlspecialchars($user_data['ime_prezime']);
    $name_parts = explode(" ", $full_name);

    // Ako postoji više od jednog dela, uzimamo prvi kao ime i drugi kao prezime
    $ime = isset($name_parts[0]) ? $name_parts[0] : '';
    $prezime = isset($name_parts[1]) ? $name_parts[1] : '';
} else {
    echo "Korisnik nije pronađen.";
    exit;
}

$stmt->close();
$mysqli->close();
?>


<main class="main">

    <!-- Page Title -->
    <div class="page-title dark-background" style="background-image: url(assets/img/page-title-bg.jpg);">
        <div class="container position-relative">
            <h1>Moj Profil</h1>
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="/">Početna</a></li>
                    <li class="current">Moj Profil</li>
                </ol>
            </nav>
        </div>
    </div><!-- End Page Title -->

    <div class="container rounded bg-white mt-5 mb-5">
        <div class="row">
            <div class="col-md-3 border-right">
                <div class="d-flex flex-column align-items-center text-center ">
                    <img class="rounded-circle mt-3" width="150px" src="../assets/img/user.png">
                    <span class="font-weight-bold"><?php echo htmlspecialchars($user_data['ime_prezime']); ?></span>
                    <span class="text-black-50"><?php echo htmlspecialchars($user_data['email']); ?></span>
                    <span> </span>
                </div>
            </div>
            <div class="col-md-9 border-right">
                <div class="p-1">
                    <form action="../core/save_profile_changes.php" method="POST" id="profileForm">
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <label class="labels">Ime</label>
                                <input type="text" class="form-control" name="ime" placeholder="Ime"
                                    value="<?php echo $ime; ?>" readonly>
                            </div>
                            <div class="col-md-6">
                                <label class="labels">Prezime</label>
                                <input type="text" class="form-control" name="prezime" value="<?php echo $prezime; ?>"
                                    placeholder="Prezime" readonly>
                            </div>
                        </div>
                        <div class="row mt-">
                            <div class="col-md-12">
                                <label class="labels">Mobilni broj</label>
                                <input type="text" class="form-control" name="mobilni_broj"
                                    placeholder="Unesite broj telefona"
                                    value="<?php echo htmlspecialchars($user_data['kontakt']); ?>" readonly>
                            </div>
                            <div class="col-md-12">
                                <label class="labels">Adresa</label>
                                <input type="text" class="form-control" name="adresa" placeholder="Unesite adresu"
                                    value="<?php echo htmlspecialchars($user_data['adresa']); ?>" readonly>
                            </div>
                            <div class="col-md-12">
                                <label class="labels">Mesto</label>
                                <input type="text" class="form-control" name="mesto" placeholder="Unesite mesto"
                                    value="<?php echo htmlspecialchars($user_data['mesto']); ?>" readonly>
                            </div>
                            <div class="col-md-12">
                                <label class="labels">Email adresa</label>
                                <input type="text" class="form-control" name="email" placeholder="Unesite email adresu"
                                    value="<?php echo htmlspecialchars($user_data['email']); ?>" readonly>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <label class="labels">Poštanski broj</label>
                                <input type="text" class="form-control" name="postanski_broj"
                                    placeholder="Unesite poštanski broj"
                                    value="<?php echo htmlspecialchars($user_data['postanski_broj']); ?>" readonly>
                            </div>
                            <div class="col-md-6">
                                <label class="labels">Država</label>
                                <input type="text" class="form-control" name="drzava" placeholder="Unesite državu"
                                    value="<?php echo htmlspecialchars($user_data['drzava']); ?>" readonly>
                            </div>
                        </div>
                        <div class="mt-5 col-12">
                            <button class="btn btn-primary profile-button" type="button" onclick="editProfile()">Uredi
                                profil</button>
                            <button class="btn btn-success profile-button" type="submit" style="display:none"
                                id="saveButton">Sačuvaj izmene</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
    function editProfile() {
        // Select all input fields
        const inputs = document.querySelectorAll('input');

        // Remove readonly attribute from each input
        inputs.forEach(input => {
            input.removeAttribute('readonly');
        });

        // Change button text to "Save Profile"
        const button = document.querySelector('.profile-button');
        button.textContent = 'Spasi profil';

        // Show the "Save Profile" button and hide the edit button
        const saveButton = document.getElementById('saveButton');
        saveButton.style.display = 'inline-block';
        button.style.display = 'none';
    }
    </script>

</main>