<?php 
session_start();
include 'notificaciones.php'; 
include 'conexion.php'; // Incluimos la conexión

// Verificar si el usuario está logueado como administrador
if (isset($_SESSION['usuario']) && $_SESSION['usuario'] === 'admin') {
    // Si el usuario está logueado como administrador, mostrar la opción de cerrar sesión
    if (isset($_GET['logout']) && $_GET['logout'] === 'true') {
        // Destruir la sesión y redirigir a la página principal
        session_destroy();
        header("Location: index.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agencia de Viajes</title>
    <link rel="stylesheet" href="../agencia_viajes/css/styles.css">
</head>
<body>

    <header>
        <h1>Bienvenido a la Agencia de Viajes</h1>
        <p>Encuentra las mejores ofertas y destinos para tu próxima aventura</p>
    </header>

    <!-- Formulario de Búsqueda -->
    <div class="search-container">
        <h2>Encuentra tu destino ideal</h2>
        <form action="procesar_formulario.php" method="POST">
            <label for="hotel">Nombre del Hotel:</label>
            <input type="text" name="hotel" required>

            <label for="ciudad">Ciudad:</label>
            <input type="text" name="ciudad" required>

            <label for="pais">País:</label>
            <input type="text" name="pais" required>

            <label for="fecha">Fecha de Viaje:</label>
            <input type="date" name="fecha" required>

            <label for="duracion">Duración (días):</label>
            <input type="number" name="duracion" min="1" required>

            <button type="submit">Buscar Viajes</button>
        </form>
    </div>

    <!-- Sección de Carrito de Compras -->
    <div class="carrito-container">
        <h2>Selecciona tu paquete turístico</h2>
        <form action="agregar_carrito.php" method="POST">
            <label for="paquete">Paquete Turístico:</label>
            <select name="paquete" required>
                <option value="Cancún - 5 días">Cancún - 5 días ($500)</option>
                <option value="París - 7 días">París - 7 días ($1200)</option>
                <option value="Tokio - 10 días">Tokio - 10 días ($2500)</option>
            </select>
            <button type="submit">Agregar al Carrito</button>
        </form>

        <h3>Carrito Actual</h3>
        <ul>
            <?php
            if (!empty($_SESSION['carrito'])) {
                foreach ($_SESSION['carrito'] as $item) {
                    echo "<li>$item</li>";
                }
            } else {
                echo "<p>El carrito está vacío.</p>";
            }
            ?>
        </ul>

        <a href="finalizar_compra.php">Finalizar Compra</a>
    </div>

    <!-- Footer con opción de iniciar sesión o cerrar sesión -->
    <footer class="footer" style="background-color: black; color: white; padding: 10px;">
        <div class="login-status">
            <?php if (!isset($_SESSION['usuario'])): ?>
                <a href="admin_login.php" style="color: white;">Iniciar sesión como Administrador</a>
            <?php else: ?>
                <a href="?logout=true" style="color: white;">Cerrar sesión</a>
            <?php endif; ?>
        </div>
    </footer>

</body>

<?php
if (isset($_SESSION['mensaje'])) {
    echo "<div class='notification success'>" . $_SESSION['mensaje'] . "</div>";
    unset($_SESSION['mensaje']);
}
?>

</html>
