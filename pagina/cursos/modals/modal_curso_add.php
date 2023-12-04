<!-- Incluir archivos CSS y JS de Select2 -->

<head>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
</head>

<?php
include('../../dist/includes/dbcon.php');

?>

<div class="modal fade bd-example-modal-xl" id="modalCursoPersonal" tabindex="-1" role="dialog" aria-labelledby="modalCursoPersonal" data-backdrop="static" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalCursoPersonal">INGRESAR DATOS DEL PERSONAL</h5>

            </div>
            <form action="cursos_add.php" method="post" enctype='multipart/form-data'>
                <div class="container">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">DATOS DEL EMPLEADO</h3>
                        </div>
                        <div class="container-fluid">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="cursos" class="form-label">Cursos</label>
                                            <select class="form-control" name="id_curso" required>
                                                <?php
                                                // Consulta SQL para obtener los IDs de las áreas
                                                $curso_query = $conexion->prepare("SELECT id_curso, nombre_curso FROM cursos");
                                                $curso_query->execute();
                                                $cursos = $curso_query->fetchAll(PDO::FETCH_ASSOC);

                                                // Imprimir opciones del select
                                                foreach ($cursos as $curso) {
                                                    $selected = ($modo_edicion && $datos_usuario['cursos'] == $curso['cursos']) ? 'selected' : '';
                                                    echo "<option value='{$curso['id_curso']}' $selected>{$curso['nombre_curso']}</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>


                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="cursos" class="form-label">Personal</label>
                                            <select class="id_select js-states form-control" name="id_persona"  multiple="multiple" style="width: 75%"  required>
                                                <?php
                                                // Consulta SQL para obtener los IDs de las áreas
                                                $persona_query = $conexion->prepare("SELECT id_personal, primer_nombre, primer_apellido FROM personal WHERE estado_personal = 1");
                                                $persona_query->execute();
                                                $personal = $persona_query->fetchAll(PDO::FETCH_ASSOC);

                                                // Imprimir opciones del select
                                                foreach ($personal as $persona) {
                                                    $selected = ($modo_edicion && $datos_usuario['personal'] == $persona['personal']) ? 'selected' : '';
                                                    echo "<option value='{$persona['id_personal']}' $selected>{$persona['primer_nombre']} {$persona['primer_apellido']}</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="file" class="form-label"> Fecha Del Curso</label>
                                            <input type="date" class="form-control" name="fecha_del_curso" placeholder="Fecha del Curso" required>
                                        </div>
                                    </div>

                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="file" class="form-label"> Lugar del Curso</label>
                                            <input type="text" class="form-control" name="lugar" placeholder="Lugar del curso" onkeyup="javascript:this.value=this.value.toUpperCase();">
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="file" class="form-label"> Fecha de Caducidad del Curso</label>
                                            <input type="date" class="form-control" name="fecha_caducidad" placeholder="Fecha Caducidad" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-info">Guardar Usuario</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        // Manejar el cambio en el select
        $('#remplazaCheckbox').change(function() {
            // Mostrar u ocultar el contenedor del campo de entrada según la selección
            if ($(this).val() === 'si') {
                $('#remplazaInputContainer').show();
            } else {
                $('#remplazaInputContainer').hide();
            }
        });

        // Asegurarse de que el contenedor del campo de entrada esté oculto o visible al cargar la página
        if ($('#remplazaCheckbox').val() === 'si') {
            $('#remplazaInputContainer').show();
        } else {
            $('#remplazaInputContainer').hide();
        }
    });
</script>




<!-- Asegúrate de cargar jQuery primero -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<!-- Luego, carga Select2 y configúralo -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $(".id_select").select2({ placeholder: "Seleccione personal",});
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var tablaServicios = document.getElementById('tablaServicios');
        var selectServicios = document.getElementById('selectServicios');
        var agregarServicioBtn = document.getElementById('agregarServicio');

        agregarServicioBtn.addEventListener('click', function() {
            // Obtener los servicios seleccionados
            var selectedOptions = selectServicios.selectedOptions;

            // Agregar servicios a la tabla
            for (var i = 0; i < selectedOptions.length; i++) {
                var servicio = selectedOptions[i];
                agregarServicioATabla(servicio.value, servicio.text);
            }
        });

        function agregarServicioATabla(idServicio, nombreServicio) {
            var fila = document.createElement('tr');
            var celdaNombre = document.createElement('td');
            celdaNombre.textContent = nombreServicio;
            fila.appendChild(celdaNombre);

            // Agregar un campo oculto con el id del servicio
            var inputIdServicio = document.createElement('input');
            inputIdServicio.type = 'hidden';
            inputIdServicio.name = 'id_servicios[]';
            inputIdServicio.value = idServicio;
            fila.appendChild(inputIdServicio);

            tablaServicios.appendChild(fila);
        }
    });
</script>