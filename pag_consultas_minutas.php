<?php
session_start();
include("controlador_inicio.php");
include("controlador_consultas_minutas.php");
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

<div class="barra-navegacion">
    <a href="pag_datos_admin.php" class="btn-nav">
        <i class="fas fa-arrow-left"></i> Regresar
    </a>
</div>

<main>
    <section class="profile-section profile-section--wide">
        <div class="profile-header">
            <h2>Consulta de Minutas</h2>
        </div>

        <form class="tabla-consultas" action="pag_consultas_minutas.php" method="POST" id="consulta" name="consulta">
            <h3>Filtros de búsqueda</h3>

            <div class="filtros-grid">
                <div class="filtro-grupo">
                    <label>Tema:</label>
                    <input type="text" name="temas_buscar" value="<?php echo htmlspecialchars($_POST["temas_buscar"] ?? ''); ?>">
                </div>
                <div class="filtro-grupo">
                    <label>Acuerdos:</label>
                    <input type="text" name="acuerdos_buscar" value="<?php echo htmlspecialchars($_POST["acuerdos_buscar"] ?? ''); ?>">
                </div>
                <div class="filtro-grupo">
                    <label>Descripción:</label>
                    <input type="text" name="descripcion_buscar" value="<?php echo htmlspecialchars($_POST["descripcion_buscar"] ?? ''); ?>">
                </div>
                <div class="filtro-grupo">
                    <label>Fecha reunión desde:</label>
                    <input type="date" name="fecha_reunion_minuta_desde" value="<?php echo htmlspecialchars($_POST["fecha_reunion_minuta_desde"] ?? ''); ?>">
                </div>
                <div class="filtro-grupo">
                    <label>Fecha reunión hasta:</label>
                    <input type="date" name="fecha_reunion_minuta_hasta" value="<?php echo htmlspecialchars($_POST["fecha_reunion_minuta_hasta"] ?? ''); ?>">
                </div>
                <div class="filtro-grupo">
                    <select name="orden">
                        <option value="">Ordenar por:</option>
                        <option value="1" <?php if(($_POST["orden"] ?? '') == '1') echo 'selected'; ?>>Ordenar por tema</option>
                        <option value="2" <?php if(($_POST["orden"] ?? '') == '2') echo 'selected'; ?>>Ordenar por acuerdos</option>
                        <option value="3" <?php if(($_POST["orden"] ?? '') == '3') echo 'selected'; ?>>Ordenar por descripción</option>
                        <option value="4" <?php if(($_POST["orden"] ?? '') == '4') echo 'selected'; ?>>Fecha de reunión reciente</option>
                        <option value="5" <?php if(($_POST["orden"] ?? '') == '5') echo 'selected'; ?>>Fecha de reunión antigua</option>
                    </select>
                </div>
            </div>

            <div class="filtros-acciones">
                <input type="submit" value="Buscar" class="btn-buscar">
                <p class="resultados-count"><?php echo $numerosql; ?> resultado(s) encontrado(s)</p>
            </div>

            <div class="table-responsive">
                <table class="datos-ver" border="1">
                    <tr>
                        <th class="card-header">Tema</th>
                        <th class="card-header">Acuerdos</th>
                        <th class="card-header">Descripción</th>
                        <th class="card-header">Fecha de reunión</th>
                        <th class="card-header">Descargar</th>
                    </tr>
                    <?php while ($row = $sql->fetch(PDO::FETCH_ASSOC)) { ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row["tema_minuta"]); ?></td>
                        <td><?php echo htmlspecialchars($row["acuerdos_minuta"]); ?></td>
                        <td><?php echo htmlspecialchars($row["descripcion_minuta"]); ?></td>
                        <td><?php echo htmlspecialchars($row["fecha_reunion_minuta"]); ?></td>
                        <td><a href="descargar_minuta_oficial.php?id_minuta=<?php echo $row['id_minuta']; ?>">Descargar Word</a></td>
                    </tr>
                    <?php } ?>
                </table>
            </div>
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
