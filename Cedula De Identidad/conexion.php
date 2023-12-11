<?php

$db_host = "localhost";
$db_name = "registros para cedulas";
$db_user = "root";
$db_pass = "";

$conexion = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if(!$conexion){
    die("Conexion fallida: ". mysqli_connect_error());
}

?>