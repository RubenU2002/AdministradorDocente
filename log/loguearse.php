<?php 
    include_once("../conexion.php");
    session_start();
    $user= $_POST['user'];
    $pass= $_POST['contraseña'];
    $query="select * from docentes where cod_doc='$user' and clave='$pass'";
    $consulta=pg_query($query);
    $cantidad=pg_num_rows($consulta);
    if($cantidad>0){
        $_SESSION['codigo_user']=$user;
        header("location:../selectCursos.php");
    }else{
        echo "<script>alert('mmapinga');</script>";
    }
 ?>