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
                                        <label for="file" class="form-label"> Area</label>
                                        <input type="text" class="form-control" name="area" disabled value="<?php echo $row['area']; ?>">
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <label for="file" class="form-label"> Cargo</label>
                                        <input type="text" class="form-control" name="area" disabled value="<?php echo $row['cargo']; ?>">
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
                                            foreach ($servicios_seleccionados as $row2) {
                                                echo "<tr><td>{$row2['servicios']}</td></tr>";
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

            <form action="inactivar_usuarios.php?id_usuario_personal=<?php echo $row['id_usuario_personal']; ?>" method="post" enctype='multipart/form-data' onsubmit="return verificarCheckbox();">
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
                                                        <input type="hidden" class="form-check-input" name="scse_activo" <?php echo ($row['scse_activo'] == 1) ? '' : 'checked'; ?>>
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
                                                        <input type="hidden" class="form-check-input" name="moodle_activo" <?php echo ($row['moodle_activo'] == 1) ? '' : 'checked'; ?>>
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
                                                        <input type="hidden" class="form-check-input" name="correo_activo" <?php echo ($row['correo_activo'] == 1) ? '' : 'checked'; ?>>
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
                                                        <input type="hidden" class="form-check-input" name="appscv_activo" <?php echo ($row['appscv_activo'] == 1) ? '' : 'checked'; ?>>
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
                                                        <input type="hidden" class="form-check-input" name="binaps_activo" <?php echo ($row['binaps_activo'] == 1) ? '' : 'checked'; ?>>
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
                                                        <input type="hidden" class="form-check-input" name="unoe_activo" <?php echo ($row['unoe_activo'] == 1) ? '' : 'checked';; ?>>
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
