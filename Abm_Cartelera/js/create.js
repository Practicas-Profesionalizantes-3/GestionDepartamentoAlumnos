$("#formulario").submit(function (event) {
    event.preventDefault(); 

    var formData = new FormData();
    formData.append('id_aviso_tipo', $("#id_aviso_tipo").val());
    formData.append('id_usuario', $("#id_usuario").val());
    formData.append('titulo', $("#titulo").val());
    formData.append('descripcion', $("#descripcion").val());
    formData.append('fecha_publicacion', $("#fecha_publicacion").val());
    var horaVencimiento = $("#hora_vencimiento").val();
    var fechaVencimiento = $("#fecha_vencimiento").val();
    if (fechaVencimiento && horaVencimiento) {
        fechaVencimiento += ' ' + horaVencimiento + ':00'; // Combina fecha y hora
    }
    formData.append('fecha_vencimiento', fechaVencimiento);
    

    var adjunto = $("#adjunto")[0].files[0];
    if (adjunto) formData.append('adjunto', adjunto);
    formData.append('fijado', $("#fijado").val());
    var imagen = $("#imagen")[0].files[0];
    if (imagen) formData.append('imagen', imagen);
    formData.append('id_aviso_estado', $("#id_aviso_estado").val());
    var titulo = $("#titulo").val();
    var descripcion = $("#descripcion").val();
    var fechaPublicacion = $("#fecha_publicacion").val();
    var fechaVencimiento = $("#fecha_vencimiento").val();

    
    if (titulo.trim() === "" || descripcion.trim() === "" || fechaPublicacion.trim() === "" || fechaVencimiento.trim() === "") {
        Toastify({
            text: "⚠️ Faltan datos obligatorios por completar ⚠️",
            duration: 1500,
            gravity: "top",
            style: {
                background: "#c41e1e",
                color: "#fff"
            }
        }).showToast();
    } else {
        $.ajax({
            type: "POST",
            url: "http://localhost/api/api-Alumnos/cartelera.php",
            data: formData,
            processData: false,
            contentType: false,
            success: function (data) {
                if (data.success == true) {
                    var avisoId = data.id_aviso; 
                    console.log("Aviso creado con éxito, ID: " + avisoId);

                    var notificacionData = {
                        id_aviso: avisoId,  
                        id_notificacion_tipo: 1,  
                        id_notificacion_estado: 1,  
                        fecha_envio_notificacion: new Date().toISOString() 
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
    }
});
