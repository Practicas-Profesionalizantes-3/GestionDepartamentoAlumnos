$("#formulario").submit(function (event) {
    event.preventDefault();
    var aviso = {
        id_aviso: $("#id_aviso").val(),
        id_aviso_tipo: $("#id_aviso_tipo").val(),
        id_usuario: $("#id_usuario").val(),
        titulo: $("#titulo").val(),
        descripcion: $("#descripcion").val(),
        fecha_publicacion: $("#fecha_publicacion").val(),
        fecha_vencimiento: $("#fecha_vencimiento").val(),
        adjunto: $("#adjunto").val(),
        fijado: $("#fijado").val(),
        ubicacion_imagen: $("#ubicacion_imagen").val(),
        id_aviso_estado: $("#id_aviso_estado").val(),
    }
    $.ajax({
        type: "PUT",
        url: "http://localhost/api/api-Alumnos/cartelera.php",
        data: JSON.stringify(aviso),
        contentType: "application/json",
        dataType: "json",
        success: function (data) {
            if (data.success == true){
                console.log("funciono", data)
                location.href = "index.php"
            }
            else{
                console.log("no funciono", data)
            }
        },
        error: function (errorThrown) {
            console.log("error",errorThrown)
        }
    });
})