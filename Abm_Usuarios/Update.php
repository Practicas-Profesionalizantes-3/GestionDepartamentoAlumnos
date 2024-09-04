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

$combo_usuarios_url = "http://localhost/api/api-Alumnos/usuarios.php";
$response_usuarios = file_get_contents($combo_usuarios_url);
$data_usuarios = json_decode($response_usuarios, true);

if (!$usuarios) {
  http_response_code(404); // No encontrado
  echo json_encode(['error' => 'usuarios no encontrado']);
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
              <input readonly type="text" class="form-control" value="<?php echo $usuarios['id_usuario']; ?>" name="id_usuario" id="id_usuario" aria-describedby="helpId">
            </div>
            <div class="mb-3">
              <label for="nombre" class="form-label">Nombre:</label>
              <input type="text" class="form-control" value="<?php echo $usuarios['nombre']; ?>" name="nombre" id="nombre" aria-describedby="helpId">
            </div>
            <div class="mb-3">
              <label for="apellido" class="form-label">Apellido:</label>
              <input type="text" class="form-control" value="<?php echo $usuarios['apellido']; ?>" name="apellido" id="apellido" aria-describedby="helpId">
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Email:</label>
              <input type="text" class="form-control" value="<?php echo $usuarios['email']; ?>" name="email" id="email" aria-describedby="helpId">
            </div>
            <div class="mb-3">
              <label for="id_documento_tipo" class="form-label">Tipo de Documento:</label>
              <select class="form-control" name="id_documento_tipo" id="id_documento_tipo">
                <option value="0" <?= $usuarios["documento_tipo"] == "0" ? 'selected="selected"' : "" ?>><?php echo $usuarios['documento_tipo']; ?></option>
                <option value="1" <?= $usuarios["documento_tipo"] == "1" ? 'selected="selected"' : "" ?>>DNI</option>
                <option value="1" <?= $usuarios["documento_tipo"] == "2" ? 'selected="selected"' : "" ?>>Licencia</option>
                <option value="1" <?= $usuarios["documento_tipo"] == "3" ? 'selected="selected"' : "" ?>>Pasaporte</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="id_usuario_estado" class="form-label">Estado de Usuario:</label>
              <select class="form-control" name="id_usuario_estado" id="id_usuario_estado">
                <option value="0" <?= $usuarios["usuario_estado"] == "0" ? 'selected="selected"' : "" ?>><?php echo $usuarios['usuario_estado']; ?></option>
                <option value="1" <?= $usuarios["usuario_estado"] == "1" ? 'selected="selected"' : "" ?>>Activo</option>
                <option value="1" <?= $usuarios["usuario_estado"] == "2" ? 'selected="selected"' : "" ?>>Inactivo</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="numero_documento" class="form-label">Numero de Documento:</label>
              <input type="text" class="form-control" value="<?php echo $usuarios['numero_documento']; ?>" name="numero_documento" id="numero_documento" aria-describedby="helpId" >
            </div>
            <div class="mb-3">
              <label for="id_carrera" class="form-label">Carrera:</label>
              <select class="form-control" name="id_carrera" id="id_carrera">
                <option value="0" <?= $usuarios["id_carrera"] == "0" ? 'selected="selected"' : "" ?>><?php echo $carrera['descripcion']; ?></option>
                <option value="1" <?= $usuarios["id_carrera"] == "1" ? 'selected="selected"' : "" ?>>Ingenieria Informatica</option>
                <option value="1" <?= $usuarios["id_carrera"] == "2" ? 'selected="selected"' : "" ?>>Medicina</option>
                <option value="1" <?= $usuarios["id_carrera"] == "3" ? 'selected="selected"' : "" ?>>Derecho</option>
                <option value="1" <?= $usuarios["id_carrera"] == "4" ? 'selected="selected"' : "" ?>>Administración de Empresas</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="anio" class="form-label">Año:</label>
              <input type="text" class="form-control" value="<?php echo $usuarios['anio']; ?>" name="anio" id="anio" aria-describedby="helpId" >
            </div>
            <div class="mb-3">
              <label for="comision" class="form-label">Comision:</label>
              <select class="form-control" name="comision" id="comision">
                <option value="1" <?= $usuarios["comision"] == "0" ? 'selected="selected"' : "" ?>>A</option>
                <option value="2" <?= $usuarios["comision"] == "1" ? 'selected="selected"' : "" ?>>B</option>
                <option value="2" <?= $usuarios["comision"] == "2" ? 'selected="selected"' : "" ?>>C</option>
                <option value="2" <?= $usuarios["comision"] == "3" ? 'selected="selected"' : "" ?>>D</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="id_usuario_tipo" class="form-label">Tipo de usuario:</label>
              <select class="form-control" name="id_usuario_tipo" id="id_usuario_tipo">
                <option value="1" <?= $usuarios["id_usuario_tipo"] == "0" ? 'selected="selected"' : "" ?>>Administrador</option>
                <option value="2" <?= $usuarios["id_usuario_tipo"] == "1" ? 'selected="selected"' : "" ?>>Usuario Regular</option>
                <option value="2" <?= $usuarios["id_usuario_tipo"] == "2" ? 'selected="selected"' : "" ?>>Docente</option>
              </select>
            </div>
            <input type="text" value="<?= $aviso["id_usuario"] ?>" name="id_usuario" id="id_usuario" readonly hidden />
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