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
        $_SESSION["usuario"]="";
        session_destroy();
        header("Location:../login.php");
    
   


$conn->close();


?>
