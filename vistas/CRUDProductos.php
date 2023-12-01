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
    <title>CRUD Productos</title>
    <link rel="stylesheet" href="../recursos/css/styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>
<body onload="volverAlCRUDProductos()">
        <nav class="navbar navbar-light bg-dark">
        <a class="navbar-brand text-white">FERRETERIA-GESTION PRODUCTOS</a>
        <form class="form-inline" method="POST" action="../controllers/cerrar_sesion.php">

          <button class="btn btn-success my-2 my-sm-0" type="submit">Cerrar Sesion</button>
        </form>
        </nav>
    <nav>
        <ul>
            <li><a href="../index.php">Inicio</a></li>
            <li><a href="CRUDUsuarios.php">Usuarios</a></li>
            <li><a href="">Productos</a></li>
          
        </ul>
    </nav>

    <section id="product-buttons">
        
    </section>

    <section id="product-create-form" style="display: none;">
        
    <form>
	<table> <th>
            <div id="campoCodigo">
                <label for="product-codigo">Código de Producto:</label>
                <input type="text" class="form-control" id="product-codigo" placeholder="Código del producto" readonly>
            </div>
         <p>
        	<label for="product-nombre">Nombre:</label>
	        <input type="text" class="form-control" id="product-nombre" placeholder="Nombre del producto">
	    </p>
        <p>

        	<label for="product-marca">Marca:</label>
	        <input type="text" class="form-control" id="product-marca" placeholder="Marca del producto">
	    </p>
        <p>
            <label for="product-tipoProducto">Tipo de Producto:</label>
                <input type="text" class="form-control" id="product-tipoProducto" placeholder="Tipo del producto">
        </p>
        <p>
            <label for="product-origenP">Origen producto:</label>
                <input type="text" class="form-control" id="product-origenP" placeholder="Origen del producto">
        </p>
        <p>
            <label for="product-Cantidad">Cantidad:</label>
                <input type="number" class="form-control" id="product-Cantidad" placeholder="Cantidad">
        </p>
        <p>
            <label for="product-Valorcosto">Costo:</label>
                <input type="number" class="form-control" id="product-Valorcosto" placeholder="Costo">
        </p>
        <p>
            <label for="product-ValorVenta">Valor Venta:</label>
                <input type="number" class="form-control" id="product-ValorVenta" placeholder="Valor Venta">
        </p>
        <p>
            <label for="product-FechaF">Fecha Fabricación:</label>
                <input type="date" id="product-FechaF" placeholder="Fecha fabricacion">
        </p>
        <p>
            <label for="product-proveedor">proveedor:</label>
                <input type="text" class="form-control" id="product-proveedor" placeholder="proveedor">
        </p>
        <p>
		<label for="product-Garantia">Garantia:</label>
        	<input type="number" class="form-control" id="product-Garantia" placeholder="Garantia">
	</p>
    <p>
    <button type="reset" value="Limpiar Campos" class="btn btn-danger">
        Limpiar Campos
    </button>
    </p>
    </form>
	</th>
	<th><p>
      
	<button type="button" onclick="guardarCambios()">Guardar Cambios</button>
	</p><p><p>
	<button type="button" id="btnEliminarForm" onclick="eliminarProducto()">Eliminar</button>
	</p></p>
        <button type="button" onclick="volverAlCRUDProductos()">Volver</button>
	
	</th>
	</table>
    </section>

    <section id="product-list">
        <button class="BtnCrearUsu" onclick="mostrarCrearProducto(0, 0)">Crear Producto</button>
        <label for="search-product-code">Código de Producto:</label>
	<input type="text" class="form-control" id="search-product-code" value="Todos">
	<button onclick="leerProductos(document.getElementById('search-product-code').value)">Buscar</button>
	
        <table class="table-hover">
            <thead>
                <tr>
                   <th>Código</th>
                   <th>Nombre</th>
                   <th>Marca</th>
                   <th>Tipo de Producto</th>
                   <th>Origen del Producto</th>
                   <th>Cantidad</th>
                   <th>Valor Costo</th>
                   <th>Valor Venta</th>
                   <th>Fecha de Fabricación</th>
                   <th>Proveedor</th>
                   <th>Garantía del Proveedor</th>
                   <th>Eliminar</th>
                   <th>Editar</th>
                    
                    
                    
                </tr>
            </thead>
            <tbody id="product-table-body">
               
            </tbody>
        </table>

        
        <input type="hidden" id="selected-product-code">
    </section>

    <footer>
        <p>&copy; 2023 Ferretería</p>
    </footer>

    <script src="../recursos/js/crudProductos.js"></script>

    

<script src="
https://cdn.jsdelivr.net/npm/sweetalert2@11.10.0/dist/sweetalert2.all.min.js
"></script>
<link href="
https://cdn.jsdelivr.net/npm/sweetalert2@11.10.0/dist/sweetalert2.min.css
" rel="stylesheet">

</body>
</html>
