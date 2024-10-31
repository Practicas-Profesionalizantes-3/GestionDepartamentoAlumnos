document.addEventListener('DOMContentLoaded', function() {
    const notificationLinks = document.querySelectorAll('.mark-as-read');
    
    notificationLinks.forEach(function(link) {
        link.addEventListener('click', function(event) {
            event.preventDefault();
            
            const notificacionId = this.getAttribute('data-id');  // Obtener el id_notificacion
            
            // Verificar si el id_notificacion se obtiene correctamente
            console.log("ID de notificación:", notificacionId);
            
            const postData = {
                id_notificacion: notificacionId,
                id_notificacion_estado: 3  // Cambiar el estado a 3
            };

            fetch('http://localhost/api/api-Alumnos/notificaciones.php', {
                method: 'PUT',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(postData)  // Enviar los datos como JSON
            })
            .then(response => response.json())
            .then(data => {
                if (data.error) {
                    console.error('Error en la API:', data.error);
                } else {
                    console.log('Respuesta de la API:', data);
                    // Eliminar la notificación del DOM
                    this.closest('.notificationContent').remove();
                    // Actualizar el contador de notificaciones
                    actualizarContadorNotificaciones();
                }
            })
            .catch(error => {
                console.error('Error en la solicitud:', error);
            });
        });
    });
});

function actualizarContadorNotificaciones() {
    fetch('http://localhost/api/api-Alumnos/notificaciones.php')
        .then(response => response.json())
        .then(data => {
            // Filtrar solo las notificaciones no leídas
            const notificaciones_no_leidas = data.filter(notificacion => notificacion.id_notificacion_estado != 3);
            const notificaciones_count = notificaciones_no_leidas.length;
            const contador = document.getElementById("count-label");

            // Actualizar el contador en la interfaz
            document.getElementById('count-label').textContent = notificaciones_count;

            if (notificaciones_count == 0) {
                contador.style.display="none";
            }
        })
        .catch(error => {
            console.error('Error al obtener notificaciones:', error);
        });
}

var modal = document.getElementById("notificacionModal");
var btn = document.getElementById("openModalBtn");
var span = document.getElementsByClassName("close")[0];

// Abre el modal
btn.onclick = function () {
};
function openModal(){
    modal.style.display = "block";
}
function closeModal(){
    modal.style.display = "none";
}
// Cierra el modal
span.onclick = function () {
  closeModal()
};

// Cierra el modal si el usuario hace clic fuera del contenido
window.onclick = function (event) {
  if (event.target == modal) {
    closeModal()
  }
};

function formatDate(fecha) {
    const date = new Date(fecha);

    // Verificar si la fecha es válida
    if (isNaN(date.getTime())) {
        console.error('Fecha inválida');
    } else {
        const day = String(date.getDate()).padStart(2, '0'); // Día
        const month = String(date.getMonth() + 1).padStart(2, '0'); // Mes (0-11)
        const year = date.getFullYear(); // Año
        const hours = String(date.getHours()).padStart(2, '0'); // Horas
        const minutes = String(date.getMinutes()).padStart(2, '0'); // Minutos
        
        return (`${day}-${month}-${year} ${hours}:${minutes}`); // Imprime la fecha en formato "d-m-Y H:i"
    }
}
// Actualizar el contador de notificaciones cada 5 segundos
// setInterval(actualizarContadorNotificaciones, 5000);  // 5000 ms = 5 segundos
