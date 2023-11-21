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
    $id_personal = $_GET['id_personal'];


    // Datos de la tabla Personal
    $tipo_documento = $_POST['tipo_documento'];
    $documento = $_POST['documento'];
    $primer_apellido = $_POST['primer_apellido'];
    $segundo_apellido = $_POST['segundo_apellido'];
    $primer_nombre = $_POST['primer_nombre'];
    $segundo_nombre = $_POST['segundo_nombre'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];
    $lugar_nacimiento = $_POST['lugar_Nacimiento'];
    $telefono = $_POST['telefono'];
    $estado_civil = $_POST['estado_civil'];
    $direccion = $_POST['direccion'];
    $cargo = $_POST['cargo'];
    $barrio = $_POST['barrio'];
    $correo = $_POST['correo'];
    $tipo_contrato = $_POST['tipo_contrato'];

    // Actualizar la tabla Personal
    $sql_update_personal = "UPDATE Personal SET 
        tipo_documento = ?,
        documento = ?,
        primer_apellido = ?,
        segundo_apellido = ?,
        primer_nombre = ?,
        segundo_nombre = ?,
        fecha_nacimiento = ?,
        lugar_nacimiento = ?,
        telefono = ?,
        estado_civil = ?,
        direccion = ?,
        barrio = ?,
        correo = ?,
        cargo = ?,
        tipo_contrato = ?
    WHERE id_personal = ?";

    $stmt_update_personal = $conexion->prepare($sql_update_personal);
    $stmt_update_personal->execute([
        $tipo_documento, $documento, $primer_apellido, $segundo_apellido,
        $primer_nombre, $segundo_nombre, $fecha_nacimiento, $lugar_nacimiento,
        $telefono, $estado_civil, $direccion, $barrio, $correo,
        $cargo, $tipo_contrato, $id_personal
    ]);

    // Datos de la tabla cargo_personal
    $id_cargo = $_POST['id_cargo']; 
    $fecha_ingreso = $_POST['fecha_ingreso'];
    $sede = $_POST['sede'];
    $area = $_POST['area'];
    $cargo = $_POST['cargo'];
    $observacion = $_POST['observaciones'];
    $registro = $_POST['registro_medico'];
    $especialidades = $_POST['especialidades'];
    $remplaza = $_POST['remplaza_a'];

    // Actualizar la tabla cargo_personal
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
        $id_cargo,$fecha_ingreso, $sede, $area, $cargo, $observacion,
        $registro, $especialidades, $remplaza, $id_personal
    ]);

    // ...

    // Datos de la tabla usuarioxpersonal
    $id_cargo = $_POST['id_cargo'];  // Utilizamos el id_cargo almacenado en el campo oculto

    // Actualizar la tabla usuarioxpersonal
    $sql_update_usuarioxpersonal = "UPDATE usuarioxpersonal SET 
    id_cargo = ?
WHERE id_personal = ?";

    $stmt_update_usuarioxpersonal = $conexion->prepare($sql_update_usuarioxpersonal);
    $stmt_update_usuarioxpersonal->execute([$id_cargo, $id_personal]);


    // Redireccionar a la página de éxito o manejar según sea necesario
    echo '<script>
    setTimeout(function(){
        Swal.fire({
            icon: "success",
            title: "Datos Actualizados correctamente",
            showConfirmButton: false,
            timer: 900
        }).then(function() {
            window.location = "generar.php";
        });
    }, 100);
</script>';
    exit();
}
?>