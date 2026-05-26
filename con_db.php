<?php


$conexion = mysqli_connect("localhost", "root", "", "iniciarsesionprimeraprueba");

if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}

$conexion->set_charset("utf8mb4");

?>
