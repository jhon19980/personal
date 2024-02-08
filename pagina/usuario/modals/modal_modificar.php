<?php include('../../dist/includes/dbcon.php'); ?>



<div class="modal fade bd-example-modal-xl" id="modalModificar" tabindex="-1" role="dialog" aria-labelledby="modalModificar" data-backdrop="static" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalModificar">NUMERO DE DOCUMENTO DEL PERSONAL A INACTIVAR</h5>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="cedula" class="form-label">Cédula</label>
                    <input type="text" class="form-control" name="documento" id="documento" placeholder="Cédula" onkeyup="javascript:this.value=this.value.toUpperCase();">
                </div>
                <div class="mb-3">
                    <button type="button" id="btnBuscar" class="btn btn-primary">Buscar</button>
                </div>

                <!-- Tabla para mostrar datos del empleado -->

                    <div class="container">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">DATOS DEL EMPLEADO</h3>
                            </div>
                            <div class="container-fluid">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Tipo Documento</th>
                                                <th>Número Documento</th>
                                                <th>Primer Nombre</th>
                                                <th>Primer Apellido</th>

                                                <!-- Agrega más columnas según la información que desees mostrar -->
                                            </tr>
                                        </thead>
                                        <tbody id="tablaDatosEmpleado">

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>


                <!-- Agrega este formulario después del formulario de búsqueda y visualización de datos -->
                <form action="personal_update.php" method="post" enctype='multipart/form-data'>
                    <div id="formularioEmpleado" style="display: none;">
                        <div class="container">
                            <div class="card card-secondary">
                                <div class="card-header">
                                    <h3 class="card-title">DATOS DEL CARGO</h3>
                                </div>
                                <div class="container-fluid">
                                    <div class="modal-body">
                                        <div class="row">


                                            <input type="hidden" class="form-control" id="id_personal" name="id_personal" value="<?php echo $response['id_personal']; ?>">
                                            

                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label for="file" class="form-label"> Fecha de Ingreso</label>
                                                    <input type="text" class="form-control" name="fecha_ingreso" id="fecha_ingreso" placeholder="Fecha de Ingreso" required value="<?php echo $response['fecha_ingreso']; ?>">
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <label for="file" class="form-label"> Sede
                                                </label>
                                                <select name="sede" class="form-control select2" value="<?php echo $response['sede']; ?>">

                                                    <option value="Principal">Principal</option>
                                                    <option value="SanMarcos">San Marcos</option>
                                                    <option value="Ambas">Ambas</option>

                                                </select>
                                            </div>
                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label for="departamento" class="form-label">Departamento</label>
                                                    <select class="form-control" name="area">
                                                        <?php

                                                        // Consulta SQL para obtener los IDs de las áreas
                                                        $areas_query = $conexion->prepare("SELECT nombre_area FROM area");
                                                        $areas_query->execute();
                                                        $areas = $areas_query->fetchAll(PDO::FETCH_ASSOC);

                                                        // Imprimir opciones del select
                                                        foreach ($areas as $area) {
                                                            echo "<option value='{$area['nombre_area']}' $selected>{$area['nombre_area']}</option>";
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label for="file" class="form-label">Cargo</label>

                                                    <select class="form-control" name="cargo" id="cargo">

                                                        <?php
                                                        // Consulta SQL para obtener los cargos
                                                        $cargos_query = $conexion->prepare("SELECT id_cargo, nombre_cargo FROM cargo");
                                                        $cargos_query->execute();
                                                        $cargos = $cargos_query->fetchAll(PDO::FETCH_ASSOC);

                                                        // Imprimir opciones del select
                                                        foreach ($cargos as $cargoOption) {
                                                            // Si el id_cargo coincide con el id_cargo actual del usuario, seleccionarlo
                                                            $selected = ($cargoOption['nombre_cargo'] == $row['cargo']) ? 'selected' : '';

                                                            echo "<option value='{$cargoOption['nombre_cargo']}' $selected>{$cargoOption['nombre_cargo']}</option>";
                                                        }
                                                        ?>
                                                    </select>
                                                    <!-- Agrega un campo oculto para almacenar el id_cargo -->
                                                    <input type="hidden" name="id_cargo">
                                                </div>
                                            </div>

                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label for="file" class="form-label"> Registro Medico</label>
                                                    <input type="text" class="form-control" name="registro_medico" id="registro_medico" placeholder="Registro">
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label for="file" class="form-label"> Especialidades</label>
                                                    <input type="text" class="form-control" name="especialidades" id="especialidades" placeholder="Especialidades">
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
                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label for="file" class="form-label">Tipo Contrato</label>
                                                    <select class="form-control" name="tipo_contrato">
                                                        <?php
                                                        $tipoContrato = $row['tipo_contrato'];

                                                        // Definir el mapeo entre el valor y el texto correspondiente
                                                        $mapeoContratos = array(
                                                            '0' => 'Contrato de Aprendizaje',
                                                            '1' => 'Termino Fijo 6 meses',
                                                            '4' => 'Termino Fijo 1 año',
                                                        );

                                                        foreach ($mapeoContratos as $valor => $texto) {
                                                            // Marcar como seleccionada la opción correspondiente al valor de $row['tipo_contrato']
                                                            $selected = ($valor == $tipoContrato) ? 'selected' : '';

                                                            echo '<option value="' . $valor . '" ' . $selected . '>' . $texto . '</option>';
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>


                                            <div class="col-3" id="remplazaInputContainer" style="display: none;">
                                                <div class="form-group">
                                                    <label for="file" class="form-label">Remplaza a</label>
                                                    <input type="text" class="form-control" name="remplaza_a" placeholder="Remplaza a">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <label for="file" class="form-label">Observacion</label>
                                                <textarea type="text" class="form-control pull-right" id="observacion" name="observacion" placeholder="Observaciones" required aria-label="With textarea"></textarea>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    </div>
            </div>
            </form>
        </div>
    </div>



    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <!-- SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>



    <script>
        $(document).ready(function() {
            // Configurar el evento de clic para el botón de búsqueda
            $('#btnBuscar').click(function() {
                var documento = $('#documento').val();

                // Realizar la llamada AJAX para obtener los datos del empleado
                $.ajax({
                    url: 'obtener_datos_empleado.php',
                    method: 'POST',
                    data: {
                        documento: documento
                    },
                    dataType: 'json',
                    success: function(response) {
                        console.log(response);
                        // Después de llenar la tabla con los datos del empleado
                        $('#tablaDatosEmpleado').html('<tr><td>' + response.tipo_documento + '</td><td>' + response.documento + '</td><td>' + response.primer_nombre + '</td><td>' + response.primer_apellido + '</td></tr>');

                        // Mostrar el formulario del empleado
                        $('#formularioEmpleado').show();

                        // Rellenar los campos del formulario con los datos del empleado
                        $('#id_personal').val(response.id_personal);
                        $('#fecha_ingreso').val(response.fecha_ingreso);
                        $('#sede').val(response.sede);
                        $('#area').val(response.area);
                        $('#cargo').val(response.cargo);
                        $('#registro_medico').val(response.registro_medico);
                        $('#especialidades').val(response.especialidades);
                        $('#remplazaCheckbox').val(response.remplaza_checkbox);
                        $('#tipo_contrato').val(response.tipo_contrato);
                        $('#observacion').val(response.observacion);

                        // Deshabilitar el campo de cédula después de realizar la búsqueda
                        $('#documento').prop('disabled', true);

                        // Verificar si hay un error en la respuesta del servidor
                        if (response.error) {
                            // Si hay un error, muestra un mensaje de alerta
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: response.error,
                                showConfirmButton: false,
                            });

                            // Esperar 5 segundos y luego recargar la página
                            setTimeout(function() {
                                location.reload();
                            }, 5000);
                        } else {
                            // Por lo tanto, mostramos una alerta indicando que el empleado ya está registrado
                            Swal.fire({
                                icon: 'warning',
                                title: 'Alerta',
                                text: 'El empleado no tiene registro en la sistema.'
                            });
                        }

                    },
                    error: function(error) {
                        console.error('Error al obtener datos del empleado:', error);
                    }
                });
            });
        });
    </script>