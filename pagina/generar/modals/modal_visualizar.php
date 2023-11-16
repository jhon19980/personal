<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<?php
include('../../dist/includes/dbcon.php');

?>

<div class="modal fade" id="modalVisual" tabindex="-1" role="dialog" aria-labelledby="modalVisual" data-backdrop="static" aria-hidden="true">
    <div class="modal-dialog modal-xl " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalVisual">INGRESAR CEDULA PARA VISUALIZAR DATOS </h5>

            </div>
            <div class="card-body">
                <div class="container">
                    <div class="card card-secondary">
                        <div class="card-header">
                            <h3 class="card-title">VISUALIZAR USUARIOS</h3>
                        </div>
                        <div class="container-fluid"  style="overflow-x:scroll; ">
                            <div class="modal-body">
                                <table id="example5" class="table table-bordered table-striped">
                                    <thead>
                                        <tr class=" btn-dark">

                                            <th>#</th>
                                            <th>Tipo Docu</th>
                                            <th>Nombre y Apellido</th>
                                            <th>Cargo</th>
                                            <th>Área/Dpto</th>
                                            <th>Fecha Creacion</th>
                                            <th class="btn-print"> Accion </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                        $query = $conexion->query("SELECT usuarioxpersonal.*, cargo_personal.*, personal.*, servicios.*
                                                    FROM usuarioxpersonal
                                                    LEFT JOIN cargo_personal ON usuarioxpersonal.id_cargo = cargo_personal.id_cargo
                                                    LEFT JOIN personal ON usuarioxpersonal.id_personal = personal.id_personal
                                                    LEFT JOIN servicios ON usuarioxpersonal.id_servicios = servicios.id_servicios
                                                    WHERE personal.estado_personal = 1");


                                        $usuarios = array(); // Array para almacenar datos únicos por id_usuario_personal
                                        $i = 0;
                                        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                                            $id_usuario_personal = $row['id_usuario_personal'];
                                            $id_personal = $row['id_personal'];
                                            // Asegurarse de no duplicar registros
                                            if (!isset($usuarios[$id_usuario_personal])) {
                                                $usuarios[$id_usuario_personal] = $row;
                                                $i++;
                                                // Resto de tu código aquí...
                                        ?>
                                                <tr>
                                                    <td><?php echo $i; ?></td>
                                                    <td><?php echo $row['documento']; ?></td>
                                                    <td><?php echo $row['primer_nombre'] . '  ' . $row['primer_apellido']; ?></td>
                                                    <td><?php echo $row['cargo']; ?></td>
                                                    <td><?php echo $row['area']; ?></td>
                                                    <td><?php echo $row['fecha_ingreso']; ?></td>
                                                    <td>
                                                        <button type="button" class="btn btn-warning btn-print" data-toggle="modal" data-target="#perusuario<?php echo $row['id_usuario_personal']; ?>">
                                                            <i class="fas fa-edit"></i>
                                                        </button>
                                                        <?php include('../generar/modals/modal_generar_usuario.php'); ?>
                                                    </td>
                                                </tr>
                                                <!--end of modal-->
                                        <?php
                                            }
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