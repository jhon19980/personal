<!DOCTYPE html>
<html>

<head>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>

</body>

</html>
<?php
include('../../../dist/includes/dbcon.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Carpeta donde se guardarán los archivos
    $carpeta_destino = "ruta/";

    // Verificar y crear la carpeta si no existe
    if (!file_exists($carpeta_destino)) {
        mkdir($carpeta_destino, 0777, true);
    }

    // Procesar el archivo subido
    $nombre_archivo = $_FILES['archivo']['name'];
    $archivo_tmp = $_FILES['archivo']['tmp_name'];

    // Obtener otros datos del formulario
    $nombre_archivo = $_POST['nombre_archivo'];

    // Crear una ruta única para el archivo
    $ruta_archivo = $carpeta_destino . uniqid() . '_' . $nombre_archivo;

    // Obtener el contenido del archivo
    $lineas = file($archivo_tmp, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    // Verificar si se movió el archivo correctamente
    if (move_uploaded_file($archivo_tmp, $ruta_archivo)) {
        try {
            // Insertar datos en la tabla de archivos
            $stmt_archivo = $conexion->prepare("INSERT INTO archivos (nombre_archivo, ruta_archivo) VALUES (?, ?)");
            $stmt_archivo->bindParam(1, $nombre_archivo, PDO::PARAM_STR);
            $stmt_archivo->bindParam(2, $ruta_archivo, PDO::PARAM_STR);
            $stmt_archivo->execute();

            // Obtener el último ID de archivo insertado
            $id_archivo = $conexion->lastInsertId();

            // Analizar el contenido del archivo para obtener datos relevantes
            foreach ($lineas as $linea) {
                // Ignorar líneas vacías
                if (trim($linea) === '') {
                    continue;
                }

                // Separar datos por coma (CSV)
                $datos = str_getcsv($linea, ';');

                // Supongamos que documento está en la segunda posición y el promedio en la tercera
                $documento = $datos[0];
                $promedio = $datos[1];

                // Limpiar el formato monetario y convertir a float
                $salario = floatval(str_replace(['.', ','], ['', '.'], $promedio));

                // Verificar si el documento existe en la tabla personal
                $stmt_verificar = $conexion->prepare("SELECT COUNT(*) FROM personal WHERE documento = ?");
                $stmt_verificar->bindParam(1, $documento, PDO::PARAM_INT);
                $stmt_verificar->execute();
                $existe_documento = $stmt_verificar->fetchColumn();

                if ($existe_documento > 0) {
                    // Actualizar salario en la tabla personal
                    $stmt_actualizar = $conexion->prepare("UPDATE personal SET salario = ? WHERE documento = ?");
                    $stmt_actualizar->bindParam(1, $salario, PDO::PARAM_STR);
                    $stmt_actualizar->bindParam(2, $documento, PDO::PARAM_INT);
                    $stmt_actualizar->execute();
                }
            }

            // Mostrar SweetAlert
            echo <<<HTML
       <script>
           // Coloca aquí el código de SweetAlert que desees mostrar
           Swal.fire({
               icon: 'success',
               title: 'Éxito',
               text: 'Datos actualizados o insertados con éxito.',
               confirmButtonText: 'OK'
           }).then(() => {
               // Redireccionar a usuario.php
               window.location.href = '../usuario.php';
           });
       </script>
HTML;
        } catch (PDOException $e) {
            echo json_encode(['success' => false, 'message' => 'Error en la inserción o actualización: ' . $e->getMessage()]);
        }
    } else {
        // Error al mover el archivo
        echo json_encode(['success' => false, 'message' => 'Error al mover el archivo al directorio de destino.']);
    }
}
?>