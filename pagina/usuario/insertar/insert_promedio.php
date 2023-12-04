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

                // Supongamos que ID Personal está en la primera posición
                $id_personal = intval($datos[0]);
                $cedula = $datos[1];
                $promedio = $datos[2];

                 // Limpiar el formato monetario y convertir a float
                 $salario = floatval(str_replace(['.', ','], ['', '.'], $promedio));

                // Verificar si el id_personal existe en la tabla personal
                $stmt_verificar = $conexion->prepare("SELECT COUNT(*) FROM personal WHERE id_personal = ?");
                $stmt_verificar->bindParam(1, $id_personal, PDO::PARAM_INT);
                $stmt_verificar->execute();
                $existe_id_personal = $stmt_verificar->fetchColumn();

                if ($existe_id_personal > 0) {
                    // Verificar si ya existe un registro en la tabla promedios para este id_personal
                    $stmt_verificar_promedios = $conexion->prepare("SELECT COUNT(*) FROM promedios WHERE id_personal = ?");
                    $stmt_verificar_promedios->bindParam(1, $id_personal, PDO::PARAM_INT);
                    $stmt_verificar_promedios->execute();
                    $existe_promedio = $stmt_verificar_promedios->fetchColumn();

                    if ($existe_promedio > 0) {
                        // Actualizar en la tabla promedios
                        $stmt_actualizar = $conexion->prepare("UPDATE promedios SET promedio = ?, id_archivo = ? WHERE id_personal = ?");
                        $stmt_actualizar->bindParam(1, $salario, PDO::PARAM_STR);
                        $stmt_actualizar->bindParam(2, $id_archivo, PDO::PARAM_INT);
                        $stmt_actualizar->bindParam(3, $id_personal, PDO::PARAM_INT);
                        $stmt_actualizar->execute();
                    } else {
                        // Insertar en la tabla promedios
                        $stmt_insertar = $conexion->prepare("INSERT INTO promedios (id_personal, promedio, cedula, id_archivo) VALUES (?, ?, ?, ?)");
                        $stmt_insertar->bindParam(1, $id_personal, PDO::PARAM_INT);
                        $stmt_insertar->bindParam(2, $salario, PDO::PARAM_STR);
                        $stmt_insertar->bindParam(3, $cedula, PDO::PARAM_INT);
                        $stmt_insertar->bindParam(4, $id_archivo, PDO::PARAM_INT);
                        $stmt_insertar->execute();
                    }
                }
            }

            // Obtener los nuevos datos de la tabla promedios
            $promedios_query = $conexion->prepare("SELECT id_promedio, id_personal, promedio FROM promedios");
            $promedios_query->execute();
            $promedios = $promedios_query->fetchAll(PDO::FETCH_ASSOC);

           // Devolver la respuesta como JSON
           //echo json_encode(['success' => true, 'message' => 'Datos actualizados o insertados con éxito.', 'promedios' => $promedios]);

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
