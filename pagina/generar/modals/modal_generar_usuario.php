<div class="modal fade bd-example-modal-xl" id="perusuario<?php echo $row['id_usuario_personal']; ?>" tabindex="-1" role="dialog" aria-labelledby="perusuario"  aria-hidden="true">
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
                                    if ($tipo == "administrador" or $tipo == "solinux" or $tipo == "gestion") {

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

        </div>
    </div>
</div>