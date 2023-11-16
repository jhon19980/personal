

<div class="modal fade" id="modalCarta" tabindex="-1" role="dialog" aria-labelledby="modalCarta" data-backdrop="static" aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalCargo">CARTA LABORAL</h5>

            </div>
            <form action="enviar_correo.php" method="post" enctype='multipart/form-data'>

                <div class="container">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">REGISTRO DATOS</h3>
                        </div>
                        <div class="container-fluid">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="file" class="form-label"> Cedula</label>
                                            <input type="text" class="form-control" name="documento" placeholder="documento" required>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="file" class="form-label"> Correo</label>
                                            <input type="text" class="form-control" name="correo" placeholder="correo" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-info">Generar Codigo</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </form>
        </div>
        <div class="modal-content">
            <form action="generar_pdf.php" method="post" enctype='multipart/form-data'>
                <div class="modal-header">
                    <h5 class="modal-title" id="modalpdf">GENERAR PDF</h5>
                </div>
                <div class="container">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">INGRESAR CODIGO</h3>
                        </div>
                        <div class="container-fluid">
                            <div class="modal-body">
                            <div id="mensaje-container"></div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="codigo">Ingrese el código:</label>
                                            <input type="text" class="form-control" id="codigo" name="codigo" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info" onclick="verificarCodigo()">Verificar Código</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" id="generar-pdf-btn" class="btn btn-info" disabled>Generar PDF</button>
                </div>
               
            </form>
        </div>
    </div>
</div>

<script>
    function verificarCodigo() {
        var codigoIngresado = document.getElementById('codigo').value;

        // Enviar el código al servidor usando AJAX con el método POST
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4) {
                if (xhr.status === 200) {
                    // Manejar la respuesta del servidor
                    var response = JSON.parse(xhr.responseText);
                    if (response.success) {
                        // Éxito: permitir la generación del PDF
                        document.getElementById('mensaje-container').innerHTML = '<div class="alert alert-success" role="alert">Código válido. Puede generar el PDF ahora.</div>';
                        // Habilitar el botón de generación de PDF
                        document.getElementById('generar-pdf-btn').disabled = false;
                    } else {
                        // Mostrar mensaje de error
                        document.getElementById('mensaje-container').innerHTML = '<div class="alert alert-danger" role="alert">' + response.message + '</div>';
                    }
                } else {
                    console.error('Error en la solicitud AJAX');
                }
            }
        };
        xhr.open('POST', 'verificar_codigo.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.send('codigo=' + encodeURIComponent(codigoIngresado));
    }
</script>
