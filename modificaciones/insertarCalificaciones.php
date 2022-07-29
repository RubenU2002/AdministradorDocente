<?php 
    session_start();
    include_once("../conexion.php");
    $valor = $_POST['valornota'];
    $cod_cal = $_POST['cod_cal'];
    if($valor<0.0 || $valor>5.0){
        header("location:../notasycalificaciones/errorCalificaciones.php");
    }
    else{
        pg_query("update calificaciones set valor='$valor' where cod_cal=$cod_cal");
        header("location:../notasycalificaciones/notasEstudiantes1.php");
    }
 ?>