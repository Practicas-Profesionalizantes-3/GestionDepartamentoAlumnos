<?php
$api_url = 'http://localhost/api/api-Alumnos/notificaciones.php';
$response = file_get_contents($api_url);
$data = json_decode($response, true);

// Filtrar solo las notificaciones no leídas (id_notificacion_estado != 3) para la lista
$notificaciones_no_leidas = array_filter($data, function($notificacion) {
    return $notificacion['id_notificacion_estado'] != 3;
});

// Contar solo las notificaciones no leídas
$notificaciones_count = count($notificaciones_no_leidas);
?>

<div class="navbar navbar-expand-lg" id="notificaciones">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-bell"></i>
                        <!-- Mostrar el número de notificaciones no leídas -->
                        <span class="badge bg-danger" id="count-label"><?php echo $notificaciones_count; ?></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" id="notificationDropdown" aria-labelledby="notificationsDropdown" style="max-height: 500px; overflow-y: auto;">
                        <div class="dropdown-divider"></div>
                        <?php if (count($notificaciones_no_leidas) > 0): ?>
                            <?php foreach ($notificaciones_no_leidas as $notificacion): ?>
                                <?php
                                $notificacion_id = $notificacion['id_notificacion'];
                                
                                // Convertir la fecha a un objeto DateTime y formatear
                                $date_sent = new DateTime($notificacion['fecha_envio_notificacion']);
                                $formatted_date = $date_sent->format('d/m/Y H:i'); // Formato: día/mes/año horas:minutos
                                
                                $type = isset($notificacion['id_aviso']) ? "Aviso" : (isset($notificacion['id_tramite']) ? "Trámite" : "Desconocido");

                                // Mostrar la descripción adecuada dependiendo del tipo
                                if ($type == "Aviso") {
                                    $descripcion = isset($notificacion['id_aviso_descripcion']) ? htmlspecialchars($notificacion['id_aviso_descripcion']) : 'Sin descripción';
                                    $id_relacionado = $notificacion['id_aviso'];  // usar el id_aviso
                                    $href = 'http://localhost/gestiondepartamentoalumnos/detalle.php?id=' . $id_relacionado;
                                } elseif ($type == "Trámite") {
                                    $descripcion = isset($notificacion['id_tramite_descripcion']) ? htmlspecialchars($notificacion['id_tramite_descripcion']) : 'Sin descripción';
                                    $id_relacionado = $notificacion['id_tramite'];  // usar el id_tramite
                                    $href = 'http://localhost/gestiondepartamentoalumnos/tramites/detalle_tramite.php?id=' . $id_relacionado;
                                } else {
                                    $descripcion = 'Notificación desconocida';
                                    $href = '#';
                                }

                                // Limitar la longitud de la descripción
                                $max_length = 23;
                                if (strlen($descripcion) > $max_length) {
                                    $descripcion = substr($descripcion, 0, $max_length) . '...';
                                }
                                ?>
                                <div class="notificationContent">
                                    <i class='fa fa-check' style='color:#41cf2e;'></i>
                                    <span class='message-description'>Notificación enviada el: <b><?php echo $formatted_date; ?></b></span><br>
                                    <span class='notification-detail'>Descripción: <b><?php echo $descripcion; ?></b></span>
                                    <br><a href='<?php echo $href; ?>' class="mark-as-read" data-id="<?php echo $notificacion_id; ?>" style="color: blue;">Ver detalle</a>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const notificationLinks = document.querySelectorAll('.mark-as-read');
        
        notificationLinks.forEach(function(link) {
            link.addEventListener('click', function(event) {
                event.preventDefault();
                
                const notificacionId = this.getAttribute('data-id');  // Obtener el id_notificacion
                const href = this.getAttribute('href');
                
                // Verificar si el id_notificacion se obtiene correctamente
                console.log("ID de notificación:", notificacionId);
                
                const postData = {
                    id_notificacion: notificacionId,
                    id_notificacion_estado: 3  // Cambiar el estado a 3
                };

                fetch('http://localhost/api/api-Alumnos/notificaciones.php', {
                    method: 'PUT',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(postData)  // Enviar los datos como JSON
                })
                .then(response => response.json())
                .then(data => {
                    if (data.error) {
                        console.error('Error en la API:', data.error);
                    } else {
                        console.log('Respuesta de la API:', data);
                        // Eliminar la notificación del DOM
                        this.closest('.notificationContent').remove();
                        // Actualizar el contador de notificaciones
                        actualizarContadorNotificaciones();
                    }
                })
                .catch(error => {
                    console.error('Error en la solicitud:', error);
                });

                // Redirigir al detalle de la notificación
                window.location.href = href;  
            });
        });
    });

    function actualizarContadorNotificaciones() {
        fetch('http://localhost/api/api-Alumnos/notificaciones.php')
            .then(response => response.json())
            .then(data => {
                // Filtrar solo las notificaciones no leídas
                const notificaciones_no_leidas = data.filter(notificacion => notificacion.id_notificacion_estado != 3);
                const notificaciones_count = notificaciones_no_leidas.length;

                // Actualizar el contador en la interfaz
                document.getElementById('count-label').textContent = notificaciones_count;
            })
            .catch(error => {
                console.error('Error al obtener notificaciones:', error);
            });
    }

    // Actualizar el contador de notificaciones cada 5 segundos
    setInterval(actualizarContadorNotificaciones, 5000);  // 5000 ms = 5 segundos
</script>
