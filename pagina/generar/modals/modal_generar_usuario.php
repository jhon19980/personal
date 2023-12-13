<div class="modal fade bd-example-modal-xl" id="perusuario<?php echo $row['id_usuario_personal']; ?>" tabindex="-1" role="dialog" aria-labelledby="perusuario" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="perusuario">DATOS DEL PERSONAL</h5>
            </div>


            <form action="generar_add.php?id_usuario_personal=<?php echo $row['id_usuario_personal']; ?>" method="post" enctype='multipart/form-data'>
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
                                                    <div class="mb-3">
                                                        <label for="username" class="form-label">Usuario SCSE</label>
                                                        <input type="text" class="form-control" name="usuario_scse" placeholder="Ingrese su usuario" value="<?php echo $row['usuario_scse']; ?>">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="password" class="form-label">Contraseña</label>
                                                        <input type="text" class="form-control" name="password_scse" placeholder="Ingrese su contraseña" value="<?php echo $row['password_scse']; ?>">
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
                                                    <div class="mb-3">
                                                        <label for="username" class="form-label">Usuario MOODLE</label>
                                                        <input type="text" class="form-control" name="usuario_moodle" placeholder="Ingrese su usuario" value="<?php echo $row['usuario_moodle']; ?>">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="password" class="form-label">Contraseña</label>
                                                        <input type="text" class="form-control" name="password_moodle" placeholder="Ingrese su contraseña" value="<?php echo $row['password_moodle']; ?>">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                    }
                                    ?>

                                    <?php
                                    if ($tipo == "administrador" or $tipo == "solinux" or $tipo == "gestion" or $tipo == "binaps") {

                                    ?>

                                        <!-- Bloque 3 -->
                                        <div class="col-md-4">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="mb-3">
                                                        <label for="username" class="form-label">Usuario CORREO / ZIMBRA</label>
                                                        <input type="text" class="form-control" name="usuario_correo" placeholder="Ingrese su usuario" value="<?php echo $row['usuario_correo']; ?>">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="password" class="form-label">Contraseña</label>
                                                        <input type="text" class="form-control" name="password_correo" placeholder="Ingrese su contraseña" value="<?php echo $row['password_correo']; ?>">
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

                                        <!-- Bloque 4 -->
                                        <div class="col-md-4">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="mb-3">
                                                        <label for="username" class="form-label">Usuario APPSCV/ CLINVER</label>
                                                        <input type="text" class="form-control" name="usuario_appscv" placeholder="Ingrese su usuario" value="<?php echo $row['usuario_appscv']; ?>">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="password" class="form-label">Contraseña</label>
                                                        <input type="text" class="form-control" name="password_appscv" placeholder="Ingrese su contraseña" value="<?php echo $row['password_appscv']; ?>">
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
                                                    <div class="mb-3">
                                                        <label for="username" class="form-label">Usuario BINAPS </label>
                                                        <input type="text" class="form-control" name="usuario_binaps" placeholder="Ingrese su usuario" value="<?php echo $row['usuario_binaps']; ?>">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="password" class="form-label">Contraseña</label>
                                                        <input type="text" class="form-control" name="password_binaps" placeholder="Ingrese su contraseña" value="<?php echo $row['usuario_binaps']; ?>">
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
                                                    <div class="mb-3">
                                                        <label for="username" class="form-label">Usuario UNO-EE</label>
                                                        <input type="text" class="form-control" name="usuario_unoe" placeholder="Ingrese su usuario" value="<?php echo $row['usuario_unoe']; ?>">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="password" class="form-label">Contraseña</label>
                                                        <input type="text" class="form-control" name="password_unoe" placeholder="Ingrese su contraseña" value="<?php echo $row['usuario_unoe']; ?>">
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
                </div>
            </form>
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
                                        <input type="text" class="form-control" name="documento" disabled onkeyup="javascript:this.value=this.value.toUpperCase();" value="<?php echo $row['documento']; ?>">
                                    </div>
                                </div>

                                <div class="col-3" style="display: none;">
                                    <div class="form-group">
                                        <label for="file" class="form-label">Primer Apellido</label>
                                        <input type="text" class="form-control" disabled value="<?php echo $row['primer_apellido']; ?>">
                                    </div>
                                </div>
                                <div class="col-3" style="display: none;">
                                    <div class="form-group">
                                        <label for="file" class="form-label">Segundo Apellido</label>
                                        <input type="text" class="form-control" disabled value="<?php echo $row['segundo_apellido']; ?>">
                                    </div>
                                </div>
                                <div class="col-3" style="display: none;">
                                    <div class="form-group">
                                        <label for="file" class="form-label">Primer Nombre</label>
                                        <input type="text" class="form-control" disabled value="<?php echo $row['primer_nombre']; ?>">
                                    </div>
                                </div>
                                <div class="col-3" style="display: none;">
                                    <div class="form-group">
                                        <label for="file" class="form-label">Segundo Apellido</label>
                                        <input type="text" class="form-control" disabled value="<?php echo $row['segundo_nombre']; ?>">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="file" class="form-label">Nombres</label>
                                        <input type="text" class="form-control" name="nombre_completo" disabled value="<?php echo  $row['primer_nombre'] . ' ' . $row['segundo_nombre']; ?>">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="file" class="form-label">Apellidos</label>
                                        <input type="text" class="form-control" name="nombre_completo" disabled value="<?php echo $row['primer_apellido'] . ' ' . $row['segundo_apellido']; ?>">
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
                                        <input type="text" class="form-control" name="fecha_ingreso" placeholder="Fecha de Ingreso" disabled value="<?php echo $row['fecha_ingreso']; ?>">
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
                                            // Consulta SQL para obtener los datos relacionados
                                            $sql_relacion_servicios = "SELECT up.id_personal, sp.id_servicios, s.servicios
                                            FROM usuarioxpersonal up
                                            LEFT JOIN serviciosxpersonal sp ON up.id_personal = sp.id_personal
                                            LEFT JOIN servicios s ON sp.id_servicios = s.id_servicios
                                            WHERE up.id_personal = ?";
                                            $stmt_relacion_servicios = $conexion->prepare($sql_relacion_servicios);
                                            $stmt_relacion_servicios->execute([$id_personal]);
                                            $relacion_servicios = $stmt_relacion_servicios->fetchAll(PDO::FETCH_ASSOC);

                                            // Mostrar los resultados
                                            foreach ($relacion_servicios as $row1) {
                                                echo "<tr><td>{$row1['servicios']}</td></tr>";
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

        </div>
    </div>
</div>