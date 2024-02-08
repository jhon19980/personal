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

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- DataTables CSS y JS -->

<link href="https://cdn.datatables.net/v/dt/jq-3.6.0/jszip-2.5.0/dt-1.13.4/b-2.3.6/b-colvis-2.3.6/b-html5-2.3.6/b-print-2.3.6/datatables.min.css" rel="stylesheet" />


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
              <h1 class="m-0">LISTADO PERSONAS INGRESADAS</h1>
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

          <button href="modalIngresoPersonal" type="button" class="btn btn-warning btn-print" data-toggle="modal" data-target="#modalIngresoPersonal">
            REGISTRAR PERSONAL
          </button>

          <?php include('../personal/modals/modal_personal_add.php'); ?>

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
                    <th>Documento</th>
                    <th>Nombre Completo</th>
                    <th>Fecha Nacimiento</th>
                    <th>Telefono</th>
                    <th>Direccion</th>
                    <th>Correo</th>
                    <th class="btn-print"> Accion </th>
                  </tr>
                </thead>
                <tbody>
                  <?php

                  //MODIFICACION ACTUAL RECIENTE
                  $query = $conexion->query("SELECT cargo_personal.*, personal.*
                  FROM cargo_personal
                  LEFT JOIN personal ON cargo_personal.id_personal = personal.id_personal
                  WHERE estado_personal = 1");
                  $i = 0;
                  while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                    $id_personal = $row['id_personal'];
                    $i++;
                    // Resto de tu código aquí...
                  ?>
                    <tr>

                      <td><?php echo $row['id_personal']; ?></td>
                      <td><?php echo $row['documento']; ?></td>
                      <td><?php echo $row['primer_nombre'] . '  ' . $row['primer_apellido']; ?></td>
                      <td><?php echo $row['fecha_nacimiento']; ?></td>
                      <td><?php echo $row['telefono']; ?></td>
                      <td><?php echo $row['direccion']; ?></td>
                      <td><?php echo $row['correo']; ?></td>

                      <td>

                        <?php if ($tipo == "administrador"  or $tipo == "gestion") { ?>
                          <button type="button" class="btn btn-warning btn-print" data-toggle="modal" data-target="#modalEditarPersonal<?php echo $row['id_personal']; ?>">
                            <i class="fas fa-edit"></i>
                          </button>
                          <?php include('../personal/editar/editar_personal.php'); ?>
                        <?php } ?>

                      </td>
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
      <strong>Copyright &copy; 2021-2023 </strong> All rights reserved.
    </footer>
  </div><!-- /.box-body -->
  <!-- ./wrapper -->

  <!-- REQUIRED SCRIPTS -->

  <script src="//cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
  <script src="https://cdn.datatables.net/v/dt/jq-3.6.0/jszip-2.5.0/dt-1.13.4/b-2.3.6/b-colvis-2.3.6/b-html5-2.3.6/b-print-2.3.6/datatables.min.js"></script>



  <script>
    $(function() {
      $("#example1").DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
        dom: 'Bfrtip',
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script>
</body>

</html>