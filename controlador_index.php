<?php
session_start();
include("con_db.php");

    if (!empty($_POST["entrar"]))
        {
            if(empty($_POST["nombre_usuario"]) and empty($_POST["contraseña"]))
            {
                echo "LOS CAMPOS ESTAN VACIOS";
            }
                else
                {
                    $nombre_usuario = $_POST["nombre_usuario"];
                    $contraseña = md5($_POST["contraseña"]);

                    $consulta = $conexion ->query("select*from usuariosprueba where nombre_usuario='$nombre_usuario' and contraseña='$contraseña'");
                    if ($datos=$consulta->fetch_object()) 
                    {
                    
                    $_SESSION["nombre_usuario"] = $datos->nombre_usuario;
                    $_SESSION["curp_inicio"] = $datos->curp_usuario;
                    
                    header("location: pag_inicio.php");
                    } 
                    else 
                    {
                        
                        echo "ACCESO DENEGADO";
                    }
                    
                }
        }

?>