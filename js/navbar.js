// Verificar sesión con JavaScript
var loggedIn = sessionStorage.getItem('loggedIn');

$(document).ready(function() {
    var loggedIn = sessionStorage.getItem('loggedIn');
    
    if (loggedIn === 'true') {
        var usuario = JSON.parse(sessionStorage.getItem("usuario"));
        $("#tramites_li").show();
        // Mostrar opciones adicionales según el tipo de usuario
        if (usuario.id_usuario_tipo == 1 || usuario.id_usuario_tipo == 3) {
            $("#crear_aviso").show();
            $("#crear_usuario").show();
        } else if(usuario.id_usuario_tipo == 2){
            $("#notificaciones").show();
        }
        
        // Manejar redirección según el tipo de usuario al hacer clic en 'Mis Trámites'
        $('#mis_tramites').on('click', function() {
            if (usuario.id_usuario_tipo == 1 || usuario.id_usuario_tipo == 3) {
                window.location.href = '/gestiondepartamentoalumnos/tramites/tramites_dpto.php';
            } else if (usuario.id_usuario_tipo == 2) {
                window.location.href = '/gestiondepartamentoalumnos/tramites/index.php';
            }
        });
        
        // Manejar cerrar sesión
        $('#loginButton').on('click', function(e) {
            sessionStorage.removeItem('loggedIn');
            sessionStorage.removeItem('usuario');
            window.location.href = 'login/index.html';
        });
    } else {
        // Si no está logueado
        $('#texto').text('Campus');
        $('#loginButton').attr('href', 'login/index.html');
    }
});

//Esto funciona para abrir y cerrar el navbar
const body = document.querySelector('body'),
    sidebar = body.querySelector('nav'),
    toggle = body.querySelector(".toggle"),
    searchBtn = body.querySelector(".search-box"),
    //   modeSwitch = body.querySelector(".toggle-switch"),
    modeText = body.querySelector(".mode-text");
toggle.addEventListener("click", () => {
    sidebar.classList.toggle("close");
})
searchBtn.addEventListener("click", () => {
    sidebar.classList.remove("close");
})