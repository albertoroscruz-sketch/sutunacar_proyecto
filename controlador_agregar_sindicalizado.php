<?php
// CONTROLADOR LIMPIO: La vista se encarga de las cabeceras
include_once("con_db.php");

if (!empty($_POST['btnagregar'])) {

    $id_administrativo    = $_POST["id_administrativo"];
    $num_emp              = $_POST["num_emp"];
    $curp                 = $_POST["curp"];
    $correo_institucional = $_POST["correo_institucional"];

    if ($id_administrativo > 1) {
        $stmt_puesto = $conexion->prepare("SELECT id_administrativo FROM sindicalizadosprueba WHERE id_administrativo = ?");
        $stmt_puesto->execute([$id_administrativo]);

        if ($stmt_puesto->rowCount() > 0) {
            header("refresh:2; url=pag_agregar_sindicalizado.php");
            echo "<div class='div_error' style='color:red; text-align:center; font-weight:bold; margin-bottom:15px;'>ERROR: Ese puesto administrativo ya está ocupado por otra persona.</div>";
            exit();
        }
    }

    $stmt_check = $conexion->prepare("SELECT num_emp FROM sindicalizadosprueba WHERE num_emp = ?");
    $stmt_check->execute([$num_emp]);

    if ($stmt_check->rowCount() > 0) {
        header("refresh:2; url=pag_agregar_sindicalizado.php");
        echo "<div class='div_error' style='color:red; text-align:center; font-weight:bold; margin-bottom:15px;'>EL SINDICALIZADO YA EXISTE (Verifica el número de empleado)</div>";
        exit();
    }

    $stmt_insertar = $conexion->prepare(
        "INSERT INTO sindicalizadosprueba
            (id_administrativo, curp, correo_institucional, num_emp, nombres, apellidos, id_area, foto, telefono, correo_personal, fecha_ingreso, comentarios)
         VALUES (?, ?, ?, ?, '', '', '0', '', '', '', NULL, '')"
    );
    $ok = $stmt_insertar->execute([$id_administrativo, $curp, $correo_institucional, $num_emp]);

    if ($ok) {
        header("refresh:2; url=pag_inicio_admin.php");
        echo "<div class='si_se_pudo' style='color:green; text-align:center; font-weight:bold; margin-bottom:15px;'>SINDICALIZADO AGREGADO CORRECTAMENTE!</div>";
        exit();
    } else {
        header("refresh:2; url=pag_agregar_sindicalizado.php");
        echo "<div class='div_error' style='color:red; text-align:center; font-weight:bold; margin-bottom:15px;'>ERROR EN LA BASE DE DATOS</div>";
        exit();
    }
}
?>