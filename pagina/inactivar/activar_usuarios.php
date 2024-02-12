<!-- A Design by Jhon Alexander P
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
include('../../dist/includes/dbcon.php');
$id_usuario_personal = isset($_GET['id_usuario_personal']) ? $_GET['id_usuario_personal'] : null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Recuperar los valores del formulario

    // Verificar el estado actual antes de decidir si actualizar o no
    $current_scse_state = obtenerEstadoActual($id_usuario_personal, 'scse_activo', $conexion);
    $inactive_scse = ($current_scse_state == 1) ? 1 : (isset($_POST['scse_activo']) ? 1 : 0);

    $current_moodle_state = obtenerEstadoActual($id_usuario_personal, 'moodle_activo', $conexion);
    $inactive_moodle = ($current_moodle_state == 1) ? 1 : (isset($_POST['moodle_activo']) ? 1 : 0);

    $current_correo_state = obtenerEstadoActual($id_usuario_personal, 'correo_activo', $conexion);
    $inactive_correo = ($current_correo_state == 1) ? 1 : (isset($_POST['correo_activo']) ? 1 : 0);

    $current_appscv_state = obtenerEstadoActual($id_usuario_personal, 'appscv_activo', $conexion);
    $inactive_appscv = ($current_appscv_state == 1) ? 1 : (isset($_POST['appscv_activo']) ? 1 : 0);

    $current_binaps_state = obtenerEstadoActual($id_usuario_personal, 'binaps_activo', $conexion);
    $inactive_binaps = ($current_binaps_state == 1) ? 1 : (isset($_POST['binaps_activo']) ? 1 : 0);

    $current_unoe_state = obtenerEstadoActual($id_usuario_personal, 'unoe_activo', $conexion);
    $inactive_unoe = ($current_unoe_state == 1) ? 1 : (isset($_POST['unoe_activo']) ? 1 : 0);

    // Consulta SQL para actualizar el registro
    $sql_scse = "UPDATE usuarioxpersonal SET  scse_activo = ? WHERE id_usuario_personal = ?";
    $sql_moodle = "UPDATE usuarioxpersonal SET  moodle_activo = ? WHERE id_usuario_personal = ?";
    $sql_correo = "UPDATE usuarioxpersonal SET  correo_activo = ? WHERE id_usuario_personal = ?";
    $sql_appscv = "UPDATE usuarioxpersonal SET  appscv_activo = ? WHERE id_usuario_personal = ?";
    $sql_binaps = "UPDATE usuarioxpersonal SET  binaps_activo = ? WHERE id_usuario_personal = ?";
    $sql_unoe = "UPDATE usuarioxpersonal SET  unoe_activo = ? WHERE id_usuario_personal = ?";

    // Preparar la consulta
    $stmt_scse = $conexion->prepare($sql_scse);
    $stmt_moodle = $conexion->prepare($sql_moodle);
    $stmt_correo = $conexion->prepare($sql_correo);
    $stmt_appscv = $conexion->prepare($sql_appscv);
    $stmt_binaps = $conexion->prepare($sql_binaps);
    $stmt_unoe = $conexion->prepare($sql_unoe);

    // Ejecutar las consultas
    $result_scse = $stmt_scse->execute([$inactive_scse, $id_usuario_personal]);
    $result_moodle = $stmt_moodle->execute([$inactive_moodle, $id_usuario_personal]);
    $result_correo = $stmt_correo->execute([$inactive_correo, $id_usuario_personal]);
    $result_otrs = $stmt_appscv->execute([$inactive_appscv, $id_usuario_personal]);
    $result_binaps = $stmt_binaps->execute([$inactive_binaps, $id_usuario_personal]);
    $result_unoe = $stmt_unoe->execute([$inactive_unoe, $id_usuario_personal]);

    // Después de ejecutar las consultas
    if ($result_scse && $result_moodle && $result_correo && $result_otrs && $result_binaps && $result_unoe) {
        // SweetAlert después de la actualización
        echo '<script>
		setTimeout(function(){
			Swal.fire({
				icon: "success",
				title: "Los estados han sido actualizados exitosamente.",
				showConfirmButton: false,
				timer: 900
			}).then(function() {
				window.location = "activar.php";
			});
		}, 100);
	</script>';
    } else {
        echo "Error al ejecutar la consulta.";
    }

    // Cerrar la conexión a la base de datos
    $conexion = null;
} else {
    echo "No se seleccionó ningún checkbox para actualizar.";
}

// Función para obtener el estado actual
function obtenerEstadoActual($id_usuario_personal, $campo, $conexion)
{
    $sql = "SELECT $campo FROM usuarioxpersonal WHERE id_usuario_personal = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->execute([$id_usuario_personal]);
    $result = $stmt->fetchColumn();
    return $result;
}
?>