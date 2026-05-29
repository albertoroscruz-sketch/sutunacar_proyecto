<?php
ob_start();
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include_once("controlador_inicio.php");

$num_emp_actual = $_SESSION["num_emp"];

$stmt_existencia = $conexion->prepare("SELECT num_emp_socioeconomico FROM socioeconomicoprueba WHERE num_emp_socioeconomico = ?");
$stmt_existencia->execute([$num_emp_actual]);

// Si ya tiene detalles, lo regresamos a su inicio correspondiente (en lugar del index)
if ($stmt_existencia->rowCount() > 0) {
    $stmt_rol = $conexion->prepare("SELECT id_administrativo FROM sindicalizadosprueba WHERE num_emp = ?");
    $stmt_rol->execute([$num_emp_actual]);
    $resultado_rol = $stmt_rol->fetch(PDO::FETCH_OBJ);

    if ($resultado_rol && $resultado_rol->id_administrativo == 1) {
        header("location: pag_inicio.php");
    } else {
        header("location: pag_inicio_admin.php");
    }
    exit();
}

// Si no tiene, definimos sus rutas de retorno
$stmt_rol_init = $conexion->prepare("SELECT id_administrativo FROM sindicalizadosprueba WHERE num_emp = ?");
$stmt_rol_init->execute([$num_emp_actual]);
$resultado_rol_init = $stmt_rol_init->fetch(PDO::FETCH_OBJ);

