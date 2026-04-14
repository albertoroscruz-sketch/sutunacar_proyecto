<?php
session_start();
include("controlador_validar_trabajador.php");

?>

<!DOCTYPE html>
<html>
<head>
    <title>SUTUNACAR - etapa de validacion</title>
    <link rel="icon" href="dd.png">
    <link rel="stylesheet" href="diseñobase.css">
    <link rel="stylesheet" href="menu.css">
</head>

<body>
<header>


        <img src="escudo_unacar.png">

    <h1>
        SUTUNACAR
    </h1>

        <img src="sutunacar.png">
</header>

    <h2>
        <a href="pag_index.php">
                regreso a inicio
        </a>  
         Registro para validar identidad
    </h2>


<form method="post">

    <input type="text" name="curp" 
    placeholder="Ingresa tu CURP">

    <input type="int" id="input" name="num_emp" 
    placeholder="Ingresa tu número de empleado"> 


<br>

<div class="botones">
<input type="submit" name="btnvalidar" class="estilo-de-botones" value="validar">

</div>

</form>



<br><br><br>

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