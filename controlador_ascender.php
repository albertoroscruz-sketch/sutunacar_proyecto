<?php
session_start();
include("con_db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["num_emp"]) && !empty($_POST["nuevo_rol"])) {
    $num_emp = $_POST["num_emp"];
    $nuevo_rol = $_POST["nuevo_rol"];

    $verificar = $conexion->query("SELECT * FROM sindicalizadosprueba WHERE id_administrativo = '$nuevo_rol'");
    if ($verificar->num_rows > 0) {
        echo "<script>alert('Error: Este puesto acaba de ser ocupado por otro administrador.'); window.history.back();</script>";
        exit();
    }

    $stmt = $conexion->prepare("UPDATE sindicalizadosprueba SET id_administrativo = ? WHERE num_emp = ?");
    $stmt->bind_param("is", $nuevo_rol, $num_emp);
    
    if ($stmt->execute()) {
        echo "<script>alert('¡Ascenso realizado con éxito!'); window.location='pag_admin_acciones_sindicalizados.php?num_emp=$num_emp';</script>";
    }
}
?>