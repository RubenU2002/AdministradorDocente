<?php 
    session_start();
    if(!isset($_SESSION['codigo_user'])){
        header("location:index.php");
    }
    $user=$_SESSION['codigo_user'];
    $nombre_user=$_SESSION['nombre_user'];
    session_destroy();
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>bienvenido <?php  echo $nombre_user ?></h1>
</body>
</html>