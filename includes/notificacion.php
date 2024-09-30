<?php
// Verificar si se ha recibido el parámetro id_notificacion en la URL
$id_notificacion = isset($_GET['id_notificacion']) ? intval($_GET['id_notificacion']) : null;

if (!$id_notificacion) {
    echo "<p>No se proporcionó un ID de notificación válido.</p>";
    exit;
}

// Imprimir para depurar
echo "ID de notificación recibido: " . $id_notificacion . "<br>";

// URL de la API de notificaciones para obtener los datos de la notificación
$notificaciones_api_url = 'http://localhost/api/api-Alumnos/notificaciones.php?id_notificacion=' . $id_notificacion;

// Obtener los datos de la API de notificaciones
$notificacion_response = file_get_contents($notificaciones_api_url);
$notificacion_data = json_decode($notificacion_response, true);

// Verificar si la notificación tiene un trámite o un aviso
if (!empty($notificacion_data) && isset($notificacion_data[0])) {
    $notificacion = $notificacion_data[0];

    if (!empty($notificacion['id_tramite'])) {
        // Es un trámite
        $id_tramite = $notificacion['id_tramite'];
        echo "<h1>Detalle del Trámite</h1>";
        echo "<p><strong>ID de Trámite:</strong> {$id_tramite}</p>";
        echo "<p><strong>Fecha de Envío:</strong> {$notificacion['fecha_envio_notificacion']}</p>";
        
    } elseif (!empty($notificacion['id_aviso'])) {
        // Es un aviso
        $id_aviso = $notificacion['id_aviso'];

        // Llamar a la API de avisos con el id_aviso
        $avisos_api_url = 'http://localhost/api/api-Alumnos/cartelera.php?id_aviso=' . $id_aviso;
        $aviso_response = file_get_contents($avisos_api_url);
        $aviso_data = json_decode($aviso_response, true);

        if (!empty($aviso_data)) {
            // Mostrar los detalles del aviso
            $aviso = $aviso_data; // Obtener el primer aviso

            $data = json_decode($aviso['data'], true); // Convertir JSON string a array

            foreach ($data as $item) {
                $titulo = isset($item['titulo']) ? $item['titulo'] : 'Sin título';
                $descripcion = isset($item['descripcion']) ? $item['descripcion'] : 'Sin descripción';

                // Validar que la imagen exista en el array y esté en base64
                $imagen = isset($item['imagen']) && !empty($item['imagen']) ? "data:image/jpeg;base64," . $item['imagen'] : "https://via.placeholder.com/150";

                // Validar la fecha
                $fecha = isset($item['fecha']) ? htmlspecialchars($item['fecha']) : '';

                // Validar el adjunto
                $adjunto = isset($item['adjunto']) && !empty($item['adjunto']) ? $item['adjunto'] : '';
            }

            // Mostrar los detalles del aviso en la página
            ?>
            <title><?= $titulo; ?></title>
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
            <link rel="stylesheet" href="../css/style.css">
        </head>
        <body>
            <div class="container mt-5">
                <div class="aviso-completo">
                    <a href="javascript:void(0);" onclick="window.history.back();" class="volver">&times;</a>

                    <h1 class="mb-3"><?= $titulo; ?></h1>
                    <img src="<?= $imagen; ?>" alt="<?= $titulo; ?>" class="img-aviso">
                    <p class="descripcion-completa"><?= $descripcion; ?></p>

                    <div class="fecha-descarga-container">
                        <?php if (!empty($adjunto)) : ?>
                            <div class="descargar-adjunto">
                                <a href="data:application/pdf;base64,<?= $adjunto; ?>" download="<?= $titulo; ?>" class="btn btn-primary">Descargar adjunto</a>
                            </div>
                        <?php endif; ?>
                        <p class="fecha"><?= $fecha; ?></p>
                    </div>
                </div>
            </div>
            <?php
        } else {
            echo "<p>No se encontró el aviso correspondiente.</p>";
        }
    }
} else {
    echo "<p>No se encontró la notificación o no tiene un trámite o aviso asociado.</p>";
}
?>
