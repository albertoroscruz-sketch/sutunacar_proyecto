<?php
ob_start();
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
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

 <main style="display: flex; justify-content: center; align-items: center; padding: 38.5px ;">
    <section class="profile-section">
        
        <div class="profile-header">
            <i class="fas fa-id-card-alt"></i>
            <h2>Registro para validar identidad</h2>
        </div>

        <div class="profile-content" style="display: block;" >
            
            <div class="alerta-mensajes" style="text-align: center; font-weight: bold; margin-bottom: 10px;">
                <?php include("controlador_validar_trabajador.php"); ?>
            </div>

            <form method="post">
                <table class="profile-table">
                    <tr>
                        <td class="profile-label">Correo institucional:</td>
                        <td class="profile-value" style="padding: 0;">
                            <input type="text" name="correo_institucional" placeholder="Ingresa tu Correo" required
                                   style="width: 100%; border: none; padding: 15px; outline: none; background: transparent; font-family: inherit;">
                        </td>
                    </tr>
                    <tr>
                        <td class="profile-label">No. empleado:</td>
                        <td class="profile-value" style="padding: 0;">
                            <input type="number" name="num_emp" placeholder="Ingresa el número de empleado" required
                                   style="width: 100%; border: none; padding: 15px; outline: none; background: transparent; font-family: inherit;">
                        </td>
                    </tr>
                </table>

                <div class="profile-actions" style="border-top: 1px solid var(--gray-line); margin-top: 30px; padding-top: 20px; display: flex; justify-content: center; align-items: center; gap: 30px;">
                    
                    <a href="pag_index.php" style="text-decoration: none; color: var(--blue-brand); font-weight: bold; display: flex; align-items: center; gap: 8px; font-size: 15px;">
                        <i class="fas fa-arrow-left"></i> Iniciar sesión
                    </a>

                    <button type="submit" name="btnvalidar" value="validar" style="background: none; border: none; color: var(--blue-brand); font-weight: bold; display: flex; align-items: center; gap: 8px; font-size: 15px; cursor: pointer; font-family: inherit;">
                        Validar identidad <i class="fas fa-arrow-right"></i>
                    </button>
                </div>
            </form>
        </div>
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