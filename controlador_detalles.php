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
    $stmt_check->bind_param("s", $num_emp);
    $stmt_check->execute();
    $stmt_check->store_result();

    if ($stmt_check->num_rows > 0) {
        $stmt_check->close();
        echo "<div class='div_error' style='color:red;'>ERROR: Ya tienes tus detalles registrados. No puedes volver a insertarlos.</div>";
        header("refresh:2; url=pag_index.php");
        exit();
    }
    $stmt_check->close();

    $vivienda_socioeconomico    = !empty($_POST["vivienda_socioeconomico"])    ? $_POST["vivienda_socioeconomico"]    : "sin datos";
    $material_socioeconomico    = !empty($_POST["material_socioeconomico"])    ? $_POST["material_socioeconomico"]    : "sin datos";
    $niveles_socioeconomico     = !empty($_POST["niveles_socioeconomico"])     ? $_POST["niveles_socioeconomico"]     : "sin datos";
    $dependientes_socioeconomico = !empty($_POST["dependientes_socioeconomico"]) ? $_POST["dependientes_socioeconomico"] : "sin datos";

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
    $stmt1->bind_param("sssss", $num_emp, $vivienda_socioeconomico, $material_socioeconomico, $niveles_socioeconomico, $dependientes_socioeconomico);
    $ok1 = $stmt1->execute();
    $stmt1->close();

    $stmt2 = $conexion->prepare(
        "INSERT INTO contactoemergenciaprueba (num_emp_contacto, nombre_contacto, parentesco, telefono_contacto, correo_contacto, direccion_contacto)
         VALUES (?, ?, ?, ?, ?, ?)"
    );
    $stmt2->bind_param("ssssss", $num_emp, $nombre_contacto, $parentesco, $telefono_contacto, $correo_contacto, $direccion_contacto);
    $ok2 = $stmt2->execute();
    $stmt2->close();

    $stmt3 = $conexion->prepare(
        "INSERT INTO saludprueba (num_emp_salud, nss_salud, alergias_salud, tipo_sangre_salud, enfermedades_salud)
         VALUES (?, ?, ?, ?, ?)"
    );
    $stmt3->bind_param("sssss", $num_emp, $nss_salud, $alergias_salud, $tipo_sangre_salud, $enfermedades_salud);
    $ok3 = $stmt3->execute();
    $stmt3->close();

    if ($ok1 && $ok2 && $ok3) {
        header("refresh:2; url=pag_index.php");
        echo "<div class='si_se_pudo' style='color:green;'>DATOS GUARDADOS CORRECTAMENTE</div>";
    } else {
        echo "<div class='div_error' style='color:red;'>ERROR EN LA BASE DE DATOS: " . $conexion->error . "</div>";
    }
}
?>
