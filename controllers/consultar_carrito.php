<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$database = "olgalt";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$usuario_id = $_POST['usuario_id'];

$sql = "SELECT Nombre,ValorVenta,CodigoProducto
FROM productos_agregados AS pa
INNER JOIN productos AS pr
ON pr.CodigoProducto= pa.codigo_producto 
WHERE usuario_id='$usuario_id'";

$result = $conn->query($sql);


if ($result) {
    $productDetails = array();

    while ($row = $result->fetch_assoc()) {
        $productDetails[] = $row;
    }

    echo json_encode($productDetails);
} else {
    echo "Error" . $conn->error;
}

$conn->close();
?>