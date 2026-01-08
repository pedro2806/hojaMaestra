<?php
// Crear conexión
$conn = new mysqli("localhost", "mess_incidencias", "Pipmytrade123", "mess_rrhh");
// Verificar si la conexión fue exitosa
if ($conn->connect_error) {
    die("Error en la conexión: " . $conn->connect_error);
    
}
?>