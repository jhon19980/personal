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

if (isset($_POST['nombre_area'])) {
    // Obtener el valor del campo nombre_area desde el formulario
    $nombre_area = htmlspecialchars($_POST['nombre_area'], ENT_QUOTES, 'UTF-8');

    try {
        // Insertar el nuevo departamento/área en la base de datos
        $insert_query = $conexion->prepare("INSERT INTO area (nombre_area) VALUES (:nombre_area)");
        $insert_query->bindParam(':nombre_area', $nombre_area);
        $insert_query->execute();

        // Muestra un mensaje o realiza acciones adicionales si es necesario
        echo '<script>
            Swal.fire({
            icon: "success",
            title: "Datos Ingresados Correctamente!",
            showConfirmButton: true,
            confirmButtonText: "Cerrar"
            }).then(function(result){
            if(result.value){                   
                window.location = "../usuario.php";
            }
            });
        </script>';

    } catch (PDOException $e) {
        echo "Error al insertar en la base de datos: " . $e->getMessage();
        die();
    }
}
?>