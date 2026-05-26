<?php
ob_start();

if (session_status() === PHP_SESSION_NONE) 
    {
    session_start();
    }

include("con_db.php");

if (!empty($_POST['btnregistro'])) {

    $nombre_usuario   = $_POST["nombre_usuario"];
    $contraseña       = password_hash($_POST["contraseña"], PASSWORD_DEFAULT);

    $num_emp          = $_SESSION["num_emp"];
    $nombres          = $_POST["nombres"];
    $apellidos        = $_POST["apellidos"];
    $correo_personal  = $_POST["correo_personal"];
    $telefono         = $_POST["telefono"];
    $id_area          = $_POST["id_area"];
    $fecha_ingreso    = $_POST["fecha_ingreso"];

    $nombre_foto      = $_FILES['foto']['name'];
    $ruta_temporal    = $_FILES['foto']['tmp_name'];
    $carpeta          = "fotos/";
    $foto_para_guardar = "";

    if (!empty($nombre_foto)) 
        {
        $ruta_final = $carpeta . basename($nombre_foto);
            if (move_uploaded_file($ruta_temporal, $ruta_final)) 
                {
                $foto_para_guardar = basename($nombre_foto);
                } 
            else 
                {
                echo "<div style='color:red;'>ERROR: No se pudo mover la foto, pero el registro continúa.</div>";
                }
    }

    $stmt_update = $conexion->prepare(
        "UPDATE sindicalizadosprueba SET
            nombres          = ?,
            apellidos        = ?,
            correo_personal  = ?,
            telefono         = ?,
            id_area          = ?,
            foto             = ?
        WHERE num_emp = ?"
    );
    $stmt_update->bind_param("sssssss", $nombres, $apellidos, $correo_personal, $telefono, $id_area, $foto_para_guardar, $num_emp);
    $ok_update = $stmt_update->execute();
    $stmt_update->close();

    $stmt_insert = $conexion->prepare(
        "INSERT INTO usuariosprueba (nombre_usuario, contraseña, num_emp_usuario)
         VALUES (?, ?, ?)"
    );
    $stmt_insert->bind_param("sss", $nombre_usuario, $contraseña, $num_emp);
    $ok_insert = $stmt_insert->execute();
    $stmt_insert->close();

    if ($ok_update && $ok_insert) {
        unset($_SESSION["num_emp"]);
        header("refresh:2; url=pag_index.php");
        echo "<div class='si_se_pudo' style='color:green;'>¡DATOS GUARDADOS CORRECTAMENTE!</div>";
    } else {
        echo "<div class='div_error' style='color:red;'>ERROR EN LA BASE DE DATOS: " . $conexion->error . "</div>";
    }
}
?>
