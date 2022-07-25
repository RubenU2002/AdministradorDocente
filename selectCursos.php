<?php 
    include_once ("conexion.php");
    session_start();
    if(!isset($_SESSION['codigo_user'])){
        header("location:index.php");
    }
    $user=$_SESSION['codigo_user'];
    $nombre_user=$_SESSION['nombre_user'];
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="lib/bootstrap/css/bootstrap.min.css">
    
    <title>Document</title>
</head>
<body>
    <h1>bienvenido <?php  echo $nombre_user ?></h1>

    <div>
    <?php
        $query="select nomb_cur from cursos where cod_doc='$user'";
        $query=pg_query($query);
        while($row=pg_fetch_object($query)){
            echo $row->nomb_cur;
        }
    ?>
    </div>

    <div>
        <form action="log/logout.php">
            <button typle="submit">cerrar sesion</a> </button>
        </form>       
    </div>
     <script src="lib/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>