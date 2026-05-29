<?php
$host     = 'dpg-d8cfp299rddc73d97bm0-a';
$port     = '5432';              
$dbname   = 'sutunacar_db';      
$user     = 'sutunacar_db_user';          
$password = 'SDXgKbQRunvs8DareP936UDYIoedhmpy';

try {
    // Se establece la conexión con PostgreSQL usando PDO
    $conexion = new PDO("pgsql:host=$host;port=$port;dbname=$dbname", $user, $password);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
}
?>