<?php
// inactivar_estado.php

include('../../dist/includes/dbcon.php');

$documento = isset($_POST['documento']) ? $_POST['documento'] : null; // Declara y asigna el valor del campo "documento"

if (isset($_POST['id_personal'])) {
    $id_personal = $_POST['id_personal'];

    // Agrega esto para depurar y verificar si se recibe el id_personal
    error_log('ID Personal Recibido: ' . $id_personal);

    // Maneja el caso de inserción en la tabla inactivo basado en el campo "documento"
    $termino = isset($_POST['termino']) ? $_POST['termino'] : null;
    $condicion = isset($_POST['condicion']) ? $_POST['condicion'] : null;

    // Depuración: Verificar los valores recibidos
    error_log('Ingresando al bloque de inserción en inactivo.');
    error_log('Documento Recibido: ' . $documento);
    error_log('Termino Recibido: ' . $termino);
    error_log('Condicion Recibida: ' . $condicion);

    // Aquí debes realizar la validación y sanitización de los datos según tus necesidades.

    // Prepara la consulta SQL con marcadores de posición
    $sql = "INSERT INTO inactivo (documento, termino, condicion, id_personal) VALUES (:documento, :termino, :condicion, :id_personal)";

    // Prepara la declaración
    $stmt = $conexion->prepare($sql);

    // Bind de los parámetros
    $stmt->bindParam(':documento', $documento);
    $stmt->bindParam(':termino', $termino);
    $stmt->bindParam(':condicion', $condicion);
    $stmt->bindParam(':id_personal', $id_personal);

    // Ejecuta la consulta
    if ($stmt->execute()) {
        // Realiza la actualización del estado en la tabla personal
        $sql2 = "UPDATE personal SET estado_personal = 0 WHERE id_personal = ?";
        $stmt2 = $conexion->prepare($sql2);
        $stmt2->execute([$id_personal]);

        // Devuelve una respuesta indicando el éxito
        header('Content-Type: application/json');
        echo json_encode(['success' => true]);
    } else {
        // Devuelve una respuesta indicando el error en la inserción
        header('Content-Type: application/json');
        echo json_encode(['error' => 'Error al insertar datos en inactivo: ' . $stmt->errorInfo()[2]]);
    }
} else {
    // Devuelve una respuesta indicando que ni "id_personal" ni "documento" están definidos
    header('Content-Type: application/json');
    echo json_encode(['error' => 'ID de usuario o documento no proporcionado']);
}
?>
