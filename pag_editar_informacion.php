<?php

session_start();
include("con_db.php");
include("controlador_editar_informacion.php");
if(empty($_GET["curp"]))
    {
    echo "ERROR no hay curp";
    exit();
    }
$curp = $_GET["curp"];




$corregir_datos = $conexion->query("SELECT * FROM sindicalizadosprueba WHERE curp = '$curp'");
$datos = $corregir_datos->fetch_object();
if (!$datos) 
    {
    echo "Error: No se encontraron datos para el CURP: " . $curp;
    exit();
    
}

$corregir_usuario = $conexion->query("SELECT * FROM usuariosprueba WHERE curp_usuario = '$curp'");
$datos_usuario = $corregir_usuario->fetch_object();
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
         <br> APARTADO PARA EDITAR INFORMACION
    </h2>

<form method="POST" enctype="multipart/form-data">


        <input type="hidden" name="curp" value="<?php echo $datos->curp ?>">
       
        <h3>
            La informacion que se muestra a continuacion es correcta? <br> si no es asi, entonces puedes corregirla:
        </h3>

        <h2>
            Datos del sindicalizado: 
        </h2>

        
        <label>Nombres:</label>
        <input type="text" name="nombres" value="<?php echo $datos->nombres ?>"><br>

        <label>Apellidos:</label>
        <input type="text" name="apellidos" value="<?php echo $datos->apellidos ?>"><br>

        <label>Correo:</label>
        <input type="email" name="correo_personal" value="<?php echo $datos->correo_personal ?>"><br>
        
        <label>Teléfono:</label>
        <input type="text" name="telefono" value="<?php echo $datos->telefono ?>">
        <br>

        <label>TU AREA ES: </label>
        <select name="id_area">
        <option value="" disabled selected <?php if ($datos->id_area == 0 || $datos->id_area == null) echo 'selected';?>>Selecciona tu Área</option>
        <option value="1" <?php if($datos->id_area == 1) echo 'selected'; ?>>Derecho</option>
        <option value="2" <?php if($datos->id_area == 2) echo 'selected'; ?>>Ciencias Econ&oacute;micas Administrativas</option>
        <option value="3" <?php if($datos->id_area == 3) echo 'selected'; ?>>Qu&iacute;mica</option>
        <option value="4" <?php if($datos->id_area == 4) echo 'selected'; ?>>Ciencias Educativas</option>
        <option value="5" <?php if($datos->id_area == 5) echo 'selected'; ?>>Ciencias De La Informaci&oacute;n</option>
        <option value="6" <?php if($datos->id_area == 6) echo 'selected'; ?>>Ingenieria</option>
        <option value="7" <?php if($datos->id_area == 7) echo 'selected'; ?>>Salud</option>
        <option value="8" <?php if($datos->id_area == 8) echo 'selected'; ?>>Ciencias Naturales y Exactas</option>
     
        
        <label>fecha de ingreso:</label>
        <input type="date" name="fecha_ingreso" value="<?php echo $datos->fecha_ingreso ?>"><br>
        <br>

        <div class="foto chingona">
        <label>Foto actual:</label>
        <?php if($datos->foto) 
                { ?>
                    <img src="fotos/<?php echo $datos->foto; ?>" width="150" style="border-radius">
        <?php   } ?>

        <br>
        <label>Nueva foto (si quieres conservar la que ya esta entonces dejalo en blanco):</label>
        <input type="file" name="foto" accept="image/*">
        
        <div>

        <br>

        <h2>
            Datos sobre el usuario:
        </h2>

        <label>Nombre de usuario:</label>
        <input type="text" name="nombre_usuario" value="<?php echo $datos_usuario->nombre_usuario ?>"><br>

        <label>Contraseña:</label>
        <input type="password" name="contraseña" value="" placeholder="deja en blanco si no quieres cambiar la contraseña">
        <br>


        <input type="submit" name="btnactualizar" value="Guardar Cambios">
        </input>

    </form>

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