<?php
ob_start();
session_start();
include("con_db.php");

// 1. SEGURIDAD: Verificar que exista sesión
if (empty($_SESSION["num_emp"])) {
    header("location: pag_index.php");
    exit();
}

$admin_actual = $_SESSION["num_emp"];

// Verificar que sea administrador
$stmt_rol = $conexion->prepare("SELECT id_administrativo FROM sindicalizadosprueba WHERE num_emp = ?");
$stmt_rol->execute([$admin_actual]);
$rol = $stmt_rol->fetch(PDO::FETCH_OBJ);

if (!$rol || $rol->id_administrativo == 1) {
    header("location: pag_inicio.php");
    exit();
}

// 2. PROCESO DE ELIMINACIÓN
if (!empty($_GET["num_emp"])) {
    $num_emp_eliminar = $_GET["num_emp"];

    // BLOQUEO DE SEGURIDAD: Evitar que el admin se elimine a sí mismo
    if ($num_emp_eliminar == $admin_actual) {
        echo "<script>alert('Acción denegada: No puedes eliminar tu propia cuenta administrativa desde aquí.'); window.history.back();</script>";
        exit();
    }

    // ELIMINACIÓN EN CASCADA

    // 1. Eliminar acceso al sistema (usuariosprueba) — columna FK: num_emp_usuario
    $stmt_usuarios = $conexion->prepare("DELETE FROM usuariosprueba WHERE num_emp_usuario = ?");
    $stmt_usuarios->execute([$num_emp_eliminar]);

    // 2. Eliminar datos socioeconómicos
    $stmt_socio = $conexion->prepare("DELETE FROM socioeconomicoprueba WHERE num_emp_socioeconomico = ?");
    $stmt_socio->execute([$num_emp_eliminar]);

    // 3. Eliminar expediente médico
    $stmt_salud = $conexion->prepare("DELETE FROM saludprueba WHERE num_emp_salud = ?");
    $stmt_salud->execute([$num_emp_eliminar]);

    // 4. Eliminar contactos de emergencia
    $stmt_contacto = $conexion->prepare("DELETE FROM contactoemergenciaprueba WHERE num_emp_contacto = ?");
    $stmt_contacto->execute([$num_emp_eliminar]);

    // 5. Finalmente, eliminar de la tabla principal
    $stmt = $conexion->prepare("DELETE FROM sindicalizadosprueba WHERE num_emp = ?");
    $ok = $stmt->execute([$num_emp_eliminar]);

    if ($ok) {
        echo "<script>alert('Socio y todos sus expedientes vinculados fueron eliminados correctamente.'); window.location='pag_consultas.php';</script>";
    } else {
        echo "<div style='color:red; text-align:center;'>Error al eliminar: " . $conexion->errorInfo()[2] . "</div>";
    }
} else {
    header("location: pag_consultas.php");
}

ob_end_flush();
?>
