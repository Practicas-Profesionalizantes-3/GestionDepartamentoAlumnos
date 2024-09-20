$("#formulario").on("submit", function (event) {
    event.preventDefault(); // Evitar que el formulario se envíe de manera tradicional

    var id_usuario = $("#id_usuario").val();
    var newPassword = $("#new_password").val();
    var confirmPassword = $("#confirm_password").val();

    if (newPassword !== confirmPassword) {
        Swal.fire({
            icon: "error",
            title: "Contraseñas no coinciden",
            text: "Por favor, asegurate de que ambas contraseñas sean iguales.",
            confirmButtonText: "Reintentar",
            confirmButtonColor: "#d33",
        });
    } else {
        // Validar la contraseña con el patrón especificado
        var passwordPattern = /^(?=.*[A-Z])(?=.*\d)[A-Za-z\d]{8,}$/;
        if (!passwordPattern.test(newPassword)) {
            Swal.fire({
                icon: "warning",
                title: "Contraseña inválida",
                text: "Tu nueva contraseña debe tener al menos 8 caracteres, una letra mayúscula y un número.",
                confirmButtonText: "Entendido",
                confirmButtonColor: "#3085d6",
            });
        } else {
            $.ajax({
                type: "PUT",
                url: "http://localhost/api/api-Alumnos/login.php",
                data: JSON.stringify({
                    id_usuario: id_usuario,
                    password: newPassword,
                }),
                contentType: "application/json",
                dataType: "json",
                success: function (data) {
                    if (data.success == true) {
                        console.log("funciono", data);
                        Swal.fire({
                            icon: "success",
                            title: "Contraseña actualizada",
                            text: "Tu contraseña ha sido restablecida con éxito.",
                            confirmButtonText: "Aceptar",
                            confirmButtonColor: "#3085d6",
                        });
                        window.location.href = "../login/index.html"
                    } else {
                        Swal.fire({
                            icon: "error",
                            title: "Error",
                            text: "Hubo un problema al restablecer tu contraseña. Intenta nuevamente.",
                            confirmButtonText: "Reintentar",
                            confirmButtonColor: "#d33",
                        });
                        console.log(data)
                    }
                },
                error: function (errorThrown) {
                    console.log("error", errorThrown);
                }
            });
        }
    }
});