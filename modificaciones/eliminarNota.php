<?php 
    session_start();
    include_once("../conexion.php");
    $curso= $_SESSION['curso'];
    $nota = $_POST['nota'];
    echo $nota;
    echo $curso;
    pg_query("delete from notas cascade where nota='$nota' and cod_cur='$curso'");
    //pg_query("alter sequence calificaciones_cod_cal_seq restart with 1;");
    //pg_query("update calificaciones set cod_cal=nextval('calificaciones_cod_cal_seq');");
    header("location:../notasycalificaciones/insertarNotas.php");
 ?>