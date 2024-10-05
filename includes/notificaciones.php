<?php
$api_url = 'http://localhost/api/api-Alumnos/notificaciones.php';
$response = file_get_contents($api_url);
$data = json_decode($response, true);

// Filtrar las notificaciones no leídas (estado 4)
$notificaciones_no_leidas = array_filter($data, function($notificacion) {
    return isset($notificacion['id_notificacion_estado']) && $notificacion['id_notificacion_estado'] == 4;
});

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
                        <span class="badge bg-danger" id="count-label"><?php echo $notificaciones_count; ?></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" id="notificationDropdown" aria-labelledby="notificationsDropdown">
                        <div class="dropdown-divider"></div>
                        <?php if ($notificaciones_count > 0): ?>
                            <?php foreach ($notificaciones_no_leidas as $notificacion): ?>
                                <?php
                                $notificacion_id = $notificacion['id_notificacion'];
                                $date_sent = htmlspecialchars($notificacion['fecha_envio_notificacion']);
                                $type = isset($notificacion['id_aviso']) ? "Aviso" : (isset($notificacion['id_tramite']) ? "Trámite" : "Desconocido");

                                // Mostrar la descripción adecuada dependiendo del tipo
                                if ($type == "Aviso") {
                                    $descripcion = isset($notificacion['id_aviso_descripcion']) ? htmlspecialchars($notificacion['id_aviso_descripcion']) : 'Sin descripción';
                                    $id_relacionado = $notificacion['id_aviso'];  // usar el id_aviso
                                    // Enlace para marcar como leída y redirigir al aviso
                                    $href = 'http://localhost/gestiondepartamentoalumnos/includes/marcar_leida.php?id=' . $notificacion_id . '&tipo=aviso';
                                } elseif ($type == "Trámite") {
                                    $descripcion = isset($notificacion['id_tramite_descripcion']) ? htmlspecialchars($notificacion['id_tramite_descripcion']) : 'Sin descripción';
                                    $id_relacionado = $notificacion['id_tramite'];  // usar el id_tramite
                                    // Enlace para marcar como leída y redirigir al trámite
                                    $href = 'http://localhost/gestiondepartamentoalumnos/includes/marcar_leida.php?id=' . $notificacion_id . '&tipo=tramite';
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
                                    <span class='message-description'>Nueva notificación enviada el: <b><?php echo $date_sent; ?></b></span><br>
                                    <span class='notification-type'>Tipo: <b><?php echo $type; ?></b></span><br>
                                    <span class='notification-detail'>Descripción: <b><?php echo $descripcion; ?></b></span>
                                    <br><a href='<?php echo $href; ?>' style="color: blue;">Ver detalle</a>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <span class="dropdown-item">No hay notificaciones no leídas</span>
                        <?php endif; ?>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>

