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

$correo = $_POST['correo'];

// Verificar si el correo ya ha sido utilizado más de tres veces
if (isset($_SESSION['intentos_por_correo'][$correo]) && $_SESSION['intentos_por_correo'][$correo] >= 3) {
    echo '<script>
        Swal.fire({
            icon: "error",
            title: "Correo no disponible",
            text: "Este correo ha alcanzado el límite de intentos permitidos en el mes para generar cartas laborales.",
            showConfirmButton: true,
            confirmButtonText: "Cerrar"
        }).then(function(result){
            window.location = "carta.php";
        });
    </script>';
} else {
    // Incrementar el contador de intentos para este correo
    $_SESSION['intentos_por_correo'][$correo] = isset($_SESSION['intentos_por_correo'][$correo]) ? ($_SESSION['intentos_por_correo'][$correo] + 1) : 1;

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
        $email = 'japatino@clinicaversalles.com.co';  // Corrección aquí
        $mail->Username = $email;
        $mail->Password = 'V3g4.2021*';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port = 465;

        // Configurar el remitente y el destinatario
        $mail->setFrom($email, 'Jhon Patiño');
        $mail->addAddress($correo);

        // Configurar el asunto y el cuerpo del mensaje
        $mail->Subject = 'Codigo de Verificacion';
        $mail->Body = "Tu codigo de verificacion es: $codigo";
        $mail->SMTPDebug = 0;

        // Enviar el correo electrónico
        $mail->send();
        echo '<script>
        Swal.fire({
            icon: "success",
            title: "Datos Enviados al correo",
            showConfirmButton: true,
            confirmButtonText: "Cerrar"
        }).then(function(result){
            if(result.value){                   
                window.location = "carta.php";
            }
        });
    </script>';
    } catch (Exception $e) {
        echo "Error al enviar el correo electrónico: {$mail->ErrorInfo}";
    }
}



?>