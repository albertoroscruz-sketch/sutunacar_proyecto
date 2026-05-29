<?php
include_once("con_db.php");


if (!empty($_POST["entrar"])) {

    if (empty($_POST["nombre_usuario"]) && empty($_POST["password"])) {
        echo "LOS CAMPOS ESTÁN VACÍOS";
    } else {

        $nombre_usuario = $_POST["nombre_usuario"];
        $password_input = $_POST["password"];

        $stmt = $conexion->prepare(
            "SELECT * FROM usuariosprueba WHERE nombre_usuario = ?"
        );
        
        // 1. Ejecutas mandando la variable directamente
        $stmt->execute([$nombre_usuario]);
        // 2. Extraes el objeto
        $datos = $stmt->fetch(PDO::FETCH_OBJ);

        // 3. OJO AQUÍ: Usamos $datos->password en lugar de $datos->contraseña
        if ($datos && password_verify($password_input, $datos->password)) {

            $_SESSION["nombre_usuario"] = $datos->nombre_usuario;
            $_SESSION["num_emp"]        = $datos->num_emp_usuario;

            $num_emp_checar = $datos->num_emp_usuario;

            $stmt2 = $conexion->prepare(
                "SELECT id_administrativo FROM sindicalizadosprueba WHERE num_emp = ?"
            );
            $stmt2->execute([$num_emp_checar]);
            $datos_rol = $stmt2->fetch(PDO::FETCH_OBJ);

            if ($datos_rol && $datos_rol->id_administrativo == 1) {
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
