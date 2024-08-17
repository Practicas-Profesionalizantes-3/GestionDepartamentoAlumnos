<?php
session_start();

// URL de la API para obtener los tipos de trámites
$api_url_tramites_tipo = 'http://localhost/api/api-Alumnos/tramites_tipo.php';

// Obtener los datos de la API
$response = file_get_contents($api_url_tramites_tipo);
$tipos_tramites = json_decode($response, true);

$formularios = array(
    1 => 'formularios/alumno_regular.php',
    2 => 'formularios/justificar_inasistencia.php',
    3 => 'formularios/constancia_examen.php',
    4 => 'formularios/cambio_turno.php',
    5 => 'formularios/figura_oyente.php',
    6 => 'formularios/examen_final_libre.php',
);
$formularios_path = null;

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trámites - Instituto Tecnológico Beltran</title>
    <link href="https://fonts.googleapis.com/css2?family=Kumbh+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/templatemo-upright.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="tramites.css">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <?php include("../includes/navbar.php"); ?>
            <div class="tm-main">
                <div class="tm-section-wrap">
                    <div class="text-center mb-4">
                        <h1>Crea un trámite</h1>
                    </div>
                    <div class="row">
                        <?php
                       if (isset($tipos_tramites) && is_array($tipos_tramites)) {
                        foreach ($tipos_tramites as $tipo) {
                            $id_tramite_tipo = htmlspecialchars($tipo['id_tramite_tipo']);
                            $descripcion = htmlspecialchars($tipo['descripcion']); 
                            $formularios_path = $formularios[$id_tramite_tipo]; // Establece la ruta del formulario aquí
                    
                            // Generar el HTML para cada tarjeta de trámite
                            echo '<div class="col-12 col-sm-6 col-md-4 col-lg-2">'; 
                            echo '    <a href="' . $formularios_path . '?id=' . $id_tramite_tipo . '" class="tramite-card text-decoration-none">';
                            echo '        <div class="tramite-card-body d-flex align-items-center p-3 border rounded">';
                            echo '            <div class="tramite-card-image me-3">';
                            echo '                <img src="../img/logo.png" alt="Ícono Trámite" class="img-fluid">';
                            echo '            </div>';
                            echo '            <div class="tramite-card-content">';
                            echo '                <div class="tramite-card-title mb-2 h5">' . $descripcion . '</div>';
                            echo '                <div class="tramite-card-description">Aquí puedes crear un trámite de tipo ' . $descripcion . '.</div>';
                            echo '            </div>';
                            echo '        </div>';
                            echo '    </a>';
                            echo '</div>';
                        }
                    } else {
                            echo '<p>No se encontraron tipos de trámites.</p>';
                        }
                        ?>
                    </div>
                </div> <!-- .tm-section-wrap -->
            </div> <!-- .tm-main -->
        </div> <!-- .row -->
    </div> <!-- .container-fluid -->
    <?php include("../includes/footer.php"); ?>
    <script src="../js/index.js"></script>
    <script src="../js/navbar.js"></script>
    <script src="https://kit.fontawesome.com/9de136d298.js" crossorigin="anonymous"></script>
</body>
</html>
