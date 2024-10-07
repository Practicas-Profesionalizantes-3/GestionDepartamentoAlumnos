// Obtener los datos del trámite desde sessionStorage
const tramiteDetalle = JSON.parse(sessionStorage.getItem('tramiteDetalle'));

// Verificar si hay datos disponibles
if (tramiteDetalle) {
    const tramiteDetalleContainer = document.getElementById('tramite-detalle').querySelector('.card-body');

    // Crear el contenido HTML con los datos del trámite
    tramiteDetalleContainer.innerHTML = `
        <h2 class="card-title">${tramiteDetalle.tipo_tramite}</h2>
        <p class="card-text"><strong>Descripción:</strong> ${tramiteDetalle.descripcion}</p>
        <p class="card-text"><strong>Responsable:</strong> ${tramiteDetalle.responsable}</p>
        <p class="card-text"><strong>Estado:</strong> ${tramiteDetalle.estado_tramite}</p>
        <p class="card-text"><strong>Fecha de creación:</strong> ${tramiteDetalle.fecha_creacion}</p>
    `;
} else {
    document.getElementById('tramite-detalle').innerHTML = '<p>No se encontraron datos del trámite.</p>';
}


