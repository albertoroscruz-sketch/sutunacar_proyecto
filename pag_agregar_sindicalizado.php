<?php
session_start();
include("controlador_inicio.php");
include("controlador_consultas.php");

if (empty($_SESSION["num_emp"])) {
    header("location: pag_index.php");
    exit();
}

$num_emp_actual = $_SESSION["num_emp"];

$stmt = $conexion->prepare("SELECT id_administrativo FROM sindicalizadosprueba WHERE num_emp = ?");
$stmt->execute([$num_emp_actual]);
$datos_administrativos = $stmt->fetch(PDO::FETCH_OBJ);

if ($datos_administrativos->id_administrativo == 1) {
    header("location: pag_index.php");
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
            <h2>Agregar Sindicalizado</h2>
        </div>

        <?php include("controlador_agregar_sindicalizado.php"); ?>

        <div class="profile-content profile-content--block">
            <form method="POST" enctype="multipart/form-data">
                <table class="profile-table">
                    <tbody>
                        <tr>
                            <td class="profile-label">Tipo sindicalizado:</td>
                            <td class="profile-value cell-input">
                                <select name="id_administrativo" required>
                                    <option value="" disabled selected>Selecciona el tipo de sindicalizado:</option>
                                    <option value="1">Sindicalizado</option>
                                    <option value="2">Secretario General</option>
                                    <option value="3">Secretario de Organización</option>
                                    <option value="4">Secretario de Trabajo y Conflictos</option>
                                    <option value="5">Secretario de Finanzas</option>
                                    <option value="6">Secretario de Pensiones, Jubilaciones y Previsión Social</option>
                                    <option value="7">Secretario de Actas y Acuerdos</option>
                                    <option value="8">Secretario de Orientación Ideológica Sindical</option>
                                    <option value="9">Secretario de Acción Social y Deportes</option>
                                    <option value="10">Secretario del Exterior</option>
                                    <option value="11">Secretario de Prensa y Propaganda</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td class="profile-label">No. empleado:</td>
                            <td class="profile-value" style="padding: 15px;">
                                <input type="number" name="num_emp" placeholder="Número de empleado del nuevo sindicalizado" required style="width: 100%; border: none; outline: none; background: transparent; font-family: inherit;">
                            </td>
                        </tr>
                        <tr>
                            <td class="profile-label">CURP:</td>
                            <td class="profile-value" style="padding: 15px;">
                                <input type="text" name="curp" placeholder="CURP del nuevo sindicalizado" required style="width: 100%; border: none; outline: none; background: transparent; font-family: inherit;">
                            </td>
                        </tr>
                        <tr>
                            <td class="profile-label">Correo institucional:</td>
                            <td class="profile-value" style="padding: 15px;">
                                <input type="email" id="correo_institucional" name="correo_institucional" placeholder="Correo electrónico institucional" required style="width: 100%; border: none; outline: none; background: transparent; font-family: inherit;">
                            </td>
                        </tr>
                    </tbody>
                </table>

                <div class="profile-actions">
                    <input type="submit" name="btnagregar" value="Agregar sindicalizado" class="btn-nav">
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
