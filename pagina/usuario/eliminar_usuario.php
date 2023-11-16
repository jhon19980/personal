<!-- A Design by Jhon Alexander P
Author: ElectroSystem
Author URL: http://electrosistem.com.co
License: Creative Commons Attribution 1.0 Unported
-->

<!DOCTYPE html>
<html>

<head>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>

</body>

</html>

<?php
session_start();
if (empty($_SESSION['id'])) {
    header('Location:../index.php');
    exit(); // Asegurarse de que se detenga la ejecución después de redirigir
}

include('../../dist/includes/dbcon.php');

if (isset($_REQUEST['cid'])) {
    $cid = $_REQUEST['cid'];
} else {
    $cid = $_POST['cid'];
}

// Consulta preparada para eliminar el usuario
$query = $conexion->prepare("DELETE FROM usuario WHERE id = :id");
$query->bindParam(':id', $cid, PDO::PARAM_INT);
$result = $query->execute();

if ($result) {
    echo '<script>
        Swal.fire({
            icon: "success",
            title: "Usuario Eliminado Correctamente!",
            showConfirmButton: true,
            confirmButtonText: "Cerrar"
        }).then(function(result){
            if(result.value){                   
                window.location = "usuario.php";
            }
        });
    </script>';
} else {
    echo '<script>
        Swal.fire({
            icon: "error",
            title: "Error al eliminar el usuario.",
            showConfirmButton: true,
            confirmButtonText: "Cerrar"
        }).then(function(result){
            if(result.value){                   
                window.location = "usuario.php";
            }
        });
    </script>';
}
?>

