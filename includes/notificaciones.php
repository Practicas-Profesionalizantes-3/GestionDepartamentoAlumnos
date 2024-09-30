<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notificaciones</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
    /* Estilos para la barra de navegación */
.navbar .fas.fa-bell {
    color: #333; /* Color negro o gris oscuro para la campanita */
    font-size: 1.8rem;
    margin-right: 5px; /* Ajusta este valor si es necesario */
    vertical-align: middle; /* Alinear verticalmente con el badge */
}

#count-label {
    background-color: #dc3545; /* Rojo para el badge */
    color: white;
    vertical-align: middle; /* Alineación vertical del contador */
    margin-left: 5px; /* Ajusta este valor si es necesario */
}

.notification-text {
    color: #000; /* Color negro para el texto de Notificaciones */
    font-weight: bold; /* Resaltar el texto */
    margin-left: 0px; /* Separación entre el contador y el texto */
    vertical-align: middle; /* Alinear verticalmente con el ícono */
}

.badge {
    margin-right: 10px; /* Ajusta el margen del badge si es necesario */
}

.navbar-nav.ml-auto .nav-item.dropdown {
    margin-right: 5px; /* Ajusta este valor para mover la campanita y el contador a la derecha */
    margin-top: -10px;
}

.dropdown-menu-right {
    right: 0;
    left: auto;
    width: 300px; /* Ajusta el ancho del menú desplegable si es necesario */
}

#notificationContent {
    margin-bottom: 10px;
}

.message-description {
    margin-left: 10px;
    font-size: 0.9rem;
}

    </style>
</head>

<body>

<?php
$api_notificaciones_url = 'http://localhost/api/api-Alumnos/notificaciones.php';
$api_cartelera_url = 'http://localhost/api/api-Alumnos/cartelera.php';

// Obtener datos de la API de notificaciones
$response = file_get_contents($api_notificaciones_url);

// Verificar que la respuesta no sea falsa o vacía
if ($response === false || empty($response)) {
    die("Error: No se pudo obtener la respuesta de la API de notificaciones.");
}

$notificaciones = json_decode($response, true);
$notificaciones_count = count($notificaciones);
// Verificar que la decodificación JSON sea exitosa y que $notificaciones sea un array
if (!is_array($notificaciones)) {
    die("Error: La respuesta de la API de notificaciones no es un array válido.");
}

// Recorrer las notificaciones y buscar el id_aviso
foreach ($notificaciones as $notificacion) {
    // Verificar que $notificacion sea un array antes de intentar acceder a sus claves
    if (is_array($notificacion) && isset($notificacion['id_notificacion'])) {
        $id_notificacion = $notificacion['id_notificacion'];
        
        // Si existe el id_aviso en la notificación
        if (isset($notificacion['id_aviso'])) {
            $id_aviso = $notificacion['id_aviso'];

            // Obtener los datos de la cartelera para buscar el aviso con el mismo id_aviso
            $cartelera_response = file_get_contents($api_cartelera_url);
            
            // Verificar que la respuesta no sea falsa o vacía
            if ($cartelera_response === false || empty($cartelera_response)) {
                die("Error: No se pudo obtener la respuesta de la API de cartelera.");
            }

            $avisos = json_decode($cartelera_response, true);

            // Verificar que la decodificación JSON sea exitosa y que $avisos sea un array
            if (!is_array($avisos)) {
                die("Error: La respuesta de la API de cartelera no es un array válido.");
            }

            // Recorrer la cartelera para encontrar el aviso correspondiente
            foreach ($avisos as $aviso) {
                // Verificar que $aviso sea un array y que tenga un id_aviso válido
                if (is_array($aviso) && isset($aviso['id_aviso']) && $aviso['id_aviso'] == $id_aviso) {
                    // Guardar la descripción del aviso en una variable
                    $descripcion_aviso = $aviso['descripcion'];
                  
                    // Aquí podrías usar $descripcion_aviso para mostrarla en tu HTML o hacer otras operaciones
                    echo "Descripción del aviso encontrado: " . $descripcion_aviso;
                    break; // Salir del bucle cuando encuentres el aviso
                }
            }
        }
    } else {
        echo "Error: Notificación no válida o sin id_notificacion.";
    }
}
?>



    <nav class="navbar navbar-expand-lg">
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
                            <?php
                          if ($notificaciones_count > 0) {
                            foreach ($notificaciones as $notificacion) {
                                $notificacion_id = $notificacion['id_notificacion'];
                                $date_sent = htmlspecialchars($notificacion['fecha_envio_notificacion']);
                                $type = isset($notificacion['id_aviso']) ? "Aviso" : (isset($notificacion['id_tramite']) ? "Trámite" : "Desconocido");
                        
                                // Obtener la descripción real según el tipo de notificación (Aviso o Trámite)
                                $description = ($type == "Aviso") ? htmlspecialchars($notificacion['descripcion_aviso']) : htmlspecialchars($notificacion['descripcion_tramite']);
                        
                                // Limitar la descripción a 23 caracteres y añadir puntos suspensivos si es necesario
                                $max_length = 23;
                                if (strlen($description) > $max_length) {
                                    $description = substr($description, 0, $max_length) . '...';
                                }
                        
                                // Mostrar la notificación
                                echo "<div id='notificationContent'>";
                                echo "<i class='fa fa-check' style='color:#41cf2e;'></i>";
                                echo "<span class='message-description'>Nueva notificación enviada el: <b>{$date_sent}</b></span>";
                                echo "<br>";
                                echo "<span class='notification-type'>Tipo: <b>{$type}</b></span>";
                                echo "<br>";
                                echo "<span class='notification-detail'>Descripción: <b>{$description}</b></span>";
                        
                                // Link para el detalle del trámite o aviso
                                if ($type == "Trámite") {
                                    echo "<br><a href='http://localhost/gestiondepartamentoalumnos/includes/notificacion.php?id={$notificacion_id}'>Ver detalle del trámite</a>";
                                }
                                if ($type == "Aviso") {
                                    $adjunto = isset($notificacion['adjunto']) ? urlencode($notificacion['adjunto']) : '';
                                    echo "<br><a href='http://localhost/gestiondepartamentoalumnos/includes/notificacion.php?id={$notificacion_id}&adjunto={$adjunto}'>Ver detalle del aviso</a>";
                                }
                        
                                echo "</div><br>"; // Separar cada notificación con un salto de línea
                            }
                        }
                        ?>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>