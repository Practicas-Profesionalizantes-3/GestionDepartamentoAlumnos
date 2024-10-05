$("#formulario").submit(async function (event) {
    event.preventDefault();

    const usuario = {
        id_usuario: $("#id_usuario").val(),
        nombre: $("#nombre").val(),
        apellido: $("#apellido").val(),
        email: $("#email").val(),
        id_documento_tipo: $("#id_documento_tipo").val(),
        numero_documento: $("#numero_documento").val(),
        id_usuario_estado: $("#id_usuario_estado").val(),
        id_carrera: $("#id_carrera").val(),
        anio: $("#anio").val(),
        comision: $("#comision").val(),
        id_usuario_tipo: $("#id_usuario_tipo").val()
    };

    $.ajax({
        type: "PUT",
        url: "http://localhost/api/api-Alumnos/usuarios.php",
        data: JSON.stringify(usuario),
        contentType: "application/json",
        dataType: "json",
        success: function (data) {
            console.log(data)
            if (data.success == true) {
                console.log("funciono", data);
                Swal.fire({
                    title: "El usuario fue modificado con exito!",
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
});