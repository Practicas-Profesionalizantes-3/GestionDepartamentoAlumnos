<?php
    include ('config/bd.php');

    // Obtiene los datos del formulario
    $id_usuario = $_POST['id_usuario'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];
    $error = '';

    // Función para validar la contraseña
    function validar_contrasena($password) {
        // Requiere al menos 8 caracteres, una letra mayúscula, una minúscula, un número y un carácter especial
        $regex = '/^(?=.*[A-Z])(?=.*\d)[A-Za-z\d]{8,}$/';
        return preg_match($regex, $password);
    }

    // Compara que las dos contraseñas coincidan
    if ($new_password == $confirm_password) {
        // Valida que la nueva contraseña cumpla con los requisitos
        if (validar_contrasena($new_password)) {
            // Hash la contraseña para almacenarla de forma segura
            $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

            // Actualiza la contraseña en la base de datos
            try {
                $sentencia = $conexion->prepare("UPDATE `usuarios` SET password = :hashed_password WHERE id_usuario = :id_usuario");
                $sentencia->bindParam(':hashed_password', $hashed_password);
                $sentencia->bindParam(':id_usuario', $id_usuario);
                $sentencia->execute();
            } catch (PDOException $e) {
                header("Location: nuevo_pass.php?id=$id_usuario&error=Error al restablecer la contraseña: " . urlencode($e->getMessage()));
                exit();
            }

            // Verifica si la consulta se ejecutó correctamente
            if ($sentencia->rowCount() > 0) {
                header('Location: index.html?mensaje=Contraseña restablecida con éxito');
                exit();
            } else {
                header("Location: nuevo_pass.php?id=$id_usuario&error=Error al restablecer la contraseña.");
                exit();
            }

            // Cierra la sentencia y la conexión
            $sentencia->closeCursor();
            $conexion = null;
        } else {
            header("Location: nuevo_pass.php?id=$id_usuario&error=La nueva contraseña no cumple con los requisitos mínimos.");
            exit();
        }
    } else {
        header("Location: nuevo_pass.php?id=$id_usuario&error=Las contraseñas no coinciden.");
        exit();
    }
?>
