$("#formulario").submit(function (event) {
    event.preventDefault();

    const usuario = {
        email: $("#email").val().trim(),
    };

    // Validar el campo de email
    if (usuario.email === "") {
        Swal.fire({
            title: "⚠️ Por favor ingrese el email ⚠️",
            icon: "warning",
            confirmButtonColor: "#c41e1e",
            iconColor: "#c41e1e"
        });
        return;
    } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(usuario.email)) {
        Swal.fire({
            title: "⚠️ Ingrese un email válido ⚠️",
            icon: "warning",
            confirmButtonColor: "#c41e1e",
            iconColor: "#c41e1e"
        });
        return;
    }

    // Mostrar mensaje de carga
    Swal.fire({
        title: "Enviando...",
        text: "Por favor espere mientras procesamos su solicitud.",
        allowOutsideClick: false,
        showConfirmButton: false,
        willOpen: () => {
            Swal.showLoading();
        }
    });

    $.ajax({
        type: "GET",
        url: "http://localhost/api/api-Alumnos/usuarios.php",
        data: usuario,
        success: function (data) {
            if (data.success === true && data.data.length > 0) {
                const idUsuario = data.data[0].id_usuario;
                $.ajax({
                    type: "GET",
                    url: "http://localhost/api/api-Alumnos/MailSender/SendMail.php",
                    data: {
                        sendTo: usuario.email,
                        asunto: "Recupero de password",
                        mensaje: "Estimado usuario, utilice el siguiente link para restablecer su contraseña: http://localhost/GestionDepartamentoAlumnos/login/nuevo_pass.php?id=" + idUsuario
                    },
                    success: function (respuesta) {
                        Swal.fire({
                            title: respuesta.success === true ? "Email enviado!" : "⚠️ Hubo un problema, intente más tarde ⚠️",
                            text: respuesta.success === true ? "Se ha enviado un correo con el enlace para restablecer la contraseña." : "No se pudo enviar el email. Intente nuevamente más tarde.",
                            icon: respuesta.success === true ? "success" : "error",
                            confirmButtonColor: respuesta.success === true ? "#006699" : "#c41e1e",
                            iconColor: respuesta.success === true ? "#118911" : "#c41e1e"
                        });
                    },
                    error: function () {
                        Swal.fire({
                            title: "⚠️ Error en el envío de email ⚠️",
                            icon: "error",
                            confirmButtonColor: "#c41e1e",
                            iconColor: "#c41e1e"
                        });
                    }
                });
            } else {
                Swal.fire({
                    title: "⚠️ Usuario no encontrado ⚠️",
                    icon: "warning",
                    confirmButtonColor: "#c41e1e",
                    iconColor: "#c41e1e"
                });
            }
        },
        error: function () {
            Swal.fire({
                title: "⚠️ Error en la solicitud ⚠️",
                text: "No se pudo conectar con el servidor. Intente más tarde.",
                icon: "error",
                confirmButtonColor: "#c41e1e",
                iconColor: "#c41e1e"
            });
        }
    });
});
