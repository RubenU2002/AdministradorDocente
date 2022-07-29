<?php 
    session_start();
    include_once("../conexion.php");
    $curso= $_SESSION['curso'];
    $nota = $_POST['nota'];
    echo $nota;
    echo $curso;
    pg_query("delete from notas cascade where nota='$nota' and cod_cur='$curso'");
    header("location:../notasycalificaciones/insertarNotas.php");
 ?>