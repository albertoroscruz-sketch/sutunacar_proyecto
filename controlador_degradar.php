<?php
session_start();
include("con_db.php");

$num_emp = $_GET["num_emp"];

if ($num_emp == $_SESSION["num_emp"]) {
    echo "<script>alert('Acción denegada: No puedes degradarte a ti mismo.'); window.history.back();</script>";
    exit();
}

$stmt = $conexion->prepare("UPDATE sindicalizadosprueba SET id_administrativo = 1 WHERE num_emp = ?");
$stmt->execute([$num_emp]);

echo "<script>alert('Usuario regresado a nivel Normal.'); window.location='pag_admin_acciones_sindicalizados.php?num_emp=$num_emp';</script>";
?>
