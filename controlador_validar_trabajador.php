<?php
ob_start();
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include("con_db.php");

if (!empty($_POST["btnvalidar"])) {

    if (empty($_POST["correo_institucional"]) || empty($_POST["num_emp"])) {
        echo '<div style="background-color: #fff3cd; color: #856404; padding: 12px; border-radius: 8px; margin-bottom: 20px; font-size: 0.9rem; text-align: center; border: 1px solid #ffeeba;">
                <i class="fas fa-exclamation-triangle"></i> Por favor, llena ambos campos.
              </div>';
    } else {

        $correo_institucional = $_POST["correo_institucional"];
        $num_emp              = $_POST["num_emp"];

        $stmt = $conexion->prepare(
            "SELECT * FROM sindicalizadosprueba WHERE correo_institucional = ? AND num_emp = ?"
        );
        $stmt->execute([$correo_institucional, $num_emp]);
        $datos = $stmt->fetch(PDO::FETCH_OBJ);

        if ($datos) {
            $num_emp_checar = $datos->num_emp;

            $stmt2 = $conexion->prepare(
                "SELECT * FROM usuariosprueba WHERE num_emp_usuario = ?"
            );
            $stmt2->execute([$num_emp_checar]);

            if ($stmt2->rowCount() > 0) {
                echo '<div style="background-color: #e3f2fd; color: #1565c0; padding: 12px; border-radius: 8px; margin-bottom: 20px; font-size: 0.9rem; text-align: center; border: 1px solid #bbdefb;">
                        <i class="fas fa-info-circle"></i> Ya tienes una cuenta activa. Por favor, inicia sesión.
                      </div>';
            } else {
                $_SESSION["num_emp"] = $datos->num_emp;
                header("location: pag_registro.php");
                exit();
            }
        } else {
            echo '<div style="background-color: #fff3cd; color: #856404; padding: 15px; border-radius: 8px; margin-bottom: 20px; font-size: 0.9rem; text-align: center; border: 1px solid #ffeeba; line-height: 1.4;">
                    <i class="fas fa-info-circle" style="font-size: 1.2rem; margin-bottom: 5px; display: block;"></i> 
                    <strong>Tu registro aún no se encuentra en el sistema.</strong><br>
                    Actualmente nos encontramos en la fase de carga de información. La base de datos se estará actualizando progresivamente con los expedientes faltantes. Por favor, intenta validarte más adelante.
                  </div>';
        }
    }
}
?>
