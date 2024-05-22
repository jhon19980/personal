<?php
if (isset($_POST['firma_usuario'])) {
    // Decodificar la cadena base64 de la firma
    $firma_usuario = $_POST['firma_usuario'];

    // Generar un nombre único para la firma (puedes usar uniqid o alguna otra lógica)
    $nombre_firma = uniqid('firma_') . '.png';

    $data = base64_decode($firma_usuario);

    // Definir la ruta donde se guardará la firma
    $ruta_firma = 'carpeta_firmas/' . $nombre_firma;

    // Guardar la firma como un archivo en el servidor
    file_put_contents($ruta_firma, $data);

    // Guardar la ruta del archivo en la base de datos
    $stmt->bindParam(":firma_usuario", $ruta_firma);
} else {
    // Si no se proporcionó una firma, puedes asignar un valor predeterminado o NULL según tu lógica de negocio
    $stmt->bindValue(":firma_usuario", null, PDO::PARAM_NULL);
    error_log(print_r($_POST['firma_usuario'], true));
}
