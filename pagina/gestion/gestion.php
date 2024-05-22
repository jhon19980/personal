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
              <h1 class="m-0">LISTADO DEL USO ADECUADO DE ELEMENTOS DE PROTECCION PERSONAL INGRESADAS</h1>
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
        if ($tipo == "administrador" or $tipo == "gestion" or $tipo == "sst") {

        ?>

          <button href="modalIngresoPersonal" type="button" class="btn btn-warning btn-print" data-toggle="modal" data-target="#modalIngresoPersonal">
            REGISTRAR PERSONAL
          </button>

          <?php include('../gestion/modals/modal_gestion_add.php'); ?>

        <?php
        }
        ?>
      </div>
      <!-- /.content-header -->

      <!--end of modal-->

      <div class="content">
        <div class="container-fluid">
          <div class="box-body">


            <form action="" method="GET">

              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">DATOS DEL EMPLEADO</h3>
                </div>
                <div class="container-fluid">
                  <div class="modal-body">

                    <div class="row">

                      <div class="col-md-6">

                        <div class="form-group">
                          <label><b>Del Dia</b></label>
                          <input type="date" name="from_date" value="<?php if (isset($_GET['from_date'])) {
                                                                        echo $_GET['from_date'];
                                                                      } ?>" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label><b> Hasta el Dia</b></label>
                          <input type="date" name="to_date" value="<?php if (isset($_GET['to_date'])) {
                                                                      echo $_GET['to_date'];
                                                                    } ?>" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label><b></b></label> <br>
                          <button type="submit" class="btn btn-primary">Buscar</button>
                        </div>
                      </div>
                    </div>
                    <br>
                  </div>
                </div>
              </div>

            </form>
            <div class="box-body" style="overflow-x:scroll; ">
              <table id="example1" class="table table-bordered table-striped">
                <?php
                // Verifica si se han proporcionado las fechas
                if (isset($_GET['from_date']) && isset($_GET['to_date'])) {
                ?>
                  <thead>
                    <tr class=" btn-dark">
                      <th>#</th>
                      <th>Responsable</th>
                      <th>Nombre Colaborador</th>
                      <th>Fecha Ingreso</th>
                      <th class="btn-print">Acción</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    // Sanitiza y escapa las entradas GET para prevenir inyecciones SQL
                    $from_date = htmlentities($_GET['from_date']);
                    $to_date = htmlentities($_GET['to_date']);

                    // Realiza la consulta con el filtro de fechas
                    $query = $conexion->prepare("SELECT * FROM gestion WHERE estado = 1 AND fecha BETWEEN :from_date AND :to_date");
                    $query->bindParam(':from_date', $from_date);
                    $query->bindParam(':to_date', $to_date);
                    $query->execute();

                    $i = 0;
                    while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                      $id_gestion = $row['id_gestion'];
                      $i++;
                      // Resto de tu código aquí...
                    ?>
                      <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $row['responsable']; ?></td>
                        <td><?php echo $row['nombre_cola']; ?></td>
                        <td><?php echo $row['fecha']; ?></td>
                        <td>
                          <?php if ($tipo == "administrador"  or $tipo == "gestion" or $tipo == "sst") { ?>
                            <div class="row">
                              <div class="col-6">
                                <button type="button" class="btn btn-warning btn-print" data-toggle="modal" data-target="#modalEditarGestion<?php echo $row['id_gestion']; ?>">
                                  <i class="fas fa-edit"></i>
                                </button>
                              </div>
                              <!--<div class="col-4">
                                <form action="inactivar_gestion.php" method="post">
                                  <input type="hidden" name="id_gestion" value="<?php echo $id_gestion; ?>">
                                  <button type="submit" class="btn btn-danger"><i class="fas fa-ban"></i></button>
                                </form>
                              </div>
                            </div>-->
                            <?php include('../gestion/editar/editar_gestion.php'); ?>
                          <?php } ?>
                        </td>
                      </tr>
                      <!--end of modal-->
                    <?php } ?>
                  </tbody>
                <?php } ?>
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