<?php
$api_url = 'http://localhost/api/api-Alumnos/cartelera.php';
date_default_timezone_set('America/Buenos_Aires');
$hoy = date("Y-m-d");
$response = file_get_contents($api_url);
$data = json_decode($response, true);
$avisos = $data["data"];

$id_aviso_editar = $_GET['id_aviso'];
$aviso = null;
foreach ($avisos as $aviso_temp) {
  if ($aviso_temp['id_aviso'] == $id_aviso_editar) {
    $aviso = $aviso_temp;
    break;
  }
}
echo "<script>
  console.log(" . json_encode($aviso) . ")
</script>";

$combo_aviso_tipo_url = "http://localhost/api/api-Alumnos/aviso_tipo.php";
$response_aviso_tipos = file_get_contents($combo_aviso_tipo_url);
$data_aviso_tipos = json_decode($response_aviso_tipos, true);

if (!$aviso) {
  http_response_code(404); // No encontrado
  echo json_encode(['error' => 'Aviso no encontrado']);
  exit;
} else {
  //header('Location: index.php');
}
?>

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
      if (usuario.id_usuario_estado != 1) {
        window.location.href = '../index.php';
      }
    }

    // Lógica para manejar las fechas
    $(document).ready(function() {
    // Asignar la fecha actual del aviso
    $('#fecha_publicacion').val(<?php echo json_encode($aviso['fecha_publicacion']); ?>);

    $('#fecha_publicacion').on('input', function() {
        var selectedDate = $(this).val();
        var hoy = new Date().toISOString().split('T')[0]; // Obtener la fecha de hoy
        
        if (selectedDate < hoy) {
            $('#fechaError').show(); // Mostrar el mensaje de error
            $(this).val(<?php echo json_encode($aviso['fecha_publicacion']); ?>); // Restablecer al valor anterior
            
            // Ocultar el mensaje después de 2 segundos
            setTimeout(function() {
                $('#fechaError').hide();
            }, 2000);
        } else {
            $('#fechaError').hide(); // Ocultar el mensaje de error
        }
    });

    $('#fecha_publicacion').on('change', function() {
        var fechaPublicacion = $(this).val() + "T00:00"; // Asumiendo que la hora inicial es 00:00
        $('#fecha_vencimiento').attr('min', fechaPublicacion); // Establecer el mínimo para fecha de vencimiento

        // Validar fecha de vencimiento
        if ($('#fecha_vencimiento').val() && $('#fecha_vencimiento').val() < fechaPublicacion) {
            $('#fecha_vencimiento').val(fechaPublicacion); // Restablecer a la fecha mínima
        }
    });

    $('#fecha_vencimiento').on('change', function() {
        var fechaPublicacion = $('#fecha_publicacion').val() + "T00:00"; // Obtener la fecha de publicación
        var fechaVencimiento = $(this).val();

        // Mostrar error si la fecha de vencimiento es anterior a la fecha de publicación
        if (fechaVencimiento < fechaPublicacion) {
            $('#fechaVencimientoError').show(); // Mostrar el mensaje de error
            $(this).val(fechaPublicacion); // Restablecer a la fecha mínima
            
            // Ocultar el mensaje después de 2 segundos
            setTimeout(function() {
                $('#fechaVencimientoError').hide();
            }, 2000);
        } else {
            $('#fechaVencimientoError').hide(); // Ocultar el mensaje de error
        }
    });
});

