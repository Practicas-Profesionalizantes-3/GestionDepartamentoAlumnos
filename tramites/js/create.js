$("#formulario").submit(function (event) {
    event.preventDefault();
    var usuario = JSON.parse(sessionStorage.getItem("usuario"));
    if (!usuario || !usuario.id_usuario) {
        alert("No se encontró información del usuario en el sessionStorage");
        return;
    }
    let tramite = {
        id_usuario_creacion: JSON.parse(usuario.id_usuario),
        id_usuario_responsable: JSON.parse(usuario.id_usuario),
        id_tramite_tipo: $("#id_tramite_tipo").val(),
        descripcion: $("#carrera").find(":selected").text() + " " + 
                     $("#materia").find(":selected").text() + " " + 
                     $("#turno").find(":selected").text(),
    };

    // Comprobar si hay archivos adjuntos y ajustar la descripción según corresponda
    var formData = new FormData();
    if ($("#adjunto").val() != undefined && $("#adjunto")[0].files.length > 0) {
        formData.append('adjunto', $("#adjunto")[0].files[0]);
    } else {
        if ($("#fecha_examen").val() != undefined) {
            tramite.descripcion += " - Fecha examen: " + $("#fecha_examen").val();
        }
        if ($("#motivo").val() != undefined) {
            tramite.descripcion += " - Motivo: " + $("#motivo").val();
        }
    }

    // Agregar los demás campos al FormData
    formData.append('id_usuario_creacion', tramite.id_usuario_creacion);
    formData.append('id_usuario_responsable', tramite.id_usuario_responsable);
    formData.append('id_tramite_tipo', tramite.id_tramite_tipo);
    formData.append('descripcion', tramite.descripcion);

    // Enviar la solicitud AJAX para crear el trámite
    $.ajax({
        type: "POST",
        url: "http://localhost/api/api-Alumnos/tramites.php",
        data: formData,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (data) {
            console.log(data)
            if (data.success && data.id_tramite) {
                var idTramite = data.id_tramite;

                // Crear la notificación
                var notificacionData = {
                    id_tramite: idTramite,
                    id_notificacion_tipo: 3,
                    id_notificacion_estado: 4,
                };
                $.ajax({
                    type: "POST",
                    url: "http://localhost/api/api-Alumnos/notificaciones.php",
                    data: JSON.stringify(notificacionData),
                    contentType: "application/json",
                    success: function (notificacionResponse) {
                        Swal.fire({
                            title: "Su trámite fue creado con éxito!",
                            icon: "success",
                            confirmButtonColor: "#006699",
                        }).then(() => {
                            location.href = "../index.php";
                        });
                    },
                    error: function (error) {
                        console.log(error)
                        Swal.fire({
                            title: "Error",
                            text: "No se pudo crear la notificación. Intente nuevamente.",
                            icon: "error",
                            confirmButtonColor: "#006699"
                        });
                    }
                });
            } else {
                console.log("No se pudo crear el trámite o no se devolvió el ID del trámite", data);
                Swal.fire({
                    title: "Error",
                    text: "No se pudo crear el trámite. Intente nuevamente.",
                    icon: "error",
                    confirmButtonColor: "#006699"
                });
            }
        },
        error: function (errorThrown) {
            console.log("Error en la solicitud", errorThrown);
            Swal.fire({
                title: "Error",
                text: "Ocurrió un error en la solicitud. Intente nuevamente.",
                icon: "error",
                confirmButtonColor: "#006699"
            });
        }
    });
});
