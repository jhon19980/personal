<?php
include('../../dist/includes/dbcon.php');
?>

<div class="modal fade bd-example" id="modalInactivar" tabindex="-1" role="dialog" aria-labelledby="modalInactivar" data-backdrop="static" aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalInactivar">NUMERO DE DOCUMENTO DEL PERSONAL A INACTIVAR</h5>
            </div>
            <form id="formInactivar" method="post" enctype='multipart/form-data'>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="cedula" class="form-label">Cédula</label>
                        <input type="text" class="form-control" name="documento" id="documento" placeholder="Cédula" onkeyup="javascript:this.value=this.value.toUpperCase();">
                    </div>
                    <div class="mb-3">
                        <button type="button" id="btnBuscar" class="btn btn-primary" onclick="mostrarCheckboxes()">Buscar</button>
                    </div>

                    <!-- Chekboxes de finalización y temporal -->
                    <div id="checkboxesContainer" style="display: none;">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Terminación de Contrato / Temporal</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group clearfix">
                                            <div class="icheck-primary d-inline">
                                                <input type="radio" id="checkboxFinalizacion" name="termino" value="Finalizacion">
                                                <label for="checkboxFinalizacion">
                                                    Finalización
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group clearfix">
                                            <div class="icheck-primary d-inline">
                                                <input type="radio" id="checkboxTemporal" name="termino" value="Temporal" onclick="mostrarOtraInformacion()">
                                                <label for="checkboxTemporal">
                                                    Temporal
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Contenedor para checkboxes adicionales al seleccionar "Temporal" -->
                                <div id="otraInformacionContainer" style="display: none;">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group clearfix">
                                                <div class="icheck-primary d-inline">
                                                    <input type="radio" id="checkboxLicencia" name="condicion" value="Licencia Maternidad">
                                                    <label for="checkboxLicencia">
                                                        Licencia Maternidad
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group clearfix">
                                                <div class="icheck-primary d-inline">
                                                    <input type="radio" id="checkboxVacaciones" name="condicion" value="Vacaciones">
                                                    <label for="checkboxVacaciones">
                                                        Vacaciones
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



                    <!-- Tabla para mostrar datos del empleado -->
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Tipo Documento</th>
                                    <th>Número Documento</th>
                                    <th>Primer Nombre</th>
                                    <th>Primer Apellido</th>

                                    <!-- Agrega más columnas según la información que desees mostrar -->
                                </tr>
                            </thead>
                            <tbody id="tablaDatosEmpleado">
                                <!-- Aquí se mostrarán los datos del empleado después de la búsqueda -->
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-info" id="btnInactivar">Inactivar Usuario</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<!-- SweetAlert2 CDN -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    var id_personal; // Variable para almacenar el id_personal

    $('#btnBuscar').click(function() {
        var documento = $('#documento').val();

        console.log('Documento a buscar:', documento);

        $.ajax({
            url: 'obtener_datos_empleado.php',
            method: 'POST',
            data: {
                documento: documento
            },
            dataType: 'json',
            success: function(response) {
                console.log('Respuesta del servidor:', response);

                // Almacena el id_personal y documento en la variable global
                id_personal = response.id_personal;
                documento = response.documento;

                $('#tablaDatosEmpleado').empty();
                $('#tablaDatosEmpleado').append('<tr data-id="' + id_personal + '"><td>' + response.tipo_documento + '</td><td>' + response.documento + '</td><td>' + response.primer_nombre + '</td><td>' + response.primer_apellido + '</td></tr>');

                $('#documento').prop('disabled', true);
            },
            error: function(error) {
                console.error('Error al obtener datos del empleado:', error);
            }
        });


        $(document).on('click', '#tablaDatosEmpleado tr', function() {
            // Remover la clase de todas las filas
            $('#tablaDatosEmpleado tr').removeClass('selected');

            // Agregar la clase solo a la fila clickeada
            $(this).addClass('selected');
        });

        // Evento submit para el formulario
        $('#formInactivar').submit(function(event) {
            event.preventDefault(); // Evitar el envío normal del formulario

            // Verificar que el documento esté definido
            if (!id_personal) {
                console.error('Error: El campo "documento" no está definido.');
                return;
            }

            // Obtener los valores del formulario
            var termino = $('input[name="termino"]:checked').val();
            var condicion = $('input[name="condicion"]:checked').val();
            var documento = $('#documento').val(); // Agrega esta línea para obtener el valor del campo "documento"
            console.log('Documento:', documento);
            console.log('Termino seleccionado:', termino);
            console.log('Condicion seleccionada:', condicion);

            // Agrega la línea de console.log para imprimir los datos antes de la solicitud AJAX
            console.log('Enviando datos:', {
                id_personal: id_personal,
                documento: documento,
                termino: termino,
                condicion: condicion
            });


            // Realizar la solicitud de inactivación
            $.ajax({
                url: 'inactivar_estado.php',
                method: 'POST',
                data: {
                    id_personal: id_personal,
                    documento: documento, // Incluye el documento en la segunda solicitud
                    termino: termino,
                    condicion: condicion

                },
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        console.log('Usuario inactivado con éxito');

                        // Mostrar SweetAlert de éxito
                        Swal.fire({
                            icon: 'success',
                            title: 'Usuario inactivado',
                            text: 'El usuario ha sido inactivado con éxito.'
                        }).then((result) => {
                            console.log('SweetAlert cerrado con:', result);
                            // Redirigir a activar.php después de hacer clic en "Aceptar"
                            if (result.isConfirmed || result.isDismissed) {
                                window.location.href = 'inactivar.php';
                            }
                        });

                    } else {
                        console.error('Error al inactivar usuario:', response.error);

                        // Mostrar SweetAlert de error
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Hubo un error al inactivar el usuario. Por favor, inténtalo de nuevo.'
                        });
                    }
                },
                error: function(error) {
                    console.error('Error al realizar la solicitud de inactivación:', error);
                }
            });
        });
    });
</script>

<script>
    function mostrarCheckboxes() {
        var checkboxesContainer = document.getElementById('checkboxesContainer');
        checkboxesContainer.style.display = 'block';
    }

    function mostrarOtraInformacion() {
        var otraInformacionContainer = document.getElementById('otraInformacionContainer');
        var checkboxTemporal = document.getElementById('checkboxTemporal');

        if (checkboxTemporal.checked) {
            otraInformacionContainer.style.display = 'block';
        } else {
            otraInformacionContainer.style.display = 'none';
        }
    }
    $('#checkboxFinalizacion').click(function() {
        $('input[name="finalizacion"]').prop('checked', true);
        $('input[name="temporal"]').prop('checked', false); // Reinicia el valor de temporal
    });

    $('#checkboxTemporal').click(function() {
        $('input[name="temporal"]').prop('checked', true);
        $('input[name="finalizacion"]').prop('checked', false); // Reinicia el valor de finalizacion
    });

    $('#checkboxLicencia').click(function() {
        $('input[name="licencia"]').prop('checked', true);
        $('input[name="vacaciones"]').prop('checked', false); // Reinicia el valor de vacaciones
    });

    $('#checkboxVacaciones').click(function() {
        $('input[name="vacaciones"]').prop('checked', true);
        $('input[name="licencia"]').prop('checked', false); // Reinicia el valor de licencia
    });
</script>