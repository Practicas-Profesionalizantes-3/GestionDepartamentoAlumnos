<?php
session_start();

// URL de la API para obtener los tipos de trámites
$api_url_tramites = 'http://localhost/api/api-Alumnos/tramites.php';

// Obtener los datos de la API
$response = file_get_contents($api_url_tramites);
$tramites = json_decode($response, true);

$data = $tramites;

$items_per_page = 5; // Número de filas por página
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1; // Página actual
$offset = ($page - 1) * $items_per_page; // Desplazamiento

// Obtener el total de tramites
$total_tramites = count($data);

// Calcular el total de páginas
$total_pages = ceil($total_tramites / $items_per_page);

// Obtener los tramites para la página actual
$current_page_tramites = array_slice($data, $offset, $items_per_page);
echo "<script>console.log(" . $response . ")</script>";

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
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'> <!----===== Boxicons CSS ===== -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script> <!--<title>Dashboard Sidebar Menu</title>-->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css"> <!-- Toastify CSS -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script> <!-- Toastify JS-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> <!-- SwettAlert -->
</head>

<body>
    <?php
    include("../includes/navbar.php");
    ?>
    <script>
        var loggedIn = sessionStorage.getItem('loggedIn');
        if (!loggedIn) {
            window.location.href = '../index.php'; // Redirigir al index si no está logueado
        } else {
            var usuario = JSON.parse(sessionStorage.getItem("usuario"));
            console.log(usuario)
            if (usuario.id_usuario_estado != 1) {
                window.location.href = '../index.php';
            }
        }
    </script>
 <style>
         body {
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 1350px; /* Ancho máximo del contenedor */
            
            margin: 60px auto 80px; /* Margen superior e inferior de 40px y centrado horizontalmente */
            padding: 20px; /* Paddings de 20px */
            background-color: #fff; /* Fondo blanco */
            border: 1px solid #ddd; /* Borde gris claro */
            border-radius: 20px; /* Borde redondeado de 10px */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5); /* Sombra leve */
        }
        input[type="text"] {
            border-radius: 20px; /* Borde redondeado */
            margin: 10px; /* Agregué un margen de 10px entre inputs */
            padding: 20px;
            width: 30%; /* Ancho de los inputs */
            margin-left: 30px; /* Agregué un margen izquierdo de 20px */
            display: inline-block; /* Mostrar inputs en línea */
            text-align: center; /* Centrar las letras */
          }
        .procesando {
            background-color: yellow; /* Fondo amarillo */
            color: white; /* Letras blancas */
            border: 4px solid darkorange; /* Borde amarillo oscuro */
            font-size: 20px; /* Tamaño de la letra */
            font-weight: bold;
        }
        .detalles {
            background-color: white; /* Fondo blanco */
            color: black; /* Letras negras */
            border: 4px solid black; /* Borde negro */
            font-size: 18px; /* Tamaño de la letra */

        }
        .usuario-responsable {
            background-color: black; /* Fondo negro */
            color: white; /* Letras blancas */
            border: 4px solid black; /* Borde negro */
            font-size: 17px; /* Tamaño de la letra */
            font-weight: bold;
          }

    </style>
    <div class="listadoAvisos" style="margin-left: 88px;">
        <div class="card-header">
            <h1 class="card-title tm-text-primary">Mis Tramites</h1>
            <a type="buttom" class="btn btn-primary mis-tramites-btn" href="index.php" style="align-items: end;" role="button">Volver</a>
        </div>
    </div>
    <?php foreach ($data as $tramite) : ?>
    <div class="container" style="width: 80%; margin: 20px auto;">
        <div style="display: flex; align-items: center;">
          <div style="display: flex; flex-direction: column; margin: 10px;">
            <span style="font-weight: bold; font-size: 18px;"><?php print_r ($tramite['tipo_tramite']); ?></span>
            <span style="margin-left: 50px; margin-top: 20px;"><?php echo ($tramite['descripcion']); ?></span>
        </div>
          <input type="text" id="procesando" class="procesando" placeholder=<?php print_r ($tramite['estado_tramite']); ?>>
          <input type="text" id="usuario-responsable" class="usuario-responsable" placeholder=<?php print_r ($tramite['responsable']); ?>>
        </div>
    </div>
    <?php endforeach; ?>
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


    <script src="../js/index.js"></script>
    <script src="../js/navbar.js"></script>
    <script src="js/delete.js"></script>
    <script src="https://kit.fontawesome.com/9de136d298.js" crossorigin="anonymous"></script>
</body>

</html>