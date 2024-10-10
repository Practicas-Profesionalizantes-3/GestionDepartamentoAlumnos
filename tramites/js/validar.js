var loggedIn = sessionStorage.getItem('loggedIn');
if (!loggedIn) {
    window.location.href = '../index.php'; // Redirigir al index si no está logueado
} else {
    var usuario = JSON.parse(sessionStorage.getItem("usuario"));
    console.log(usuario)
    if (usuario.id_usuario_tipo != 2) {
        window.location.href = '../index.php';
    }
}
