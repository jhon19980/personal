<!--A Design by Jhon Alexander P
Author: ElectroSystem
Author URL: http://electrosistem.com.co
License: Creative Commons Attribution 1.0 Unported

-->

<?php
session_start();
include('../../pagina/layout/session.php'); // Para limitar el tiempo

// Redirige al index si la sesión no está activa
if (!isset($_SESSION['usuario_autenticado']) || empty($_SESSION['usuario_autenticado'])) {
  header('Location: ../../index.php');
  exit();
}
?>

<?php include '../layout/header.php';

?>

<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php'; ?>
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- DataTables CSS y JS -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>


<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <?php include '../layout/main_sidebar.php'; ?>
    <!-- top navigation -->
    </aside>
    <?php include '../layout/top_nav.php'; ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">LISTADO CURSOS POR PERSONA REGISTRADAS</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">LISTADO</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        <!--VALIDAR INGRESO DE CLIENTE EN EL SISTEMA-->
        <?php
        if ($tipo == "administrador" or $tipo == "gestion") {

        ?>

          <button href="modalCursoPersonal" type="button" class="btn btn-warning btn-print" data-toggle="modal" data-target="#modalCursoPersonal">
            REGISTRAR CURSO
          </button>

          <?php include('../cursos/modals/modal_curso_add.php'); ?>

        <?php
        }
        ?>
      </div>
      <!-- /.content-header -->

      <!--end of modal-->

      <div class="content">
        <div class="container-fluid">
          <div class="box-body">
            <div class="box-body" style="overflow-x:scroll; ">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr class=" btn-dark">

                    <th>#</th>
                    <th>Nombre Persona</th>
                    <th>Curso</th>
                    <th>Fecha Inicio</th>
                    <th>Fecha Caducidad</th>
                    <th class="btn-print"> Dias Restantes </th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  function configurarPHPMailer()
                  {
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

                    // Configuración del remitente y destinatario
                    $mail->setFrom($email, 'japatino@clinicaversalles.com.co');
                    $mail->addAddress('japatino@clinicaversalles.com.co');

                    return $mail;
                  }

                  $mail = configurarPHPMailer();

                  $query = $conexion->query("SELECT cursoxpersonal.*, personal.primer_nombre AS nombre_personal, personal.primer_apellido AS apellido_personal, cursos.nombre_curso
                  FROM cursoxpersonal
                  LEFT JOIN personal ON cursoxpersonal.id_persona = personal.id_personal
                  LEFT JOIN cursos ON cursoxpersonal.id_curso = cursos.id_curso
                  WHERE estado_personal = 1");
                  $i = 0;



                  try {
                    // Inicializar un array para acumular la información de los cursos
                    $correoCursos = [];

                    // Inicializar un array para almacenar los IDs de los cursos para los que ya se envió el correo
                    $cursosEnviados = [];

                    while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                      $i++;

                      $fechaCurso = new DateTime($row['fecha_del_curso']);
                      $fechaCaducidad = new DateTime($row['fecha_caducidad']);
                      $fechaActual = new DateTime();
                      $diasRestantes = $fechaActual->diff($fechaCaducidad)->days;

                      // Determinar el color según la cantidad de días restantes
                      if ($diasRestantes > 30) {
                        $color = 'green'; // Verde si faltan bastantes días
                      } elseif ($diasRestantes > 0) {
                        $color = 'orange'; // Naranja si estamos en el medio
                      } else {
                        $color = 'red'; // Rojo si ya se caducaron
                      }

                      // Verificar si ya se ha enviado un correo para este curso hoy
                      $fechaEnvio = date('Y-m-d');
                      $queryVerificarCorreoEnviado = $conexion->prepare("SELECT * FROM correos_enviados WHERE id_curso_personal = :id_curso_personal AND fecha_envio = :fecha_envio");
                      $queryVerificarCorreoEnviado->bindParam(':id_curso_personal', $row['id_curso_personal']);
                      $queryVerificarCorreoEnviado->bindParam(':fecha_envio', $fechaEnvio);
                      $queryVerificarCorreoEnviado->execute();

                      $correoEnviado = $queryVerificarCorreoEnviado->fetch(PDO::FETCH_ASSOC);

                      if (empty($correoEnviado) && $diasRestantes === 30 && !in_array($row['id_curso_personal'], $cursosEnviados)) {
                        // Agregar información al array de acumulador
                        $correoCursos[$row['id_curso_personal']][] = "Curso: {$row['nombre_curso']}, Persona: {$row['nombre_personal']} {$row['apellido_personal']}";

                        // Almacenar el ID del curso en el array de cursos enviados
                        $cursosEnviados[] = $row['id_curso_personal'];
                      }

                      // Resto de tu código...
                  ?>
                      <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $row['nombre_personal'] . '  ' . $row['apellido_personal']; ?></td>
                        <td><?php echo $row['nombre_curso']; ?></td>
                        <td><?php echo $row['fecha_del_curso']; ?></td>
                        <td><?php echo $row['fecha_caducidad']; ?></td>
                        <td style="color: <?php echo $color; ?>"><?php echo $diasRestantes . ' días restantes'; ?></td>
                      </tr>
                  <?php
                    }

                    // Resto de tu código...

                    // Enviar el correo electrónico solo si hay información acumulada
                    if (!empty($correoCursos)) {
                      // Configuración específica para el correo de recordatorio
                      $recordatorioSubject = 'Recordatorio de caducidad de cursos';
                      $recordatorioBody = "Hola,\n\nLos siguientes cursos están a punto de caducar en 30 días:\n\n";

                      // Construir el cuerpo del correo con información acumulada
                      foreach ($correoCursos as $cursoIdPersonal => $cursoInfo) {
                        $recordatorioBody .= implode("\n", $cursoInfo) . "\n\n";

                        // Obtener el ID del curso desde la tabla cursoxpersonal
                        $queryObtenerCursoId = $conexion->prepare("SELECT id_curso FROM cursoxpersonal WHERE id_curso_personal = :id_curso_personal");
                        $queryObtenerCursoId->bindParam(':id_curso_personal', $cursoIdPersonal);
                        $queryObtenerCursoId->execute();
                        $cursoId = $queryObtenerCursoId->fetchColumn();

                        // Registrar el envío del correo en la base de datos
                        $queryRegistrarEnvio = $conexion->prepare("INSERT INTO correos_enviados (id_curso_personal, fecha_envio) VALUES (:id_curso_personal, :fecha_envio)");
                        $queryRegistrarEnvio->bindParam(':id_curso_personal', $cursoIdPersonal);
                        $queryRegistrarEnvio->bindParam(':fecha_envio', $fechaEnvio);
                        $queryRegistrarEnvio->execute();
                      }

                      $recordatorioBody .= "Saludos, Sistemas TI";

                      // Codificar el contenido del correo en UTF-8
                      $recordatorioSubject = utf8_decode($recordatorioSubject);
                      $recordatorioBody = utf8_decode($recordatorioBody);

                      // Cambiar la configuración del correo para el recordatorio
                      $mail->Subject = $recordatorioSubject;
                      $mail->Body = $recordatorioBody;

                      // Enviar el correo electrónico
                      $mail->send();
                    }
                  } catch (Exception $e) {
                    $_SESSION['ms'] = "Error al enviar el correo electrónico: {$mail->ErrorInfo}";
                    // Manejar el error de manera controlada
                  }

                  // Resto de tu código...
                  ?>

                </tbody>

              </table>
            </div>
          </div>
        </div><!-- /.box-body -->
      </div>
    </div>


    <!-- /page content -->

    <!-- footer content -->
    <footer class="main-footer">
      <!-- To the right -->
      <div class="float-right d-none d-sm-inline">
        DESARROLLADO POR JHON ALEXANDER PATIÑO
      </div>
      <!-- Default to the left -->
      <strong>Copyright &copy; 2021-2023 </strong> All rights reserved.
    </footer>
  </div><!-- /.box-body -->
  <!-- ./wrapper -->

  <!-- REQUIRED SCRIPTS -->


  <script src="//cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script>


  <script>
    $(document).ready(function() {
      $('#example1').DataTable({

      });
    });
  </script>
</body>

</html>