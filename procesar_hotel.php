<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibir datos del formulario
    $nombre = $_POST['nombre'];
    $ubicacion = $_POST['ubicacion'];
    $habitaciones = $_POST['habitaciones'];
    $tarifa = $_POST['tarifa'];

    // Insertar en la tabla HOTEL
    $stmt = $conn->prepare("INSERT INTO HOTEL (nombre, ubicación, habitaciones_disponibles, tarifa_noche) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssis", $nombre, $ubicacion, $habitaciones, $tarifa);
    $stmt->execute();

    echo "Hotel agregado exitosamente.";
    $stmt->close();
}
?>
