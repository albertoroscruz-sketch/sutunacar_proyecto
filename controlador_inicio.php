<?php
include("con_db.php");

if (empty($_SESSION["curp_inicio"])) 
    {
        header("location: pag_index.php");
        exit();
    }

$curp = $_SESSION["curp_inicio"];
$consulta = $conexion->query("SELECT * FROM sindicalizadosprueba WHERE curp = '$curp'");
$datos = $consulta->fetch_object();
if (!$datos) 
    {
        echo "Error: No se encontraron datos para la CURP: " . $curp;
        exit();
    }
?>