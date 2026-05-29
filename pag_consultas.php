<?php
ob_start();
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include_once("controlador_inicio.php");
include_once("controlador_consultas.php");
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
    
    <a href="pag_datos_admin.php" class="btn-back" style="text-decoration: none; color: var(--blue-brand, #004A99); font-weight: bold; display: flex; align-items: center; gap: 8px; font-size: 14px; border: 2px solid #ddd; padding: 8px 15px; border-radius: 5px; background: #f9f9f9; transition: 0.3s;">
        <i class="fas fa-arrow-left"></i> Regresar
    </a>
</div>
  
  <main >
    
    <section class="profile-section" style="width: 100%; max-width: 1300px;">
        <div class="profile-header">
            <i class="fas fa-users"></i>
            <h2>CONSULTAS</h2>
        </div>
<form class="tabla_consultas" action="pag_consultas.php" method="POST" id="consulta" name="consulta">
<div class="filtros-card">
            <h3><i class="fas fa-filter"></i> Filtros de búsqueda</h3>

            <input type="hidden" name="num_emp" value="num_emp">

            <div class="filtros-grid">
                
                <div class="filtro-grupo">
                    <label>Nombre :</label>
                    <input type="text" name="nombres_buscar" value="<?php echo $_POST["nombres_buscar"]; ?>">
                </div>

                <div class="filtro-grupo">
                    <label>Apellidos :</label>
                    <input type="text" name="apellidos_buscar" value="<?php echo $_POST["apellidos_buscar"]; ?>">
                </div>
                
                <div class="filtro-grupo">
                    <label>CURP :</label>
                    <input type="text" name="curp_buscar" value="<?php echo $_POST["curp_buscar"]; ?>">
                </div>

                <div class="filtro-grupo">
                    <label>Número de empleado :</label>
                    <input type="number" name="num_emp_buscar" value="<?php echo $_POST["num_emp_buscar"]; ?>">
                </div>

                <div class="filtro-grupo">
                    <label>Teléfono :</label>
                    <input type="text" name="telefono_buscar" value="<?php echo $_POST["telefono_buscar"]; ?>">
                </div>

                <div class="filtro-grupo">
                    <label>Correo personal :</label>
                    <input type="text" name="correo_personal_buscar" value="<?php echo $_POST["correo_personal_buscar"]; ?>">
                </div>
            </div> <div class="divisor-filtros">
                <span>Filtros Específicos</span>
            </div>

            <div class="filtros-grid filtros-avanzados">
                
                <div class="filtro-grupo">
                    <label>Fecha desde:</label>
                    <input type="date" name="fecha_desde" id="fecha_desde" value="<?php echo $_POST["fecha_desde"]; ?>">
                </div>

                <div class="filtro-grupo">
                    <label>Fecha hasta:</label>
                    <input type="date" name="fecha_hasta" id="fecha_hasta" value="<?php echo $_POST["fecha_hasta"]; ?>">
                </div>

                <div class="filtro-grupo">
                    <label>Área:</label>
                    <select name="id_area_buscar" id="buscar_id_area">
                        <?php 
                        if(!empty($_POST["id_area_buscar"])) 
                        { 
                            $id_area_seleccionada = $_POST["id_area_buscar"];
                            $consulta_nombre_area = $conexion->query("SELECT nombre_area FROM areasprueba WHERE id_area = '$id_area_seleccionada'");
                            
                            if ($consulta_nombre_area && $consulta_nombre_area->num_rows > 0) 
                            {
                                $nombre_del_area = $consulta_nombre_area->fetch(PDO::FETCH_OBJ)->nombre_area;
                                ?>
                                <option value="<?php echo $id_area_seleccionada; ?>"> <?php echo $nombre_del_area; ?> </option>
                                <?php 
                            } 
                            else 
                            {
                                ?>
                                <option value="<?php echo $id_area_seleccionada; ?>"> Área <?php echo $id_area_seleccionada; ?> </option>
                                <?php
                            }
                        } 
                        else 
                        {
                            ?>
                            <option value="">Selecciona un área...</option>
                            <?php
                        }
                        ?>
                        <option value="">AREAS</option>
                        <option value="1">Derecho</option>
                        <option value="2">Ciencias Económicas Administrativas</option>
                        <option value="3">Química</option>
                        <option value="4">Ciencias Educativas</option>
                        <option value="5">Ciencias De La Información</option>
                        <option value="6">Ingeniería</option>
                        <option value="7">Salud</option>
                        <option value="8">Ciencias Naturales y Exactas</option>
                    </select>
                </div>

                <div class="filtro-grupo">
                    <label>Tipo de sindicalizado:</label>
                    <select name="id_administrativo_buscar" required>
                        <?php 
                        if(!empty($_POST["id_administrativo_buscar"])) 
                        { 
                            $id_administrativo_seleccionado = $_POST["id_administrativo_buscar"];
                            $consulta_nombre_administrativo = $conexion->query("SELECT nombre_administrativo FROM administrativoprueba WHERE id_administrativo = '$id_administrativo_seleccionado'");
                            
                            if ($consulta_nombre_administrativo && $consulta_nombre_administrativo->num_rows > 0) 
                            {
                                $nombre_del_administrativo = $consulta_nombre_administrativo->fetch(PDO::FETCH_OBJ)->nombre_administrativo;
                                ?>
                                <option value="<?php echo $id_administrativo_seleccionado; ?>"> <?php echo $nombre_del_administrativo; ?> </option>
                                <?php 
                            } 
                            else 
                            {
                                ?>
                                <option value="<?php echo $id_administrativo_seleccionado; ?>"> Administrativo <?php echo $id_administrativo_seleccionado; ?> </option>
                                <?php
                            }
                        } 
                        else 
                        {
                            ?>
                            <option value="">Selecciona un administrativo...</option>
                            <?php
                        }
                        ?>
                        <option value="" disabled selected>Tipo de sindicalizado:</option>
                        <option value="1">Sindicalizado</option>
                        <option value="2">Secretario General</option>
                        <option value="3">Secretario de Organización</option>
                        <option value="4">Secretario de Trabajo y Conflictos</option>
                        <option value="5">Secretario de Finanzas</option>
                        <option value="6">Secretario de Pensiones, Jubilaciones y Previsión Social</option>
                        <option value="7">Secretario de Actas y Acuerdos</option>
                        <option value="8">Secretario de Orientación Ideológica Sindical</option>
                        <option value="9">Secretario de Acción Social y Deportes</option>
                        <option value="10">Secretario del Exterior</option>
                        <option value="11">Secretario de Prensa y Propaganda</option>
                    </select>
                </div>
            </div> <div class="filtros-acciones">
                <div class="filtro-grupo" style="flex-direction: row; align-items: center; gap: 10px;">
                    <label style="margin: 0;">Ordenar por:</label>
                    <select class="ordenar_metodos" id="orden" name="orden" style="padding: 8px; width: auto;">
                        <?php if($_POST["orden"] != "") 
                            { ?>
                        <option value="<?php echo $_POST["orden"]; ?>">
                        <?php 
                        if($_POST["orden"] == '1') { echo "Ordenar por nombre"; }
                        if($_POST["orden"] == '2') { echo "Ordenar por apellidos"; }
                        if($_POST["orden"] == '3') { echo "Ordenar por curp"; }
                        if($_POST["orden"] == '4') { echo "Ordenar por fecha de ingreso reciente"; }
                        if($_POST["orden"] == '5') { echo "Ordenar por fecha de ingreso antigua"; }
                        if($_POST["orden"] == '6') { echo "Ordenar por area"; }
                        if($_POST["orden"] == '7') { echo "Ordenar por numero de empleado mayor"; }
                        if($_POST["orden"] == '8') { echo "Ordenar por numero de empleado menor"; }
                        if($_POST["orden"] == '9') { echo "Ordenar por telefono ascendente"; }
                        if($_POST["orden"] == '10') { echo "Ordenar por telefono descendente"; }
                        if($_POST["orden"] == '11') { echo "Ordenar por correo personal"; }
                        ?>
                        </option>
                        <?php  } ?>
                        <option value="">ordenar por:</option>
                        <option value="1">Ordenar por nombre</option>
                        <option value="2">Ordenar por apellidos</option>
                        <option value="3">Ordenar por curp</option> 
                        <option value="4">Ordenar por fecha de ingreso reciente</option>
                        <option value="5">Ordenar por fecha de ingreso antigua</option>
                        <option value="6">Ordenar por área</option>
                        <option value="7">Ordenar por numero de empleado mayor</option>
                        <option value="8">Ordenar por numero de empleado menor</option>
                        <option value="9">Ordenar por teléfono mayor</option>
                        <option value="10">Ordenar por teléfono menor</option>
                        <option value="11">Ordenar por correo personal</option>
                    </select>
                </div>
                
                <button type="submit" class="btn-buscar">
                    <i class="fas fa-search"></i> Buscar
                </button>
            </div>
        </div>
        <p class="resultados-count" style="text-align: center; margin-bottom: 15px; font-weight: bold; color: #555;">
            <?php echo $numerosql; ?> resultados encontrados
        </p>

    <div class="table-responsive">
    <table class="datos_ver" border ="1" style="border-collapse: collapse; width: 100%; text-align: center;">
        <tr>
            <th class="card-header">Puesto</th>
            <th class="card-header">Nombres</th>
            <th class="card-header">Apellidos</th>
            <th class="card-header">CURP</th>
            <th class="card-header">Fecha de ingreso</th>
            <th class="card-header">Area</th>
            <th class="card-header">Numero de empleado</th>
            <th class="card-header">Teléfono</th>
            <th class="card-header">Correo personal</th>
            <th class="card-header">Acciones</th>

        </tr>

        <?php while($row = $sql->fetch(PDO::FETCH_ASSOC)) 
            { ?>
        <tr>
            <td><?php echo $row["nombre_administrativo"]; ?></td>
            <td><?php echo $row["nombres"]; ?></td>
            <td><?php echo $row["apellidos"]; ?></td>
            <td><?php echo $row["curp"]; ?></td>
            <td><?php echo $row["fecha_ingreso"]; ?></td>
            <td><?php echo $row["nombre_area"]; ?></td>
            <td><?php echo $row["num_emp"]; ?></td>
            <td><?php echo $row["telefono"]; ?></td>
            <td><?php echo $row["correo_personal"]; ?></td>
            <td>
                <a href="pag_admin_acciones_sindicalizados.php?num_emp=<?php echo $row['num_emp']; ?>">
                    Acciones
                </a>
            </td>
        </tr>
        <?php } ?>
    </table>
    <br>

</form>
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