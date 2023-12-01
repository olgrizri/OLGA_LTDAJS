<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$database = "olgalt";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
session_start();
if(isset($_SESSION["usuario"])){
header("Location:vistas/CRUDUsuarios.php");
}


$conn->close();
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ferretería</title>
    <link rel="stylesheet" href="recursos/css/styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-light bg-dark">
  <a class="navbar-brand text-white">FERRETERIA-LOGIN</a>
</nav>
    <nav>
        <ul>
            <li><a href="index.php">Inicio</a></li>
            <li><a href="vistas/CRUDUsuarios.php">Usuarios</a></li>
            <li><a href="vistas/CRUDProductos.php">Productos</a></li>
            
        </ul>
    </nav>

    <section id="main-content">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-3 col-lg-3"></div>
                <div class="col-xs-12 col-md-6 col-lg-6">
                <div class="card h-100">
                    <div class="row">
                     <div class="col-xs-12 col-md-4 col-lg-4"></div>
                     <div class="col-xs-12 col-md-3 col-lg-3">
                        <img src="recursos/img/login_ferreteria.png" width="50%" class="card-img-top" alt="...">
                    </div>
                     
                    </div>
                    
                    <div class="card-body">
                        <h5 class="card-title text-center">Inicio de Sesion</h5>
                        <form>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Correo</label>
                                    <input type="email" class="form-control" id="correo" aria-describedby="emailHelp">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Contraseña</label>
                                    <input type="password" class="form-control" id="clave">
                                </div>
                                <button type="button" onclick="iniciarSesion()" class="btn btn-primary">Iniciar Sesion</button>
                         </form>
                    </div>
                    </div>
                </div>
                <div class="col-xs-12 col-md-3 col-lg-3"></div>
            </div>
        </div>
    </section>
    <section>
        
     
    </section>

    <footer>
        <p>&copy; 2023 Ferretería</p>
    </footer>
</body>
</html>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
<script src="recursos/js/login.js">
 </script>


