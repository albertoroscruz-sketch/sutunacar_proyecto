<?php
    include("con_db.php");
    
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

<main>
    <section class="profile-section" style="max-width: 500px; margin-top: 60px;">
        <div class="profile-header">
            <i class="fas fa-lock"></i>
            <h2>INICIO DE SESIÓN</h2>
        </div>
<?php
    include("controlador_index.php");
    
    ?>

        <form method="post" style="padding: 20px;">
    <div style="position: relative; margin-bottom: 20px;">
        <i class="fas fa-user" style="position: absolute; left: 15px; top: 50%; transform: translateY(-50%); color: #4a90e2; font-size: 1.2rem;"></i>
        <input type="text" name="nombre_usuario" placeholder="Usuario" required 
               style="width: 100%; padding: 12px 12px 12px 45px; border: 1px solid #d1d1d1; border-radius: 8px; font-size: 1rem; color: #474747;">
    </div>

    <div style="position: relative; margin-bottom: 25px;">
        <i class="fas fa-lock" style="position: absolute; left: 15px; top: 50%; transform: translateY(-50%); color: #4a90e2; font-size: 1.2rem;"></i>
        <input type="password" name="password" placeholder="Contraseña" required
               style="width: 100%; padding: 12px 12px 12px 45px; border: 1px solid #d1d1d1; border-radius: 8px; font-size: 1rem; color: #474747;">
    </div>

        <input type="submit" name="entrar" value="INICIAR SESIÓN" 
        style="width: 100%; padding: 12px; background: #004A99; color: white; border: none; border-radius: 8px; cursor: pointer; font-weight: bold; font-size: 1rem; margin-bottom: 15px; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">

    <div style="text-align: center; margin-top: 20px; border-top: 1px solid #e0e0e0; padding-top: 20px;">
        <p style="margin-bottom: 12px; color: #555; font-size: 0.95rem;">¿Es tu primera vez en el sistema?</p>
        
        <a href="pag_validar_trabajador.php" 
           style="display: inline-block; width: 100%; padding: 12px; text-align: center; border: 2px solid #004A99; color: #004A99; text-decoration: none; border-radius: 8px; font-weight: bold; font-size: 1rem; box-sizing: border-box; transition: background 0.3s;">
           VALIDAR IDENTIDAD Y REGISTRARSE
        </a>
    </div>
</form>
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