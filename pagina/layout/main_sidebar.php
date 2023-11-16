<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">

  <a href="index3.html" class="brand-link">
    <img src="../usuario/subir_us/Logo.png" alt="" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">Clinica Versalles</span>
  </a>
  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="../usuario/subir_us/<?php echo $imagen; ?>" alt="..." class="img-circle profile_img center" />
      </div>
      <div class="info">
        <span style="color: white;"><strong><?php echo $nombre; ?></strong> </span>
      </div>
    </div>

    <!-- SidebarSearch Form -->
    <div class="form-inline">
      <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-sidebar">
            <i class="fas fa-search fa-fw"></i>
          </button>
        </div>
      </div>
    </div>

    <!-- sidebar menu -->
    <?php include '../layout/sidebar.php'; ?>
    <!-- /sidebar menu -->

    <!-- /menu footer buttons -->
    <?php include '../layout/sidebar2.php'; ?>
    <!-- /menu footer buttons -->

  </div>