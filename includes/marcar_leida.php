<?php
if (isset($_GET['id']) && isset($_GET['tipo'])) {
    $id_notificacion = intval($_GET['id']);
    $tipo_notificacion = $_GET['tipo']; // 'aviso' o 'tramite'

    // URL de la API para actualizar el estado de la notificación
    $api_url = 'http://localhost/api/api-Alumnos/notificaciones.php';

    // Crear los datos para enviar en la solicitud POST
    $data = array(
        'id_notificacion' => $id_notificacion,
        'id_notificacion_estado' => 3 // Estado de "leída"
    );

    // Iniciar la solicitud cURL
    $ch = curl_init($api_url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST'); // Método POST
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

    // Ejecutar la solicitud
    $response = curl_exec($ch);
    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    // Verificar si la solicitud fue exitosa
    if ($http_code == 200) {
        // Redirigir a la página correspondiente (aviso o trámite)
        if ($tipo_notificacion == 'aviso') {
            header("Location: detalle.php?id=" . $id_notificacion);
        } elseif ($tipo_notificacion == 'tramite') {
            header("Location: notificacion.php?id=" . $id_notificacion);
        }
    } else {
        echo "Error al actualizar el estado de la notificación. Código de respuesta: " . $http_code;
    }

    // Cerrar cURL
    curl_close($ch);
} else {
    echo "ID de notificación o tipo no proporcionado.";
}
?>



header("Location: http://localhost/gestiondepartamentoalumnos/detalle.php?=" . $id_notificacion);


header("Location: http://localhost/gestiondepartamentoalumnos/includes/notificacion.php?id=1?id=" . $id_notificacion);