</script>
  </script>
  <div class="container">
    <div class="card">

      <div class="card-header">
        Editar anuncio
      </div>
      <div class="card-body">
        <?php if ($aviso) { ?>
          <form id="formulario">
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="id_aviso" value="<?php echo $aviso['id_aviso']; ?>">
            <div class="mb-3">
              <label for="id_aviso" class="form-label">Id aviso:</label>
              <input readonly type="text" class="form-control" value="<?php echo $aviso['id_aviso']; ?>" name="id_aviso" id="id_aviso" aria-describedby="helpId" placeholder="Tipo de aviso">
            </div>
            <div class="mb-3">
              <label for="id_aviso_tipo" class="form-label">Tipo de aviso:</label>
              <select class="form-control" name="id_aviso_tipo" id="id_aviso_tipo">
                <?php
                foreach ($data_aviso_tipos as $aviso_tipo) {
                ?>
                  <option value="<?php echo $aviso_tipo["id_aviso_tipo"]; ?>" <?= $aviso_tipo["descripcion"] == $aviso["aviso_tipo"] ? 'selected="selected"' : ''; ?>>
                    <?php echo $aviso_tipo["descripcion"]; ?>
                  </option>
                <?php
                }
                ?>
              </select>
            </div>
            <div class="mb-3">
              <label for="id_usuario" class="form-label">Usuario:</label>
              <input type="text" class="form-control" value="<?php echo $aviso['usuario']; ?>" readonly aria-describedby="helpId" placeholder="Usuario">
            </div>
            <div class="mb-3">
              <label for="titulo" class="form-label">Titulo:</label>
              <input type="text" class="form-control" value="<?php echo $aviso['titulo']; ?>" name="titulo" id="titulo" aria-describedby="helpId" placeholder="Titulo">
            </div>
            <div class="mb-3">
              <label for="descripcion" class="form-label">Descripcion:</label>
              <input type="text" class="form-control" value="<?php echo $aviso['descripcion']; ?>" name="descripcion" id="descripcion" aria-describedby="helpId" placeholder="Descripcion">
            </div>
            <div class="mb-3"> 
                <label for="fecha_publicacion" class="form-label">Fecha de publicación:</label>
                <input type="date" class="form-control" value="<?php echo $aviso['fecha_publicacion']; ?>" name="fecha_publicacion" id="fecha_publicacion" aria-describedby="helpId" placeholder="Fecha de publicación" data-publicacion-pasada="<?= $fecha_publicacion_pasada ? 'true' : 'false' ?>">
                <div id="fechaError" class="text-danger" style="display:none;">La nueva fecha de publicación no debe ser anterior a la fecha actual.</div>
            </div>
            <div class="mb-3">
                <label for="fecha_vencimiento" class="form-label">Fecha de vencimiento:</label>
                <input type="datetime-local" class="form-control" value="<?php echo date('Y-m-d\TH:i', strtotime($aviso['fecha_vencimiento'])); ?>" name="fecha_vencimiento" id="fecha_vencimiento" placeholder="Fecha de vencimiento">
                <div id="fechaVencimientoError" class="text-danger" style="display:none;">La fecha de vencimiento no puede ser anterior a la fecha de publicación.</div>
              </div>
            <div class="mb-3">    
                <label for="adjunto" class="form-label">Adjunto:</label>
                <div class="file-containerX">
                    <input type="file" accept=".pdf" class="form-control" name="adjunto" id="adjunto" aria-describedby="helpId" placeholder="Adjunto" data-existing="<?= $aviso['adjunto'] ?? ''; ?>">
                    <button type="button" id="eliminar-pdf" class="btn-iconX">
                        <i class="bi bi-x"></i>
                    </button>
                    <?php if ($aviso["adjunto"] != "") { ?>
                        <a href="data:application/pdf;base64,<?= $aviso["adjunto"]; ?>" download="<?= htmlspecialchars($aviso["titulo"]); ?>" class="download-link">Descargar adjunto</a>
                    <?php } ?>
                </div>
            </div>
            <div class="mb-3">
              <label for="fijado" class="form-label">Fijado:</label>
              <select class="form-control" name="fijado" id="fijado">
                <option value="0" <?= $aviso["fijado"] == "0" ? 'selected="selected"' : "" ?>>No</option>
                <option value="1" <?= $aviso["fijado"] == "1" ? 'selected="selected"' : "" ?>>Si</option>
              </select>
            </div>          
            <div class="mb-3">
                <label for="imagen" class="form-label">Imagen:</label>
                <div class="file-containerX">
                    <input type="file" accept="image/jpeg, image/png" class="form-control" name="imagen" id="imagen" placeholder="Imagen" aria-describedby="fileHelpId" data-existing="<?= $aviso['imagen'] ?? ''; ?>">
                    <button type="button" id="eliminar-imagen" class="btn-iconX">
                        <i class="bi bi-x"></i>
                    </button>
                    
                    <?php if ($aviso["imagen"] != "") { ?>
                        <a href="data:image/jpeg;base64,<?= $aviso["imagen"]; ?>" download="<?= htmlspecialchars($aviso["titulo"]) . '.jpg'; ?>">Descargar imagen</a>
                    <?php } else { ?>
                    <?php } ?>
                </div>
            </div>

            <div class="mb-3">
              <label for="id_aviso_estado" class="form-label">Estado del aviso:</label>
              <select class="form-control" name="id_aviso_estado" id="id_aviso_estado">
                <option value="1" <?= $aviso["estado"] == "Activo" ? 'selected="selected"' : "" ?>>Activo</option>
                <option value="2" <?= $aviso["estado"] == "Inactivo" ? 'selected="selected"' : "" ?>>Inactivo</option>
              </select>
            </div>
            <input type="text" value="<?= $aviso["id_usuario"] ?>" name="id_usuario" id="id_usuario" readonly hidden />
            <button type="submit" class="btn btn-success">Modificar</button>
            <button type="button" class="btn btn-info" onclick="location.href='index.php'">Cancelar</button>
          </form>
        <?php } ?>
      </div>
    </div>
  </div>

  <script src="../js/navbar.js"></script>
  <script src="js/update.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment-timezone/0.5.34/moment-timezone-with-data.min.js"></script>
  <script src="https://kit.fontawesome.com/9de136d298.js" crossorigin="anonymous"></script>
  <script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>
</body>