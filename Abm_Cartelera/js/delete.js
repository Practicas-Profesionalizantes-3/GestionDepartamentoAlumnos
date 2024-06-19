function eliminarAviso(id) {
    $.ajax({
        type: "DELETE",
        url: "http://localhost/api/api-Alumnos/cartelera.php",
        data: JSON.stringify({ id_aviso: id }),
        contentType: "application/json",
        dataType: "json",
        success: function (data) {
            if (data.success) {
                console.log("Funcionó:", data);
                location.href = "index.php";
            } else {
                console.log("No funcionó:", data);
            }
        },
        error: function (errorThrown) {
            console.log("Error:", errorThrown);
        }
    });
}
