<?php
session_start();
if(!isset($_SESSION["usuario"])){
header("Location:../login.php");
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Usuarios</title>
    <link rel="stylesheet" href="../recursos/css/styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>

<body onload="mostrarBuscar()">
<nav class="navbar navbar-light bg-dark">
        <a class="navbar-brand text-white">FERRETERIA-GESTION DE USUARIOS</a>
        <form class="form-inline" method="POST" action="../controllers/cerrar_sesion.php">

            <button class="btn btn-success my-2 my-sm-0" type="submit">Cerrar Sesion</button>
        </form>
        </nav>

    <nav>
        <ul>
            <li><a href="../Index.php">Inicio</a></li>
            <li><a href="">Usuarios</a></li>
            <li><a href="CRUDProductos.php">Productos</a></li>
            <
        </ul>
    </nav>

    <section id="user-buttons">
        <button onclick="mostrarBuscar()">BUSCAR</button>
       
    </section>

    <section id="user-form" style="display: none;">
    <div class="row">
        <div class="col-xs-12 col-md-3 col-lg-3"></div>
        <div class="col-xs-12 col-md-6 col-lg-6">

            <form>
                <input class="form-control" type="hidden" id="user-code" placeholder="Código del usuario" >
                <label for="user-name">Nombre:</label>
                <input class="form-control" type="text" id="user-name" placeholder="Nombre del usuario">
                <label for="user-identification">Identificación:</label>
                <input class="form-control" type="number" id="user-identification" placeholder="Identificación del usuario">
                <label for="user-phone">Teléfono:</label>
                <input class="form-control" type="number" id="user-phone" placeholder="Teléfono del usuario">
                <label for="user-email">Correo:</label>
                <input class="form-control" type="text" id="user-email" placeholder="Correo del usuario">
                <label for="user-role">Rol:</label>
                <select class="form-control" id="user-role">
                    <option selected value="0">Selecciona</option>
                    <option value="Empleado">Empleado</option>
                    <option value="Cliente">Cliente</option>
                </select>
                <br>
                <button type="button" onclick="guardarEdicion()">Guardar Edición</button>
                <button type="button" onclick="volverAlCRUD()">Volver</button>
                <button type="reset" value="Limpiar Campos" class="btn btn-danger">
                    Limpiar Campos
                </button>
                <br>    
            </form>
        </div>
        <div class="col-xs-12 col-md-3 col-lg-3"></div>

    </div>
    </section>

    <section id="user-list" style="display: none;">
        <button class="BtnCrearUsu" onclick="mostrarCrearUsuario()">CREAR USUARIO</button>
        <label for="search-user-code">Código de Usuario:</label>
        <input type="text" id="search-user-code" value="Todos">
        <button onclick="leerUsuario()">Buscar</button>
        <button onclick="consultarTodo()">Volver</button>

        <table class="table-hover">
            <thead class="thead-dark"> 
                <tr>
                    <th>Código</th>
                    <th>Nombre</th>
                    <th>Identificación</th>
                    <th>Teléfono</th>
                    <th>Correo</th>
                    <th>Rol</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody id="user-table-body">
            </tbody>
        </table>
        
        <input type="hidden" id="selected-user-code">
    </section>


    <section id="user-form" style="display: none;">

        <form>

            <label for="user-code">Código de Usuario:</label>
                <input type="text" id="user-code" placeholder="Código del usuario" readonly>
            <label for="user-name">Nombre:</label>
                <input type="text" id="user-name" placeholder="Nombre del usuario">
            <label for="user-identification">Identificación:</label>
                <input type="text" id="user-identification" placeholder="Identificación del usuario">
            <label for="user-phone">Teléfono:</label>
                <input type="text" id="user-phone" placeholder="Teléfono del usuario">
            <label for="user-email">Correo:</label>
                <input type="text" id="user-email" placeholder="Correo del usuario">
            <label for="user-role">Rol:</label>
            <select id="user-role" placeholder="Rol del usuario">
                <option value="Empleado">Empleado</option>
                <option value="Cliente">Cliente</option>
            </select>
            <button type="button" onclick="guardarEdicion()">Guardar Edición</button>
            <button type="button" onclick="volverAlCRUD()">Volver</button>
            <button type="reset" value="Limpiar Campos" class="btn btn-danger">
                Limpiar Campos
            </button>

        </form>


    </section>




    <footer>
        <p>&copy; 2023 Ferretería</p>
    </footer>

    <script src="../recursos/js/crudUsuarios.js"></script>
    

<script src="
https://cdn.jsdelivr.net/npm/sweetalert2@11.10.0/dist/sweetalert2.all.min.js
"></script>
<link href="
https://cdn.jsdelivr.net/npm/sweetalert2@11.10.0/dist/sweetalert2.min.css
" rel="stylesheet">
</body>
</html>
