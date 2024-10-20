$("#formulario").submit(async function (event) {
    event.preventDefault();
    const adjuntoFile = $("#adjunto")[0].files[0];
    const imagenFile = $("#imagen")[0].files[0];

    let adjuntoBase64 = "";
    let imagenBase64 = "";

    // Convertir a base64 solo si hay archivos nuevos
    if (adjuntoFile) {
        adjuntoBase64 = await toBase64(adjuntoFile);
    } else {
        adjuntoBase64 = $("#adjunto").data("existing"); // Obtener el valor existente
    }

    if (imagenFile) {
        imagenBase64 = await toBase64(imagenFile);
    } else {
        imagenBase64 = $("#imagen").data("existing"); // Obtener el valor existente
    }

    // Obtener la hora actual de Buenos Aires usando moment-timezone
    const fechaModificacionBuenosAires = moment().tz("America/Argentina/Buenos_Aires").format('DD-MM-YYYY HH:mm:ss');

    const fechaVencimiento = $("#fecha_vencimiento").val(); // Capturando la fecha de vencimiento sin hora

    const aviso = {
        id_aviso: $("#id_aviso").val(),
        id_aviso_tipo: $("#id_aviso_tipo").val(),
        id_usuario: $("#id_usuario").val(),
        titulo: $("#titulo").val(),
        descripcion: $("#descripcion").val(),
        fecha_publicacion: $("#fecha_publicacion").val(),
        fecha_modificacion: fechaModificacionBuenosAires, // Agregar la hora de modificación
        fecha_vencimiento: `${fechaVencimiento}`, // Solo incluir la fecha sin hora
        adjunto: adjuntoBase64,
        fijado: $("#fijado").val(),
        imagen: imagenBase64,
        id_aviso_estado: $("#id_aviso_estado").val()
    };

    // Validar solo los campos obligatorios
    if (!aviso.titulo || !aviso.descripcion) {
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
            type: "PUT",
            url: "http://localhost/api/api-Alumnos/cartelera.php",
            data: JSON.stringify(aviso),
            contentType: "application/json",
            dataType: "json",
            success: function (data) {
                console.log(data);
                if (data.success == true) {
                    console.log("funciono", data);
                    Swal.fire({
                        title: "Su aviso fue modificado con éxito!",
                        confirmButtonColor: "#006699",
                        icon: "success",
                        iconColor: "#118911",
                    }).then(() => {
                        location.href = "index.php";
                    });
                } else {
                    console.log("no funciono", data);
                }
            },
            error: function (errorThrown) {
                console.log("error", errorThrown);
            }
        });
    }

    function toBase64(file) {
        return new Promise((resolve, reject) => {
            const reader = new FileReader();
            reader.readAsDataURL(file);
            reader.onload = () => resolve(reader.result.split(',')[1]);
            reader.onerror = error => reject(error);
        });
    }
});
