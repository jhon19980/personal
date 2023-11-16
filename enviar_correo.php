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

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

session_start();

// Verificar si la variable de sesión existe
if (!isset($_SESSION['intentos_por_correo'])) {
    $_SESSION['intentos_por_correo'] = [];
}
var_dump($_SESSION['intentos_por_correo']); // Agrega esto para depurar
$correo = $_POST['correo'];
$mes_actual = date('m');  // Obtener el número del mes actual (1-12)

// Verificar si el correo ya ha sido utilizado más de tres veces este mes
if (
    isset($_SESSION['intentos_por_correo'][$correo])
    && isset($_SESSION['intentos_por_correo'][$correo][$mes_actual])
    && $_SESSION['intentos_por_correo'][$correo][$mes_actual] >= 10
) {
    echo '<script>
        Swal.fire({
            icon: "error",
            title: "Correo no disponible",
            text: "Este correo ha alcanzado el límite de intentos permitidos en el mes para generar cartas laborales.",
            showConfirmButton: true,
            confirmButtonText: "Cerrar"
        }).then(function(result){
            window.location = "index.php";
        });
    </script>';
} else {
    // Incrementar el contador de intentos para este correo y mes
    if (!isset($_SESSION['intentos_por_correo'][$correo]) || !is_array($_SESSION['intentos_por_correo'][$correo])) {
        $_SESSION['intentos_por_correo'][$correo] = [];
    }

    if (!isset($_SESSION['intentos_por_correo'][$correo][$mes_actual])) {
        $_SESSION['intentos_por_correo'][$correo][$mes_actual] = 1;
    } else {
        $_SESSION['intentos_por_correo'][$correo][$mes_actual]++;
    }

    // Generar código de verificación
    $codigo = strval(rand(1000, 9999));

    // Almacenar el código de verificación en la sesión
    echo $codigo;
    $_SESSION['codigo_verificacion'] = $codigo;

    $documento = $_POST['documento'];

    // Recuperar la dirección de correo electrónico del formulario
    $correo = $_POST['correo'];

    // Configurar PHPMailer
    $mail = new PHPMailer(true);

    try {
        // Configuración del servidor SMTP
        $mail->isSMTP();
        $mail->Host = 'correo.clinicaversalles.com.co';
        $mail->SMTPAuth = true;
        $email = 'versallesti@clinicaversalles.com.co';  // Corrección aquí
        $mail->Username = $email;
        $mail->Password = 'Ayt.197*';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port = 465;

        // Configurar el remitente y el destinatario
        $mail->setFrom($email, 'CLINICA VERSALLES');
        $mail->addAddress($correo);

        // Configurar el asunto y el cuerpo del mensaje
        $mail->Subject = 'Codigo de Verificacion';
        $mail->Body = "Tu codigo de verificacion es: $codigo";
        $mail->SMTPDebug = 0;

        // Enviar el correo electrónico
        $mail->send();

        // Conexión a la base de datos (usando PDO, como ya lo tienes configurado)
        include('dist/includes/dbcon.php'); // Asegúrate de incluir tu archivo de conexión

        // Preparar la consulta SQL para insertar la información en la tabla "carta"
        $sql = "INSERT INTO carta (documento, correo, codigo_verificacion) VALUES (?, ?, ?)";
        $stmt = $conexion->prepare($sql);

        if ($stmt) {
            // Asignar valores a los parámetros de la consulta
            $stmt->bindParam(1, $documento, PDO::PARAM_STR);
            $stmt->bindParam(2, $correo, PDO::PARAM_STR);
            $stmt->bindParam(3, $codigo, PDO::PARAM_STR);

            // Ejecutar la consulta
            if ($stmt->execute()) {
                // La información se guardó correctamente en la tabla "carta"
                // Puedes redirigir al usuario o mostrar un mensaje de éxito
                $_SESSION['ms'] = "Se envió un codigo a tu correo  $correo";
                $_SESSION['documento'] = $documento;
                $_SESSION['codigo_verificacion'] = $codigo;
                header("Location: index.php?correo_enviado=1");
                exit();
            } else {
                // Hubo un error al guardar la información en la tabla "carta"
                // Puedes manejar el error de acuerdo a tus necesidades
                $_SESSION['ms'] = "Error al guardar la información en la base de datos.";
                header("Location: index.php");
                exit();
            }
        } else {
            // Error al preparar la consulta
            // Puedes manejar el error de acuerdo a tus necesidades
            $_SESSION['ms'] = "Error al preparar la consulta SQL.";
            header("Location: index.php");
            exit();
        }
    } catch (Exception $e) {
        $_SESSION['ms'] = "Error al enviar el correo electrónico: {$mail->ErrorInfo}";
        header("Location: index.php");
        exit();
    }
}

?>
