<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- DataTables CSS y JS -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>

<?php
include('../../dist/includes/dbcon.php');

try {
    // Consulta SQL para obtener los datos del área
    $promedio_query = $conexion->prepare("SELECT id_promedio, id_personal, promedio, cedula FROM promedios");
    $promedio_query->execute();
    $promedios = $promedio_query->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error en la consulta: " . $e->getMessage();
    die();
}
?>
<div class="modal fade" id="modalPromedio" tabindex="-1" role="dialog" aria-labelledby="modalPromedio" data-backdrop="static" aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalPromedio">INGRESAR PROMEDIOS</h5>
            </div>
            <form action="insertar/insert_promedio.php" method="post" enctype='multipart/form-data'>
                <div class="container">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">INGRESO DE NUEVOS PROMEDIOS</h3>
                        </div>
                        <div class="container-fluid">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="archivo" class="form-label">Nombre Archivo</label>
                                            <input type="text" class="form-control" name="nombre_archivo" >
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="archivo" class="form-label">Archivo</label>
                                            <input type="file" class="form-control" name="archivo" accept=".csv">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card card-secondary">
                        <div class="card-header">
                            <h3 class="card-title">DATOS DE LOS PROMEDIOS</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example7" class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Cedula</th>
                                            <th>Promedio</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        // Imprimir datos en la tabla
                                        foreach ($promedios as $promedio) {
                                            echo "<tr>";
                                            echo "<td>{$promedio['id_promedio']}</td>";
                                            echo "<td>{$promedio['cedula']}</td>";
                                            echo "<td>{$promedio['promedio']}</td>";
                                            echo "</tr>";
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-info">Guardar promedio</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#example7').DataTable();
    });
</script>