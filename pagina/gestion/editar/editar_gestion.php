<div class="modal fade bd-example-modal-xl" id="modalEditarGestion<?php echo $row['id_gestion']; ?>" tabindex="-1" role="dialog" aria-labelledby="modalEditarGestion" data-backdrop="static" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEditarPersonal">INGRESAR DATOS DEL PERSONAL</h5>

            </div>

            <form method="post" enctype='multipart/form-data'>
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
                                            <label for="departamento" class="form-label">Departamento</label>
                                            <select class="form-control" name="area" disabled>
                                                <option><?php echo $row['area']; ?></option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="departamento" class="form-label">Responsable</label>
                                            <select class="form-control" name="responsable" disabled>
                                                <option><?php echo $row['responsable']; ?></option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <label for="file" class="form-label"> Sede
                                        </label>
                                        <select id="tipo_service" name="sede" class="form-control select2" value="" disabled>
                                            <option><?php echo $row['sede']; ?></option>
                                            <option value="Principal">Principal</option>
                                            <option value="SanMarcos">San Marcos</option>
                                        </select>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="file" class="form-label"> Cargo</label>
                                            <select class="form-control" name="cargo_res" disabled>
                                                <option><?php echo $row['cargo_res']; ?></option>
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
                                    <div class="col-12 text-center">
                                        <div class="form-group">
                                            <p>ESTADO: <strong> B:</strong> BUEN ESTADO, <strong> M:</strong> MAL ESTADO, <strong>NT:</strong> NO TIENE, <strong>NU:</strong> NO USA</p>
                                        </div>
                                    </div>

                                    <div class="col-12" style="display: flex;">
                                        <table class="table table-bordered table-striped">
                                            <thead>
                                                <tr class="btn-dark">
                                                    <th>NOMBRE DEL COLABORADOR</th>
                                                    <th>CEDULA</th>
                                                    <th>FECHA</th>
                                                    <th>CARGO</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><input type="text" class="form-control" name="nombre_cola" value="<?php echo $row['nombre_cola']; ?>" onkeyup="javascript:this.value=this.value.toUpperCase();"></td>
                                                    <td><input type="number" class="form-control" name="cedula" value="<?php echo $row['cedula']; ?>"></td>
                                                    <td><input type="date" class="form-control" name="fecha" value="<?php echo $row['fecha']; ?>"></td>
                                                    <td>

                                                        <div class="form-group">
                                                            <select class="form-control" name="cargo_cola" required>
                                                                <option><?php echo $row['cargo_cola']; ?></option>
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

                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-12 text-center">
                                        <div class="form-group">
                                            <p> USO Y ESTADO DE EPI</p>
                                        </div>
                                    </div>
                                    <div class="col-12" style="display: flex;">
                                        <table class="table table-bordered table-striped">
                                            <thead>
                                                <tr class="btn-dark">
                                                    <th>GAFAS</th>
                                                    <th>CARETA</th>
                                                    <th>MASCARILLA QX</th>
                                                    <th>RESPIRADOR N95</th>
                                                    <th>GUANTES</th>
                                                    <th>BATA ANTIFLUIDO</th>
                                                    <th>PIJAMA DE MAYO</th>
                                                    <th>BATA DE TELA QX</th>
                                                    <th>ZAPATOS</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td> <select name="gafas" class="form-control select2" value="">
                                                            <option><?php echo $row['gafas']; ?></option>
                                                            <option value="B">BUENO</option>
                                                            <option value="M">MALO</option>
                                                            <option value="NT">NO TIENE</option>
                                                            <option value="NU">NO USA</option>
                                                        </select></td>
                                                    <td><select name="careta" class="form-control select2" value="">
                                                            <option><?php echo $row['careta']; ?></option>
                                                            <option value="B">BUENO</option>
                                                            <option value="M">MALO</option>
                                                            <option value="NT">NO TIENE</option>
                                                            <option value="NU">NO USA</option>
                                                        </select></td>
                                                    <td><select name="mascarilla" class="form-control select2" value="">
                                                            <option><?php echo $row['mascarilla']; ?></option>
                                                            <option value="B">BUENO</option>
                                                            <option value="M">MALO</option>
                                                            <option value="NT">NO TIENE</option>
                                                            <option value="NU">NO USA</option>
                                                        </select></td>
                                                    <td><select name="respirador" class="form-control select2" value="">
                                                            <option><?php echo $row['respirador']; ?></option>
                                                            <option value="B">BUENO</option>
                                                            <option value="M">MALO</option>
                                                            <option value="NT">NO TIENE</option>
                                                            <option value="NU">NO USA</option>
                                                        </select></td>
                                                    <td><select name="guantes" class="form-control select2" value="">
                                                            <option><?php echo $row['guantes']; ?></option>
                                                            <option value="B">BUENO</option>
                                                            <option value="M">MALO</option>
                                                            <option value="NT">NO TIENE</option>
                                                            <option value="NU">NO USA</option>
                                                        </select></td>
                                                    <td><select name="bata_anti" class="form-control select2" value="">
                                                            <option><?php echo $row['bata_anti']; ?></option>
                                                            <option value="B">BUENO</option>
                                                            <option value="M">MALO</option>
                                                            <option value="NT">NO TIENE</option>
                                                            <option value="NU">NO USA</option>
                                                        </select></td>
                                                    <td><select name="pijama" class="form-control select2" value="">
                                                            <option><?php echo $row['pijama']; ?></option>
                                                            <option value="B">BUENO</option>
                                                            <option value="M">MALO</option>
                                                            <option value="NT">NO TIENE</option>
                                                            <option value="NU">NO USA</option>
                                                        </select></td>
                                                    <td><select name="bata_tela" class="form-control select2" value="">
                                                            <option><?php echo $row['bata_tela']; ?></option>
                                                            <option value="B">BUENO</option>
                                                            <option value="M">MALO</option>
                                                            <option value="NT">NO TIENE</option>
                                                            <option value="NU">NO USA</option>
                                                        </select></td>
                                                    <td><select name="zapatos" class="form-control select2" value="">
                                                            <option><?php echo $row['zapatos']; ?></option>
                                                            <option value="B">BUENO</option>
                                                            <option value="M">MALO</option>
                                                            <option value="NT">NO TIENE</option>
                                                            <option value="NU">NO USA</option>
                                                        </select></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-12">
                                        <label for="file" class="form-label">Observacion</label>
                                        <textarea type="text" class="form-control pull-right" name="observacion" placeholder="Observaciones" required aria-label="With textarea"><?php echo  $row['observacion']; ?></textarea>
                                    </div>
                                    <div class="col-xl-6 col-sm-12">
                                        <div class="card-body">
                                            <label>Firma del Usuario:</label>
                                            <!-- Elimina el campo oculto -->
                                            <img id="firmaPreview" name="firma_usuario" src="<?php echo $row['firma_usuario']; ?>" alt="Firma del Usuario">

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-info">Guardar Usuario</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
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