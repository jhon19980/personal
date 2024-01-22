<div class="modal fade bd-example-modal-xl" id="perinactivo<?php echo $row['id_usuario_personal']; ?>" tabindex="-1" role="dialog" aria-labelledby="perinactivo" data-backdrop="static" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="perinactivo">DATOS DEL PERSONAL</h5>

            </div>
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
                                        <label for="file" class="form-label"> Tipo Documento</label>
                                        <input type="text" class="form-control" name="tipo_documento" disabled onkeyup="javascript:this.value=this.value.toUpperCase();" value="<?php echo $row['tipo_documento']; ?>">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="file" class="form-label"> Numero del Documento</label>
                                        <input type="text" class="form-control" name="documento" disabled onkeyup="javascript:this.value=this.value.toUpperCase();" value="<?php echo $row['personal_documento']; ?>">
                                    </div>
                                </div>

                                <div class="col-3">
                                    <div class="form-group">
                                        <label for="file" class="form-label"> Primer Apellido</label>
                                        <input type="text" class="form-control" name="primer_apellido" disabled onkeyup="javascript:this.value=this.value.toUpperCase();" value="<?php echo $row['primer_apellido']; ?>">
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <label for="file" class="form-label"> Segundo Apellido</label>
                                        <input type="text" class="form-control" name="segundo_apellido" disabled onkeyup="javascript:this.value=this.value.toUpperCase();" value="<?php echo $row['segundo_apellido']; ?>">
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <label for="file" class="form-label"> Primer Nombre</label>
                                        <input type="text" class="form-control" name="primer_nombre" disabled onkeyup="javascript:this.value=this.value.toUpperCase();" value="<?php echo $row['primer_nombre']; ?>">
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <label for="file" class="form-label"> Segundo Nombre</label>
                                        <input type="text" class="form-control" name="segundo_nombre" disabled onkeyup="javascript:this.value=this.value.toUpperCase();" value="<?php echo $row['segundo_nombre']; ?>">
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <label for="file" class="form-label"> Fecha Nacimiento</label>
                                        <input type="date" class="form-control" name="fecha_nacimiento" disabled value="<?php echo $row['fecha_nacimiento']; ?>">
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <label for="file" class="form-label"> Lugar de Nacimiento</label>
                                        <input type="text" class="form-control" name="lugar_Nacimiento" disabled value="<?php echo $row['lugar_nacimiento']; ?>">
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <label for="file" class="form-label"> Telefono</label>
                                        <input type="text" class="form-control" name="telefono" disabled value="<?php echo $row['telefono']; ?>">
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <label for="file" class="form-label"> Estado Civil</label>
                                        <input type="text" class="form-control" name="estado_civil" disabled value="<?php echo $row['estado_civil']; ?>">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="file" class="form-label"> Direccion</label>
                                        <input type="text" class="form-control" name="direccion" placeholder="Direccion" disabled value="<?php echo $row['direccion']; ?>">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="file" class="form-label"> Barrio</label>
                                        <input type="text" class="form-control" name="barrio" placeholder="Barrio" disabled value="<?php echo $row['barrio']; ?>">
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="file" class="form-label"> Correo</label>
                                        <input type="text" class="form-control" name="correo" placeholder="Correo" disabled value="<?php echo $row['correo']; ?>">
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
                        <h3 class="card-title">CARGO DEL EMPLEADO</h3>
                    </div>
                    <div class="container-fluid">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-3">
                                    <div class="form-group">
                                        <label for="file" class="form-label"> Fecha de Ingreso</label>
                                        <input type="date" class="form-control" name="fecha_ingreso" placeholder="Fecha de Ingreso" disabled value="<?php echo $row['fecha_ingreso']; ?>">
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <label for="file" class="form-label"> Sede</label>
                                        <input type="text" class="form-control" name="sede" disabled value="<?php echo $row['sede']; ?>">
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <label for="departamento" class="form-label">Departamento</label>
                                        <select class="form-control" name="area" disabled>
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

                                        <select class="form-control" name="cargo" id="cargo" disabled>

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
                                        <input type="hidden" name="id_cargo" value="<?php echo $row['id_cargo']; ?>">
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <label for="file" class="form-label">Tipo Contrato</label>
                                        <select class="form-control" name="tipo_contrato" disabled>
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

                                <div class="col-3">
                                    <div class="form-group">
                                        <label for="file" class="form-label"> Registro Medico</label>
                                        <input type="text" class="form-control" name="registro_medico" disabled value="<?php echo $row['registro_medico']; ?>">
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <label for="file" class="form-label"> Especialidades</label>
                                        <input type="text" class="form-control" name="especialidades" disabled value="<?php echo $row['especialidades']; ?>">
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <label for="file" class="form-label">Remplaza a</label>
                                        <select class="form-control" name="remplaza_checkbox" id="remplazaCheckbox" disabled>
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
                                <div class="col-12">
                                    <label for="file" class="form-label">Observacion</label>
                                    <textarea type="text" class="form-control pull-right" id="observaciones" name="observaciones" disabled required aria-label="With textarea"><?php echo  $row['observacion']; ?></textarea>
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
                                            $sql_servicios_seleccionados = "SELECT up.*, s.servicios 
                                                                                FROM usuarioxpersonal up
                                                                                INNER JOIN servicios s ON up.id_servicios = s.id_servicios
                                                                                WHERE up.id_usuario_personal = ?";
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
            <?php
            // Lógica para determinar si todos los usuarios están activos
            $todosActivos = true;

            // Verificar cada columna de activación/inactivación
            if (
                $row['scse_activo'] != 1 || $row['moodle_activo'] != 1 || $row['correo_activo'] != 1 ||
                $row['appscv_activo'] != 1 || $row['binaps_activo'] != 1 || $row['unoe_activo'] != 1
            ) {
                $todosActivos = false;
            }
            ?>

            <form action="activar_usuarios.php?id_usuario_personal=<?php echo $row['id_usuario_personal']; ?>" method="post" enctype='multipart/form-data' onsubmit="return verificarCheckbox();">
                <div class="container">
                    <div class="card card-secondary">
                        <div class="card-header">
                            <h3 class="card-title">GENERAR USUARIOS</h3>
                        </div>
                        <div class="container-fluid">
                            <div class="modal-body">
                                <div class="row">

                                    <!-- Bloque 1 -->
                                    <?php
                                    if ($tipo == "administrador" or $tipo == "gestion" or $tipo == "scse") {

                                    ?>
                                        <div class="col-md-4">
                                            <div class="card">
                                                <div class="card-body">
                                                    <?php
                                                    $isScseInactivo = ($row['scse_activo'] == 0);
                                                    ?>

                                                    <?php if ($isScseInactivo) : ?>
                                                        <p style="color: red;">Usuario Inactivo</p>
                                                    <?php endif; ?>
                                                    <div class="mb-3">
                                                        <label for="username" class="form-label">Usuario SCSE</label>
                                                        <input type="text" class="form-control" name="usuario_scse" placeholder="Ingrese su usuario" value="<?php echo $row['usuario_scse']; ?>" <?php echo $isScseInactivo ? 'disabled' : ''; ?>>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="password" class="form-label">Contraseña</label>
                                                        <input type="text" class="form-control" name="password_scse" placeholder="Ingrese su contraseña" value="<?php echo $row['password_scse']; ?>" <?php echo $isScseInactivo ? 'disabled' : ''; ?>>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="inactive_scse" class="form-check-label">Inactivo</label>
                                                        <input type="checkbox" class="form-check-input" name="scse_activo" <?php echo ($row['scse_activo'] == 1) ? '' : 'checked'; ?>>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                    }
                                    ?>

                                    <?php
                                    if ($tipo == "administrador" or $tipo == "moodle" or $tipo == "gestion") {

                                    ?>

                                        <!-- Bloque 2 -->
                                        <div class="col-md-4">
                                            <div class="card">
                                                <div class="card-body">
                                                    <?php
                                                    $isMoodleInactivo = ($row['moodle_activo'] == 0);
                                                    ?>

                                                    <?php if ($isMoodleInactivo) : ?>
                                                        <p style="color: red;">Usuario Inactivo</p>
                                                    <?php endif; ?>
                                                    <div class="mb-3">
                                                        <label for="username" class="form-label">Usuario MOODLE</label>
                                                        <input type="text" class="form-control" name="usuario_moodle" placeholder="Ingrese su usuario" value="<?php echo $row['usuario_moodle']; ?>" <?php echo $isMoodleInactivo ? 'disabled' : ''; ?>>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="password" class="form-label">Contraseña</label>
                                                        <input type="text" class="form-control" name="password_moodle" placeholder="Ingrese su contraseña" value="<?php echo $row['password_moodle']; ?>" <?php echo $isMoodleInactivo ? 'disabled' : ''; ?>>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="inactive_moodle" class="form-check-label">Inactivo</label>
                                                        <input type="checkbox" class="form-check-input" name="moodle_activo" <?php echo ($row['moodle_activo'] == 1) ? '' : 'checked'; ?>>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                    }
                                    ?>

                                    <?php
                                    if ($tipo == "administrador" or $tipo == "solinux" or $tipo == "gestion") {

                                    ?>

                                        <!-- Bloque 3 -->
                                        <div class="col-md-4">
                                            <div class="card">
                                                <div class="card-body">
                                                    <?php
                                                    $isCorreoInactivo = ($row['correo_activo'] == 0);
                                                    ?>

                                                    <?php if ($isCorreoInactivo) : ?>
                                                        <p style="color: red;">Usuario Inactivo</p>
                                                    <?php endif; ?>
                                                    <div class="mb-3">
                                                        <label for="username" class="form-label">Usuario CORREO / ZIMBRA</label>
                                                        <input type="text" class="form-control" name="usuario_correo" placeholder="Ingrese su usuario" value="<?php echo $row['usuario_correo']; ?>" <?php echo $isCorreoInactivo ? 'disabled' : ''; ?>>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="password" class="form-label">Contraseña</label>
                                                        <input type="text" class="form-control" name="password_correo" placeholder="Ingrese su contraseña" value="<?php echo $row['password_correo']; ?>" <?php echo $isCorreoInactivo ? 'disabled' : ''; ?>>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="inactive_correo" class="form-check-label">Inactivo</label>
                                                        <input type="checkbox" class="form-check-input" name="correo_activo" <?php echo ($row['correo_activo'] == 1) ? '' : 'checked'; ?>>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                    }
                                    ?>

                                    <?php
                                    if ($tipo == "administrador" or $tipo == "appscv" or $tipo == "gestion") {

                                    ?>

                                        <!-- Bloque 4 -->
                                        <div class="col-md-4">
                                            <div class="card">
                                                <div class="card-body">
                                                    <?php
                                                    $isAppscvInactivo = ($row['appscv_activo'] == 0);
                                                    ?>

                                                    <?php if ($isAppscvInactivo) : ?>
                                                        <p style="color: red;">Usuario Inactivo</p>
                                                    <?php endif; ?>
                                                    <div class="mb-3">
                                                        <label for="username" class="form-label">Usuario APPSCV</label>
                                                        <input type="text" class="form-control" name="usuario_appscv" placeholder="Ingrese su usuario" value="<?php echo $row['usuario_appscv']; ?>" <?php echo $isAppscvInactivo ? 'disabled' : ''; ?>>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="password" class="form-label">Contraseña</label>
                                                        <input type="text" class="form-control" name="password_appscv" placeholder="Ingrese su contraseña" value="<?php echo $row['password_appscv']; ?>" <?php echo $isAppscvInactivo ? 'disabled' : ''; ?>>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="inactive_otrs" class="form-check-label">Inactivo</label>
                                                        <input type="checkbox" class="form-check-input" name="appscv_activo" <?php echo ($row['appscv_activo'] == 1) ? '' : 'checked'; ?>>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                    <?php
                                    if ($tipo == "administrador" or $tipo == "binaps" or $tipo == "gestion") {

                                    ?>
                                        <!-- Bloque 5 -->
                                        <div class="col-md-4">
                                            <div class="card">
                                                <div class="card-body">
                                                    <?php
                                                    $isBinapsInactivo = ($row['binaps_activo'] == 0);
                                                    ?>

                                                    <?php if ($isBinapsInactivo) : ?>
                                                        <p style="color: red;">Usuario Inactivo</p>
                                                    <?php endif; ?>
                                                    <div class="mb-3">
                                                        <label for="username" class="form-label">Usuario BINAPS </label>
                                                        <input type="text" class="form-control" name="usuario_binaps" placeholder="Ingrese su usuario" value="<?php echo $row['usuario_binaps']; ?>" <?php echo $isBinapsInactivo ? 'disabled' : ''; ?>>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="password" class="form-label">Contraseña</label>
                                                        <input type="text" class="form-control" name="password_binaps" placeholder="Ingrese su contraseña" value="<?php echo $row['usuario_binaps']; ?>" <?php echo $isBinapsInactivo ? 'disabled' : ''; ?>>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="inactive_binaps" class="form-check-label">Inactivo</label>
                                                        <input type="checkbox" class="form-check-input" name="binaps_activo" <?php echo ($row['binaps_activo'] == 1) ? '' : 'checked'; ?>>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                    <?php
                                    if ($tipo == "administrador" or $tipo == "gestion") {

                                    ?>

                                        <!-- Bloque 6 -->
                                        <div class="col-md-4">
                                            <div class="card">
                                                <div class="card-body">
                                                    <?php
                                                    $isUnoeInactivo = ($row['unoe_activo'] == 0);
                                                    ?>

                                                    <?php if ($isUnoeInactivo) : ?>
                                                        <p style="color: red;">Usuario Inactivo</p>
                                                    <?php endif; ?>
                                                    <div class="mb-3">
                                                        <label for="username" class="form-label">Usuario UNO-EE</label>
                                                        <input type="text" class="form-control" name="usuario_unoe" placeholder="Ingrese su usuario" value="<?php echo $row['usuario_unoe']; ?>" <?php echo $isUnoeInactivo ? 'disabled' : ''; ?>>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="password" class="form-label">Contraseña</label>
                                                        <input type="text" class="form-control" name="password_unoe" placeholder="Ingrese su contraseña" value="<?php echo $row['usuario_unoe']; ?>" <?php echo $isUnoeInactivo ? 'disabled' : ''; ?>>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="inactive_unoe" class="form-check-label">Inactivo</label>
                                                        <input type="checkbox" class="form-check-input" name="unoe_activo" <?php echo ($row['unoe_activo'] == 1) ? '' : 'checked';; ?>>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                    }
                                    ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-info">Guardar Usuario</button>
                    <?php
                    if ($tipo == "administrador" or $tipo == "gestion") {

                    ?>
                        <?php if ($todosActivos && $row['estado_personal'] == 2) : ?>
                            <button type="button" class="btn btn-success" onclick="activarUsuario(<?php echo $row['id_usuario_personal']; ?>)">Activar Usuario</button>
                        <?php endif; ?>
                    <?php
                    }
                    ?>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </form>

        </div>
    </div>
</div>

<style>
    .inactivo {
        color: gray;
    }
</style>



<!-- Agrega SweetAlert a tu página HTML (asegúrate de incluir la biblioteca y el archivo de estilos) -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<!-- Agrega este script para manejar la respuesta y mostrar la alerta -->
<script>
    function activarUsuario(idUsuarioPersonal) {
        // Hacer la solicitud al servidor para activar el usuario
        fetch(`activar_usuario.php?id_usuario_personal=${idUsuarioPersonal}`)
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Si la activación fue exitosa, muestra la alerta
                    Swal.fire({
                        icon: 'success',
                        title: 'Éxito',
                        text: data.message,
                    }).then(() => {
                        // Recarga la página o realiza otras acciones después de cerrar la alerta
                        location.reload();
                    });
                } else {
                    // Si hubo un error, muestra una alerta de error
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: data.message,
                    });
                }
            })
            .catch(error => {
                console.error('Error al procesar la solicitud:', error);
            });
    }
</script>