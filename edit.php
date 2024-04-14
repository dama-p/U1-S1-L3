<?php 
include __DIR__ . '/includes/db.php';

// SELECT DI TUTTE LE RIGHE A PARTIRE DALL'ID DELL'URL (che abbiamo passato con link dalla pagina searchbar)
$stmt = $pdo->prepare('SELECT * FROM Users WHERE id = ?');
$stmt->execute([$_GET["id"]]);

$row = $stmt->fetch();


include __DIR__ . '/includes/initial.php'; ?>

<h1 class="text-center">Edit</h1>

<form action="/FSD%20IFOA/U1-S1-L3/edit-logic.php" method="POST" novalidate>
    <input type="hidden" name="id" value="<?= $row['id'] ?>">
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" name="name" value="<?= $row['Name'] ?>">
    </div>
    <div class="mb-3">
        <label for="surname" class="form-label">Surname</label>
        <input type="text" class="form-control" id="surname" name="surname" value="<?= $row['Surname'] ?>">
    </div>
    <div class="mb-3">
        <label for="age" class="form-label">Age</label>
        <input type="number" class="form-control" id="age" name="age" value="<?= $row['Age'] ?>">
    </div>
    <div class="mb-3">
        <label for="hobbies" class="form-label">Hobbies</label>
        <input type="text" class="form-control" id="hobbies" name="hobbies" value="<?= $row['Hobbies'] ?>">
    </div>
    <button type="submit" class="btn btn-primary">Modifica</button>
</form>


<?php include __DIR__ . '/includes/end.php';