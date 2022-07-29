<?php 
    session_start();  
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
<br>
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>La suma total de los porcentajes excedio al 100%! intente editando o introduciendo un valor menor</strong><br>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
    <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalnotas">
    [+] Agregar nota
</button>

<!-- Modal -->
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
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Aceptar</button>
        </div>
      </form>
    </div>
  </div>
</div>
<script src="../lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
<script src="../javascript/app.js"></script>
</body>
</html>