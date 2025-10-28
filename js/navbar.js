// Verificar sesión con JavaScript
var loggedIn = sessionStorage.getItem('loggedIn');

$(document).ready(function() {
    var loggedIn = sessionStorage.getItem('loggedIn');
    
    if (loggedIn === 'true') {
        var usuario = JSON.parse(sessionStorage.getItem("usuario"));
        $("#tramites_li").show();
        $("#siu-guarani").show();
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

        $('#texto').text('Cerrar sesión');
        // Manejar cerrar sesión
        $('#loginButton').on('click', function(e) {
            e.preventDefault(); // Evita que el enlace redirija inmediatamente
            cerrarsesion();

        });
    } else {
        // Si no está logueado
        $('#texto').text('Campus');
        $('#loginButton').attr('href', '/gestiondepartamentoalumnos/login/index.html');
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

function cerrarsesion() {
  // Mostrar alerta de confirmación
  Swal.fire({
    title: "Cerrar sesión",
    text: "¿Estás seguro de que deseas cerrar sesión?",
    icon: "question",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    cancelButtonText: "Cancelar",
    confirmButtonText: "Si, cerrar!"
  }).then((result) => {
    if (result.isConfirmed) {
      // Destruir la sesión
      sessionStorage.removeItem('loggedIn');
      sessionStorage.removeItem('usuario');

      // Redirigir al usuario a la página de inicio de sesión
      window.location.href = '../../GestionDepartamentoAlumnos/login/index.html';

    }
  });

}