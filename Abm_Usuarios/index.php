<?php
$api_url = 'http://localhost/api/api-Alumnos/usuarios.php';

$response = file_get_contents($api_url);
$data = json_decode($response, true);

usort($data, function ($a, $b) {
    return $a['id_usuario'] - $b['id_usuario'];
});

$usuarios = $data;

$items_per_page = 5; // Número de filas por página
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1; // Página actual
$offset = ($page - 1) * $items_per_page; // Desplazamiento

// Obtener el total de usuarios 
$total_usuarios = count($usuarios);

// Calcular el total de páginas
$total_pages = ceil($total_usuarios  / $items_per_page);

// Obtener los usuarios  para la página actual
$current_page_usuarios  = array_slice($usuarios, $offset, $items_per_page);
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
    <script src="js/delete.js"></script>
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
            <h3 class="card-title tm-text-primary">Lista de Usuarios</h3>
            <a class="btn btn-primary mt-2 mr-2" href="Create.php" role="button">Agregar usuario</a>
        </div>
        <div style="display:flex;justify-content:center; align-items:center;">
            <div class="bg-light" style="width: 90%; border: 4px solid #64bded; border-radius: 8px">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover">
                        <thead class="thead" style="background-color: #64bded; color:white">
                            <tr>
                                <th scope="col">Id usuario</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Apellido</th>
                                <th scope="col">Email</th>
                                <th scope="col">Tipo de Documento</th>
                                <th scope="col">Estado de Usuario</th>
                                <th scope="col">Numero de Documento</th>
                                <th scope="col">Carrera</th>
                                <th scope="col">Año</th>
                                <th scope="col">Comision</th>
                                <th scope="col">Tipo de Usuario</th>
                                <th scope="col">Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($current_page_usuarios as $datos) { ?>
                                <tr>
                                    <td><?php echo $datos['id_usuario']; ?></td>
                                    <td><?php echo $datos['nombre']; ?></td>
                                    <td><?php echo $datos['apellido']; ?></td>
                                    <td><?php echo $datos['email']; ?></td>
                                    <td><?php echo $datos['documento_tipo']; ?></td>
                                    <td><?php echo $datos['usuario_estado']; ?></td>
                                    <td><?php echo $datos['numero_documento']; ?></td>
                                    <td><?php echo $datos['carrera']; ?></td>
                                    <td><?php echo $datos['anio']; ?></td>
                                    <td><?php echo $datos['comision']; ?></td>
                                    <td><?php echo $datos['usuario_tipo']; ?></td>
                                    <td> <a class="btn btn-info" href="Update.php?id_usuario=<?php echo $datos['id_usuario']; ?>" role="button">Editar</a>
                                        <a class="btn btn-danger" style="color:white" onclick="eliminarUsuario(<?= $datos['id_usuario']; ?>)" role="button">Eliminar</a>
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
    <script src="https://kit.fontawesome.com/9de136d298.js" crossorigin="anonymous"></script>
</body>

</html>