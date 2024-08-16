$("#formulario").submit(function (event) {
    event.preventDefault();

    var formData = new FormData();
    formData.append('nombre', $("#nombre").val());
    formData.append('apellido', $("#apellido").val());
    formData.append('password', $("#password").val());
    formData.append('email', $("#email").val());
    formData.append('id_documento_tipo', $("#id_documento_tipo").val());
    formData.append('id_usuario_estado', $("#id_usuario_estado").val());
    formData.append('numero_documento', $("#numero_documento").val());
    formData.append('id_carrera', $("#id_carrera").val());
    formData.append('anio', $("#anio").val());
    formData.append('comision', $("#comision").val());
    formData.append('id_usuario_tipo', $("#id_usuario_tipo").val());

    $.ajax({
        type: "POST",
        url: "http://localhost/api/api-Alumnos/usuarios.php",
        data: formData,
        processData: false,
        contentType: false,
        success: function (data) {
            if (data.success == true) {
                location.href = "index.php";
            } else {
                location.href = "index.php";
            }
        },
        error: function (errorThrown) {
            console.log("error", errorThrown);
        }
    });
});