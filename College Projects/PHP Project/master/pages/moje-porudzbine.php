<?php
session_start();
include 'config.php';

// Provera da li je korisnik ulogovan
if (!isset($_SESSION['user_id'])) {
    echo "<div class='alert alert-warning'>Morate biti prijavljeni da biste videli svoje porudžbine.</div>";
    exit();
}

$user_id = $_SESSION['user_id'];

// SQL upit
$sql = "SELECT * FROM porudzbine WHERE user_id = '$user_id' ORDER BY created_at DESC";
$result = $conn->query($sql);
?>

<!-- Page Title -->
<div class="page-title dark-background" style="background-image: url(assets/img/page-title-bg.jpg);">
    <div class="container position-relative">
        <h1>Moje Porudžbine</h1>
        <nav class="breadcrumbs">
            <ol>
                <li><a href="/">Home</a></li>
                <li class="current">Moje Porudžbine</li>
            </ol>
        </nav>
    </div>
</div><!-- End Page Title -->

<div class="container mt-5">
    <h2>Moje porudžbine</h2>

    <?php if ($result->num_rows > 0): ?>
    <div class="table-responsive">
        <table class="table table-bordered table-hover mt-4">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>ID porudžbine</th>
                    <th>Ukupno</th>
                    <th>Datum</th>
                    <th>Detalji</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; while($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= $i++ ?></td>
                    <td><?= htmlspecialchars($row['unique_id']) ?></td>
                    <td><?= number_format($row['total_amount'], 2) ?> RSD</td>
                    <td><?= date('d.m.Y H:i', strtotime($row['created_at'])) ?></td>
                    <td>
                        <a href="moje-porudzbine-detalji.php?id=<?= $row['id'] ?>"
                            class="btn btn-sm btn-primary">Pogledaj</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
    <?php else: ?>
    <div class="alert alert-info mt-4">Nemate nijednu porudžbinu.</div>
    <?php endif; ?>
</div>