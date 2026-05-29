<?php
session_start();

// Tu conexión existente
include 'conn.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // 1. Recoger datos del formulario
    $nombre_visual = mysqli_real_escape_string($conn, $_POST['nombre_visual']);
    $codigo_maestro = mysqli_real_escape_string($conn, $_POST['codigo_maestro']);
    $id_depto = intval($_POST['id_departamento']);
    $password_descarga = $_POST['password_descarga']; // En un sistema real, considera usar password_hash
    $version = mysqli_real_escape_string($conn, $_POST['version']);
    $id_usuario = $_SESSION['user_id'];

    // 2. Configuración del Archivo
    $directorio_destino = "uploads/documentos/";
    
    // Crear el directorio si no existe
    if (!file_exists($directorio_destino)) {
        mkdir($directorio_destino, 0777, true);
    }

    $archivo_nombre_orig = $_FILES['archivo']['name'];
    $archivo_extension = pathinfo($archivo_nombre_orig, PATHINFO_EXTENSION);
    
    // Generamos un nombre físico único para evitar sobreescritura
    $nombre_archivo_fisico = time() . "_" . bin2hex(random_bytes(5)) . "." . $archivo_extension;
    $ruta_final = $directorio_destino . $nombre_archivo_fisico;

    // 3. Validaciones y Movimiento
    if (move_uploaded_file($_FILES['archivo']['tmp_name'], $ruta_final)) {
        
        // 4. Inserción en Base de Datos
        $sql = "INSERT INTO documentos (
                    codigo_maestro, nombre_visual, nombre_archivo_fisico, 
                    ruta_almacenamiento, extension, password_descarga, 
                    version, id_departamento, id_usuario_subio
                ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "sssssssii", 
            $codigo_maestro, $nombre_visual, $nombre_archivo_fisico, 
            $directorio_destino, $archivo_extension, $password_descarga, 
            $version, $id_depto, $id_usuario
        );

        if (mysqli_stmt_execute($stmt)) {
            echo "<script>alert('Documento guardado con éxito'); window.location.href='bienvenida.php';</script>";
        } else {
            echo "Error en BD: " . mysqli_error($conn);
        }
        mysqli_stmt_close($stmt);
    } else {
        echo "Error al subir el archivo físico.";
    }
}
mysqli_close($conn);
?>