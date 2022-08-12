<?php 
    session_start();
    $nota=$_SESSION['nota'];
    $curso=$_SESSION['curso'];
    $year=$_SESSION['year'];
    $periodo=$_SESSION['periodo'];
    include_once("../conexion.php");
    $cursos=pg_fetch_object(pg_query("select * from cursos where cod_cur='$curso'"));
    $notas = pg_fetch_object(pg_query("select * from notas where cod_cur='$curso'and nota=$nota"));
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../lib/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">

    <link rel="stylesheet" href="../estilos/reporteNotas.css">
    <link rel="stylesheet" href="../estilos/loader.css">

    <title>Definitivas</title>
</head>
<body>

<div class="contenedor_loader">
        <div class="loader"></div>
    </div>


    <h2> <img src="../imagenes/informe.png" width="40px">Reporte de notas</h2>
    <h3>Curso: <?php echo $cursos->nomb_cur ?></h3>
    <div id="table-container">
    <table id="example" class="table table-striped" style="width:100%">
      <thead>
        <tr>
          <th></th>
          <?php 
            $secNotas = pg_query("select * from notas where cod_cur='$curso' and year='$year' and periodo='$periodo' order by nota");
            while($mostrarSec=pg_fetch_object($secNotas)){?>
                <th><?php echo $mostrarSec->desc_nota ?></th>
            <?php } ?>
                <th>DEFINITIVA</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th scope="row">Codigo</th>
          <?php 
            $secNotas = pg_query("select * from notas where cod_cur='$curso' and year='$year' and periodo='$periodo' order by posicion");
            while($mostrarSec=pg_fetch_object($secNotas)){?>
                <th><?php echo $mostrarSec->porcentaje ?>%</th>
            <?php } ?>
                <th>100%</th>
        </tr>
        <?php 
            $secCalificaciones= pg_query("select distinct cod_est from calificaciones where cod_cur='$curso' and year='$year' and periodo='$periodo' order by cod_est");
            while($mostrarSecCal=pg_fetch_object($secCalificaciones)){?>
                <tr>
                <td><?php echo $mostrarSecCal->cod_est ?></td>
                    <?php
                    //select * from calificaciones c, notas n where n.nota=c.nota and c.year='2019' and c.periodo='1' and c.cod_cur='c1' and cod_est='E1' order by n.posicion 
                        $secNotas = pg_query("select * from calificaciones c, notas n where n.nota=c.nota and c.cod_cur='$curso' and c.year='$year' and c.periodo='$periodo' and c.cod_est='$mostrarSecCal->cod_est' order by n.posicion");
                        while($mostrarSec=pg_fetch_object($secNotas)){?>
                            <td><?php echo $mostrarSec->valor ?></td>
                    <?php }?>
                    <?php $queryprom= pg_query("select sum(p.prom) from(select (valor*n.porcentaje/(10))/10 as prom,c.cod_est from calificaciones c, notas n where n.nota=c.nota and cod_est='$mostrarSecCal->cod_est' and c.cod_cur='$curso' and c.year='$year' and c.periodo='$periodo') p");
                    $def=pg_fetch_object($queryprom);
                    ?>
                    <td> <?php echo $def->sum ?></td>
                </tr>
            <?php }?>
      </tbody>
      <tfoot>
        <tr>
            <th></th>
        <?php 
            $secNotas1 = pg_query("select * from notas where cod_cur='$curso' and year='$year' and periodo='$periodo' order by posicion");
            while($mostrarSec1=pg_fetch_object($secNotas1)){?>
                <th><?php echo $mostrarSec1->desc_nota ?></th>
            <?php } ?>
                <th>DEFINITIVA</th>
        </tr>
      </tfoot>
    </table>
  </div>

  <form action="../selectCursos.php">
        <button type="submit" class="home"><img src="../imagenes/home.png" width="50px"></button>
    </form>

  <script src="../javascript/script.js"></script> 
  <script src="../lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
<script src="../javascript/app.js"></script>
</body>
</html>