<?php
    include("layout/header.php");

 ?>
    <div class="col-auto p-5 text-center">
        <form action="log/loguearse.php" method="POST">
            <h2>Iniciar sesión</h2>
            <input type="text" name="user" id="01" placeholder="Ingrese su usuario">
            <br><br>
            <input type="password" name="contraseña" placeholder="Ingrese su contraseña">
            <br><br>
            <button type="submit" class="btn btn-success">Iniciar</button>
        </form>
    </div>  
<?php include("layout/footer.php"); ?>