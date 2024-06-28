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
    for (var pair of formData.entries()) {
        console.log(pair[0] + ': ' + pair[1]);
    }
    $.ajax({
        type: "POST",
        url: "http://localhost/api/api-Alumnos/cartelera.php",
        data: formData,
        processData: false,
        contentType: false,
        success: function (data) {
            if (data.success == true) {
                console.log("funciono", data);
                location.href = "index.php";
            } else {
                console.log("no funciono", data);
            }
        },
        error: function (errorThrown) {
            console.log("error", errorThrown);
        }
    });
});