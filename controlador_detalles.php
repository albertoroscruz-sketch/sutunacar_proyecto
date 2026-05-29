<?php

ob_start();

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include("con_db.php");

if (!empty($_POST['btndetalles'])) {

    $num_emp = $_SESSION["num_emp"];

    $stmt_check = $conexion->prepare(
        "SELECT * FROM socioeconomicoprueba WHERE num_emp_socioeconomico = ?"
    );
    $stmt_check->execute([$num_emp]);

    if ($stmt_check->rowCount() > 0) {
        echo "<div class='div_error' style='color:red;'>ERROR: Ya tienes tus detalles registrados. No puedes volver a insertarlos.</div>";
        header("refresh:2; url=pag_index.php");
        exit();
    }

    $vivienda_socioeconomico     = !empty($_POST["vivienda_socioeconomico"])     ? $_POST["vivienda_socioeconomico"]     : "sin datos";
    $material_socioeconomico     = !empty($_POST["material_socioeconomico"])     ? $_POST["material_socioeconomico"]     : "sin datos";
    // niveles y dependientes son INTEGER en PostgreSQL: se guarda NULL si viene vacío
    $niveles_socioeconomico      = !empty($_POST["niveles_socioeconomico"])      ? (int)$_POST["niveles_socioeconomico"]      : null;
    $dependientes_socioeconomico = !empty($_POST["dependientes_socioeconomico"]) ? (int)$_POST["dependientes_socioeconomico"] : null;

    $nombre_contacto    = $_POST["nombre_contacto"];
    $parentesco         = $_POST["parentesco"];
    $telefono_contacto  = $_POST["telefono_contacto"];
    $correo_contacto    = $_POST["correo_contacto"];
    $direccion_contacto = !empty($_POST["direccion_contacto"]) ? $_POST["direccion_contacto"] : "sin datos";

    $nss_salud          = $_POST["nss_salud"];
    $alergias_salud     = $_POST["alergias_salud"];
    $tipo_sangre_salud  = $_POST["tipo_sangre_salud"];
    $enfermedades_salud = $_POST["enfermedades_salud"];

    $stmt1 = $conexion->prepare(
        "INSERT INTO socioeconomicoprueba (num_emp_socioeconomico, vivienda_socioeconomico, material_socioeconomico, niveles_socioeconomico, dependientes_socioeconomico)
         VALUES (?, ?, ?, ?, ?)"
    );
    $ok1 = $stmt1->execute([$num_emp, $vivienda_socioeconomico, $material_socioeconomico, $niveles_socioeconomico, $dependientes_socioeconomico]);

    $stmt2 = $conexion->prepare(
        "INSERT INTO contactoemergenciaprueba (num_emp_contacto, nombre_contacto, parentesco, telefono_contacto, correo_contacto, direccion_contacto)
         VALUES (?, ?, ?, ?, ?, ?)"
    );
    $ok2 = $stmt2->execute([$num_emp, $nombre_contacto, $parentesco, $telefono_contacto, $correo_contacto, $direccion_contacto]);

    $stmt3 = $conexion->prepare(
        "INSERT INTO saludprueba (num_emp_salud, nss_salud, alergias_salud, tipo_sangre_salud, enfermedades_salud)
         VALUES (?, ?, ?, ?, ?)"
    );
    $ok3 = $stmt3->execute([$num_emp, $nss_salud, $alergias_salud, $tipo_sangre_salud, $enfermedades_salud]);

    if ($ok1 && $ok2 && $ok3) {
        header("refresh:2; url=pag_index.php");
        echo "<div class='si_se_pudo' style='color:green;'>DATOS GUARDADOS CORRECTAMENTE</div>";
    } else {
        echo "<div class='div_error' style='color:red;'>ERROR EN LA BASE DE DATOS: " . $conexion->errorInfo()[2] . "</div>";
    }
}
?>
