<?php
include_once("con_db.php");

// 1. Verificamos si existe la variable de sesión
if (empty($_SESSION["num_emp"])) {
    header("location: index.php");
    exit();
}

$num_emp = $_SESSION["num_emp"];

// 2. Extraemos los datos del trabajador con PDO (PostgreSQL)
$stmt = $conexion->prepare("SELECT * FROM sindicalizadosprueba WHERE num_emp = ?");
$stmt->execute([$num_emp]);
$datos = $stmt->fetch(PDO::FETCH_OBJ);

// 3. Si por alguna razón el usuario fue borrado de la BD pero su sesión sigue viva, lo expulsamos
if (!$datos) {
    unset($_SESSION["num_emp"]);
    header("location: index.php");
    exit();
}
?>