<?php 
    include_once("../conexion.php");
 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../lib/bootstrap/css/bootstrap.min.css">
    <title>Document</title>
 </head>
 <body>
    <div class="m-0 vh-100 row justify-content-center align-items-center">
        <div class="col-auto p-5 text-center">
            <form action="/insertarEnCursos/inscribirEst.php" method="POST">
                <select class="form-select" aria-label="Default select example">
                    <option selected>Seleccionar estudiante</option>
                    <?php
                        $consulta=pg_query("select * from estudiantes");
                        while($objEstu=pg_fetch_object($consulta)){
                        ?>
                            <option><?php echo $objEstu->cod_est," | ",$objEstu->nomb_est; ?></option>
                        <?php
                        }
                    ?>
                </select>
            </form>
        </div>
    </div>
    <script src="../lib/bootstrap/js/bootstrap.min.js"></script>
 </body>
 </html>