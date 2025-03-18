<?php
include 'conexion.php';

$sql = "SELECT h.nombre, COUNT(r.id_reserva) AS total_reservas
        FROM reserva r
        JOIN hotel h ON r.id_hotel = h.id_hotel
        GROUP BY h.nombre
        HAVING total_reservas > 2";

$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hoteles con Más de 2 Reservas</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>

<header>
    <h1>Hoteles con Más de 2 Reservas</h1>
</header>

<div class="admin-section">
    <?php
    if ($result->num_rows > 0) {
        echo "<table border='1' class='hotel-table'>";
        echo "<tr><th>Hotel</th><th>Total Reservas</th></tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['nombre']}</td>
                    <td>{$row['total_reservas']}</td>
                  </tr>";
        }

        echo "</table>";
    } else {
        echo "<p>No hay hoteles con más de 2 reservas.</p>";
    }

    $conn->close();
    ?>
</div>

</body>
</html>
