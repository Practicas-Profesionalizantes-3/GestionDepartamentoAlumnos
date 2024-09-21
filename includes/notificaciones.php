<nav class="navbar navbar-expand-lg ">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Notificaciones</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <?php
                $notificaciones_url = "http://localhost/api/api-Alumnos/notificaciones.php";

                $ch = curl_init($notificaciones_url);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $response_notificaciones = curl_exec($ch);
                curl_close($ch);

                $data_notificaciones = json_decode($response_notificaciones, true);

                $count = count($data_notificaciones); ?>
                <!-- Modificamos el HTML para agregar el checkbox oculto y el label asociado -->
                <li class="nav-item dropdown">
                    <input type="checkbox" id="notification-checkbox">
                    <label for="notification-checkbox">
                        <i class="fas fa-bell" id="notificationIcon"></i>
                        <span class="badge bg-danger" id="count-label"><?php echo $count ?></span>
                    </label>
                    <div class="dropdown-menu dropdown-menu-right" id="notificationDropdown" aria-labelledby="notificationsDropdown">
                        <!-- Contenido del menú desplegable -->
                        <a class="dropdown-item" href="#"><b>Notificaciones</b></a>
                        <div class="dropdown-divider"></div>
                        <?php
                        if ($count > 0) {
                            foreach ($data_notificaciones as $notificacion) {
                                echo "  <div id='notificationContent'>";
                                echo "  <i class='fa fa-check' style='color:#41cf2e;'></i>";
                                echo "  <span class='message-description'>{$notificacion['id_aviso']}. <br> <b>{$notificacion['fecha_envio_notificacion']}</b></span>";
                                echo "  </div>";
                                echo "  <div class='dropdown-divider'></div>";
                            }
                        } else {
                            echo "<span class='dropdown-item text-muted'>No hay notificaciones de hoy</span>";
                        }
                        ?>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>