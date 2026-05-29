<?php

session_start();
include("con_db.php");
if(empty($_SESSION["num_emp"])) {
    echo "ERROR: Sesión no iniciada o no se encontró el ID del trabajador.";
    exit();
}
$num_emp = $_SESSION["num_emp"];

$stmt_datos = $conexion->prepare("SELECT * FROM sindicalizadosprueba WHERE num_emp = ?");
$stmt_datos->execute([$num_emp]);
$datos = $stmt_datos->fetch(PDO::FETCH_OBJ);

if (!$datos) {
    echo "Error: No se encontraron datos para el numero de empleado: " . $num_emp;
    exit();
}

$stmt_usuario = $conexion->prepare("SELECT * FROM usuariosprueba WHERE num_emp_usuario = ?");
$stmt_usuario->execute([$num_emp]);
$datos_usuario = $stmt_usuario->fetch(PDO::FETCH_OBJ);

$stmt_rol = $conexion->prepare("SELECT id_administrativo FROM sindicalizadosprueba WHERE num_emp = ?");
$stmt_rol->execute([$num_emp]);
$resultado_rol = $stmt_rol->fetch(PDO::FETCH_OBJ);

if ($resultado_rol && $resultado_rol->id_administrativo == 1) {
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


    <main>
    
    <section class="profile-section" style="width: 100%; max-width: 800px;">
        <div class="profile-header">
            <i class="fas fa-user-edit"></i>
            <h2>EDITAR INFORMACIÓN</h2>
        </div>

<?php
include("controlador_editar_informacion.php");
?>

        <div class="profile-content" style="display: block; padding: 30px;">
            
            <p style="text-align: center; color: #666; margin-bottom: 20px; font-weight: bold;">
                ¿La información que se muestra a continuación es correcta? <br> 
                <span style="font-weight: normal; font-size: 0.9em;">Si no es así, puedes corregirla y guardar los cambios.</span>
            </p>

            <form method="POST" enctype="multipart/form-data">
                <input type="hidden" name="num_emp" value="<?php echo $datos->num_emp ?>">

                <h3 style="color: var(--blue-brand); border-bottom: 2px solid #eee; padding-bottom: 10px; margin-bottom: 20px;">
                    <i class="fas fa-id-card"></i> Datos del sindicalizado
                </h3>

                <table class="profile-table" style="width: 100%; border-collapse: collapse; margin-bottom: 30px;">
                    <tr>
                        <td class="profile-label" style="width: 30%;">Nombres:</td>
                        <td class="profile-value" style="padding: 0;">
                            <input type="text" name="nombres" value="<?php echo $datos->nombres ?>" style="width: 100%; border: none; padding: 12px; outline: none; background: transparent; font-family: inherit;">
                        </td>
                    </tr>
                    <tr>
                        <td class="profile-label">Apellidos:</td>
                        <td class="profile-value" style="padding: 0;">
                            <input type="text" name="apellidos" value="<?php echo $datos->apellidos ?>" style="width: 100%; border: none; padding: 12px; outline: none; background: transparent; font-family: inherit;">
                        </td>
                    </tr>
                    <tr>
                        <td class="profile-label">Correo:</td>
                        <td class="profile-value" style="padding: 0;">
                            <input type="email" name="correo_personal" value="<?php echo $datos->correo_personal ?>" style="width: 100%; border: none; padding: 12px; outline: none; background: transparent; font-family: inherit;">
                        </td>
                    </tr>
                    <tr>
                        <td class="profile-label">Teléfono:</td>
                        <td class="profile-value" style="padding: 0;">
                            <input type="text" name="telefono" value="<?php echo $datos->telefono ?>" style="width: 100%; border: none; padding: 12px; outline: none; background: transparent; font-family: inherit;">
                        </td>
                    </tr>
                    <tr>
                        <td class="profile-label">Área actual:</td>
                        <td class="profile-value" style="padding: 0;">
                            <select name="id_area" style="width: 100%; border: none; padding: 12px; outline: none; background: transparent; font-family: inherit; cursor: pointer;">
                                <option value="1" <?php if($datos->id_area == 1) echo 'selected'; ?>>Derecho</option>
                                <option value="2" <?php if($datos->id_area == 2) echo 'selected'; ?>>Ciencias Económicas Administrativas</option>
                                <option value="3" <?php if($datos->id_area == 3) echo 'selected'; ?>>Química</option>
                                <option value="4" <?php if($datos->id_area == 4) echo 'selected'; ?>>Ciencias Educativas</option>
                                <option value="5" <?php if($datos->id_area == 5) echo 'selected'; ?>>Ciencias De La Información</option>
                                <option value="6" <?php if($datos->id_area == 6) echo 'selected'; ?>>Ingeniería</option>
                                <option value="7" <?php if($datos->id_area == 7) echo 'selected'; ?>>Salud</option>
                                <option value="8" <?php if($datos->id_area == 8) echo 'selected'; ?>>Ciencias Naturales y Exactas</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td class="profile-label">Fecha de ingreso:</td>
                        <td class="profile-value" style="padding: 0;">
                            <input type="date" name="fecha_ingreso" value="<?php echo $datos->fecha_ingreso ?>" style="width: 100%; border: none; padding: 12px; outline: none; background: transparent; font-family: inherit;">
                        </td>
                    </tr>
                    <tr>
                        <td class="profile-label">Foto de Perfil:</td>
                        <td class="profile-value" style="padding: 15px;">
                            <?php if($datos->foto): ?>
                                <div style="margin-bottom: 10px;">
                                    <small style="color: #888;">Foto actual:</small><br>
                                    <img src="fotos/<?php echo $datos->foto; ?>" width="80" style="border-radius: 8px; border: 1px solid #ddd; margin-top: 5px;">
                                </div>
                            <?php endif; ?>
                            <input type="file" name="foto" accept="image/*" style="font-size: 0.8em;">
                            <br><small style="color: #999;">Dejar en blanco para conservar la actual.</small>
                        </td>
                    </tr>
                </table>

                <h3 style="color: var(--blue-brand); border-bottom: 2px solid #eee; padding-bottom: 10px; margin-bottom: 20px; margin-top: 40px;">
                    <i class="fas fa-user-lock"></i> Datos de cuenta
                </h3>

                <table class="profile-table" style="width: 100%; border-collapse: collapse;">
                    <tr>
                        <td class="profile-label" style="width: 30%;">Nombre de usuario:</td>
                        <td class="profile-value" style="padding: 0;">
                            <input type="text" name="nombre_usuario" value="<?php echo $datos_usuario->nombre_usuario ?>" style="width: 100%; border: none; padding: 12px; outline: none; background: transparent; font-family: inherit;">
                        </td>
                    </tr>
                    <tr>
                        <td class="profile-label">Nueva Contraseña:</td>
                        <td class="profile-value" style="padding: 0;">
                            <input type="password" name="contraseña" placeholder="Dejar en blanco para no cambiar" style="width: 100%; border: none; padding: 12px; outline: none; background: transparent; font-family: inherit;">
                        </td>
                    </tr>
                </table>

                <div class="btn-back" style="border-top: 1px solid #eee; margin-top: 40px; padding-top: 20px; display: flex; justify-content: center; gap: 20px;">
                    <input type="submit" name="btnactualizar" value="Guardar Cambios" style="background: var(--blue-brand); color: white; border: none; padding: 12px 25px; border-radius: 5px; font-weight: bold; cursor: pointer; display: flex; align-items: center; gap: 8px; transition: 0.3s;">
                         
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