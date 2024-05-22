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

	$area = $_POST['area'];
	$responsable = $_POST['responsable'];
	$sede = $_POST['sede'];
	$cargo = $_POST['cargo_res'];
	$nombre_cola = $_POST['nombre_cola'];
	$cedula = $_POST['cedula'];
	$fecha = $_POST['fecha'];
	$cargo_cola = $_POST['cargo_cola'];
	$gafas = $_POST['gafas'];
	$careta = $_POST['careta'];
	$mascarilla = $_POST['mascarilla'];
	$respirador = $_POST['respirador'];
	$guantes = $_POST['guantes'];
	$bata_anti = $_POST['bata_anti'];
	$pijama = $_POST['pijama'];
	$bata_tela = $_POST['bata_tela'];
	$zapatos = $_POST['zapatos'];
	$observacion = $_POST['observacion'];
	$firma_usuario = $_POST['firma_usuario'];

	// Verificar si la conexión se estableció correctamente
	if ($conexion) {
		// Preparar la consulta SQL de inserción
		$insert_query = $conexion->prepare("INSERT INTO gestion (area, responsable, sede, cargo_res, nombre_cola, cedula, fecha, cargo_cola, gafas, careta, mascarilla, respirador, guantes, bata_anti, pijama, bata_tela, zapatos, observacion, firma_usuario , estado) VALUES (:area, :responsable, :sede, :cargo_res, :nombre_cola, :cedula, :fecha, :cargo_cola, :gafas, :careta, :mascarilla, :respirador, :guantes, :bata_anti, :pijama, :bata_tela, :zapatos, :observacion, :firma_usuario , 1)");

		// Verificar si la firma está presente y guardarla si es necesario
		if (isset($_POST['firma_usuario']) && !empty($_POST['firma_usuario'])) {
			$firma_usuario_base64 = $_POST['firma_usuario'];
			$nombre_firma = 'firma_' . uniqid() . '.png';
			$firma_usuario_base64 = preg_replace('#^data:image/\w+;base64,#i', '', $firma_usuario_base64);
			$data = base64_decode($firma_usuario_base64);
			$carpeta_firmas = 'carpeta_firmas/';
			if (!is_dir($carpeta_firmas)) {
				mkdir($carpeta_firmas, 0777, true);
			}
			$ruta_firma = $carpeta_firmas . $nombre_firma;
			try {
				if (file_put_contents($ruta_firma, $data) !== false) {
					// Archivo guardado correctamente
					$firma_usuario = $ruta_firma;
				} else {
					// Error al guardar el archivo
					error_log('Error al guardar la firma en el servidor.');
					$firma_usuario = null;
				}
			} catch (Exception $e) {
				// Capturar cualquier excepción y registrarla
				error_log('Excepción: ' . $e->getMessage());
				$firma_usuario = null;
			}
		} else {
			// Si no se proporciona una firma, asignar null a la variable $firma_usuario
			$firma_usuario = null;
		}

		// Asignar los valores a los parámetros y ejecutar la consulta
		$insert_result = $insert_query->execute(array(
			':area' => $area,
			':responsable' => $responsable,
			':sede' => $sede,
			':cargo_res' => $cargo,
			':nombre_cola' => $nombre_cola,
			':cedula' => $cedula,
			':fecha' => $fecha,
			':cargo_cola' => $cargo_cola,
			':gafas' => $gafas,
			':careta' => $careta,
			':mascarilla' => $mascarilla,
			':respirador' => $respirador,
			':guantes' => $guantes,
			':bata_anti' => $bata_anti,
			':pijama' => $pijama,
			':bata_tela' => $bata_tela,
			':zapatos' => $zapatos,
			':observacion' => $observacion,
			':firma_usuario' => $firma_usuario
		));

		// Verificar si la inserción fue exitosa
		if ($insert_result) {
			// Inserción exitosa
			echo '<script>
            setTimeout(function(){
                Swal.fire({
                    icon: "success",
                    title: "Datos ingresados correctamente",
                    showConfirmButton: false,
                    timer: 900
                }).then(function() {
                    window.location = "gestion.php";
                });
            }, 100);
        </script>';
			exit();
		} else {
			// Error al insertar en la base de datos
			echo '<script>
            Swal.fire({
                icon: "error",
                title: "Error al procesar los datos",
                text: "Por favor, inténtelo de nuevo más tarde",
                showConfirmButton: false,
                timer: 2000
            });
        </script>';
			// Aquí podrías agregar más detalles sobre el error o redirigir a una página de error
		}
	} else {
		// Error al conectar con la base de datos
		echo '<script>
        Swal.fire({
            icon: "error",
            title: "Error de conexión",
            text: "No se pudo conectar con la base de datos",
            showConfirmButton: false,
            timer: 2000
        });
    </script>';
		// Aquí podrías agregar más detalles sobre el error o redirigir a una página de error
	}
}
?>