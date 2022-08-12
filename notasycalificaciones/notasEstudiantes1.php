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

    <link rel="stylesheet" href="../estilos/notasEstu.css">
    <link rel="stylesheet" href="../estilos/loader.css">

    <title>Escribir Notas</title>
</head>
<body>

<div class="contenedor_loader">
        <div class="loader"></div>
    </div>

    <form action="insertarNotas.php">
        <button type="submit" class="volver"><img src="../imagenes/girar-a-la-izquierda.png" width="40px"></button>
    </form>
    <h1><img src="../imagenes/nota-adhesiva.png" width="40px">Registro de notas de: <?php echo $cursos->nomb_cur ?></h1>
    <h2>Descripcion: <?php echo $notas->desc_nota ?> </h2>
    <h2>Porcentaje: <?php echo  $notas->porcentaje?>% </h2>
    <br>
    <div class="modal fade" id="modaleditcalificacion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="modaleditcalificacion">Editar calificación</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="../modificaciones/insertarCalificaciones.php" method="POST">
            <div class="modal-body">
                Valor: <br><input id="recibirvalor" name="valornota" placeholder="Calificación"type="number" onkeypress="return (event.charCode >= 48 && event.charCode <= 57 || event.charCode==46)" step=".1"min="0" max="5"required> 
                <br>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="submit" name="cod_cal" id ="recibircod_cal"class="btn btn-primary">Guardar</button>
            </div>
        </form>
        </div>
    </div>
    </div>
    <br>
  <div id="table-container">
    <table id="example" class="table table-striped" style="width:100%">
      <thead>
        <tr>
          <th>#</th>
          <th>Codigo</th>
          <th>Nombre</th>
          <th>Nota</th>
        </tr>
      </thead>
      <tbody>
        <?php 
          $sql="select * from calificaciones c join estudiantes e on e.cod_est=c.cod_est where c.cod_cur='$curso' and c.nota='$nota' and c.periodo='$periodo' and c.year='$year'";
          $result=pg_query($sql);
          $contar=1;
          while($mostrar=pg_fetch_object($result)){
        ?>
        <tr>
          <th scope="row"><?php echo $contar++; ?></th>
          <td><?php echo $mostrar->cod_est; ?></td>
          <td><?php echo $mostrar->nomb_est; ?></td>
          <td><?php echo $mostrar->valor; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  
            <button type="button" id="botontablacalificaciones" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#modaleditcalificacion" data-nota="<?php echo $mostrar->valor ?>" data-cod_cal="<?php echo $mostrar->cod_cal?>">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                    <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z"/>
                </svg>
            </button> 
            </td>
        </tr>
      <?php } ?>
      </tbody>
      <tfoot>
        <tr>
          <th>#</th>
          <th>Codigo</th>
          <th>Nombre</th>
          <th>Nota</th>
        </tr>
      </tfoot>
    </table>
  </div>
    <form action="reporteDeNotas.php">
      <button type="submit" class="botonRe">Reporte de notas</button>
    </form>

    <script src="../javascript/script.js"></script> 
  <script src="../lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
<script src="../javascript/app.js"></script>
    <script src="../javascript/pasarcalificaciones.js"></script>
</body>
</html>