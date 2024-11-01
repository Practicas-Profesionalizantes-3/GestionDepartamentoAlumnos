
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
        $responsable = htmlspecialchars($tramite_encontrado['responsable']);
        $responsable_apellido = htmlspecialchars($tramite_encontrado['responsable_apellido']);
        $responsable_completo = $responsable_apellido . " " .  $responsable;
        $fecha_creacion = htmlspecialchars($tramite_encontrado['fecha_creacion']);
        $estado_tramite = htmlspecialchars($tramite_encontrado['estado_tramite']);
        $adjunto = isset($tramite_encontrado['archivo']) ? $tramite_encontrado['archivo'] : null;
        
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

    // Ordenar movimientos por fecha
    usort($movimientos, function ($a, $b) {
        return strtotime($b['fecha_movimiento']) - strtotime($a['fecha_movimiento']); // Ordenar de más reciente a más antiguo
    });

    // Lógica para obtener los comentarios del trámite
    $api_comentarios_url = 'http://localhost/api/api-Alumnos/tramite_comentarios.php?id_tramite=' . $tramite_encontrado['id_tramite'];
    $comentarios_response = @file_get_contents($api_comentarios_url);
    $comentarios = json_decode($comentarios_response, true);

    if (!is_array($comentarios) || empty($comentarios)) {
        $comentarios = []; // Si no hay comentarios, inicializar como un array vacío
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
    <title>Detalle del trámite - <?php echo $titulo; ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Kumbh+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="shortcut icon" href="../img/logo-fav.png" type="image/x-icon"/>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/templatemo-upright.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="/tramites/css/estilos.css">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'> <!----===== Boxicons CSS ===== -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script> <!--<title>Dashboard Sidebar Menu</title>-->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css"> <!-- Toastify CSS -->
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

    <div class="container-fluid mt-5 mb-5">
        <div class="row mt-5 mb-5">
            <div class="tm-main mt-5 mb-5">
                <!-- Home section -->
                <div class="tm-section-wrap">
                    <div class="container">
                        <div class="card">
                            <div class="card-header bg-info">
                                Detalles del Trámite
                                <button class="close-btn" onclick="window.history.back();">&times;</button>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title" style="color: black;">Título: <span id="titulo-tramite"></span></h5>
                                <p class="card-text">Descripción: <span id="descripcion-tramite"></span></p>
                                <p class="card-text">Fecha de Creación: <span id="fecha-tramite"></span></p>
                                <p class="card-text">Responsable: <span id="responsable"></span></p>
                                <p class="card-text">Estado del Trámite: <span id="estado-tramite" class="estado"></span></p>
                                <p class="card-text">Movimientos del Trámite: </p>
                                <ul id="movimientos-list" class="list-group">
                                    <?php if (!empty($movimientos)): ?>
                                        <?php foreach ($movimientos as $movimiento): ?>
                                        <li class="list-group-item">
                                            <strong><?php echo date('d/m/Y H:i', strtotime($movimiento['fecha_movimiento'])); ?></strong> - 
                                            <span style="padding: 4px; border-radius: 4px; font-weight: bold" class="<?php echo $movimiento['observacion'] == "Pendiente" ? "estado-pendiente":($movimiento['observacion'] == "En Proceso"? "estado-proceso": "estado-completado" ) ;?>"><?php echo $movimiento['observacion']=="Terminado"?"Completado": $movimiento['observacion']; ?></span>
                                        </li>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <li class="list-group-item">No hay movimientos registrados para este trámite.</li>
                                    <?php endif; ?>
                                </ul>

                                <?php if (!empty($comentarios)): ?>
                                    <p class="card-text mt-3">Comentarios:</p>
                                    <ul class="list-group mb-3">
                                        <?php foreach ($comentarios as $comentario): ?>
                                            <li class="list-group-item">
                                                <strong><?php echo date('d/m/Y H:i', strtotime($comentario['fecha_comentario'])); ?></strong> - <?php echo htmlspecialchars($comentario['comentario']); ?>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                <?php endif; ?>

                                <!-- Mostrar botón de descarga si el adjunto existe -->
                                <?php if ($adjunto): ?>
                                    <div class="d-flex justify-content-end mt-3">
                                        <a id="download-link" href="#" class="btn btn-primary">Descargar Adjunto</a>
                                    </div>
                                <?php endif; ?>

                                <!-- Agregar el botón de redirección -->
                                <div class="mt-3 d-flex justify-content-center">
                                    <a href="mis_tramites.php" class="btn btn-secondary">Volver</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="../js/index.js"></script>
    <script src="../js/navbar.js"></script>
    <script src="../js/perfil.js"></script>
    <script src="../js/notificaciones.js"></script>
    <script src="js/validar.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/9de136d298.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script>
        // Mostrar los datos del trámite en el frontend
        document.getElementById("titulo-tramite").innerText = "<?php echo $titulo; ?>";
        document.getElementById("descripcion-tramite").innerText = "<?php echo $descripcion; ?>";
        document.getElementById("responsable").innerText = "<?php echo $responsable_completo; ?>";
        document.getElementById("fecha-tramite").innerText = "<?php echo $fecha_formateada; ?>";
        document.getElementById("estado-tramite").innerText = "<?php echo $estado_tramite; ?>";
        document.getElementById("estado-tramite").classList.add("<?php echo $estado_clase; ?>");

        // Si hay un archivo adjunto, configurar el enlace para la descarga
        <?php if ($adjunto): ?>
            document.getElementById("download-link").href = "data:image/jpeg;base64,<?php echo $adjunto; ?>";
            document.getElementById("download-link").download = "archivo_adjunto";
        <?php endif; ?>
    </script>

</body>
</html>
