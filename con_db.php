<?php

ob_start();

if (session_status() === PHP_SESSION_NONE) {
    ini_set('session.cookie_httponly', 1); 
    
    session_start();
}

$host     = 'localhost';
$port     = '5432';              
$dbname   = 'sutunacardb';      
$user     = 'postgres';          
$password = '10092007'; 

$dsn = "pgsql:host=$host;port=$port;dbname=$dbname";

try 
{
    $conexion = new PDO($dsn, $user, $password);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conexion->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $conexion->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $conexion->exec("SET TIME ZONE 'America/Merida';");
    date_default_timezone_set('America/Merida');

}   catch (PDOException $e) {
    die("Error crítico de arquitectura de datos: Fallo en la conexión al servidor SUTUNACAR. " . $e->getMessage());
}