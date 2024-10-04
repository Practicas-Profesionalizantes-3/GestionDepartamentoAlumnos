<?php
$aviso_id = isset($_GET['id']) ? intval($_GET['id']) : null;

if ($aviso_id) {
    // Llamar a la API para obtener los datos del aviso
    $api_url = 'http://localhost/api/api-Alumnos/cartelera.php?id_aviso=' . $aviso_id;
    $response = file_get_contents($api_url);
    $aviso_data = json_decode($response, true);

    // Verifica si la respuesta fue exitosa y extrae los datos
    if ($aviso_data && $aviso_data['success'] === true) {
        // Convertir el JSON en la clave "data" a un array
        $data = json_decode($aviso_data['data'], true);

        // Verifica si se obtuvieron datos
        if (!empty($data)) {
            // Asignar los datos del aviso a las variables
            $titulo = htmlspecialchars($data[0]['titulo']); // Obtener el primer aviso
            $descripcion = htmlspecialchars($data[0]['descripcion']);
            $imagen = !empty($data[0]['imagen']) ? "data:image/jpeg;base64," . $data[0]['imagen'] : "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQheiic81_IfFML2GH1T9qtee4KTajErPLBmg&s";
            $fecha = htmlspecialchars($data[0]['fecha_publicacion']);
            $adjunto = isset($data[0]['adjunto']) ? $data[0]['adjunto'] : '';
        } else {
            // Aviso no encontrado
            $titulo = 'Aviso no encontrado';
            $descripcion = 'El aviso solicitado no existe o ha sido eliminado.';
            $imagen = "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQheiic81_IfFML2GH1T9qtee4KTajErPLBmg&s";
            $fecha = '';
            $adjunto = '';
        }
    } else {
        // Error al obtener el aviso
        $titulo = 'Error al obtener aviso';
        $descripcion = 'No se pudo obtener el aviso. Inténtelo más tarde.';
        $imagen = "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQheiic81_IfFML2GH1T9qtee4KTajErPLBmg&s";
        $fecha = '';
        $adjunto = '';
    }
} else {
    // ID del aviso no especificado
    $titulo = 'ID de aviso no especificado';
    $descripcion = 'No se ha proporcionado un ID de aviso válido.';
    $imagen = "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQheiic81_IfFML2GH1T9qtee4KTajErPLBmg&s";
    $fecha = '';
    $adjunto = '';
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <footer>
        <div class="container">
            <div class="row single-footer-widget">
                <div class="col-md-6 col-sm-7">
                    <span class="text-light">Prohibida la reproducción total ó parcial de imágenes y textos. Todos los derechos reservados.</span>
                </div>
                <div class="col-md-6 col-sm-5">
                    <div class="column-right">
                        <span class="text-light">Política de Privacidad. Términos y condiciones.</span>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>