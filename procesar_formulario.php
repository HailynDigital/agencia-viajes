<?php
include 'FiltroViajes.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $hotel = $_POST['hotel'];
    $ciudad = $_POST['ciudad'];
    $pais = $_POST['pais'];
    $fecha = $_POST['fecha'];
    $duracion = $_POST['duracion'];

    $viaje = new FiltroViajes($hotel, $ciudad, $pais, $fecha, $duracion);
    
    $_SESSION['resultado'] = $viaje->mostrarDetalles();
    header("Location: confirmacion.php");
    exit();
}
?>
