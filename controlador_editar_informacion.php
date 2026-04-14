<?php

    include("con_db.php");

    if (!empty($_POST['btnactualizar']))
        {

            $curp = $_POST["curp"];
            $nombres = $_POST["nombres"];
            $apellidos = $_POST["apellidos"];
            $correo_personal = $_POST["correo_personal"];
            $telefono = $_POST["telefono"];
            $id_area = $_POST["id_area"];
            $nombre_usuario = $_POST["nombre_usuario"];
            $contraseña = md5($_POST["contraseña"]);
            $fecha_ingreso = $_POST["fecha_ingreso"];

            $actualizar_foto = "";
            $nombre_foto = $_FILES['foto']['name'];
            $ruta_temporal = $_FILES['foto']['tmp_name'];
            $carpeta = "fotos/";
            
            if (!empty($nombre_foto))
            {
                $ruta_final = $carpeta . $nombre_foto;
                if (move_uploaded_file($ruta_temporal, $ruta_final))
                    {
                        $actualizar_foto = ", foto = '$nombre_foto'";
                    }
                else
                    {
                        echo "Error: No se pudo actualizar la foto";
                    }
            }

            $corregir_datos = $conexion->query("UPDATE sindicalizadosprueba SET 
            nombres = '$nombres',
            apellidos = '$apellidos',
            correo_personal = '$correo_personal',
            telefono = '$telefono',
            id_area = '$id_area',
            fecha_ingreso = '$fecha_ingreso'
            $actualizar_foto
            WHERE curp = '$curp'");

            $corregir_usuario = $conexion->query("UPDATE usuariosprueba SET 
            nombre_usuario = '$nombre_usuario',
            contraseña = '$contraseña'
            WHERE curp_usuario = '$curp'");

            if ($corregir_datos && $corregir_usuario) 
                {
                    echo "<div style='color:green;'>DATOS CAMBIADOS CORRECTAMENTE</div>";
                    header("refresh:2; url=pag_index.php");
                } 
            else 
            {
                echo "<div style='color:red;'>ERROR Al cambiar los datos en LA BASE DE DATOS: " . $conexion->error . "</div>";
            }

        }
?>