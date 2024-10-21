$(document).ready(function () {
  //Habilita para cambiar la contraseña
  document
    .getElementById("habilitarCambio")
    .addEventListener("click", function () {
      document.getElementById("formulario").style.display = "block";
      document.getElementById("cerrarsesion").style.display = "none";
      this.style.display = "none";
      cerrarsesion
    });

  document
    .getElementById("cancelarCambioBtn")
    .addEventListener("click", function () {
      document.getElementById("formulario").style.display = "none";
      document.getElementById("habilitarCambio").style.display = "block";
      document.getElementById("cerrarsesion").style.display = "block";
    });

  // Modal variables
  var modal = document.getElementById("perfilModal");
  var btn = document.getElementById("openModalBtn");
  var span = document.getElementsByClassName("close")[0];

  // Abre el modal
  btn.onclick = function () {
    modal.style.display = "block";
  };

  // Cierra el modal
  span.onclick = function () {
    modal.style.display = "none";
  };

  // Cierra el modal si el usuario hace clic fuera del contenido
  window.onclick = function (event) {
    if (event.target === modal) {
      modal.style.display = "none";
    }
  };

  // Cierra el modal cuando se presiona el botón cancelar
  document.getElementById("cancelarCambioBtn").onclick = function () {
    // Limpiar los campos del formulario
    document.getElementById("current_password").value = "";
    document.getElementById("new_password").value = "";
    document.getElementById("confirm_password").value = "";
  };

  var loggedIn = sessionStorage.getItem("loggedIn");

  if (loggedIn === "true") {
    var usuario = JSON.parse(sessionStorage.getItem("usuario"));
    if (usuario.id_usuario_estado === 1) {
      $("#openModalBtn").show();

      // Mostrar los datos del usuario en el modal
      $("#bienvenida").text("¡Hola " + usuario.nombre + "!");
      $("#nombre").text(usuario.nombre);
      $("#apellido").text(usuario.apellido);
      $("#email").text(usuario.email);
      $("#password").text("********"); // Ocultar la contraseña
      $("#numero_documento").text(usuario.numero_documento);
    }
  }

  // Manejar el envío del formulario para cambiar la contraseña
  $("#formulario").on("submit", function (event) {
    event.preventDefault(); // Evitar que el formulario se envíe de manera tradicional

    var newPassword = $("#new_password").val();
    var confirmPassword = $("#confirm_password").val();
    var currentPassword = $("#current_password").val();

    if (newPassword !== confirmPassword) {
      Swal.fire({
        icon: "error",
        title: "Contraseñas no coinciden",
        text: "Por favor, asegúrate de que ambas contraseñas sean iguales.",
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
        var usuario = JSON.parse(sessionStorage.getItem("usuario"));

        $.ajax({
          type: "PUT",
          url: "http://localhost/api/api-Alumnos/login.php",
          data: JSON.stringify({
            id_usuario: usuario.id_usuario,
            current_password: currentPassword,
            password: newPassword,
          }),
          contentType: "application/json",
          dataType: "json",
          success: function (data) {
            console.log(data);
            if (data.success) {
              Swal.fire({
                icon: "success",
                title: "Contraseña actualizada",
                text: "Tu contraseña ha sido actualizada con éxito.",
                confirmButtonText: "Aceptar",
                confirmButtonColor: "#3085d6",
              }).then(() => {
                document.getElementById("formulario").style.display = "none";
                document.getElementById("habilitarCambio").style.display = "block";
                document.getElementById("cerrarsesion").style.display = "block";
                // Limpiar los campos del formulario
                document.getElementById("current_password").value = "";
                document.getElementById("new_password").value = "";
                document.getElementById("confirm_password").value = "";
              });
            } else {
              // Mostrar el mensaje de error devuelto por el servidor
              Swal.fire({
                icon: "error",
                title: "Error",
                text: data.error || "Hubo un problema al actualizar tu contraseña. Inténtalo nuevamente.",
                confirmButtonText: "Reintentar",
                confirmButtonColor: "#d33",
              });
              console.log(data);
            }
          },
          error: function (errorThrown) {
            console.log("error", errorThrown);
            Swal.fire({
              icon: "error",
              title: "Error",
              text: "Hubo un error en la comunicación con el servidor. Inténtalo nuevamente.",
              confirmButtonText: "Reintentar",
              confirmButtonColor: "#d33",
            });
          }
        });        
      }
    }
  });
});

function cerrarsesion() {
  // Mostrar alerta de confirmación
  Swal.fire({
    title: "Cerrar sesión",
    text: "¿Estás seguro de que deseas cerrar sesión?",
    icon: "question",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    cancelButtonText: "cancelar",
    confirmButtonText: "Si, cerrar!"
  }).then((result) => {
    if (result.isConfirmed) {
      // Destruir la sesión
      sessionStorage.removeItem('loggedIn');
      sessionStorage.removeItem('usuario');

      // Redirigir al usuario a la página de inicio de sesión
      window.location.href = 'login/index.html';

    }
  });

}