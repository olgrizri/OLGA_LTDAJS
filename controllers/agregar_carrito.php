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

$usuario_id=4;
$sql = "INSERT INTO productos_agregados (codigo_producto, usuario_id) 
        VALUES ('$codigoProducto', '$usuario_id')";


if ($conn->query($sql) === TRUE) {
    echo "ok";
} else {
    echo "Error" . $conn->error;
}

$conn->close();
?>