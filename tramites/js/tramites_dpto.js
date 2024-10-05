// Función para manejar la actualización del estado
function actualizarEstado(idTramite, estado) {
    console.log('ID Trámite:', idTramite);
    console.log('Estado:', estado);
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
            return response.text().then(text => { throw new Error(text); });
        }
    })
    .then(data => {
        console.log(data);
        // Código para actualizar el estado visualmente si es necesario
        Toastify({
            text: "Estado actualizado con éxito.",
            duration: 3000,
            gravity: "top", 
            position: 'right',
            backgroundColor: "#4CAF50",
        }).showToast();
    })
    .catch(error => console.error('Error:', error));
}

function allowDrop(event) {
    event.preventDefault();
}

function drag(event) {
    event.dataTransfer.setData("text", event.target.id);
}

function drop(event) {
    event.preventDefault();
    var data = event.dataTransfer.getData("text");
    event.target.appendChild(document.getElementById(data));
    // Lógica para obtener el nuevo estado del trámite
    let nuevoEstado = event.target.id; // Obtén el nuevo estado
    // Actualiza el estado en la base de datos
    actualizarEstado(data.split('-')[1], nuevoEstado);
}