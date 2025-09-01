<?php
setcookie("login", $_GET['login'], time() - 1);
header("Location: ../pages/register.php");
?>