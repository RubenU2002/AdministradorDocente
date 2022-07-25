<?php 
    include_once("conexion.php");
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="lib/bootstrap/css/bootstrap.min.css">
    <title>InsertarEstuiante</title>
</head>
<body >
    <div class="m-0 vh-100 row justify-content-center align-items-center">
    <select class="form-select" aria-label="Default select example">
        <option selected>Seleccionar estudiante</option>
        <?php
            $consulta="select * from estudiantes";
            while($objEstu=pg_fetch_object($consulta)){?>
                <option><?php echo $objEst->cod_est; ?></option>
            <?php
            }
         ?>
        <option value="1">One</option>
        <option value="2">Two</option>
        <option value="3">Three</option>
    </select>
    </div>
<script src="lib/bootstrap/js/bootstrap.min.js"></script>
 </body>
 </html>