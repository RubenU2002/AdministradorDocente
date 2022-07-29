<?php 
    session_start();
    include_once("../conexion.php");
    $year = $_SESSION['year'];
    $curso = $_SESSION['curso'];
    $periodo = $_SESSION['periodo'];
    $codigopasado =$_POST['codigo_prueba'];

    pg_query("delete from inscripciones where cod_est='$codigopasado' and cod_cur='$curso' and year='$year' and periodo='$periodo'");
    pg_query("alter sequence calificaciones_cod_cal_seq restart with 1;");
    pg_query("update calificaciones set cod_cal=nextval('calificaciones_cod_cal_seq');");

    header("location:../insertarEnCursos/insertarEst.php");
 ?>