<?php
session_start();
include("controlador_inicio.php");
include("controlador_consultas.php");

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
         <br> 
        PAGINA DE CONSULTAS
    </h2>
<form action="pag_consultas.php" method="POST" id="consulta" name="consulta">
    <h2>Filtros de busqueda</h2>

    <input type="hidden" name="curp" value="curp">

    <label>Nombre a buscar:</label>
    <input type="text" name="nombres_buscar" value="<?php echo $_POST["nombres_buscar"]; ?>">

    <label>Apellidos a buscar:</label>
    <input type="text" name="apellidos_buscar" value="<?php echo $_POST["apellidos_buscar"]; ?>">
    
    <label>CURP a buscar:</label>
    <input type="text" name="curp_buscar" value="<?php echo $_POST["curp_buscar"]; ?>">
    
    <label>fecha desde:</label>
    <input type="date" name="fecha_desde" id="fecha_desde" value="<?php echo $_POST["fecha_desde"]; ?>">

    <label>fecha hasta:</label>
    <input type="date" name="fecha_hasta" id="fecha_hasta" value="<?php echo $_POST["fecha_hasta"]; ?>">


    <select name="id_area_buscar" id="buscar_id_area">
        <?php if($_POST["id_area_buscar"] != "") 
                { ?>
                    <option value="<?php echo $_POST["id_area_buscar"]; ?>"> <?php echo $_POST["id_area_buscar"]; ?>> </option>
        <?php   } ?>
    <option value="">AREAS</option>
    <option value="1">Ingenieria</option>
    <option value="2">Facultad De Ciencias De La Informaci&oacute;n</option>
    </select>

    <select id="orden" name="orden">
        <?php if($_POST["orden"] != "") 
            { ?>
        <option value="<?php echo $_POST["orden"]; ?>">
        <?php 
        if($_POST["orden"] == '1')
            {
                echo "Ordenar por nombre";
            }
        if($_POST["orden"] == '2')
            {
                echo "Ordenar por apellidos";
            }
        if($_POST["orden"] == '3')
            {
                echo "Ordenar por curp";
            }
        if($_POST["orden"] == '4')
            {
                echo "Ordenar por fecha de ingreso reciente";
            }
        if($_POST["orden"] == '5')
            {
                echo "Ordenar por fecha de ingreso antigua";
            }
        if($_POST["orden"] == '6')
            {
                echo "Ordenar por area";
            }
        ?>
        <?php  } ?>
        <option value="">ordenar por:</option>
        <option value="1">Ordenar por nombre</option>
        <option value="2">Ordenar por apellidos</option>
        <option value="3">Ordenar por curp</option> 
        <option value="4">Ordenar por fecha de ingreso reciente</option>
        <option value="5">Ordenar por fecha de ingreso antigua</option>
        <option value="6">Ordenar por area</option>
    </select>

    <p><?php echo $numerosql; ?> resultados encontrados</p>

    <table border ="1" style="border-collapse: collapse; width: 100%; text-align: center;">
        <tr>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>CURP</th>
            <th>Fecha de ingreso</th>
            <th>Area</th>
        </tr>

        <?php while($row = $sql->fetch_assoc()) 
            { ?>
        <tr>
            <td><?php echo $row["nombres"]; ?></td>
            <td><?php echo $row["apellidos"]; ?></td>
            <td><?php echo $row["curp"]; ?></td>
            <td><?php echo $row["fecha_ingreso"]; ?></td>
            <td><?php echo $row["id_area"]; ?></td>
        </tr>
    
        <?php } ?>
    </table>
    <br>

    <input type="submit" value="Buscar">
</form>


<br><br><br>

    <div style="text-align: center; font-size: 20px;">

        <a href="controlador_cerrarsesion.php">
            cerrar sesion
        </a>
        <br>
        <?php if(isset($_SESSION["curp_inicio"])) 
                { 
                ?>
        <a href="pag_editar_informacion.php?curp=<?php echo $_SESSION["curp_inicio"]; ?>">
            editar informacion
        </a>

        <?php } ?>
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