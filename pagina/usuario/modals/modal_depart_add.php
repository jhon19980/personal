<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- DataTables CSS y JS -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
<?php
include('../../dist/includes/dbcon.php');

try {
    // Consulta SQL para obtener los datos del área
    $area_query = $conexion->prepare("SELECT id_area, nombre_area FROM area");
    $area_query->execute();
    $areas = $area_query->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error en la consulta: " . $e->getMessage();
    die();
}
?>

<div class="modal fade" id="modalDepartamento" tabindex="-1" role="dialog" aria-labelledby="modalDepartamento" data-backdrop="static" aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalDeparmento">INGRESAR DEPARTAMENTO / AREA</h5>

            </div>
            <form action="insertar/insert_area.php" method="post" enctype='multipart/form-data'>

                <div class="container">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">INGRESO DE NUEVAS AREA</h3>
                        </div>
                        <div class="container-fluid">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="file" class="form-label"> Departamento / Area</label>
                                            <input type="text" class="form-control" name="nombre_area" placeholder="Área" required onkeyup="javascript:this.value=this.value.toUpperCase();">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card card-secondary">
                        <div class="card-header">
                            <h3 class="card-title">DATOS DE LAS ÁREAS REGISTRADAS</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example4" class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nombre</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                        // Imprimir datos en la tabla
                                        foreach ($areas as $area) {
                                            echo "<tr>";
                                            echo "<td>{$area['id_area']}</td>";
                                            echo "<td>{$area['nombre_area']}</td>";
                                            echo "</tr>";
                                        }
                                        ?>
                                        <!-- Agrega más filas según sea necesario -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-info">Guardar Departamento</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#example4').DataTable({

        });
    });
</script>