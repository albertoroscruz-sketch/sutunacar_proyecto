<?php


ob_start();
session_start();
include("con_db.php");

if (!empty($_POST["entrar"])) {

    if (empty($_POST["nombre_usuario"]) && empty($_POST["password"])) {
        echo "LOS CAMPOS ESTÁN VACÍOS";
    } else {

        $nombre_usuario = $_POST["nombre_usuario"];
        $password_input = $_POST["password"];

        $stmt = $conexion->prepare(
            "SELECT * FROM usuariosprueba WHERE nombre_usuario = ?"
        );
        $stmt->bind_param("s", $nombre_usuario);
        $stmt->execute();
        $resultado = $stmt->get_result();
        $datos = $resultado->fetch_object();
        $stmt->close();

        if ($datos && password_verify($password_input, $datos->contraseña)) {

            $_SESSION["nombre_usuario"] = $datos->nombre_usuario;
            $_SESSION["num_emp"]        = $datos->num_emp_usuario;

            $num_emp_checar = $datos->num_emp_usuario;

            $stmt2 = $conexion->prepare(
                "SELECT id_administrativo FROM sindicalizadosprueba WHERE num_emp = ?"
            );
            $stmt2->bind_param("s", $num_emp_checar);
            $stmt2->execute();
            $res2 = $stmt2->get_result();
            $resultado_administrativo = $res2->fetch_object();
            $stmt2->close();

            if ($resultado_administrativo && $resultado_administrativo->id_administrativo == 1) {
                header("location: pag_inicio.php");
            } else {
                header("location: pag_inicio_admin.php");
            }
            exit();

        } else {
            echo "ACCESO DENEGADO, ASEGURESE DE HABERSE REGISTRADO PRIMERO";
        }
    }
}
?>
