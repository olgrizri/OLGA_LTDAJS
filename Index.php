<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$database = "olgalt";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

    $sql = "SELECT * FROM Productos";

$result = $conn->query($sql);

if ($result === false) {
    echo json_encode(array("error" => "Error en la consulta SQL"));
} elseif ($result->num_rows > 0) {
    $productDetails = array(); 

    while($resp = $result->fetch_assoc())
    {
        
        
        array_push($productDetails, array(
            [
                "Nombre" => $resp["Nombre"],
                "ValorVenta" => $resp["ValorVenta"],
                "Marca" => $resp["Marca"],
                "GarantiaProveedor" => $resp["GarantiaProveedor"],
                "OrigenProducto" => $resp["OrigenProducto"],
                "CodigoProducto" => $resp["CodigoProducto"],

            ]
        ));
    }

   
} else {
    echo json_encode(array("error" => "Producto no encontrado"));
}


$conn->close();


$limitePaginacion  = 10;
$cantPaginacion = ceil(count($productDetails)/$limitePaginacion ); 
 
 
if(isset($_GET) && !empty($_GET))
{
    if(isset($_GET['page']) && !empty($_GET['page']))
    {
 
        $pagina = $_GET['page']; 
 
        $consultaHasta = $pagina * $limitePaginacion ; 
        $consultaDesde = ($pagina-1) * $limitePaginacion ; 
 

 
        $productosFiltrados = array();
        for($i = $consultaDesde; $i <= $consultaHasta; $i++)
        {
 
            if(!isset($productDetails[$i]))
            {
                break;
            }
            array_push($productosFiltrados, $productDetails[$i] );
        }

     
    }else{
        header("Location:?page=1"); 
    }
 
}else{
    header("Location:?page=1"); 
}
 
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
<body onload="consultarProductos(4)">
<nav class="navbar navbar-light bg-dark">
  <a class="navbar-brand text-white">FERRETERIA</a>
  <form class="form-inline">
    <a class="btn btn-success my-2 my-sm-0" href="login.php">Iniciar Sesion</a>
  </form>
</nav>

    <nav>
        <ul>
            <li><a href="index.php">Inicio</a></li>
            <li><a href="vistas/CRUDUsuarios.php">Usuarios</a></li>
            <li><a href="vistas/CRUDProductos.php">Productos</a></li>
            <li><a href="#" id="ver_carrito" data-toggle="modal" data-target="#exampleModal"><img src="recursos/img/carrito.png" alt="">Ver productos</a></li>
                        

            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Productos agregados</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table>
                        <thead>
                            <tr>
                                <th>Nombre del producto</th>
                                <th>Valor del producto</th>
                                <th>Eliminar</th>
                            </tr>
                        </thead>
                        <tbody id="lista_productos">
                            
                        </tbody>
                    </table>
                    <br><hr>
                    <strong>TOTAL: <span id="total"></span> </strong>
                  
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
                </div>
            </div>
            </div>
        </ul>
    </nav>

    <section id="main-content">
        <div class="container">

            <div class="row">
                <div class="col-xs-12 col-md-12 col-lg-12">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner" style="height: 300px;">
                            <div class="carousel-item active">
                            <img src="recursos/img/ferreteria_1.png" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                            <img src="recursos/img/ferreteria_2.webp" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                            <img src="recursos/img/ferreteria_3.jpg" class="d-block w-100" alt="...">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-target="#carouselExampleIndicators" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-target="#carouselExampleIndicators" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </button>
                    </div> 
                </div>
            </div>
        </div>
    </section>

    <section>
        
        <div class="container">
        <h3 class="text-center">Nuestro Catalogo De Productos</h3>

            <div class="row">
                <?php
                $i = 0;
                 while (isset($productosFiltrados[$i]) && $i < $limitePaginacion) { ?>
                                    
                            <div class="col-xs-12 col-md-3 col-lg-3">
                                    <div class="card mt-3" >
                                        <div class="card-body">
                                            <h5 class="card-title"><?php echo $productosFiltrados[$i][0] ['Nombre'] ?></h5>
                                            <h6 class="card-subtitle mb-2 text-muted"><?php echo $productosFiltrados[$i][0] ['ValorVenta'] ?></h6>
                                            <ul >
                                                <li><?php echo $productosFiltrados[$i][0] ['Marca'] ?></li>
                                                <li><?php echo $productosFiltrados[$i][0] ['GarantiaProveedor'] ?></li>
                                                <li><?php echo $productosFiltrados[$i][0] ['OrigenProducto'] ?></li>
                                            </ul>
                                            <button class="card-link btn btn-info" onclick="agregarCarritoPromesa(<?php echo $productosFiltrados[$i][0] ['CodigoProducto'] ?>)">Agregar al carrito</button>
                                           
                                        </div>
                                </div>
                            </div>
                 <?php
                 $i++;
                 }
                 ?>
            </div>
        </div>

       
        <nav aria-label="Page navigation example">
            <ul class="pagination mt-3">
                <li class="page-item <?php echo ($_GET['page']-1)==0?'disabled':''?>"><a class="page-link" href="index.php?page=<?php echo ($_GET['page']-1)==0?'1':($_GET['page']-1) ?>">Anterior</a></li>
                <?php
                $maximo = 0;
                for($i = 0; $i < $cantPaginacion; $i++){ ?>
                        <li class="page-item <?php echo ($_GET['page']==($i+1)?'active':'') ?>"><a class="page-link" href="index.php?page=<?php echo ($i+1) ?>"><?php echo ($i+1) ?></a></li>
                <?php
    
                    $maximo++; 
            
                    }
                ?>
    
                <li class="page-item  <?php echo ($_GET['page']+1)>$maximo?'disabled':''?>"><a class="page-link" href="index.php?page=<?php echo ($_GET['page']+1)>$maximo?$maximo:($_GET['page']+1) ?>">Siguiente</a></li>
            </ul>
        </nav>
       
    </section>

    <footer>
        <p>&copy; 2023 Ferretería</p>
    </footer>
</body>
</html>



<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>


<script src="
https://cdn.jsdelivr.net/npm/sweetalert2@11.10.0/dist/sweetalert2.all.min.js
"></script>
<link href="
https://cdn.jsdelivr.net/npm/sweetalert2@11.10.0/dist/sweetalert2.min.css
" rel="stylesheet">


<script src="recursos/js/index.js">
 </script>

