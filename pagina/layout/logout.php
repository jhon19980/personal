<?php
include 'dbcon.php';
session_start();

if(isset($_SESSION['id'])) {
    $date = date("Y-m-d H:i:s");
    $id = $_SESSION['id'];
    $remarks = "se ha desconectado del sistema";
    
    try {
        $db = new PDO("pgsql:host=$host;port=$port;dbname=$dbname;user=$dbuser;password=$dbpass");
        
        $stmt = $db->prepare("INSERT INTO history_log (user_id, action, date) VALUES (?, ?, ?)");
        $stmt->execute([$id, $remarks, $date]);
    } catch (PDOException $e) {
        die("Error en la conexión a la base de datos: " . $e->getMessage());
    }
}

session_destroy();
header('Location: ../../index.php');
?>
