<?php
if (isset($_GET['id']) && isset($_GET['tipo'])) {
    $id_notificacion = (int)$_GET['id']; // Asegúrate de que sea un entero
    $tipo = $_GET['tipo'];

    $api_url = 'http://localhost/api/api-Alumnos/notificaciones.php';
    $data = [
        'id_notificacion' => $id_notificacion,
        'id_notificacion_estado' => 3 // Estado como leída
    ];

    $payload = json_encode($data);
    var_dump($payload); // Muestra el payload para depuración

    $ch = curl_init($api_url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);

    $result = curl_exec($ch);

    if (curl_errno($ch)) {
        echo 'Error en la solicitud cURL: ' . curl_error($ch);
    } else {
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        if ($http_code >= 400) {
            echo 'Error en la API, código HTTP: ' . $http_code;
        } else {
            $response = json_decode($result, true);
            var_dump($response);
        }
    }

    curl_close($ch);

    if ($http_code < 400) {
        if ($tipo == 'aviso') {
            header("Location: aviso.php?id=" . $id_notificacion);
        } elseif ($tipo == 'tramite') {
            header("Location: tramite.php?id=" . $id_notificacion);
        } else {
            header("Location: index.php");
        }
    }
} else {
    echo "ID o tipo no proporcionados correctamente.";
}

