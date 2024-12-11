<?php
    require_once('config.php');
    session_start();
    if($_SESSION['user'] != 'Губернатор' || $_SESSION['user'] == ''){
        session_destroy();
        header('Location: index.php');
    }
    $select = "SELECT * FROM `villagers` WHERE `villagers`.`status--villager` NOT IN (1)";
    $query = $link -> prepare($select);
    $query -> execute();
    $result = $query -> get_result();
    $result -> fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/governorStyle.css">
    <title>Document</title>
</head>
<body>
    <table>
        <tr>
            <td>ФИО жителя</td>
            <td>Статус жителя</td>
            <td>Город жителя</td>
            <td>Должность жителя</td>
        </tr>
        <?php foreach ($result as $row) { ?>
            <tr>
                <td><?php echo $row['fio-villager'] ?></td>
                <td><?php echo $row['status--villager'] ?></td>
                <td><?php echo $row['city-villager'] ?></td>
                <td><?php echo $row['post-villager'] ?></td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>