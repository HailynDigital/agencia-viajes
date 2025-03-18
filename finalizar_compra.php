<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Finalizar Compra</title>
    <link rel="stylesheet" href="../agencia_viajes/css/styles.css">
</head>
<body>

    <h1>Resumen de tu compra</h1>
    <ul>
        <?php
        if (!empty($_SESSION['carrito'])) {
            foreach ($_SESSION['carrito'] as $item) {
                echo "<li>$item</li>";
            }
        } else {
            echo "<p>No tienes productos en el carrito.</p>";
        }
        ?>
    </ul>

    <form action="procesar_compra.php" method="POST">
        <button type="submit">Confirmar Compra</button>
    </form>

</body>
</html>
