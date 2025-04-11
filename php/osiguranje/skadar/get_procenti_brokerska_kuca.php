<?php
include('../config.php');

if (isset($_GET['brokerska_kuca_id'])) {
    $id = intval($_GET['brokerska_kuca_id']);

    $stmt = $conn->prepare("SELECT id, procenat FROM brokerska_kuca_procenti WHERE brokerska_kuca_id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    $procenti = [];
    while ($row = $result->fetch_assoc()) {
        $procenti[] = $row;
    }

    echo json_encode($procenti);
} else {
    echo json_encode([]); // ako nema ID-a
}
?>