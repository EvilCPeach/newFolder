<?php
    require_once __DIR__ . '/../config/config.php';
    session_start();
    $login = $_SESSION['login'];
    $select = "SELECT  `villagers`.*, `name-status`, `name-city`, `name-post`
        FROM `villagers`
        JOIN `status` ON `status`.`id-status` = `villagers`.`status--villager`
        JOIN `ctities` ON `ctities`.`id-city` = `villagers`.`city-villager`
        JOIN `post` ON `post`.`id-post` = `villagers`.`post-villager`
        WHERE `login-villager` = '$login'";
    $query = $link -> prepare($select);
    $query -> execute();
    $result = $query -> get_result();
    $result -> fetch_assoc();
    if($_SESSION['user'] == ''){
        header('location: ../index.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="exit.php">Выход</a>
    <?php foreach ($result as $row) { ?> 
        <div class="card">
            <div class="card-content">
                <p><?php echo $row['fio-villager'] ?></p>
                <p><?php echo $row['login-villager'] ?></p>
                <p><?php echo $row['name-city'] ?></p>
                <a href="" target="_top">
                    <img src="" alt="">
                </a>
            </div>
        </div>
    <?php } ?>
</body>
</html>