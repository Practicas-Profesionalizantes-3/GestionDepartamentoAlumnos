// Funciones para drag and drop
function allowDrop(ev) {
    ev.preventDefault();
}

function drag(ev) {
    ev.dataTransfer.setData("text", ev.target.id);
}

var columna;
function drop(ev) {
    ev.preventDefault();
    var data = ev.dataTransfer.getData("text");
    var tramite = document.getElementById(data);
    columna = ev.target.id;

    // Determinar el nuevo estado basado en la columna
    var estado = "";
    switch (columna) {
        case "pendiente":
            estado = "1"; // ID para 'Pendiente'
            break;
        case "en-proceso":
            estado = "2"; // ID para 'En Proceso'
            break;
        case "terminado":
            estado = "3"; // ID para 'Completado'
            break;
        default:
            console.error("Columna no válida");
            return;
    }

    // Obtener el ID del trámite (remover el prefijo 'tramite-')
    var idTramite = tramite.id.replace("tramite-", "");

    // Actualizar el estado del trámite y luego registrar el movimiento
    actualizarEstadoTramite(idTramite, estado)
        .then(() => registrarMovimientoTramite(idTramite, estado))
        .then(() => {
            // Mover el trámite a la columna correcta
            ev.target.appendChild(tramite);
            tramite.classList.add("dragged");

            // Actualizar el estado visual del trámite
            tramite.classList.remove('pendiente', 'en-proceso', 'terminado'); // Eliminar clases anteriores
            tramite.classList.add(columna); // Agregar la nueva clase

            // Opcional: Actualizar la etiqueta del estado en el HTML
            var estadoLabel = tramite.querySelector('.estado_tramites_dpto');
            if (estadoLabel) {
                estadoLabel.textContent = "Estado: " + columna.charAt(0).toUpperCase() + columna.slice(1).replace("-", " ");
            }

            console.log(`Trámite ${idTramite} movido a ${columna}`); // Log del movimiento

            // Recargar la página para reflejar los cambios
            location.reload();
        })
        .catch(error => console.error(error));
}


// Función para actualizar el estado del trámite en la API
function actualizarEstadoTramite(idTramite, estado) {
    return fetch('http://localhost/api/api-Alumnos/tramite_responsables.php', {
        method: 'PUT',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({
            id_tramite: idTramite,
            id_estado_tramite: estado,
            id_usuario_responsable: usuario.id_usuario
        })
    })
    .then(response => {
        if (response.ok) {
            return response.json();
        } else {
            throw new Error('Error en la actualización del trámite');
        }
    });
}

// Función para registrar el movimiento del trámite en la API
function registrarMovimientoTramite(idTramite, estado) {
    return fetch('http://localhost/api/api-Alumnos/tramite_movimientos.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({
            id_tramite: idTramite,
            fecha_movimiento: new Date().toISOString().split('T')[0], // Fecha en formato YYYY-MM-DD
            id_usuario: usuario.id_usuario, // Asegúrate de que esto esté definido
            observacion: "Cambio de estado a " + columna, // Observación
            id_estado_tramite: estado
        })
    })
    .then(response => {
        if (response.ok) {
            return response.json();
        } else {
            return response.text().then(text => { // Captura el texto de respuesta
                throw new Error(`Error en el registro del movimiento: ${text}`);
            });
        }
    });
}


// Evento para remover la clase 'dragged' cuando el elemento es soltado
document.addEventListener("dragend", function(event) {
    var tramite = document.getElementById(event.target.id);
    tramite.classList.remove("dragged");
});
