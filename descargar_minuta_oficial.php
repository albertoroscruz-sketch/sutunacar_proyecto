<?php
ob_start(); // Vital para que no se corrompa el Word
include_once("con_db.php");

if (empty($_GET['id_minuta'])) {
    die("Error: No se especificó qué minuta descargar.");
}

$id_minuta = $_GET['id_minuta'];

$stmt = $conexion->prepare("SELECT * FROM minutasprueba WHERE id_minuta = ?");
$stmt->execute([$id_minuta]);
$minuta = $stmt->fetch(PDO::FETCH_OBJ);

if (!$minuta) {
    die("Error: La minuta solicitada no existe en el sistema.");
}

$fecha_bd = $minuta->fecha_reunion_minuta;
$tema = $minuta->tema_minuta;
$acuerdos = $minuta->acuerdos_minuta;
$descripcion = $minuta->descripcion_minuta;

$meses = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
$dia = date("d", strtotime($fecha_bd));
$mes = $meses[date("n", strtotime($fecha_bd)) - 1]; 
$anio = date("Y", strtotime($fecha_bd));

$fecha_oficial = $dia . " de " . $mes . " de " . $anio;

$nombre_archivo = "Minuta_Oficial_" . str_replace(' ', '_', $tema) . ".doc";

header("Content-type: application/vnd.ms-word");
header("Content-Disposition: attachment; filename=$nombre_archivo");
header("Pragma: no-cache");
header("Expires: 0");
?>
<html xmlns:o='urn:schemas-microsoft-com:office:office' xmlns:w='urn:schemas-microsoft-com:office:word' xmlns='http://www.w3.org/TR/REC-html40'>
<head>
    <meta charset="utf-8">
</head>
<body style="font-family: Arial, sans-serif;">
    <table style="width: 100%; border-collapse: collapse; border: none;">
        <tr>
            <td style="width: 20%; text-align: left; vertical-align: middle;">
                <img src="https://sutunacar-proyecto.onrender.com/sutunacar.png" width="90" height="90">
            </td>
            <td style="width: 60%; text-align: center; vertical-align: middle;">
                <h1 style="font-size: 16pt; margin: 0;">SINDICATO SUTUNACAR</h1>
                <h2 style="font-size: 14pt; margin: 0;">MINUTA: <?php echo strtoupper($tema); ?></h2>
            </td>
            <td style="width: 20%; text-align: right; vertical-align: middle;">
                <img src="https://sutunacar-proyecto.onrender.com/escudo_unacar.png" width="90" height="90">
            </td>
        </tr>
    </table>
    <p style="text-align: right; font-size: 11pt; margin-top: 15px; margin-bottom: 20px;">
        Ciudad del Carmen, Campeche, a <?php echo $fecha_oficial; ?>
    </p>
    <hr>
    <h3 style="font-size: 12pt;">Acuerdos Tomados</h3>
    <p style="font-size: 11pt; text-align: justify;">
        <?php echo nl2br($acuerdos); ?>
    </p>
    <h3 style="font-size: 12pt;">Descripción de la Reunión</h3>
    <p style="font-size: 11pt; text-align: justify;">
        <?php echo nl2br($descripcion); ?>
    </p>
    <br><br><br>
    <p style="text-align: center; font-size: 11pt;">
        __________________________________<br>
        <strong>Firma del Secretario de Actas</strong>
    </p>
</body>
</html>