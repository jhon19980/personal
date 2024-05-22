<?php
include('../../dist/includes/dbcon.php');

?>


<div class="modal fade bd-example-modal-xl" id="modalIngresoPersonal" tabindex="-1" role="dialog" aria-labelledby="modalIngresoPersonal" data-backdrop="static" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalIngresoPersonal">INSPECCION USO ADECUADO DE ELEMENTOS DE PROTECCION PERSONAL</h5>

            </div>
            <form id="miFormulario" action="gestion_add.php" method="post" enctype='multipart/form-data'>
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
                                            <select class="form-control" name="area" required>
                                                <?php
                                                // Consulta SQL para obtener los IDs de las áreas
                                                $areas_query = $conexion->prepare("SELECT departamento FROM departamento");
                                                $areas_query->execute();
                                                $areas = $areas_query->fetchAll(PDO::FETCH_ASSOC);

                                                // Imprimir opciones del select
                                                foreach ($areas as $area) {
                                                    $selected = ($modo_edicion && $datos_usuario['area'] == $area['area']) ? 'selected' : '';
                                                    echo "<option value='{$area['departamento']}' $selected>{$area['departamento']}</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="departamento" class="form-label">Responsable</label>
                                            <select class="form-control" name="responsable" required>
                                                <?php
                                                // Consulta SQL para obtener los nombres de los responsables
                                                $responsables_query = $conexion->prepare("SELECT nombres FROM gestion_personal");
                                                $responsables_query->execute();
                                                $responsables = $responsables_query->fetchAll(PDO::FETCH_ASSOC);

                                                // Imprimir opciones del select
                                                foreach ($responsables as $responsable) {
                                                    $nombre_completo = $responsable['nombres'];
                                                    $selected = ($modo_edicion && $datos_usuario['area'] == $nombre_completo) ? 'selected' : '';
                                                    echo "<option value='{$nombre_completo}' $selected>{$nombre_completo}</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <label for="file" class="form-label"> Sede
                                        </label>
                                        <select id="tipo_service" name="sede" class="form-control select2" value="">
                                            <option value="Principal">Principal</option>
                                            <option value="SanMarcos">San Marcos</option>
                                        </select>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="file" class="form-label"> Cargo</label>
                                            <select class="form-control" name="cargo_res">
                                                <option value="AUXILIAR DE ENFERMERIA">AUXILIAR DE ENFERMERIA</option>
                                                <option value="AUXILIAR DE SERVICIOS GENERALES">AUXILIAR DE SERVICIOS GENERALES</option>
                                                <option value="ASISTENTE AUDITORIA">ASISTENTE AUDITORIA</option>
                                                <option value="COORDINADOR HOSPITALI. DOMICILIARIA">COORDINADOR HOSPITALI. DOMICILIARIA</option>
                                                <option value="LIQUIDADOR(A) HOSPITALARIO">LIQUIDADOR(A) HOSPITALARIO</option>
                                                <option value="ANALISTA DE INFORMACION">ANALISTA DE INFORMACION</option>
                                                <option value="COORDINADORA DE COSTOS">COORDINADORA DE COSTOS</option>
                                                <option value="COORDINADOR(A) ADMINISTRATIVO">COORDINADOR(A) ADMINISTRATIVO</option>
                                                <option value="AUXILIAR DE SISTEMAS">AUXILIAR DE SISTEMAS</option>
                                                <option value="JEFE COORDINADOR URGENCIAS">JEFE COORDINADOR URGENCIAS</option>
                                                <option value="AUXILIAR DE FACTURACION">AUXILIAR DE FACTURACION</option>
                                                <option value="DIRECTORA DE BIENESTRA HOSPITALARIO">DIRECTORA DE BIENESTRA HOSPITALARIO</option>
                                                <option value="AUXILIAR DE ALMACEN">AUXILIAR DE ALMACEN</option>
                                                <option value="AUXILIAR DE ARCHIVO">AUXILIAR DE ARCHIVO</option>
                                                <option value="JEFE DE MANTENIMIENTO">JEFE DE MANTENIMIENTO</option>
                                                <option value="COORD.SEGUR Y SALUD EN EL TRABAJO">COORD.SEGUR Y SALUD EN EL TRABAJO</option>
                                                <option value="ASESORA DE ARL">ASESORA DE ARL</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12 text-center">
                                        <div class="form-group">
                                            <p>ESTADO: <strong> B:</strong> BUEN ESTADO, <strong> M:</strong> MAL ESTADO, <strong>NT:</strong> NO TIENE, <strong>NU:</strong> NO USA</p>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="table-responsive">
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
                                                        <td><input type="text" class="form-control" name="nombre_cola" onkeyup="javascript:this.value=this.value.toUpperCase();"></td>
                                                        <td><input type="text" class="form-control" name="cedula"></td>
                                                        <td><input type="date" class="form-control" name="fecha"></td>
                                                        <td>

                                                            <div class="form-group">
                                                                <select class="form-control" name="cargo_cola" id="cargo" required>
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
                                    </div>
                                    <div class="col-12 text-center">
                                        <div class="form-group">
                                            <p> USO Y ESTADO DE EPI</p>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="table-responsive">
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
                                                                <option value="B">BUENO</option>
                                                                <option value="M">MALO</option>
                                                                <option value="NT">NO TIENE</option>
                                                                <option value="NU">NO USA</option>
                                                            </select></td>
                                                        <td><select name="careta" class="form-control select2" value="">
                                                                <option value="B">BUENO</option>
                                                                <option value="M">MALO</option>
                                                                <option value="NT">NO TIENE</option>
                                                                <option value="NU">NO USA</option>
                                                            </select></td>
                                                        <td><select name="mascarilla" class="form-control select2" value="">
                                                                <option value="B">BUENO</option>
                                                                <option value="M">MALO</option>
                                                                <option value="NT">NO TIENE</option>
                                                                <option value="NU">NO USA</option>
                                                            </select></td>
                                                        <td><select name="respirador" class="form-control select2" value="">
                                                                <option value="B">BUENO</option>
                                                                <option value="M">MALO</option>
                                                                <option value="NT">NO TIENE</option>
                                                                <option value="NU">NO USA</option>
                                                            </select></td>
                                                        <td><select name="guantes" class="form-control select2" value="">
                                                                <option value="B">BUENO</option>
                                                                <option value="M">MALO</option>
                                                                <option value="NT">NO TIENE</option>
                                                                <option value="NU">NO USA</option>
                                                            </select></td>
                                                        <td><select name="bata_anti" class="form-control select2" value="">
                                                                <option value="B">BUENO</option>
                                                                <option value="M">MALO</option>
                                                                <option value="NT">NO TIENE</option>
                                                                <option value="NU">NO USA</option>
                                                            </select></td>
                                                        <td><select name="pijama" class="form-control select2" value="">
                                                                <option value="B">BUENO</option>
                                                                <option value="M">MALO</option>
                                                                <option value="NT">NO TIENE</option>
                                                                <option value="NU">NO USA</option>
                                                            </select></td>
                                                        <td><select name="bata_tela" class="form-control select2" value="">
                                                                <option value="B">BUENO</option>
                                                                <option value="M">MALO</option>
                                                                <option value="NT">NO TIENE</option>
                                                                <option value="NU">NO USA</option>
                                                            </select></td>
                                                        <td><select name="zapatos" class="form-control select2" value="">
                                                                <option value="B">BUENO</option>
                                                                <option value="M">MALO</option>
                                                                <option value="NT">NO TIENE</option>
                                                                <option value="NU">NO USA</option>
                                                            </select></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <label for="file" class="form-label">Observacion</label>
                                        <textarea type="text" class="form-control pull-right" name="observacion" placeholder="Observaciones" required aria-label="With textarea"></textarea>
                                    </div>
                                    <div class="col-xl-6 col-sm-12">
                                        <div class="card-body">
                                            <label>Firma del Usuario:</label>
                                            <div id="signatureContainer">
                                                <canvas id="signatureCanvas" width="1000" height="200"></canvas>
                                            </div>
                                            <input type="hidden" name="firma_usuario" id="firmaInput">
                                            <!-- Agrega un elemento img para mostrar la firma -->
                                            <img id="firmaPreview" alt="Firma del Usuario" style="display: none;">
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
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/signature_pad/1.5.3/signature_pad.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/signature_pad@4.0.0/dist/signature_pad.umd.min.js"></script>

<script>
    var signaturePad = new SignaturePad(document.getElementById('signatureCanvas'));
    var firmaInput = document.getElementById('firmaInput');
    var firmaPreview = document.getElementById('firmaPreview');

    // Función para actualizar la firma
    function actualizarFirma() {
        var firmaBase64 = signaturePad.toDataURL('image/png');
        // Actualizar el campo oculto
        firmaInput.value = firmaBase64;
        // Mostrar la firma en el elemento img
        firmaPreview.src = firmaBase64;
        firmaPreview.style.display = 'inline';
    }

    // Evento de envío del formulario
    document.getElementById('miFormulario').addEventListener('submit', function() {
        // Actualizar la firma antes de enviar el formulario
        actualizarFirma();
        // Puedes agregar lógica adicional aquí si es necesario
    });
</script>