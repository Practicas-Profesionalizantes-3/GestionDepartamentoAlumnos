<?php
session_start();

// URL de la API para obtener los tipos de trámites
$api_url_tramites = 'http://localhost/api/api-Alumnos/tramites.php';

// Obtener los datos de la API
$response = file_get_contents($api_url_tramites);
$tramites = json_decode($response, true);

$data = $tramites;

// Función para generar el bloque HTML de un trámite
function generar_tramite_html($datos) {
    $boton_ticket = '';
    if ($datos['estado_tramite'] == 'Pendiente') {
        $boton_ticket = '<button class="btn-modal" data-toggle="modal" data-target="#modal-tramite-' . $datos['id_tramite'] . '">Generar ticket</button>';
    }
    return "
      <div class='container_tramites_dpto' draggable='true' ondragstart='drag(event)' id='tramite-{$datos['id_tramite']}'>
        <h4 class='titlulo_tramites_dpto'>{$datos['tipo_tramite']}</h4>
        <p class='subtitle_tramites_dpto'>{$datos['descripcion']}</p>
        <div class='actions-tramites_dpto'>
            <img src='../img/flechas.jpg' class='img-flecha_tramites_dpto' alt='' />
            <img src='../img/tilde.jpg' class='img-tilde_tramites_dpto' alt='' />
            <label class='responsable_tramites_dpto'> Responsable: {$datos['responsable']}</label>
        </div>
        <div class='info_dpto'>
            <label class='estado_tramites_dpto'>{$datos['estado_tramite']}</label>
            <input type='text' alt='Avatar' class='avatar_dpto' value='{$datos['usuarioap']} {$datos['usuario']}'>
        </div>
        <p class='fecha_dpto'>{$datos['fecha_creacion']}</p>
            $boton_ticket
    </div>
    
    <!-- Modal Ticket-->
<div class='modal fade modal-tramites' id='modal-tramite-{$datos['id_tramite']}' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true' data-backdrop='false' style='z-index: 1000;'>
    <div class='modal-dialog' role='document'>
        <div class='modal-content'>
            <div class='modal-header'>
                <h2 class='modal-title' id='exampleModalLabel'>{$datos['tipo_tramite']}</h2>
                <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                </button>
            </div>
            <div class='modal-body'>
                <div class='modal-usuario'>
 
    </div>
                <div class='modal-descripcion'>
                    {$datos['descripcion']}
                </div>
            </div>
            <div class='modal-footer' style='display: flex; justify-content: space-between;'>
                <div class='modal-responsable'>
                    <span class='responsable'>Responsable: {$datos['responsable']}</span>
                </div>
                <button id='imprimirPantalla' type='button' class='btn btn-secondary' data-modal-id='{$datos['id_tramite']}'>Imprimir Ticket</button>
            </div>
        </div>
    </div>
</div>";
};

$items_per_page = 5; // Número de filas por página
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1; // Página actual
$offset = ($page - 1) * $items_per_page; // Desplazamiento

// Obtener el total de tramites
$total_tramites = count($data);

// Calcular el total de páginas
$total_pages = ceil($total_tramites / $items_per_page);

// Obtener los tramites para la página actual
$current_page_tramites = array_slice($data, $offset, $items_per_page);
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
          $tramites_pendientes = array_filter($data, function($tramite) {
    return $tramite['estado_tramite'] == 'Pendiente';
});

$tramites_en_proceso = array_filter($data, function($tramite) {
    return $tramite['estado_tramite'] == 'En Proceso';
});

$tramites_terminados = array_filter($data, function($tramite) {
    return $tramite['estado_tramite'] == 'Completado';
});

$items_per_page = 5; // Número de filas por página
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1; // Página actual
$offset = ($page - 1) * $items_per_page; // Desplazamiento

$tramites_pendientes_paginados = array_slice($tramites_pendientes, $offset, $items_per_page);
$tramites_en_proceso_paginados = array_slice($tramites_en_proceso, 0, $items_per_page); // Mostrar todos los trámites en Proceso en la página 1
$tramites_terminados_paginados = array_slice($tramites_terminados, 0, $items_per_page); // Mostrar todos los trámites Terminados en la página 1

foreach ($estados as $estado => $id_columna) { ?>
    <div class="col-lg-3 col-md-3 col-sm-12" id="<?php echo $id_columna; ?>" ondrop="drop(event)" ondragover="allowDrop(event)">
        <h2><?php echo $estado; ?></h2>
        <?php 
        if ($estado == 'Pendiente') {
            foreach ($tramites_pendientes_paginados as $datos) {
                echo generar_tramite_html($datos);
            }
        } elseif ($estado == 'En Proceso') {
            foreach ($tramites_en_proceso_paginados as $datos) {
                echo generar_tramite_html($datos);
            }
        } elseif ($estado == 'Completado') {
            foreach ($tramites_terminados_paginados as $datos) {
                echo generar_tramite_html($datos);
            }
        }
        ?>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script>
</body>

</html>