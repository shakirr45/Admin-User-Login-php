<?php
session_start();

if (!empty($_SESSION['login'])){
    echo $_SESSION['login'];
}else{
    header('location:login.php');
}

// echo $_SESSION['login'];
?>
<h3><a href="logout.php">logout</a></h3>

