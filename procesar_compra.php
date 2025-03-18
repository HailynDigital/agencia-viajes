<?php
session_start();

// Simulación de procesamiento de pago...
sleep(2);

$_SESSION['carrito'] = [];
session_destroy();

header("Location: index.php?mensaje=compra_exitosa");
exit();
?>
