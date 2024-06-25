<?php
    include ('config/bd.php');

    // Obtiene los datos del formulario
    $id_usuario = $_POST['id_usuario'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];
    $error = '';

    // Compara que las dos contraseñas coincidan
    if($new_password == $confirm_password){
        // Hash la contraseña para almacenarla de forma segura
        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
        // Actualiza la contraseña en la base de datos
        try {
            $sentencia = $conexion->prepare("UPDATE `usuarios` SET password = :hashed_password WHERE id_usuario = :id_usuario");
            $sentencia->bindParam(':hashed_password', $hashed_password);
            $sentencia->bindParam(':id_usuario', $id_usuario);
            $sentencia->execute();
        } catch (PDOException $e) {
            echo "Error al restablecer la contraseña: " . $e->getMessage();
        }
        // Verifica si la consulta se ejecutó correctamente
        if ($sentencia->rowCount() > 0) {
            echo "Contraseña restablecida con éxito";
            header('Location: index.html');
            exit();
        } else {
            echo "Error al restablecer la contraseña: " ;
        }
        
        // Cierra la sentencia y la conexión
        $sentencia->closeCursor();
        $conexion = null;
    } else{
        header(("Location: nuevo_pass.php?id=$id_usuario"));
        exit();
    }
?>
