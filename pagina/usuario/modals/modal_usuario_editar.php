<div class="modal fade" id="moactualizarc<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="moactualizarc" aria-hidden="true" data-backdrop="static">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="moactivo">EDITAR DATOS DEL CLIENTE</h5>
      </div>
      <div class="modal-body">
        <form method="post" action="usuario_actualizar.php?id=<?php echo $row['id']; ?>" enctype='multipart/form-data'>
          <div class="row">
            <div class="col-6">
              <div class="form-group">
                <input type="file" class="form-control" id="imagen" name="imagen">
              </div>
            </div>
            <div class="col-6">
              <div class="form-group">
                <img src="subir_us/<?php echo $row['imagen']; ?>" width="90">
              </div>
            </div>
            <div class="col-6">
              <label for="file" class="form-label">Nombre</label>
              <input type="text-transform:uppercase;" class="form-control" id="nombre_usu" name="nombre_usu" value="<?php echo $row['nombre_usu']; ?>" onkeyup="javascript:this.value=this.value.toUpperCase();">
            </div>
            <div class="col-6">
              <label for="file" class="form-label">Apellido</label>
              <input type="text-transform:uppercase;" class="form-control" id="apellido" name="apellido_usu" value="<?php echo $row['apellido_usu']; ?>" onkeyup="javascript:this.value=this.value.toUpperCase();">
            </div>
            <div class="col-6">
              <label for="file" class="form-label">Usuario</label>
              <input type="text-transform:uppercase;" class="form-control" id="usuario" name="usuario" value="<?php echo $row['usuario']; ?>" onkeyup="javascript:this.value=this.value.toUpperCase();">
            </div>

            <div class="col-6">
              <label for="file" class="form-label">Tipo de usuario</label>
              <div class="form-group">
                <select class="form-control select2" name="tipo" id="tipo">
                  <option value="administrador" <?php if ($row['tipo'] == "administrador") {
                                                  echo "selected";
                                                } ?>>administrador</option>
                  <option value="gestion" <?php if ($row['tipo'] == "gestion") {
                                            echo "selected";
                                          } ?>>Gestion Humana</option>
                  <option value="solinux" <?php if ($row['tipo'] == "solinux") {
                                            echo "selected";
                                          } ?>>Solinux</option>
                </select>
              </div>
            </div>
            <div class="col-6">
              <label for="file" class="form-label">Correo</label>
              <input type="text-transform:uppercase;" class="form-control" id="correo" name="correo" value="<?php echo $row['correo']; ?>" onkeyup="javascript:this.value=this.value.toUpperCase();">
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-info">Actualizar Usuario</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>