<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$database = "olgalt";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$codigoProducto = $_POST['codigo'];
$usuario = $_POST['usuario'];


$sql = "DELETE FROM productos_agregados WHERE codigo_producto='$codigoProducto' AND usuario_id='$usuario'";


if ($conn->query($sql) === TRUE) {
    echo "ok";
} else {
    echo "Error" . $conn->error;
}

$conn->close();
?>