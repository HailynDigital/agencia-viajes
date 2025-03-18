<?php
// Incluir la conexión a la base de datos
include 'conexion.php';
session_start(); // Iniciar sesión

// Verificar si el usuario ya está logueado
if (isset($_SESSION['usuario'])) {
    // Si ya está logueado, redirigir directamente a la página de administración
    header('Location: admin.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Recuperar los datos del formulario
    $usuario = $_POST['usuario'];
    $clave = $_POST['clave'];

    // Verificar si los campos no están vacíos
    if (empty($usuario) || empty($clave)) {
        echo "Por favor, ingrese tanto el usuario como la contraseña.";
    } else {
        // Verificar el usuario en la base de datos
        $sql = "SELECT * FROM administradores WHERE usuario = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $usuario);
        $stmt->execute();
        $resultado = $stmt->get_result();

        if ($resultado->num_rows > 0) {
            // Si el usuario existe, verificar la contraseña
            $row = $resultado->fetch_assoc();
            if (password_verify($clave, $row['clave'])) {
                // Si la contraseña es correcta, iniciar sesión y redirigir al admin
                $_SESSION['usuario'] = $usuario;
                header('Location: admin.php');
                exit();
            } else {
                echo "Contraseña incorrecta.";
            }
        } else {
            echo "Usuario no encontrado.";
        }

        $stmt->close();
        $conn->close();
    }
}
?>

<!-- Formulario de login -->
<form method="POST">
    <label for="usuario">Usuario:</label>
    <input type="text" name="usuario" required><br>

    <label for="clave">Contraseña:</label>
    <input type="password" name="clave" required><br>

    <button type="submit">Iniciar sesión</button>
</form>
