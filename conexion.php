<?php
$servername = "localhost";
$username = "root"; // Usuario de MySQL (usualmente 'root' en MAMP)
$password = "root"; // Contraseña de MySQL (usualmente 'root' en MAMP)
$dbname = "AGENCIA"; // Nombre de tu base de datos

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
