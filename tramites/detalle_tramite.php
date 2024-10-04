<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle del Trámite</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    

<?php
// Verificar si se recibió el id de la notificación
if (isset($_GET['id'])) {
    $id_notificacion = intval($_GET['id']);
    
    // URL de la API para obtener los detalles del trámite según el id de la notificación
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
    
    // Buscar el trámite que coincida con el id de notificación
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
        $adjunto = isset($tramite_encontrado['adjunto']) ? $tramite_encontrado['adjunto'] : null;
        
        // Formatear la fecha y hora
        $fecha_obj = new DateTime($fecha_creacion);
        $fecha_formateada = $fecha_obj->format('d/m/Y H:i');

        // Clase CSS del estado
        $estado_clase = "";
        if ($estado_tramite == "Pendiente") {
            $estado_clase = "estado-pendiente";
        } elseif ($estado_tramite == "En Proceso") {
            $estado_clase = "estado-proceso";
        } elseif ($estado_tramite == "Completado") {
            $estado_clase = "estado-completado";
        }
    } else {
        die("Error: No se encontró un trámite con ese ID.");
    }
} else {
    die("Error: No se recibió el ID de la notificación.");
}
?>
       
</head>
<body>

<div class="container">
    <div class="card">
        <div class="card-header">
            Detalles del Trámite
            <button class="close-btn" onclick="window.history.back();">&times;</button>
        </div>
        <div class="card-body">
            <h5 class="card-title">Título: <span id="titulo-tramite"></span></h5>
            <p class="card-text">Descripción: <span id="descripcion-tramite"></span></p>
            <p class="card-text">Fecha de Creación: <span id="fecha-tramite"></span></p>
            <p class="card-text">Estado del Trámite: <span id="estado-tramite" class="estado"></span></p>

            <div id="adjunto-section" style="display: none;">
                <a href="" id="adjunto-link" class="btn btn-primary btn-download" download>Descargar Adjunto</a>
            </div>
        </div>
    </div>
</div>

<footer>
<div class="container">
        <div class="row single-footer-widget">
            <div class="col-md-6 col-sm-7">
                <span class="text-light">Prohibida la reproducción total ó parcial de imágenes y textos. Todos los derechos reservados.</span>
            </div>
            <div class="col-md-6 col-sm-5">
                <div class="column-right">
                    <span class="text-light">Política de Privacidad. Términos y condiciones.</span>
                </div>
            </div>
        </div>
    </div>
</footer>
 
<script src="../js/index.js"></script>
<script src="js/tramite.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://kit.fontawesome.com/9de136d298.js" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
 
<script>
// Mostrar los datos del trámite en el frontend
document.getElementById("titulo-tramite").innerText = "<?php echo $titulo; ?>";
document.getElementById("descripcion-tramite").innerText = "<?php echo $descripcion; ?>";
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
