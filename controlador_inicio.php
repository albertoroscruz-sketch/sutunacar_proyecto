<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include("con_db.php");

if (empty($_SESSION["num_emp"])) {
    header("location: pag_index.php");
    exit();
}

$num_emp = $_SESSION["num_emp"];

$stmt = $conexion->prepare("SELECT * FROM sindicalizadosprueba WHERE num_emp = ?");
$stmt->bind_param("s", $num_emp);
$stmt->execute();
$resultado = $stmt->get_result();
$datos = $resultado->fetch_object();
$stmt->close();

if (!$datos) {
    echo "Error: No se encontraron datos para el número de empleado: " . htmlspecialchars($num_emp);
    exit();
}
?>
