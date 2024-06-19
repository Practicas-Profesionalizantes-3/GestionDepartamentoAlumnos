<?php
session_start();
$api_url = 'http://localhost/api/api-Alumnos/cartelera.php';
?>
<?php ?>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Instituto Tecnologico Beltran</title>
  <link href="https://fonts.googleapis.com/css2?family=Kumbh+Sans&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="../fontawesome/css/all.min.css">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../slick/slick.min.css">
  <link rel="stylesheet" href="../slick/slick-theme.css">
  <link rel="stylesheet" href="../css/templatemo-upright.css">
  <link rel="stylesheet" href="../css/style.css">
  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</head>

<body>
  <?php
  include("../includes/header.php");
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
  </script>
  <div class="container">
    <div class="card">

      <div class="card-header">
        Agregar nuevo anuncio
      </div>
      <div class="card-body">

        <form id="formulario">
          <div class="mb-3">
            <label for="id_aviso_tipo" class="form-label">Tipo de aviso:</label>
            <input type="text" class="form-control" name="id_aviso_tipo" id="id_aviso_tipo" aria-describedby="helpId" placeholder="Tipo de aviso" required>
          </div>
          <div class="mb-3">
            <label for="id_usuario" class="form-label">Usuario:</label>
            <input type="text" class="form-control" name="id_usuario" id="id_usuario" aria-describedby="helpId" placeholder="Usuario" required>
          </div>
          <div class="mb-3">
            <label for="titulo" class="form-label">Titulo:</label>
            <input type="text" class="form-control" name="titulo" id="titulo" aria-describedby="helpId" placeholder="Titulo" required>
          </div>
          <div class="mb-3">
            <label for="descripcion" class="form-label">Descripcion:</label>
            <input type="text" class="form-control" name="descripcion" id="descripcion" aria-describedby="helpId" placeholder="Descripcion" required>
          </div>
          <div class="mb-3">
            <label for="fecha_publicacion" class="form-label">Fecha de Publicacion:</label>
            <input type="text" class="form-control" name="fecha_publicacion" id="fecha_publicacion" aria-describedby="helpId" placeholder="Fecha de Publicacion" required>
          </div>
          <div class="mb-3">
            <label for="fecha_vencimiento" class="form-label">Fecha de Vencimiento:</label>
            <input type="text" class="form-control" name="fecha_vencimiento" id="fecha_vencimiento" aria-describedby="helpId" placeholder="Fecha de Vencimiento" required>
          </div>
          <div class="mb-3">
            <label for="adjunto" class="form-label">Adjunto:</label>
            <input type="text" class="form-control" name="adjunto" id="adjunto" aria-describedby="helpId" placeholder="Adjunto" required>
          </div>
          <div class="mb-3">
            <label for="fijado" class="form-label">Fijado:</label>
            <input type="text" class="form-control" name="fijado" id="fijado" aria-describedby="helpId" placeholder="Fijado" required>
          </div>
          <div class="mb-3">
            <label for="ubicacion_imagen" class="form-label">Imagen:</label>
            <input type="file" class="form-control" name="ubicacion_imagen" id="ubicacion_imagen" placeholder="ubicacion_imagen" aria-describedby="fileHelpId" required>
          </div>
          <div class="mb-3">
            <label for="id_aviso_estado" class="form-label">Estado del aviso:</label>
            <input type="text" class="form-control" name="id_aviso_estado" id="id_aviso_estado" aria-describedby="helpId" placeholder="Estado del aviso" required>
          </div>

          <button type="submit" class="btn btn-success">Agregar</button>
          <button type="submit" class="btn btn-info" onclick="location.href='index.php'">Cancelar</button>
        </form>
      </div>
      <div class="card-footer text-muted">
      </div>
    </div>
  </div>

  <script src="js/create.js"></script>
  <script src="https://kit.fontawesome.com/9de136d298.js" crossorigin="anonymous"></script>
  <script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>

</body>