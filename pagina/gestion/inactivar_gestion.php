<?php
    include('../../dist/includes/dbcon.php');
// Verificar si se recibió el id_informes
if(isset($_POST['id_gestion'])) {
    // Obtener el id_informes
    $id_informes = $_POST['id_gestion'];

    // Aquí deberías realizar la lógica para inactivar el informe, por ejemplo, ejecutar una consulta SQL para actualizar su estado a 0 en la base de datos.
    $update_query = $conexion->prepare("UPDATE gestion SET estado = 0 WHERE id_gestion = ?");
    $update_query->execute([$id_informes]);

    // Después de inactivar el informe, podrías redirigir al usuario de nuevo a la página donde se muestra la lista de informes activos.
    header("Location: gestion.php");
    exit();
} else {
    // Si no se recibió el id_informes, redirigir al usuario a alguna página de error o de inicio.
    header("Location: error.php");
    exit();
}
