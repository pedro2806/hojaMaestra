<?php
// 1. Asegúrate de que no haya ni un solo espacio en blanco antes de <?php
ob_start(); // Inicia el búfer de salida
session_start();

if (!isset($_SESSION['user_id'])) {
    die("Acceso denegado.");
}

$conn = mysqli_connect("localhost", "mess_incidencias", "Pipmytrade123", "control_documentos");

if (isset($_GET['file'])) {
    $nombre_fisico = mysqli_real_escape_string($conn, $_GET['file']);

    $sql = "SELECT ruta_almacenamiento, nombre_visual, extension FROM documentos WHERE nombre_archivo_fisico = '$nombre_fisico' LIMIT 1";
    $result = $conn->query($sql);

    if ($row = $result->fetch_assoc()) {
        $ruta_completa = $row['ruta_almacenamiento'] . $nombre_fisico;

        if (file_exists($ruta_completa)) {
            // 2. Limpiamos cualquier salida previa (espacios, errores, advertencias)
            ob_end_clean(); 
            
            // 3. Encabezados robustos para forzar la descarga
            header('Content-Description: File Transfer');
            header('Content-Type: application/pdf'); // Cambiado específicamente para PDF
            header('Content-Disposition: attachment; filename="' . $row['nombre_visual'] . '.' . $row['extension'] . '"');
            header('Content-Transfer-Encoding: binary');
            header('Expires: 0');
            header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
            header('Pragma: public');
            header('Content-Length: ' . filesize($ruta_completa));
            
            // 4. Leer el archivo y salir inmediatamente
            readfile($ruta_completa);
            exit;
        } else {
            die("Error: Archivo físico no encontrado.");
        }
    }
}
mysqli_close($conn);