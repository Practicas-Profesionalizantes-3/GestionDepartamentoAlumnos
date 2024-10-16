$("#formulario").submit(async function (event) {
    event.preventDefault();
    const adjuntoFile = $("#adjunto")[0].files[0];
    const imagenFile = $("#imagen")[0].files[0];

    let adjuntoBase64 = "";
    let imagenBase64 = "";

    if (adjuntoFile) {
        adjuntoBase64 = await toBase64(adjuntoFile);
    }

    if (imagenFile) {
        imagenBase64 = await toBase64(imagenFile);
    }

    const aviso = {
        id_aviso: $("#id_aviso").val(),
        id_aviso_tipo: $("#id_aviso_tipo").val(),
        id_usuario: $("#id_usuario").val(),
        titulo: $("#titulo").val(),
        descripcion: $("#descripcion").val(),
        fecha_publicacion: $("#fecha_publicacion").val(),
        fecha_vencimiento: $("#fecha_vencimiento").val(),
        adjunto: adjuntoBase64,
        fijado: $("#fijado").val(),
        imagen: imagenBase64,
        id_aviso_estado: $("#id_aviso_estado").val()
    };

    if (!aviso.titulo || !aviso.descripcion || !aviso.imagen || !aviso.adjunto) {
        Toastify({
            text: "⚠️ Faltan Datos Obligatorios por Completar ⚠️",
            duration: 1500,
            gravity: "top",
            style: {
                background: "#c41e1e",
                color: "#fff"
            }
        }).showToast()
    } else{
        $.ajax({
            type: "PUT",
            url: "http://localhost/api/api-Alumnos/cartelera.php",
            data: JSON.stringify(aviso),
            contentType: "application/json",
            dataType: "json",
            success: function (data) {
                console.log(data)
                if (data.success == true) {
                    console.log("funciono", data);
                    Swal.fire({
                        title: "Su aviso fue modificado con exito!",
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