<?php
// provera_vecih_fajlova.php

$maxSize = 2 * 1024 * 1024; // 2MB

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fileName = $_POST['fileName'] ?? '';
    $fileSize = $_POST['fileSize'] ?? 0;
    $inputName = $_POST['inputName'] ?? '';

    if ($fileSize > $maxSize) {
        echo json_encode([
            'allowed' => false,
            'message' => "Fajl '$fileName' je prevelik."
        ]);
        exit;
    }

    // Ovde možeš dodati još logike, npr. zabrana određenih ekstenzija

    echo json_encode([
        'allowed' => true
    ]);
}