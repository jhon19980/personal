<!--A Design by Jhon Alexander P
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
include('../../dist/includes/dbcon.php');

// Procesar datos del formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener el ID del usuario que deseas actualizar
    $id_personal = $_POST['id_personal'];

    // Consulta SQL para verificar si el usuario ya tiene un id_cargo_personal
    $sql_check_cargo = "SELECT id_personal FROM cargo_personal WHERE id_personal = :id_personal";
    $stmt_check_cargo = $conexion->prepare($sql_check_cargo);
    $stmt_check_cargo->bindParam(':id_personal', $id_personal);
    $stmt_check_cargo->execute();
    $result_check_cargo = $stmt_check_cargo->fetch(PDO::FETCH_ASSOC);
    // Datos de la tabla cargo_personal
    $id_cargo = $_POST['id_cargo'];
    $fecha_ingreso = $_POST['fecha_ingreso'];
    $sede = $_POST['sede'];
    $area = $_POST['area'];
    $cargo = $_POST['cargo'];
    $observacion = $_POST['observacion'];
    $registro = $_POST['registro_medico'];
    $especialidades = $_POST['especialidades'];
    $remplaza = $_POST['remplaza_a'];

    if ($result_check_cargo) {
        // El registro existe, actualizarlo
        $sql_update_cargo = "UPDATE cargo_personal SET 
    id_cargo = ?,
    fecha_ingreso = ?,
    sede = ?,
    area = ?,
    cargo = ?,
    observacion = ?,
    registro_medico = ?,
    especialidades = ?,
    remplaza_a = ?
WHERE id_personal = ?";

        $stmt_update_cargo = $conexion->prepare($sql_update_cargo);
        $stmt_update_cargo->execute([
            $id_cargo, $fecha_ingreso, $sede, $area, $cargo, $observacion,
            $registro, $especialidades, $remplaza, $id_personal
        ]);


        // Datos de la tabla usuarioxpersonal
        $id_cargo = $_POST['id_cargo'];  // Utilizamos el id_cargo almacenado en el campo oculto

        // Actualizar la tabla usuarioxpersonal
        $sql_update_usuarioxpersonal = "UPDATE usuarioxpersonal SET 
    id_cargo = ?
WHERE id_personal = ?";

        $stmt_update_usuarioxpersonal = $conexion->prepare($sql_update_usuarioxpersonal);
        $stmt_update_usuarioxpersonal->execute([$id_cargo, $id_personal]);

    } else {
        // El registro no existe, insertarlo
        $sql_insert_info = "INSERT INTO cargo_personal (id_personal, id_cargo, fecha_ingreso, sede, area, cargo, observacion, registro_medico, especialidades, remplaza_a) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt_insert_info = $conexion->prepare($sql_insert_info);

        // Obtener el id_cargo correspondiente al nombre del cargo
        $sql_get_cargo_id = "SELECT id_cargo FROM cargo WHERE nombre_cargo = ?";
        $stmt_get_cargo_id = $conexion->prepare($sql_get_cargo_id);
        $stmt_get_cargo_id->execute([$cargo]);
        $id_cargos = $stmt_get_cargo_id->fetchColumn();

        // Ejecutar la inserción
        if ($stmt_insert_info->execute([$id_personal, $id_cargos, $fecha_ingreso, $sede, $area, $cargo, $observacion, $registro, $especialidades, $remplaza])) {
            echo "Información insertada correctamente.";
        } else {
            echo "Error al insertar la información.";
        }
    }

    // Redireccionar a la página de éxito o manejar según sea necesario
    echo '<script>
    setTimeout(function(){
        Swal.fire({
            icon: "success",
            title: "Datos Actualizados correctamente",
            showConfirmButton: false,
            timer: 900
        }).then(function() {
            window.location = "usuario.php";
        });
    }, 100);
</script>';
    exit();
}
?>