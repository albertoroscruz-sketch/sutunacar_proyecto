<?php
ob_start();
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include_once("con_db.php");

// Validación de seguridad para evitar que entre vacío
if (empty($_GET["num_emp"])) {
    header("location: pag_consultas.php");
    exit();
}

$num_emp = $_GET["num_emp"];

if ($num_emp == $_SESSION["num_emp"]) {
    echo "<script>alert('Acción denegada: No puedes degradarte a ti mismo.'); window.history.back();</script>";
    exit();
}

$stmt = $conexion->prepare("UPDATE sindicalizadosprueba SET id_administrativo = 1 WHERE num_emp = ?");

if ($stmt->execute([$num_emp])) {
    echo "<script>alert('Usuario regresado a nivel Normal.'); window.location='pag_admin_acciones_sindicalizados.php?num_emp=$num_emp';</script>";
} else {
    echo "<script>alert('Error en la base de datos.'); window.history.back();</script>";
}
exit();
?>