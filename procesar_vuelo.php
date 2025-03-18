<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibir datos del formulario
    $origen = $_POST['origen'];
    $destino = $_POST['destino'];
    $fecha = $_POST['fecha'];
    $plazas = $_POST['plazas'];
    $precio = $_POST['precio'];

    // Insertar en la tabla VUELO
    $stmt = $conn->prepare("INSERT INTO VUELO (origen, destino, fecha, plazas_disponibles, precio) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssis", $origen, $destino, $fecha, $plazas, $precio);
    $stmt->execute();

    echo "Vuelo agregado exitosamente.";
    $stmt->close();
}
?>
