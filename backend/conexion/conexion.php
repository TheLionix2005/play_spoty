<?php
$servername = "localhost"; // Cambia esto si tu servidor MySQL está en un host diferente
$username = "root"; // Cambia esto por tu nombre de usuario de MySQL
$password = ""; // Cambia esto por tu contraseña de MySQL
$database = "music"; // Cambia esto por el nombre de tu base de datos

// Crear conexión
$conn = new mysqli($servername, $username, $password, $database);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
echo ""; // Esto es opcional, solo para verificar que la conexión fue exitosa

// Recuerda cerrar la conexión al finalizar tu script o cuando ya no la necesites.
// $conn->close();
?>
