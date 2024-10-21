$(document).ready(function() {

    // Evento para el botón Cancelar
    $("#cancelar-anuncio").click(function() {
        // Redirigir a la página deseada
        window.location.href = 'index.php';
    });

    $("#formulario").submit(async function (event) {
        event.preventDefault();
    
        const adjuntoFile = $("#adjunto")[0].files[0];
        const imagenFile = $("#imagen")[0].files[0];
    
        let adjuntoBase64 = "";
        let imagenBase64 = "";
    
        if (adjuntoFile) {
            adjuntoBase64 = await toBase64(adjuntoFile);
        }
    
        if (imagenFile) {
            imagenBase64 = await toBase64(imagenFile);
        }
    
        const aviso = {
            id_aviso: $("#id_aviso").val(),
            id_aviso_tipo: $("#id_aviso_tipo").val(),
            id_usuario: $("#id_usuario").val(),
            titulo: $("#titulo").val(),
            descripcion: $("#descripcion").val(),

            fecha_vencimiento: $("#fecha_vencimiento").val(),
            adjunto: adjuntoBase64,
            fijado: $("#fijado").val(),
            imagen: imagenBase64,
            id_aviso_estado: $("#id_aviso_estado").val()
        };
    
        if (!aviso.titulo || !aviso.descripcion || !aviso.imagen) {
            Swal.fire({
                title: "Error",
                text: "Por favor, complete todos los campos requeridos.",
                icon: "error",
                confirmButtonColor: "#006699"
            });
            return;
        } else{
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
    
            $.ajax({
                type: "PUT",
                url: "http://localhost/api/api-Alumnos/cartelera.php",
                data: JSON.stringify(aviso),
                contentType: "application/json",
                dataType: "json",
                success: function (data) {
                    console.log(data)
                    if (data.success == true) {
                        console.log("funciono", data);
                        Swal.fire({
                            title: "Su aviso fue modificado con exito!",
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
        function toBase64(file) {
            return new Promise((resolve, reject) => {
                const reader = new FileReader();
                reader.readAsDataURL(file);
                reader.onload = () => resolve(reader.result.split(',')[1]);
                reader.onerror = error => reject(error);
            });
        }
    });
});