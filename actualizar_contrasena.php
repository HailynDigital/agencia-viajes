<?php
// Incluir la conexión a la base de datos
include 'conexion.php';

// Usuario y contraseña
$usuario = 'admin';
$clave = password_hash('admin123', PASSWORD_DEFAULT); // Encriptamos la contraseña

// Crear la consulta para actualizar la contraseña
$sql = "UPDATE administradores SET clave = ? WHERE usuario = ?";

// Preparar la consulta
$stmt = $conn->prepare($sql);
if ($stmt === false) {
    die('Error en la preparación de la consulta: ' . $conn->error);
}

// Vincular los parámetros
$stmt->bind_param('ss', $clave, $usuario); // 'ss' significa que ambos parámetros son cadenas (strings)

// Ejecutar la consulta
if ($stmt->execute()) {
    echo "Contraseña actualizada exitosamente!";
} else {
    echo "Error al actualizar la contraseña: " . $stmt->error;
}

// Cerrar la consulta
$stmt->close();
$conn->close();
?>
