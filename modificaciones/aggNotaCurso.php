<?php 
    session_start();
    include_once("../conexion.php");
    $curso= $_SESSION['curso'];
    $year = $_SESSION['year'];
    $periodo = $_SESSION['periodo'];
    $posNota = $_POST['posNota'];
    $descripNota= $_POST['descripNota'];
    $porcentNota = $_POST['porcentNota'];
    //consulta de suma total de porcentajes
    $query= pg_query("select sum(porcentaje) as promedio from notas");
    $sumaPorcentaje= pg_fetch_object($query);
    //consulta de maximo numero de cod_cal
    $querycod_cal= pg_query("select max(cod_cal) as max from calificaciones");
    $cod_cal= pg_fetch_object($querycod_cal);
    //consulta de si existe o no en notas ya la posicion de nota (nota)
    $consultacant = pg_query("select * from notas where nota='$posNota'");
    $cant= pg_num_rows($consultacant);

    $consultaEst = pg_query("select * from inscripciones where cod_cur='$curso' and year='$year' and periodo='$periodo'");
    
    if($cant==1){
        header("location:../notasycalificaciones/errorNota.php");
    }
    else{
        if($sumaPorcentaje->promedio+$porcentNota>100){
            header("location:../notasycalificaciones/errorPorcentaje.php");
        }
        else{
            pg_query("insert into notas values($posNota,'$descripNota',$porcentNota,$posNota,'$curso')");

            while($est= pg_fetch_object($consultaEst)){
                $est1=$est->cod_est;
                pg_query("insert into calificaciones(nota,valor,fecha,cod_cur,cod_est,year,periodo) values($posNota,0,current_date,'$curso','$est1','$year','$periodo')");
            }
            header("location:../notasycalificaciones/insertarNotas.php");
        }
    }
 ?>