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

// $("#formulario").submit(function (event) {
//     event.preventDefault();
//     var aviso = {
//         id_aviso_tipo: $("#id_aviso_tipo").val(),
//         id_usuario: $("#id_usuario").val(),
//         titulo: $("#titulo").val(),
//         descripcion: $("#descripcion").val(),
//         fecha_publicacion: $("#fecha_publicacion").val(),
//         fecha_vencimiento: $("#fecha_vencimiento").val(),
//         adjunto: $("#adjunto").val(),
//         fijado: $("#fijado").val(),
//         imagen: $("#imagen").val(),
//         id_aviso_estado: $("#id_aviso_estado").val()
//     }
//     console.log(aviso)
//     $.ajax({
//         type: "POST",
//         data: JSON.stringify(aviso),
//         url: "http://localhost/api/api-Alumnos/cartelera.php",
//         success: function (data) {
//             if (data.success == true){
//                 console.log("funciono", data)
//                 location.href = "index.php"
//             }
//             else{
//                 console.log("no funciono", data)
//             }
//         },
//         error: function (errorThrown) {
//             console.log("error",errorThrown)
//         }
//     });
// })