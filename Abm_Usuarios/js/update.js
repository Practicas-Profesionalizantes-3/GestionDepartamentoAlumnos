$("#formulario").submit(async function (event) {
    event.preventDefault();

    // Validaciones
    const nombre = $("#nombre").val().trim();
    const apellido = $("#apellido").val().trim();
    const email = $("#email").val().trim();
    const numero_documento = $("#numero_documento").val().trim();
    const anio = $("#anio").val().trim();

    if (!nombre || !apellido || !email || !numero_documento || !anio) {
        Swal.fire({
            title: "Error",
            text: "Por favor, complete todos los campos obligatorios.",
            icon: "error",
            confirmButtonColor: "#006699"
        });
        return; // Detiene el proceso si hay campos vacíos
    }

    // Validar formato de email
    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailPattern.test(email)) {
        Swal.fire({
            title: "Error",
            text: "Por favor, ingrese un correo electrónico válido.",
            icon: "error",
            confirmButtonColor: "#006699"
        });
        return; // Detiene el proceso si el email es inválido
    }

    const usuario = {
        id_usuario: $("#id_usuario").val(),
        nombre: nombre,
        apellido: apellido,
        email: email,
        id_documento_tipo: $("#id_documento_tipo").val(),
        numero_documento: numero_documento,
        id_usuario_estado: $("#id_usuario_estado").val(),
        id_carrera: $("#id_carrera").val(),
        anio: anio,
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
            console.log(data);
            if (data.success === true) {
                console.log("funciono", data);
                Swal.fire({
                    title: "El usuario fue modificado con éxito!",
                    confirmButtonColor: "#006699",
                    icon: "success",
                    iconColor: "#118911",
                }).then(() => {
                    location.href = "index.php";
                });
            } else {
                console.log("no funciono", data);
                Swal.fire({
                    title: "Error",
                    text: "No se pudo modificar el usuario. Inténtelo nuevamente.",
                    icon: "error",
                    confirmButtonColor: "#006699"
                });
            }
        },
        error: function (errorThrown) {
            console.log("error", errorThrown);
            Swal.fire({
                title: "Error",
                text: "Ocurrió un error al procesar la solicitud. Inténtelo nuevamente.",
                icon: "error",
                confirmButtonColor: "#006699"
            });
        }
    });
});
