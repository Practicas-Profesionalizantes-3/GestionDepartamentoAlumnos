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

    // Validación de campos vacíos
    if (usuario.nombre == "" || usuario.apellido == "" || usuario.password == "" || usuario.email == "" ||
        usuario.id_documento_tipo == "" || usuario.id_usuario_estado == "" || usuario.numero_documento == "" ||
        usuario.id_carrera == "" || usuario.anio == "" || usuario.comision == "" || usuario.id_usuario_tipo == "") {
        
        // Mostrar alerta de SweetAlert
        Swal.fire({
            title: '¡Faltan datos por completar!',
            text: 'Por favor, completa todos los campos requeridos.',
            icon: 'warning',
            confirmButtonColor: '#006699',
            confirmButtonText: 'Aceptar',
        });
    } else {
        $.ajax({
            type: "POST",
            url: "http://localhost/api/api-Alumnos/usuarios.php",
            data: JSON.stringify(usuario),
            contentType: "application/json",
            dataType: "json",
            success: function (data) {
                if (data.success) {
                    Swal.fire({
                        title: "El usuario fue creado con éxito!",
                        confirmButtonColor: "#006699",
                        icon: "success",
                        iconColor: "#118911",
                    }).then(() => {
                        location.href = "index.php";
                    });
                }
            },
            error: function (errorThrown) {
                if (errorThrown.status === 409) {
                    Swal.fire({
                        title: 'Conflicto',
                        text: errorThrown.responseJSON.mensaje,
                        icon: 'error',
                        confirmButtonColor: '#006699',
                        confirmButtonText: 'Aceptar',
                    });
                } else {
                    console.log("error", errorThrown);
                }
            }
        });
    }
});
