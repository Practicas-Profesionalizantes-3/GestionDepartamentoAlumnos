$("#formulario").submit(function (event) {
    event.preventDefault();
    var usuario = {
        user: $("#username").val(),
        password: $("#password").val()
    }
    mostrarModal();

    $.ajax({
        type: "POST",
        data: JSON.stringify(usuario),
        url: "http://localhost/api/api-Alumnos/usuarios.php",
        success: function (data) {
            ocultarModal();
            if (data.success == true){
                location.href = "../index.php"
            }
            else{
                $("#errorMessage").show();
                $("#errorMessage").text(data.error);
            }
        },
        error: function (errorThrown) {
            console.log(errorThrown)
        }
    });
})

$("#username").on("input", function (){
    $("#errorMessage").hide();
})
$("#password").on("input", function (){
    $("#errorMessage").hide();
})

var modal = document.getElementById("myModal");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("closeSuccess")[0];

function mostrarModal() {
    modal.style.display = "flex";
}

function ocultarModal() {
    modal.style.display = "none";
}

window.onclick = function (event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}