<?php
include __DIR__ . '/includes/db.php';

$id = $_POST['id'];
$name = $_POST['name'];
$surname = $_POST['surname'];
$age = $_POST['age'];
$hobbies = $_POST['hobbies'];


$stmt = $pdo->prepare("UPDATE Users SET Name = :name, Surname = :surname, Age = :age, Hobbies = :hobbies WHERE id = :id");
$stmt->execute([
    'id' => $id,
    'name' => $name,
    'surname' => $surname,
    'age' => $age,
    'hobbies' => $hobbies,
]);

header("Location: /FSD%20IFOA/U1-S1-L3/searchbar.php/");