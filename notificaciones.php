<?php
$ofertas = ["10% de descuento en vuelos a Europa", "Oferta especial en hoteles de Cancún", "2x1 en paquetes turísticos a Brasil"];
$mensaje = $ofertas[array_rand($ofertas)];
echo "<script>alert('Oferta Especial: $mensaje');</script>";
?>
