<?php
session_start();
if (empty($_SESSION["nombre_usuario"]))
    {
    header("location: pag_index.php");
    exit();
    }

    include("con_db.php");

$curp = $_SESSION["curp_inicio"];
$consulta = $conexion->query("SELECT * FROM sindicalizadosprueba WHERE curp = '$curp'");
$datos = $consulta->fetch_object();
if (!$datos) {
    echo "Error: No se encontraron datos para la CURP: " . $curp;
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>SUTUNACAR</title>
    <link rel="icon" href="dd.png">
    <link rel="stylesheet" href="diseñobase.css">
</head>

<body>
<header>


    <img src="escudo_unacar.png">

    </img> 

    <h1>
        SUTUNACAR
    </h1>

        <img src="sutunacar.png">
</header>

    <h2 >
            <a href="pag_index.php">
                regreso a inicio
        </a>   
         <br> ESTA ES LA PAGINA DE INICIO Y DEBERIA MOSTRAR LOS DATOS
    </h2>

    <div style="text-align: center;">
        <?php if($datos->foto) 
                { ?>
                    <img src="fotos/ echo $datos->foto; ?>" width="150" style="border-radius">
        <?php   } ?>


    <h3>
            <?php echo $datos->nombres . " " . $datos->apellidos; ?>
    </h3>

    <p><strong>CURP:</strong> <?php echo $datos->curp; ?></p>
    <p><strong>Correo:</strong> <?php echo $datos->correo_personal; ?></p>
    <p><strong>Telefono:</strong> <?php echo $datos->telefono; ?></p>

    </div>

<br><br><br>

    <div style="text-align: center;">

        <a href="controlador_cerrarsesion.php">
            cerrar sesion
    </a>

    </div>

<footer>
    <p>Si tiene problemas para iniciar sesión, por favor contacte con el administrador.</p>

    <p>DIRECCIÓN: Av. Concordia #24 entre calle 62 y Av. Periférica Col. Benito Júarez, Ciudad del Carmen, Campeche.</p>

    <p> Número de contacto: +52 938 3811018 </p>

    <a href="https://www.unacar.mx/">
        haz click para ir al sitio de la pagina unacar
    </a>   
 
    <a href="https://www.sutunacar.org/">
        haz click para ir a la pagina del sutunacar
    </a>



</footer>
</body>

</html>