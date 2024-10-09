$("#formulario").submit(function (event) {
    event.preventDefault();

    const usuario = {
        email: $("#email").val(),
    }

    if (usuario.email == "") {
        Toastify({
            text: "⚠️ Por favor ingrese el email⚠️",
            duration: 1500,
            gravity: "top",
            style: {
                background: "#c41e1e",
                color: "#fff"
            }
        }).showToast();
    } else {
        $.ajax({
            type: "GET",
            url: "http://localhost/api/api-Alumnos/usuarios.php",
            data: usuario,
            success: function (data) {
                if (data.success == true) {
                    const idUsuario = JSON.parse(data.data[0].id_usuario);
                    $.ajax({
                        type: "GET",
                        url: "http://localhost/api/api-Alumnos/MailSender/SendMail.php",
                        data: {
                            sendTo: usuario.email,
                            asunto: "Recupero de password",
                            mensaje: "Estimado usuario, utilice el siguiente link para poder restablecer su contraseña: http://localhost/GestionDepartamentoAlumnos/login/nuevo_pass.php?id=" + idUsuario
                        },
                        success: function (respuesta) {
                            if (respuesta.success == true) {
                                Swal.fire({
                                    title: "Email enviado!",
                                    confirmButtonColor: "#006699",
                                    icon: "success",
                                    iconColor: "#118911",
                                });
                            } else {
                                Toastify({
                                    text: "⚠️ Hubo un problema, intente mas tarde⚠️",
                                    duration: 1500,
                                    gravity: "top",
                                    style: {
                                        background: "#c41e1e",
                                        color: "#fff"
                                    }
                                }).showToast();
                            }
                        },
                        error: function (errorThrown) {
                            console.log("error", errorThrown);
                        }
                    });
                } else {
                    Toastify({
                        text: "⚠️ Usuario no encontrado⚠️",
                        duration: 1500,
                        gravity: "top",
                        style: {
                            background: "#c41e1e",
                            color: "#fff"
                        }
                    }).showToast();
                    console.log("no funciono", data);
                }
            },
            error: function (errorThrown) {
                console.log("error", errorThrown);
            }
        });
    }
});