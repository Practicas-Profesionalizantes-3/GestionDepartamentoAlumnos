<?php
// Establecer la zona horaria a la de Argentina
date_default_timezone_set('America/Argentina/Buenos_Aires');

// Función para calcular el tiempo transcurrido
function tiempo_transcurrido($fecha_envio)
{
    $fecha_envio = new DateTime($fecha_envio);
    $fecha_actual = new DateTime(); // Utilizará la zona horaria configurada
    $diferencia = $fecha_actual->diff($fecha_envio);

    if ($diferencia->y > 0) {
        return $diferencia->y . ' año(s) atrás';
    } elseif ($diferencia->m > 0) {
        return $diferencia->m . ' mes(es) atrás';
    } elseif ($diferencia->d > 0) {
        return $diferencia->d . ' día(s) atrás';
    } elseif ($diferencia->h > 0) {
        return $diferencia->h . ' hora(s) atrás';
    } elseif ($diferencia->i > 0) {
        return $diferencia->i . ' minuto(s) atrás';
    } else {
        return $diferencia->s . ' segundo(s) atrás';
    }
}

$api_url = 'http://localhost/api/api-Alumnos/cartelera.php';

// Intentar obtener el contenido de la API
$response = @file_get_contents($api_url);

// Verificar si la respuesta es válida y se pudo decodificar correctamente
if ($response !== false) {
    $data = json_decode($response, true);

    // Verificar que la decodificación JSON fue exitosa y que la estructura contiene 'data'
    if (json_last_error() === JSON_ERROR_NONE && isset($data["data"])) {
        $avisos = $data["data"];
    } else {
        // Si hay un error en la decodificación o no existe 'data', inicializar $avisos como un arreglo vacío
        $avisos = [];
    }
} else {
    // Si no se pudo obtener la respuesta de la API, inicializar $avisos como un arreglo vacío
    $avisos = [];
}

$datos = $avisos;
$fecha_actual = date('Y-m-d');

// Filtrar los datos según la fecha de vencimiento y el estado
$datos_filtrados = array_filter($avisos, function ($item) use ($fecha_actual) {
    return ($item['fecha_vencimiento'] >= $fecha_actual) && ($item["estado"] != 2);
});

$datos = $datos_filtrados;

$api_url = 'http://localhost/api/api-Alumnos/notificaciones.php';

// Inicializar variables
$notificaciones_no_leidas = [];
$notificaciones_count = 0;

// Obtener respuesta de la API
$response = @file_get_contents($api_url);

// Verificar si la respuesta fue exitosa
if ($response !== false) {
    // Decodificar la respuesta JSON
    $data = json_decode($response, true);

    // Verificar si se decodificó correctamente
    if (json_last_error() === JSON_ERROR_NONE) {
        // Filtrar solo las notificaciones no leídas (id_notificacion_estado != 3) para la lista
        $notificaciones_no_leidas = array_filter($data, function ($notificacion) {
            return isset($notificacion['id_notificacion_estado']) && $notificacion['id_notificacion_estado'] != 3;
        });

        // Ordenar las notificaciones por fecha de envío, de más reciente a más antigua
        usort($notificaciones_no_leidas, function ($a, $b) {
            return strtotime($b['fecha_envio_notificacion']) - strtotime($a['fecha_envio_notificacion']);
        });

        // Contar solo las notificaciones no leídas
        $notificaciones_count = count($notificaciones_no_leidas);
    } else {
        // Manejar error de decodificación JSON
        error_log('Error al decodificar JSON: ' . json_last_error_msg());
    }
} else {
    // Manejar error al obtener la respuesta
    error_log('Error al obtener datos de la API: ' . error_get_last()['message']);
}
?>

<script src="/gestiondepartamentoalumnos/js/notificaciones.js"></script>
<div class="navbar navbar-expand-lg" id="notificaciones">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link icon-notificaciones" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa-solid fa-bell icon-campana"></i>
                        <!-- Mostrar el número de notificaciones no leídas solo si hay notificaciones -->
                        <?php if ($notificaciones_count > 0): ?>
                            <span class="badge bg-danger" id="count-label"><?php echo $notificaciones_count; ?></span>
                        <?php endif; ?>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" id="notificationDropdown" aria-labelledby="notificationsDropdown" style="max-height: 500px; overflow-y: auto;">
                        <div class="dropdown-divider"></div>
                        <?php if (count($notificaciones_no_leidas) > 0): ?>
                            <?php foreach ($notificaciones_no_leidas as $notificacion): ?>
                                <?php
                                $notificacion_id = $notificacion['id_notificacion'];
                                $fecha_envio = $notificacion['fecha_envio_notificacion'];
                                $tiempo_transcurrido = tiempo_transcurrido($fecha_envio);

                                $type = isset($notificacion['id_aviso']) ? "Aviso" : (isset($notificacion['id_tramite']) ? "Trámite" : "Desconocido");

                                // Mostrar la descripción adecuada dependiendo del tipo
                                if ($type == "Aviso") {
                                    $descrip = isset($notificacion['id_aviso_descripcion']) ? htmlspecialchars($notificacion['id_aviso_descripcion']) : 'Sin descripción';
                                    $id_relacionado = $notificacion['id_aviso'];  // usar el id_aviso
                                    $href = 'http://localhost/gestiondepartamentoalumnos/detalle.php?id=' . $id_relacionado;
                                } elseif ($type == "Trámite") {
                                    $descrip = isset($notificacion['id_tramite_descripcion']) ? htmlspecialchars($notificacion['id_tramite_descripcion']) : 'Sin descripción';
                                    $id_relacionado = $notificacion['id_tramite'];  // usar el id_tramite
                                    $href = 'http://localhost/gestiondepartamentoalumnos/tramites/detalle_tramite.php?id=' . $id_relacionado;
                                } else {
                                    $descrip = 'Notificación desconocida';
                                    $href = '#';
                                }

                                // Limitar la longitud de la descripción
                                $max_length = 30;
                                if (strlen($descrip) > $max_length) {
                                    $descrip = substr($descrip, 0, $max_length) . '...';
                                }
                                ?>
                                <div class="notificationContent mark-as-read" data-id="<?php echo $notificacion_id; ?>"  onclick="showNotification('<?php echo htmlspecialchars(json_encode($notificacion), ENT_QUOTES); ?>')">
                                    <i class='fa fa-check' style='color:#41cf2e;'></i>
                                    <span class='message-description'><b><?php echo $tiempo_transcurrido; ?></b></span><br>
                                    <span class='notification-detail'><b><?php echo $descrip; ?></b></span>
                                    <br><a href="javascript:void(0)" style="color: blue;">Ver detalle</a>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <div class="notificationContent">
                                <span>No hay notificaciones.</span>
                            </div>
                        <?php endif; ?>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
