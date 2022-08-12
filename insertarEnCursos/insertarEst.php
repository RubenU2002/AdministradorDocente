<?php 
    session_start();
    include_once("../conexion.php");
    $curso = $_SESSION['curso'];
    $year = $_SESSION['year'];
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

    <link rel="stylesheet" href="../estilos/insertarE.css">
    <link rel="stylesheet" href="../estilos/loader.css">

    <title>InsertarEstudiante</title>
</head>
<body>

<div class="contenedor_loader">
        <div class="loader"></div>
    </div>

<nav class="navbar bg-light fixed-top" >
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><img src="../imagenes/grupo-de-lectura.png" width="50px"></a>
    <h4>ESTUDIANTES INSCRITOS</h4>
  </div>
</nav> 



    <h3>ESTUDIANTES INSCRITOS</h3> 


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Inscribir estudiante</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" action="inscribirEst.php">
                <select name="codigo" class="form-select" aria-label="Default select example" required>
                    <option value="" selected disabled>Seleccionar estudiante</option>
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
<!-- Modal -->
<div class="modal fade" id="modalconfirmacion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalconfirmacion">¿Esta seguro?</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="../modificaciones/eliminar.php" method="POST">
        ¿Seguro desea borrar a <input id="recibirnombre" type="text" name ="nombre_prueba" disabled class="text-center">  del curso?
      </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
          <button name="codigo_prueba" type="submit" id="recibircodigo" class="btn btn-danger">
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
<br>
<!--<div class="alert alert-primary alert-dismissible fade show" role="alert">
    <strong>El estudiante ha sido agregado correctamente!</strong><br>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>-->

<br>
<div id="table-container">
    <table id="example" class="table table-striped" style="width:100%">
      <thead>
        <tr>
          <th>#</th>
          <th>Codigo</th>
          <th>Nombre</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
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
          <td>
            <button type="button" id="botontabla" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#modalconfirmacion" data-nombre="<?php echo $mostrar->nomb_est ?>" data-codigo="<?php echo $mostrar->cod_est ?>">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
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
          <th>Acciones</th>
        </tr>
      </tfoot>
    </table>
  </div>
  
     <!--butoontrigger modal -->
     <button type="button" class="boton" data-bs-toggle="modal" data-bs-target="#exampleModal">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-plus-fill" viewBox="0 0 16 16">
            <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"></path>
              <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"></path>
            </svg>
            Inscribir Estudiante
          </button>

      <form action="notasycalificaciones/insertarNotas.php">
        <button type="submit" class="bttn">Notas del curso</button>
      </form>

        <form action="log/logout.php" class="box">
        <button type="submit" class="btn btn-dark" >Cerrar sesión</a></button>
        </form> 

    <script src="../javascript/script.js"></script>   
    <script src="../lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
<script src="../javascript/app.js"></script>
<script src="../javascript/pasardatos.js"></script>

 </body>
 </html>