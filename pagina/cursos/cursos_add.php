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
	$id_personal = $_POST['id_persona'];
	$id_curso = $_POST['id_curso'];
	$fecha_curso = $_POST['fecha_del_curso'];
	$lugar = $_POST['lugar'];
	$fecha_caducidad = $_POST['fecha_caducidad'];

	$usuario_registra = $_SESSION['id']; // Ajusta según el nombre de tu variable de sesión

	// Insertar en la tabla Personal
	$sql_personal = "INSERT INTO cursoxpersonal (id_persona, id_curso, fecha_del_curso, lugar, fecha_caducidad, estado, usuario_registra) 
                VALUES (?, ?, ?, ?, ?, 1, ?)";

	try {
		$stmt_personal = $conexion->prepare($sql_personal);
		$stmt_personal->execute([$id_personal, $id_curso, $fecha_curso, $lugar, $fecha_caducidad, $usuario_registra]);
	} catch (PDOException $e) {
		// Manejar el error, por ejemplo, mostrando un mensaje de error.
		echo 'Error al ejecutar la consulta: ' . $e->getMessage();
		exit();
	}



	// Redireccionar a la página de éxito o manejar según sea necesario
	echo '<script>
	Swal.fire({
	icon: "success",
	title: "Datos Ingresados Correctamente!",
	showConfirmButton: true,
	confirmButtonText: "Cerrar"
	}).then(function(result){
	if(result.value){                   
		window.location = "cursos.php";
	}
	});
</script>';
}
?>