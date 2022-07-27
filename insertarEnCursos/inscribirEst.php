<?php 
    session_start();
    include_once("../conexion.php");
    $codigo_est=$_POST['codigo'];
    $_SESSION['codigo_est']=$codigo_est;
    $curso = $_SESSION['curso'];
    $year = $_SESSION['year'];
    $periodo = $_SESSION['periodo'];
    echo $codigo_est,$curso,$year,$periodo;
    pg_query("insert into inscripciones values('$curso','$codigo_est','$year','$periodo')");
    header("location:insertarEst.php");
 ?>