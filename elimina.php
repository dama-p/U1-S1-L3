<?php

$host = 'localhost';
$db   = 'ifoa_exercises_01';
$user = 'root';
$pass = '';

$dsn = "mysql:host=$host;dbname=$db";

$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

// comando che connette al database
$pdo = new PDO($dsn, $user, $pass, $options);

// SELECT DI TUTTE LE RIGHE
$stmt = $pdo->prepare('DELETE FROM Users WHERE id = ?');
$stmt->execute([$_GET["id"]]);

header("Location: /FSD%20IFOA/U1-S1-L3/searchbar.php"); // questa è il link alla pagina di re-indirizzamento