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
include('../../dist/includes/dbcon.php');

$cid = $_GET['id'];
$tipo = $_POST['tipo'];
$apellido_usu = $_POST['apellido_usu'];
$usuario = $_POST['usuario'];
$correo = $_POST['correo'];
$nombre_usu = $_POST['nombre_usu'];

if (isset($_FILES['imagen']) && !empty($_FILES['imagen']['name'])) {
    $target_dir = "subir_us/";
    $target_file = $target_dir . basename($_FILES["imagen"]["name"]);
    $uploadok = 1;
    $imagefiletype = pathinfo($target_file, PATHINFO_EXTENSION);

    // Verificar si el archivo es una imagen
    $check = getimagesize($_FILES["imagen"]["tmp_name"]);
    if ($check !== false) {
        echo "archivo es una imagen - " . $check["mime"] . ".";
        $uploadok = 1;
    } else {
        echo "el archivo no es una imagen.";
        $uploadok = 0;
    }

    // Verificar el tamaño del archivo
    if ($_FILES["imagen"]["size"] > 500000) {
        echo "lo siento, tu archivo es demasiado grande.";
        $uploadok = 0;
    }

    if ($uploadok) {
        // Mover el archivo subido
        if (move_uploaded_file($_FILES["imagen"]["tmp_name"], $target_file)) {
            $img = basename($_FILES["imagen"]["name"]);

            // Utilizar consultas preparadas con PDO
            $query = $conexion->prepare("UPDATE usuario SET imagen=:imagen, usuario=:usuario, apellido_usu=:apellido_usu, tipo=:tipo, correo=:correo, nombre_usu=:nombre_usu WHERE id=:id");
            $query->bindParam(':imagen', $img);
            $query->bindParam(':usuario', $usuario);
            $query->bindParam(':apellido_usu', $apellido_usu);
            $query->bindParam(':tipo', $tipo);
            $query->bindParam(':correo', $correo);
            $query->bindParam(':nombre_usu', $nombre_usu);
            $query->bindParam(':id', $cid);
            
            $result = $query->execute();

            if ($result) {
                echo '<script>
                    Swal.fire({
                        icon: "success",
                        title: "Datos Actualizados Correctamente!",
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
                        title: "Error al actualizar los datos.",
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
            echo "No se pudo subir el archivo.";
        }
    }
} else {
    // Utilizar consultas preparadas con PDO
    $query = $conexion->prepare("UPDATE usuario SET usuario=:usuario, apellido_usu=:apellido_usu, tipo=:tipo, correo=:correo, nombre_usu=:nombre_usu WHERE id=:id");
    $query->bindParam(':usuario', $usuario);
    $query->bindParam(':apellido_usu', $apellido_usu);
    $query->bindParam(':tipo', $tipo);
    $query->bindParam(':correo', $correo);
    $query->bindParam(':nombre_usu', $nombre_usu);
    $query->bindParam(':id', $cid);

    $result = $query->execute();

    if ($result) {
        echo '<script>
            Swal.fire({
                icon: "success",
                title: "Datos Actualizados Correctamente!",
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
                title: "Error al actualizar los datos.",
                showConfirmButton: true,
                confirmButtonText: "Cerrar"
            }).then(function(result){
                if(result.value){                   
                    window.location = "usuario.php";
                }
            });
        </script>';
    }
}
?>
