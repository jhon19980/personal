<?php
include('../../dist/includes/dbcon.php');

// Recibe la cédula del formulario
$documento = $_POST['documento'];

// Realiza la consulta a la base de datos para obtener la información del empleado según la cédula
$sql = "SELECT * FROM personal WHERE documento = ?";
$stmt = $conexion->prepare($sql);
$stmt->execute([$documento]);
$datos_empleado = $stmt->fetch(PDO::FETCH_ASSOC);

// Asegúrate de incluir el id_personal en los datos que devuelves
$datos_empleado['id_personal'] = $datos_empleado['id_personal'];

// Devuelve los datos como JSON
header('Content-Type: application/json');
echo json_encode($datos_empleado);

?>
