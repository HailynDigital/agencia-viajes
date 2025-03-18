<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cliente_id = $_POST['cliente_id']; // ID del cliente
    $vuelo_id = $_POST['vuelo']; // ID del vuelo
    $hotel_id = $_POST['hotel']; // ID del hotel
    $fecha_reserva = date('Y-m-d');

    // Insertar reserva
    $stmt = $conn->prepare("INSERT INTO RESERVA (id_cliente, fecha_reserva, id_vuelo, id_hotel) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("isii", $cliente_id, $fecha_reserva, $vuelo_id, $hotel_id);
    $stmt->execute();
    $stmt->close();

    // Actualizar la disponibilidad
    $conn->query("UPDATE VUELO SET plazas_disponibles = plazas_disponibles - 1 WHERE id_vuelo = $vuelo_id");
    $conn->query("UPDATE HOTEL SET habitaciones_disponibles = habitaciones_disponibles - 1 WHERE id_hotel = $hotel_id");

    echo "Reserva realizada con éxito.";
}
?>
