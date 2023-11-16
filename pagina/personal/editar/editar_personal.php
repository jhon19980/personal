<div class="modal fade bd-example-modal-xl" id="modalEditarPersonal<?php echo $row['id_personal']; ?>" tabindex="-1" role="dialog" aria-labelledby="modalEditarPersonal" data-backdrop="static" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEditarPersonal">INGRESAR DATOS DEL PERSONAL</h5>

            </div>

            <form action="personal_update.php?id_personal=<?php echo $row['id_personal']; ?>" method="post" enctype='multipart/form-data'>
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
                                        <select name="tipo_documento" class="form-control select2" value="<?php echo $row['tipo_documento']; ?>">
                                            <option value="CC">Cedula de Ciudadania</option>
                                            <option value="CE">Cedula Extrangera</option>
                                            <option value="TI">Tarjeta de Identidad</option>

                                        </select>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="file" class="form-label"> Numero del Documento</label>
                                            <input type="text" class="form-control" name="documento" placeholder="Numero" onkeyup="javascript:this.value=this.value.toUpperCase();" value="<?php echo $row['documento']; ?>">
                                        </div>
                                    </div>

                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="file" class="form-label"> Primer Apellido</label>
                                            <input type="text" class="form-control" name="primer_apellido" placeholder="Primer Apellido" onkeyup="javascript:this.value=this.value.toUpperCase();" value="<?php echo $row['primer_apellido']; ?>">
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="file" class="form-label"> Segundo Apellido</label>
                                            <input type="text" class="form-control" name="segundo_apellido" placeholder="Segundo Apellido" onkeyup="javascript:this.value=this.value.toUpperCase();" value="<?php echo $row['segundo_apellido']; ?>">
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="file" class="form-label"> Primer Nombre</label>
                                            <input type="text" class="form-control" name="primer_nombre" placeholder="Primer Nombre" onkeyup="javascript:this.value=this.value.toUpperCase();" value="<?php echo $row['primer_nombre']; ?>">
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="file" class="form-label"> Segundo Nombre</label>
                                            <input type="text" class="form-control" name="segundo_nombre" placeholder="Segundo Nombre" onkeyup="javascript:this.value=this.value.toUpperCase();" value="<?php echo $row['segundo_nombre']; ?>">
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="file" class="form-label"> Fecha Nacimiento</label>
                                            <input type="date" class="form-control" name="fecha_nacimiento" placeholder="Fecha Nacimiento" value="<?php echo $row['fecha_nacimiento']; ?>">
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="file" class="form-label"> Lugar de Nacimiento</label>
                                            <input type="text" class="form-control" name="lugar_Nacimiento" placeholder="Lugar de Nacimiento" value="<?php echo $row['lugar_nacimiento']; ?>">
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="file" class="form-label"> Telefono</label>
                                            <input type="text" class="form-control" name="telefono" placeholder="Telefono / Celular" value="<?php echo $row['telefono']; ?>">
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <label for="file" class="form-label"> Estado Civil
                                        </label>
                                        <select name="estado_civil" class="form-control select2">
                                            <option><?php echo $row['estado_civil']; ?></option>
                                            <option value="Soltero">Soltero</option>
                                            <option value="Casado">Casado</option>
                                            <option value="Union">Union Libre</option>

                                        </select>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="file" class="form-label"> Direccion</label>
                                            <input type="text" class="form-control" name="direccion" placeholder="Direccion" value="<?php echo $row['direccion']; ?>">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="file" class="form-label"> Barrio</label>
                                            <input type="text" class="form-control" name="barrio" placeholder="Barrio" value="<?php echo $row['barrio']; ?>">
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="file" class="form-label"> Correo</label>
                                            <input type="correo" class="form-control" name="correo" placeholder="Correo" value="<?php echo $row['correo']; ?>">
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
                                            <input type="text" class="form-control" name="fecha_ingreso" placeholder="Fecha de Ingreso" required value="<?php echo $row['fecha_ingreso']; ?>">
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <label for="file" class="form-label"> Sede
                                        </label>
                                        <select name="sede" class="form-control select2" value="<?php echo $row['sede']; ?>">
                                            <option value="Principal">Principal</option>
                                            <option value="SanMarcos">San Marcos</option>
                                            <option value="Ambas">Ambas</option>

                                        </select>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="departamento" class="form-label">Departamento</label>
                                            <select class="form-control" name="area">
                                                <option><?php echo $row['area']; ?></option>
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
                                                <option><?php echo $row['cargo']; ?></option>
                                                <?php

                                                // Consulta SQL para obtener los cargos
                                                $cargos_query = $conexion->prepare("SELECT nombre_cargo FROM cargo");
                                                $cargos_query->execute();
                                                $cargos = $cargos_query->fetchAll(PDO::FETCH_ASSOC);

                                                // Imprimir opciones del select
                                                foreach ($cargos as $cargo) {
                                                    echo "<option value='{$cargo['nombre_cargo']}' $selected>{$cargo['nombre_cargo']}</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="file" class="form-label"> Registro Medico</label>
                                            <input type="text" class="form-control" name="registro_medico" placeholder="Registro" value="<?php echo $row['registro_medico']; ?>">
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="file" class="form-label"> Especialidades</label>
                                            <input type="text" class="form-control" name="especialidades" placeholder="Especialidades" value="<?php echo $row['especialidades']; ?>">
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
                                            <label for="file" class="form-label">Tipo de contrato</label>
                                            <?php
                                            // Obtén el valor del tipo de contrato
                                            $tipo_contrato = $row['tipo_contrato'];

                                            // Verifica el valor y muestra el texto correspondiente
                                            if ($tipo_contrato >= 0 && $tipo_contrato <= 3) {
                                                echo '<input type="text" class="form-control" name="tipo_contrato" placeholder="Tipo contrato" value="Tipo de contrato a 6 meses" readonly>';
                                            } elseif ($tipo_contrato == 4) {
                                                echo '<input type="text" class="form-control" name="tipo_contrato" placeholder="Tipo contrato" value="Tipo de contrato término fijo a 1 año" readonly>';
                                            } else {
                                                // Si el valor no está en el rango esperado, simplemente muestra el valor existente
                                                echo '<input type="text" class="form-control" name="tipo_contrato" placeholder="Tipo contrato" value="' . $tipo_contrato . '" readonly>';
                                            }
                                            ?>
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
                                        <textarea type="text" class="form-control pull-right" id="observaciones" name="observaciones" placeholder="Observaciones" required aria-label="With textarea"><?php echo  $row['observacion']; ?></textarea>
                                    </div>

                                    <div class="col-12">
                                        <br>
                                    </div>
                                    <!-- Sección de mostrar servicios seleccionados -->
                                    <div class="col-12">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Servicios Seleccionados</th>
                                                </tr>
                                            </thead>
                                            <tbody id="tablaServicios">
                                                <?php

                                                // Consulta SQL para obtener servicios seleccionados para el id_personal
                                                $sql_servicios_seleccionados = "SELECT sp.*, s.servicios 
                                                                                FROM serviciosxpersonal sp
                                                                                INNER JOIN servicios s ON sp.id_servicios = s.id_servicios
                                                                                WHERE sp.id_personal = ?";
                                                $stmt_servicios_seleccionados = $conexion->prepare($sql_servicios_seleccionados);
                                                $stmt_servicios_seleccionados->execute([$id_personal]);
                                                $servicios_seleccionados = $stmt_servicios_seleccionados->fetchAll(PDO::FETCH_ASSOC);

                                                // Mostrar servicios seleccionados en la tabla
                                                foreach ($servicios_seleccionados as $row) {
                                                    echo "<tr><td>{$row['servicios']}</td></tr>";
                                                }
                                                ?>
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