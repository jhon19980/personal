<?php
include('dbcon.php');

$stmt = $conexion->query("SELECT DATE_TRUNC('day', fecha_ingreso) AS dia, COUNT(*) AS personas
FROM personal
GROUP BY dia
ORDER BY dia");
$datos = $stmt->fetchAll();

// Convierte los datos a formato JSON
$datos_json = json_encode($datos);

/// Consulta SQL para obtener la acumulación mensual
$stmt1 = $conexion->prepare("SELECT
meses.mes AS mes,
COUNT(p.fecha_ingreso) AS personas,
SUM(COUNT(p.fecha_ingreso)) OVER (ORDER BY meses.orden) AS acumulado
FROM (
SELECT TO_CHAR(DATE_TRUNC('month', DATE '2023-01-01' + INTERVAL '1 month' * s), 'Mon') AS mes, s AS orden
FROM generate_series(0, 11) AS s
) AS meses
LEFT JOIN personal p ON TO_CHAR(DATE_TRUNC('month', p.fecha_ingreso), 'Mon') = meses.mes
GROUP BY meses.mes, meses.orden
ORDER BY meses.orden");
$stmt1->execute();
$datos1 = $stmt1->fetchAll();


// Convierte los datos a formato JSON
$datos_json1 = json_encode($datos1);

$stmt2 = $conexion->prepare("SELECT
meses.mes AS mes,
COUNT(c.fecha_creacion) AS cartas,
SUM(COUNT(c.fecha_creacion)) OVER (ORDER BY meses.orden) AS acumulado
FROM (
SELECT TO_CHAR(DATE_TRUNC('month', DATE '2023-01-01' + INTERVAL '1 month' * s), 'Mon') AS mes, s AS orden
FROM generate_series(0, 11) AS s
) AS meses
LEFT JOIN carta c ON TO_CHAR(DATE_TRUNC('month', c.fecha_creacion), 'Mon') = meses.mes
GROUP BY meses.mes, meses.orden
ORDER BY meses.orden;
");
$stmt2->execute();
$datos2 = $stmt2->fetchAll();

// Convierte los datos a formato JSON
$datos_json2 = json_encode($datos2);

// Consulta SQL para obtener los cumpleaños
$stmtCumpleanos = $conexion->query("SELECT primer_nombre, primer_apellido, fecha_nacimiento FROM personal");
$cumpleanos = $stmtCumpleanos->fetchAll(PDO::FETCH_ASSOC);

// Convierte los datos a formato JSON
$cumpleanos_json = json_encode($cumpleanos);

?>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css" />
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"></script>




<div class="content">
  <div class="container-fluid">
    <div class="row">
      <?php
      if ($tipo == "administrador" or $tipo == "gestion") {
      ?>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-blue">
            <div class="inner">
              <h4>
                <?php
                $num = 0;
                $select = $conexion->query('SELECT COUNT(*) AS count FROM personal');
                $num = $select->fetchColumn();
                echo $num;
                ?>
              </h4>
              <p>Numero de Empleados Registrados</p>
            </div>
            <div class="icon"><i class="fas fa-user"></i></div>
            <?php echo ($num > 0) ? '<a href="../personal/personal.php" class="small-box-footer">Mas info<i class="fa fa-arrow-circle-right"></i></a>' : '<a href="#" class="small-box-footer">-------</a>'; ?>
          </div>
        </div>
      <?php
      }
      ?>



      <?php
      if ($tipo == "administrador" or $tipo == "gestion") {

      ?>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">

              <h4>
                <?php
                $num = 0;
                $select = $conexion->query('SELECT COUNT(*) AS count FROM usuario');
                $num = $select->fetchColumn();
                echo $num;
                ?>
              </h4>
              <p>Numero de Usuario Registrados en el Sistema </p>
            </div>
            <div class="icon"><i class="fas fa-user"></i>
              <i class=""></i>
            </div>
            <?php echo ($num > 0) ? '<a href="../usuario/usuario.php" class="small-box-footer">Mas info<i class="fa fa-arrow-circle-right"></i></a>' : '<a href="#" class="small-box-footer">-------</a>'; ?>
          </div>
        </div>


      <?php
      }
      ?>
      <?php
      if ($tipo == "administrador" or $tipo == "gestion") {

      ?>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">

              <h4>
                <?php
                $num = 0;
                $select = $conexion->query('SELECT COUNT(*) AS count FROM personal WHERE estado_personal = 1');
                $num = $select->fetchColumn();
                echo $num;
                ?>
              </h4>
              <p>Numero de Empleados Activos </p>
            </div>
            <div class="icon"><i class="fa fa-user-nurse"></i>
              <i class=""></i>
            </div>
            <?php echo ($num > 0) ? '<a href="../personal/personal.php" class="small-box-footer">Mas info<i class="fa fa-arrow-circle-right"></i></a>' : '<a href="#" class="small-box-footer">-------</a>'; ?>
          </div>
        </div>


      <?php
      }
      ?>
      <?php
      if ($tipo == "administrador" or $tipo == "gestion") {

      ?>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">

              <h4>
                <?php
                $num = 0;
                $select = $conexion->query('SELECT COUNT(*) AS count FROM personal WHERE estado_personal = 0');
                $num = $select->fetchColumn();
                echo $num;
                ?>
              </h4>
              <p>Numero de Empleados Inactivos </p>
            </div>
            <div class="icon"><i class="fas fa-user"></i>
              <i class=""></i>
            </div>
            <?php echo ($num > 0) ? '<a href="../inactivar/inactivar.php" class="small-box-footer">Mas info<i class="fa fa-arrow-circle-right"></i></a>' : '<a href="#" class="small-box-footer">-------</a>'; ?>
          </div>
        </div>
      <?php
      }
      ?>

      <?php
      if ($tipo == "administrador" or $tipo == "gestion") {

      ?>
        <div class="col-6">
          <div class="card card-primary">
            <div class="card-header ui-sortable-handle" style="cursor: move;">
              <h3 class="card-title">
                <i class="ion ion-clipboard mr-1"></i>
                PERSONAL REGISTRADO POR DIAS
              </h3>
              <div class="card-tools"></div>
            </div>

            <div class="card-body">
              <div id="grafico"></div>
            </div>
          </div>
        </div>

      <?php
      }
      ?>
      <?php
      if ($tipo == "administrador" or $tipo == "gestion") {

      ?>
        <div class="col-6">
          <div class="card card-primary">
            <div class="card-header ui-sortable-handle" style="cursor: move;">
              <h3 class="card-title">
                <i class="ion ion-clipboard mr-1"></i>
                PERSONAL REGISTRADO POR MES
              </h3>
              <div class="card-tools"></div>
            </div>

            <div class="card-body">
              <div id="grafico1"></div>
            </div>
          </div>
        </div>
      <?php
      }
      ?>
      <?php
      if ($tipo == "administrador" or $tipo == "gestion") {

      ?>
        <div class="col-6">
          <div class="card card-primary">
            <div class="card-header ui-sortable-handle" style="cursor: move;">
              <h3 class="card-title">
                <i class="ion ion-clipboard mr-1"></i>
                CARTAS LABORALES REALIADAS EN EL MES
              </h3>
              <div class="card-tools"></div>
            </div>

            <div class="card-body">
              <div id="grafico2"></div>
            </div>
          </div>
        </div>

      <?php
      }
      ?>
      <?php
      if ($tipo == "administrador" or $tipo == "gestion") {

      ?>
        <div class="col-6" style="margin-top: 20px;">

        </div>


      <?php
      }
      ?>
      <?php
      if ($tipo == "administrador" or $tipo == "gestion") {
      ?>
        <div class="col-12">
          <div class="card card-primary">
            <div class="card-header ui-sortable-handle" style="cursor: move;">
              <h3 class="card-title">
                <i class="ion ion-clipboard mr-1"></i>
                CUMPLEAÑOS CLINICA VERSALLES
              </h3>
              <div class="card-tools"></div>
            </div>

            <div class="card-body">
              <div id="calendario-cumpleanos"></div>
            </div>
          </div>
        </div>
      <?php
      }
      ?>

    </div>
  </div><!-- /.box-body -->
</div>
<!-- FINAL PANEL ADMINISTRADOR -->

<script>
  // Recupera los datos desde PHP
  var cumpleanos = <?php echo $cumpleanos_json; ?>;

  // Inicializa FullCalendar con la vista Multi-Month Grid
  $(document).ready(function() {
    $('#calendario-cumpleanos').fullCalendar({
      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'multiMonthGrid,month,agendaWeek,agendaDay'
      },
      views: {
        multiMonthGrid: {
          type: 'list',
          duration: {
            months: 3
          }, // Puedes ajustar la cantidad de meses que deseas mostrar
          buttonText: 'Multi-Month Grid'
        }
      },
      events: cumpleanos.map(item => {
        return {
          title: item.primer_nombre + ' ' + item.primer_apellido,
          start: item.fecha_nacimiento
        };
      })
    });
  });
</script>


<script>
  // Recupera los datos desde PHP
  var datos = <?php echo $datos_json; ?>;

  // Genera el gráfico con Highcharts
  Highcharts.chart('grafico', {
    chart: {
      type: 'column',
    },
    title: {
      text: 'Cantidad de Personas Ingresadas por Dia',
    },
    xAxis: {
      categories: datos.map(item => item.dia),
      title: {
        text: 'Dias',
      },
    },
    yAxis: {
      title: {
        text: 'Cantidad de Personas',
      },
    },
    series: [{
      name: 'Personas',
      data: datos.map(item => item.personas),
      color: '#0A1097', // Cambia el color de las barras
    }],
  });
</script>

<script>
  // Recupera los datos desde PHP
  var datos1 = <?php echo $datos_json1; ?>;

  var ultimoElemento = datos1[datos1.length - 1];

  // Genera el gráfico con Highcharts
  Highcharts.chart('grafico1', {
    chart: {
      type: 'column',
    },
    title: {
      text: 'Cantidad de Personas Ingresadas por Mes',
    },
    xAxis: {
      categories: datos.map(item => item.mes),
      title: {
        text: 'Mes',
      },
    },
    yAxis: {
      title: {
        text: 'Cantidad de Personas',
      },
    },
    series: [{
      name: 'Personas',
      data: datos1.map(item => {
        // Combina el nombre del mes y el número de personas
        return {
          y: item.personas,
          name: item.mes,
        };
      }),
      color: '#10A4D3', // Cambia el color de las barras
    }],
    plotOptions: {
      column: {
        dataLabels: {
          enabled: true,
          formatter: function() {
            return this.y + ' ' + this.point.name;
          },
        },
      },
    },
  });
</script>

<script>
  // Recupera los datos desde PHP
  var datos2 = <?php echo $datos_json2; ?>;

  var ultimoElemento = datos2[datos2.length - 1];

  // Genera el gráfico con Highcharts
  Highcharts.chart('grafico2', {
    chart: {
      type: 'column',
    },
    title: {
      text: 'Cantidad de Cartas Realizadas por Mes',
    },
    xAxis: {
      categories: datos2.map(item => item.mes),
      title: {
        text: 'Mes',
      },
    },
    yAxis: {
      title: {
        text: 'Cantidad de Cartas',
      },
    },
    series: [{
      name: 'Cartas',
      data: datos2.map(item => {
        // Combina el nombre del mes y el número de cartas
        return {
          y: item.cartas,
          name: item.mes,
        };
      }),
      color: '#fce964', // Cambia el color de las barras
    }],
    plotOptions: {
      column: {
        dataLabels: {
          enabled: true,
          formatter: function() {
            return this.y + ' ' + this.point.name;
          },
        },
      },
    },
  });
</script>