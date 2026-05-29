<?php
ob_start();
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (empty($_SESSION["num_emp"])) {
    header("location: pag_validar_trabajador.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SUTUNACAR - Registro</title>
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

<main class="main-centrado">

    <section class="profile-section profile-section--form">
        <div class="profile-header">
            <i class="fas fa-user-edit"></i>
            <h2>Registro de Datos</h2>
        </div>

        <div class="profile-content profile-content--block">

            <div class="alerta-mensajes">
                <?php include("controlador_registro.php"); ?>
            </div>

            <form method="POST" enctype="multipart/form-data">
                <table class="profile-table">
                    <tbody>
                        <tr>
                            <td class="profile-label">Nombre de usuario:</td>
                            <td class="profile-value">
                                <input type="text" name="nombre_usuario" required placeholder="Crea un usuario para el sistema"
                                       style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
                            </td>
                        </tr>
                        <tr>
                            <td class="profile-label">Contraseña:</td>
                            <td class="profile-value">
                                <input type="password" name="contraseña" required placeholder="Crea tu contraseña"
                                       style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
                            </td>
                        </tr>
                        <tr>
                            <td class="profile-label">Nombres:</td>
                            <td class="profile-value">
                                <input type="text" name="nombres" required placeholder="Ej. Juan Pérez"
                                       style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
                            </td>
                        </tr>
                        <tr>
                            <td class="profile-label">Apellidos:</td>
                            <td class="profile-value">
                                <input type="text" name="apellidos" required placeholder="Ej. López Gómez"
                                       style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
                            </td>
                        </tr>
                        <tr>
                            <td class="profile-label">Correo personal:</td>
                            <td class="profile-value">
                                <input type="email" name="correo_personal" required placeholder="Ej. correo@gmail.com"
                                       style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
                            </td>
                        </tr>
                        <tr>
                            <td class="profile-label">Teléfono:</td>
                            <td class="profile-value">
                                <input type="tel" name="telefono" required placeholder="Ej. 9381234567"
                                       style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
                            </td>
                        </tr>
                        <tr>
                            <td class="profile-label">Área:</td>
                            <td class="profile-value">
                                <select name="id_area" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
                                    <option value="" disabled selected>Selecciona tu área</option>
                                    <?php
                                    include_once("con_db.php");
                                    $stmt_areas = $conexion->query("SELECT id_area, nombre_area FROM areasprueba");
                                    while ($area = $stmt_areas->fetch(PDO::FETCH_OBJ)) {
                                        echo "<option value='{$area->id_area}'>{$area->nombre_area}</option>";
                                    }
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td class="profile-label">Fecha de Ingreso:</td>
                            <td class="profile-value">
                                <input type="date" name="fecha_ingreso" required
                                       style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
                            </td>
                        </tr>
                        <tr>
                            <td class="profile-label">Foto de perfil:</td>
                            <td class="profile-value" style="padding: 15px;">
                                <input type="file" name="foto" accept="image/*">
                            </td>
                        </tr>
                    </tbody>
                </table>

                <div class="profile-actions">
                    <a href="pag_index.php" class="btn-back">
                        <i class="fas fa-arrow-left"></i> Regresar
                    </a>
                    <button type="submit" name="btnregistro" value="subir los datos" class="btn-enviar">
                        Subir los datos <i class="fas fa-cloud-upload-alt"></i>
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