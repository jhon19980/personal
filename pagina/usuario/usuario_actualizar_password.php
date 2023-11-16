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
    exit(); // Agregado para evitar la ejecución de código adicional
}

include('../../dist/includes/dbcon.php');

$cid = $_GET['id'];
$password = $_POST['password'];
$password2 = $_POST['password2'];

if ($password == $password2) {


    // Utilizando consultas preparadas con PDO
    $query = $conexion->prepare("UPDATE usuario SET password = :password WHERE id = :id");
    $query->bindParam(':password', $password);
    $query->bindParam(':id', $cid);
    $result = $query->execute();

    if ($result) {
        echo '<script>
        Swal.fire({
            icon: "success",
            title: "Contraseña Actualizada Correctamente!",
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
            title: "Error al actualizar la contraseña.",
            showConfirmButton: true,
            confirmButtonText: "Cerrar"
        }).then(function(result){
            if(result.value){                   
                window.location = "usuario.php";
            }
        });
        </script>';
    }
} else {
    echo '<script>
    Swal.fire({
        icon: "error",
        title: "Error: Las contraseñas no coinciden.",
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
