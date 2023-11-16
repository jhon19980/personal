<?php
session_start();

require "../../dist/fpdf/fpdf.php";
include('../../dist/includes/dbcon.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verificar si 'codigo' está presente en la solicitud POST
    $codigo_ingresado = isset($_POST['codigo']) ? $_POST['codigo'] : null;

    // Obtener el código almacenado en la sesión
    $codigo_generado = $_SESSION['codigo_verificacion'];

    if ($codigo_ingresado == $codigo_generado) {
        // Crear una instancia de FPDF
        $pdf = new FPDF();
        $pdf->AddPage();

        // Configurar fuente y tamaño
        $pdf->SetFont('Arial', 'B', 16);

        // Recuperar datos del formulario (en un escenario real, estos valores vendrían de la entrada del usuario)
        $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
        $apellido = isset($_POST['apellido']) ? $_POST['apellido'] : '';
        $correo = isset($_POST['correo']) ? $_POST['correo'] : '';

        // Agregar contenido al PDF
        $pdf->Cell(0, 10, 'Carta Laboral', 0, 1, 'C');
        $pdf->Cell(0, 10, 'Fecha: ' . date('Y-m-d'), 0, 1, 'C');
        $pdf->Cell(0, 10, 'Nombre: ' . $nombre, 0, 1);
        $pdf->Cell(0, 10, 'Apellido: ' . $apellido, 0, 1);
        $pdf->Cell(0, 10, 'Correo: ' . $correo, 0, 1);

        // Salida del PDF
        $pdfContent = $pdf->Output('', 'S'); // Obtener el contenido del PDF como cadena

        // Enviar el contenido del PDF al navegador
        header('Content-Type: application/pdf');
        header('Content-Disposition: inline; filename="carta_laboral.pdf"');
        header('Content-Length: ' . strlen($pdfContent));
        echo $pdfContent;

        // No envíes la respuesta JSON aquí, ya que eso podría interferir con la salida del PDF
    } else {
        // Responder con error
        echo json_encode(['success' => false, 'message' => 'Código incorrecto.']);
    }
} else {
    // Si no es una solicitud POST, puedes manejarlo de acuerdo a tus necesidades.
    echo json_encode(['success' => false, 'message' => 'Método de solicitud incorrecto.']);
}
?>
