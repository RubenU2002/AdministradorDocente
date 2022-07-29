<?php 
    session_start();
    include_once("../conexion.php");
    $codigo_est=$_POST['codigo'];
    $_SESSION['codigo_est']=$codigo_est;
    $curso = $_SESSION['curso'];
    $year = $_SESSION['year'];
    $periodo = $_SESSION['periodo'];
    pg_query("insert into inscripciones values('$curso','$codigo_est','$year','$periodo')");

    $consultacant = pg_query("select * from notas where cod_cur='$curso'");
    $cant= pg_num_rows($consultacant);

    $notas = pg_query("select * from notas where cod_cur='$curso'");

    if($cant!=0){
        while($obj=pg_fetch_object($notas)){
            pg_query("insert into calificaciones(nota,valor,fecha,cod_cur,cod_est,year,periodo) values($obj->nota,0,current_date,'$curso','$codigo_est','$year','$periodo')");
        }
    }
    
    header("location:insertarEst.php");
 ?>