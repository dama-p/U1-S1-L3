<?php
include __DIR__ . '/includes/db.php';

$id = $_POST['id'];
$name = $_POST['name'];
$surname = $_POST['surname'];
$age = $_POST['age'];

$stmt = $pdo->prepare("UPDATE Users SET Name = :name, Surname = :surname, Age = :age WHERE id = :id");
$stmt->execute([
    'id' => $id,
    'name' => $name,
    'surname' => $surname,
    'age' => $age,
]);

header("Location: /FSD%20IFOA/U1-S1-L3/searchbar.php/");