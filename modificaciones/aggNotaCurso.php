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
    $query= pg_query("select sum(porcentaje) as promedio from notas where cod_cur='$curso' and periodo='$periodo' and year='$year'");
    $sumaPorcentaje= pg_fetch_object($query);
    //consulta de maximo numero de cod_cal
    $querycod_cal= pg_query("select max(cod_cal) as max from calificaciones");
    $cod_cal= pg_fetch_object($querycod_cal);
    //consulta de si existe o no en notas ya la posicion de nota (nota)
    $consultacant = pg_query("select * from notas where posicion=$posNota and year='$year' and periodo='$periodo' and cod_cur='$curso'");
    $cant= pg_num_rows($consultacant);

    $consultaEst = pg_query("select * from inscripciones where cod_cur='$curso' and year='$year' and periodo='$periodo'");
    
    if($cant>=1){
        header("location:../notasycalificaciones/errorNota.php");
    }
    else{
        if($sumaPorcentaje->promedio+$porcentNota>100){
            header("location:../notasycalificaciones/errorPorcentaje.php");
        }
        else{
            pg_query("insert into notas(desc_nota,porcentaje,posicion,cod_cur,year,periodo) values('$descripNota',$porcentNota,$posNota,'$curso','$year','$periodo')");
            $query1=pg_query("select * from notas where year='$year' and periodo='$periodo' and nota not in(select nota from calificaciones where cod_cur='$curso' and year='$year' and periodo='$periodo')");
            $notaFaltante=pg_fetch_object($query1);
            while($objEst=pg_fetch_object($consultaEst)){
                pg_query("insert into calificaciones(nota,cod_cur,cod_est,year,periodo) values($notaFaltante->nota,'$curso','$objEst->cod_est','$year','$periodo')");
            }
            header("location:../notasycalificaciones/insertarNotas.php");
        }
    }
 ?>