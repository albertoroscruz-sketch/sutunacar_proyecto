<?php
session_start();
include("con_db.php");

// 1. Validar sesión
if (empty($_SESSION["num_emp"])) {
    header("location: pag_index.php");
    exit();
}

$admin_actual = $_SESSION["num_emp"];

// 2. Validar rol de administrador
$checar_rol = $conexion->query("SELECT id_administrativo FROM sindicalizadosprueba WHERE num_emp = '$admin_actual'");
$respuesta_rol = $checar_rol->fetch_object();

if (!$respuesta_rol || $respuesta_rol->id_administrativo == 1) {
    header("location: pag_inicio.php");
    exit();
}

// 3. Validar envío de num_emp
if (empty($_GET['num_emp'])) {
    header("location: pag_consultas.php");
    exit();
}

$num_emp_ver = $_GET['num_emp'];

// 4. Consulta con Joins para traer nombres de puesto y área
$consulta_sql = "
    SELECT s.*, a.nombre_administrativo, ar.nombre_area 
    FROM sindicalizadosprueba s
    LEFT JOIN administrativosprueba a ON s.id_administrativo = a.id_administrativo
    LEFT JOIN areasprueba ar ON s.id_area = ar.id_area
    WHERE s.num_emp = '$num_emp_ver'
";

$consulta = $conexion->query($consulta_sql);
$datos = $consulta->fetch_object();

if (!$datos) { 
    die("Usuario no encontrado."); 
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SUTUNACAR - Gestión de Usuario</title>
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


<div class="main-container">
    <a href="pag_consultas.php" class="btn-back">
        <i class="fas fa-arrow-left"></i> Regresar a la lista
    </a>

<div class="expediente-simple">
    <h2>Expediente del Trabajador</h2>

    <div class="dato-linea">
        <strong>Nombre Completo:</strong>
        <span><?php echo ucwords(strtolower($datos->nombres . " " . $datos->apellidos)); ?></span>
    </div>

    <div class="dato-linea">
        <strong>N° Empleado:</strong>
        <span><?php echo $datos->num_emp; ?></span>
    </div>

    <div class="dato-linea">
        <strong>Rango Actual:</strong>
        <span>
            <?php 
                if($datos->id_administrativo > 1) 
                {
                    echo "Administrador - " . ucfirst(str_replace('_', ' ', $datos->nombre_administrativo));
                } 
                else 
                {
                    echo "Sindicalizado Normal";
                }
            ?>
        </span>
    </div>

    <div class="dato-linea">
        <strong>CURP:</strong>
        <span><?php echo strtoupper($datos->curp); ?></span>
    </div>

    <div class="dato-linea">
        <strong>Área / Departamento:</strong>
        <span><?php echo $datos->nombre_area; ?></span>
    </div>

    <div class="dato-linea">
        <strong>Teléfono:</strong>
        <span><?php echo $datos->telefono; ?></span>
    </div>

    <div class="dato-linea">
        <strong>Correo Personal:</strong>
        <span><?php echo strtolower($datos->correo_personal); ?></span>
    </div>

    <div class="dato-linea">
        <strong>Fecha de Ingreso:</strong>
        <span><?php echo $datos->fecha_ingreso; ?></span>
    </div>
</div>

    <?php if ($datos->num_emp == $_SESSION["num_emp"]): ?>
        <div class="warning-self">
            <i class="fas fa-exclamation-triangle"></i> 
            Estás viendo tu propio perfil. Por seguridad, no puedes realizar acciones sobre tu cuenta desde aquí.
        </div>
    <?php else: ?>
        <div class="contenedor-acciones">
            
            <form action="controlador_ascender.php" method="POST" class="form-ascenso">
                <input type="hidden" name="num_emp" value="<?php echo $datos->num_emp; ?>">
                <select name="nuevo_rol" class="select-rol" required>
                    <option value="">Seleccionar puesto disponible...</option>
                    <?php 
                    $puestos_libres = $conexion->query("SELECT * FROM administrativosprueba WHERE id_administrativo NOT IN (SELECT id_administrativo FROM sindicalizadosprueba WHERE id_administrativo > 1) AND id_administrativo > 1");
                    while($puesto = $puestos_libres->fetch(PDO::FETCH_OBJ)): ?>
                        <option value="<?php echo $puesto->id_administrativo; ?>">
                            <?php echo ucfirst(str_replace('_', ' ', $puesto->nombre_administrativo)); ?>
                        </option>
                    <?php endwhile; ?>
                </select>
                <button type="submit" class="btn-panel btn-asc">
                    <i class="fas fa-user-shield"></i> Ascender
                </button>
            </form>

            <?php if($datos->id_administrativo > 1): ?>
                <a href="controlador_degradar.php?num_emp=<?php echo $datos->num_emp; ?>" class="btn-panel btn-deg">
                    <i class="fas fa-user-minus"></i> Degradar a Normal
                </a>
            <?php endif; ?>

            <a href="controlador_eliminar_sindicalizado.php?num_emp=<?php echo $datos->num_emp; ?>" 
               class="btn-panel btn-del" 
               onclick="return confirm('¿Está seguro de eliminar permanentemente este registro?');">
                <i class="fas fa-trash-alt"></i> Eliminar Registro
            </a>
        </div>
    <?php endif; ?>
</div>

<footer class="main-footer" style="margin-top: 60px;">
    <h6>Si tiene problemas técnicos, contacte al soporte del sistema.</h6>
    <h6>DIRECCIÓN: Av. Concordia #24, Col. Benito Juárez, Ciudad del Carmen, Campeche.</h6>
    <h6>Contacto: +52 938 3811018</h6>
    <div style="margin-top: 15px;">
        <a href="https://www.unacar.mx/" style="color: white; margin-right: 20px;">Portal UNACAR</a>
        <a href="https://www.sutunacar.org/" style="color: white;">Portal SUTUNACAR</a>
    </div>
</footer>

</body>
</html>