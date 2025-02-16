<?php
use Dotenv\Dotenv;

require "vendor/autoload.php";  // Uključite PHPMailer

// Učitaj .env fajl
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load(); 

// Konekcija sa bazom podataka (PDO)
try {
    $pdo = new PDO("mysql:host=" . $_ENV['DB_HOST'] . ";dbname=" . $_ENV['DB_NAME'], $_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD']);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Greška sa bazom podataka: " . $e->getMessage());
}

// SQL upit za dobijanje svih email logova
$stmt = $pdo->query("SELECT * FROM email_logs");
$email_logs = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Logovi</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

    <!-- Uključivanje Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .status-green { background-color: green; color: white; padding: 5px; border-radius: 5px; text-align: center; }
        .status-red { background-color: red; color: white; padding: 5px; border-radius: 5px; text-align: center; }

        #attachmentContent {
            max-height: 600px;
            overflow-y: auto;
        }
    </style>
</head>
<body>

<div class="container my-5">
    <h2>Email Logovi</h2>

    <!-- Search input -->
    <div class="mb-3 position-relative">
        <input type="text" id="searchInput" class="form-control ps-5" placeholder="Pretraži email logove...">
        <i class="bi bi-search position-absolute top-50 start-0 translate-middle-y ms-3"></i>
    </div>

    <!-- Tabela za ispis email logova -->
    <table class="table table-bordered table-striped" id="emailTable">
        <thead class="table-dark">
            <tr>
                <th>Primalac</th>
                <th>Naslov mejla</th>
                <th>Kontakt</th>
                <th>Komentar</th>
                <th>Poslato</th>
                <th>Isplaćeno</th>
                <th>Naplaćeno</th>
                <th>Fajlovi</th>
                <th>Akcija</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($email_logs as $log): ?>
                <tr>
                    <td><?php echo htmlspecialchars($log['email_to']); ?></td>
                    <td><?php echo htmlspecialchars($log['subject']); ?></td>
                    <td><?php echo htmlspecialchars($log['number']); ?></td>
                    <td><?php echo htmlspecialchars($log['comment']); ?></td>
                    <td>
                        <div class="<?php echo $log['sent_at'] ? 'status-green' : 'status-red'; ?>">
                            <?php echo htmlspecialchars($log['sent_at']); ?>        
                        </div>
                    </td>
                    <td>
                        <div class="<?php echo $log['status'] == 1 ? 'status-green' : 'status-red'; ?>">
                            <?php echo $log['status'] == 1 ? 'JESTE' : 'NIJE'; ?>
                        </div>
                    </td>
                    <td>
                    <?php echo $log['money'] ? '<div class="status-green">' . htmlspecialchars($log['money']) . ' RSD</div>' : '<div class="status-red">0 RSD</div>'; ?>

                    </td>
                    <td>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#attachmentModal" onclick="loadAttachment(<?php echo $log['id']; ?>)">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cloud-arrow-down-fill" viewBox="0 0 16 16">
                                <path d="M8 2a5.53 5.53 0 0 0-3.594 1.342c-.766.66-1.321 1.52-1.464 2.383C1.266 6.095 0 7.555 0 9.318 0 11.366 1.708 13 3.781 13h8.906C14.502 13 16 11.57 16 9.773c0-1.636-1.242-2.969-2.834-3.194C12.923 3.999 10.69 2 8 2m2.354 6.854-2 2a.5.5 0 0 1-.708 0l-2-2a.5.5 0 1 1 .708-.708L7.5 9.293V5.5a.5.5 0 0 1 1 0v3.793l1.146-1.147a.5.5 0 0 1 .708.708"/>
                            </svg>
                        </button>
                    </td>
                    <td>
                        <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editModal" onclick="editLog(<?php echo htmlspecialchars(json_encode($log)); ?>)">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                            </svg>
                        </button>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    
    <a href="index.html" class="btn btn-success">Nova prijava</a>
</div>

<!-- Modal za prikazivanje attachmenta -->
<div class="modal fade" id="attachmentModal" tabindex="-1" aria-labelledby="attachmentModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="attachmentModalLabel">Pregled fajlova</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="attachmentContent">
                <!-- Content loaded dynamically -->
            </div>
        </div>
    </div>
</div>

<!-- Modal za izmenu email loga -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Izmeni Email Log</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editForm" method="POST" action="edit_email_log.php">
                    <input type="hidden" name="id" id="editId">
                    
                    <div class="mb-3">
                        <label>Email To</label>
                        <input type="email" name="email_to" id="editEmailTo" class="form-control" readonly>
                    </div>

                    <div class="mb-3">
                        <label>Naslov</label>
                        <input type="text" name="subject" id="editSubject" class="form-control" required>
                    </div>
                    
                    <div class="mb-3">
                        <label>Kontakt</label>
                        <input type="text" name="number" id="editNumber" class="form-control" >
                    </div>
                    
                    <div class="mb-3">
                        <label>Komentar</label>
                        <textarea name="comment" id="editComment" class="form-control" rows="3" ></textarea>
                    </div>

                    <div class="mb-3">
                        <label>Isplaćeno</label>
                        <select name="status" id="editStatus" class="form-control form-select">
                            <option value="1">Isplaćeno</option>
                            <option value="0">Nije isplaćeno</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label>Naplaćeno</label>
                        <input type="number" name="money" id="editMoney" class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-success">Sačuvaj</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript za pretragu i popunjavanje modala -->
<script>
document.getElementById('searchInput').addEventListener('keyup', function() {
    let filter = this.value.toLowerCase();
    let rows = document.querySelectorAll("#emailTable tbody tr");

    rows.forEach(row => {
        let text = row.innerText.toLowerCase();
        row.style.display = text.includes(filter) ? '' : 'none';
    });
});

function loadAttachment(logId) {
    fetch('attachments.php?email_log_id=' + logId)
        .then(response => response.text())
        .then(data => {
            document.getElementById('attachmentContent').innerHTML = data;
        })
        .catch(error => {
            document.getElementById('attachmentContent').innerHTML = "Greška pri učitavanju attachmenta.";
        });
}

function editLog(log) {
    document.getElementById('editId').value = log.id;
    document.getElementById('editEmailTo').value = log.email_to;
    document.getElementById('editSubject').value = log.subject;
    document.getElementById('editNumber').value = log.number;
    document.getElementById('editComment').value = log.comment;
    document.getElementById('editStatus').value = log.status;
    document.getElementById('editMoney').value = log.money;
}
</script>

<!-- Uključivanje Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
