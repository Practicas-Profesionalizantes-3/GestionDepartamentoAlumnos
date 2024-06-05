$("#formulario").submit(function (event) {
    event.preventDefault();
    var usuario = {
        user: $("#username").val(),
        password: $("#password").val()
    }
    mostrarModal()

    $.ajax({
        type: "POST",
        data: JSON.stringify(usuario),
        url: "http://localhost/Practicas3/login/login.php",
        success: function (data) {
            console.log("funciona")
            console.log(data)
            ocultarModal();
            if (data.success == true)
                location.href = "../index.html"
            else{
                $("#errorMessage").show();
                $("#errorMessage").text(data.error);
            }
        },
        error: function (errorThrown) {
            console.log("no funciona: " + errorThrown)
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

// When the user clicks the button, open the modal 
function mostrarModal() {
    modal.style.display = "flex";
}

// When the user clicks on <span> (x), close the modal
function ocultarModal() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function (event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}