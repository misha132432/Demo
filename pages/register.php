<?php include("../includes/head.php"); ?>

<form action="../pages/register.php" method="get">
    <h1>Регистрация</h1>
    <p>ФИО</p>
    <input type="text" name="name" required>
    <p>Телефон в формате 8-123-456-78-90</p>
    <input type="tel" name="phone" pattern="8-[0-9]{3}-[0-9]{3}-[0-9]{2}-[0-9]{2}" required>
    <p>Почта</p>
    <input type="email" name="login" required>
    <p>Пароль</p>
    <input type="password" name="password" required>
    <p>Серия и номер водительского удостоверения</p>
    <input type="text" pattern="[0-9]{10}" name="number" required>
    <button type="submit">Зарегистрироваться</button>
    <?php

    if ($_GET){
        if (strlen($_GET['name']) < 3){
            echo "Неверное фио";
            exit();
        }
        if (strlen($_GET['name']) > 256){
            echo "Фио не может быть длиннее 256 символов";
            exit();
        }
        if (strlen($_GET['login']) > 256){
            echo "Почта не может быть длиннее 256 символов";
            exit();
        }
        if (strlen($_GET['password']) < 3){
            echo "Пароль не может быть меньше 3 символов";
            exit();
        }
        if (strlen($_GET['password']) > 32){
            echo "Пароль не может быть длиннее 32 символов";
            exit();
        }
        $users = mysqli_query($connect, "SELECT * FROM `users`");
        while($row = mysqli_fetch_assoc($users)){
            if ($row['email'] == $_GET['login']){
                echo "Пользователь с такой почтой уже существует";
                exit();
            }
        }
        mysqli_query($connect, "INSERT INTO `users` (`name`, `phone`, `email`, `password`, `number`) VALUES ('" . $_GET['name'] . "', '" . $_GET['phone'] . "', '" . $_GET['login'] . "', '" . $_GET['password'] . "', '" . $_GET['number'] . "')");
        setcookie("login", $_GET['login'], time() + (60*60));
        echo "Вы успешно заригестрировались";
    }

    ?>
</form>

<img src="../images/2.jpg" alt="" class="topImage">

<?php include("../includes/footer.php"); ?>