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
$id_usuario_personal = $_GET['id_usuario_personal'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recuperar los valores del formulario

    $inactive_scse = isset($_POST['scse_activo']) ? 0 : 1;
    $inactive_moodle = isset($_POST['moodle_activo']) ? 0 : 1;
    $inactive_correo = isset($_POST['correo_activo']) ? 0 : 1;
    $inactive_appscv = isset($_POST['appscv_activo']) ? 0 : 1;
    $inactive_binaps = isset($_POST['binaps_activo']) ? 0 : 1;
    $inactive_unoe = isset($_POST['unoe_activo']) ? 0 : 1;

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
                Swal.fire({
                    icon: "success",
                    title: "Los estados han sido actualizados exitosamente.",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar"
                }).then(function(result){
                    if(result.value){                   
                        window.location = "activar.php";
                    }
                });
              </script>';
    } else {
        echo "Error al ejecutar la consulta: " . implode(" ", $stmt_scse->errorInfo()) . " " . implode(" ", $stmt_moodle->errorInfo())
            . " " . implode(" ", $stmt_correo->errorInfo()) . " " . implode(" ", $stmt_appscv->errorInfo()) . " " . implode(" ", $stmt_binaps->errorInfo())
            . " " . implode(" ", $stmt_unoe->errorInfo());
    }

    // Cerrar la conexión a la base de datos
    $conexion = null;
} else {
    echo "No se seleccionó ningún checkbox para actualizar.";
}
?>