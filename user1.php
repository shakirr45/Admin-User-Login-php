<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>user</h1>
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

</body>
</html>