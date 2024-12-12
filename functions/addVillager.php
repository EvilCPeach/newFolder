<?php
    require_once __DIR__ . '/../config/config.php';
    print_r($_GET);
    $FIO = $_GET['FIO'];
    $status = $_GET['status'];
    $city = $_GET['city'];
    $post = $_GET['post'];
    $login = $_GET['login'];
    $insert = " INSERT INTO `villagers`(`fio-villager`, `login-villager`, `status--villager`, `city-villager`, `post-villager`) 
        VALUES ('$FIO','$login','$status','$city','$post') ";
    $query = $link -> prepare($insert);
    $query -> execute();
    header('location: ../pages/governorPage.php');
?>