$("#formulario").submit(function (event) {
    event.preventDefault();
    $.ajax({
        type: "POST",
        url: "http://localhost/Practicas3/login/login.php",
        success: function (data) {
            console.log("funciona")
            console.log(data)
        },
        error: function (errorThrown) {
            console.log("no funciona: " + errorThrown)
        }
    });
})