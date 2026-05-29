<?php
ob_start(); // Vital para proteger el archivo Word
if (empty($_POST['tema_minuta'])) {
    die("Error: No hay datos para previsualizar.");
}

$fecha_bd = $_POST['fecha_reunion_minuta'];
$tema = $_POST['tema_minuta'];
$acuerdos = $_POST['acuerdos_minuta'];
$descripcion = $_POST['descripcion_minuta'];

$meses = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
$dia = date("d", strtotime($fecha_bd));
$mes = $meses[date("n", strtotime($fecha_bd)) - 1]; 
$anio = date("Y", strtotime($fecha_bd));

$fecha_oficial = $dia . " de " . $mes . " de " . $anio;

header("Content-type: application/vnd.ms-word");
header("Content-Disposition: attachment; filename=PREVIEW_Minuta.doc");
header("Pragma: no-cache");
header("Expires: 0");
?>
<html xmlns:o='urn:schemas-microsoft-com:office:office' xmlns:w='urn:schemas-microsoft-com:office:word' xmlns='http://www.w3.org/TR/REC-html40'>
<head>
    <meta charset="utf-8">
</head>
<body style="font-family: Arial, sans-serif;">
    <p style="color: red; text-align: center; font-weight: bold;">
        *** DOCUMENTO DE PREVISUALIZACIÓN - NO OFICIAL ***
    </p>
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
    <p style="text-align: right; font-size: 11pt; margin-top: 0; margin-bottom: 20px;">
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