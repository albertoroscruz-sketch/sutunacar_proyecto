<?php
session_start();
include("controlador_inicio.php");


$num_emp_checar = $_SESSION["num_emp"];
$stmt_admin = $conexion->prepare("SELECT id_administrativo FROM sindicalizadosprueba WHERE num_emp = ?");
$stmt_admin->execute([$num_emp_checar]);
$resultado_administrativo = $stmt_admin->fetch(PDO::FETCH_OBJ);

if ($resultado_administrativo->id_administrativo == 1) 
{
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

<main>
    <section class="profile-section">
        
        <div class="profile-header">
            <i class="fas fa-home"></i>
            <h2>Bienvenido al Sistema</h2>
        </div>

        <div class="profile-content">
            <?php if($datos->foto) { ?>
                <img src="fotos/<?php echo $datos->foto; ?>" class="profile-photo" alt="Perfil">
            <?php } ?>

            <table class="profile-table">
                <tr>
                    <td class="profile-label">Usuario:</td>
                    <td class="profile-value">
                        <?php echo $datos->nombres . " " . $datos->apellidos; ?>
                    </td>
                </tr>
                <tr>
                    <td class="profile-label">CURP:</td>
                    <td class="profile-value"><?php echo $datos->curp; ?></td>
                </tr>
                <tr>
                    <td class="profile-label">No empleado</td>
                    <td class="profile-value"><?php echo $datos->num_emp; ?></td>
                </tr>
                <tr>
                    <td class="profile-label">Correo institucional:</td>
                    <td class="profile-value"><?php echo $datos->correo_institucional; ?></td>
                </tr>
                <tr>
                    <td class="profile-label">Área</td>
                    <td class="profile-value">
                    <?php 
                    $id_area = $datos->id_area; 
                    $stmt_area = $conexion->prepare("SELECT nombre_area FROM areasprueba WHERE id_area = ?");
                    $stmt_area->execute([$id_area]);
                    if($stmt_area->rowCount() > 0)
                    {
                        echo $stmt_area->fetch(PDO::FETCH_OBJ)->nombre_area;
                    }
                    else
                    {
                        echo "No se seleccionó área";
                    }
    ?>
                </td>
                </tr>
                <tr>
                    <td class="profile-label">Correo:</td>
                    <td class="profile-value"><?php echo $datos->correo_personal; ?></td>
                </tr>
                <tr>
                    <td class="profile-label">Teléfono:</td>
                    <td class="profile-value"><?php echo $datos->telefono; ?></td>
                </tr>
                <tr>
                    <td class="profile-label">Fecha de ingreso</td>
                    <td class="profile-value"><?php echo $datos->fecha_ingreso; ?></td>
                </tr>
            </table>
        </div>

        <div class="profile-actions">
            
            <a href="controlador_cerrarsesion.php" class="btn-logout">
                <i class="fas fa-power-off"></i> Cerrar sesión
            </a>

            <a href="pag_datos_admin.php" class="btn-back">
                <i class="fas fa-chevron-right"></i> Datos generales
            </a>


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