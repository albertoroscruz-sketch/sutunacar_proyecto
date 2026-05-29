<?php
ob_start();
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include_once("con_db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["num_emp"]) && !empty($_POST["nuevo_rol"])) {
    $num_emp   = $_POST["num_emp"];
    $nuevo_rol = $_POST["nuevo_rol"];

    $stmt_verificar = $conexion->prepare("SELECT num_emp FROM sindicalizadosprueba WHERE id_administrativo = ?");
    $stmt_verificar->execute([$nuevo_rol]);

    if ($stmt_verificar->rowCount() > 0) {
        echo "<script>alert('Error: Este puesto acaba de ser ocupado por otro administrador.'); window.history.back();</script>";
        exit();
    }

    $stmt = $conexion->prepare("UPDATE sindicalizadosprueba SET id_administrativo = ? WHERE num_emp = ?");

    if ($stmt->execute([$nuevo_rol, $num_emp])) {
        echo "<script>alert('¡Ascenso realizado con éxito!'); window.location='pag_admin_acciones_sindicalizados.php?num_emp=$num_emp';</script>";
    }
}
?>