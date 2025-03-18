<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $paquete = $_POST['paquete'];

    if (!isset($_SESSION['carrito'])) {
        $_SESSION['carrito'] = [];
    }

    $_SESSION['carrito'][] = $paquete;
}

header("Location: index.php");
exit();
?>
