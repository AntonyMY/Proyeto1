<?php
//Conexion cpon la base de datos
$servername = "localhost";
$username   = "root";
$password   = "";
$db_name    = "bdtrabajo";

$connect    = mysqli_connect($servername, $username, $password, $db_name);

if(mysqli_connect_error()){
    echo "Error al Conectar a la Base de Datos".mysqli_connect_error();
}

?>