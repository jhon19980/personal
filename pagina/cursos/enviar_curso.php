<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// ... (inclusión de archivos y configuración de PHPMailer)

$mail = configurarPHPMailer();

while (true) {
    $query = $conexion->query("SELECT cursoxpersonal.*, personal.*,cursos.* FROM cursoxpersonal LEFT JOIN personal ON cursoxpersonal.id_persona = personal.id_personal LEFT JOIN cursos ON cursoxpersonal.id_curso = cursos.id_curso WHERE estado_personal = 1");

    $correosEnviados = 0;

    while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
        $fechaCurso = new DateTime($row['fecha_del_curso']);
        $fechaCaducidad = new DateTime($row['fecha_caducidad']);
        $fechaActual = new DateTime();
        $diasRestantes = $fechaActual->diff($fechaCaducidad)->days;

        if ($diasRestantes === 30) {
            // Configuración específica para el correo de recordatorio
            $recordatorioSubject = 'Recordatorio de caducidad de curso';
            $recordatorioBody = "Hola,\n\nEl curso con ID {$row['id_curso']} está a punto de caducar en 30 días para el personal con ID {$row['id_personal']}.\n\nSaludos, Sistemas TI";

            // Codificar el contenido del correo en UTF-8
            $recordatorioSubject = utf8_encode($recordatorioSubject);
            $recordatorioBody = utf8_encode($recordatorioBody);
            
            // Cambiar la configuración del correo para el recordatorio
            $mail->Subject = $recordatorioSubject;
            $mail->Body = $recordatorioBody;

            // Especificar la dirección de correo electrónico a la que se enviará el recordatorio
            $mail->addAddress($row['correo']);

            // Enviar el correo electrónico
            $mail->send();

            $correosEnviados++;
        }
    }

    // Si se enviaron correos, esperar 24 horas antes de volver a revisar
    if ($correosEnviados > 0) {
        sleep(86400);
    } else {
        // Si no se enviaron correos, puedes ajustar el tiempo de espera según sea necesario
        sleep(3600); // Esperar 1 hora antes de volver a revisar
    }
}

function configurarPHPMailer()
{
    // Carga las clases de PHPMailer
    require 'ruta/donde/este/tu/configuración/Exception.php'; // Asegúrate de usar la ruta correcta
    require 'ruta/donde/este/tu/configuración/PHPMailer.php';

    // Crea una instancia de PHPMailer
    $mail = new PHPMailer(true);

    // Configuración del servidor SMTP y otros detalles
    $mail->isSMTP();
    $mail->Host = 'correo.clinicaversalles.com.co';
    $mail->SMTPAuth = true;
    $email = 'versallesti@clinicaversalles.com.co';
    $mail->Username = $email;
    $mail->Password = 'Ayt.197*';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->Port = 465;

    // Configuración del remitente
    $mail->setFrom($email, 'japatino@clinicaversalles.com.co');

    return $mail;
}

?>