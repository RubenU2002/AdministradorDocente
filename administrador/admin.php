<?php 
    include_once("../conexion.php");
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
    <title>ADMIN</title>
</head>
<body>
    <h2>Reporte general de inscripciones</h2>
    <div>
        <table id="example" class="table table-striped" style="width:100%">
        <thead>
            <tr>
            <th>#</th>
            <th>Fecha de acción</th>
            <th>Docente</th>
            <th>Acción</th>
            <th>Estudiante</th>
            <th>Curso</th>
            <th>Año</th>
            <th>Periodo</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $reporteInscrip = pg_query("select * from eventosDeInscripciones");
            $contar=1;
            while($mostrar=pg_fetch_object($reporteInscrip)){
            ?>
            <tr>
                <th scope="row"><?php echo $contar++; ?></th>
                <td><?php echo $mostrar->fecha_hora ?></td>
                <td><?php echo $mostrar->docente_accionador ?></td>
                <td><?php echo $mostrar->accion ?></td>
                <td><?php echo $mostrar->estudiante ?></td>
                <td><?php echo $mostrar->curso_accionador ?></td>
                <td><?php echo $mostrar->year ?><td>
                <td><?php echo $mostrar->periodo ?></td>
            </tr>
        <?php } ?>
        </tbody>
        <tfoot>
            <tr>
            <th>#</th>
            <th>Fecha de acción</th>
            <th>Docente</th>
            <th>Acción</th>
            <th>Estudiante</th>
            <th>Curso</th>
            <th>Año</th>
            <th>Periodo</th>
            </tr>
        </tfoot>
        </table>
  </div>
    <h2>Reporte general de notas</h2>
        <div>
        <table id="example" class="table table-striped" style="width:100%">
        <thead>
            <tr>
            <th>#</th>
            <th>Fecha de acción</th>            <th>Docente</th>
            <th>Acción</th>
            <th>Codigo_Nota</th>
            <th>Curso</th>
            <th>Año</th>
            <th>Periodo</th>
            <th>Nueva Posicion</th>
            <th>Antigua Posicion</th>
            <th>Nuevo Porcentaje</th>
            <th>Viejo Porcentaje</th>
            <th>Nueva Descripcion</th>
            <th>Vieja descripcion</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $reporteNotas = pg_query("select * from eventosDeNotas");
            $contar=1;
            while($mostrar=pg_fetch_object($reporteNotas)){
            ?>
            <tr>
                <th scope="row"><?php echo $contar++; ?></th>
                <td><?php echo $mostrar->fecha_hora ?></td>
                <td><?php echo $mostrar->docente_accion ?></td>
                <td><?php echo $mostrar->accion ?></td>
                <td><?php echo $mostrar->codigo_nota ?></td>
                <td><?php echo $mostrar->curso ?></td>
                <td><?php echo $mostrar->year ?></td>
                <td><?php echo $mostrar->periodo ?></td>
                <td><?php echo $mostrar->posicion_new ?></td>
                <td><?php echo $mostrar->posicion_old ?></td>
                <td><?php echo $mostrar->porcentaje_new ?></td>
                <td><?php echo $mostrar->porcentaje_old ?></td>
                <td><?php echo $mostrar->descrip_new ?></td>
                <td><?php echo $mostrar->descrip_old ?></td>
            </tr>
        <?php } ?>
        </tbody>
        <tfoot>
            <tr>
            <th>#</th>
            <th>Fecha de acción</th>            <th>Docente</th>
            <th>Acción</th>
            <th>Codigo_Nota</th>
            <th>Curso</th>
            <th>Año</th>
            <th>Periodo</th>
            <th>Nueva Posicion</th>
            <th>Antigua Posicion</th>
            <th>Nuevo Porcentaje</th>
            <th>Viejo Porcentaje</th>
            <th>Nueva Descripcion</th>
            <th>Vieja descripcion</th>
            </tr>
        </tfoot>
        </table>
    </div>
    <script src="../lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
</body>
</html>