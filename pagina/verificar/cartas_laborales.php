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
<link rel="stylesheet" href="../layout/plugins/datatables/dataTables.bootstrap.css">
<link rel="stylesheet" href="../layout/apps/dist/css/adminlte.min.css">
<link rel="stylesheet" href="../layout/plugins/select2/select2.min.css">
<link rel="stylesheet" href="//cdn.datatables.net/1.13.3/css/jquery.dataTables.min.css">
<!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
<link rel="stylesheet" href="../layout/dist/css/skins/_all-skins.min.css">

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
              <h1 class="m-0">CARTAS LABORALES CREADAS</h1>
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
                    <th>Correo</th>
                    <th>Telefono</th>
                    <th>Fecha Creacion</th>
                  </tr>
                </thead>
                <tbody>
                  <?php

                  $query = $conexion->query("SELECT p.primer_nombre, p.primer_apellido, c.documento, c.correo, p.telefono, c.fecha_creacion
                                            FROM carta c
                                            INNER JOIN personal p ON c.documento = p.documento");

                  $i = 0;
                  while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                    $i++;
                    // Resto de tu código aquí...
                  ?>
                    <tr>

                      <td><?php echo $i; ?></td>
                      <td><?php echo $row['documento']; ?></td>
                      <td><?php echo $row['primer_nombre'] . '  ' . $row['primer_apellido']; ?></td>
                      <td><?php echo $row['correo']; ?></td>
                      <td><?php echo $row['telefono']; ?></td>
                      <td><?php echo $row['fecha_creacion']; ?></td>

                    </tr>
                    <!--end of modal-->
                  <?php } ?>
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
      <strong>Copyright &copy; 2021-2023 <a href="https://adminlte.io">ELECTROSYSTEM</a>.</strong> All rights reserved.
    </footer>
  </div><!-- /.box-body -->
  <!-- ./wrapper -->

  <!-- REQUIRED SCRIPTS -->

  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.min.js"></script>
  <script src="//cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script>


  <?php include '../layout/datatable_script.php'; ?>


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