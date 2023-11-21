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

<link rel="stylesheet" href="//cdn.datatables.net/1.13.3/css/jquery.dataTables.min.css">
<!-- Agrega estos enlaces en tu sección head -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

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
              <h1 class="m-0">LISTADO DE PERSONAL SIN USUARIO CREADO</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">LISTADO</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        <?php
        if ($tipo == "administrador" or $tipo == "gestion" or $tipo == "solinux" or $tipo == "scse") {

        ?>

          <button href="modalVisual" type="button" class="btn btn-warning btn-print" data-toggle="modal" data-target="#modalVisual">
            VISUALIZAR USUARIOS
          </button>

          <?php include('../generar/modals/modal_visualizar.php'); ?>

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
              <table id="example2" class="table table-bordered table-striped">
                <thead>
                  <tr class="btn-dark">
                    <th>#</th>
                    <th>Tipo Docu</th>
                    <th>Nombre y Apellido</th>
                    <th>Cargo</th>
                    <th>Área/Dpto</th>
                    <th>Fecha Creacion</th>
                    <th class="btn-print"> Accion </th>
                  </tr>
                </thead>
                <tbody>
                  <?php

                  // ...

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
                  $query = $conexion->prepare("SELECT usuarioxpersonal.*, cargo_personal.*, personal.tipo_documento, documento, primer_apellido,
                segundo_apellido, primer_nombre, segundo_nombre, fecha_nacimiento, lugar_nacimiento, 
                telefono, estado_civil, direccion, barrio, correo, servicios.*
                FROM usuarioxpersonal
                LEFT JOIN cargo_personal ON usuarioxpersonal.id_cargo = cargo_personal.id_cargo
                LEFT JOIN personal ON usuarioxpersonal.id_personal = personal.id_personal
                LEFT JOIN servicios ON usuarioxpersonal.id_servicios = servicios.id_servicios
                WHERE personal.estado_personal = 1
                AND (
                  (
                    :tipoUsuario = 'solinux' 
                    AND (
                        usuarioxpersonal.usuario_correo = '' OR usuarioxpersonal.usuario_correo IS NULL
                    )
                  )
                  OR
                  (
                    :tipoUsuario = 'administrador' 
                    AND (
                      usuarioxpersonal.usuario_moodle = '' OR usuarioxpersonal.usuario_moodle IS NULL
                      OR usuarioxpersonal.usuario_correo = '' OR usuarioxpersonal.usuario_correo IS NULL
                      OR usuarioxpersonal.usuario_scse = '' OR usuarioxpersonal.usuario_scse IS NULL
                      OR usuarioxpersonal.usuario_binaps = '' OR usuarioxpersonal.usuario_binaps IS NULL
                    )
                  )
                  OR
                  (
                    :tipoUsuario = 'moodle'
                    AND (
                        usuarioxpersonal.usuario_moodle = '' OR usuarioxpersonal.usuario_moodle IS NULL
                    )
                  )
                  OR
                  (
                    :tipoUsuario = 'scse'
                    AND (
                        usuarioxpersonal.usuario_scse = '' OR usuarioxpersonal.usuario_scse IS NULL
                    )
                    )
                  OR
                  (
                    :tipoUsuario = 'gestion'
                    AND (
                        usuarioxpersonal.usuario_moodle = '' OR usuarioxpersonal.usuario_moodle IS NULL
                        OR usuarioxpersonal.usuario_correo = '' OR usuarioxpersonal.usuario_correo IS NULL
                        OR usuarioxpersonal.usuario_scse = '' OR usuarioxpersonal.usuario_scse IS NULL
                        OR usuarioxpersonal.usuario_binaps = '' OR usuarioxpersonal.usuario_binaps IS NULL
                    )
                  )
              )");

                  $query->bindParam(':tipoUsuario', $tipoUsuario);
                  $query->execute();

                  // Resto del código...


                  $usuarios = array(); // Array para almacenar datos únicos por id_usuario_personal

                  $i = 0;
                  while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                    $id_usuario_personal = $row['id_usuario_personal'];
                    $id_personal = $row['id_personal'];
                    // Asegurarse de no duplicar registros
                    if (!isset($usuarios[$id_usuario_personal])) {
                      $usuarios[$id_usuario_personal] = $row;
                      $i++;
                      // Resto de tu código aquí...
                  ?>
                      <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $row['documento']; ?></td>
                        <td><?php echo $row['primer_nombre'] . '  ' . $row['primer_apellido']; ?></td>
                        <td><?php echo $row['cargo']; ?></td>
                        <td><?php echo $row['area']; ?></td>
                        <td><?php echo $row['fecha_ingreso']; ?></td>
                        <td>
                          <button type="button" class="btn btn-warning btn-print" data-toggle="modal" data-target="#peractualizar<?php echo $row['id_usuario_personal']; ?>">
                            <i class="fas fa-edit"></i>
                          </button>
                          <?php include('../generar/modals/modal_generar_personal.php'); ?>
                        </td>
                      </tr>
                      <!-- Nueva fila para la información de usuarios ya creados -->
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
      <strong>Copyright &copy; 2021-2023 .</strong> All rights reserved.
    </footer>
  </div><!-- /.box-body -->
  <!-- ./wrapper -->

  <!-- REQUIRED SCRIPTS -->

  <!-- AdminLTE App -->
  <script src="//cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script>



  <script>
    $(document).ready(function() {
      $('#example2').DataTable({

      });
    });
  </script>



  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <!-- /gauge.js -->
</body>

</html>