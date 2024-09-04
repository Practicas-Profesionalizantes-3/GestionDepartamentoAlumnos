var loggedIn = sessionStorage.getItem('loggedIn');
if (!loggedIn) {
    window.location.href = '../index.php'; // Redirigir al index si no está logueado
} else {
    var usuario = JSON.parse(sessionStorage.getItem("usuario"));
    console.log(usuario)
    if (usuario.id_usuario_estado != 1) {
        window.location.href = '../index.php';
    }
}

function allowDrop(ev) {
    ev.preventDefault();
}

function drag(ev) {
    ev.dataTransfer.setData("text", ev.target.id);
}

function drop(ev) {
    ev.preventDefault();
    var data = ev.dataTransfer.getData("text");
    var tramite = document.getElementById(data);
    if (ev.target.id === "pendientes") {
        ev.target.appendChild(tramite);
    } else {
        ev.target.appendChild(tramite);
    }
    tramite.classList.add("dragged"); // Agrega una clase para indicar que el elemento ha sido arrastrado
}

// Agrega un evento para remover la clase "dragged" cuando el elemento es soltado
document.addEventListener("dragend", function(event) {
var tramite = document.getElementById(event.target.id);
tramite.classList.remove("dragged");
});


function allowDrop(ev) {
    ev.preventDefault();
}

function drag(ev) {
    ev.dataTransfer.setData("text", ev.target.id);
}

function drop(ev) {
    ev.preventDefault();
    var data = ev.dataTransfer.getData("text");
    var tramite = document.getElementById(data);
    var columna = ev.target.id;

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

    // Obtener el ID del usuario desde la sesión
    var usuario = JSON.parse(sessionStorage.getItem("usuario"));
    var idUsuario = usuario.id_usuario;

    // Enviar la solicitud a la API para actualizar el estado
    fetch('http://localhost/api/api-Alumnos/tramites.php', {
    method: 'PUT',
    headers: {
        'Content-Type': 'application/json'
    },
    body: JSON.stringify({
        id_tramite: idTramite,
        id_estado_tramite: estado
    })
    })
    .then(response => {
    if (response.ok) {
        return response.json();
    } else {
        throw new Error('Error en la actualización');
    }
    })
    .then(data => {
    console.log(data);

    // Mover el trámite a la columna correcta
    ev.target.appendChild(tramite);
    tramite.classList.add("dragged");
    
    actualizarMovimiento(idTramite, idUsuario, 'Estado actualizado a ' + columna, estado);

    function actualizarMovimiento(idTramite, idUsuario, observacion, estado) {
        fetch('http://localhost/api/api-Alumnos/tramite_movimientos.php', {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                id_tramite: idTramite,
                id_usuario: idUsuario,
                observacion: observacion,
                id_estado_tramite: estado
            })
        })
        .then(response => response.json())
        .then(data => {
            console.log(data);
            // Aquí puedes agregar lógica adicional después de actualizar el movimiento
        })
        .catch(error => console.error('Error:', error));
    }
    

    // Actualizar la página para reflejar los cambios
    location.reload(); // Esto recargará la página y reflejará los cambios en la base de datos
    })
    .catch(error => console.error(error));
}

// Evento para remover la clase 'dragged' cuando el elemento es soltado
document.addEventListener("dragend", function(event) {
var tramite = document.getElementById(event.target.id);
tramite.classList.remove("dragged");
});



document.getElementById('imprimirPantalla').addEventListener('click', function() {
    var opciones = {
      pageSize: 'A4',
      pageOrientation: 'portrait',
      pages: 1
    };
    
    window.print(opciones);
  });



