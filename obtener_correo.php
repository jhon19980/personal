
<?php
// obtener_correo.php

// Conectar a la base de datos y realizar la consulta para obtener el correo relacionado con el documento
include('dist/includes/dbcon.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $documento = isset($_POST['documento']) ? $_POST['documento'] : null;

    // Realizar la consulta SQL para obtener el correo relacionado con el documento
    $stmt = $conexion->prepare("SELECT correo FROM personal WHERE documento = ?");
    $stmt->execute([$documento]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    

    if ($result) {
        // Devolver la respuesta al cliente
        echo json_encode(['success' => true, 'correo' => $result['correo']]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Documento no encontrado, o esta inhabilitado.']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Método de solicitud incorrecto.']);
}
?>
