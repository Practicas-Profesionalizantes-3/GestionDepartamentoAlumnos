<?php
// Llamada a la API para obtener todas las notificaciones
$api_url = 'http://localhost/api/api-Alumnos/notificaciones.php';
$response = file_get_contents($api_url);
$notificaciones = json_decode($response, true);

// Verificar si la respuesta contiene datos
if ($notificaciones) {
    echo "<h1>Notificaciones de Tipo Trámite</h1>";

    // Filtrar las notificaciones de tipo Trámite
    $tramites_encontrados = false;
    foreach ($notificaciones as $notificacion) {
        if (!empty($notificacion['id_tramite'])) {
            // Mostrar detalles de la notificación de tipo Trámite
            $date_sent = htmlspecialchars($notificacion['fecha_envio_notificacion']);
            $description = htmlspecialchars($notificacion['id_tramite']);
            
            echo "<p><strong>Fecha de envío:</strong> {$date_sent}</p>";
            echo "<p><strong>Descripción del trámite:</strong> {$description}</p>";
            echo "<hr>";  // Separador entre notificaciones
            $tramites_encontrados = true;
        }
    }

    // Mensaje si no se encontraron trámites
    if (!$tramites_encontrados) {
        echo "<p>No se encontraron notificaciones de tipo Trámite.</p>";
    }
} else {
    echo "<p>No se encontró la información de notificaciones.</p>";
}
?>
