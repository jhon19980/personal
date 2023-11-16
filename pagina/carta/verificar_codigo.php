<?php
session_start();

// Obtener el código ingresado por el usuario
$codigo_ingresado = $_POST['codigo'];

// Obtener el código almacenado en la sesión
$codigo_generado = $_SESSION['codigo_verificacion'];

if ($codigo_ingresado == $codigo_generado) {
    // Redirigir al usuario a la página de generación de PDF
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'message' => 'Código incorrecto.']);
}
?>

