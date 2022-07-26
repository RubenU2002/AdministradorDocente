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
    <link rel="stylesheet" href="estilos/slider.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css"/>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    
    <title>Seleccionar curso</title>
</head>
<body>

<nav class="navbar bg-light fixed-top" >
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><img src="imagenes/base-de-datos.png" width="50px"></a>
    <h4>Curso de Docente</h4>
      </div>
</nav>


<div class="contenedor_loader">
        <div class="loader"></div>
    </div>

    <form action="log/logout.php" class="box">
        <button type="submit" class="btn btn-dark" >Cerrar sesión</a></button>
    </form> 
   
    <div class="m-0 vh-100 row justify-content-center align-items-center" >
    <div class="container bg-ligth text-dark col-auto p-5 text-center animated bounceInDown">
            <form method="POST" action="insetarEst.php" class="form-box">
                <p>Cursos:  <img src="imagenes/biblioteca.png" width="40px"> 
                <select name="cursos" class="form-select form-select-sm" aria-label=".form-select-sm example" required>
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
                <p>Año: <img src="imagenes/calendario.png" width="40px"> 
                <select name='year' class="form-select form-select-sm" aria-label=".form-select-sm example" required>
                    <option value=""selected disabled>Elija un año</option>
                    <option value="2019">2019</option>
                    <option value="2020">2020</option>
                    <option value="2021">2021</option>
                    <option value="2022">2022</option>
                </select></p>
                <p>Periodo: <img src="imagenes/semestre.png" width="40px"> 
                <select name='periodo' class="form-select form-select-sm" aria-label=".form-select-sm example" required>
                    <option value="">Elija el periodo</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                </select></p>
                <?php echo "<br>"."Estudiantes";?> <img src="imagenes/estudiantes.png" width="40px">
                <button type="submit" name='listado' class="btn btn-outline-success">Ver listado</button>
            </form>
        </div> 
    </div>

    <div class="slider animated bounceInDown">
      <ul>
        <li><img src="imagenes/img1.jpg" alt=""></li>
        <li><img src="imagenes/img2.jpg" alt=""></li>
        <li><img src="imagenes/img3.png" alt=""></li>
        <li><img src="imagenes/img4.jpg" alt=""></li>
      </ul>
    </div>
</div>


    <script src="javascript/script.js">
<script src="lib/bootstrap/js/bootstrap.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>
</html>