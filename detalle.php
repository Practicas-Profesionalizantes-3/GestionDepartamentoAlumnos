<?php 
$aviso_id = isset($_GET['id']) ? $_GET['id'] : null;


// Inicializar datos por defecto
$titulo = 'Sin título';
$descripcion = 'Sin descripción';
$imagen = "sin imagen"; // Imagen por defecto
$fecha = 'Sin fecha';
$adjunto = '';

// Si existe un id_notificacion, obtener datos de la API
if ($aviso_id) {
    // Obtener el registro de la notificación
    $url = "http://localhost/api/api-Alumnos/cartelera.php?id_notificacion=" . urlencode($aviso_id);
    $response = file_get_contents($url);
    
    // Verificar si se obtuvo una respuesta
    if ($response !== false) {
        $data = json_decode($response, true);
        
        if (isset($data['data'])) {
            $datos = $data['data'];
            if (is_array($datos)) {
                foreach ($datos as $anuncio) {
                    if ($anuncio['id_aviso'] == $aviso_id) {
                        $titulo = $anuncio['titulo'];
                        $descripcion = $anuncio['descripcion'];
                        $fecha = $anuncio['fecha_publicacion'];
                        $imagen_base64 = $anuncio['imagen'];
                        $imagen = "<img src='data:image/jpeg;base64," . $imagen_base64 . "' alt='Imagen'>";
                        $adjunto = $anuncio['adjunto'];
                    }
                }
            }
        } else {
            echo "No se encontraron datos en la respuesta de la API.";
        }
    } else {
        echo "No se pudo obtener la respuesta de la API.";
    }
}

// Mostrar el aviso dependiendo del ID
if ($aviso_id) {
    ?>
    <html>
    <head>
        <title><?= htmlspecialchars($titulo); ?></title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <div class="container mt-5">
            <div class="aviso-completo">
                <a href="javascript:void(0);" onclick="window.history.back();" class="volver">&times;</a>

                <h1 class="mb-3"><?= htmlspecialchars($titulo); ?></h1>
                <img class="img-aviso" <?= $imagen; ?>  
                <p class="descripcion-completa"><?= htmlspecialchars($descripcion); ?></p>

                <div class="fecha-descarga-container">
                    <?php if (!empty($adjunto)) : ?>
                        <div class="descargar-adjunto">
                            <a href="data:application/pdf;base64,<?= $adjunto; ?>" download="<?= htmlspecialchars($titulo); ?>" class="btn btn-primary">Descargar adjunto</a>
                        </div>
                    <?php endif; ?>
                    <p class="fecha"><?= htmlspecialchars($fecha); ?></p>
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
    </body>
    </html>
    <?php
}
?>
