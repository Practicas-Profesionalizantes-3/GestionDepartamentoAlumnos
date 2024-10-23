document.addEventListener('DOMContentLoaded', function() {
    const notificationLinks = document.querySelectorAll('.mark-as-read');
    
    notificationLinks.forEach(function(link) {
        link.addEventListener('click', function(event) {
            event.preventDefault();
            
            const notificacionId = this.getAttribute('data-id');  // Obtener el id_notificacion
            const href = this.getAttribute('href');
            
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

            // Redirigir al detalle de la notificación
            window.location.href = href;  
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

            // Actualizar el contador en la interfaz
            document.getElementById('count-label').textContent = notificaciones_count;
        })
        .catch(error => {
            console.error('Error al obtener notificaciones:', error);
        });
}

// Actualizar el contador de notificaciones cada 5 segundos
setInterval(actualizarContadorNotificaciones, 5000);  // 5000 ms = 5 segundos
