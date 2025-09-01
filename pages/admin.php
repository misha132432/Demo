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

    if ($_GET){
        mysqli_query($connect, "UPDATE `task` SET `status` = '" . $_GET['status'] . "' WHERE `task`.`id` = " . $_GET['id'] . "");
    }

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
        <a href="../pages/register.php">Выход</a>
    </header>
    <img src="../images/3.jfif" class="logo" alt="">
    <main>

<h1>Заявки</h1>

<?php

$task = mysqli_query($connect, "SELECT * FROM `task`");

while($row = mysqli_fetch_assoc($task)){
    $users = mysqli_query($connect, "SELECT * FROM `users`");
    $name = '';
    $phone = '';
    while($row2 = mysqli_fetch_assoc($users)){
        if ($row2['email'] == $row['email']){
            $name = $row2['name'];
            $phone = $row2['phone'];
        }
    }
    if ($row['status'] == 'new'){
        echo
        "
        <div class=\"table\">
            <p>ФИО: " . $name . "</p>
            <p>Телефон: " . $phone . "</p>
            <p>Почта: " . $row['email'] . "</p>
            <p>Автомобиль: " . $row['car'] . "</p>
            <p>Дата: " . $row['date'] . "</p>
            <p>Статус: " . $row['status'] . "</p>
            <form action=\"../pages/admin.php\" method=\"get\">
                <input type=\"hidden\" name=\"id\" value=\"" . $row['id'] . "\">
                <select name=\"status\" required>
                    <option value=\"accept\">accept</option>
                    <option value=\"cancle\">cancle</option>
                </select>
                <button type=\"submit\">Обновить</button>
            </form>
        </div>
        ";
    }
    else{
        echo
        "
        <div class=\"table\">
            <p>ФИО: " . $name . "</p>
            <p>Телефон: " . $phone . "</p>
            <p>Почта: " . $row['email'] . "</p>
            <p>Автомобиль: " . $row['car'] . "</p>
            <p>Дата: " . $row['date'] . "</p>
            <p>Статус: " . $row['status'] . "</p>
        </div>
        ";
    }

}

?>

<?php include("../includes/footer.php"); ?>