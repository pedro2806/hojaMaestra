<?php
session_start();

// Tu conexión existente
include 'conn.php';

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
/*
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ss", $identificador, $identificador);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    */
    
    if ($stmt = $conn->prepare($sql)) {
          // Enlazar los parámetros dinámicamente        
        $stmt->bind_param("ss", $identificador, $identificador);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result && $result->num_rows > 0) {
            echo 'Usuario encontrado'; // Usuario encontrado
        } else {
            echo 'Usuario NO encontrado'; // Usuario encontrado
        }
        $stmt->close();
    } else {
        echo 'Error'; // Usuario encontrado
    }
    $conn->close();
}
?>