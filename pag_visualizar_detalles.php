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

if ($resultado_rol && $resultado_rol->id_administrativo == 1) {
    $ruta_inicio = "pag_inicio.php"; 
} else {
    $ruta_inicio = "pag_inicio_admin.php"; 
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>SUTUNACAR</title>
    <link rel="icon" href="dd.png">
    <link rel="stylesheet" href="diseñobase.css">

</head>

<body>
<header>
    <div class="bloque-izquierdo">
        <img src="sutunacar.png" class="logo-sutunacar">
         </div> 
        <div class="texto-sindicato">
            Sindicato Unico de Trabajadores de la <br>
            Universidad autonoma del Carmen
        </div>
   <div class="bloque-derecho">
      <img src="escudo_unacar.png" class="logo-escudo">
    </div>
</header>

<a href="<?php echo $ruta_inicio?>">
        regresar a inicio
</a>
    <h2 >
         <br>VER DETALLES
    </h2>

    


    <h2>Detalles socioeconomicos </h2>

    <p><strong>Tu vivienda:</strong></p>
    <?php echo $datos_socioeconomico->vivienda_socioeconomico; ?>

    <p><strong>el material de tu vivienda:</strong></p>
    <?php echo $datos_socioeconomico->material_socioeconomico?>

    <p><strong>los niveles de tu vivienda:</strong></p>
    <?php echo $datos_socioeconomico->niveles_socioeconomico?>

    <p><strong>la cantidad de personas que dependen economicamente de ti:</strong></p>
    <?php echo $datos_socioeconomico->dependientes_socioeconomico?>

    <h2>Detalles contacto de emergencia </h2>

                        <p><strong>El nombre de su contacto de emergencia:</strong></p>
                        <?php echo $datos_contacto->nombre_contacto?>

                        <p><strong>El parentesco de su contacto de emergencia:</strong></p>
                        <?php echo $datos_contacto->parentesco?>

                        <p><strong>El telefono de su contacto de emergencia</strong></p>
                        <?php echo $datos_contacto->telefono_contacto?>

                        <p><strong>El correo de su contacto de emergencia:</strong></p>
                        <?php echo $datos_contacto->correo_contacto?>

                        <p><strong>La direccion de su contacto de emergencia: </strong></p>
                        <?php echo $datos_contacto->direccion_contacto?>

                        <h2>Detalles salud </h2>

                        <p><strong>Su numero de seguro social:</strong></p>
                        <?php echo $datos_salud->nss_salud?>

                        <p><strong>Sus alergias:</strong></p>
                        <?php echo $datos_salud->alergias_salud?>

                        <p><strong>Su tipo de sangre:</strong></p>
                        <?php echo $datos_salud->tipo_sangre_salud?>

                        <p><strong>Sus enfermedades:</strong></p>
                        <?php echo $datos_salud->enfermedades_salud?>
<br><br>
        <a href="controlador_cerrarsesion.php" class="btn-rojo">
            cerrar sesion
        </a>
<br><br><br>

<footer>
    <p>Si tiene problemas para iniciar sesión, por favor contacte con el administrador.</p>

    <p>DIRECCIÓN: Av. Concordia #24 entre calle 62 y Av. Periférica Col. Benito Júarez, Ciudad del Carmen, Campeche.</p>

    <p> Número de contacto: +52 938 3811018 </p>

    <div class="enlaces-footer">
        <a href="https://www.unacar.mx/">
            SITIO UNACAR
        </a>   
 
        <a href="https://www.sutunacar.org/">
            SITIO SUTUNACAR
        </a>
    </div>


</footer>
</body>

</html>