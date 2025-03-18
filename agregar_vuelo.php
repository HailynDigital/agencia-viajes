<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Vuelo</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h2>Agregar Nuevo Vuelo</h2>
    <form action="procesar_vuelo.php" method="POST">
        <label>Origen:</label>
        <input type="text" name="origen" required>
        
        <label>Destino:</label>
        <input type="text" name="destino" required>
        
        <label>Fecha:</label>
        <input type="date" name="fecha" required>
        
        <label>Plazas Disponibles:</label>
        <input type="number" name="plazas_disponibles" required>
        
        <label>Precio:</label>
        <input type="number" step="0.01" name="precio" required>
        
        <button type="submit">Guardar Vuelo</button>
    </form>
</div>

</body>
</html>
