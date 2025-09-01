<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Эх, прокачу!</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <?php

    $connect = mysqli_connect("localhost", "hyvvxcrm", "pCh3ru", "hyvvxcrm_m3");

    if($connect == false){
        echo "Ошибка подключения к БД";
    }

    $users = mysqli_query($connect, "SELECT * FROM `users`");

    $islogin = false;
    while($row = mysqli_fetch_assoc($users)){
        if (isset($_COOKIE['login']) and $row['email'] == $_COOKIE['login']){
            $islogin = true;
            break;
        }
    }
    ?>
    <header>
        <?php
            if ($islogin){
                echo
                "
                    <a href=\"../pages/home.php\">Заявки</a>
                    <a href=\"../pages/new.php\">Новая заявка</a>
                    <a href=\"../pages/unlogin.php\">Выход</a>
                ";
            }
            else{
                echo
                "
                    <a href=\"../pages/register.php\">Регистрация</a>
                    <a href=\"../pages/login.php\">Вход</a>
                ";
            }
            $users = mysqli_query($connect, "SELECT * FROM `users`");
        ?>

    </header>
    <img src="../images/3.jfif" class="logo" alt="">
    <main>