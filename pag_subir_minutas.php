<?php
session_start();
include("controlador_inicio.php");

if (empty($_SESSION["num_emp"])) {
    header("location: pag_inicio.php");
    exit();
}

$num_emp_actual = $_SESSION["num_emp"];
$stmt = $conexion->prepare("SELECT id_administrativo FROM sindicalizadosprueba WHERE num_emp = ?");
$stmt->execute([$num_emp_actual]);
$datos_administrativos = $stmt->fetch(PDO::FETCH_OBJ);

if ($datos_administrativos->id_administrativo == 1) {
    header("location: pag_inicio.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SUTUNACAR</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="estilos.css">
</head>
<body>

<header class="main-header">
    <div class="header-left">
        <img src="sutunacar.png" alt="SUTUNACAR">
        <h1>Sindicato Único de Trabajadores de la<br>Universidad Autónoma del Carmen</h1>
    </div>
    <img src="logo_.png" class="logo-right" alt="Logo UNACAR">
</header>

<div class="barra-navegacion">
    <a href="pag_datos_admin.php" class="btn-nav">
        <i class="fas fa-arrow-left"></i> Regresar
    </a>
</div>

<main>
    <section class="profile-section profile-section--form">
        <div class="profile-header">
            <i class="fas fa-user-edit"></i>
            <h2>Subir Minutas</h2>
        </div>

        <?php include("controlador_subir_minutas.php"); ?>

        <div class="profile-content profile-content--block">
            <!-- CORREGIDO: Un solo <form> y un solo </form> (antes había </form> duplicado al final) -->
            <form method="POST" enctype="multipart/form-data">
                <table class="profile-table">
                    <tbody>
                        <tr>
                            <td class="profile-label">Tema de la minuta:</td>
                            <td class="profile-value" style="padding: 15px;">
                                <input type="text" name="tema_minuta" placeholder="Ingresa el/los tema/s" required style="width:100%; border:none; outline:none; background:transparent; font-family:inherit;">
                            </td>
                        </tr>
                        <tr>
                            <td class="profile-label">Fecha de la reunión:</td>
                            <td class="profile-value" style="padding: 15px;">
                                <input type="date" name="fecha_reunion_minuta" required style="width:100%; border:none; outline:none; background:transparent; font-family:inherit;">
                            </td>
                        </tr>
                        <tr>
                            <td class="profile-label">Acuerdos alcanzados:</td>
                            <td class="profile-value" style="padding: 15px;">
                                <input type="text" name="acuerdos_minuta" placeholder="Ingresa los acuerdos" required style="width:100%; border:none; outline:none; background:transparent; font-family:inherit;">
                            </td>
                        </tr>
                        <tr>
                            <td class="profile-label">Descripción de la reunión:</td>
                            <td class="profile-value" style="padding: 15px;">
                                <input type="text" name="descripcion_minuta" placeholder="Ingresa la descripción" required style="width:100%; border:none; outline:none; background:transparent; font-family:inherit;">
                            </td>
                        </tr>
                    </tbody>
                </table>

                <div class="profile-actions">
                    <input type="submit" name="btnsubirminuta" value="Subir minuta" class="btn-nav">
                    <button type="submit" formaction="descargar_minuta_pre.php" formtarget="_blank" class="btn-nav">
                        Previsualizar Word
                    </button>
                </div>
            </form>
        </div>
    </section>
</main>

<footer class="main-footer">
    <h6>Si tiene problemas para iniciar sesión, por favor contacte con el administrador.</h6>
    <h6>DIRECCIÓN: Av. Concordia #24 entre calle 62 y Av. Periférica Col. Benito Júarez, Ciudad del Carmen, Campeche.</h6>
    <h6>Número de contacto: +52 938 3811018</h6>
    <div style="margin-top: 15px;">
        <a href="https://www.unacar.mx/" style="color: white; margin-right: 20px;">Sitio UNACAR</a>
        <a href="https://www.sutunacar.org/" style="color: white;">Sitio SUTUNACAR</a>
    </div>
</footer>
</body>
</html>
