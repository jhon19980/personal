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


	// Procesar datos para el formulario SCSE
	$usernameSCSE = isset($_POST["usuario_scse"]) ? $_POST["usuario_scse"] : '';
	$passwordSCSE = isset($_POST["password_scse"]) ? $_POST["password_scse"] : '';

	if (!empty($usernameSCSE) || !empty($passwordSCSE)) {

		$sqlSCSE = "UPDATE usuarioxpersonal SET usuario_scse = '$usernameSCSE', password_scse = '$passwordSCSE' WHERE id_usuario_personal = $id_usuario_personal";
		$resultadoSCSE = $conexion->prepare($sqlSCSE);

		if ($resultadoSCSE && $resultadoSCSE->execute()) {
			$alMenosUnFormularioLleno = true;
		} else {
		}
	}
	// Procesar datos para el formulario Moodle

	// Procesar datos para el formulario Moodle
	$usuarioMoodle = isset($_POST["usuario_moodle"]) ? $_POST["usuario_moodle"] : '';
	$passwordMoodle = isset($_POST["password_moodle"]) ? $_POST["password_moodle"] : '';

	if (!empty($usuarioMoodle) || !empty($passwordMoodle)) {
		$sqlMoodle = "UPDATE usuarioxpersonal SET usuario_moodle = '$usuarioMoodle', password_moodle = '$passwordMoodle' WHERE id_usuario_personal = $id_usuario_personal";

		$resultadoMoodle = $conexion->prepare($sqlMoodle);

		if ($resultadoMoodle && $resultadoMoodle->execute()) {
			$alMenosUnFormularioLleno = true;
		} else {
		}
	}

	// Procesar datos para el formulario Solinux

	// Procesar datos para el formulario Correo
	$usuarioCorreo = isset($_POST["usuario_correo"]) ? $_POST["usuario_correo"] : '';
	$passwordCorreo = isset($_POST["password_correo"]) ? $_POST["password_correo"] : '';

	if (!empty($usuarioCorreo) || !empty($passwordCorreo)) {
		$sqlSolinux = "UPDATE usuarioxpersonal SET usuario_correo = '$usuarioCorreo', password_correo = '$passwordCorreo' WHERE id_usuario_personal = $id_usuario_personal";
		$resultadoSolinux = $conexion->prepare($sqlSolinux);

		if ($resultadoSolinux && $resultadoSolinux->execute()) {
			$alMenosUnFormularioLleno = true;
		} else {
		}
	}

	// Repite el proceso para otros formularios según sea necesario

	// Procesar datos para el formulario APPSCV

	// Procesar datos para el formulario APPSCV
	$usuarioAPPSCV = isset($_POST["usuario_appscv"]) ? $_POST["usuario_appscv"] : '';
	$passwordAPPSCV = isset($_POST["password_appscv"]) ? $_POST["password_appscv"] : '';

	if (!empty($usuarioAPPSCV) || !empty($passwordAPPSCV)) {
		$sqlAPPSCV = "UPDATE usuarioxpersonal SET usuario_appscv = '$usuarioAPPSCV', password_appscv = '$passwordAPPSCV' WHERE id_usuario_personal = $id_usuario_personal";
		$resultadoAPPSCV = $conexion->prepare($sqlAPPSCV);

		if ($resultadoAPPSCV && $resultadoAPPSCV->execute()) {
			$alMenosUnFormularioLleno = true;
		} else {
		}
	}
	// Repite el proceso para otros formularios según sea necesario

	// Procesar datos para el formulario Binaps

	$usuarioBinaps = isset($_POST["usuario_binaps"]) ? $_POST["usuario_binaps"] : '';
	$passwordBinaps = isset($_POST["password_binaps"]) ? $_POST["password_binaps"] : '';

	if (!empty($usuarioBinaps) || !empty($passwordBinaps)) {

		$sqlBinaps = "UPDATE usuarioxpersonal SET usuario_binaps = '$usuarioBinaps', password_binaps = '$passwordBinaps' WHERE id_usuario_personal = $id_usuario_personal";
		$resultadoBinaps = $conexion->prepare($sqlBinaps);

		if ($resultadoBinaps && $resultadoBinaps->execute()) {
			$alMenosUnFormularioLleno = true;
		} else {
		}
	}

	// Procesar datos para el formulario Gestion

	// Procesar datos para el formulario Gestion (UNOE)
	$usuarioGestion = isset($_POST["usuario_unoe"]) ? $_POST["usuario_unoe"] : '';
	$passwordGestion = isset($_POST["password_unoe"]) ? $_POST["password_unoe"] : '';

	if (!empty($usuarioGestion) || !empty($passwordGestion)) {

		$sqlGestion = "UPDATE usuarioxpersonal SET usuario_unoe = '$usuarioGestion', password_unoe = '$passwordGestion' WHERE id_usuario_personal = $id_usuario_personal";
		$resultadoGestion = $conexion->prepare($sqlGestion);

		if ($resultadoGestion && $resultadoGestion->execute()) {
			$alMenosUnFormularioLleno = true;
		} else {
		}
	}

	// Finalmente, mostrar el SweetAlert si al menos un formulario se ha llenado
	if ($alMenosUnFormularioLleno) {
		echo '<script>
		setTimeout(function(){
			Swal.fire({
				icon: "success",
				title: "Datos ingresados correctamente",
				showConfirmButton: false,
				timer: 900
			}).then(function() {
				window.location = "generar.php";
			});
		}, 100);
	</script>';
	}
}
?>