<?php
    $api_url = 'http://localhost/api/api-Alumnos/notificaciones.php';

    // Obtener datos de la API
    $response = file_get_contents($api_url);
    $data = json_decode($response, true);
    $notificaciones_count = count($data); // Número de notificaciones

    $api_url = 'http://localhost/api/api-Alumnos/cartelera.php';

    $response = file_get_contents($api_url);
    $cartelera = json_decode($response, true);
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
                            <?php foreach ($data as $notificacion): ?>
                                <?php
                                $notificacion_id = $notificacion['id_notificacion'];
                                $date_sent = htmlspecialchars($notificacion['fecha_envio_notificacion']);
                                $type = isset($notificacion['id_aviso']) ? "Aviso" : (isset($notificacion['id_tramite']) ? "Trámite" : "Desconocido");
                                $description = ($type == "Aviso") ? htmlspecialchars($notificacion['id_aviso']) : htmlspecialchars($notificacion['id_tramite']);
                                $max_length = 23;
                                if (strlen($description) > $max_length) {
                                    $description = substr($description, 0, $max_length) . '...';
                                }
                                ?>
                                <div class="notificationContent">
                                    <i class='fa fa-check' style='color:#41cf2e;'></i>
                                    <span class='message-description'>Nueva notificación enviada el: <b><?php echo $date_sent; ?></b></span><br>
                                    <span class='notification-type'>Tipo: <b><?php echo $type; ?></b></span><br>
                                    <span class='notification-detail'>Descripción: <b><?php echo $description; ?></b></span>
                                    <?php if ($type == "Trámite"): ?>
                                        <br><a href='http://localhost/gestiondepartamentoalumnos/includes/notificacion.php?id=<?php echo $notificacion_id; ?>'>Ver detalle del trámite</a>
                                    <?php endif; ?>
                                    <?php if ($type == "Aviso"): ?>
                                        <?php $adjunto = isset($notificacion['adjunto']) ? urlencode($notificacion['adjunto']) : ''; ?>
                                        <br><a href='http://localhost/gestiondepartamentoalumnos/includes/aviso.php?id=<?php echo $notificacion['id_notificacion']; ?>&adjunto=<?php echo $adjunto; ?>'>Ver detalle del aviso</a>
                                    <?php endif; ?>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
