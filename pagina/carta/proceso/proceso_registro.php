<?php
session_start();

// Generar código de verificación
$codigo = strval(rand(1000, 9999));

// Almacenar el código de verificación en la sesión
$_SESSION['codigo_verificacion'] = $codigo;

// Almacenar otros datos del formulario si es necesario

// Enviar código por correo electrónico
$correo = $_POST['correo'];
$asunto = "Código de Verificación";
$mensaje = "Tu código de verificación es: $codigo";
$headers = "From: tu_correo@gmail.com";

mail($correo, $asunto, $mensaje, $headers);

echo "Código de verificación enviado. Verifica tu correo.";
?>