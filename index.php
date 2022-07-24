<?php include("layout/header.php");
 ?>
    <div>
        <h2>Iniciar sesión</h2>
            <form action="log/loguearse.php" method="POST">
            <input type="text" name="user" id="01" placeholder="Ingrese su usuario">
            <br><br>
            <input type="password" name="contraseña" placeholder="Ingrese su contraseña">
            <button type="submit" class="btn btn-success">Iniciar</button>
        </form>
    </div>  
<?php include("layout/footer.php"); ?>