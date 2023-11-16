<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clinica Versalles</title>

    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="assets/css/estilos.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <main>
        <div class="contenedor__todo">
            <div class="caja__trasera">
                <div class="caja__trasera-login">
                    <h3>¿Quieres Iniciar Sesion?</h3>
                    <p>Inicia sesión para entrar en la página</p>
                    <button id="btn__iniciar-sesion">Iniciar Sesión</button>
                </div>
                <div class="caja__trasera-register">
                    <h3>¿Requieres tu carta laboral?</h3>
                    <p>Ingresa aca para mas información</p>
                    <button id="btn__registrarse">Carta Laboral</button>
                </div>
            </div>

            <!--Formulario de Login y registro-->
            <div class="contenedor__login-register">

                <?php
                // Después de que el usuario inicia sesión con éxito
                $_SESSION['usuario_autenticado'] = true;
                session_start();
                if (isset($_SESSION['ms'])) {
                    $respuesta = $_SESSION['ms'];
                    unset($_SESSION['ms']); // Limpia el mensaje de la sesión después de mostrarlo
                ?>
                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            const Toast = Swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 4000,
                                timerProgressBar: true,
                                didOpen: (toast) => {
                                    // Verifica si toast es un objeto antes de agregar eventos
                                    if (toast && typeof toast === 'object') {
                                        toast.addEventListener('mouseenter', Swal.stopTimer)
                                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                                    }
                                }
                            });

                            Toast.fire({
                                icon: 'success',
                                title: '<?php echo $respuesta; ?>'
                            });
                        });
                    </script>
                <?php
                }
                ?>


                <form action="login.php" method="post" class="formulario__login">
                    <center>
                        <img src="images/logo_clinica.png" class="img-fluid mx-auto d-block mb-4" alt="Logo Clinica" style="max-width: 200px;" />
                    </center>

                    <h2>Iniciar Sesión</h2>
                    <input type="text" class="form-control" placeholder="Usuario" name="username" required="required" />
                    <input type="password" class="form-control" placeholder="Password" name="password" required="required" />
                    <button type="submit" name="login">Login</button>
                </form>

                <!--Register-->
                <form id="myForm" class="formulario__register" method="post" enctype='multipart/form-data' onsubmit="return enviarCodigo()">
                    <div id="mensaje-container"></div>
                    <h2>Ingresa Cedula </h2>
                    <h8>Debes ingresar la <strong>cedula</strong>, Cuando te llegue el <strong>codigo</strong>,
                        Debes de colocar de nuevo la cedula y el codigo y darle en <strong>verificar</strong>.</h8>
                    <input type="text" class="form-control" name="documento" placeholder="Cedula" required>
                    <input type="hidden" class="form-control" name="correo" id="correo" placeholder="Correo Electronico" required>

                    <button type="button" class="btn btn-info" onclick="enviarCodigo()">Enviar Codigo</button>
                    <input type="text" class="form-control" id="codigo" name="codigo" placeholder="Codigo" required>

                    <div class="col-3 d-inline-flex justify-content-between">
                        <button type="button" class="btn btn-info" onclick="verificarCodigo()">Verificar</button>

                        <button type="button" id="generar-pdf-btn" onclick="GenerarPDF()" class="btn btn-info" disabled>Generar</button>
                    </div>
                </form>
            </div>
        </div>

    </main>

    <script src="assets/js/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>



<script>
    function enviarCodigo() {
        // Obtener el valor del número de cédula
        var cedula = document.getElementsByName("documento")[0].value;

        // Obtener el elemento de correo
        var correoElement = document.getElementById("correo");

        // Enviar el número de cédula al servidor usando AJAX con el método POST
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4) {
                if (xhr.status === 200) {
                    // Manejar la respuesta del servidor
                    var response = JSON.parse(xhr.responseText);
                    if (response.success) {
                        // Éxito: Mostrar el correo relacionado
                        correoElement.value = response.correo;

                        // Configura la acción del formulario para generar PDF
                        document.getElementById("myForm").action = "enviar_correo.php";

                        // Envía el formulario utilizando JavaScript
                        document.getElementById("myForm").submit();
                    } else {
                        // Mostrar mensaje de error si es necesario
                        console.error(response.message);
                    }
                } else {
                    console.error('Error en la solicitud AJAX');
                }
            }
        };

        // Configurar la solicitud AJAX
        xhr.open('POST', 'obtener_correo.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.send('documento=' + encodeURIComponent(cedula));

        // Evitar la recarga por defecto
        return false;
    }


    function GenerarPDF() {
        var codigoIngresado = document.getElementById('codigo').value;
        var documentoIngresado = document.getElementsByName("documento")[0].value;

        // Enviar el código y el número de documento al servidor usando AJAX con el método POST
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4) {
                if (xhr.status === 200) {
                    // Manejar la respuesta del servidor
                    var response = JSON.parse(xhr.responseText);
                    if (response.success) {
                        // Éxito: permitir la generación del PDF
                        document.getElementById("myForm").action = "generar_pdf.php";
                        // Envía el formulario
                        document.getElementById("myForm").submit();
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
        xhr.send('codigo=' + encodeURIComponent(codigoIngresado) + '&documento=' + encodeURIComponent(documentoIngresado));
    }


    function verificarCodigo() {
        var codigoIngresado = document.getElementById('codigo').value;
        var documentoIngresado = document.getElementsByName("documento")[0].value;

        // Enviar el código y el número de documento al servidor usando AJAX con el método POST
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4) {
                if (xhr.status === 200) {
                    // Manejar la respuesta del servidor
                    var response = JSON.parse(xhr.responseText);
                    if (response.success) {
                        // Éxito: permitir la generación del PDF
                        document.getElementById('mensaje-container').innerHTML = '<div class="alert alert-success" role="alert">Código y documento válidos. Puede generar el PDF ahora.</div>';
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
        xhr.send('codigo=' + encodeURIComponent(codigoIngresado) + '&documento=' + encodeURIComponent(documentoIngresado));
    }
</script>



</html>