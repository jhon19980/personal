<?php
include('../../dist/includes/dbcon.php');
?>

<div class="modal fade bd-example" id="modalActivar" tabindex="-1" role="dialog" aria-labelledby="modalActivar" data-backdrop="static" aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalActivar">NUMERO DE DOCUMENTO DEL PERSONAL A ACTIVAR</h5>
            </div>

            <div class="modal-body">
                <!-- Formulario de búsqueda -->
                <div class="col-12">
                    <div class="form-group">
                        <label for="cedula" class="form-label">Cédula</label>
                        <input type="text" class="form-control" name="documento" id="documentos" placeholder="Cédula" onkeyup="javascript:this.value=this.value.toUpperCase();">
                    </div>
                </div>
                <div class="">
                    <button type="button" id="btnBuscarActivo" class="btn btn-primary">Buscar</button>
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
                        <tbody id="tablaDatosEmpleados1">
                            <!-- Aquí se mostrarán los datos del empleado después de la búsqueda -->
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-info" id="btnActivar">Activar Usuario</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<!-- SweetAlert2 CDN -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    var id_personal; // Variable para almacenar el id_personal

    $('#btnBuscarActivo').click(function() {
        var documento = $('#documentos').val();

        console.log('Documento a buscar:', documento);

        $.ajax({
            url: 'obtener_datos_activos.php',
            method: 'POST',
            data: {
                documento: documento
            },
            dataType: 'json',
            success: function(responses) {
                console.log('Respuesta del servidor:', responses);

                // Almacena el id_personal en la variable
                id_personal = responses.id_personal;

                $('#tablaDatosEmpleados1').empty();
                $('#tablaDatosEmpleados1').append('<tr data-id="' + id_personal + '"><td>' + responses.tipo_documento + '</td><td>' + responses.documento + '</td><td>' + responses.primer_nombre + '</td><td>' + responses.primer_apellido + '</td></tr>');

                $('#documento').prop('disabled', true);
            },
            error: function(error) {
                console.error('Error al obtener datos del empleado:', error);
            }
        });


        $(document).on('click', '#tablaDatosEmpleado1 tr', function() {
            // Remover la clase de todas las filas
            $('#tablaDatosEmpleado1 tr').removeClass('selected');

            // Agregar la clase solo a la fila clickeada
            $(this).addClass('selected');
        });

        $('#btnActivar').click(function() {
            // Utiliza la variable idPersonalSeleccionado
            console.log('ID de personal a activar:', id_personal);

            $.ajax({
                url: 'activar_estado.php',
                method: 'POST',
                data: {
                    id_personal: id_personal
                },
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        console.log('Usuario activado con éxito');

                        // Mostrar SweetAlert de éxito
                        Swal.fire({
                            icon: 'success',
                            title: 'Usuario Activado',
                            text: 'El usuario ha sido Activado con éxito.'
                        });
                    } else {
                        console.error('Error al inactivar usuario:', response.error);

                        // Mostrar SweetAlert de error
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Hubo un error al activar el usuario. Por favor, inténtalo de nuevo.'
                        });
                    }
                },
            });
        });
    });
</script>