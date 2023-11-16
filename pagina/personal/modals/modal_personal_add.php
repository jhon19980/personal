<?php
include('../../dist/includes/dbcon.php');

?>


<div class="modal fade bd-example-modal-xl" id="modalIngresoPersonal" tabindex="-1" role="dialog" aria-labelledby="modalIngresoPersonal" data-backdrop="static" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalIngresoPersonal">INGRESAR DATOS DEL PERSONAL</h5>

            </div>
            <form action="personal_add.php" method="post" enctype='multipart/form-data'>
                <div class="container">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">DATOS DEL EMPLEADO</h3>
                        </div>
                        <div class="container-fluid">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-6">
                                        <label for="file" class="form-label"> Tipo de Documento
                                        </label>
                                        <select id="tipo_service" name="tipo_documento" class="form-control select2" value="">
                                            <option value="CC">Cedula de Ciudadania</option>
                                            <option value="CE">Cedula Extrangera</option>
                                            <option value="TI">Tarjeta de Identidad</option>

                                        </select>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="file" class="form-label"> Numero del Documento</label>
                                            <input type="text" class="form-control" name="documento" placeholder="Numero" required onkeyup="javascript:this.value=this.value.toUpperCase();">
                                        </div>
                                    </div>

                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="file" class="form-label"> Primer Apellido</label>
                                            <input type="text" class="form-control" name="primer_apellido" placeholder="Primer Apellido" required onkeyup="javascript:this.value=this.value.toUpperCase();">
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="file" class="form-label"> Segundo Apellido</label>
                                            <input type="text" class="form-control" name="segundo_apellido" placeholder="Segundo Apellido" onkeyup="javascript:this.value=this.value.toUpperCase();">
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="file" class="form-label"> Primer Nombre</label>
                                            <input type="text" class="form-control" name="primer_nombre" placeholder="Primer Nombre" required onkeyup="javascript:this.value=this.value.toUpperCase();">
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="file" class="form-label"> Segundo Nombre</label>
                                            <input type="text" class="form-control" name="segundo_nombre" placeholder="Segundo Nombre" onkeyup="javascript:this.value=this.value.toUpperCase();">
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="file" class="form-label"> Fecha Nacimiento</label>
                                            <input type="date" class="form-control" name="fecha_nacimiento" placeholder="Fecha Nacimiento" required>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="file" class="form-label"> Lugar de Nacimiento</label>
                                            <input type="text" class="form-control" name="lugar_Nacimiento" placeholder="Lugar de Nacimiento" required>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="file" class="form-label"> Telefono</label>
                                            <input type="text" class="form-control" name="telefono" placeholder="Telefono / Celular" required>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <label for="file" class="form-label"> Estado Civil
                                        </label>
                                        <select name="estado_civil" class="form-control select2" value="">
                                            <option value="Soltero">Soltero</option>
                                            <option value="Casado">Casado</option>
                                            <option value="Union">Union Libre</option>

                                        </select>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="file" class="form-label"> Direccion</label>
                                            <input type="text" class="form-control" name="direccion" placeholder="Direccion" required>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="file" class="form-label"> Barrio</label>
                                            <input type="text" class="form-control" name="barrio" placeholder="Barrio" required>
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="file" class="form-label"> Correo</label>
                                            <input type="correo" class="form-control" name="correo" placeholder="Correo" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="card card-secondary">
                        <div class="card-header">
                            <h3 class="card-title">DATOS DEL CARGO</h3>
                        </div>
                        <div class="container-fluid">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="file" class="form-label"> Fecha de Ingreso</label>
                                            <input type="date" class="form-control" name="fecha_ingreso" placeholder="Fecha de Ingreso" required>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <label for="file" class="form-label"> Sede
                                        </label>
                                        <select name="sede" class="form-control select2" value="">
                                            <option value="Principal">Principal</option>
                                            <option value="SanMarcos">San Marcos</option>
                                            <option value="Ambas">Ambas</option>

                                        </select>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="departamento" class="form-label">Departamento</label>
                                            <select class="form-control" name="area" required>
                                                <?php
                                                // Consulta SQL para obtener los IDs de las áreas
                                                $areas_query = $conexion->prepare("SELECT nombre_area FROM area");
                                                $areas_query->execute();
                                                $areas = $areas_query->fetchAll(PDO::FETCH_ASSOC);

                                                // Imprimir opciones del select
                                                foreach ($areas as $area) {
                                                    $selected = ($modo_edicion && $datos_usuario['area'] == $area['area']) ? 'selected' : '';
                                                    echo "<option value='{$area['nombre_area']}' $selected>{$area['nombre_area']}</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="file" class="form-label"> Cargo</label>
                                            <select class="form-control" name="cargo" id="cargo" required>
                                                <?php
                                                // Consulta SQL para obtener los IDs de las áreas
                                                $areas_query = $conexion->prepare("SELECT nombre_cargo FROM cargo");
                                                $areas_query->execute();
                                                $areas = $areas_query->fetchAll(PDO::FETCH_ASSOC);

                                                // Imprimir opciones del select
                                                foreach ($areas as $area) {

                                                    echo "<option value='{$area['nombre_cargo']}' $selected>{$area['nombre_cargo']}</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="file" class="form-label"> Registro Medico</label>
                                            <input type="text" class="form-control" name="registro_medico" placeholder="Registro" required>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="file" class="form-label"> Especialidades</label>
                                            <input type="text" class="form-control" name="especialidades" placeholder="Especialidades" required>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="file" class="form-label">Remplaza a</label>
                                            <select class="form-control" name="remplaza_checkbox" id="remplazaCheckbox">
                                                <option value="no">No</option>
                                                <option value="si">Sí</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-3" id="remplazaInputContainer" style="display: none;">
                                        <div class="form-group">
                                            <label for="file" class="form-label">Remplaza a</label>
                                            <input type="text" class="form-control" name="remplaza_a" placeholder="Remplaza a">
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="file" class="form-label"> Salario</label>
                                            <input type="text" class="form-control" name="salario" placeholder="Salario" required>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="file" class="form-label">Remplaza a</label>
                                            <select class="form-control" name="tipo_contrato">
                                                <option value="0">Termino Fijo 6 meses</option>
                                                <option value="4">Termino Fijo 1 año</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <label for="file" class="form-label">Observacion</label>
                                        <textarea type="text" class="form-control pull-right" id="observaciones" name="observaciones" placeholder="Observaciones" required aria-label="With textarea"></textarea>
                                    </div>
                                    <div class="col-12">
                                       <br>
                                    </div>
                                
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="file" class="form-label"> Servicios</label>
                                            <select class="form-control" id="selectServicios" multiple required>
                                                <?php
                                                // Consulta SQL para obtener los IDs de las áreas
                                                $servicio_query = $conexion->prepare("SELECT id_servicios, servicios FROM servicios");
                                                $servicio_query->execute();
                                                $servicios = $servicio_query->fetchAll(PDO::FETCH_ASSOC);

                                                // Imprimir opciones del select
                                                foreach ($servicios as $servicio) {
                                                    echo "<option class='servicio-seleccionable' value='{$servicio['id_servicios']}'>{$servicio['servicios']}</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <button type="button" id="agregarServicio" class="btn btn-primary">Agregar Servicio</button>
                                    </div>

                                    <div class="col-6">
                                        <table class="table">
                                            <thead>
                                                <tr>                        
                                                    <label for="file" class="form-label"> Servicios Ingresados</label> 
                                                </tr>
                                            </thead>
                                            <tbody id="tablaServicios">
                                                <!-- Aquí se mostrarán los servicios seleccionados -->
                                            </tbody>
                                        </table>
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

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
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