<?php
    require_once "./config/config.php";
    session_start();
    $select = "SELECT * FROM `villagers`";
    $query = $link -> prepare($select);
    $query -> execute();
    $result = $query -> get_result();
    $result -> fetch_assoc();
    if($_SERVER["REQUEST_METHOD"] === "POST"){
        $login = $_POST["login"];
        foreach ($result as $row) {
            $status = $row['status--villager'];
            if( $login == $row['login-villager']){
                echo 'eeee';
                if($status == 1){
                    $_SESSION['user'] = 'Губернатор';
                    header('Location: pages/governorPage.php');
                }
                else if($status == 2){
                    $_SESSION['user'] = 'Мэр';
                    header('Location: pages/mayorPage.php');
                }
                else if($status == 3){
                    $_SESSION['user'] = 'Житель';
                    header('Location: pages/villagerPage.php');
                }
                else{
                    session_destroy();
                    session_start();
                    $_SESSION['user'] = $login;
                    header('Location: /');
                }
            }
        }
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
    <form action="" method="POST">
        <h1>Добро пожаловать на сайт Калининградской области!</h1>
        <input type="text" name="login" placeholder="Введите логин">
        <input type="password" name="password" placeholder="Введите пароль">
        <input type="submit" value="Войти">
    </form>
</body>
</html>