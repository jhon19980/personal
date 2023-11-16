<?php
// inactivar_estado.php

include('../../dist/includes/dbcon.php');

if (isset($_POST['id_personal'])) {
    $id_personal = $_POST['id_personal'];

    // Agrega esto para depurar y verificar si se recibe el id_personal
    error_log('ID Personal Recibido: ' . $id_personal);

    // Realiza la actualización del estado en la tabla personal
    $sql = "UPDATE personal SET estado_personal = 0 WHERE id_personal = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->execute([$id_personal]);

    // Agrega esto para verificar si la actualización se realizó correctamente
    error_log('Filas afectadas en la tabla personal: ' . $stmt->rowCount());

    // Actualiza la tabla usuarioxpersonal
    $sql2 = "UPDATE usuarioxpersonal SET 
                scse_activo = 1,
                moodle_activo = 1,
                correo_activo = 1,
                otrs_activo = 1,
                binaps_activo = 1,
                unoe_activo = 1
             WHERE id_personal = ?";
    $stmt2 = $conexion->prepare($sql2);
    $stmt2->execute([$id_personal]);

    // Agrega esto para verificar si la actualización se realizó correctamente en la tabla usuarioxpersonal
    error_log('Filas afectadas en la tabla usuarioxpersonal: ' . $stmt2->rowCount());

    // Devuelve una respuesta (puedes enviar un JSON con un mensaje de éxito si lo deseas)
    header('Content-Type: application/json');
    echo json_encode(['success' => true]);
} else {
    header('Content-Type: application/json');
    echo json_encode(['error' => 'ID de usuario no proporcionado']);
}
?>
