<?php 
    session_start(); 
    include_once("../conexion.php"); 
    $year = $_SESSION['year'];
    $curso = $_SESSION['curso'];
    $periodo = $_SESSION['periodo'];
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
    <title>Agregar Notas</title>
</head>
<body>
    <!-- Button trigger modal insertar notas -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalnotas">
    [+] Agregar nota
</button>

<!-- Modal insertar notas -->
<div class="modal fade" id="modalnotas" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Insertar nota al curso</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="../modificaciones/aggNotaCurso.php" method="POST">
        <div class="modal-body">
            Posicion: <br><input name="posNota"placeholder="Numero de nota"type="number" onkeypress="return (event.charCode >= 48 && event.charCode <= 57)" min="1" required> 
            <br>
            Descripcion: <br> <input type="text" name="descripNota" maxlength="30" placeholder="Describa la nota" required>
            <br>
            Porcentaje <br><input max="100" type="number" placeholder="%" name="porcentNota" onkeypress="return (event.charCode >= 48 && event.charCode <= 57)" min="1" required>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary">Aceptar</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- modal editar notas -->
<div class="modal fade" id="modaleditnotas" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar nota del curso</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="../modificaciones/actualizarNotaCurso.php" method="POST">
        <div class="modal-body">
            Posicion: <br><input id="recibirposicion" name="posNota"placeholder="Numero de nota"type="number" onkeypress="return (event.charCode >= 48 && event.charCode <= 57)" min="1" required> 
            <br>
            Descripcion: <br> <input type="text" id="recibirdescrip" name="descripNota" maxlength="30" placeholder="Describa la nota" required>
            <br>
            Porcentaje <br><input max="100" id="recibirporcentaje" type="number" placeholder="%" name="porcentNota" onkeypress="return (event.charCode >= 48 && event.charCode <= 57)" min="1" required>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            <button type="submit" name="posiantigua" id ="recibirenbotonposi"class="btn btn-primary">Actualizar</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-------------->
<div class="modal fade" id="modaleliminarnota" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalconfirmacion">¿Esta seguro?</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="../modificaciones/eliminarNota.php" method="POST">
        ¿Seguro desea borrar la nota <input id="recibirdescrip1" type="text" name ="descripNota" disabled class="text-center">  del curso?
      </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
          <button name="nota" type="submit" id="botonrecibireliminar" class="btn btn-danger">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                  <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
              </svg>Eliminar
          </button> 
        </div>
      </div>
      </form>
  </div>
</div>
<!---------------------->
<br>
  <div>
    <table id="tablanotas" class="table table-striped" style="width:100%">
      <thead>
        <tr>
          <th>#</th>
          <th>POSICIÓN</th>
          <th>DESCRIPCIÓN</th>
          <th>PORCENTAJE</th>
          <th>EDITAR</throw>
          <th>BORRAR</th>
          <th>REGISTRAR</th>
        </tr>
      </thead>
      <tbody>
        <?php 
          $sql="select * from notas where cod_cur='$curso'";
          $result=pg_query($sql);
          $contar=1;
          while($mostrar=pg_fetch_object($result)){
        ?>
        <tr>
          <th scope="row"><?php echo $contar++; ?></th>
          <td><?php echo $mostrar->nota; ?></td>
          <td><?php echo $mostrar->desc_nota; ?></td>
          <td><?php echo $mostrar->porcentaje; ?> </td>
          <td>
            <button type="button" id="botonedittablanotas" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#modaleditnotas" data-descrip="<?php echo $mostrar->desc_nota ?>" data-nota="<?php echo $mostrar->nota ?>" data-porcentaje="<?php echo $mostrar->porcentaje?>">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                    <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                </svg>
            </button>
          </td>
          <td>
            <button type="button" id="botoneliminarnotas" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#modaleliminarnota" data-nota="<?php echo $mostrar->nota ?>" data-descrip="<?php echo $mostrar->desc_nota ?>">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
              </svg>
            </button>
          </td>
          <td>
            <form action="notasEstudiantes.php" method="POST">
                <button type="submit" name="nota" value="<?php echo $mostrar->nota?>" class="btn btn-outline-success">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                    </svg>
                </button>
            </form>
          </td>
        </tr>
      <?php } ?>
      </tbody>
      <tfoot>
        <tr>
            <th>#</th>
            <th>POSICIÓN</th>
            <th>DESCRIPCIÓN</th>
            <th>PORCENTAJE</th>
            <th>EDITAR</throw>
            <th>BORRAR</th>
            <th>REGISTRAR</th>
        </tr>
      </tfoot>
    </table>
  </div>
<script src="../lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
<script src="../javascript/tablanotas.js"></script>
<script src="../javascript/pasarnotas.js"></script>
<script src="../javascript/pasareliminarnota.js"></script>
</body>
</html>