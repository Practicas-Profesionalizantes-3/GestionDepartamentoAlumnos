$(document).ready(function() {
    var usuario = JSON.parse(sessionStorage.getItem("usuario"));
    $("#nombre").val(usuario.nombre + " " + usuario.apellido); // Establecer el valor del campo id_usuario
    $("#id_usuario").val(usuario.id_usuario);

    // Evento para el botón Cancelar
    $("#cancelar-anuncio").click(function() {
        // Redirigir a la página deseada
        window.location.href = 'index.php';
    });

    $("#formulario").submit(function(event) {
        event.preventDefault();

        // Validar que los campos requeridos no estén vacíos
        if ($("#titulo").val() === "" || $("#descripcion").val() === "" || $("#fecha_vencimiento").val() === "" || $("#imagen").val() === "") {
            Swal.fire({
                title: "Error",
                text: "Por favor, complete todos los campos requeridos.",
                icon: "error",
                confirmButtonColor: "#006699"
            });
            return;
        }

        // Obtener la fecha de vencimiento y la fecha de hoy
        var fechaVencimiento = new Date($("#fecha_vencimiento").val());
        var hoy = new Date(); // Fecha actual

        // Asegurarse de que la hora no afecte la comparación
        hoy.setHours(0, 0, 0, 0); // Establecer la hora a medianoche
        fechaVencimiento.setHours(0, 0, 0, ); // Establecer la hora a medianoche para la fecha de vencimiento

        // Validar que la fecha de vencimiento sea mayor o igual a la fecha de hoy
        if (fechaVencimiento < hoy) {
            Swal.fire({
                title: "Error",
                text: "La fecha de vencimiento debe ser mayor a la de hoy.",
                icon: "error",
                confirmButtonColor: "#006699"
            });
            return;
        }

        var formData = new FormData(this); // Captura todos los datos del formulario

        // Crear el aviso
        $.ajax({
            type: "POST",
            url: "http://localhost/api/api-Alumnos/cartelera.php",
            data: formData,
            processData: false,
            contentType: false,
            success: function(data) {
                if (data.success) {
                    var avisoId = data.id_aviso; // Suponiendo que devuelves el ID del aviso creado

                    // Crear la notificación
                    var notificacionData = {
                        id_aviso: avisoId,
                        id_notificacion_tipo: 3,
                        id_notificacion_estado: 4,
                        fecha_envio_notificacion: new Date().toISOString()
                    };

                    $.ajax({
                        type: "POST",
                        url: "http://localhost/api/api-Alumnos/notificaciones.php",
                        data: JSON.stringify(notificacionData),
                        contentType: "application/json",
                        success: function(notificacionResponse) {
                            Swal.fire({
                                title: "Su aviso y notificación fueron creados con éxito!",
                                icon: "success",
                                confirmButtonColor: "#006699",
                            }).then(() => {
                                location.href = "index.php";
                            });
                        },
                        error: function(error) {
                            Swal.fire({
                                title: "Error",
                                text: "No se pudo crear la notificación. Intente nuevamente.",
                                icon: "error",
                                confirmButtonColor: "#006699"
                            });
                        }
                    });
                } else {
                    Swal.fire({
                        title: "Error",
                        text: "No se pudo crear el aviso. Intente nuevamente.",
                        icon: "error",
                        confirmButtonColor: "#006699"
                    });
                }
            },
            error: function() {
                Swal.fire({
                    title: "Error",
                    text: "Ocurrió un error al crear el aviso. Intente nuevamente.",
                    icon: "error",
                    confirmButtonColor: "#006699"
                });
            }
        });
    });
});
