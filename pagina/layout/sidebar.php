<?php
$id = $_SESSION['id'];
?>

<nav class="mt-2">
  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

    <?php
    if ($tipo == "administrador" or $tipo == "gestion") {

    ?>
      <li class="nav-item menu-open">
        <a href="#" class="nav-link active">
          <i class="nav-icon fas fa-tachometer-alt"></i>
          <p>
            INICIO
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="../layout/inicio.php" class="nav-link active">
              <i class="far fa-circle nav-icon"></i>
              <p>DASHBOARD</p>
            </a>
          </li>
        </ul>
      </li>
    <?php
    }
    ?>

    <?php
    $allowedLinks = [];

    if ($tipo == "administrador" || $tipo == "gestion") {
      $allowedLinks = [
        "Personal" => "../personal/personal.php",
        "Cursos" => "../cursos/cursos.php",
        "Generar Usuario" => "../generar/generar.php",
        "Inactivar Usuario" => "../inactivar/inactivar.php",
        "Activar Usuario" => "../inactivar/activar.php",
        "Cartas Laborales" => "../verificar/cartas_laborales.php"
      ];
    } elseif ($tipo == "solinux" || $tipo == "binaps" || $tipo == "scse" || $tipo == "moodle") {
      $allowedLinks = [
        "Generar Usuario" => "../generar/generar.php",
        "Inactivar Usuario" => "../inactivar/inactivar.php",
        "Activar Usuario" => "../inactivar/activar.php"
      ];
    }

    if (!empty($allowedLinks)) {
    ?>

      <li class="nav-item">
        <a href="#" class="nav-link">
          <i class="fas fa-user" aria-hidden="true"></i>
          <p>
            GESTION HUMANA
            <i class="fas fa-angle-left right"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <?php foreach ($allowedLinks as $linkText => $linkUrl) : ?>
            <li class="nav-item">
              <a href="<?= $linkUrl ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p><?= $linkText ?></p>
              </a>
            </li>
          <?php endforeach; ?>
        </ul>
      </li>

    <?php
    }
    ?>



    <?php
    if ($tipo == "administrador" or $tipo == "gestion") {

    ?>

      <li class="nav-item">
        <a href="../usuario/usuario.php" class="nav-link">
          <i class="fas fa-user"></i>
          <p>
            ADMINISTRACIÓN
          </p>
        </a>
      </li>

    <?php
    }
    ?>

  </ul>
</nav>