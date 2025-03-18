<?php 
session_start();
include 'notificaciones.php'; 
include 'conexion.php'; // Incluimos la conexión

// Verificar si el usuario ha iniciado sesión como administrador
if (!isset($_SESSION['usuario']) || $_SESSION['usuario'] !== 'admin') {
    // Si no está logueado como administrador, redirigir a la página principal
    header("Location: index.php");
    exit();
}

// Cerrar sesión si el enlace de logout es activado
if (isset($_GET['logout']) && $_GET['logout'] === 'true') {
    session_destroy();
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador - Agencia de Viajes</title>
    <link rel="stylesheet" href="../agencia_viajes/css/styles.css">
</head>
<body>

    <header>
        <h1>Panel de Administración</h1>
        <p>Gestiona los vuelos y hoteles de la agencia</p>
    </header>

    <!-- Opción de Cerrar Sesión en el Panel de Administración -->
    <div class="admin-logout">
        <a href="?logout=true">Cerrar sesión</a>
    </div>

    <h2>Agregar Vuelo</h2>
    <form action="procesar_vuelo.php" method="POST">
        <label for="origen">Origen:</label>
        <input type="text" name="origen" required>

        <label for="destino">Destino:</label>
        <input type="text" name="destino" required>

        <label for="fecha">Fecha:</label>
        <input type="date" name="fecha" required>

        <label for="plazas">Plazas Disponibles:</label>
        <input type="number" name="plazas" required>

        <label for="precio">Precio:</label>
        <input type="number" step="0.01" name="precio" required>

        <button type="submit">Agregar Vuelo</button>
    </form>

    <h2>Agregar Hotel</h2>
    <form action="procesar_hotel.php" method="POST">
        <label for="nombre">Nombre del Hotel:</label>
        <input type="text" name="nombre" required>

        <label for="ubicacion">Ubicación:</label>
        <input type="text" name="ubicacion" required>

        <label for="habitaciones">Habitaciones Disponibles:</label>
        <input type="number" name="habitaciones" required>

        <label for="tarifa">Tarifa por Noche:</label>
        <input type="number" step="0.01" name="tarifa" required>

        <button type="submit">Agregar Hotel</button>
    </form>

</body>

<?php
// Mostrar mensajes de éxito o error si existen
if (isset($_SESSION['mensaje'])) {
    echo "<div class='notification success'>" . $_SESSION['mensaje'] . "</div>";
    unset($_SESSION['mensaje']);
}
?>

</html>
