<?php
// Crear conexión
$conn = new mysqli("localhost", "siic2026", "koruz314*", "control_documentos");
// Verificar si la conexión fue exitosa
if ($conn->connect_error) {
    die("Error en la conexión: " . $conn->connect_error);
    
}
?>