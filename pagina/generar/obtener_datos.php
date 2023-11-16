<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<?php
include('../../dist/includes/dbcon.php');

?>

<?php
header('Content-Type: application/json'); // Establece el encabezado JSON
$response = array();

try {
    // Obtén la cédula ingresada
    $cedula = $_POST['cedula'];

    // Consulta SQL para obtener el ID del usuario en la tabla personal
    $consulta_personal = $conexion->prepare("SELECT id_personal FROM personal WHERE documento = :cedula");
    $consulta_personal->bindParam(':cedula', $cedula);
    $consulta_personal->execute();
    $resultado_personal = $consulta_personal->fetch(PDO::FETCH_ASSOC);

    if ($resultado_personal) {
        // Obten el ID del usuario en la tabla usuarioxpersonal
        $id_personal = $resultado_personal['id_personal'];
        
        // Consulta SQL para obtener los datos de usuarioxpersonal basados en el ID de personal
        $consulta_usuarioxpersonal = $conexion->prepare("SELECT * FROM usuarioxpersonal WHERE id_personal = :id_personal");
        $consulta_usuarioxpersonal->bindParam(':id_personal', $id_personal);
        $consulta_usuarioxpersonal->execute();
        $resultado_usuarioxpersonal = $consulta_usuarioxpersonal->fetch(PDO::FETCH_ASSOC);

        if ($resultado_usuarioxpersonal) {
            // Asigna los valores a un array
            $response['usuario_scse'] = $resultado_usuarioxpersonal['usuario_scse'];
            $response['password_scse'] = $resultado_usuarioxpersonal['password_scse'];
            $response['usuario_moodle'] = $resultado_usuarioxpersonal['usuario_moodle'];
            $response['password_moodle'] = $resultado_usuarioxpersonal['password_moodle'];
            $response['usuario_correo'] = $resultado_usuarioxpersonal['usuario_correo'];
            $response['password_correo'] = $resultado_usuarioxpersonal['password_correo'];
            $response['usuario_appscv'] = $resultado_usuarioxpersonal['usuario_appscv'];
            $response['password_appscv'] = $resultado_usuarioxpersonal['password_appscv'];
            $response['usuario_binaps'] = $resultado_usuarioxpersonal['usuario_binaps'];
            $response['password_binaps'] = $resultado_usuarioxpersonal['password_binaps'];
            $response['usuario_unoe'] = $resultado_usuarioxpersonal['usuario_unoe'];
            $response['password_unoe'] = $resultado_usuarioxpersonal['password_unoe'];
        } else {
            $response['error'] = "No se encontraron datos para el usuario con la cédula proporcionada.";
        }
    } else {
        $response['error'] = "No se encontró un usuario con la cédula proporcionada.";
    }
} catch (PDOException $e) {
    $response['error'] = "Error en la consulta: " . $e->getMessage();
}

echo json_encode($response); // Devuelve la respuesta como JSON

?>




