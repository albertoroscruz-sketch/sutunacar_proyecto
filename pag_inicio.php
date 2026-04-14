<?php
session_start();
    include("controlador_inicio.php");
    

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
            <a class="regreso_a_inicio"; href="pag_index.php">
                regreso a inicio
        </a>   
         <br> ESTA ES LA PAGINA DE INICIO Y DEBERIA MOSTRAR LOS DATOS
    </h2>

    <div style="text-align: center;">
        <?php if($datos->foto) 
                { ?>
                    <img src="fotos/<?php echo $datos->foto; ?>" width="150" style="border-radius">
        <?php   } ?>


    <h3>
            <?php echo $datos->nombres . " " . $datos->apellidos; ?>
    </h3>

    <div class="datos_personales">
    <p><strong>CURP:</strong> <?php echo $datos->curp; ?></p>
    <p><strong>Correo:</strong> <?php echo $datos->correo_personal; ?></p>
    <p><strong>Telefono:</strong> <?php echo $datos->telefono; ?></p>
    <p><strong>Fecha de ingreso:</strong> <?php echo $datos->fecha_ingreso; ?></p>
    </div>
    
    </div>

<br><br><br>

    <div style="text-align: center; font-size: 20px;">
        <a href="controlador_cerrarsesion.php">
            cerrar sesion
        </a>
        <br>
 <a href="pag_consultas.php">
        CONSULTAR HONORABLES SINDICALIZADOS
        </a>
        <br>

        <a href="pag_editar_informacion.php?curp=<?php echo $datos->curp; ?>">
            editar informacion
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