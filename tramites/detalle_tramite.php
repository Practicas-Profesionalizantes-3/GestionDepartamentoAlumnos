
<?php
// Ajustar la zona horaria
date_default_timezone_set('America/Argentina/Buenos_Aires');

// Obtener la fecha y hora actual en Buenos Aires
$fecha_actual = new DateTime();
$fecha_actual_formateada = $fecha_actual->format('d/m/Y H:i');

// Verificar si se recibió el ID de la notificación
if (isset($_GET['id'])) {
    $id_notificacion = intval($_GET['id']);
    
    // URL de la API para obtener los detalles del trámite según el ID de la notificación
    $api_tramite_url = 'http://localhost/api/api-Alumnos/tramites.php?id_notificacion=' . $id_notificacion;

    // Obtener datos de la API de trámites
    $response = file_get_contents($api_tramite_url);
    
    // Verificar que la respuesta no sea falsa o vacía
    if ($response === false || empty($response)) {
        die("Error: No se pudo obtener la respuesta de la API de trámites.");
    }
    
    $tramites = json_decode($response, true);

    // Verificar que la decodificación JSON sea exitosa y que los datos no estén vacíos
    if (!is_array($tramites) || empty($tramites)) {
        die("Error: La respuesta de la API de trámites no es válida.");
    }
    
    // Buscar el trámite que coincida con el ID de notificación
    $tramite_encontrado = null;
    foreach ($tramites as $tramite) {
        if ($tramite['id_tramite'] == $id_notificacion) {
            $tramite_encontrado = $tramite;
            break;
        }
    }

    // Verificar si se encontró el trámite
    if ($tramite_encontrado) {
        // Asignar los valores del trámite encontrado a variables
        $titulo = htmlspecialchars($tramite_encontrado['tipo_tramite']);
        $descripcion = htmlspecialchars($tramite_encontrado['descripcion']);
        $fecha_creacion = htmlspecialchars($tramite_encontrado['fecha_creacion']);
        $estado_tramite = htmlspecialchars($tramite_encontrado['estado_tramite']);
        $comentarios_tramite = htmlspecialchars($tramite_encontrado['comentarios']);
        $adjunto = isset($tramite_encontrado['adjunto']) ? $tramite_encontrado['adjunto'] : null;
        
        // Formatear la fecha y hora
        $fecha_obj = new DateTime($fecha_creacion);
        $fecha_formateada = $fecha_obj->format('d/m/Y H:i');

        // Clase CSS del estado
        $estado_clase = "";
        switch ($estado_tramite) {
            case "Pendiente":
                $estado_clase = "estado-pendiente";
                break;
            case "En Proceso":
                $estado_clase = "estado-proceso";
                break;
            case "Completado":
                $estado_clase = "estado-completado";
                break;
        }
    } else {
        die("Error: No se encontró un trámite con ese ID.");
    }

    // Lógica para obtener los movimientos del trámite
    $api_movimientos_url = 'http://localhost/api/api-Alumnos/tramite_movimientos.php?id_tramite=' . $tramite_encontrado['id_tramite'];
    $movimientos_response = @file_get_contents($api_movimientos_url);
    $movimientos = json_decode($movimientos_response, true);

    if (!is_array($movimientos) || empty($movimientos)) {
        $movimientos = []; // Si no hay movimientos, inicializar como un array vacío
    }
} else {
    die("Error: No se recibió el ID de la notificación.");
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle del Trámite</title>
    <link href="https://fonts.googleapis.com/css2?family=Kumbh+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/templatemo-upright.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="css/style.css">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'> <!----===== Boxicons CSS ===== -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script> <!--<title>Dashboard Sidebar Menu</title>-->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css"> <!-- Toastify CSS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script> <!-- Toastify JS-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>  <!-- SwettAlert -->
</head>
<body>

    <!-- Include Perfil -->
    <?php include("../includes/perfil.php");?>

    <!-- Include notificaciones -->
    <?php include("../includes/notificaciones.php");?>

    <!-- Include Navbar -->
    <?php include("../includes/navbar.php");?>



    <div class="container">
        <div class="card">
            <div class="card-header">
                Detalles del Trámite
                <button class="close-btn" onclick="window.history.back();">&times;</button>
            </div>
            <div class="card-body">
                <h5 class="card-title" style="color: black;">Título: <span id="titulo-tramite"></span></h5>
                <p class="card-text">Descripción: <span id="descripcion-tramite"></span></p>
                <p class="card-text">Fecha de Creación: <span id="fecha-tramite"></span></p>
                <p class="card-text">Estado del Trámite: <span id="estado-tramite" class="estado"></span></p>
                <p class="card-text">Comentarios: <span id="comentario-tramite"></span></p>
                <p class="card-text">Movimientos del Trámite: </p>
                
                <ul id="movimientos-list" class="list-group">
                    <?php if (!empty($movimientos)): ?>
                        <?php foreach ($movimientos as $movimiento): ?>
                            <?php
                            // Formatear la fecha y hora
                            $fecha_movimiento_obj = new DateTime($movimiento['fecha_movimiento']);
                            $fecha_movimiento_formateada = $fecha_movimiento_obj->format('d/m/Y H:i');
                            ?>
                            <li class="list-group-item">
                                <strong>Fecha:</strong> <?php echo htmlspecialchars($fecha_movimiento_formateada); ?> - 
                                <strong>Observación:</strong> <?php echo htmlspecialchars($movimiento['observacion']); ?>
                            </li>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <li class="list-group-item">No hay movimientos registrados para este trámite.</li>
                    <?php endif; ?>
                </ul>

                <!-- Agregar el botón de redirección -->
                <div class="mt-3 d-flex justify-content-center">
                    <a href="mis_tramites.php" class="btn btn-secondary">Volver a Mis Trámites</a>
                </div>
                <h5 class="mt-4">Movimientos del Trámite:</h5>
<ul id="movimientos-list" class="list-group">
    <?php if (!empty($movimientos)): ?>
        <?php foreach ($movimientos as $movimiento): ?>
            <?php
            // Formatear la fecha y hora
            $fecha_movimiento_obj = new DateTime($movimiento['fecha_movimiento']);
            $fecha_movimiento_formateada = $fecha_movimiento_obj->format('d/m/Y H:i');
            ?>
            <li class="list-group-item">
                <strong>Fecha:</strong> <?php echo htmlspecialchars($fecha_movimiento_formateada); ?> - 
                <strong>Observación:</strong> <?php echo htmlspecialchars($movimiento['observacion']); ?> - 
            </li>
        <?php endforeach; ?>
    <?php else: ?>
        <li class="list-group-item">No hay movimientos registrados para este trámite.</li>
    <?php endif; ?>
</ul>

<!-- Agregar el botón de redirección -->
<div class="mt-3">
    <a href="mis_tramites.php" class="btn btn-secondary">Volver a Mis Trámites</a>
</div>






            </div>
        </div>
    </div>

    <script src="../js/index.js"></script>
    <script src="../js/navbar.js"></script>
    <script src="../js/perfil.js"></script>
    <script src="../js/notificaciones.js"></script>
    <script src="js/tramite.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/9de136d298.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        // Mostrar los datos del trámite en el frontend
        document.getElementById("titulo-tramite").innerText = "<?php echo $titulo; ?>";
        document.getElementById("descripcion-tramite").innerText = "<?php echo $descripcion; ?>";
        document.getElementById("comentario-tramite").innerText = "<?php echo $comentarios_tramite; ?>";
        document.getElementById("fecha-tramite").innerText = "<?php echo $fecha_formateada; ?>";
        document.getElementById("estado-tramite").innerText = "<?php echo $estado_tramite; ?>";
        document.getElementById("estado-tramite").classList.add("<?php echo $estado_clase; ?>");

        // Si hay un archivo adjunto, mostrar el botón de descarga
        <?php if ($adjunto): ?>
            document.getElementById("adjunto-section").style.display = "block";
            document.getElementById("adjunto-link").href = "http://localhost/uploads/<?php echo urlencode($adjunto); ?>";
        <?php endif; ?>
    </script>
</body>
</html>
