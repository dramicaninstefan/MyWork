<?php
// Uključite config.php za povezivanje sa bazom
include('config.php'); // Ovaj fajl mora biti u istoj fascikli ili navedite apsolutnu putanju


// Dodajemo logiku za ažuriranje statusa
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_status'])) {
    $id = $_POST['id'];
    $status = $_POST['status'];

    $stmt = $conn->prepare("UPDATE tasks SET status = ? WHERE id = ?");
    $stmt->bind_param("si", $status, $id);
    $stmt->execute();
    $stmt->close();
}

// Dodajemo logiku za dodavanje novog zadatka
if ($_SERVER['REQUEST_METHOD'] == 'POST' && !isset($_POST['update_status']) && !isset($_POST['edit_task'])) {
    $title = $_POST['title'];
    $comment = $_POST['comment'];

    $stmt = $conn->prepare("INSERT INTO tasks (title, comment) VALUES (?, ?)");
    $stmt->bind_param("ss", $title, $comment);
    $stmt->execute();
    $stmt->close();
}

// Dodajemo logiku za ažuriranje zadatka
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['edit_task'])) {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $comment = $_POST['comment'];

    $stmt = $conn->prepare("UPDATE tasks SET title = ?, comment = ? WHERE id = ?");
    $stmt->bind_param("ssi", $title, $comment, $id);
    $stmt->execute();
    $stmt->close();
}

// Dohvatamo zadatke iz baze
$tasks = $conn->query("SELECT * FROM tasks");
$tasksGrouped = [
    'u izradi' => [],
    'završeno' => []
];

// Grupisanje zadataka po statusu
while ($task = $tasks->fetch_assoc()) {
    $tasksGrouped[$task['status']][] = $task;
}
?>

<div class="container mt-5">
    <h2 class="text-center mb-4">Todo List</h2>
    <form method="POST" class="mb-4 needs-validation" novalidate>
        <div class="row">
            <div class="col-md-5">
                <input type="text" class="form-control" name="title" placeholder="Naslov" required>
            </div>
            <div class="col-md-5">
                <input type="text" class="form-control" name="comment" placeholder="Komentar">
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary w-100">Dodaj</button>
            </div>
        </div>
    </form>

    <!-- Prikazivanje zadataka grupisanih po statusu -->
    <?php foreach ($tasksGrouped as $status => $tasks): ?>
    <div class="card mb-4">
        <div class="card-header">
            <h2 class="h5 mb-0">Tasks - <?php echo ucfirst($status); ?> (<?php echo count($tasks); ?>)</h2>
        </div>
        <ul class="list-group list-group-flush">
            <?php foreach ($tasks as $task): ?>
            <li class="list-group-item <?php echo $task['status'] == 'u izradi' ? 'select-yellow' : 'select-green'; ?>">
                <div class="d-flex justify-content-between align-items-center">
                    <strong><?php echo $task['title']; ?></strong>
                    <div class="d-flex align-items-center">
                        <small class="text-muted me-3">Created at: <?php echo $task['created_at']; ?></small>
                        <form method="POST" action="">
                            <input type="hidden" name="id" value="<?php echo $task['id']; ?>">
                            <select name="status" class="form-select " onchange="this.form.submit()">
                                <option value="u izradi" <?php if($task['status'] == 'u izradi') echo 'selected'; ?>>U
                                    izradi</option>
                                <option value="završeno" <?php if($task['status'] == 'završeno') echo 'selected'; ?>>
                                    Završeno</option>
                            </select>
                            <input type="hidden" name="update_status" value="1">
                        </form>
                        <button type="button" class="btn btn-light mx-3 px-4" data-bs-toggle="collapse"
                            data-bs-target="#comment-<?php echo $task['id']; ?>" aria-expanded="false"
                            aria-controls="comment-<?php echo $task['id']; ?>">
                            <i class="bi bi-arrows-fullscreen">
                            </i>
                        </button>

                        <button type="button" class="btn btn-light px-4" data-bs-toggle="modal"
                            data-bs-target="#editTaskModal" data-id="<?php echo $task['id']; ?>"
                            data-title="<?php echo $task['title']; ?>" data-comment="<?php echo $task['comment']; ?>">
                            <i class="bi bi-pencil-square"></i>
                        </button>
                    </div>
                </div>
                <div class="collapse" id="comment-<?php echo $task['id']; ?>">
                    <p class="mb-0 small mt-3 p-2 bg-light">
                        <?php echo !empty($task['comment']) ? $task['comment'] : 'Nema komentara'; ?></p>
                </div>
            </li>
            <?php endforeach; ?>
        </ul>
    </div>
    <?php endforeach; ?>


    <!-- Modal za uređivanje zadatka -->
    <div class="modal fade" id="editTaskModal" tabindex="-1" aria-labelledby="editTaskModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form method="POST">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editTaskModalLabel">Ažuriraj zadatak</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="id" id="taskId">
                        <div class="mb-3">
                            <label for="taskTitle" class="form-label">Naslov</label>
                            <input type="text" class="form-control" name="title" id="taskTitle" required>
                        </div>
                        <div class="mb-3">
                            <label for="taskComment" class="form-label">Komentar</label>
                            <textarea class="form-control" name="comment" id="taskComment" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" name="edit_task" value="1">Sačuvaj</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
    (function() {
        'use strict'
        var forms = document.querySelectorAll('.needs-validation')
        Array.prototype.slice.call(forms).forEach(function(form) {
            form.addEventListener('submit', function(event) {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }
                form.classList.add('was-validated')
            }, false)
        })
    })()
    // Javascript za otvaranje modala sa podacima zadatka
    var editTaskModal = document.getElementById('editTaskModal');
    editTaskModal.addEventListener('show.bs.modal', function(event) {
        var button = event.relatedTarget; // dugme koje je otvorilo modal
        var id = button.getAttribute('data-id'); // uzimamo id zadatka
        var title = button.getAttribute('data-title'); // uzimamo naslov zadatka
        var comment = button.getAttribute('data-comment'); // uzimamo komentar zadatka

        // Popunjavanje polja u modalu
        var taskIdInput = editTaskModal.querySelector('#taskId');
        var taskTitleInput = editTaskModal.querySelector('#taskTitle');
        var taskCommentInput = editTaskModal.querySelector('#taskComment');

        taskIdInput.value = id;
        taskTitleInput.value = title;
        taskCommentInput.value = comment;
    });
    </script>

    <?php $conn->close(); ?>