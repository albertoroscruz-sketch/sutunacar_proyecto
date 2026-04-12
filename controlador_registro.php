<?php

    include("con_db.php");

    if (!empty($_POST['btnregistro']))
        {
            $nombre_usuario = $_POST["nombre_usuario"];
            $contraseña = md5($_POST["contraseña"]);

            $curp = $_SESSION["curp_validada"];
            $nombres = $_POST["nombres"];
            $apellidos = $_POST["apellidos"];
            $correo_personal = $_POST["correo_personal"];
            $telefono = $_POST["telefono"];
            $id_area = $_POST["id_area"];
            $fecha_ingreso = $_POST["fecha_ingreso"];

            $nombre_foto = $_FILES['foto']['name'];
            $ruta_temporal = $_FILES['foto']['tmp_name'];
            $carpeta = "fotos/";
            $ruta_final = $carpeta . $nombre_foto;

            if (!empty($nombre_foto))
            {
                if (move_uploaded_file($ruta_temporal, $ruta_final))
                    {
                        $consulta_datos = $conexion->query("UPDATE sindicalizadosprueba SET 
                        nombres = '$nombres',
                        apellidos = '$apellidos',
                        correo_personal = '$correo_personal',
                        telefono = '$telefono',
                        id_area = '$id_area',
                        foto = '$nombre_foto' 
                        WHERE curp = '$curp'");

                        $insertar_usuario = $conexion->query("INSERT INTO `usuariosprueba`(`nombre_usuario`, `contraseña`, `curp_usuario`) 
                        VALUES ('$nombre_usuario', '$contraseña', '$curp')");
                    
                
                        if ($consulta_datos && $insertar_usuario) 
                        {
                            echo "<div style='color:green;'>¡DATOS GUARDADOS CORRECTAMENTE!</div>";
                            unset($_SESSION["curp_validada"]);
                            header("refresh:2; url=pag_index.php");
                        } 
                        else 
                        {
                            echo "<div style='color:red;'>ERROR EN LA BASE DE DATOS: " . $conexion->error . "</div>";
                        }

                    } 
                else 
                    {
                    echo "<div style='color:red;'>ERROR: No se pudo mover la foto a la carpeta.</div>";
                    }
            }
            else 
            {
                echo "<div style='color:red;'>ERROR: Selecciona una foto primero.</div>";
            }
        }
         
?>