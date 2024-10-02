var loggedIn = sessionStorage.getItem("loggedIn");

if (loggedIn === "true") {
    var usuario = JSON.parse(sessionStorage.getItem("usuario"));
    if (usuario.id_usuario_estado === 1) {
        $("#notificaciones").show();
    }
}