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
              <p>Usuarios con Correo Faltantes</p>
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

      <!-- FIN SOLINUX -->


    </div>
  </div>
</div>
</div>

<!-- FINAL PANEL CLIENTE -->