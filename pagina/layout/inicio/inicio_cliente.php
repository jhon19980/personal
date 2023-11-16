
<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="row">

              <?php
              if ($tipo == "cliente") {

                ?>
                <div class="col-lg-3 col-xs-6">
                  <!-- small box -->
                  <div class="small-box bg-blue">
                    <div class="inner">

                      <h4>
                        <?php
                        $num = 0;
                        $select = mysqli_query($con, "SELECT * FROM cliente WHERE cambio_estado = 1  AND id_usuario = $id") or die(mysqli_error($con));
                        $num = mysqli_num_rows($select);
                        echo $num;
                        ?>
                      </h4>
                      <p>Numero de Clientes Registrados</p>
                    </div>
                    <div class="icon"><i class="fas fa-user"></i>
                      <i class=""></i>
                    </div>
                    <?php echo ($num > 0) ? '<a href="../cliente/cliente.php" class="small-box-footer">Mas info<i class="fa fa-arrow-circle-right"></i></a>' : '<a href="#" class="small-box-footer">-------</a>'; ?>
                  </div>
                </div>


                <?php
              }
              ?>
              <?php
              if ($tipo == "cliente") {

                ?>
                <div class="col-lg-3 col-xs-6">
                  <!-- small box -->
                  <div class="small-box bg-red">
                    <div class="inner">

                      <h4>
                        <?php
                        $num = 0;
                        $select = mysqli_query($con, "SELECT * FROM cliente WHERE cambio_estado = 1 AND estado = 'Critico' AND id_usuario = $id") or die(mysqli_error($con));
                        $num = mysqli_num_rows($select);
                        echo $num;
                        ?>
                      </h4>
                      <p>Estado Critico Registrados </p>
                    </div>
                    <div class="icon"><i class="fas fa-bolt"></i>
                      <i class=""></i>
                    </div>
                    <?php echo ($num > 0) ? '<a href="../cliente/cliente.php" class="small-box-footer">Mas info<i class="fa fa-arrow-circle-right"></i></a>' : '<a href="#" class="small-box-footer">-------</a>'; ?>
                  </div>
                </div>


                <?php
              }
              ?>
              <?php
              if ($tipo == "cliente") {

                ?>
                <div class="col-lg-3 col-xs-6">
                  <!-- small box -->
                  <div class="small-box bg-yellow">
                    <div class="inner">

                      <h4>
                        <?php
                        $num = 0;
                        $select = mysqli_query($con, "SELECT * FROM cliente WHERE cambio_estado = 1 AND estado = 'Indeterminado' AND id_usuario = $id") or die(mysqli_error($con));
                        $num = mysqli_num_rows($select);
                        echo $num;
                        ?>
                      </h4>
                      <p>Estado Indeterminado Registrados </p>
                    </div>
                    <div class="icon"><i class="fas fa-bolt"></i>
                      <i class=""></i>
                    </div>
                    <?php echo ($num > 0) ? '<a href="../cliente/cliente.php" class="small-box-footer">Mas info<i class="fa fa-arrow-circle-right"></i></a>' : '<a href="#" class="small-box-footer">-------</a>'; ?>
                  </div>
                </div>


                <?php
              }
              ?>
              <?php
              if ($tipo == "cliente") {

                ?>
                <div class="col-lg-3 col-xs-6">
                  <!-- small box -->
                  <div class="small-box bg-green">
                    <div class="inner">

                      <h4>
                        <?php
                        $num = 0;
                        $select = mysqli_query($con, "SELECT * FROM cliente WHERE cambio_estado = 1 AND estado = 'Aceptable' AND id_usuario = $id") or die(mysqli_error($con));
                        $num = mysqli_num_rows($select);
                        echo $num;
                        ?>
                      </h4>
                      <p>Estado Aceptables Registrados </p>
                    </div>
                    <div class="icon"><i class="fas fa-bolt"></i>
                      <i class=""></i>
                    </div>
                    <?php echo ($num > 0) ? '<a href="../cliente/cliente.php" class="small-box-footer">Mas info<i class="fa fa-arrow-circle-right"></i></a>' : '<a href="#" class="small-box-footer">-------</a>'; ?>
                  </div>
                </div>


                <?php
              }
              ?>
              <?php
              if ($tipo == "cliente") {

                ?>
                <div class="col-lg-3 col-xs-6">
                  <!-- small box -->
                  <div class="small-box bg" style="background-color: #fee24b;">
                    <div class="inner">

                      <h4>
                        <?php
                        $num = 0;
                        $select = mysqli_query($con, "SELECT * FROM cliente WHERE cambio_estado = 1 AND estado = 'Cuestionable' AND id_usuario = $id") or die(mysqli_error($con));
                        $num = mysqli_num_rows($select);
                        echo $num;
                        ?>
                      </h4>
                      <p>Estado Cuestionable Registrados </p>
                    </div>
                    <div class="icon"><i class="fas fa-bolt"></i>
                      <i class=""></i>
                    </div>
                    <?php echo ($num > 0) ? '<a href="../cliente/cliente.php" class="small-box-footer">Mas info<i class="fa fa-arrow-circle-right"></i></a>' : '<a href="#" class="small-box-footer">-------</a>'; ?>
                  </div>
                </div>


                <?php
              }
              ?>

              <?php
              if ($tipo == "cliente") {

                ?>
                <div class="col-lg-3 col-xs-6">
                  <!-- small box -->
                  <div class="small-box bg" style="background-color: #f5bd00;">
                    <div class="inner">

                      <h4>
                        <?php
                        $num = 0;
                        $select = mysqli_query($con, "SELECT * FROM cliente WHERE cambio_estado = 1 AND estado = 'Peligroso' AND id_usuario = $id") or die(mysqli_error($con));
                        $num = mysqli_num_rows($select);
                        echo $num;
                        ?>
                      </h4>
                      <p>Estado Peligroso Registrados </p>
                    </div>
                    <div class="icon"><i class="fas fa-bolt"></i>
                      <i class=""></i>
                    </div>
                    <?php echo ($num > 0) ? '<a href="../cliente/cliente.php" class="small-box-footer">Mas info<i class="fa fa-arrow-circle-right"></i></a>' : '<a href="#" class="small-box-footer">-------</a>'; ?>
                  </div>
                </div>


                <?php
              }
              ?>


              <?php
              if ($tipo == "cliente") {

                ?>
                <div class="col-lg-3 col-xs-6">
                  <!-- small box -->
                  <div class="small-box bg" style="background-color: #83ff4d;">
                    <div class="inner">

                      <h4>
                        <?php
                        $num = 0;
                        $select = mysqli_query($con, "SELECT * FROM cliente WHERE cambio_estado = 1 AND id_cliente AND id_usuario = $id ") or die(mysqli_error($con));
                        $num = mysqli_num_rows($select);
                        echo $num;
                        ?>
                      </h4>
                      <p>Numero de Servicios Ingresados </p>
                    </div>
                    <div class="icon"><i class="fas fa-bolt"></i>
                      <i class=""></i>
                    </div>
                    <?php echo ($num > 0) ? '<a href="../cliente/cliente.php" class="small-box-footer">Mas info<i class="fa fa-arrow-circle-right"></i></a>' : '<a href="#" class="small-box-footer">-------</a>'; ?>
                  </div>
                </div>


                <?php
              }
              ?>

            </div>
          </div>


          <?php
          if ($tipo == "cliente") {

            ?>
            <div class="card card-success">
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12 col-lg-6">
                    <div class="card mb-2 bg-gradient-dark">
                      <img class="card-img-top" src="images/carrusel3.png" alt="Dist Photo 1">
                      <div class="card-img-overlay d-flex flex-column justify-content-end">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12 col-lg-6">
                    <div class="card mb-2">
                      <img class="card-img-top" src="images/carrusel2.png" alt="Dist Photo 2">
                      <div class="card-img-overlay d-flex flex-column justify-content-center">

                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <?php
          }
          ?>


          <?php
          if ($tipo == "cliente") {

            ?>
            <div class="col" role="main">
              <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-6">
                  <figure class="highcharts-figure">
                    <div id="container-grafica3"></div>
                    <p class="highcharts-description">
                      Gráfica
                    </p>
                  </figure>
                </div>
                <table id="datatable-grafica3" class="table table-bordered table-hover" style="display: none;">
                  <thead>
                    <tr>

                      <th>Clientes</th>
                      <th>Peligroso</th>
                      <th>Cuestionable</th>
                      <th>Aceptable</th>
                      <th>Indeterminado</th>
                      <th>Critico</th>


                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $num = 0;
                    $select = mysqli_query($con, "SELECT * FROM cliente WHERE cambio_estado = 1 AND id_usuario = $id ") or die(mysqli_error($con));
                    $num = mysqli_num_rows($select);

                    while ($num = mysqli_fetch_array($select)) {


                      ?>
                      <tr>
                        <td><?php echo $num['cliente']; ?></td>
                        <td><?php if ($num['estado'] == 'Peligroso') {
                          echo $num > 0;
                        } ?></td>
                        <td><?php if ($num['estado'] == 'Cuestionable') {
                          echo $num > 0;
                        } ?></td>
                        <td><?php if ($num['estado'] == 'Aceptable') {
                          echo $num > 0;
                        } ?></td>
                        <td><?php if ($num['estado'] == 'Indeterminado') {
                          echo $num > 0;
                        } ?></td>
                        <td><?php if ($num['estado'] == 'Critico') {
                          echo $num > 0;
                        } ?></td>

                      </tr>
                    <?php } ?>
                  </tbody>
                </table>

                <script>
                  Highcharts.chart('container-grafica3', {
                    data: {
                      table: 'datatable-grafica3'
                    },
                    chart: {
                      type: 'column'
                    },
                    title: {
                      text: 'Grafica de los Estados Por Cliente'
                    },
                    colors: [
                      '#f5bd00', // Peligroso
                      '#fee24b', // Cuestionable
                      '#6afe4b', // Aceptable
                      '#6dcbf1', // Indeterminado
                      '#ee5565', // Critico
                    ],

                    subtitle: {
                      text: 'Boostingsas <a href="https://www.ssb.no/en/statbank/table/04231" target="_blank"></a>'
                    },
                    xAxis: {
                      type: 'category'
                    },
                    yAxis: {
                      allowDecimals: false,
                      title: {
                        text: 'Numero de Estados Registrados'
                      }
                    },
                    tooltip: {
                      formatter: function () {
                        return '<b>' + this.series.name + '</b><br/>' +
                          this.point.y + ' ' + this.point.name.toLowerCase();
                      }
                    }
                  });
                </script>
              </div>
              <?php
          }
          ?>


          </div>
        </div>

        <!-- FINAL PANEL CLIENTE -->
      </div>