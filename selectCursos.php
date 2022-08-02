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
    <link rel="stylesheet" href="estilos/loader.css">
    <link rel="stylesheet" href="estilos/cursos.css">
    
    <title>Seleccionar curso</title>
</head>
<body>
<div class="contenedor_loader">
        <div class="loader"></div>
    </div>


    <form action="log/logout.php" class="box">
        <button type="submit" class="btn btn-dark" >Cerrar sesion</a></button>
    </form>   
    <div class="m-0 vh-100 row justify-content-center align-items-center" >
        <div class="col-auto">
            <form method="POST" action="insetarEst.php">
                <p>Cursos:  
                <select name="cursos"  class="form-select form-select-sm" aria-label=".form-select-sm example" required>
                    <option value="" selected disabled>Seleccionar Curso</option>
                    <?php
                    $query="select * from cursos where cod_doc='$user'";
                    $query=pg_query($query);
                    
                    while($row=pg_fetch_object($query)){
                        ?><option value="<?php echo $row->cod_cur ?>">
                        <?php echo $row->nomb_cur?>
                        </option>";
                    <?php
                    }
                    ?>
                </select></p>
                <p>Año: 
                <select name='year' class="form-select form-select-sm" aria-label=".form-select-sm example" required>
                    <option value=""selected disabled>Elija un año</option>
                    <option value="2019">2019</option>
                    <option value="2020">2020</option>
                    <option value="2021">2021</option>
                    <option value="2022">2022</option>
                </select></p>
                <p>Periodo:
                <select name='periodo' class="form-select form-select-sm" aria-label=".form-select-sm example" required>
                    <option value="">Elija el periodo</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                </select></p>
                <?php echo "<br>"."Estudiantes";?>
                <button type="submit" name='listado' class="btn btn-outline-success">Ver listado</button>
            </form>
        </div>    
    </div> 
    <script src="javascript/script.js">
<script src="lib/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>