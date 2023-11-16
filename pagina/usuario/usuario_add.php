
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
include('../../dist/includes/dbcon.php');

$usuario = $_POST['usuario'];
$password = $_POST['password'];
$password2 = $_POST['password2'];
$tipo = $_POST['tipo'];
$correo = $_POST['correo'];
$nombre_usu = $_POST['nombre_usu'];
$apellido_usu = $_POST['apellido_usu'];

$total = 0;

if ($password == $password2) {
    $query2 = $conexion->prepare("SELECT * FROM usuario WHERE usuario = :usuario");
    $query2->bindParam(':usuario', $usuario);
    $query2->execute();

    $count = $query2->rowCount();

    if ($count > 0) {
        echo '<script>
            Swal.fire({
                icon: "success",
                title: "El Usuario ya existe!",
                showConfirmButton: true,
                confirmButtonText: "Cerrar"
            }).then(function(result){
                if(result.value){                   
                    window.location = "usuario.php";
                }
            });
        </script>';
    } else {
        if (!empty($_FILES['imagen']['name'])) {
            $target_dir = "subir_us/";
            $target_file = $target_dir . basename($_FILES["imagen"]["name"]);
            $uploadok = 1;
            $imagefiletype = pathinfo($target_file, PATHINFO_EXTENSION);

            // Check if image file is a real image
            $check = getimagesize($_FILES["imagen"]["tmp_name"]);
            if ($check !== false) {
                $uploadok = 1;
            } else {
                echo '<script>
                    Swal.fire({
                        icon: "error",
                        title: "El archivo no es una imagen!",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                    }).then(function(result){
                        if(result.value){                   
                            window.location = "usuario.php";
                        }
                    });
                </script>';
                exit();
            }

            // Check if file already exists
            if (file_exists($target_file)) {
                echo '<script>
                    Swal.fire({
                        icon: "error",
                        title: "Lo siento, el archivo ya existe!",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                    }).then(function(result){
                        if(result.value){                   
                            window.location = "usuario.php";
                        }
                    });
                </script>';
                exit();
            }

            // Check file size
            if ($_FILES["imagen"]["size"] > 500000) {
                echo '<script>
                    Swal.fire({
                        icon: "error",
                        title: "Lo siento, el archivo es demasiado grande!",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                    }).then(function(result){
                        if(result.value){                   
                            window.location = "usuario.php";
                        }
                    });
                </script>';
                exit();
            }

            if (move_uploaded_file($_FILES["imagen"]["tmp_name"], $target_file)) {
                $img = basename($_FILES["imagen"]["name"]);

                // Genera una sal aleatoria
                $salt = bin2hex(random_bytes(32));

                // Combina la contraseña y la sal, y aplica el hash
                $hashed_password = password_hash($password . $salt, PASSWORD_BCRYPT);

                // Inserta en la base de datos la contraseña hasheada y la sal
                $query = $conexion->prepare("INSERT INTO usuario(usuario, password, salt, imagen, tipo, correo, nombre_usu, apellido_usu)
                    VALUES(:usuario, :password, :salt, :img, :tipo, :correo, :nombre_usu, :apellido_usu)");
                $query->bindParam(':usuario', $usuario);
                $query->bindParam(':password', $hashed_password);
                $query->bindParam(':salt', $salt);
                $query->bindParam(':img', $img);
                $query->bindParam(':tipo', $tipo);
                $query->bindParam(':correo', $correo);
                $query->bindParam(':nombre_usu', $nombre_usu);
                $query->bindParam(':apellido_usu', $apellido_usu);
                $query->execute();

                echo '<script>
                    Swal.fire({
                        icon: "success",
                        title: "Usuario Registrado Correctamente!",
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
                        title: "No se pudo subir el archivo.",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                    }).then(function(result){
                        if(result.value){                   
                            window.location = "usuario.php";
                        }
                    });
                </script>';
                exit();
            }
        }
    }
} else {
    echo '<script>
        Swal.fire({
            icon: "error",
            title: "Error: Las contraseñas no coinciden. Registre de nuevo!",
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
