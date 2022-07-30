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
    <title>Definitivas</title>
</head>
<body>
    <h2>Registro de notas</h2>
    <h3>Curso: <?php echo $cursos->nomb_cur ?></h3>
    <div>
    <table id="example" class="table table-striped" style="width:100%">
      <thead>
        <tr>
          <th></th>
          <?php 
            $secNotas = pg_query("select * from notas where cod_cur='$curso' and year='$year' and periodo='$periodo' order by posicion");
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
            $secNotas = pg_query("select * from notas where cod_cur='$curso' and year='$year' and periodo='$periodo' order by nota");
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
                        $secNotas = pg_query("select * from calificaciones where cod_cur='$curso' and year='$year' and periodo='$periodo' and cod_est='$mostrarSecCal->cod_est' order by nota");
                        while($mostrarSec=pg_fetch_object($secNotas)){?>
                            <td><?php echo $mostrarSec->valor ?></td>
                    <?php }?>
                    <td></td>
                </tr>
            <?php }?>
      </tbody>
      <tfoot>
        <tr>
            <th></th>
        <?php 
            $secNotas = pg_query("select * from notas where cod_cur='$curso' and year='$year' and periodo='$periodo' order by nota");
            while($mostrarSec=pg_fetch_object($secNotas)){?>
                <th><?php echo $mostrarSec->desc_nota ?></th>
            <?php } ?>
                <th>DEFINITIVA</th>
        </tr>
      </tfoot>
    </table>
  </div>
  <script src="../lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
<script src="../javascript/app.js"></script>
</body>
</html>