<?php
session_start();

// Tu conexión existente
include 'conn.php';

$error_message = ''; // Variable para almacenar mensajes de error

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibimos el identificador (puede ser username o email)
    $identificador = $_POST['usuario'];
    $password_input = $_POST['password'];

    // 1. Buscamos al usuario por correo O nombre de usuario e incluimos el rol
    $sql = "SELECT u.id_usuario, u.username, u.password_hash, u.nombres, u.id_rol, r.nombre_rol 
            FROM usuarios u 
            JOIN roles r ON u.id_rol = r.id_rol 
            WHERE (u.username = ? OR u.email = ?) AND u.estado = 'activo' 
            LIMIT 1";
    
    if ($stmt = $conn->prepare($sql)) {
        // Enlazar los parámetros dinámicamente
        $stmt->bind_param("ss", $identificador, $identificador);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result && $result->num_rows > 0) {
            $user = $result->fetch_assoc();

            // Verificar la contraseña
            if (password_verify($password_input, $user['password_hash'])) {
                // Contraseña correcta, iniciar sesión
                $_SESSION['user_id'] = $user['id_usuario'];
                $_SESSION['nombre_completo'] = $user['nombres'];
                $_SESSION['rol_nombre'] = $user['nombre_rol'];

                // Redirigir a la página de bienvenida
                header("Location: bienvenida.php");
                exit();
            } else {
                // Contraseña incorrecta
                $error_message = "Usuario o contraseña incorrectos.";
            }
        } else {
            // Usuario no encontrado
            $error_message = "Usuario o contraseña incorrectos.";
        }
        $stmt->close();
    } else {
        // Error en la preparación de la consulta
        $error_message = "Error del sistema. Por favor, inténtelo de nuevo más tarde.";
    }
    $conn->close();

    // Si hubo un error, redirigir de vuelta al login con un mensaje
    if (!empty($error_message)) {
        // Redirigir de vuelta a index.php con el mensaje de error
        header("Location: index.php?error=" . urlencode($error_message));
        exit();
    }
} else {
    // Si no es un método POST, redirigir al login
    header("Location: index.php");
    exit();
}
?>