<?php
//API - DOCUMENTO_TIPOS
$combo_documento_tipos_url = "http://localhost/api/api-Alumnos/documento_tipos.php";
$response_documento_tipos = file_get_contents($combo_documento_tipos_url);
$data_documento_tipos = json_decode($response_documento_tipos, true);

//API - USUARIO_ESTADOS
$combo_usuario_estados_url = "http://localhost/api/api-Alumnos/usuario_estados.php";
$response_usuario_estados = file_get_contents($combo_usuario_estados_url);
$data_usuario_estados = json_decode($response_usuario_estados, true);

//API - CARRERAS
$combo_carreras_url = "http://localhost/api/api-Alumnos/carreras.php";
$response_carreras = file_get_contents($combo_carreras_url);
$data_carreras = json_decode($response_carreras, true);

//API - USUARIO_TIPOS
$combo_usuario_tipos_url = "http://localhost/api/api-Alumnos/usuario_tipos.php";
$response_usuario_tipos = file_get_contents($combo_usuario_tipos_url);
$data_usuario_tipos = json_decode($response_usuario_tipos, true);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instituto Tecnologico Beltran</title>
    <link href="https://fonts.googleapis.com/css2?family=Kumbh+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="/gestiondepartamentoalumnos/css/bootstrap.min.css">
    <link rel="stylesheet" href="/gestiondepartamentoalumnos/css/templatemo-upright.css">
    <link rel="stylesheet" href="/gestiondepartamentoalumnos/css/style.css">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'> <!----===== Boxicons CSS ===== -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script> <!--<title>Dashboard Sidebar Menu</title>-->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css"> <!-- Toastify CSS -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script> <!-- Toastify JS-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>  <!-- SwettAlert -->
</head>

<body>
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

  <?php
  include("../includes/navbar.php");
  ?>

  <div class="container">
    <div class="card">

      <div class="card-header">
        Agregar nuevo usuario
      </div>
      <div class="card-body">

        <form id="formulario">
          <div class="mb-3">
            <label for="nombre" class="form-label">Nombre:</label>
            <input type="text" class="form-control" name="nombre" id="nombre" aria-describedby="helpId" placeholder="Nombre">
          </div>
          <div class="mb-3">
            <label for="apellido" class="form-label">Apellido:</label>
            <input type="text" class="form-control" name="apellido" id="apellido" aria-describedby="helpId" placeholder="Apellido">
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Password:</label>
            <input type="text" class="form-control" name="password" id="password" aria-describedby="helpId" placeholder="Password">
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email:</label>
            <input type="email" class="form-control" name="email" id="email" aria-describedby="helpId" placeholder="Email">
          </div>
          <div class="mb-3">
            <label for="id_documento_tipo" class="form-label">Tipo de Documento:</label>
            <select class="form-control" name="id_documento_tipo" id="id_documento_tipo">
              <?php
                foreach ($data_documento_tipos as $documento_tipo) {
                ?>
                  <option value="<?php echo $documento_tipo["id_documento_tipo"]; ?>" ;?>
                    <?php echo $documento_tipo["descripcion"]; ?>
                  </option>
                <?php
                }
              ?>
            </select>
          </div>
          <div class="mb-3">
            <label for="numero_documento" class="form-label">Numero de Documento:</label>
            <input type="text" class="form-control" name="numero_documento" id="numero_documento" aria-describedby="helpId" placeholder="Numero de Documento">
          </div>
          <div class="mb-3">
            <label for="id_usuario_estado" class="form-label">Estado de Usuario:</label>
            <select class="form-control" name="id_usuario_estado" id="id_usuario_estado">
              <?php
                foreach ($data_usuario_estados as $usuario_estado) {
                ?>
                  <option value="<?php echo $usuario_estado["id_usuario_estado"]; ?>" ;?>
                    <?php echo $usuario_estado["descripcion"]; ?>
                  </option>
                <?php
                }
              ?>
            </select>
          </div>
          <div class="mb-3">
            <label for="id_carrera" class="form-label">Carrera:</label>
            <select class="form-control" name="id_carrera" id="id_carrera">
              <?php
                foreach ($data_carreras as $carrera) {
                ?>
                  <option value="<?php echo $carrera["id_carrera"]; ?>" ;?>
                    <?php echo $carrera["descripcion"]; ?>
                  </option>
                <?php
                }
              ?>
            </select>
          </div>
          <div class="mb-3">
            <label for="anio" class="form-label">Año:</label>
            <input type="text" class="form-control" name="anio" id="anio" aria-describedby="helpId" placeholder="Año">
          </div>
          <div class="mb-3">
            <label for="comision" class="form-label">Comision:</label>
            <input type="text" class="form-control" name="comision" id="comision" aria-describedby="helpId" placeholder="Comisión">
          </div>
          <div class="mb-3">
            <label for="id_usuario_tipo" class="form-label">Tipo de Usuario:</label>
            <select class="form-control" name="id_usuario_tipo" id="id_usuario_tipo">
              <?php
                foreach ($data_usuario_tipos as $usuario_tipo) {
                ?>
                  <option value="<?php echo $usuario_tipo["id_usuario_tipo"]; ?>" ;?>
                    <?php echo $usuario_tipo["descripcion"]; ?>
                  </option>
                <?php
                }
              ?>
            </select>
          </div>

          <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-success mr-2" id="agregar-usuario">Agregar</button>
            <button type="submit" class="btn btn-info  ml-2" onclick="location.href='index.php'">Cancelar</button>
          </div>

        </form>
      </div>
    </div>
  </div>
  
  <script src="../js/index.js"></script>
  <script src="js/create.js"></script>
  <script src="https://kit.fontawesome.com/9de136d298.js" crossorigin="anonymous"></script>
  <script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>
</body>