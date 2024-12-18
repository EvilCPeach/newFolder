<?php
    require_once __DIR__ . '/../config/config.php';
    session_start();
    if($_SESSION['user'] != 'Губернатор' || $_SESSION['user'] == ''){
        session_destroy();
        header('Location: ../index.php');
    }
    $select = "SELECT `id-villager`,`fio-villager`, `name-status`, `name-city`, `name-post`
        FROM `villagers`
        JOIN `status` ON `status`.`id-status` = `villagers`.`status--villager`
        JOIN `ctities` ON `ctities`.`id-city` = `villagers`.`city-villager`
        JOIN `post` ON `post`.`id-post` = `villagers`.`post-villager`
        WHERE `name-status` NOT IN ('Губернатор')  
        ORDER BY `status`.`name-status` DESC";
    $query = $link -> prepare($select);
    $query -> execute();
    $result = $query -> get_result();
    $result -> fetch_assoc();
        $villagersKaliningrad = " SELECT ( 
            (SELECT COUNT(`id-villager`) FROM `villagers` WHERE `city-villager` = 1 AND `post-villager` = 2) * 100 / COUNT(`villagers`.`id-villager`)
            ) AS 'COUNT' FROM `villagers` JOIN `ctities` ON `ctities`.`id-city` = `villagers`.`city-villager` WHERE `ctities`.`name-city` = 'Калининград' ";
    $villagersKaliningrad = " SELECT 
    COUNT(`id-villager`) AS 'villagersKalinin' 
        FROM `villagers` 
        WHERE `city-villager` = 1 AND `post-villager` = 2 
        UNION SELECT COUNT(`id-villager`) AS 'workersKalinin' 
        FROM `villagers` WHERE `city-villager` = 1 AND `post-villager` = 3 
        UNION SELECT COUNT(`id-villager`) AS 'scholarKalinin' 
        FROM `villagers` WHERE `city-villager` = 1 AND `post-villager` = 4";
    $queryy = $link -> prepare($villagersKaliningrad);
    $queryy -> execute();
    $resultt = $queryy -> get_result();
    $roww = $resultt -> fetch_assoc();
    // $arr = ["Студенты","Рабочие","Ученые"];
    // $i = 0;
    // foreach ($resultt as $rowww) {
    //     echo $arr[$i++] . ":" . $rowww["villagersKalinin"];
    // }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/governorStyle.css">
    <title>Document</title>
</head>
<body>
    <a href="exit.php">Выход</a>
    <table>
        <tr>
            <td>ФИО жителя</td>
            <td>Статус жителя</td>
            <td>Город жителя</td>
            <td>Должность жителя</td>
            <td>Удаление</td>
            <td>Изменение</td>
        </tr>
        <?php foreach ($result as $row) { ?>
            <tr>
                <td><?php echo $row['fio-villager'] ?></td>
                <td><?php echo $row['name-status'] ?></td>
                <td><?php echo $row['name-city'] ?></td>
                <td><?php echo $row['name-post'] ?></td>
                <td><a href="/functions/delete.php?id=<?php echo $row['id-villager'] ?>">Удалить</a></td>
                <td><a href="/pages/updatePage.php?id=<?php echo $row['id-villager'] ?>">Изменить</a></td>
            </tr>
        <?php } ?>
    </table>
    <form action="../functions/addVillager.php" method="GET">
        <input type="text" name="FIO" placeholder="Введите ФИО">
        <input type="text" name="login" placeholder="Введите новый логин">
        <select title="status" name="status" id="status">
            <option value="2">Мэр</option>
            <option value="3">Житель</option>
        </select>
        <select title="city" name="city" id="city">
            <option value="1">Калининград</option>
            <option value="2">Балтийск</option>
            <option value="3">Черняховск</option>
        </select>
        <select title="post" name="post" id="post">
            <option value="1">Чиновник</option>
            <option value="2">Студент</option>
            <option value="3">Рабочий</option>
            <option value="4">Ученый</option>
        </select>
        <input type="submit" value="Добавить жителя">
    </form>
    <form action="" method="GET">
        <p>Сортировать по:</p>
        <option value="">ФИО(возрастание)</option>
        <option value="">ФИО(убывание)</option>
        <option value=""></option>
    </form>
</body>
</html>