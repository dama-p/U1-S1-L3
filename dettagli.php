<?php
include __DIR__ . '/includes/db.php';

// SELECT DI TUTTE LE RIGHE
$stmt = $pdo->prepare('SELECT * FROM Users WHERE id = ?');
$stmt->execute([$_GET["id"]]);

$row = $stmt->fetch();

include __DIR__ . '/includes/initial.php';
include __DIR__ . '/includes/navbar.php';
?>

    <h1><?= $row['Name'] . " " .  $row['Surname'] . " " . $row['Age']  ?></h1>
    <h2><?= $row['Surname'] ?></h2>
    <p><?= $row['Age'] ?></p>
    <p><?= $row['Hobbies'] ?></p>

    <div>

    <a href="/FSD%20IFOA/U1-S1-L3/edit.php?id=<?= $row['id'] ?>" class="btn btn-warning">Edit</a>
                <a href="/FSD%20IFOA/U1-S1-L3/elimina.php?id=<?= $row['id'] ?>" class="btn btn-danger">Elimina</a>

</div>
    
    
    <?php

include __DIR__ . '/includes/end.php';