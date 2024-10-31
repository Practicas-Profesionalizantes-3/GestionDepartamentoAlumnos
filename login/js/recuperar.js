$("#formulario").submit(function (event) {
    event.preventDefault();

    const usuario = {
        email: $("#email").val(),
    }

    if (usuario.email == "") {
        Swal.fire({
            title: "¡Por favor ingrese el email!",
            icon: "warning",
            confirmButtonColor: "#006699",
            color: "#721c24"
        });
    } else {
        $.ajax({
            type: "GET",
            url: "http://localhost/api/api-Alumnos/usuarios.php",
            data: usuario,
            success: function (data) {
                if (data.success == true) {
                    const idUsuario = JSON.parse(data.data[0].id_usuario);
                    const linkRecupero = "http://localhost/GestionDepartamentoAlumnos/login/nuevo_pass.php?id=" + idUsuario;
                    const mensajeHTML = `
                            <p>Estimado usuario, </p>
                            <p>Utilice el siguiente <a href="${linkRecupero}" target="_blank">enlace</a> para poder restablecer su password:</p>
                        `;
                    $.ajax({
                        type: "GET",
                        url: "http://localhost/api/api-Alumnos/MailSender/SendMail.php",
                        data: {
                            sendTo: usuario.email,
                            asunto: "Recupero de password",
                            mensaje: mensajeHTML
                        },
                        success: function (respuesta) {
                            if (respuesta.success == true) {
                                Swal.fire({
                                    title: "¡Email enviado!",
                                    icon: "success",
                                    confirmButtonColor: "#006699",
                                    text: "Revisa tu bandeja de entrada.",
                                });
                            } else {
                                Swal.fire({
                                    title: "¡Hubo un problema!",
                                    text: "Intente más tarde.",
                                    icon: "error",
                                    confirmButtonColor: "#c41e1e",
                                });
                            }
                        },
                        error: function (errorThrown) {
                            console.log("error", errorThrown);
                        }
                    });
                } else {
                    console.log("no funciono", data);
                }
            },
            error: function (errorThrown) {
                Swal.fire({
                    title: "¡Usuario no encontrado!",
                    icon: "error",
                    confirmButtonColor: "#c41e1e",
                    text: "Por favor verifique el email ingresado.",
                });
                console.log("error", errorThrown);
            }
        });
    }
});
