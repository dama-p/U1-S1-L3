<?php 
include __DIR__ . '/includes/db.php';

$search = $_GET['search'] ?? '';

$page = $_GET["page"] ?? 1; // numero di pagina
$per_page = $_GET["per_page"] ?? 2; // definisco quanti elementi per pagina si avranno
$per_page = $per_page > 10 ? 2 : $per_page; // limito gli elementi per pagina
$offset = ($page-1) * $per_page;

/* print_r($_GET); */

/* $stmt = $pdo->prepare("SELECT * FROM Users WHERE Name LIKE ?"); */
/* $stmt = $pdo->prepare("SELECT * FROM Users WHERE Name LIKE ? OR Surname LIKE ?"); */
$stmt = $pdo->prepare("SELECT * FROM Users WHERE CONCAT(Name, Surname) LIKE :search LIMIT :per_page OFFSET :offset ") ;
$stmt->execute([
   "search" => "%$search%",
   "offset" => $offset,
   "per_page" => $per_page,
]);

$users = $stmt->fetchAll(); // Trasforma i risultati in un array normale

$pdo->query("SELECT COUNT(*) AS Num_of_users"); // Contiami tutti gli utenti per poter calcolare le pagine



include __DIR__ . '/includes/initial.php';
include __DIR__ . '/includes/navbar.php';


?>


    <h1 class="text-center">Benvenuto! Esplora i nostri utenti:</h1>

    <form class="row gap-3">
        <div class="col">
            <input type="text" name="search" class="form-control" placeholder="Cerca una pizza">
        </div>
        <div class="col-auto">
            <button type="submit" class="btn btn-primary mb-3">Cerca</button>
        </div>
    </form>



<!-- INIZIO FOREACH PER LE CARD  -->

    <div class="row justify-content-center"><?php
        foreach ($users as $row) { ?>

<div class="card col-3 col-lg-2 m-3">
  <img src="..." class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title"><?=  "$row[Name]" ?></h5>
    <p class="card-text"><?=  "$row[Surname] - $row[Age] " ?></p>
    <a href="/FSD%20IFOA/U1-S1-L3/dettagli.php?id=<?= $row['id'] ?>" class="btn btn-primary">Vai</a>
                <a href="/FSD%20IFOA/U1-S1-L3/elimina.php?id=<?= $row['id'] ?>" class="btn btn-danger">Elimina</a>
  </div>
</div>
            
            <?php
        } ?>
    </div>


<!--    VARIANTE CON LA LISTA
 <ul><?php
        foreach ($users as $row) { ?>

            <li class="mb-3">
                <?= "$row[id] - $row[Name] - $row[Surname] - $row[Age]" ?>
                <a href="/FSD%20IFOA/U1-S1-L3/dettagli.php?id=<?= $row['id'] ?>" class="btn btn-primary">Vai</a>
                <a href="/FSD%20IFOA/U1-S1-L3/elimina.php?id=<?= $row['id'] ?>" class="btn btn-danger">Elimina</a>
            </li>
          
            <?php
        } ?>
    </ul> -->


    <nav>
        <ul class="pagination justify-content-center">
            <li class="page-item disabled">
                <a class="page-link">Previous</a>
            </li>

            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>

            <li class="page-item">
                <a class="page-link" href="#">Next</a>
            </li>
        </ul>
    </nav>
</div><?php

include __DIR__ . '/includes/end.php';