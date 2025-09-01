<?php include("../includes/head.php"); ?>

<form action="../pages/new.php" method="get">
    <h1>Формирование заявки</h1>
    <p>Автомобиль</p>
    <select name="car" id="" required>
        <option value="bmw">bmw</option>
        <option value="tesla">tesla</option>
    </select>
    <p>Дата</p>
    <select name="date" id="" required>
    <?php

    $task = mysqli_query($connect, "SELECT * FROM `task`");
    $ishave = false;
    while($row = mysqli_fetch_assoc($task)){
        if ($row['date'] == "15.06" and ($row['status'] == "new" or $row['status'] == "accept")){
            $ishave = true;
        }
    }
    if (!$ishave){
        echo "<option value=\"15.06\">15.06</option>";
    }
    $task = mysqli_query($connect, "SELECT * FROM `task`");
    $ishave = false;
    while($row = mysqli_fetch_assoc($task)){
        if ($row['date'] == "16.06" and ($row['status'] == "new" or $row['status'] == "accept")){
            $ishave = true;
        }
    }
    if (!$ishave){
        echo "<option value=\"16.06\">16.06</option>";
    }
    $task = mysqli_query($connect, "SELECT * FROM `task`");
    $ishave = false;
    while($row = mysqli_fetch_assoc($task)){
        if ($row['date'] == "17.06" and ($row['status'] == "new" or $row['status'] == "accept")){
            $ishave = true;
        }
    }
    if (!$ishave){
        echo "<option value=\"17.06\">17.06</option>";
    }
    $task = mysqli_query($connect, "SELECT * FROM `task`");
    $ishave = false;
    while($row = mysqli_fetch_assoc($task)){
        if ($row['date'] == "18.06" and ($row['status'] == "new" or $row['status'] == "accept")){
            $ishave = true;
        }
    }
    if (!$ishave){
        echo "<option value=\"18.06\">18.06</option>";
    }
    $task = mysqli_query($connect, "SELECT * FROM `task`");
    $ishave = false;
    while($row = mysqli_fetch_assoc($task)){
        if ($row['date'] == "19.06" and ($row['status'] == "new" or $row['status'] == "accept")){
            $ishave = true;
        }
    }
    if (!$ishave){
        echo "<option value=\"19.06\">19.06</option>";
    }
    $task = mysqli_query($connect, "SELECT * FROM `task`");
    $ishave = false;
    while($row = mysqli_fetch_assoc($task)){
        if ($row['date'] == "20.06" and ($row['status'] == "new" or $row['status'] == "accept")){
            $ishave = true;
        }
    }
    if (!$ishave){
        echo "<option value=\"20.06\">20.06</option>";
    }

    ?>
        
        
    </select>
    <button type="submit">Отправить</button>
    <?php

    if ($_GET){
        $task = mysqli_query($connect, "SELECT * FROM `task`");
        while($row = mysqli_fetch_assoc($task)){
            if ($row['date'] == $_GET['date']){
                mysqli_query($connect, "DELETE FROM `task` WHERE `task`.`id` = " . $row['id'] . "");
            }
        }

        mysqli_query($connect, "INSERT INTO `task` (`car`, `date`, `status`, `email`) VALUES ('" . $_GET['car'] . "', '" . $_GET['date'] . "', '" . "new" . "', '" . $_COOKIE['login'] . "')");

        echo "Вы успешно сформировали заявку";
        header("Location: ../pages/home.php");
    }

    ?>
</form>

<?php include("../includes/footer.php"); ?>