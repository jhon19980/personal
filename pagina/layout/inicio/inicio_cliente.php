<div class="content">
  <div class="container-fluid">
    <div class="row">

      <!-- SOLINUX -->

      <?php
      if ($tipo == "solinux") {
        $numCorreos = 0;
        $sql = 'SELECT COUNT(*) AS count FROM personal WHERE correo IS NOT NULL AND correo != \'\'';
        $stmt = $conexion->prepare($sql);

        if ($stmt->execute()) {
          $numCorreos = $stmt->fetchColumn();
        }
      ?>
        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-yellow">
            <div class="inner">
              <h4><?php echo $numCorreos; ?></h4>
              <p>Número de Correos Electrónicos Registrados</p>
            </div>
            <div class="icon"><i class="fa fa-envelope"></i></div>
            <?php echo ($numCorreos > 0) ? '<a href="#" class="small-box-footer">Más info<i class="fa fa-arrow-circle-right"></i></a>' : '<a href="#" class="small-box-footer">-------</a>'; ?>
          </div>
        </div>
      <?php
      }
      ?>

      <?php
      if ($tipo == "solinux") {
        $usuariosFaltantes = [];

        $sql = 'SELECT * FROM usuarioxpersonal 
        WHERE usuario_correo IS NULL
        AND id_personal IN (SELECT id_personal FROM personal WHERE estado_personal = 1)';


        try {
          $stmt = $conexion->prepare($sql);

          if ($stmt->execute()) {
            $usuariosFaltantes = $stmt->fetchAll(PDO::FETCH_ASSOC);
          }
        } catch (PDOException $e) {
          echo "Error: " . $e->getMessage();
        }
      ?>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h4><?php echo count($usuariosFaltantes); ?></h4>
              <p>Usuarios con correo faltantes</p>
            </div>
            <div class="icon"><i class="fas fa-exclamation-triangle"></i></div>
            <?php
            if (!empty($usuariosFaltantes)) {
              echo '<a href="../generar/generar.php" class="small-box-footer">Más info<i class="fa fa-arrow-circle-right"></i></a>';
            } else {
              echo '<a href="#" class="small-box-footer">-------</a>';
            }
            ?>
          </div>
        </div>
      <?php
      }
      ?>

      <?php
      if ($tipo == "solinux") {
        $usuariosFaltantes = [];

        $sql = 'SELECT * FROM usuarioxpersonal 
        WHERE correo_activo = 1
        AND id_personal IN (SELECT id_personal FROM personal WHERE estado_personal = 0)';


        try {
          $stmt = $conexion->prepare($sql);

          if ($stmt->execute()) {
            $usuariosFaltantes = $stmt->fetchAll(PDO::FETCH_ASSOC);
          }
        } catch (PDOException $e) {
          echo "Error: " . $e->getMessage();
        }
      ?>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-gris">
            <div class="inner">
              <h4><?php echo count($usuariosFaltantes); ?></h4>
              <p>Usuarios Para Inactivar Correo</p>
            </div>
            <div class="icon"><i class="fas fa-exclamation-triangle"></i></div>
            <?php
            if (!empty($usuariosFaltantes)) {
              echo '<a href="../inactivar/inactivar.php" class="small-box-footer">Más info<i class="fa fa-arrow-circle-right"></i></a>';
            } else {
              echo '<a href="#" class="small-box-footer">-------</a>';
            }
            ?>
          </div>
        </div>
      <?php
      }
      ?>

      <?php
      if ($tipo == "solinux") {
        $usuariosFaltantes = [];

        $sql = 'SELECT * FROM usuarioxpersonal 
        WHERE correo_activo = 0
        AND id_personal IN (SELECT id_personal FROM personal WHERE estado_personal = 2)';


        try {
          $stmt = $conexion->prepare($sql);

          if ($stmt->execute()) {
            $usuariosFaltantes = $stmt->fetchAll(PDO::FETCH_ASSOC);
          }
        } catch (PDOException $e) {
          echo "Error: " . $e->getMessage();
        }
      ?>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h4><?php echo count($usuariosFaltantes); ?></h4>
              <p>Usuarios para volver a activar el correo</p>
            </div>
            <div class="icon"><i class="fas fa-exclamation-triangle"></i></div>
            <?php
            if (!empty($usuariosFaltantes)) {
              echo '<a href="../inactivar/inactivar.php" class="small-box-footer">Más info<i class="fa fa-arrow-circle-right"></i></a>';
            } else {
              echo '<a href="#" class="small-box-footer">-------</a>';
            }
            ?>
          </div>
        </div>
      <?php
      }
      ?>

      <!-- FIN SOLINUX -->

      <!-- SCSE -->

      <?php
      if ($tipo == "scse") {
        $numCorreos = 0;
        $sql = 'SELECT COUNT(*) AS count FROM usuarioxpersonal WHERE usuario_scse IS NOT NULL AND usuario_scse != \'\'';
        $stmt = $conexion->prepare($sql);

        if ($stmt->execute()) {
          $numCorreos = $stmt->fetchColumn();
        }
      ?>
        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-yellow">
            <div class="inner">
              <h4><?php echo $numCorreos; ?></h4>
              <p>Número de Scse Registrados</p>
            </div>
            <div class="icon"><i class="fa fa-envelope"></i></div>
            <?php echo ($numCorreos > 0) ? '<a href="#" class="small-box-footer">Más info<i class="fa fa-arrow-circle-right"></i></a>' : '<a href="#" class="small-box-footer">-------</a>'; ?>
          </div>
        </div>
      <?php
      }
      ?>

      <?php
      if ($tipo == "scse") {
        $usuariosFaltantes = [];

        $sql = 'SELECT * FROM usuarioxpersonal 
        WHERE usuario_scse IS NULL
        AND id_personal IN (SELECT id_personal FROM personal WHERE estado_personal = 1)';


        try {
          $stmt = $conexion->prepare($sql);

          if ($stmt->execute()) {
            $usuariosFaltantes = $stmt->fetchAll(PDO::FETCH_ASSOC);
          }
        } catch (PDOException $e) {
          echo "Error: " . $e->getMessage();
        }
      ?>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h4><?php echo count($usuariosFaltantes); ?></h4>
              <p>Usuarios con scse faltantes</p>
            </div>
            <div class="icon"><i class="fas fa-exclamation-triangle"></i></div>
            <?php
            if (!empty($usuariosFaltantes)) {
              echo '<a href="../generar/generar.php" class="small-box-footer">Más info<i class="fa fa-arrow-circle-right"></i></a>';
            } else {
              echo '<a href="#" class="small-box-footer">-------</a>';
            }
            ?>
          </div>
        </div>
      <?php
      }
      ?>

      <?php
      if ($tipo == "scse") {
        $usuariosFaltantes = [];

        $sql = 'SELECT * FROM usuarioxpersonal 
        WHERE scse_activo = 1
        AND id_personal IN (SELECT id_personal FROM personal WHERE estado_personal = 0)';


        try {
          $stmt = $conexion->prepare($sql);

          if ($stmt->execute()) {
            $usuariosFaltantes = $stmt->fetchAll(PDO::FETCH_ASSOC);
          }
        } catch (PDOException $e) {
          echo "Error: " . $e->getMessage();
        }
      ?>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-gris">
            <div class="inner">
              <h4><?php echo count($usuariosFaltantes); ?></h4>
              <p>Usuarios Para Inactivar Scse</p>
            </div>
            <div class="icon"><i class="fas fa-exclamation-triangle"></i></div>
            <?php
            if (!empty($usuariosFaltantes)) {
              echo '<a href="../inactivar/inactivar.php" class="small-box-footer">Más info<i class="fa fa-arrow-circle-right"></i></a>';
            } else {
              echo '<a href="#" class="small-box-footer">-------</a>';
            }
            ?>
          </div>
        </div>
      <?php
      }
      ?>

      <?php
      if ($tipo == "scse") {
        $usuariosFaltantes = [];

        $sql = 'SELECT * FROM usuarioxpersonal 
        WHERE scse_activo = 0
        AND id_personal IN (SELECT id_personal FROM personal WHERE estado_personal = 2)';


        try {
          $stmt = $conexion->prepare($sql);

          if ($stmt->execute()) {
            $usuariosFaltantes = $stmt->fetchAll(PDO::FETCH_ASSOC);
          }
        } catch (PDOException $e) {
          echo "Error: " . $e->getMessage();
        }
      ?>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h4><?php echo count($usuariosFaltantes); ?></h4>
              <p>Usuarios para volver a activar el scse</p>
            </div>
            <div class="icon"><i class="fas fa-exclamation-triangle"></i></div>
            <?php
            if (!empty($usuariosFaltantes)) {
              echo '<a href="../inactivar/inactivar.php" class="small-box-footer">Más info<i class="fa fa-arrow-circle-right"></i></a>';
            } else {
              echo '<a href="#" class="small-box-footer">-------</a>';
            }
            ?>
          </div>
        </div>
      <?php
      }
      ?>

      <!-- FIN SCSE -->


    </div>
  </div>
</div>
</div>

<!-- FINAL PANEL CLIENTE -->