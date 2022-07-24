<?php 
    include_once("../conexion.php");
    session_start();
    $user= $_POST['user'];
    $pass= $_POST['contraseña'];
    $query="select nomb_doc from docentes where cod_doc='$user' and clave='$pass'";
    $consulta=pg_query($query);
    $row=pg_fetch_object($consulta);
    $cantidad=pg_num_rows($consulta);
    if($cantidad>0){
        $_SESSION['codigo_user']=$user;
        $_SESSION['nombre_user']=$row->nomb_doc;
        header("location:../selectCursos.php");
    }else{
        $_SESSION['fallo_auten']= "Nombre de usuario y/o contraseña incorrectos";
        header("location:../index.php");
    }
 ?>