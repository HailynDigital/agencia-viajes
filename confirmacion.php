<?php
session_start();
if (!isset($_SESSION['resultado'])) {
    header("Location: index.php");
    exit();
}

$resultado = $_SESSION['resultado'];
session_destroy();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Confirmación de Reserva</title>
    <link rel="stylesheet" href="../agencia_viajes/css/styles.css">
</head>
<body>
    <h2>¡Reserva Exitosa!</h2>
    <p>Tu viaje ha sido reservado con éxito.</p>
    <div class="resultado">
        <?php echo $resultado; ?>
    </div>
    <a href="index.php">Volver al inicio</a>
</body>
</html>
