<!DOCTYPE html>
<html>
<head>
    <title>SUTUNACAR</title>
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
         MENU PRINCIPAL
    </h2>

    <?php
    include("con_db.php");
    include("controlador_index.php");
    
    ?>




<form method="post">

    <input type="text" name="nombre_usuario" 
    placeholder="Ingresa tu usuario">

    <input type="password" id="input" name="contraseña" 
    placeholder="Ingresa tu contraseña"> 


<br>

<div class="botones">
<input type="submit" name="entrar" class="estilo-de-botones" value="entrar">
<a href="pag_validar_trabajador.php" class="estilo-de-botones">
registrarse
</a>
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