<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle del Trámite</title>
    <link href="https://fonts.googleapis.com/css2?family=Kumbh+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../tramites/css/style.css">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'> <!----===== Boxicons CSS ===== -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script> <!--<title>Dashboard Sidebar Menu</title>-->
</head>
<body>

<?php
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
    
    // Buscar el trámite que coincida con el ID de la notificación
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
} else {
    die("Error: No se recibió el ID de la notificación.");
}
?>
<!-- Include Navbar -->
<?php include("navbar.php");?>

<div class="container">
    <div class="card">
        <div class="card-header" >
            Detalles del Trámite
            <button class="close-btn" onclick="window.history.back();">&times;</button>
        </div>
        <div class="card-body">
            <h5 class="card-title" style="color: black;">Título: <span id="titulo-tramite"></span></h5>
            <p class="card-text">Descripción: <span id="descripcion-tramite"></span></p>
            <p class="card-text">Fecha de Creación: <span id="fecha-tramite"></span></p>
            <p class="card-text">Estado del Trámite: <span id="estado-tramite" class="estado"></span></p>

            <div id="adjunto-section" style="display: none;">
                <a href="" id="adjunto-link" class="btn btn-primary btn-download" download>Descargar Adjunto</a>
            </div>
        </div>
    </div>
</div>

<script src="../js/index.js"></script>
<script src="../js/navbar.js"></script>
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
