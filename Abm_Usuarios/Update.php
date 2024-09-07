<?php
$api_url = 'http://localhost/api/api-Alumnos/usuarios.php';

$response = file_get_contents($api_url);
$data = json_decode($response, true);
$usuarios = $data;

$id_usuario_editar = $_GET['id_usuario'];
$usuario = null;
foreach ($usuarios as $usuario_temp) {
  if ($usuario_temp['id_usuario'] == $id_usuario_editar) {
    $usuario = $usuario_temp;
    break;
  }
}
echo "<script>
  console.log(" . json_encode($usuario) . ")
</script>";

$combo_carreras_url = "http://localhost/api/api-Alumnos/carreras.php";
$response_carreras = file_get_contents($combo_carreras_url);
$data_carreras = json_decode($response_carreras, true);

$combo_usuario_tipo_url = "http://localhost/api/api-Alumnos/usuario_tipos.php";
$response_usuario_tipo = file_get_contents($combo_usuario_tipo_url);
$data_usuario_tipo = json_decode($response_usuario_tipo, true);

$combo_documento_tipos_url = "http://localhost/api/api-Alumnos/documento_tipos.php";
$response_documento_tipos = file_get_contents($combo_documento_tipos_url);
$data_documento_tipos = json_decode($response_documento_tipos, true);

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
      if (usuario.id_usuario_estado != 1) {
        window.location.href = '../index.php';
      }
    }
  </script>
  <div class="container">
    <div class="card">

      <div class="card-header">
        Editar usuario
      </div>
      <div class="card-body">
        <?php if ($usuarios) { ?>
          <form id="formulario">
            <div class="mb-3">
              <label for="id_usuario" class="form-label">Id Usuario:</label>
              <input readonly type="text" class="form-control" value="<?php echo $usuario['id_usuario']; ?>" aria-describedby="helpId">
            </div>
            <div class="mb-3">
              <label for="nombre" class="form-label">Nombre:</label>
              <input type="text" class="form-control" value="<?php echo $usuario['nombre']; ?>" name="nombre" id="nombre" aria-describedby="helpId">
            </div>
            <div class="mb-3">
              <label for="apellido" class="form-label">Apellido:</label>
              <input type="text" class="form-control" value="<?php echo $usuario['apellido']; ?>" name="apellido" id="apellido" aria-describedby="helpId">
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Email:</label>
              <input type="text" class="form-control" value="<?php echo $usuario['email']; ?>" name="email" id="email" aria-describedby="helpId">
            </div>
            <div class="mb-3">
              <label for="id_documento_tipo" class="form-label">Tipo de Documento:</label>
              <select class="form-control" name="id_documento_tipo" id="id_documento_tipo">
                <?php foreach ($data_documento_tipos as $documento_tipo) {
                ?>
                  <option value="<?php echo $documento_tipo["id_documento_tipo"]; ?>" <?= $documento_tipo["id_documento_tipo"] == $usuario["documento_tipo"] ? 'selected="selected"' : ''; ?>>
                    <?php echo $documento_tipo["descripcion"]; ?>
                  </option>
                <?php
                }
                ?>
              </select>
            </div>
            <div class="mb-3">
              <label for="numero_documento" class="form-label">Numero de Documento:</label>
              <input type="text" class="form-control" value="<?php echo $usuario['numero_documento']; ?>" name="numero_documento" id="numero_documento" aria-describedby="helpId">
            </div>
            <div class="mb-3">
              <label for="id_usuario_estado" class="form-label">Estado de Usuario:</label>
              <select class="form-control" name="id_usuario_estado" id="id_usuario_estado">
                <option value="1" <?= $usuario["usuario_estado"] == "Activo" ? 'selected="selected"' : "" ?>>Activo</option>
                <option value="2" <?= $usuario["usuario_estado"] == "Inactivo" ? 'selected="selected"' : "" ?>>Inactivo</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="id_carrera" class="form-label">Carrera:</label>
              <select class="form-control" name="id_carrera" id="id_carrera">
                <?php foreach ($data_carreras as $carrera) {
                ?>
                  <option value="<?php echo $carrera["id_carrera"]; ?>" <?= $carrera["id_carrera"] == $usuario["id_carrera"] ? 'selected="selected"' : ''; ?>>
                    <?php echo $carrera["descripcion"]; ?>
                  </option>
                <?php
                }
                ?>
              </select>
            </div>
            <div class="mb-3">
              <label for="anio" class="form-label">Año:</label>
              <input type="text" class="form-control" value="<?php echo $usuario['anio']; ?>" name="anio" id="anio" aria-describedby="helpId">
            </div>
            <div class="mb-3">
              <label for="comision" class="form-label">Comision:</label>
              <select class="form-control" name="comision" id="comision">
                <option value="1" <?= $usuario["comision"] == "0" ? 'selected="selected"' : "" ?>>A</option>
                <option value="2" <?= $usuario["comision"] == "1" ? 'selected="selected"' : "" ?>>B</option>
                <option value="2" <?= $usuario["comision"] == "2" ? 'selected="selected"' : "" ?>>C</option>
                <option value="2" <?= $usuario["comision"] == "3" ? 'selected="selected"' : "" ?>>D</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="id_usuario_tipo" class="form-label">Tipo de usuario:</label>
              <select class="form-control" name="id_usuario_tipo" id="id_usuario_tipo">
                <?php foreach ($data_usuario_tipo as $usuario_tipo) {
                ?>
                  <option value="<?php echo $usuario_tipo["id_usuario_tipo"]; ?>" <?= $usuario_tipo["id_usuario_tipo"] == $usuario["id_usuario_tipo"] ? 'selected="selected"' : ''; ?>>
                    <?php echo $usuario_tipo["descripcion"]; ?>
                  </option>
                <?php
                }
                ?>
              </select>
            </div>
            <input type="text" value="<?= $usuario["id_usuario"] ?>" name="id_usuario" id="id_usuario" readonly hidden />
            <button type="submit" class="btn btn-success">Modificar</button>
            <button type="submit" class="btn btn-info" onclick="location.href='index.php'">Cancelar</button>
          </form>
        <?php } ?>
      </div>
    </div>
  </div>

  <script src="../js/index.js"></script>
  <script src="../js/navbar.js"></script>
  <script src="js/update.js"></script>
  <script src="https://kit.fontawesome.com/9de136d298.js" crossorigin="anonymous"></script>
  <script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>
</body>