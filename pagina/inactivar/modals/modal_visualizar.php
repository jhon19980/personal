<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<?php
include('../../dist/includes/dbcon.php');

?>

<div class="modal fade" id="modalVisuaInac" tabindex="-1" role="dialog" aria-labelledby="modalVisuaInac" data-backdrop="static" aria-hidden="true">
    <div class="modal-dialog modal-xl " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalVisuaInac">INGRESAR CEDULA PARA VISUALIZAR DATOS </h5>

            </div>
            <div class="card-body">
                <div class="container">
                    <div class="card card-secondary">
                        <div class="card-header">
                            <h3 class="card-title">VISUALIZAR USUARIOS</h3>
                        </div>
                        <div class="container-fluid" style="overflow-x:scroll; ">
                            <div class="modal-body">
                                <table id="example5" class="table table-bordered table-striped">
                                    <thead>
                                        <tr class=" btn-dark">

                                            <th>#</th>
                                            <th>Tipo Docu</th>
                                            <th>Nombre y Apellido</th>
                                            <th>Cargo</th>
                                            <th>Fecha Creacion</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                        $query = $conexion->query("SELECT * FROM personal WHERE estado_personal = 0");



                                        $usuarios = array(); // Array para almacenar datos únicos por id_usuario_personal
                                        $i = 0;
                                        while ($row = $query->fetch(PDO::FETCH_ASSOC)) { 
                                                $i++;
                                        ?>
                                                <tr>
                                                    <td><?php echo $i; ?></td>
                                                    <td><?php echo $row['documento']; ?></td>
                                                    <td><?php echo $row['primer_nombre'] . '  ' . $row['primer_apellido']; ?></td>
                                                    <td><?php echo $row['cargo']; ?></td>
                                                    <td><?php echo $row['fecha_ingreso']; ?></td>
                                                </tr>
                                                <!--end of modal-->
                                        <?php
                                            }
                                        
                                        ?>

                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#example5').DataTable({

        });
    });
</script>