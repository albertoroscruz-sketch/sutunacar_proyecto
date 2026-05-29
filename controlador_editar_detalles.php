<?php

include_once("con_db.php");

if (!empty($_POST['btneditardetalles'])) {

    $num_emp = $_SESSION["num_emp"];

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
        "UPDATE socioeconomicoprueba SET
            vivienda_socioeconomico     = ?,
            material_socioeconomico     = ?,
            niveles_socioeconomico      = ?,
            dependientes_socioeconomico = ?
         WHERE num_emp_socioeconomico   = ?"
    );
    $ok1 = $stmt1->execute([$vivienda_socioeconomico, $material_socioeconomico, $niveles_socioeconomico, $dependientes_socioeconomico, $num_emp]);

    $stmt2 = $conexion->prepare(
        "UPDATE contactoemergenciaprueba SET
            nombre_contacto    = ?,
            parentesco         = ?,
            telefono_contacto  = ?,
            correo_contacto    = ?,
            direccion_contacto = ?
         WHERE num_emp_contacto = ?"
    );
    $ok2 = $stmt2->execute([$nombre_contacto, $parentesco, $telefono_contacto, $correo_contacto, $direccion_contacto, $num_emp]);

    $stmt3 = $conexion->prepare(
        "UPDATE saludprueba SET
            nss_salud          = ?,
            alergias_salud     = ?,
            tipo_sangre_salud  = ?,
            enfermedades_salud = ?
         WHERE num_emp_salud   = ?"
    );
    $ok3 = $stmt3->execute([$nss_salud, $alergias_salud, $tipo_sangre_salud, $enfermedades_salud, $num_emp]);

    if ($ok1 && $ok2 && $ok3) {
        header("refresh:2; url=pag_index.php");
        echo "<div class='si_se_pudo' style='color:green;'>CAMBIOS GUARDADOS CORRECTAMENTE!</div>";
        exit();
    } else {
        echo "<div class='div_error' style='color:red;'>ERROR EN LA BASE DE DATOS: " . $conexion->errorInfo()[2] . "</div>";
    }
}
?>
