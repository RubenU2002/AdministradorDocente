<?php 
    session_start();
    $year = $_SESSION['year'];
    $curso = $_SESSION['curso'];
    $periodo = $_SESSION['periodo'];
    include_once("../conexion.php");
    $notaold = $_POST['posiantigua'];
    $notanew = $_POST['posNota'];
    $descrip = $_POST['descripNota'];
    $porcentaje = $_POST['porcentNota'];
    //consulta de suma total de porcentajes 
    $query= pg_query("select sum(porcentaje) as promedio from notas where cod_cur='$curso' and periodo='$periodo' and year='$year'");
    $sumaPorcentaje= pg_fetch_object($query);
    $valorantiguo=pg_fetch_object(pg_query("select * from notas where cod_cur='$curso' and periodo='$periodo' and year='$year' and posicion='$notaold'"));
    if($notanew!=$notaold){
        //consulta de maximo numero de cod_cal
        $consultacant = pg_query("select * from notas where posicion=$notanew and year='$year' and periodo='$periodo' and cod_cur='$curso'");
        $cant= pg_num_rows($consultacant);
        if($cant>=1){
            header("location:../notasycalificaciones/errorNota.php");
        }
        else{
            if($sumaPorcentaje->promedio+($porcentaje-$valorantiguo->porcentaje)>100){
                echo "primer ";
                header("location:../notasycalificaciones/errorPorcentaje.php");
            }
            else{
                pg_query("update notas cascade set posicion=$notanew, desc_nota='$descrip', porcentaje=$porcentaje where posicion='$notaold' and year='$year' and periodo='$periodo' and cod_cur='$curso'");
                header("location:../notasycalificaciones/insertarNotas.php");
            }
        }
    }
    if($sumaPorcentaje->promedio+($porcentaje-$valorantiguo->porcentaje)>100){
        echo "segundo pos";
            header("location:../notasycalificaciones/errorPorcentaje.php");
    }
    else{
        pg_query("update notas cascade set posicion=$notanew, desc_nota='$descrip', porcentaje=$porcentaje where posicion='$notaold' and year='$year' and periodo='$periodo' and cod_cur='$curso'");
        header("location:../notasycalificaciones/insertarNotas.php");
    }
?>