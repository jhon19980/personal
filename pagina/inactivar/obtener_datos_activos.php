<?php
include('../../dist/includes/dbcon.php');

// Recibe la cédula del formulario
$documentos = $_POST['documento'];

// Realiza la consulta a la base de datos para obtener la información del empleado según la cédula
$sql = "SELECT * FROM personal WHERE documento = ?";
$stmt = $conexion->prepare($sql);
$stmt->execute([$documentos]);
$datos_empleados = $stmt->fetch(PDO::FETCH_ASSOC);

// Asegúrate de incluir el id_personal en los datos que devuelves
$datos_empleados['id_personal'] = $datos_empleados['id_personal'];

// Devuelve los datos como JSON
header('Content-Type: application/json');
echo json_encode($datos_empleados);

?>
