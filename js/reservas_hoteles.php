<?php
include 'conexion.php';

// Realizar la consulta para contar las reservas por hotel
$query = "
    SELECT h.nombre, COUNT(r.id_reserva) AS num_reservas
    FROM HOTEL h
    LEFT JOIN RESERVA r ON h.id_hotel = r.id_hotel
    GROUP BY h.id_hotel
    HAVING num_reservas > 2
";

$result = $conn->query($query);

echo "<h2>Hoteles con más de dos reservas</h2>";
echo "<table><tr><th>Hotel</th><th>Reservas</th></tr>";

while ($row = $result->fetch_assoc()) {
    echo "<tr><td>" . $row['nombre'] . "</td><td>" . $row['num_reservas'] . "</td></tr>";
}

echo "</table>";

// Cerrar la conexión a la base de datos
$conn->close();
?>
