document.addEventListener('DOMContentLoaded', function() {
    // Recupera la clave almacenada en sessionStorage
    let usuarioData = sessionStorage.getItem('usuario');
    
    // Parsear la clave para convertirla en un objeto JavaScript
    let usuario = JSON.parse(usuarioData);
    
    // Asignar los valores a los elementos HTML
    document.getElementById('nombre').textContent = usuario.nombre;
    document.getElementById('apellido').textContent = usuario.apellido;
    document.getElementById('email').textContent = usuario.email;
    document.getElementById('id_documento_tipo').textContent = usuario.id_documento_tipo;
    document.getElementById('numero_documento').textContent = usuario.numero_documento;
    document.getElementById('id_usuario_estado').textContent = usuario.id_usuario_estado;

    // Modal variables
    var modal = document.getElementById("perfilModal");
    var btn = document.getElementById("openModalBtn");
    var span = document.getElementsByClassName("close")[0];

    // Abre el modal
    btn.onclick = function() {
        modal.style.display = "block";
    }

    // Cierra el modal
    span.onclick = function() {
        modal.style.display = "none";
    }

    // Cierra el modal si el usuario hace clic fuera del contenido
    window.onclick = function(event) {
        if (event.target === modal) {
            modal.style.display = "none";
        }
    }
});
