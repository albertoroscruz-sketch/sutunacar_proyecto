<?php

include("con_db.php");


    if (!empty($_POST["btnvalidar"]))
        {
            if(empty($_POST["curp"]) and empty($_POST["correo"]))
            {
                echo "RELLENA LA CURP Y EL CORREO PORFAVOR";
            }
                else
                {
                    $curp = $_POST["curp"];
                    $num_emp = $_POST["num_emp"];

                    $consulta = $conexion ->query("select*from sindicalizadosprueba where curp='$curp' and num_emp='$num_emp'");
                    if ($datos=$consulta->fetch_object()) 
                    {
                        $curp_igual = $datos->curp;
                        $checar_usuario = $conexion->query("select*from usuariosprueba where curp_usuario='$curp_igual'");
                        if ($checar_usuario-> num_rows > 0)
                            {
                                echo "YA TIENES UNA CUENTA ACTIVA, ASI QUE INICIA SESIÓN";
                            }
                            else
                                {
                                    $_SESSION["curp_validada"]=$datos->curp;
                                    $_SESSION["num_emp_validada"]=$datos->num_emp;

                                    header("location: pag_registro.php");
                                    exit();
                                }
                    } else {
                        echo "ACCESO DENEGADO curp y número de empleado no encontrados";
                    }
                    
                }
        }

?>
