$("#formulario").submit(function (event) {
    event.preventDefault();
    var usuario = {
        nombre: $("#nombre").val(),
        apellido: $("#apellido").val(),
        dni: $("#dni").val(),
        email: $("#email").val(),
        password: $("#password").val()
    }

    $.ajax({
        type: "POST",
        data: JSON.stringify(usuario),
        url: "http://localhost/GestionDepartamentoAlumnos/login/registrar.php",
        success: function (data) {
            console.log("funciona")
            console.log(data)
            if (data.success == true) {
                console.log("creado");
                showToast();
            }
            else {
                $("#errorMessage").show();
                $("#errorMessage").text(data.error);
            }
        },
        error: function (errorThrown) {
            console.log("no funciona: " + errorThrown)
        }
    });
})

$("#dni").on("input", function () {
    $("#errorMessage").hide();
})
$("#email").on("input", function () {
    $("#errorMessage").hide();
})

var toastTrigger = document.getElementById('liveToastBtn')
var toastLiveExample = document.getElementById('liveToast')
if (toastTrigger) {
    toastTrigger.addEventListener('click', function () {
        showToast()
    })
}

function showToast() {
    var toast = new bootstrap.Toast(toastLiveExample)

    toast.show()
}