$("#formulario").submit(function (event) {
    event.preventDefault();

    var formData = new FormData();
    formData.append('id_aviso_tipo', $("#id_aviso_tipo").val());
    formData.append('id_usuario', $("#id_usuario").val());
    formData.append('titulo', $("#titulo").val());
    formData.append('descripcion', $("#descripcion").val());
    formData.append('fecha_publicacion', $("#fecha_publicacion").val());
    formData.append('fecha_vencimiento', $("#fecha_vencimiento").val());
    formData.append('adjunto', $("#adjunto")[0].files[0]);  // archivo
    formData.append('fijado', $("#fijado").val());
    formData.append('imagen', $("#imagen")[0].files[0]);
    formData.append('id_aviso_estado', $("#id_aviso_estado").val());

    $.ajax({
        type: "POST",
        url: "http://localhost/api/api-Alumnos/cartelera.php",
        data: formData,
        processData: false,
        contentType: false,
        success: function (data) {
            if (data.success == true) {
                var avisoId = data.id_aviso; // Suponiendo que devuelves el ID del aviso creado
                console.log("Aviso creado con éxito, ID: " + avisoId);

                // Ahora crea la notificación
                var notificacionData = {
                    id_aviso: avisoId,  // ID del aviso recién creado
                    id_notificacion_tipo: 1,  // Tipo de notificación que corresponda (puedes personalizar)
                    id_notificacion_estado: 1,  // Estado de la notificación (no leída, etc.)
                    fecha_envio_notificacion: new Date().toISOString()  // Fecha de la notificación actual
                };

                $.ajax({
                    type: "POST",
                    url: "http://localhost/api/api-Alumnos/notificaciones.php",
                    data: JSON.stringify(notificacionData),
                    contentType: "application/json",
                    success: function (notificacionResponse) {
                        console.log("Notificación creada: ", notificacionResponse);

                        Swal.fire({
                            title: "Su aviso y notificación fueron creados con éxito!",
                            confirmButtonColor: "#006699",
                            icon: "success",
                            iconColor: "#118911",
                        }).then(() => {
                            location.href = "index.php";
                        });
                    },
                    error: function (error) {
                        console.log("Error al crear la notificación", error);
                    }
                });

            } else {
                console.log("Error al crear aviso: ", data);
            }
        },
        error: function (errorThrown) {
            console.log("Error en la creación del aviso", errorThrown);
        }
    });
});
