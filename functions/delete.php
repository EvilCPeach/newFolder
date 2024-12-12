<?php 
    require_once __DIR__ . '/../config/config.php';
    $idVill = $_GET['id'];
    $delete = " DELETE 
        FROM `villagers` 
        WHERE `id-villager` = '$idVill' ";
    $query = $link -> prepare($delete);
    $query -> execute();
    header('Location: ../pages/governorPage.php');
?>