<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Hotel</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h2>Agregar Nuevo Hotel</h2>
    <form action="procesar_hotel.php" method="POST">
        <label>Nombre:</label>
        <input type="text" name="nombre" required>
        
        <label>Ubicación:</label>
        <input type="text" name="ubicacion" required>
        
        <label>Habitaciones Disponibles:</label>
        <input type="number" name="habitaciones_disponibles" required>
        
        <label>Tarifa por Noche:</label>
        <input type="number" step="0.01" name="tarifa_noche" required>
        
        <button type="submit">Guardar Hotel</button>
    </form>
</div>

</body>
</html>
