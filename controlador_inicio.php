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

// --- AHORA CON PDO (POSTGRESQL) ---
$stmt = $conexion->prepare("SELECT * FROM sindicalizadosprueba WHERE num_emp = ?");
$stmt->execute([$num_emp]);
$datos = $stmt->fetch(PDO::FETCH_OBJ);

if (!$datos) {
    echo "Error: No se encontraron datos.";
}