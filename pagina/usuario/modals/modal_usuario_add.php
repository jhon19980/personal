<div class="modal fade" id="modalIngreso" tabindex="-1" role="dialog" aria-labelledby="modalIngreso" data-backdrop="static" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalIngreso">INGRESAR DATOS DEL CLIENTE</h5>

            </div>
            <form action="usuario_add.php" method="post" enctype='multipart/form-data'>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="file" class="form-label"> Imagen</label>
                                <input type="file" class="form-control" id="imagen" name="imagen">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="file" class="form-label">Usuario</label>
                                <input type="text" class="form-control" name="usuario">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="file" class="form-label">Nombre Usuario</label>
                                <input type="text" class="form-control" name="nombre_usu">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="file" class="form-label"> Apellido Usuario</label>
                                <input type="text" class="form-control" id="apellido_usu" name="apellido_usu">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="file" class="form-label"> Contraseña</label>
                                <input type="password" class="form-control pull-right" name="password" placeholder="Contraseña" required>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="file" class="form-label"> Confirmar Contraseña</label>
                                <input type="password" class="form-control pull-right" id="password2" name="password2" placeholder=" Confirmar Contraseña " required>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="file" class="form-label"> Tipo Usuario</label>
                                <select class="form-control select2" name="tipo" required>
                                    <option value="administrador">Administrador</option>
                                    <option value="gestion">Gestion Humana</option>
                                    <option value="solinux">Solinux</option>
                                    <option value="binaps">Binaps</option>
                                    <option value="moodle">Moodle</option>
                                    <option value="appscv">Appscv</option>
                                    <option value="scse">Scse</option>
                                    <option value="sst">Sst</option>

                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="file" class="form-label"> Correo</label>
                                <input type="text" class="form-control" name="correo">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-info">Guardar Usuario</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>