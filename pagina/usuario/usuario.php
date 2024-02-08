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
              <h1 class="m-0">ADMINISTRACION DEL SISTEMA Y GESTION </h1>
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

      </div>
      <!-- /.content-header -->

      <!--end of modal-->


      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 order-md-2">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">USUARIOS REGISTRADOS EN EL SISTEMA</h3>
                </div>
                <div class="card-body">
                  <div class="box-body" style="overflow-x:scroll; ">
                    <table id="example2" class="table table-bordered table-striped">
                      <thead>
                        <tr class=" btn-dark">

                          <th>#</th>
                          <th>Foto</th>
                          <th>Nombre Completo</th>
                          <th>Usuario</th>
                          <th>Tipo Usuario</th>
                          <th class="btn-print"> Accion </th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        // $branch=$_SESSION['branch'];


                        $query = $conexion->query("SELECT * FROM usuario");
                        $i = 0;
                        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                          $cid = $row['id'];
                          $i++;

                        ?>
                          <tr>

                            <td><?php echo $i; ?></td>
                            <td><IMG src="subir_us/<?php echo $row['imagen']; ?>" style="height:50PX" /></td>
                            <td><?php echo $row['nombre_usu'] . '  ' . $row['apellido_usu']; ?></td>
                            <td><?php echo $row['usuario']; ?></td>
                            <td><?php echo $row['tipo']; ?></td>

                            <td>

                              <?php
                              if ($tipo == "administrador") {

                              ?>

                                <a class="btn btn-danger eliminar-usuario" href="<?php echo "eliminar_usuario.php?cid=$cid"; ?>">
                                  <i class="fas fa-user-times"></i>
                                </a>


                                <button href="moactualizar" type="button" class="btn btn-warning btn-print" data-toggle="modal" data-target="#moactualizaru<?php echo $row['id']; ?>">
                                  <i class="fas fa-edit"></i>
                                </button>
                                <?php include('../usuario/modals/modal_usuario_cambio.php'); ?>

                                <button href="moactualizarc" type="button" class="btn btn-success btn-print" data-toggle="modal" data-target="#moactualizarc<?php echo $row['id']; ?>">
                                  Editar
                                </button>
                                <?php include('../usuario/modals/modal_usuario_editar.php'); ?>

                              <?php
                              }
                              ?>
                            </td>
                          </tr>
                          <!--end of modal-->
                        <?php } ?>
                      </tbody>

                    </table>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 order-md-1">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">ADMINISTRADOR DE CARGOS / AREAS / SERVICIOS / CURSOS / PROMEDIOS</h3>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="info-box">
                        <span class="info-box-icon bg-warning"><i class="far fa-user"></i></span>
                        <div class="info-box-content">
                          <span class="info-box-text">Creacion Usuarios </span>
                          <?php
                          if ($tipo == "administrador") {

                          ?>
                            <button href="modalIngreso" type="button" class="btn btn-warning btn-print" data-toggle="modal" data-target="#modalIngreso">
                              REGISTRAR
                            </button>

                            <?php include('../usuario/modals/modal_usuario_add.php'); ?>

                          <?php
                          }
                          ?>
                        </div>
                        <!-- /.info-box-content -->
                      </div>
                      <!-- /.info-box -->
                    </div>

                    <div class="col-md-6">
                      <div class="info-box">
                        <span class="info-box-icon bg-secondary"><i class="far fa-clone"></i></span>
                        <div class="info-box-content">
                          <span class="info-box-text">Creacion Areas </span>
                          <?php
                          if ($tipo == "administrador"  or $tipo == "gestion") {

                          ?>

                            <button href="modalDepartamento" type="button" class="btn btn-secondary btn-print" data-toggle="modal" data-target="#modalDepartamento">
                              REGISTRAR
                            </button>

                            <?php include('../usuario/modals/modal_depart_add.php'); ?>

                          <?php
                          }
                          ?>
                        </div>
                        <!-- /.info-box-content -->
                      </div>
                      <!-- /.info-box -->
                    </div>

                    <div class="col-md-6">
                      <div class="info-box">
                        <span class="info-box-icon bg-primary"><i class="fa fa-universal-access"></i></span>
                        <div class="info-box-content">
                          <span class="info-box-text">Creacion Cargos </span>
                          <?php
                          if ($tipo == "administrador"  or $tipo == "gestion") {

                          ?>

                            <button href="modalCargo" type="button" class="btn btn-primary btn-print" data-toggle="modal" data-target="#modalCargo">
                              REGISTRAR
                            </button>

                            <?php include('../usuario/modals/modal_cargo_add.php'); ?>

                          <?php
                          }
                          ?>
                        </div>
                        <!-- /.info-box-content -->
                      </div>
                      <!-- /.info-box -->
                    </div>

                    <div class="col-md-6">
                      <div class="info-box">
                        <span class="info-box-icon bg-success"><i class="fa fa-bars"></i></span>
                        <div class="info-box-content">
                          <span class="info-box-text">Creacion Servicios </span>
                          <?php
                          if ($tipo == "administrador") {

                          ?>

                            <button href="modalServicios" type="button" class="btn btn-success btn-print" data-toggle="modal" data-target="#modalServicios">
                              REGISTRAR
                            </button>

                            <?php include('../usuario/modals/modal_servicios_add.php'); ?>

                          <?php
                          }
                          ?>
                        </div>
                        <!-- /.info-box-content -->
                      </div>
                      <!-- /.info-box -->
                    </div>
                    <div class="col-md-6">
                      <div class="info-box">
                        <span class="info-box-icon bg-dark"><i class="fa fa-bars"></i></span>
                        <div class="info-box-content">
                          <span class="info-box-text">Creacion Cursos </span>
                          <?php
                          if ($tipo == "administrador" or $tipo == "gestion") {

                          ?>

                            <button href="modalCurso" type="button" class="btn btn-dark btn-print" data-toggle="modal" data-target="#modalCurso">
                              REGISTRAR
                            </button>

                            <?php include('../usuario/modals/modal_cursos_add.php'); ?>

                          <?php
                          }
                          ?>
                        </div>
                        <!-- /.info-box-content -->
                      </div>
                      <!-- /.info-box -->
                    </div>
                    <div class="col-md-6">
                      <div class="info-box">
                        <span class="info-box-icon bg-info"><i class="fa fa-bars"></i></span>
                        <div class="info-box-content">
                          <span class="info-box-text">Creacion Promedios </span>
                          <?php
                          if ($tipo == "administrador"  or $tipo == "gestion") {

                          ?>

                            <button href="modalPromedio" type="button" class="btn btn-info btn-print" data-toggle="modal" data-target="#modalPromedio">
                              REGISTRAR
                            </button>

                            <?php include('../usuario/modals/modal_promedios_add.php'); ?>

                          <?php
                          }
                          ?>
                        </div>
                        <!-- /.info-box-content -->
                      </div>
                      <!-- /.info-box -->
                    </div>
                    <div class="col-md-6">
                      <div class="info-box">
                        <span class="info-box-icon bg-danger"><i class="fa fa-bars"></i></span>
                        <div class="info-box-content">
                          <span class="info-box-text">Creacion Sueldos </span>
                          <?php
                          if ($tipo == "administrador"  or $tipo == "gestion") {

                          ?>

                            <button href="modalSalario" type="button" class="btn btn-danger btn-print" data-toggle="modal" data-target="#modalSalario">
                              REGISTRAR
                            </button>

                            <?php include('../usuario/modals/modal_sueldo_add.php'); ?>

                          <?php
                          }
                          ?>
                        </div>
                        <!-- /.info-box-content -->
                      </div>
                      <!-- /.info-box -->
                    </div>

                    <div class="col-md-6">
                      <div class="info-box">
                        <span class="info-box-icon bg-danger"><i class="fa fa-bars"></i></span>
                        <div class="info-box-content">
                          <span class="info-box-text">Creacion Tipo Contrato </span>
                          <?php
                          if ($tipo == "administrador"  or $tipo == "gestion") {

                          ?>

                            <button href="modalTipoC" type="button" class="btn btn-danger btn-print" data-toggle="modal" data-target="#modalTipoC">
                              REGISTRAR
                            </button>

                            <?php include('../usuario/modals/modal_tipoc_add.php'); ?>

                          <?php
                          }
                          ?>
                        </div>
                        <!-- /.info-box-content -->
                      </div>
                      <!-- /.info-box -->
                    </div>


                  </div>
                </div>
              </div>
            </div>

            <div class="col-lg-12 col-md-12 col-sm-12 order-md-1">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">ADMINISTRADOR DE PERSONAL</h3>
                </div>
                <div class="card-body">
                  <div class="col-md-6">
                    <div class="info-box">
                      <span class="info-box-icon "><i class="fa fa-bars"></i></span>
                      <div class="info-box-content">
                        <span class="info-box-text">Editar Personal </span>
                        <button href="modalModificar" type="button" class="btn btn-danger btn-print" data-toggle="modal" data-target="#modalModificar">
                          EDITAR
                        </button>
                        <?php include('../usuario/modals/modal_modificar.php'); ?>
                      </div>
                      <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
    </div>

    </section>
    <footer class="main-footer">
      <!-- To the right -->
      <div class="float-right d-none d-sm-inline">
        DESARROLLADO POR JHON ALEXANDER PATIÑO
      </div>
      <!-- Default to the left -->
      <strong>Copyright &copy; 2021-2023</strong> All rights reserved.
    </footer>
  </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <!-- SweetAlert2 CDN -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <!-- REQUIRED SCRIPTS -->
  <script src="//cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script>
  <script>
    $(document).ready(function() {
      $('#example2').DataTable({

      });
    });
  </script>

  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      // Selecciona todos los enlaces con la clase "eliminar-usuario"
      var eliminarUsuarioLinks = document.querySelectorAll(".eliminar-usuario");

      // Agrega un controlador de eventos de clic a cada enlace
      eliminarUsuarioLinks.forEach(function(enlace) {
        enlace.addEventListener("click", function(event) {
          event.preventDefault(); // Evita que el enlace se abra inmediatamente

          // Muestra un SweetAlert para confirmar la eliminación del usuario
          Swal.fire({
            title: "¿Está seguro de que quieres eliminar usuario?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            cancelButtonColor: "#3085d6",
            confirmButtonText: "Sí, eliminar",
            cancelButtonText: "Cancelar",
          }).then((result) => {
            if (result.isConfirmed) {
              // Si el usuario confirma, redirige al enlace de eliminación
              window.location.href = enlace.href;
            }
          });
        });
      });
    });
  </script>





  <!-- /gauge.js -->
</body>

</html>