<?php
$api_url = 'http://localhost/api/api-Alumnos/cartelera.php';

$response = file_get_contents($api_url);
$datas = json_decode($response, true);
$data = $datas['data'];
usort($data, function ($a, $b) {
    return $a['id_aviso'] - $b['id_aviso'];
});

$avisos = $data;

$items_per_page = 5; // Número de filas por página
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1; // Página actual
$offset = ($page - 1) * $items_per_page; // Desplazamiento

// Obtener el total de avisos
$total_avisos = count($avisos);

// Calcular el total de páginas
$total_pages = ceil($total_avisos / $items_per_page);

// Obtener los avisos para la página actual
$current_page_avisos = array_slice($avisos, $offset, $items_per_page);
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>  <!-- SwettAlert -->
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
    
    <div class="listadoAvisos" style="margin-left: 88px;">
        <div class="card-header">
            <h3 class="card-title tm-text-primary">Lista de Avisos</h3>
            <a class="btn btn-primary mt-2 mr-2" href="Create.php" role="button">Crear anuncio</a>
        </div>
        <div style="display:flex;justify-content:center; align-items:center;">
            <div style="width: 90%; border: 4px solid #64bded; border-radius: 8px">
                <div class="bg-light table-responsive">
                    <table class="table table-bordered table-striped table-hover">
                        <thead class="thead" style="background-color: #64bded; color:white">
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Tipo de aviso</th>
                                <th scope="col">Usuario</th>
                                <th scope="col">Título</th>
                                <th scope="col">Descripción</th>
                                <th scope="col">Fecha de publicación</th>
                                <th scope="col">Fecha de vencimiento</th>
                                <th scope="col">Adjunto</th>
                                <th scope="col">Fijado</th>
                                <th scope="col">Imagen</th>
                                <th scope="col">Estado del aviso</th>
                                <th scope="col">Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($current_page_avisos as $datos) { ?>
                                <tr>
                                    <td><?php echo $datos['id_aviso']; ?></td>
                                    <td><?php echo $datos['aviso_tipo']; ?></td>
                                    <td><?php echo $datos['id_usuario']; ?></td>
                                    <td><?php echo $datos['titulo']; ?></td>
                                    <td><?php echo $datos['descripcion']; ?></td>
                                    <td><?php echo date('d-m-Y H:i', strtotime($datos['fecha_publicacion'])); ?></td>
                                    <td><?php echo date('d-m-Y', strtotime($datos['fecha_vencimiento'])); ?></td>
                                    <td><?php if($datos["adjunto"] != ""){ ?>
                                    <a href="data:application/pdf;base64,<?= $datos["adjunto"]; ?>" download="<?= htmlspecialchars($datos["titulo"]); ?>">Descargar adjunto</a>
                                    <?php } else {?>
                                        No
                                        <?php } ?>
                                    </td>
                                    <td><?php echo $datos['fijado']; ?></td>
                                    <td><img width="70" src="<?= $datos["imagen"] != "" ? "data:image/jpeg;base64," . $datos["imagen"] : "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQheiic81_IfFML2GH1T9qtee4KTajErPLBmg&s" ?>" /></td>
                                    <td><?php echo $datos['estado']; ?></td>
                                    <td>
                                        <a class="btn btn-info" href="Update.php?id_aviso=<?php echo $datos['id_aviso']; ?>" role="button">Editar</a>
                                        <?php
                                        if ($datos["estado"] != "Inactivo") { ?>
                                            <a class="btn btn-danger" style="color:white" onclick="eliminarAviso(<?= $datos['id_aviso']; ?>)" role="button">Eliminar</a><?php } ?>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
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
    </div>
    <script src="../js/index.js"></script>
    <script src="../js/navbar.js"></script>
    <script src="js/delete.js"></script>
    <script src="https://kit.fontawesome.com/9de136d298.js" crossorigin="anonymous"></script>
</body>

</html>