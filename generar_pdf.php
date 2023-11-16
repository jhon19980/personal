<?php
session_start();

require "dist/fpdf/fpdf.php";
include('dist/includes/dbcon.php');

// Verificar si la solicitud es de tipo GET o POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verificar si 'codigo' está presente en la solicitud POST
    $codigo_ingresado = isset($_POST['codigo']) ? $_POST['codigo'] : null;

    // Obtener el código almacenado en la sesión
    $codigo_generado = $_SESSION['codigo_verificacion'];
    $documento = isset($_SESSION['documento']) ? $_SESSION['documento'] : ''; // Asegúrate de que la variable $documento esté definida

    if ($codigo_ingresado == $codigo_generado) {

        try {
            // Realizar una consulta SQL para obtener la información deseada, por ejemplo, desde una tabla llamada 'empleados'
            $stmt = $conexion->query("SELECT personal.*, promedios.*
            FROM personal
            LEFT JOIN promedios ON personal.id_personal = promedios.id_personal
            WHERE personal.documento = '$documento'"); // Reemplaza '1' con el ID del empleado deseado

            // Obtener los resultados
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($row) {

                // Crear una instancia de FPDF
                $pdf = new FPDF();
                $pdf->AddPage();

                // Establecer la imagen principal en la parte superior
                $pdf->Image('images/encabezado2.png', 0, 0, 210);

                // Configurar fuente y tamaño
                $pdf->SetFont('Arial', 'B', 14);
                $pdf->SetTextColor(0, 0, 0); // Establecer color de texto a negro
                $pdf->SetFillColor(255, 255, 255); // Establecer color de fondo a blanco 

                // Recuperar datos del formulario (en un escenario real, estos valores vendrían de la entrada del usuario)
                $nombre = utf8_decode($row['primer_apellido'] . '  ' . $row['segundo_apellido'] . '  ' . $row['primer_nombre'] . '  ' . $row['segundo_nombre']);
                $cedula = $row['documento'];
                $fechaInicio = $row['fecha_ingreso'];


                function numeroALetras($numero)
                {
                    // Separar parte entera y decimal
                    $partes = explode('.', $numero);
                    $entero = $partes[0];
                    $decimal = isset($partes[1]);

                    // Convertir parte entera y decimal a palabras
                    $enPalabras = ucfirst(numeroAString($entero));

                    return $enPalabras;
                }

                function numeroAString($numero)
                {
                    if ($numero === null) {
                        return '';
                    }
                    $formato = new NumberFormatter("es", NumberFormatter::SPELLOUT);
                    return ucfirst($formato->format($numero));
                }


                function convertirDecimalALetras($decimal)
                {
                    // Convertir la parte decimal a palabras
                    $formato = new NumberFormatter("es", NumberFormatter::SPELLOUT);
                    return ucfirst($formato->format($decimal));
                }
                // Formatear la fecha
                $fechaFormateada = date('d \d\e F \d\e Y', strtotime($fechaInicio));

                $cargo = $row['cargo'];

                // Obtener el salario básico
                $salarioBasico = $row['salario'];

                // Formatear el salario básico con puntos como separadores de miles
                $salarioFormateado = number_format($salarioBasico, 0, '.', '.');

                // Convertir el salario a palabras
                $salarioEnPalabras = numeroALetras($salarioBasico);

                $promedioMensual = $row['promedio'];

                // Formatear el promedio mensual con puntos como separadores de miles
                $promedioMensualFormateado = number_format($promedioMensual, 0, '.', '.');

                // Convertir el promedio a palabras
                $promedioEnPalabras = numeroALetras($promedioMensual);


                // Agregar contenido al PDF
                $pdf->SetXY(10, 60); // Establecer la posición para el contenido

                // Encabezado
                $pdf->Cell(0, 10, 'utf8_decode'('LA SUSCRITA DIRECTORA DE GESTIÓN HUMANA'), 0, 1, 'C');
                $pdf->Cell(0, 10, 'utf8_decode'('CERTIFICA'), 0, 1, 'C');
                $pdf->Ln(20); // Agregar espacio

                // Contenido
                $pdf->SetFont('Arial', '', 11);
                // Imprimir cédula
                $pdf->MultiCell(0, 7, utf8_decode("Que el (a) señor(a) $nombre, identificado(a) con la cédula de ciudadanía No. $cedula, se encuentra vinculado(a) a nuestra institución desde el $fechaFormateada, desempeña el cargo de $cargo" .
                    " devengando un salario básico mensual por valor de $salarioEnPalabras Pesos ($$salarioFormateado) y un promedio mensual de $promedioEnPalabras Pesos ($$promedioMensualFormateado.)" .
                    " Su contrato de trabajo es fijo a un (1) año, renovable."), 0, 'J');


                $pdf->Ln(10); // Agregar espacio antes del mensaje de la firma

                // Establecer la configuración regional a español
                setlocale(LC_TIME, 'es_ES.utf8');

                // Obtener la fecha actual
                $fechaActual = 'strftime'('%d de %B de %Y');

                // Restaurar la configuración regional a la predeterminada
                setlocale(LC_TIME, '');

                // Obtener el día actual en formato ordinal (por ejemplo, "doce" para el día 12)
                $diaActualOrdinal = date('jS');

                // Obtener el mes actual en formato completo (por ejemplo, "octubre" para el mes 10)
                $mesActual = 'strftime'('%B');

                // Obtener el año actual
                $anoActual = date('Y');

                // Función para convertir el número del día a letras
                function convertirNumeroALetras($numero)
                {
                    $unidades = array('', 'uno', 'dos', 'tres', 'cuatro', 'cinco', 'seis', 'siete', 'ocho', 'nueve');
                    $decenas = array('', 'diez', 'veinte', 'treinta', 'cuarenta', 'cincuenta', 'sesenta', 'setenta', 'ochenta', 'noventa');

                    if ($numero <= 9) {
                        return $unidades[$numero];
                    } elseif ($numero == 10) {
                        return 'diez';
                    } elseif ($numero < 20) {
                        $unidadesEspeciales = array('dieci', 'once', 'doce', 'trece', 'catorce', 'quince', 'dieciséis', 'diecisiete', 'dieciocho', 'diecinueve');
                        return $unidadesEspeciales[$numero - 10];
                    } else {
                        $unidad = $numero % 10;
                        $decena = floor($numero / 10);
                        $textoUnidad = ($unidad > 0) ? ' y ' . $unidades[$unidad] : '';
                        return $decenas[$decena] . $textoUnidad;
                    }
                }

                // Obtener el número del día actual
                $numeroDia = date('j');

                // Convertir el número del día a letras
                $numeroDiaEnLetras = convertirNumeroALetras($numeroDia);

                // Construir la parte de la cadena dinámicamente
                $parteFija = "a los $numeroDiaEnLetras $diaActualOrdinal días del mes de $mesActual de $anoActual.";
                // Mensaje final
                $firma = utf8_decode("Para constancia se firma en Santiago de Cali, a los $parteFija \n\nAtentamente,");
                $pdf->MultiCell(0, 10, $firma, 0, 'J');


                $pdf->Ln(60);


                $pdf->SetFont('Arial', '', 11);
                $firma2 = utf8_decode("MÓNICA PATRICIA HERRERA ARENAS \n Directora de Gestión Humana\nNit. 800.048.954 0");
                $pdf->MultiCell(0, 10, $firma2, 0, 'J');

                $pdf->Image('images/footer.png', 0, 266, 210);

                // Salida del PDF
                $pdf->Output('D', 'Carta Laboral.pdf', false);

                // Enviar el contenido del PDF al navegador para su descarga
                header('Content-Type: application/pdf');
            } else {
                // El registro no se encontró en la base de datos
                echo json_encode(['success' => false, 'message' => 'Registro no encontrado.']);
            }
        } catch (PDOException $e) {
            // Manejar errores de la consulta
            echo json_encode(['success' => false, 'message' => 'Error de consulta: ' . $e->getMessage()]);
        }

        // No envíes la respuesta JSON aquí, ya que eso podría interferir con la salida del PDF
    } else {
        // Responder con error
        echo json_encode(['success' => false, 'message' => 'Código incorrecto.']);
    }
} else {
    // Si no es una solicitud POST, puedes manejarlo de acuerdo a tus necesidades.
    echo json_encode(['success' => false, 'message' => 'Método de solicitud incorrecto.']);
}
