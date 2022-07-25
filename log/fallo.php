<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../lib/bootstrap/css/bootstrap.min.css">
    <title>fallo</title>
</head>
<body >
    <div class="m-0 vh-100 row justify-content-center align-items-center">
        <div class="col-auto p-5 text-center">
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            Usuario y/o contraseña incorrectos!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
            <form action="loguearse.php" method="POST">
                <h2>Iniciar sesión</h2>
                <input type="text" name="user" id="01" placeholder="Ingrese su usuario">
                <br><br>
                <input type="password" name="contraseña" placeholder="Ingrese su contraseña">
                <br><br>
                <button type="submit" class="btn btn-success">Iniciar</button>
            </form>
        </div>  
    </div>
    <script src="../lib/bootstrap/js/bootstrap.min.js"></script>
 </body>
 </html>