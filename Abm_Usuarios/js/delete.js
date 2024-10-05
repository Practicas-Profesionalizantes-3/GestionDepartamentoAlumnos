function eliminarUsuario(id) {
    Swal.fire({
        title: "¿Queres eliminar este usuario?",
        text: "",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Si, eliminar!"
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "DELETE",
                url: "http://localhost/api/api-Alumnos/usuarios.php",
                data: JSON.stringify({ id_usuario: id }),
                contentType: "application/json",
                dataType: "json",
                success: function (data) {
                    if (data.success) {
                        console.log("Funcionó:", data);
                        Swal.fire({
                            title: "Eliminado!",
                            confirmButtonColor: "#006699",
                            text: "Este usuario ha sido eliminado.",
                            icon: "success",
                            iconColor: "#118911",
                        }).then(() => {
                            location.href = "index.php";
                        });
                    } else {
                        console.log("No funcionó:", data);
                    }
                },
                error: function (errorThrown) {
                    console.log("Error:", errorThrown);
                }
            });
        }
    });
}