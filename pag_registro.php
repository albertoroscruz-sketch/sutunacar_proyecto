<?php

session_start();

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
                            <td class="profile-label">Usuario:</td>
                            <td class="profile-value cell-input">
                                <input type="text" name="nombre_usuario" placeholder="Crea un nombre de usuario" required>
                            </td>
                        </tr>
                        <tr>
                            <td class="profile-label">Contraseña:</td>
                            <td class="profile-value cell-input">
                                <input type="password" name="contraseña" placeholder="Crea tu contraseña" required>
                            </td>
                        </tr>
                        <tr>
                            <td class="profile-label">Nombre(s):</td>
                            <td class="profile-value cell-input">
                                <!-- CORREGIDO: id="nombres" (antes era id="nombre" duplicado) -->
                                <input type="text" id="nombres" name="nombres" placeholder="Ingresa tu/s nombres" required>
                            </td>
                        </tr>
                        <tr>
                            <td class="profile-label">Apellidos:</td>
                            <td class="profile-value cell-input">
                                <!-- CORREGIDO: id="apellidos" (antes era id="nombre" duplicado) -->
                                <input type="text" id="apellidos" name="apellidos" placeholder="Ingresa tus apellidos" required>
                            </td>
                        </tr>
                        <tr>
                            <td class="profile-label">Correo Personal:</td>
                            <td class="profile-value cell-input">
                                <input type="email" id="correo" name="correo_personal" placeholder="Correo electrónico personal" required>
                            </td>
                        </tr>
                        <tr>
                            <td class="profile-label">Teléfono:</td>
                            <td class="profile-value cell-input">
                                <input type="number" id="telefono" name="telefono" placeholder="Teléfono" required>
                            </td>
                        </tr>
                        <tr>
                            <td class="profile-label">Área:</td>
                            <td class="profile-value cell-input">
                                <select name="id_area" required>
                                    <option value="" disabled selected>Selecciona tu Área</option>
                                    <option value="1">Derecho</option>
                                    <option value="2">Ciencias Económicas Administrativas</option>
                                    <option value="3">Química</option>
                                    <option value="4">Ciencias Educativas</option>
                                    <option value="5">Ciencias De La Información</option>
                                    <option value="6">Ingeniería</option>
                                    <option value="7">Salud</option>
                                    <option value="8">Ciencias Naturales y Exactas</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td class="profile-label">Fecha de ingreso al sindicato:</td>
                            <td class="profile-value" style="padding: 15px;">
                                <input type="date" id="fecha_ingreso" name="fecha_ingreso">
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
