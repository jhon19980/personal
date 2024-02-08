<?php
include('../../dist/includes/dbcon.php');

// Verifica que se haya recibido el documento del empleado
if (isset($_POST['documento'])) {
    $documento = $_POST['documento'];

    // Realiza la consulta a la base de datos para obtener la información del empleado según la cédula
    $sql = "SELECT * FROM personal WHERE documento = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->execute([$documento]);

    // Verifica si se encontraron resultados
    if ($stmt->rowCount() > 0) {
        // Si se encontraron resultados, obtén los datos del empleado
        $datos_empleado = $stmt->fetch(PDO::FETCH_ASSOC);

        // Asegúrate de incluir el id_personal en los datos que devuelves
        $id_personal = $datos_empleado['id_personal'];

        // Consultar si existe información en la tabla cargopersonal para este id_personal
        $sql_cargopersonal = "SELECT * FROM cargo_personal WHERE id_personal = ?";
        $stmt_cargopersonal = $conexion->prepare($sql_cargopersonal);
        $stmt_cargopersonal->execute([$id_personal]);

        // Verificar si existe información en la tabla cargopersonal
        if ($stmt_cargopersonal->rowCount() > 0) {
            // Si existe información en la tabla cargopersonal, muestra un mensaje indicando que el empleado ya está registrado
            echo json_encode(['error' => 'El empleado ya cuenta con el registro en el sistema.']);
        } else {
            // Si no hay información en la tabla cargopersonal, incluye el id_personal en los datos del empleado y devuelve los datos como JSON
            $datos_empleado['id_personal'] = $id_personal;
            header('Content-Type: application/json');
            echo json_encode($datos_empleado);
        }
    } else {
        // Si no se encontraron resultados, devuelve un mensaje de error
        echo json_encode(['error' => 'No se encontraron datos para el documento proporcionado.']);
    }
} else {
    // Si no se recibió el documento del empleado, devuelve un mensaje de error
    echo json_encode(['error' => 'No se recibió el documento del empleado.']);
}
