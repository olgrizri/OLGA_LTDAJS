<?php 

namespace ferreteria; 

require_once('Usuarios.php'); 
require_once('Productos.php'); 


$objeto = new Usuarios(); 
$objeto2 = new Productos(); 


if(isset($_POST) && !empty($_POST))
{

    $modulo = $_POST["modulo"]; 
    $operacion = $_POST["operacion"]; 


    
    switch ($modulo) {
        case 'Usuarios':

                if($operacion == "na") 
                {

                    
                    // Obtener datos del formulario de USUARIOS
                    $nombre = $_POST['nombre'];
                    $telefono = $_POST['telefono'];
                    $correo = $_POST['correo'];
                    $rol = $_POST['rol'];
                    $identificacion = trim($_POST['identificacion']);

                    if($nombre=="" || $identificacion=="" || $telefono=="" || $correo=="" || $rol=="" || $rol==0){
                        
                        echo "campos incompletos";
                        die;
                    }

                    //Validar si el usuario ya existe. $datos recibe un array
                    $datos = $objeto->consultarUsuario($identificacion);


                    //Valida si retorna un usuario, entonces actualiza
                    if(count($datos) > 0)
                    {
                        $msj = "Usuario Actualizado";
                        $resultado = $objeto->actualizarUsuario($nombre,$telefono,$correo,$rol,$identificacion);

                    //Si no retornó un usuario, entonces registra
                    }else if(count($datos) == 0)
                    {
                        $msj = "Usuario Registrado";
                        $resultado = $objeto->registrarUsuario($nombre,$telefono,$correo,$rol,$identificacion);

                    }

                }else if ($operacion == "eliminar") 
                {   
                    $codigoUsuario = $_POST["codigoUsuario"];

                    $msj =  "Usuario eliminado con éxito";

                    $resultado = $objeto->eliminarUsuario($codigoUsuario);
                }else if($operacion == "consultar") 
                {

                    $codigoUsuario = $_POST['codigoUsuario'];

                    if ($codigoUsuario === 'Todos' || $codigoUsuario === 'todos') {

                        $resultado = $objeto->consultarTodoUsuarios();

                    }else{
                        $resultado = $objeto->consultarUnUsuario($codigoUsuario);

                    }
                
                    echo json_encode($resultado);
                    die;


                }

                echo ($resultado)?$msj:"Error";

                
            break;
            case 'Productos':

                if($operacion == "na")
                {

                    
                    // Obtener datos del formulario de PRODUCTOS
                  
                        $codigoProducto = $_POST['codigoProducto'];
                        $nombre = $_POST['nombre'];
                        $marca = $_POST['marca'];
                        $tipoProducto = $_POST['tipoProducto'];
                        $origenProducto = $_POST['origenProducto'];
                        $cantidad = $_POST['cantidad'];
                        $costo = $_POST['costo'];
                        $valorVenta = $_POST['valorVenta'];
                        $fechaFabricacion = $_POST['fechaFabricacion'];
                        $proveedor = $_POST['proveedor'];
                        $garantia = $_POST['garantia'];


                        if($codigoProducto == "" ||
                            $nombre == "" ||
                            $marca == "" ||
                            $tipoProducto == "" ||
                            $origenProducto == "" ||
                            $cantidad == "" ||
                            $costo == "" ||
                            $valorVenta == "" ||
                            $fechaFabricacion == "" ||
                            $proveedor == "" ||
                            $garantia == "")
                        {
                            echo "Campos incompletos";
                            die;
                        }


                    $datos = $objeto2->consultarProducto($codigoProducto);



                    if(count($datos) > 0)
                    {
                        $msj = "producto actualizado con exito";
                        $resultado = $objeto2->actualizarProducto($nombre,$marca,$tipoProducto,$origenProducto,$cantidad,$costo,$valorVenta,$fechaFabricacion,$proveedor,$garantia,$codigoProducto);


                    }else if(count($datos) == 0)
                    {
                        $msj = "producto registrado con exito";
                        $resultado = $objeto2->registrarProducto($nombre,$marca,$tipoProducto,$origenProducto,$cantidad,$costo,$valorVenta,$fechaFabricacion,$proveedor,$garantia);

                    }

                }else if ($operacion == "eliminar")
                {   
                    $codigoProducto = $_POST['codigoProducto'];

                    $msj =  "Producto eliminado exitosamente";


                    $resultado = $objeto2->eliminarProducto($codigoProducto);
                }else if($operacion == "consultar")
                {

                    $codigoProducto = $_POST['codigoProducto'];

                    if ($codigoProducto === 'Todos' || $codigoProducto === 'todos') {

                        $resultado = $objeto2->consultarTodoProductos();

                    }else{
                        $resultado = $objeto2->consultarUnProducto($codigoProducto);

                    }
                
                    echo json_encode($resultado);
                    die;


                }

                echo ($resultado)?trim($msj):"Error";

            
            break;

            case 'Login':

                $correo = $_POST['correo'];
                $contrasena = $_POST['contrasena'];


                $resultado = $objeto->login($correo, $contrasena);
                if($resultado == 1)
                {
                    echo "ok";
                }else{
                    echo "error";
                }

            break;
                
    }
}




?>