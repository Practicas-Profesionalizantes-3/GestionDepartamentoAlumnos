function contactar(){
    let nombre = $("#userNombre").val();
    let userEmail = $("#userEmail").val();
    let asunto = $("#asuntoEmail").val();
    let cuerpo = $("#cuerpoEmail").val();
    
    // Validaciones
    if (!nombre || !userEmail || !asunto || !cuerpo) {
        Swal.fire({
            title: "¡Campos incompletos!",
            text: "Por favor completa todos los campos antes de enviar.",
            icon: "warning",
            confirmButtonColor: "#006699",
        });
        return; // Detener la ejecución si algún campo está vacío
    }

    $.ajax({
        type: "GET",
        url: "http://localhost/api/api-Alumnos/usuarios.php",
        success: function (data) {
            if (data.success == true) {
                let dtoAlumno = data.data.filter(x => x.id_usuario_tipo == 3)[0];
                const cuerpoEmail = nombre + ", cuyo email es " + userEmail + ", te contacto a traves del formulario de contacto de la pagina web: "  + cuerpo;
                $.ajax({
                    type: "GET",
                    url: "http://localhost/api/api-Alumnos/MailSender/SendMail.php",
                    data: {
                        sendTo: dtoAlumno.email,
                        asunto: "Formulario de Contacto ITB" + " - " + asunto,
                        mensaje: cuerpoEmail
                    },
                    success: function (respuesta) {
                        if (respuesta.success == true) {
                            Swal.fire({
                                title: "¡Email enviado!",
                                icon: "success",
                                confirmButtonColor: "#006699",
                                text: "Revisa tu bandeja de entrada.",
                            }).then(() => {
                                // Limpiar los campos
                                $("#userNombre").val('');
                                $("#userEmail").val('');
                                $("#asuntoEmail").val('');
                                $("#cuerpoEmail").val('');
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
                title: "¡Error al enviar el email!",
                icon: "error",
                confirmButtonColor: "#c41e1e",
                text: "Por favor intente nuevamente.",
            });
            console.log("error", errorThrown);
        }
    });

}