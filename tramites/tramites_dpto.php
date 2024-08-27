<?php
session_start();

// URL de la API para obtener los tipos de trámites
$api_url_tramites = 'http://localhost/api/api-Alumnos/tramites.php';

// Obtener los datos de la API
$response = file_get_contents($api_url_tramites);
$tramites = json_decode($response, true);

$data = $tramites;

$iniciales = array();
foreach ($data as $usuario) {
    $nombre = $usuario['usuario'];
    $apellido = $usuario['usuarioap'];
    $inicial_nombre = substr($nombre, 0, 1);
    $inicial_apellido = substr($apellido, 0, 1);
    $iniciales = $inicial_nombre . $inicial_apellido;
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
    <link rel="stylesheet" href="css/estilos.css">
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


        function allowDrop(ev) {
    ev.preventDefault();
}

function drag(ev) {
    ev.dataTransfer.setData("text", ev.target.id);
}

function drop(ev) {
    ev.preventDefault();
    var data = ev.dataTransfer.getData("text");
    var tramite = document.getElementById(data);
    if (ev.target.id === "pendientes") {
        ev.target.appendChild(tramite);
    } else {
        ev.target.appendChild(tramite);
    }
    tramite.classList.add("dragged"); // Agrega una clase para indicar que el elemento ha sido arrastrado
}

// Agrega un evento para remover la clase "dragged" cuando el elemento es soltado
document.addEventListener("dragend", function(event) {
    var tramite = document.getElementById(event.target.id);
    tramite.classList.remove("dragged");
});



function allowDrop(ev) {
    ev.preventDefault();
}

function drag(ev) {
    ev.dataTransfer.setData("text", ev.target.id);
}

function drop(ev) {
    ev.preventDefault();
    var data = ev.dataTransfer.getData("text");
    var tramite = document.getElementById(data);
    var columna = ev.target.id;

    // Determinar el nuevo estado basado en la columna
    var estado = "";
    switch (columna) {
        case "pendiente":
            estado = "1"; // ID para 'Pendiente'
            break;
        case "en-proceso":
            estado = "2"; // ID para 'En Proceso'
            break;
        case "terminado":
            estado = "3"; // ID para 'Completado'
            break;
        default:
            console.error("Columna no válida");
            return;
    }

    // Obtener el ID del trámite (remover el prefijo 'tramite-')
    var idTramite = tramite.id.replace("tramite-", "");

    // Enviar la solicitud a la API para actualizar el estado
    fetch('http://localhost/api/api-Alumnos/tramites.php', {
        method: 'PUT',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({
            id_tramite: idTramite,
            id_estado_tramite: estado
        })
    })
    .then(response => {
        if (response.ok) {
            return response.json();
        } else {
            throw new Error('Error en la actualización');
        }
    })
    .then(data => {
        console.log(data);

        // Mover el trámite a la columna correcta
        ev.target.appendChild(tramite);
        tramite.classList.add("dragged");

        // Actualizar la página para reflejar los cambios
        location.reload(); // Esto recargará la página y reflejará los cambios en la base de datos
    })
    .catch(error => console.error(error));
}

// Evento para remover la clase 'dragged' cuando el elemento es soltado
document.addEventListener("dragend", function(event) {
    var tramite = document.getElementById(event.target.id);
    tramite.classList.remove("dragged");
});

    </script>

    <div class="listadoAvisos" style="margin-left: 88px;">
        <div class="card-header">
            <h1 class="card-title tm-text-primary">Tramites</h1>
            <a type="buttom" class="btn btn-primary mis-tramites-btn" href="index.php" style="align-items: end;" role="button">Volver</a>
        </div>
    </div>
    <div class="tm-section-wrap">
  <div class="row">
    <div class="col-lg-3 col-md-3 col-sm-12" id="pendiente" ondrop="drop(event)" ondragover="allowDrop(event)">
      <h2>Pendientes</h2>
      <?php foreach ($current_page_tramites as $datos) {
        if ($datos['estado_tramite'] == "Pendiente") { ?>
          <div class="container_tramites_dpto" draggable="true" ondragstart="drag(event)" id="tramite-<?php echo $datos['id_tramite']; ?>">
            <h4 class="titlulo_tramites"><?php echo $datos['tipo_tramite']; ?></h4>
            <p class="subtitle_tramites"><?php echo $datos['descripcion']; ?></p>
            <div class="actions-tramites">
              <img src="../img/flechas.jpg" class="img-flecha_tramites" alt="" />
              <img src="../img/tilde.jpg" class="img-tilde_tramites" alt="" />
              <label class="responsable_tramites"><?php echo $datos['responsable']; ?></label>
            </div>
            <div class="info">
              <label class="estado"><?php echo $datos['estado_tramite']; ?></label>
              <input type="text" alt="Avatar" class="avatar" value="<?php echo $iniciales; ?>">
            </div>
            <p class="fecha"><?php echo $datos['fecha_creacion']; ?></p>
          </div>
      <?php }
      } ?>
    </div>

    <div class="col-lg-3 col-md-3 col-sm-12" id="en-proceso" ondrop="drop(event)" ondragover="allowDrop(event)">
      <h2>En Proceso</h2>
      <?php foreach ($current_page_tramites as $datos) {
        if ($datos['estado_tramite'] == "En Proceso") { ?>
          <div class="container_tramites_dpto" draggable="true" ondragstart="drag(event)" id="tramite-<?php echo $datos['id_tramite']; ?>">
            <h4 class="titlulo_tramites"><?php echo $datos['tipo_tramite']; ?></h4>
            <p class="subtitle_tramites"><?php echo $datos['descripcion']; ?></p>
            <div class="actions-tramites">
              <img src="../img/flechas.jpg" class="img-flecha_tramites" alt="" />
              <img src="../img/tilde.jpg" class="img-tilde_tramites" alt="" />
              <label class="responsable_tramites"><?php echo $datos['responsable']; ?></label>
            </div>
            <div class="info">
              <label class="estado"><?php echo $datos['estado_tramite']; ?></label>
              <input type="text" alt="Avatar" class="avatar" value="<?php echo $iniciales; ?>">
            </div>
            <p class="fecha"><?php echo $datos['fecha_creacion']; ?></p>
          </div>
      <?php }
      } ?>
    </div>

    <div class="col-lg-3 col-md-3 col-sm-12" id="terminado" ondrop="drop(event)" ondragover="allowDrop(event)">
      <h2>Terminados</h2>
      <?php foreach ($current_page_tramites as $datos) {
        if ($datos['estado_tramite'] == "Completado") { ?>
          <div class="container_tramites_dpto" draggable="true" ondragstart="drag(event)" id="tramite-<?php echo $datos['id_tramite']; ?>">
            <h4 class="titlulo_tramites"><?php echo $datos['tipo_tramite']; ?></h4>
            <p class="subtitle_tramites"><?php echo $datos['descripcion']; ?></p>
            <div class="actions-tramites">
              <img src="../img/flechas.jpg" class="img-flecha_tramites" alt="" />
              <img src="../img/tilde.jpg" class="img-tilde_tramites" alt="" />
              <label class="responsable_tramites"><?php echo $datos['responsable']; ?></label>
            </div>
            <div class="info">
              <label class="estado"><?php echo $datos['estado_tramite']; ?></label>
              <input type="text" alt="Avatar" class="avatar" value="<?php echo $iniciales; ?>">
            </div>
            <p class="fecha"><?php echo $datos['fecha_creacion']; ?></p>
          </div>
      <?php }
      } ?>
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


            <script src="../js/index.js"></script>
            <script src="../js/navbar.js"></script>
            <script src="js/delete.js"></script>
            <script src="https://kit.fontawesome.com/9de136d298.js" crossorigin="anonymous"></script>
</body>

</html>