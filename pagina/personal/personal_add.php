<!--A Design by Jhon Alexander P
Author: ElectroSystem
Author URL: http://electrosistem.com.co
License: Creative Commons Attribution 1.0 Unported

-->

<!DOCTYPE html>
<html>

<head>
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>

</body>

</html>

<?php
session_start();
//include('../dbcon.php');
include('../../dist/includes/dbcon.php');

// Procesar datos del formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	// Datos de la tabla Personal
	$tipo_documento = $_POST['tipo_documento'];
	$documento = $_POST['documento'];
	$primer_apellido = $_POST['primer_apellido'];
	$segundo_apellido = $_POST['segundo_apellido'];
	$primer_nombre = $_POST['primer_nombre'];
	$segundo_nombre = $_POST['segundo_nombre'];
	$fecha_nacimiento = $_POST['fecha_nacimiento'];
	$lugar_nacimiento = $_POST['lugar_Nacimiento'];
	$telefono = $_POST['telefono'];
	$estado_civil = $_POST['estado_civil'];
	$direccion = $_POST['direccion'];
	$cargo = $_POST['cargo'];
	$barrio = $_POST['barrio'];
	$correo = $_POST['correo'];
	$salario = $_POST['salario'];
	$tipo_contrato = $_POST['tipo_contrato'];
	$usuario_registra = $_SESSION['id']; // Ajusta según el nombre de tu variable de sesión

	// Insertar en la tabla Personal
	$sql_personal = "INSERT INTO Personal (tipo_documento, documento, primer_apellido, segundo_apellido, primer_nombre, segundo_nombre, fecha_nacimiento, lugar_nacimiento, telefono, estado_civil, direccion, barrio, correo, salario, cargo, usuario_registra,estado_personal,tipo_contrato,fecha_ingreso) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 1, ?)";

	$stmt_personal = $conexion->prepare($sql_personal);
	$stmt_personal->execute([$tipo_documento, $documento, $primer_apellido, $segundo_apellido, $primer_nombre, $segundo_nombre, $fecha_nacimiento, $lugar_nacimiento, $telefono, $estado_civil, $direccion, $barrio, $correo, $salario, $cargo, $usuario_registra, $tipo_contrato,$fecha_ingreso]);

	// Obtener el id_personal recién insertado
	$id_personal = $conexion->lastInsertId();

	// Datos de la tabla cargo_personal
	$fecha_ingreso = $_POST['fecha_ingreso'];
	$sede = $_POST['sede'];
	$area = $_POST['area'];
	$cargo = $_POST['cargo'];
	$observacion = $_POST['observaciones'];
	$registro = $_POST['registro_medico'];
	$especialidades = $_POST['especialidades'];
	$remplaza = $_POST['remplaza_a'];


	// Insertar en la tabla cargo_personal
	$sql_cargo = "INSERT INTO cargo_personal (id_personal, id_cargo, fecha_ingreso, sede, area, cargo, observacion,registro_medico, especialidades, remplaza_a) 
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

	// Obtener el id_cargo correspondiente al nombre del cargo
	$sql_get_cargo_id = "SELECT id_cargo FROM cargo WHERE nombre_cargo = ?";
	$stmt_get_cargo_id = $conexion->prepare($sql_get_cargo_id);
	$stmt_get_cargo_id->execute([$cargo]);
	$id_cargo = $stmt_get_cargo_id->fetchColumn();

	$stmt_cargo = $conexion->prepare($sql_cargo);
	$stmt_cargo->execute([$id_personal, $id_cargo, $fecha_ingreso, $sede, $area, $cargo, $observacion, $registro, $especialidades, $remplaza]);

	// Obtener el id_cargo_personal recién insertado
	$id_cargo_personal = $conexion->lastInsertId();

	// Datos de la tabla servicios
	$id_servicios = isset($_POST['id_servicios']) ? $_POST['id_servicios'] : [];

	// Insertar en la tabla servicios
	$sql_servicios = "INSERT INTO serviciosxpersonal (id_personal, id_servicios) VALUES (?, ?)";
	$stmt_servicios = $conexion->prepare($sql_servicios);

	foreach ($id_servicios as $id_servicio) {
		$stmt_servicios->execute([$id_personal, $id_servicio]);
	}


	// Obtener el id_servicios recién insertado
	$id_servicios = $conexion->lastInsertId(); // Ajusta según la secuencia de tu tabla

	// Insertar en la tabla usuarioxpersonal
	$sql_usuarioxpersonal = "INSERT INTO usuarioxpersonal (id_personal, id_cargo, id_servicios, fecha_ingreso, usuario_registro,scse_activo,moodle_activo,correo_activo,appscv_activo,binaps_activo,unoe_activo)
	VALUES (?, ?, ?, ?, ?, 1, 1, 1, 1, 1, 1)";

	$stmt_usuarioxpersonal = $conexion->prepare($sql_usuarioxpersonal);
	$stmt_usuarioxpersonal->execute([$id_personal, $id_cargo, $id_servicio, $fecha_ingreso, $usuario_registra]);

	// Insertar en la tabla tipo_contrato
	$tipo_contrato = $_POST['tipo_contrato'];

	$sql_tipo_contrato = "INSERT INTO tipo_contrato (id_personal, documento, tipo) VALUES (?, ?, ?)";
	$stmt_tipo_contrato = $conexion->prepare($sql_tipo_contrato);
	$stmt_tipo_contrato->execute([$id_personal, $documento, $tipo_contrato]);

	// Obtener el id_tipo_contrato recién insertado
	$id_tipo_contrato = $conexion->lastInsertId();

	// Redireccionar a la página de éxito o manejar según sea necesario
	echo '<script>
		setTimeout(function(){
			Swal.fire({
				icon: "success",
				title: "Datos ingresados correctamente",
				showConfirmButton: false,
				timer: 900
			}).then(function() {
				window.location = "personal.php";
			});
		}, 100);
	</script>';
	exit();
}
?>