<div id="notificacionModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>
        <div id="cuerpo">
        </div>
    </div>
</div>

<link rel="stylesheet" href="/tramites/css/estilos.css">
<script>
    function showNotification(noti) {
        const notificationContent = document.querySelector('.notificationContent');
        var notificacion = JSON.parse(noti);
        console.log("noti: ", notificacion)
        var tipo = notificacion.id_aviso != null ? "aviso" : "tramite";
        openModal()
        getData(tipo, tipo == "aviso" ? notificacion.id_aviso : notificacion.id_tramite);
    }

    function getData(tipo, id) {
        const url = tipo == "aviso" ? "http://localhost/api/api-Alumnos/cartelera.php" : "http://localhost/api/api-Alumnos/tramites.php";
        fetch(url, {
                method: 'GET',
                headers: {
                    'Content-Type': 'application/json'
                }
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Error en la respuesta de la API');
                }
                return response.json();
            })
            .then(data => {
                if (tipo == "aviso") {
                    var avisoFiltrado = data.data.filter(x => x.id_aviso == id)[0];
                    let aviso = {
                        titulo: avisoFiltrado.titulo,
                        imagen: "<img src='data:image/jpeg;base64," + avisoFiltrado.imagen + "' alt='Imagen' class='img-aviso'>",
                        descripcion: avisoFiltrado.descripcion,
                        fecha_publicacion: formatDate(avisoFiltrado.fecha_publicacion),
                        adjunto: avisoFiltrado.adjunto
                    }
                    cuerpo.innerHTML = `
            <div class="mt-2">
                            <div class="aviso-completo bg-light">
                                <h1 class="mb-3 text-center" style="color: black;">${aviso.titulo}</h1>
                ${aviso.imagen}
                                <p class="descripcion-completa" style="color: black;">${aviso.descripcion}</p>

                                <div class="fecha-descarga-container">
                                    <p class="fecha">${aviso.fecha_publicacion}</p>
                                    ${aviso.adjunto ? `
        <div>
            <a href="data:application/pdf;base64,${aviso.adjunto}" download="${aviso.titulo}" class="btn btn-primary">Descargar adjunto</a>
        </div>
    ` : ''}
                                </div>
                            </div>
                        </div>
        `;
                } else if (tipo == "tramite") {
                    var tramiteFiltrado = data.filter(x => x.id_tramite == id)[0];
                    let tramite = {
                        titulo: tramiteFiltrado.tipo_tramite,
                        estado_tramite: tramiteFiltrado.estado_tramite,
                        responsable: tramiteFiltrado.responsable + " " + tramiteFiltrado.responsable_apellido,
                        fecha_creacion: formatDate(tramiteFiltrado.fecha_creacion),
                        adjunto: tramiteFiltrado.archivo
                    }
                    console.log("tramite:", tramite)
                    let estadoTramite = tramite.estado_tramite == "Pendiente" ? "estado-pendiente" : tramite.estado_tramite == "En Proceso" ? "estado-proceso" : "estado-completado"
                    
                    cuerpo.innerHTML = `
            <div class="mt-2">
                            <div class="aviso-completo bg-light">
                                <h1 class="mb-3 text-center" style="color: black;">${tramite.titulo}</h1>
                                <h4 class="mb-3 text-center" style="color: red;">¡Hay novedades sobre tu tramite!</h4>
                                <p class="descripcion-completa" style="color: black;">Responsable: ${tramite.responsable}</p>
                                <p class="descripcion-completa" style="color: black;"><bold>Estado:</bold> <span class="${estadoTramite}" style="padding: 4px; border-radius: 4px; font-weight: bold">${tramite.estado_tramite}</span></p>
                                
                                <div class="fecha-descarga-container">
                                <p class="fecha"><b>Fecha de creacion:</b> ${tramite.fecha_creacion}</p>
                                ${tramite.adjunto ? `
                                <div>
                                <a href="data:image/jpeg;base64,${tramite.adjunto}" download="${tramite.titulo}" class="btn btn-primary">Descargar adjunto</a>
                                </div>
                                ` : ''}
                                </div>
                                <p class="descripcion-completa text-center" style="color: black;"><button class="btn btn-info" onclick="window.location='/gestiondepartamentoalumnos/tramites/detalle_tramite.php?id=${tramiteFiltrado.id_tramite}'">+ Info</button></bold></p>
                            </div>
                        </div>
        `;
                }
            })
            .catch(error => {
                console.error('Error al hacer la solicitud de notificaciones:', error);
            });
    }
</script>