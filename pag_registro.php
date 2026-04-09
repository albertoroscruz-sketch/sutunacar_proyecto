<?php

session_start();

if (empty($_SESSION["curp_validada"]))
    {
    header("location: pag_validar_trabajador.php");
    exit();
    }

    include("controlador_registro.php");

?>
<!DOCTYPE html>
<html>
<head>
    <title>SUTUNACAR</title>
    <link rel="icon" href="dd.png">
    <link rel="stylesheet" href="diseñobase.css">
    <link rel="stylesheet" href="registro.css">

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
         <br>Registro
    </h2>

    

<form method="POST" enctype="multipart/form-data">
            <table class="tabla-form">
                <tbody>
                <tr>
                    <td>
                        <input type="text" name="nombre_usuario" placeholder="Crea un nombre de usuario" required>
                    </td>
                </tr>

                <tr>
                    <td>
                        <input type="password" name="contraseña" placeholder="Crea tu contraseña" required>
                    </td>
                </tr>

                <tr>
                    <td>
                        <input type="text" id="nombre" name="nombres" placeholder="Ingresa tu/s nombres" required>
                    </td>
                </tr>

                <tr>
                    <td>
                        <input type="text" id="nombre" name="apellidos" placeholder="Ingresa tus apellidos" required>
                    </td>
                </tr>
                
                <tr>
                    <td>
                        <input type="email" id="correo" name="correo_personal" placeholder="Correo electr&oacute;nico personal" required>
                    </td>
                </tr>

                <tr>
                    <td>
                        <input type="number" id="telefono" name="telefono" placeholder="tel&eacute;fono" required>
                    </td>
                </tr>

                <tr>
                    <td>
                        <select name="id_area" required>
                        <option value="" disabled selected>Selecciona tu Área</option>
                        <option value="1">Ingenieria</option>
                        <option value="2">Facultad De Ciencias De La Informaci&oacute;n</option>
                         </select>
                    </td>
                </tr>

                <tr>
                    <td>
                        <label>Sube tu foto de perfil:</label>
                        <input type="file" name="foto" accept="image/*" required>
                    </td>
                </tr>
                

            </tbody>
        </table>

            <br>

            <input type="submit" name="btnregistro" value="subir los datos" class="btn-enviar">

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