<?php

ob_start();

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include("con_db.php");

if (!empty($_POST['btnagregar'])) {

    $id_administrativo    = $_POST["id_administrativo"];
    $num_emp              = $_POST["num_emp"];
    $curp                 = $_POST["curp"];
    $correo_institucional = $_POST["correo_institucional"];

    // Verificar si el puesto administrativo ya está ocupado (si no es nivel normal)
    if ($id_administrativo > 1) {
        $stmt_puesto = $conexion->prepare(
            "SELECT id_administrativo FROM sindicalizadosprueba WHERE id_administrativo = ?"
        );
        $stmt_puesto->execute([$id_administrativo]);

        if ($stmt_puesto->rowCount() > 0) {
            echo "<div class='div_error' style='color:red;'>ERROR: Ese puesto administrativo ya está ocupado por otra persona.</div>";
            header("refresh:2; url=pag_agregar_sindicalizado.php");
            exit();
        }
    }

    // Verificar duplicado por num_emp
    $stmt_check = $conexion->prepare(
        "SELECT num_emp FROM sindicalizadosprueba WHERE num_emp = ?"
    );
    $stmt_check->execute([$num_emp]);

    if ($stmt_check->rowCount() > 0) {
        echo "<div class='div_error' style='color:red;'>EL SINDICALIZADO YA EXISTE (Verifica el número de empleado)</div>";
        header("refresh:2; url=pag_agregar_sindicalizado.php");
        exit();
    }

    $stmt_insertar = $conexion->prepare(
        "INSERT INTO sindicalizadosprueba
            (id_administrativo, curp, correo_institucional, num_emp, nombres, apellidos, id_area, foto, telefono, correo_personal, fecha_ingreso, comentarios)
         VALUES (?, ?, ?, ?, '', '', '0', '', '', '', NULL, '')"
    );
    $ok = $stmt_insertar->execute([$id_administrativo, $curp, $correo_institucional, $num_emp]);

    if ($ok) {
        echo "<div class='si_se_pudo' style='color:green;'>SINDICALIZADO AGREGADO CORRECTAMENTE!</div>";
        header("refresh:2; url=pag_inicio_admin.php");
        exit();
    } else {
        echo "<div class='div_error' style='color:red;'>ERROR EN LA BASE DE DATOS: " . $conexion->errorInfo()[2] . "</div>";
        header("refresh:2; url=pag_agregar_sindicalizado.php");
        exit();
    }
}
?>
