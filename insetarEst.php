<?php 
    session_start();
    include_once("conexion.php");
    $curso = $_POST['cursos'];
    $year = $_POST['year'];
    $periodo = $_POST['periodo'];
    $_SESSION['curso']=$curso;
    $_SESSION['year']=$year;
    $_SESSION['periodo']=$periodo;
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="lib/bootstrap/css/bootstrap.min.css">
    <title>InsertarEstudiante</title>
</head>
<body >
  
  <h3>ESTUDIANTES INSCRITOS</h3>  

    <!-- Button trigger modal -->
<button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-plus-fill" viewBox="0 0 16 16">
        <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"></path>
        <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"></path>
    </svg>
  Inscribir Estudiante
</button>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Inscribir estudiante</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="POST" action="insertarEnCursos/inscribirEst.php">
                  <select name="codigo" class="form-select" aria-label="Default select example">
                      <option selected>Seleccionar estudiante</option>
                      <?php
                          $consulta=pg_query("select * from estudiantes e where e.cod_est not in(select e.cod_est from estudiantes e,cursos c, inscripciones i where i.cod_cur=c.cod_cur and e.cod_est=i.cod_est and c.cod_cur='$curso' and i.year='$year' and i.periodo='$periodo') order by e.cod_est");
                          while($objEstu=pg_fetch_object($consulta)){
                          ?>
                            <option value="<?php echo $objEstu->cod_est?>"> <?php echo $objEstu->nomb_est," | ",$objEstu->cod_est; ?></option>
                          <?php
                          }
                      ?>
                  </select>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-plus-fill" viewBox="0 0 16 16">
                            <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"></path>
                            <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"></path>
                        </svg>
                    inscribir
                </button>
              </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <div>
  </div>
  <br>
  <div class="col-auto p-5 text-center">
    <table class="table table-striped">
      <tr>
        <th scope="col">#</th>
        <th scope="col">Codigo</th>
        <th scope="col">Nombre</th>
        <th scope="col">Acciones</th>
      </tr>
      <?php 
        $sql="select * from estudiantes e where e.cod_est in(select e.cod_est from estudiantes e,cursos c, inscripciones i where i.cod_cur=c.cod_cur and e.cod_est=i.cod_est and c.cod_cur='$curso' and i.year='$year' and i.periodo='$periodo') order by e.cod_est";
        $result=pg_query($sql);
        $contar=1;
        while($mostrar=pg_fetch_object($result)){
       ?>
      <tr>
        <th scope="row"><?php echo $contar++; ?></th>
        <td><?php echo $mostrar->cod_est; ?></td>
        <td><?php echo $mostrar->nomb_est; ?></td>
        <td>1</td>
      </tr>
      <?php } ?>
    </table>
  </div>
<script src="lib/bootstrap/js/bootstrap.min.js"></script>
 </body>
 </html>