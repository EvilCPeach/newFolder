<?php 
    require_once __DIR__ . '/../config/config.php';
    session_start();
    if($_SESSION['user'] == '' || $_SESSION['user'] == 'Житель'){
        header('Location: ../index.php');
    }
    $login = $_SESSION['login'];
    $selectCity = " SELECT `city-villager` 
        FROM `villagers` 
        WHERE `login-villager` = '$login' ";
    $queryCity = $link -> prepare($selectCity);
    $queryCity -> execute();
    $resultCity = $queryCity -> get_result();
    $rowCity = $resultCity -> fetch_assoc();
    $city = $rowCity["city-villager"];
    $selectAll = " SELECT `id-villager`,`fio-villager`, `name-status`, `name-city`, `name-post`
        FROM `villagers`
        JOIN `status` ON `status`.`id-status` = `villagers`.`status--villager`
        JOIN `ctities` ON `ctities`.`id-city` = `villagers`.`city-villager`
        JOIN `post` ON `post`.`id-post` = `villagers`.`post-villager` 
        WHERE `ctities`.`id-city` = '$city' ";
    $queryAll = $link -> prepare($selectAll);
    $queryAll -> execute();
    $resultAll = $queryAll -> get_result();
    $resultAll -> fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/mayorStlyles.css">
    <title>Document</title>
</head>
<body>
    <table>
        <tr>
            <td>ФИО жителя</td>
            <td>Статус жителя</td>
            <td>Город</td>
            <td>Должность</td>
            <td>Изменение</td>
        </tr>
        <?php foreach ($resultAll as $row) { ?>
            <tr>
                <td><?php echo $row['fio-villager'] ?></td>
                <td><?php echo $row['name-status'] ?></td>
                <td><?php echo $row['name-city'] ?></td>
                <td><?php echo $row['name-post'] ?></td>
                <td><a href="../pages/updateMayorPage.php?id=<?php echo $row['id-villager'] ?>">Изменить</a></td>
            </tr>
        <?php } ?>
    </table>
    <form action="../functions/addVillager.php" method="GET">
        <input type="text" name="FIO" placeholder="Введите ФИО">
        <input type="text" name="login" placeholder="Введите новый логин">
        <select title="status" name="status" id="status" hidden>
            <option value="3">Житель</option>
        </select>
        <select title="city" name="city" id="city">
            <option value="1">Калининград</option>
            <option value="2">Балтийск</option>
            <option value="3">Черняховск</option>
        </select>
        <select title="post" name="post" id="post">
            <option value="1" hidden>Чиновник</option>
            <option value="2" selected>Студент</option>
            <option value="3">Рабочий</option>
            <option value="4">Ученый</option>
        </select>
        <input type="submit" value="Добавить жителя">
    </form>
</body>
</html>