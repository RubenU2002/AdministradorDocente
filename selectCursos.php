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
    <form action="log/logout.php">
        <button type="submit" class="btn btn-dark" >Cerrar sesion</a></button>
    </form>   
    <h6 class="badge bg-black text-wrap ">Bienvenido <?php  echo $nombre_user ?></h6>
    <div class="m-0 vh-100 row justify-content-center align-items-center" >
        <div class="col-auto">
        <form method="POST" action="insetarEst.php">
            <p>Cursos:  
            <select name="cursos"  class="form-select form-select-sm" aria-label=".form-select-sm example">
                <option>Seleccionar Curso</option>
                <?php
                $query="select nomb_cur from cursos where cod_doc='$user'";
                $query=pg_query($query);
                
                while($row=pg_fetch_object($query)){
                    echo "<option>";
                    echo $row->nomb_cur."<br/>";
                    echo "</option>";
                }
                ?>
            </select></p>
            <p>Año: 
            <select name='year' class="form-select form-select-sm" aria-label=".form-select-sm example">
                <option>2019</option>
                <option>2020</option>
                <option>2021</option>
                <option>2022</option>
            </select></p>
            <p>Periodo:
            <select name='periodo' class="form-select form-select-sm" aria-label=".form-select-sm example">
                <option>1</option>
                <option>2</option>
            </select></p>
            <?php echo "<br>"."Estudiantes";?>
            <button type="submit" name='listado' class="btn btn-outline-success">Ver listado</button>
        </form>
        </div>    
    </div> 
<script src="lib/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>