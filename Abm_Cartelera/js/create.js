$(document).ready(function() {
    $('#agregar-anuncio').click(function(e) {
        e.preventDefault();

        // Obtener datos del formulario
        let titulo = $('#titulo').val();
        let descripcion = $('#descripcion').val();
        let id_usuario = $('#id_usuario').val();
        let id_aviso_tipo = $('#id_aviso_tipo').val();
        let id_aviso_estado = $('#id_aviso_estado').val();
        let fijado = $('#fijado').val();
        let adjunto = $('#adjunto').prop('files')[0];
        let imagen = $('#imagen').prop('files')[0];

        // Obtener fechas
        let fecha_publicacion = $('#fecha_publicacion').val();
        let fecha_vencimiento = $('#fecha_vencimiento').val();

        // Validar fechas
        if (!fecha_publicacion || !fecha_vencimiento) {
            Swal.fire('Error', 'Debes seleccionar las fechas', 'error');
            return;
        }

        // Obtener la hora actual de Buenos Aires usando moment-timezone
        let fechaPublicacionBuenosAires = moment().tz("America/Argentina/Buenos_Aires").format('DD-MM-YYYY HH:mm');

        // Formatear la fecha de vencimiento (solo día-mes-año)
        let fechaVencimientoFormatted = moment(fecha_vencimiento).format('DD-MM-YYYY');

        // Crear un FormData para enviar archivos junto con los otros datos
        let formData = new FormData();
        formData.append('titulo', titulo);
        formData.append('descripcion', descripcion);
        formData.append('id_usuario', id_usuario);
        formData.append('id_aviso_tipo', id_aviso_tipo);
        formData.append('id_aviso_estado', id_aviso_estado);
        formData.append('fijado', fijado);
        formData.append('fecha_publicacion', fechaPublicacionBuenosAires);  // Guardar la fecha con hora actual
        formData.append('fecha_vencimiento', fechaVencimientoFormatted);  // Guardar la fecha sin hora

        // Adjuntar archivos si se seleccionaron
        if (adjunto) {
            formData.append('adjunto', adjunto);
        }
        if (imagen) {
            formData.append('imagen', imagen);
        }

        // Llamada AJAX para enviar el formulario
        $.ajax({
            url: 'path-to-api-endpoint', // URL del endpoint en tu API
            type: 'POST',
            data: formData,
            processData: false, // Evita que jQuery procese los datos
            contentType: false, // No agrega ningún tipo de encabezado Content-Type
            success: function(response) {
                Swal.fire('Éxito', 'Aviso agregado correctamente', 'success');
            },
            error: function(xhr, status, error) {
                Swal.fire('Error', 'Hubo un problema al agregar el aviso', 'error');
            }
        });
    });
});
