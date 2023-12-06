<?php
// verificar_codigo.php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $codigo_ingresado = isset($_POST['codigo']) ? $_POST['codigo'] : '';
    $documento_ingresado = isset($_POST['documento']) ? $_POST['documento'] : '';

    // Añade mensajes de depuración
    error_log("Código ingresado: " . htmlspecialchars($codigo_ingresado));
    error_log("Documento ingresado: " . htmlspecialchars($documento_ingresado));

    // Obtener el código y el número de documento almacenados en la sesión
    $codigo_generado = $_SESSION['codigo_verificacion'];
    $documento_almacenado = $_SESSION['documento']; // Ajusta esto según cómo guardas el número de documento en la sesión

    // Añade mensajes de depuración
    error_log("Código almacenado: " . htmlspecialchars($codigo_generado));
    error_log("Documento almacenado: " . htmlspecialchars($documento_almacenado));

    if ($codigo_ingresado == $codigo_generado && $documento_ingresado == $documento_almacenado) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Código o documento incorrecto.']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Método de solicitud incorrecto.']);
}
?>
