<?php
    require_once __DIR__ . '/../config/config.php';
    $idVill = $_GET['id'];
    $select = " SELECT `id-villager`,`fio-villager`, `name-status`, `name-city`, `name-post`
        FROM `villagers`
        JOIN `status` ON `status`.`id-status` = `villagers`.`status--villager`
        JOIN `ctities` ON `ctities`.`id-city` = `villagers`.`city-villager`
        JOIN `post` ON `post`.`id-post` = `villagers`.`post-villager`
        WHERE `id-villager` = '$idVill' ";
    $query = $link -> prepare($select);
    $query -> execute();
    $result = $query -> get_result();
    $row = $result -> fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/updatePageStyle.css">
    <title>Document</title>
</head>
<body>
    <form action="../functions/change.php" method="GET">
        <input type="hidden" name="id" value="<?php echo $row['id-villager'] ?>">
        <input type="text" name="FIO" value="<?php echo $row['fio-villager'] ?>">
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
        <input type="submit">
    </form>
</body>
</html>