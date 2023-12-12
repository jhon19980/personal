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

<!-- Font Awesome -->
<link rel="stylesheet" href="../layout/apps/dist/css/adminlte.min.css">

<link rel="stylesheet" href="//cdn.datatables.net/1.13.3/css/jquery.dataTables.min.css">
<!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->

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
              <h1 class="m-0">LISTADO DE PERSONAL PARA ACTIVAR</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">LISTADO</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->



      <!--end of modal-->

      <div class="content">
        <div class="container-fluid">
          <div class="box-body">
            <div class="box-body" style="overflow-x:scroll; ">
              <table id="example2" class="table table-bordered table-striped">
                <thead>
                  <tr class=" btn-dark">

                    <th>#</th>
                    <th>Tipo Docu</th>
                    <th>Nombre y Apellido</th>
                    <th>Cargo</th>
                    <th>Área/Dpto</th>
                    <th>Terminos</th>
                    <th>Condiciones</th>
                    <th class="btn-print"> Accion </th>
                  </tr>
                </thead>
                <tbody>
                  <?php

                  // Obtener los datos del usuario y de la empresa
                  $session_id = $_SESSION['id'];

                  // Consulta para obtener datos del usuario
                  $user_query = $conexion->prepare("SELECT * FROM usuario WHERE id = :session_id");
                  $user_query->bindParam(':session_id', $session_id);
                  $user_query->execute();
                  $user_row = $user_query->fetch(PDO::FETCH_ASSOC);

                  $user_username = $user_row['usuario'];
                  $nombre = $user_row['usuario'];
                  $imagen = $user_row['imagen'];
                  $tipoUsuario = $user_row['tipo'];

                  // Consulta para obtener datos de los usuarios según el tipo de usuario
                  $query = $conexion->prepare("SELECT usuarioxpersonal.*, cargo_personal.*, personal.tipo_documento, personal.documento as personal_documento, primer_apellido,
                              segundo_apellido, primer_nombre, segundo_nombre, fecha_nacimiento, lugar_nacimiento, 
                              telefono, estado_civil, direccion, barrio, correo, servicios.*, inactivo.termino, inactivo.condicion, personal.estado_personal,
                              CASE 
                                  WHEN (
                                      :tipoUsuario = 'solinux' 
                                      AND (
                                          usuarioxpersonal.correo_activo = 1 
                                          OR (usuarioxpersonal.correo_activo = 0 AND personal.estado_personal = 2)
                                      )
                                  )
                                  THEN 'Correo Estado Especial'
                                  WHEN (
                                      :tipoUsuario = 'administrador' 
                                      AND (
                                          usuarioxpersonal.moodle_activo = 1 OR usuarioxpersonal.moodle_activo = 0
                                          OR usuarioxpersonal.correo_activo = 1 OR usuarioxpersonal.correo_activo = 0
                                          OR usuarioxpersonal.scse_activo = 1 OR usuarioxpersonal.scse_activo = 0
                                          OR usuarioxpersonal.binaps_activo = 1 OR usuarioxpersonal.binaps_activo = 0
                                          OR personal.estado_personal = 2
                                      )
                                  ) THEN 'Correo Estado Administrador'
                                  WHEN (  
                                      :tipoUsuario = 'moodle' 
                                      AND (
                                          usuarioxpersonal.moodle_activo = 1 
                                          OR (usuarioxpersonal.moodle_activo = 0 AND personal.estado_personal = 2)
                                      )
                                  )
                                  THEN 'Correo Estado Moodle'
                                  WHEN (
                                      :tipoUsuario = 'scse' 
                                      AND (
                                          usuarioxpersonal.scse_activo = 1 
                                          OR (usuarioxpersonal.scse_activo  = 0 AND personal.estado_personal = 2)
                                      )
                                  )
                                  THEN 'Correo Estado Scse'
                                  WHEN (
                                      :tipoUsuario = 'binaps' 
                                      AND (
                                          usuarioxpersonal.binaps_activo  = 1 
                                          OR (usuarioxpersonal.binaps_activo  = 0 AND personal.estado_personal = 2)
                                      )
                                  )
                                  THEN 'Correo Estado Binaps'
                                  WHEN (
                                      :tipoUsuario = 'gestion' 
                                      AND (
                                          usuarioxpersonal.moodle_activo = 1 OR usuarioxpersonal.moodle_activo = 0
                                          OR usuarioxpersonal.correo_activo = 1 OR usuarioxpersonal.correo_activo = 0
                                          OR usuarioxpersonal.scse_activo  = 1 OR usuarioxpersonal.scse_activo = 0
                                          OR usuarioxpersonal.binaps_activo  = 1 OR (usuarioxpersonal.binaps_activo  = 0 AND personal.estado_personal = 2)
                                      )
                                  ) THEN 'Correo Estado Gestion'
                                  ELSE NULL
                              END AS correo_estado

                              FROM usuarioxpersonal
                              LEFT JOIN cargo_personal ON usuarioxpersonal.id_cargo = cargo_personal.id_cargo
                              LEFT JOIN personal ON usuarioxpersonal.id_personal = personal.id_personal
                              LEFT JOIN servicios ON usuarioxpersonal.id_servicios = servicios.id_servicios
                              LEFT JOIN inactivo ON usuarioxpersonal.id_personal = inactivo.id_personal

                              WHERE (
                                personal.estado_personal = 0 OR personal.estado_personal = 2
                                )
                            AND (
                                (
                                                :tipoUsuario = 'solinux' 
                                                AND (
                                                    usuarioxpersonal.correo_activo = 1 OR (usuarioxpersonal.correo_activo = 0 AND personal.estado_personal = 2)
                                                )
                                            )
                                            OR
                                            (
                                                :tipoUsuario = 'administrador'
                                                AND (
                                                    usuarioxpersonal.moodle_activo = 1 OR usuarioxpersonal.moodle_activo = 0
                                                    OR usuarioxpersonal.correo_activo = 1 OR usuarioxpersonal.correo_activo = 0
                                                    OR usuarioxpersonal.scse_activo = 1 OR usuarioxpersonal.scse_activo = 0
                                                    OR usuarioxpersonal.binaps_activo = 1 OR (usuarioxpersonal.binaps_activo = 0 AND personal.estado_personal = 2)
                                                )
                                            )
                                            OR
                                            (
                                                :tipoUsuario = 'moodle'
                                                AND (
                                                    usuarioxpersonal.moodle_activo = 1 OR (usuarioxpersonal.moodle_activo  = 0 AND personal.estado_personal = 2)
                                                )
                                            )
                                            OR
                                            (
                                                :tipoUsuario = 'scse'
                                                AND (
                                                    usuarioxpersonal.scse_activo = 1 OR (usuarioxpersonal.scse_activo = 0 AND personal.estado_personal = 2)
                                                )
                                            )
                                            OR
                                            (
                                                :tipoUsuario = 'binaps'
                                                AND (
                                                    usuarioxpersonal.binaps_activo  = 1 OR (usuarioxpersonal.binaps_activo  = 0 AND personal.estado_personal = 2)
                                                )
                                            )
                                            OR
                                            (
                                                :tipoUsuario = 'gestion'
                                                AND (
                                                    usuarioxpersonal.moodle_activo  = 1 OR usuarioxpersonal.moodle_activo  = 0
                                                    OR usuarioxpersonal.correo_activo  = 1 OR usuarioxpersonal.correo_activo = 0
                                                    OR usuarioxpersonal.scse_activo  = 1 OR usuarioxpersonal.scse_activo = 0
                                                    OR usuarioxpersonal.binaps_activo  = 1 OR (usuarioxpersonal.binaps_activo = 0 AND personal.estado_personal = 2)
                                                )
                                            )
                                        )

                                ");


                  $query->bindParam(':tipoUsuario', $tipoUsuario);
                  $query->execute();

                  $usuarios = array(); // Array para almacenar datos únicos por id_usuario_personal
                  $i = 0;
                  while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                    $id_usuario_personal = $row['id_usuario_personal'];
                    $id_personal = $row['id_personal'];

                    // Obtén el valor de 'estado_personal'
                    $estado_personal = $row['estado_personal'];  // Accede a 'estado_personal' de esta manera
                    // Asegurarse de no duplicar registros
                    if (!isset($usuarios[$id_usuario_personal])) {
                      $usuarios[$id_usuario_personal] = $row;
                      $i++;

                      // Determina el color de fondo
                      $background_color = '';
                      if ($estado_personal == 2) {
                        $background_color = 'lightgreen';
                      }
                      // Resto de tu código aquí...
                  ?>

                      <tr style="background-color: <?php echo $background_color; ?>">

                        <td><?php echo $i; ?></td>
                        <td><?php echo $row['personal_documento']; ?></td>
                        <td><?php echo $row['primer_nombre'] . '  ' . $row['primer_apellido']; ?></td>
                        <td><?php echo $row['cargo']; ?></td>
                        <td><?php echo $row['area']; ?></td>
                        <td style="background-color: <?php echo $row['termino'] == 'Temporal' ? 'orange' : 'red'; ?>"><?php echo $row['termino']; ?></td>
                        <td><?php echo $row['condicion']; ?></td>

                        <td>

                          <button type="button" class="btn btn-warning btn-print" data-toggle="modal" data-target="#perinactivo<?php echo $row['id_usuario_personal']; ?>">
                            <i class="fas fa-edit"></i>
                          </button>
                          <?php include('../inactivar/modals/modal_personal_inactivo.php'); ?>



                        </td>
                      </tr>
                      <!--end of modal-->
                  <?php
                    }
                  }
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


  <script src="//cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script>


  <script>
    $(document).ready(function() {
      $('#example2').DataTable({

      });
    });
  </script>

  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>