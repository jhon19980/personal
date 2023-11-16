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

// Obtener id_usuario_personal desde la URL
$id_usuario_personal = isset($_GET['id_usuario_personal']) ? $_GET['id_usuario_personal'] : null;


// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {

	// Inicializar la variable que indica si se ha llenado al menos un formulario
	$alMenosUnFormularioLleno = false;


	$usernameSCSE = $_POST["usuario_scse"];
	$passwordSCSE = $_POST["password_scse"];

	$sqlSCSE = "UPDATE usuarioxpersonal SET usuario_scse = '$usernameSCSE', password_scse = '$passwordSCSE' WHERE id_usuario_personal = $id_usuario_personal";
	$resultadoSCSE = $conexion->prepare($sqlSCSE);

	if ($resultadoSCSE && $resultadoSCSE->execute()) {
		$alMenosUnFormularioLleno = true;
		echo "Inserción exitosa en SCSE";
	} else {

	}

	// Procesar datos para el formulario Moodle

	$usuarioMoodle = $_POST["usuario_moodle"];
	$passwordMoodle = $_POST["password_moodle"];

	$sqlMoodle = "UPDATE usuarioxpersonal SET usuario_moodle = '$usuarioMoodle', password_moodle = '$passwordMoodle' WHERE id_usuario_personal = $id_usuario_personal";

	$resultadoMoodle = $conexion->prepare($sqlMoodle);

	if ($resultadoMoodle && $resultadoMoodle->execute()) {
		$alMenosUnFormularioLleno = true;
		echo "Inserción exitosa en Moodle";
	} else {

	}

	// Procesar datos para el formulario Solinux

	$usuarioCorreo = $_POST["usuario_correo"];
	$passwordCorreo = $_POST["password_correo"];

	$sqlSolinux = "UPDATE usuarioxpersonal SET usuario_correo = '$usuarioCorreo', password_correo = '$passwordCorreo' WHERE id_usuario_personal = $id_usuario_personal";
	$resultadoSolinux = $conexion->prepare($sqlSolinux);

	if ($resultadoSolinux && $resultadoSolinux->execute()) {
		$alMenosUnFormularioLleno = true;
		echo "Inserción exitosa en Solinux";
	} else {

	}


	// Repite el proceso para otros formularios según sea necesario

	// Procesar datos para el formulario APPSCV

	$usuarioAPPSCV = $_POST["usuario_appscv"];
	$passwordAPPSCV = $_POST["password_appscv"];

	$sqlAPPSCV = "UPDATE usuarioxpersonal SET usuario_appscv = '$usuarioAPPSCV', password_appscv = '$passwordAPPSCV' WHERE id_usuario_personal = $id_usuario_personal";
	$resultadoAPPSCV = $conexion->prepare($sqlAPPSCV);

	if ($resultadoAPPSCV && $resultadoAPPSCV->execute()) {
		$alMenosUnFormularioLleno = true;
		echo "Inserción exitosa en Appscv";
	} else {

	}


	// Repite el proceso para otros formularios según sea necesario

	// Procesar datos para el formulario Binaps

	$usuarioBinaps = $_POST["usuario_binaps"];
	$passwordBinaps = $_POST["password_binaps"];

	$sqlBinaps = "UPDATE usuarioxpersonal SET usuario_binaps = '$usuarioBinaps', password_binaps = '$passwordBinaps' WHERE id_usuario_personal = $id_usuario_personal";
	$resultadoBinaps = $conexion->prepare($sqlBinaps);

	if ($resultadoBinaps && $resultadoBinaps->execute()) {
		$alMenosUnFormularioLleno = true;
		echo "Inserción exitosa en Binaps";
	} else {

	}

	// Procesar datos para el formulario Gestion

	$usuarioGestion = $_POST["usuario_unoe"];
	$passwordGestion = $_POST["password_unoe"];

	$sqlGestion = "UPDATE usuarioxpersonal SET usuario_unoe = '$usuarioGestion', password_unoe = '$passwordGestion' WHERE id_usuario_personal = $id_usuario_personal";
	$resultadoGestion = $conexion->prepare($sqlGestion);

	if ($resultadoGestion && $resultadoGestion->execute()) {
		$alMenosUnFormularioLleno = true;
		echo "Inserción exitosa en Gestion";
	} else {

	}

	// Finalmente, mostrar el SweetAlert si al menos un formulario se ha llenado
	if ($alMenosUnFormularioLleno) {
		echo '<script>
	Swal.fire({
	icon: "success",
	title: "Datos Ingresados Correctamente!",
	showConfirmButton: true,
	confirmButtonText: "Cerrar"
	}).then(function(result){
	if(result.value){                   
		window.location = "generar.php";
	}
	});
</script>';
	}
}
?>