<?php

ob_start();

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include("con_db.php");

if (!empty($_POST['btnsubirminuta'])) {

    $tema_minuta          = $_POST["tema_minuta"];
    $fecha_reunion_minuta = $_POST["fecha_reunion_minuta"];
    $acuerdos_minuta      = $_POST["acuerdos_minuta"];
    $descripcion_minuta   = $_POST["descripcion_minuta"];

    // id_minuta es SERIAL en PostgreSQL — se usa DEFAULT en lugar de ''
    $stmt = $conexion->prepare(
        "INSERT INTO minutasprueba (id_minuta, fecha_reunion_minuta, tema_minuta, acuerdos_minuta, descripcion_minuta)
         VALUES (DEFAULT, ?, ?, ?, ?)"
    );
    $ok = $stmt->execute([$fecha_reunion_minuta, $tema_minuta, $acuerdos_minuta, $descripcion_minuta]);

    if ($ok) {
        header("refresh:2; url=pag_consultas_minutas.php");
        echo "<div class='si_se_pudo' style='color:green;'>MINUTA SUBIDA CORRECTAMENTE!</div>";
    } else {
        echo "<div class='div_error' style='color:red;'>ERROR EN LA BASE DE DATOS: " . $conexion->errorInfo()[2] . "</div>";
    }
}
?>
