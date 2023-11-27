<!DOCTYPE html>

<head>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    include('dbcon.php');

    // Define el límite de tiempo de sesión en segundos (por ejemplo, 30 minutos)
    $session_timeout = 1900; // 30 minutos en segundos
    
    // Verifica si la sesión ha expirado
    if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity']) > $session_timeout) {
        // La sesión ha expirado, redirige al usuario a la página de inicio de sesión
        session_unset();
        session_destroy();

        // Muestra un mensaje de alerta
        echo '<script>
        Swal.fire({
            icon: "warning",
            title: "Sesión Expirada",
            text: "Tu sesión ha expirado. Por favor, inicia sesión nuevamente.",
            showConfirmButton: false,
        });

        setTimeout(function() {
            window.location = "../../index.php";
        }, 2000);  // 9000 milisegundos = 9 segundos
    </script>';
        exit();
    }

    // Actualiza el tiempo de última actividad en la sesión
    
    $_SESSION['last_activity'] = time();

 // Obtener los datos del usuario y de la empresa
$session_id = $_SESSION['id'];

// Consulta para obtener datos del usuario
$user_query = $conexion->prepare("SELECT * FROM usuario WHERE id = :session_id");
$user_query->bindParam(':session_id', $session_id);
$user_query->execute();
$user_row = $user_query->fetch(PDO::FETCH_ASSOC);

$user_username = $user_row['usuario'];
$nombre = $user_row['usuario'];
$imagen = $user_row['imagen'];
$tipo = $user_row['tipo'];

// Consulta para obtener datos de la empresa
$empresa_id = 1; // Cambia esto según tu lógica de obtención del ID de la empresa
$empresa_query = $conexion->prepare("SELECT * FROM empresa WHERE id_empresa = :empresa_id");
$empresa_query->bindParam(':empresa_id', $empresa_id);
$empresa_query->execute();
$empresa_row = $empresa_query->fetch(PDO::FETCH_ASSOC);
    ?>

</body>

</html>