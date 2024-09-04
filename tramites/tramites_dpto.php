<?php
session_start();

// URL de la API para obtener los tipos de trámites
$api_url_tramites = 'http://localhost/api/api-Alumnos/tramites.php';

// Obtener los datos de la API
$response = file_get_contents($api_url_tramites);
$tramites = json_decode($response, true);

$data = $tramites;

// Función para obtener las iniciales del responsable
function obtener_iniciales($usuario) {
    $nombre = $usuario['usuario'];
    $apellido = $usuario['usuarioap'];
    $inicial_nombre = substr($nombre, 0, 1);
    $inicial_apellido = substr($apellido, 0, 1);
    return $inicial_nombre . $inicial_apellido;
}

// Función para generar el bloque HTML de un trámite
function generar_tramite_html($datos, $iniciales) {
    return "
    <div class='container_tramites_dpto' draggable='true' ondragstart='drag(event)' id='tramite-{$datos['id_tramite']}'>
        <h4 class='titlulo_tramites_dpto'>{$datos['tipo_tramite']}</h4>
        <p class='subtitle_tramites_dpto'>{$datos['descripcion']}</p>
        <div class='actions-tramites_dpto'>
            <img src='../img/flechas.jpg' class='img-flecha_tramites_dpto' alt='' />
            <img src='../img/tilde.jpg' class='img-tilde_tramites_dpto' alt='' />
            <label class='responsable_tramites_dpto'>{$datos['responsable']}</label>
        </div>
        <div class='info_dpto'>
            <label class='estado_tramites_dpto'>{$datos['estado_tramite']}</label>
            <input type='text' alt='Avatar' class='avatar_dpto' value='{$iniciales}'>
        </div>
        <p class='fecha_dpto'>{$datos['fecha_creacion']}</p>
    </div>";
}

$items_per_page = 5; // Número de filas por página
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1; // Página actual
$offset = ($page - 1) * $items_per_page; // Desplazamiento

// Obtener el total de tramites
$total_tramites = count($data);

// Calcular el total de páginas
$total_pages = ceil($total_tramites / $items_per_page);

// Obtener los tramites para la página actual
$current_page_tramites = array_slice($data, $offset, $items_per_page);
$iniciales = obtener_iniciales($current_page_tramites[0]);

?>

<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instituto Tecnologico Beltran</title>
    <link href="https://fonts.googleapis.com/css2?family=Kumbh+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/templatemo-upright.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="css/estilos.css">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'> <!----===== Boxicons CSS ===== -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script> <!--<title>Dashboard Sidebar Menu</title>-->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css"> <!-- Toastify CSS -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script> <!-- Toastify JS-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> <!-- SwettAlert -->
</head>
<body>
    <?php include("../includes/navbar.php"); ?>

    <div class="listadoAvisos" style="margin-left: 88px;">
        <div class="card-header">
            <h1 class="card-title tm-text-primary">Tramites</h1>
            <a type="buttom" class="btn btn-primary mis-tramites-btn" href="index.php" style="align-items: end;" role="button">Volver</a>
        </div>
    </div>

    <div class="tm-section-wrap">
        <div class="row">
            <?php 
            $estados = ['Pendiente' => 'pendiente', 'En Proceso' => 'en-proceso', 'Completado' => 'terminado'];
            foreach ($estados as $estado => $id_columna) { ?>
                <div class="col-lg-3 col-md-3 col-sm-12" id="<?php echo $id_columna; ?>" ondrop="drop(event)" ondragover="allowDrop(event)">
                    <h2><?php echo $estado; ?></h2>
                    <?php foreach ($current_page_tramites as $datos) {
                        if ($datos['estado_tramite'] == $estado) {
                            echo generar_tramite_html($datos, $iniciales);
                        }
                    } ?>
                </div>
            <?php } ?>
        </div>
    </div>

    <!-- Paginación -->
    <nav>
        <ul class="pagination justify-content-center mt-3">
            <?php if ($page > 1) : ?>
                <li class="page-item">
                    <a class="page-link" href="?page=<?php echo $page - 1; ?>">Anterior</a>
                </li>
            <?php endif; ?>

            <?php for ($i = 1; $i <= $total_pages; $i++) : ?>
                <li class="page-item <?php echo ($i == $page) ? 'active' : ''; ?>">
                    <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                </li>
            <?php endfor; ?>

            <?php if ($page < $total_pages) : ?>
                <li class="page-item">
                    <a class="page-link" href="?page=<?php echo $page + 1; ?>">Siguiente</a>
                </li>
            <?php endif; ?>
        </ul>
    </nav>

    <script src="js/tramites_dpto.js"></script>
    <script src="../js/index.js"></script>
    <script src="js/delete.js"></script>
    <script src="https://kit.fontawesome.com/9de136d298.js" crossorigin="anonymous"></script>
</body>
</html>
