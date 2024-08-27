<head>
    <script>
        // Verificar sesión con JavaScript
        var loggedIn = sessionStorage.getItem('loggedIn');

        $(document).ready(function() {
            if (loggedIn !== 'true') {
                // Si no está logueado, mostrar botón de inicio de sesión
                $('#texto').text('Campus');
                $('#loginButton').attr('href', 'login/index.html');
            } else {
                // Si está logueado, mostrar botón de cerrar sesión
                var usuario = JSON.parse(sessionStorage.getItem("usuario"));
                if (usuario.id_usuario_estado == 1) {
                    $("#crear_aviso").show();
                    $("#crear_usuario").show();
                }
                $('#texto').text('Cerrar sesión');
                $('#loginButton').on('click', function(e) {

                    // Destruir la sesión
                    sessionStorage.removeItem('loggedIn');
                    sessionStorage.removeItem('usuario');

                    // Redirigir al usuario a la página de inicio de sesión
                    window.location.href = 'login/index.html';
                });
            }
        });
    </script>

</head>

<nav class="sidebar close">
    <header>
        <div class="image-text">
            <span class="image">
                <img src="/gestiondepartamentoalumnos/img/logo.png" alt="Logo ITB">
            </span>

            <div class="text logo-text">
                <span class="name">Instituto</span>
                <span class="name">Tecnologico</span>
                <span class="name">Beltran</span>
            </div>
        </div>
        <i class='bx bx-chevron-right toggle'></i>
    </header>
    <div class="menu-bar">
        <div class="menu">
            <li class="search-box">
                <a href="/gestiondepartamentoalumnos/index.php" ; return false;>
                    <i class='icon fas fa-home'></i>
                    <span class="text nav-text">Inicio</span>
                </a>
            </li>
            <li class="search-box">
                <a>
                    <i class='icon fas fa-calendar'></i>
                    <span class="text nav-text">Calendario</span>
                </a>
            </li>
            <li class="search-box">
                <a href="/gestiondepartamentoalumnos/cartelera.php">
                    <i class='bx bxs-news icon'></i>
                    <span class="text nav-text">Cartelera</span>
                </a>
            </li>
            <li class="search-box">
                <a>
                    <i class='icon fas fa-user-friends'></i>
                    <span class="text nav-text">Carreras</span>
                </a>
            </li>
            <li class="search-box">
                   <a href="/gestiondepartamentoalumnos/tramites">
                    <i class='icon fas fa-envelope'></i>
                    <span class="text nav-text">Tramites</span>
                </a>
            </li>
            <li class="search-box">
                <a>
                    <i class='icon fas fa-bell'></i>
                    <span class="text nav-text">Notificaciones</span>
                </a>
            </li>
            <li class="search-box">
                <a href="/gestiondepartamentoalumnos/chatbot.php">
                    <i class='icon fas fa-comments'></i>
                    <span class="text nav-text">Chat</span>
                </a>
            </li>
            <li class="search-box" style="display: none;" id="crear_aviso">
                <a href="/gestiondepartamentoalumnos/Abm_Cartelera/index.php">
                    <i class='bx bx-add-to-queue icon'></i>
                    <span class="text nav-text">Crear anuncio</span>
                </a>
            </li>
            <li class="search-box" style="display: none;" id="crear_usuario">
                <a href="/gestiondepartamentoalumnos/Abm_Usuarios/index.php">
                    <i class="fa-solid fa-user-plus icon"></i>
                    <span class="text nav-text">Crear usuario</span>
                </a>
            </li>
            <li class="search-box">
                <a href="javascript:void(0);" id="theme-toggle">
                    <i class='icon fas fa-adjust'></i>
                    <span class="text nav-text">Cambiar Tema</span>
                </a>
            </li>

        </div>
        <div class="bottom-content">
            <li class="">
                <a href="/gestiondepartamentoalumnos/login/index.html" id="loginButton" style="margin-top: -48px; cursor:pointer">
                    <i class='bx bx-log-out icon'></i>
                    <span class="text nav-text" id="texto">Campus</span>
                </a>
            </li>
        </div>
    </div>
</nav>

<script>
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
</script>