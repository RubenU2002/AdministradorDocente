<?php 
    session_start();
    include_once("../conexion.php");
    $notaold = $_POST['posiantigua'];
    $notanew = $_POST['posNota'];
    $descrip = $_POST['descripNota'];
    $porcentaje = $_POST['porcentNota'];

    echo "vieva", $notaold, "nueva",$notanew,"descrip", $descrip,"porcen",$porcentaje;
    pg_query("update notas cascade set nota=$notanew, desc_nota='$descrip', porcentaje=$porcentaje where nota='$notaold'");
?>