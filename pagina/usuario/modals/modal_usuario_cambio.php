<div class="modal fade" id="moactualizaru<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="moactualizaru" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="moactivo">ACTUALIZACIÓN CONTRASEÑA DEL CLIENTE</h5>
            </div>
            <div class="modal-body">
                <form method="post" action="usuario_actualizar_password.php?id=<?php echo $row['id']; ?>" enctype='multipart/form-data'>
                    <div class="row">
                        <div class="col-4">
                            Contraseña Nueva
                            <div class="form-group">
                                <input type="password" class="form-control" id="date" name="password" required>
                            </div>
                        </div>
                        <div class="col-4">
                            Repetir Contraseña
                            <div class="form-group">
                                <input type="password" class="form-control" id="password2" name="password2" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-info">Actualizar Contraseña</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>