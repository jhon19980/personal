<?php
// activar_usuario.php

// Incluye el archivo de conexión a la base de datos
include('../../dist/includes/dbcon.php');

// Verifica si se ha enviado un ID de usuario personal
if (isset($_GET['id_usuario_personal'])) {
    $idUsuarioPersonal = $_GET['id_usuario_personal'];

    try {
        // Obtén el id_personal asociado al id_usuario_personal
        $sqlObtenerIdPersonal = "SELECT id_personal FROM usuarioxpersonal WHERE id_usuario_personal = ?";
        $stmtObtenerIdPersonal = $conexion->prepare($sqlObtenerIdPersonal);
        $stmtObtenerIdPersonal->execute([$idUsuarioPersonal]);
        $fila = $stmtObtenerIdPersonal->fetch(PDO::FETCH_ASSOC);

        // Verifica si se encontró el id_personal
        if ($fila) {
            $idPersonal = $fila['id_personal'];

            // Actualiza el estado en la tabla 'personal'
            $sqlActualizarPersonal = "UPDATE personal SET estado_personal = 1 WHERE id_personal = ?";
            $stmtActualizarPersonal = $conexion->prepare($sqlActualizarPersonal);
            $stmtActualizarPersonal->execute([$idPersonal]);

            // Después de activar al usuario, envía una respuesta JSON
            header('Content-Type: application/json');
            echo json_encode(['success' => true, 'message' => 'Usuario activado correctamente']);
            exit();
        } else {
            // Manejo de errores si no se encuentra el id_personal asociado
            header('Content-Type: application/json');
            echo json_encode(['success' => false, 'message' => 'Error al activar el usuario']);
            exit();
        }
    } catch (PDOException $e) {
        // Manejo de errores si la actualización falla
        header('Content-Type: application/json');
        echo json_encode(['success' => false, 'message' => 'Error al activar el usuario']);
        exit();
    }
} else {
    // Si no se proporciona un ID de usuario personal, envía una respuesta JSON
    header('Content-Type: application/json');
    echo json_encode(['success' => false, 'message' => 'ID de usuario personal no proporcionado']);
    exit();
}

?>
