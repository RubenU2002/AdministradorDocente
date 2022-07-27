<?php 
    session_start();
    include_once("../conexion.php");
    $year = $_SESSION['year'];
    $curso = $_SESSION['curso'];
    $periodo = $_SESSION['periodo'];
    $codigopasado =$_POST['pasarcodigo'];

    pg_query("delete from inscripciones where cod_est='$codigopasado' and cod_cur='$curso' and year='$year' and periodo='$periodo'");

    header("location:../insertarEnCursos/insertarEst.php");
 ?>