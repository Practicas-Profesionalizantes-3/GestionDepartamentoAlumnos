$("#formulario").submit(function (event) {
    event.preventDefault();

    const usuario = {
        nombre: $("#nombre").val(),
        apellido: $("#apellido").val(),
        password: $("#password").val(),
        email: $("#email").val(),
        id_documento_tipo: $("#id_documento_tipo").val(),
        id_usuario_estado: $("#id_usuario_estado").val(),
        numero_documento: $("#numero_documento").val(),
        id_carrera: $("#id_carrera").val(),
        anio: $("#anio").val(),
        comision: $("#comision").val(),
        id_usuario_tipo: $("#id_usuario_tipo").val()
    }

    if (usuario.nombre == "" || usuario.apellido == "" || usuario.password == "" || usuario.email == "" ||
        usuario.id_documento_tipo == "" || usuario.id_usuario_estado == "" || usuario.numero_documento == "" ||
        usuario.id_carrera == "" || usuario.anio == "" || usuario.comision == "" || usuario.id_usuario_tipo == "") {
        Toastify({
            text: "⚠️ Faltan datos por completar ⚠️",
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
            url: "http://localhost/api/api-Alumnos/usuarios.php",
            data: JSON.stringify(usuario),
            contentType: "application/json",
            dataType: "json",
            success: function (data) {
                if (data.success == true) {
                    console.log("funciono", data);
                    Swal.fire({
                        title: "El usuario fue creado con exito!",
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
});