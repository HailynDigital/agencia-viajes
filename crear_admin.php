<?php
include 'conexion.php'; // Incluye la conexión a la base de datos

// Definir usuario y clave
$usuario = 'admin';
$clave = password_hash('admin123', PASSWORD_DEFAULT); // Encriptamos la contraseña

// Verificar si el usuario ya existe en la base de datos
$sql = "SELECT * FROM administradores WHERE usuario = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $usuario);
$stmt->execute();
$resultado = $stmt->get_result();

if ($resultado->num_rows == 0) {
    // Si no existe, insertamos el nuevo usuario
    $insert_sql = "INSERT INTO administradores (usuario, clave) VALUES (?, ?)";
    $insert_stmt = $conn->prepare($insert_sql);
    $insert_stmt->bind_param("ss", $usuario, $clave);

    if ($insert_stmt->execute()) {
        echo "Administrador creado con éxito!";
    } else {
        echo "Error al crear el administrador: " . $conn->error;
    }
} else {
    echo "El usuario ya existe.";
}

$stmt->close();
$insert_stmt->close();
$conn->close();
?>
