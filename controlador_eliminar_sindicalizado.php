<?php
ob_start();
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include_once("con_db.php");

// 1. SEGURIDAD: Verificar que exista sesión y envío de datos
if (empty($_SESSION["num_emp"]) || empty($_GET["num_emp"])) {
    header("location: pag_consultas.php");
    exit();
}

$admin_actual = $_SESSION["num_emp"];
$num_emp_eliminar = $_GET["num_emp"];

// 2. Verificar que sea administrador
$stmt_rol = $conexion->prepare("SELECT id_administrativo FROM sindicalizadosprueba WHERE num_emp = ?");
$stmt_rol->execute([$admin_actual]);
$rol = $stmt_rol->fetch(PDO::FETCH_OBJ);

if (!$rol || $rol->id_administrativo == 1) {
    header("location: pag_inicio.php");
    exit();
}

// 3. BLOQUEO DE SEGURIDAD: Evitar que el admin se elimine a sí mismo
if ($num_emp_eliminar == $admin_actual) {
    echo "<script>alert('Acción denegada: No puedes eliminar tu propia cuenta administrativa desde aquí.'); window.history.back();</script>";
    exit();
}

// 4. ELIMINACIÓN EN CASCADA
try {
    $conexion->beginTransaction();

    $stmt1 = $conexion->prepare("DELETE FROM usuariosprueba WHERE num_emp_usuario = ?");
    $stmt1->execute([$num_emp_eliminar]);

    $stmt2 = $conexion->prepare("DELETE FROM socioeconomicoprueba WHERE num_emp_socioeconomico = ?");
    $stmt2->execute([$num_emp_eliminar]);

    $stmt3 = $conexion->prepare("DELETE FROM saludprueba WHERE num_emp_salud = ?");
    $stmt3->execute([$num_emp_eliminar]);

    $stmt4 = $conexion->prepare("DELETE FROM contactoemergenciaprueba WHERE num_emp_contacto = ?");
    $stmt4->execute([$num_emp_eliminar]);

    $stmt5 = $conexion->prepare("DELETE FROM sindicalizadosprueba WHERE num_emp = ?");
    $stmt5->execute([$num_emp_eliminar]);

    $conexion->commit();
    echo "<script>alert('Socio y todos sus expedientes vinculados fueron eliminados correctamente.'); window.location='pag_consultas.php';</script>";

} catch (Exception $e) {
    $conexion->rollBack();
    echo "<script>alert('Error al eliminar en la base de datos.'); window.history.back();</script>";
}
exit();
?>