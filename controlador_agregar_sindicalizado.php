<?php


ob_start();

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include("con_db.php");

if (!empty($_POST['btnagregar'])) {

    $id_administrativo   = $_POST["id_administrativo"];
    $num_emp             = $_POST["num_emp"];
    $curp                = $_POST["curp"];
    $correo_institucional = $_POST["correo_institucional"];

    // Verificar duplicado
    $stmt_check = $conexion->prepare(
        "SELECT num_emp FROM sindicalizadosprueba WHERE num_emp = ?"
    );
    $stmt_check->bind_param("s", $num_emp);
    $stmt_check->execute();
    $stmt_check->store_result();

    if ($id_administrativo > 1) 
        {
            $checar_puesto = $conexion->query("SELECT id_administrativo FROM sindicalizadosprueba WHERE id_administrativo = '$id_administrativo'");
            
            if ($checar_puesto->num_rows > 0) 
            {
                echo "<div class='div_error' style='color:red;'>ERROR: Ese puesto administrativo ya está ocupado por otra persona.</div>";
                header("refresh:2; url=pag_agregar_sindicalizado.php");
                exit();
            }
        }

    if ($stmt_check->num_rows > 0) {
        $stmt_check->close();
        echo "<div class='div_error' style='color:red;'>EL SINDICALIZADO YA EXISTE (Verifica el número de empleado)</div>";
        header("refresh:2; url=pag_agregar_sindicalizado.php");
        exit();
    }
    $stmt_check->close();

    $insertar_sindicalizado = $conexion->prepare(
        "INSERT INTO `sindicalizadosprueba`(`id_administrativo`, `curp`, `correo_institucional`, `num_emp`, `nombres`, `apellidos`, `id_area`, `foto`, `telefono`, `correo_personal`, `fecha_ingreso`, `comentarios`) 
            VALUES ('$id_administrativo','$curp','$correo_institucional','$num_emp','','','0','','','', NULL,'')");


    if ($insertar_sindicalizado->execute()) 
        {
        echo "<div class='si_se_pudo' style='color:green;'>SINDICALIZADO AGREGADO CORRECTAMENTE!</div>";
        header("refresh:2; url=pag_inicio_admin.php");
        exit();
        }  
        else 
        {
        echo "<div class='div_error' style='color:red;'>ERROR EN LA BASE DE DATOS: " . $conexion->error . "</div>";
        header("refresh:2; url=pag_agregar_sindicalizado.php");
        exit();
        }
}
?>
