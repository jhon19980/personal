<!--A Design by Jhon Alexander P
Author: ElectroSystem
Author URL: http://electrosistem.com.co
License: Creative Commons Attribution 1.0 Unported

-->

<?php
session_start();
include('../../pagina/layout/session.php');

// Redirige al index si la sesión no está activa
if (!isset($_SESSION['usuario_autenticado']) || empty($_SESSION['usuario_autenticado'])) {
    header('Location: ../../index.php');
    exit();
}
?>

<?php include '../layout/header.php'; ?>

<?php
$id = $_SESSION['id'];
?>


<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/data.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>


<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>


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
              <h1 class="m-0">DASHBOARD</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">DASHBOARD</li>
              </ol>
            </div>
          </div>
        </div>
      </div>

      <!-- PANEL ADMISTRADOR -->
      <?php
      // Incluye el archivo inicio.php
      include('inicio/inicio_admin.php');
      ?>

      <!-- PANEL CLIENTE -->

      <?php
      // Incluye el archivo inicio.php
      include('inicio/inicio_cliente.php');
      ?>

      <!-- Main Footer -->
      <footer class="main-footer">
        <div class="float-right d-none d-sm-inline">
          DESARROLLADO POR JHON ALEXANDER PATIÑO
        </div>
        <strong>Copyright &copy; 2021-2023 </strong> All rights reserved.
      </footer>
    </div>
  </div><!-- /.box-body -->


</body>

</html>