<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- DataTables CSS y JS -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>

<?php
include('../../dist/includes/dbcon.php');

try {
    // Consulta SQL para obtener los datos del área
    $tipo_query = $conexion->prepare("SELECT  id_personal, tipo, documento FROM tipo_contrato");
    $tipo_query->execute();
    $tipos = $tipo_query->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error en la consulta: " . $e->getMessage();
    die();
}
?>
<div class="modal fade" id="modalTipoC" tabindex="-1" role="dialog" aria-labelledby="modalTipoC" data-backdrop="static" aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTipoC">INGRESAR TIPO CONTRATO</h5>
            </div>
            <form action="insertar/insert_tipoc.php" method="post" enctype='multipart/form-data'>
                <div class="container">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">INGRESO DE NUEVOS TIPOS</h3>
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
                            <h3 class="card-title">DATOS DE LOS TIPO DE CONTRATO</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example8" class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Cedula</th>
                                            <th>Tipo</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        // Imprimir datos en la tabla
                                        foreach ($tipos as $tipo) {
                                            echo "<tr>";
                                            echo "<td>{$tipo['id_personal']}</td>";
                                            echo "<td>{$tipo['documento']}</td>";
                                            echo "<td>{$tipo['tipo']}</td>";
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
                    <button type="submit" class="btn btn-info">Guardar Tipo</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#example8').DataTable();
    });
</script>