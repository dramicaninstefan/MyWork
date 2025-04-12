<?php
session_start();

// Proveri da li je korisnik prijavljen
$user_id = $_SESSION['user_id'] ?? null;

if (!$user_id) {
    echo json_encode([
        'status' => 'error',
        'message' => 'Niste prijavljeni!'
    ]);
    exit;
}

// Provjeri da li je forma poslata
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $comment = $_POST['comment'];  // Komentar
    $rating = $_POST['star-radio'];    // Ocena
    $proizvod_id = $_POST['proizvod_id']; // Proizvod ID

    require '../config.php';

    // Pripremi SQL upit za unos recenzije
    $sql = "INSERT INTO proizvod_recenzije (proizvod_id, user_id, recenzija, ocena) 
            VALUES (?, ?, ?, ?)";

    // Pripremi izjavu
    if ($stmt = $conn->prepare($sql)) {
        // Bind parametri
        $stmt->bind_param("iisi", $proizvod_id, $user_id, $comment, $rating);

        // Izvrši upit
        if ($stmt->execute()) {
            echo json_encode([
                'status' => 'success',
                'message' => 'Uspešno ste ostavili recenziju!'
            ]);
        } else {
            echo json_encode([
                'status' => 'error',
                'message' => 'Došlo je do greške, pokušajte ponovo!'
            ]);
        }

        // Zatvori izjavu
        $stmt->close();
    } else {
        echo json_encode([
            'status' => 'error',
            'message' => 'Greška sa bazom podataka!'
        ]);
    }

    // Zatvori konekciju
    $conn->close();
}
?>