<?php 
    require_once __DIR__ . '/../config/config.php';
    session_start();
    $idVill = $_GET['id'];
    $FIO = $_GET['FIO'];
    $status = $_GET['status'];
    $city = $_GET['city'];
    $post = $_GET['post'];
    $update = " UPDATE `villagers` 
        JOIN `status` ON `status`.`id-status` = `villagers`.`status--villager`
        JOIN `post` ON `post`.`id-post` = `villagers`.`post-villager`
        JOIN `ctities` ON `ctities`.`id-city` = `villagers`.`city-villager`
        SET `fio-villager` = '$FIO', `status--villager` = '$status', `city-villager` = '$city', `post-villager` = '$post'
        WHERE `id-villager` = '$idVill' ";
    $query = $link -> prepare($update);
    $query -> execute();
    if($_SESSION['user'] == 'Губернатор'){
        header('Location: /../pages/governorPage.php');
    }
    else if($_SESSION['user'] == 'Мэр'){
        header('Location: /../pages/governorPage.php');
    }
?>