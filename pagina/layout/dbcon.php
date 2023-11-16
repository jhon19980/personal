<?php
$dbuser = 'postgres';
$dbpass = '2018.cl1nv3R';
$dbname = 'personal';
$host = 'localhost';
$port = '5432'; // Puerto predeterminado de PostgreSQL

// Intenta conectarte a PostgreSQL
try {
    $conexion = new PDO("pgsql:host=$host;port=$port;dbname=$dbname;user=$dbuser;password=$dbpass");
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conexion->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    $conexion->exec("SET NAMES 'utf8'");
    date_default_timezone_set("America/Bogota");
} catch (PDOException $e) {
    echo "Error al conectar a PostgreSQL: " . $e->getMessage();
    die();
}
?>