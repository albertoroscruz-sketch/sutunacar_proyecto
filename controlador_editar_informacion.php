<?php

/*
 * CORREGIDOS:
 * 1. ob_start() para que header() funcione después de echo.
 * 2. Prepared statements en UPDATE sindicalizados y UPDATE usuarios — elimina SQL injection.
 * 3. password_hash en lugar de md5.
 * 4. basename() en el nombre de foto para evitar path traversal.
 */

ob_start();

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include("con_db.php");

if (!empty($_POST['btnactualizar'])) {

    $num_emp          = $_SESSION["num_emp"];
    $nombres          = $_POST["nombres"];
    $apellidos        = $_POST["apellidos"];
    $correo_personal  = $_POST["correo_personal"];
    $telefono         = $_POST["telefono"];
    $id_area          = $_POST["id_area"];
    $nombre_usuario   = $_POST["nombre_usuario"];
    $contraseña_editada = $_POST["contraseña"];
    $fecha_ingreso    = $_POST["fecha_ingreso"];

    $nombre_foto     = isset($_FILES['foto']['name']) ? $_FILES['foto']['name'] : '';
    $ruta_temporal   = isset($_FILES['foto']['tmp_name']) ? $_FILES['foto']['tmp_name'] : '';
    $carpeta         = "fotos/";
    $foto_sql        = "";
    $actualizar_foto = false;

    if (!empty($nombre_foto)) {
        $ruta_final = $carpeta . basename($nombre_foto);
        if (move_uploaded_file($ruta_temporal, $ruta_final)) {
            $foto_sql        = basename($nombre_foto);
            $actualizar_foto = true;
        } else {
            echo "Error: No se pudo actualizar la foto";
        }
    }

    // UPDATE sindicalizados
    if ($actualizar_foto) {
        $stmt1 = $conexion->prepare(
            "UPDATE sindicalizadosprueba SET
                nombres         = ?,
                apellidos       = ?,
                correo_personal = ?,
                telefono        = ?,
                id_area         = ?,
                fecha_ingreso   = ?,
                foto            = ?
            WHERE num_emp = ?"
        );
        $stmt1->bind_param("ssssssss", $nombres, $apellidos, $correo_personal, $telefono, $id_area, $fecha_ingreso, $foto_sql, $num_emp);
    } else {
        $stmt1 = $conexion->prepare(
            "UPDATE sindicalizadosprueba SET
                nombres         = ?,
                apellidos       = ?,
                correo_personal = ?,
                telefono        = ?,
                id_area         = ?,
                fecha_ingreso   = ?
            WHERE num_emp = ?"
        );
        $stmt1->bind_param("sssssss", $nombres, $apellidos, $correo_personal, $telefono, $id_area, $fecha_ingreso, $num_emp);
    }
    $ok1 = $stmt1->execute();
    $stmt1->close();

    // UPDATE usuario — con o sin contraseña
    if (!empty($contraseña_editada)) {
        $contraseña_segura = password_hash($contraseña_editada, PASSWORD_DEFAULT);
        $stmt2 = $conexion->prepare(
            "UPDATE usuariosprueba SET nombre_usuario = ?, contraseña = ? WHERE num_emp_usuario = ?"
        );
        $stmt2->bind_param("sss", $nombre_usuario, $contraseña_segura, $num_emp);
    } else {
        $stmt2 = $conexion->prepare(
            "UPDATE usuariosprueba SET nombre_usuario = ? WHERE num_emp_usuario = ?"
        );
        $stmt2->bind_param("ss", $nombre_usuario, $num_emp);
    }
    $ok2 = $stmt2->execute();
    $stmt2->close();

    if ($ok1 && $ok2) {
        header("refresh:2; url=pag_index.php");
        echo "<div style='color:green;'>DATOS CAMBIADOS CORRECTAMENTE</div>";
    } else {
        echo "<div style='color:red;'>ERROR al cambiar los datos: " . $conexion->error . "</div>";
    }
}
?>
