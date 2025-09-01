<?php include("../includes/head.php"); ?>

<h1>Заявки</h1>

<?php

$task = mysqli_query($connect, "SELECT * FROM `task`");

while($row = mysqli_fetch_assoc($task)){
    if (isset($_COOKIE['login']) and $row['email'] == $_COOKIE['login']){
        echo
        "
        <div class=\"table\">
            <p>Автомобиль: " . $row['car'] . "</p>
            <p>Дата: " . $row['date'] . "</p>
            <p>Статус: " . $row['status'] . "</p>
        </div>
        ";
    }
}

?>


<?php include("../includes/footer.php"); ?>