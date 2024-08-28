<script>
        // Verificar sesión con JavaScript
        var loggedIn = sessionStorage.getItem('loggedIn');

        $(document).ready(function() {
            if (loggedIn == 'true') {
                // Si está logueado, mostrar botón de cerrar sesión
                var usuario = JSON.parse(sessionStorage.getItem("usuario"));
                if (usuario.id_usuario_estado == 1) {
                    $("#openModalBtn").show();
                }

            }
        });
</script>

<!-- Botón para abrir el modal -->
<button id="openModalBtn" class="btn-perfil" style="display: none;">
    <i class="fa-solid fa-user"></i>
</button>

<!-- El Modal -->
<div id="perfilModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <div class="modal-header">
            <h2>Perfil de Usuario</h2>
        </div>
        <div id="perfil" class="text-center">
            <p><strong>Nombre:</strong> <span id="nombre"></span></p>
            <p><strong>Apellido:</strong> <span id="apellido"></span></p>
            <p><strong>Email:</strong> <span id="email"></span></p>
            <p><strong>Tipo de Documento:</strong> <span id="id_documento_tipo"></span></p>
            <p><strong>Número de Documento:</strong> <span id="numero_documento"></span></p>
            <p><strong>Estado de Usuario:</strong> <span id="id_usuario_estado"></span></p>
        </div>
    </div>
</div>