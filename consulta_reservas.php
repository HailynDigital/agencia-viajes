<?php
include 'conexion.php';

$sql = "SELECT h.nombre, COUNT(r.id_reserva) AS total_reservas
        FROM HOTEL h
        JOIN RESERVA r ON h.id_hotel = r.id_hotel
        GROUP BY h.id_hotel
        HAVING COUNT(r.id_reserva) > 2";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Hoteles con más de 2 Reservas</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h2>Hoteles con más de 2 reservas</h2>
    <table border="1">
        <tr>
            <th>Hotel</th>
            <th>Total de Reservas</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $row["nombre"]; ?></td>
                <td><?php echo $row["total_reservas"]; ?></td>
            </tr>
        <?php } ?>
    </table>
</div>

</body>
</html>
<?php $conn->close(); ?>
