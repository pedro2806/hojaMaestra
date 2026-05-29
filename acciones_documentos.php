<?php
// Usando tu conexión
$conn = mysqli_connect("localhost", "mess_incidencias", "Pipmytrade123", "control_documentos");
mysqli_set_charset($conn, "utf8");

$opcion = $_POST["opcion"];

// ACCIÓN: OBTENER LISTA DE HOJAS MAESTRAS
if ($opcion == "listarHojasMaestras") {
    $sql = "SELECT d.*, 
            (SELECT MAX(fecha_descarga) FROM descargas_log WHERE id_documento = d.id_documento) as ultima_descarga,
            (SELECT u.username FROM descargas_log l JOIN usuarios u ON l.id_usuario = u.id_usuario 
             WHERE l.id_documento = d.id_documento ORDER BY l.fecha_descarga DESC LIMIT 1) as quien_descargo
            FROM documentos d";
            
    $result = $conn->query($sql);
    $documentos = array();

    while ($row = $result->fetch_assoc()) {
        $documentos[] = array(
            'id' => $row['id_documento'],
            'codigo' => $row['codigo_maestro'],
            'nombre' => $row['nombre_visual'],
            'fecha_creacion' => date('d/m/Y', strtotime($row['fecha_creacion'])),
            'ultima_descarga' => $row['ultima_descarga'] ? date('d/m/Y H:i', strtotime($row['ultima_descarga'])) : 'Sin descargas',
            'usuario_descarga' => $row['quien_descargo'] ?? 'N/A'
        );
    }
    echo json_encode($documentos);
}

// ACCIÓN: VALIDAR CONTRASEÑA Y REGISTRAR DESCARGA
if ($opcion == "validarPassword") {
    $id_doc = $_POST['id_doc'];
    $pass = $_POST['pass'];
    $id_usuario = $_POST['id_usuario']; // O tomar de sesión/cookie

    $sql = "SELECT password_descarga, ruta_almacenamiento, nombre_archivo_fisico FROM documentos WHERE id_documento = $id_doc";
    $res = $conn->query($sql);
    $doc = $res->fetch_assoc();

    if ($doc && $pass === $doc['password_descarga']) {
        // Registrar en log
        $conn->query("INSERT INTO descargas_log (id_documento, id_usuario) VALUES ($id_doc, $id_usuario)");
        
        echo json_encode(['status' => 'success', 'archivo' => $doc['nombre_archivo_fisico']]);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Contraseña incorrecta']);
    }
}

// ACCIÓN: OBTENER HISTORIAL GENERAL DE DESCARGAS
if ($opcion == "verHistorialDescargas") {
    $sql = "SELECT 
                l.fecha_descarga, 
                d.nombre_visual, 
                d.codigo_maestro, 
                u.nombres, 
                u.apellidos 
            FROM descargas_log l
            INNER JOIN documentos d ON l.id_documento = d.id_documento
            INNER JOIN usuarios u ON l.id_usuario = u.id_usuario
            ORDER BY l.fecha_descarga DESC";
            
    $result = $conn->query($sql);
    $historial = array();

    while ($row = $result->fetch_assoc()) {
        $historial[] = array(
            'fecha' => date('d/m/Y H:i:s', strtotime($row['fecha_descarga'])),
            'documento' => "[" . $row['codigo_maestro'] . "] " . $row['nombre_visual'],
            'usuario' => $row['nombres'] . " " . $row['apellidos']
        );
    }
    echo json_encode($historial);
}
?>