if ($resultado_rol_init && $resultado_rol_init->id_administrativo == 1) {
    $ruta_inicio = "pag_inicio.php";
} else {
    $ruta_inicio = "pag_inicio_admin.php";
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



    <main style="flex: 1; display: flex; justify-content: center; align-items: center; padding: 40px 20px;">
    
    <section class="profile-section" style="width: 100%; max-width: 800px;">
        <div class="profile-header">
            <i class="fas fa-user-edit"></i>
            <h2>Detalles</h2>
        </div>
<?php
include("controlador_detalles.php");
?>

<div class="profile-content" style="display: block; padding: 30px;">
<form method="POST" enctype="multipart/form-data">
            <table class="tabla-form" style="text-align:center;">
                <tbody>

                <h3 style="color: var(--blue-brand); border-bottom: 2px solid #eee; padding-bottom: 10px; margin-bottom: 20px;">
                     Detalles socioeconómico
                </h3>

                <table class="profile-table" style="width: 100%; border-collapse: collapse; margin-bottom: 30px;">
                <tr>
                    <td class="profile-label" style="width: 30%;">Dirección de tu vivienda:</td>
                    <td class="profile-value" style="padding: 0;">
                        <input type="text" name="vivienda_socioeconomico" placeholder="Ingresa la direccion de tu vivienda" style="width: 100%; border: none; padding: 12px; outline: none; background: transparent; font-family: inherit;" >
                    </td>
                </tr>

                <tr>
                    <td class="profile-label" style="width: 30%;">Material de tu vivienda:</td>
                        <td class="profile-value" style="padding: 0;">
                        <input type="text" name="material_socioeconomico" placeholder="Ingresa el material de tu vivienda" style="width: 100%; border: none; padding: 12px; outline: none; background: transparent; font-family: inherit;" >
                    </td>
                </tr>

                <tr>
                    <td class="profile-label" style="width: 30%;">Niveles de tu vivienda:</td>
                    <td class="profile-value" style="padding: 0;">
                        <input type="number" name="niveles_socioeconomico" placeholder="Ingresa cuantos niveles tiene tu vivienda" style="width: 100%; border: none; padding: 12px; outline: none; background: transparent; font-family: inherit;" >
                    </td>
                </tr>

                <tr>
                    <td class="profile-label" style="width: 30%;">Personas que dependen economicamente de ti:</td>
                        <td class="profile-value" style="padding: 0;">
                        <input type="number" name="dependientes_socioeconomico" placeholder="Ingrese cuantas personas dependen de usted" style="width: 100%; border: none; padding: 12px; outline: none; background: transparent; font-family: inherit;" >
                    </td>
                </tr>

            </table>

            <h3 style="color: var(--blue-brand); border-bottom: 2px solid #eee; padding-bottom: 10px; margin-bottom: 20px;">
                        Detalles Contacto de emergencia
                    </h3>
                <table class="profile-table" style="width: 100%; border-collapse: collapse;">

                <tr>
                    <td class="profile-label" style="width: 30%;">Nombre:</td>
                    <td class="profile-value" style="padding: 0;">
                        <input type="text" name="nombre_contacto" placeholder="Ingrese el nombre del contacto de emergencia" required style="width: 100%; border: none; padding: 12px; outline: none; background: transparent; font-family: inherit;" >
                    </td>
                </tr>

                <tr>
                    <td class="profile-label" style="width: 30%;">Parentesco:</td>
                        <td class="profile-value" style="padding: 0;">
                        <input type="text" name="parentesco" placeholder="Ingrese el parentesco de tu contacto" required style="width: 100%; border: none; padding: 12px; outline: none; background: transparent; font-family: inherit;" >
                    </td>
                </tr>

                <tr>
                    <td class="profile-label" style="width: 30%;">Teléfono:</td>
                        <td class="profile-value" style="padding: 0;">
                        <input type="text" name="telefono_contacto" placeholder="Ingresa el telefono de tu contacto" required style="width: 100%; border: none; padding: 12px; outline: none; background: transparent; font-family: inherit;" >
                    </td>
                </tr>

                <tr>
                    <td class="profile-label" style="width: 30%;">Correo:</td>
                        <td class="profile-value" style="padding: 0;">
                        <input type="email" name="correo_contacto" placeholder="Ingresa el correo electronico de tu contacto" required style="width: 100%; border: none; padding: 12px; outline: none; background: transparent; font-family: inherit;" >
                    </td>
                </tr>

                <tr>
                    <td class="profile-label" style="width: 30%;">Dirección:</td>
                        <td class="profile-value" style="padding: 0;">
                        <input type="text" name="direccion_contacto" placeholder="Ingrese la direccion de tu contacto" style="width: 100%; border: none; padding: 12px; outline: none; background: transparent; font-family: inherit;" >
                    </td>
                </tr>
                </table>

                <h3 style="color: var(--blue-brand); border-bottom: 2px solid #eee; padding-bottom: 10px; margin-bottom: 20px;">
                        Detalles salud
                    </h3>
                <table class="profile-table" style="width: 100%; border-collapse: collapse;">
                
                <tr>
                    <td class="profile-label" style="width: 30%;">Número de seguro social:</td>
                    <td class="profile-value" style="padding: 0;">
                        <input type="text" name="nss_salud" placeholder="Ingrese su numero de seguro social" required style="width: 100%; border: none; padding: 12px; outline: none; background: transparent; font-family: inherit;" >
                    </td>
                </tr>

                <tr>
                    <td class="profile-label" style="width: 30%;">Alergias:</td>
                    <td class="profile-value" style="padding: 0;">
                        <input type="text" name="alergias_salud" placeholder="Ingrese sus alergias" required style="width: 100%; border: none; padding: 12px; outline: none; background: transparent; font-family: inherit;" >
                    </td>
                </tr>

                <tr>
                    <td class="profile-label" style="width: 30%;">Tipo de sangre:</td>
                        <td class="profile-value" style="padding: 0;">
                        <input type="text" name="tipo_sangre_salud" placeholder="Ingrese su tipo de sangre" required style="width: 100%; border: none; padding: 12px; outline: none; background: transparent; font-family: inherit;" >
                    </td>
                </tr>

                <tr>
                    <td class="profile-label" style="width: 30%;">Sus enfermedades:</td>
                        <td class="profile-value" style="padding: 0;">
                        <input type="text" name="enfermedades_salud" placeholder="Ingrese sus enfermedades" required style="width: 100%; border: none; padding: 12px; outline: none; background: transparent; font-family: inherit;" >
                    </td>
                </tr>

            </tbody>
        </table>
    <div class="btn-back" style="border-top: 1px solid #eee; margin-top: 40px; padding-top: 20px; display: flex; justify-content: center; gap: 20px;">
    <input type="submit" name="btndetalles" value="subir los datos" class="btn-enviar" style="background: var(--blue-brand); color: white; border: none; padding: 12px 25px; border-radius: 5px; font-weight: bold; cursor: pointer; display: flex; align-items: center; gap: 8px; transition: 0.3s;">
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