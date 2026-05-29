<?php
ob_start();
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include_once("con_db.php");

if (empty($_SESSION["num_emp"])) {
    header("location: pag_index.php");
    exit();
}

$num_emp = $_SESSION["num_emp"];

$stmt_datos = $conexion->prepare("
    SELECT * 
    FROM sindicalizadosprueba 
    WHERE num_emp = ?
");

$stmt_datos->execute([$num_emp]);

$datos = $stmt_datos->fetch(PDO::FETCH_OBJ);

$stmt_socio = $conexion->prepare("SELECT * FROM socioeconomicoprueba WHERE num_emp_socioeconomico = ?");
$stmt_socio->execute([$num_emp]);
$datos_socioeconomico = $stmt_socio->fetch(PDO::FETCH_OBJ);

$stmt_contacto = $conexion->prepare("SELECT * FROM contactoemergenciaprueba WHERE num_emp_contacto = ?");
$stmt_contacto->execute([$num_emp]);
$datos_contacto = $stmt_contacto->fetch(PDO::FETCH_OBJ);

$stmt_salud = $conexion->prepare("SELECT * FROM saludprueba WHERE num_emp_salud = ?");
$stmt_salud->execute([$num_emp]);
$datos_salud = $stmt_salud->fetch(PDO::FETCH_OBJ);

$stmt_rol = $conexion->prepare("SELECT id_administrativo FROM sindicalizadosprueba WHERE num_emp = ?");
$stmt_rol->execute([$num_emp]);
$resultado_rol = $stmt_rol->fetch(PDO::FETCH_OBJ);

if ($resultado_rol->id_administrativo == 1) {
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

<div style="width: 100%; display: flex; justify-content: space-between; align-items: center; padding: 15px 40px; box-sizing: border-box;">
    
    <a href="controlador_cerrarsesion.php" class="btn-logout" style="text-decoration: none; color: #d93025; font-weight: bold; display: flex; align-items: center; gap: 8px; font-size: 14px; border: 2px solid #ddd; padding: 8px 15px; border-radius: 5px; background: #f9f9f9; transition: 0.3s;">
        <i class="fas fa-power-off"></i> Cerrar sesión
    </a>


</div>

<main>
    <section class="profile-section">
        <div class="profile-header">
            <i class="fas fa-user"></i>
            <h2>Mis Datos generales</h2>
        </div>
        <div class="profile-content">
            <?php if($datos->foto) { ?>
                <img src="fotos/<?php echo $datos->foto; ?>" class="profile-photo" alt="Perfil">
            <?php } ?>
            <table class="profile-table">
                 <tr>
                    <td class="profile-label">Nombre:</td>
                    <td class="profile-value">
                        <?php echo $datos->nombres . " " . $datos->apellidos; ?>
                    </td>
                </tr>
                <tr>
                    <td class="profile-label">No. empleado:</td>
                    <td class="profile-value"><?php echo $datos->num_emp; ?></td>
                </tr>
                <tr>
                    <td class="profile-label">Email:</td>
                    <td class="profile-value"><?php echo $datos->correo_personal; ?></td>
                </tr>
                <tr>
                    <td class="profile-label">Teléfono:</td>
                    <td class="profile-value"><?php echo $datos->telefono; ?></td>
                </tr>
            </table>
        </div>
    </section>

    <section class="container">
<div class="icon-nav">
    <div class="line"></div>
    <div class="icon-wrapper active" onclick="mostrarTabla('datos-gral', this)">
        <div class="circle"><i class="fas fa-home"></i></div>
        <span class="icon-label">Socioeconómico</span>
    </div>
    <div class="icon-wrapper" onclick="mostrarTabla('datos-domicilio', this)">
        <div class="circle"><i class="fas fa-heart"></i></div>
        <span class="icon-label">Salud</span>
    </div>
    <div class="icon-wrapper" onclick="mostrarTabla('datos-familia', this)">
        <div class="circle"><i class="fas fa-folder"></i></div>
        <span class="icon-label">Contacto de Emergencia</span>
    </div>
</div>

        <div id="contenedor-tablas">
            
            <div id="datos-gral" class="tabla-dinamica">
                <div class="data-card">
                    <div class="card-header">SOCIOECONÓMICO</div>
                    <table class="data-table">
                        <tr><td class="label">Tu vivienda:</td><td><?php echo $datos_socioeconomico->vivienda_socioeconomico ?? ''; ?></td></tr>
                        <tr><td class="label">Material (vivienda):</td><td><?php echo $datos_socioeconomico->material_socioeconomico ?? '';?></td></tr>
                        <tr><td class="label">Niveles (vivienda)</td><td><?php echo $datos_socioeconomico->niveles_socioeconomico ?? '';?></td></tr>
                        <tr><td class="label">Personas que depenten de ti:</td><td><?php echo $datos_socioeconomico->dependientes_socioeconomico ?? '';?></td></tr>
                        
                    </table>
                </div>
            </div>

            <div id="datos-domicilio" class="tabla-dinamica" style="display:none;">
                <div class="data-card">
                    <div class="card-header">SALUD</div>
                    <table class="data-table">
                        <tr><td class="label">No.SS:</td><td><?php echo $datos_salud->nss_salud ?? '';?></td></tr>
                        <tr><td class="label">Alergias:</td><td><?php echo $datos_salud->alergias_salud ?? '';?></td></tr>
                        <tr><td class="label">Tipo de sangre:</td><td><?php echo $datos_salud->tipo_sangre_salud ?? '';?></td></tr>
                        <tr><td class="label">Enfermedades:</td><td><?php echo $datos_salud->enfermedades_salud ?? '';?></td></tr>
                    </table>
                </div>
            </div>

            <div id="datos-familia" class="tabla-dinamica" style="display:none;">
                <div class="data-card">
                    <div class="card-header">CONTACTO DE EMERGENCIA</div>
                    <table class="data-table">
                        <tr><td class="label">Nombre:</td><td><?php echo $datos_contacto->nombre_contacto ?? '';?></td></tr>
                        <tr><td class="label">Parentesco:</td><td><?php echo $datos_contacto->parentesco ?? '';?></td></tr>
                        <tr><td class="label">Teléfono:</td><td><?php echo $datos_contacto->telefono_contacto ?? '';?></td></tr>
                        <tr><td class="label">Correo:</td><td><?php echo $datos_contacto->correo_contacto ?? '';?></td></tr>
                        <tr><td class="label">Dirección</td><td><?php echo $datos_contacto->direccion_contacto ?? '';?></td></tr>
                    </table>
                </div>
            </div>

        </div>
    </section>
</main>

        <div class="profile-actions">
            <a href="pag_editar_informacion.php?num_emp=<?php echo $datos->num_emp; ?>" class="btn-back" style = "font-weight: bold; display: flex; align-items: center; gap: 8px; font-size: 14px; border: 2px solid #ddd; padding: 8px 15px; border-radius: 5px; background: #f9f9f9; transition: 0.3s;">
            Editar informacion
            </a>

            <?php
            $stmt_verificar = $conexion->prepare("SELECT * FROM saludprueba WHERE num_emp_salud = ?");
            $stmt_verificar->execute([$num_emp]);
            if ($stmt_verificar->rowCount() > 0)
                {
                    ?>

                    <a href="pag_editar_detalles.php?num_emp=<?php echo $datos->num_emp; ?>" class="btn-back" style = "font-weight: bold; display: flex; align-items: center; gap: 8px; font-size: 14px; border: 2px solid #ddd; padding: 8px 15px; border-radius: 5px; background: #f9f9f9; transition: 0.3s;">
                    Editar informacion detalles
                    </a>
                    
                    <?php   
                }
            else
                {
                    ?>
                    <a href="pag_detalles.php" class="btn-back" style = "font-weight: bold; display: flex; align-items: center; gap: 8px; font-size: 14px; border: 2px solid #ddd; padding: 8px 15px; border-radius: 5px; background: #f9f9f9; transition: 0.3s;">
                    Agregar informacion detalles
                    </a>
                    <?php
                }



            ?>

        </div>
<br>
<footer class="main-footer">
    <h6>Si tiene problemas para iniciar sesión, por favor contacte con el administrador.</h6>
    <h6>DIRECCIÓN: Av. Concordia #24 entre calle 62 y Av. Periférica Col. Benito Júarez, Ciudad del Carmen, Campeche.</h6>
    <h6>Número de contacto: +52 938 3811018</h6>
    
    <div style="margin-top: 15px;">
        <a href="https://www.unacar.mx/" style="color: white; margin-right: 20px;">Sitio UNACAR</a>
        <a href="https://www.sutunacar.org/" style="color: white;">Sitio SUTUNACAR</a>
    </div>
</footer>

<script>
    function mostrarTabla(idTabla, elemento) {
        const tablas = document.querySelectorAll('.tabla-dinamica');
        tablas.forEach(t => t.style.display = 'none');

        const botones = document.querySelectorAll('.icon-wrapper');
        botones.forEach(b => b.classList.remove('active'));

        const tablaActiva = document.getElementById(idTabla);
        if (tablaActiva) {
            tablaActiva.style.display = 'block';
        }

        if (elemento) {
            elemento.classList.add('active');
        }
    }
</script>

</body>
</html>