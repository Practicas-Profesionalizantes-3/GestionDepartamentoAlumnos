$("#formulario").submit(function (event) {
    event.preventDefault();
    var usuario = JSON.parse(sessionStorage.getItem("usuario"));
    let tramite = {
        id_usuario_creacion: JSON.parse(usuario.id_usuario),
        id_usuario_responsable: JSON.parse(usuario.id_usuario),
        id_tramite_tipo: $("#id_tramite_tipo").val(),
        descripcion: $("#carrera").find(":selected").text() + " " + 
                     $("#materia").find(":selected").text() + " " + 
                     $("#turno").find(":selected").text(),
    };

    // Comprobar si hay archivos adjuntos y ajustar la descripción según corresponda
    if ($("#adjunto").val() != undefined && $("#adjunto")[0].files.length > 0) {
        // Si hay un archivo, se añade al FormData
        var formData = new FormData();
        formData.append('adjunto', $("#adjunto")[0].files[0]);
    } else {
        // Si no hay archivo adjunto, se verifica la fecha de examen o motivo
        if ($("#fecha_examen").val() != undefined) {
            tramite.descripcion += " - Fecha examen: " + $("#fecha_examen").val();
        }
        if ($("#motivo").val() != undefined) {
            tramite.descripcion += " - Motivo: " + $("#motivo").val();
        }
    }

    // Agregar los demás campos al FormData
    if (!formData) {
        // Si no se ha creado FormData porque no hay archivo, se crea aquí
        var formData = new FormData();
    }

    formData.append('id_usuario_creacion', tramite.id_usuario_creacion);
    formData.append('id_usuario_responsable', tramite.id_usuario_responsable);
    formData.append('id_tramite_tipo', tramite.id_tramite_tipo);
    formData.append('descripcion', tramite.descripcion);

    // Enviar la solicitud AJAX
    $.ajax({
        type: "POST",
        url: "http://localhost/api/api-Alumnos/tramites.php",
        data: formData,
        contentType: false, // Importante: no establecer contentType
        processData: false, // Importante: no procesar los datos
        dataType: "json",
        success: function (data) {
            if (data.success == true) {
                console.log("funciono", data);
                Swal.fire({
                    title: "Tramite cargado con exito!",
                    confirmButtonColor: "#006699",
                    icon: "success",
                    iconColor: "#118911",
                }).then(() => {
                    // location.href = "../index.php";
                });
            } else {
                console.log("no funciono", data);
            }
        },
        error: function (errorThrown) {
            console.log("error", errorThrown);
        }
    });
});