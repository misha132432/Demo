<?php include("../includes/head.php"); ?>

<form action="../pages/login.php" method="get">
    <h1>Вход</h1>
    <p>Почта</p>
    <input type="text" name="login" required>
    <p>Пароль</p>
    <input type="password" name="password" required>
    <button type="submit">Войти</button>
    <?php

    if ($_GET){
        if($_GET['login'] == "car" and $_GET['password'] == "carforme"){
            header("Location: ../pages/admin.php");
        }
        while($row = mysqli_fetch_assoc($users)){
            if ($row['email'] == $_GET['login']){
                if ($row['password'] == $_GET['password']){
                    setcookie("login", $_GET['login'], time() + (60*60));
                    echo "Добро пожаловать!";
                    header("Location: ../pages/home.php");
                    exit();
                }
            }
        }
        echo "Неверный логин или пароль";
    }

    ?>
</form>

<img src="../images/1.jpg" alt="" class="topImage">

<?php include("../includes/footer.php"); ?>