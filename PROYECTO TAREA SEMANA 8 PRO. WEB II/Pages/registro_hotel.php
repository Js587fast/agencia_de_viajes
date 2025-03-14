<?php
include '../Includes/db_conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $ubicacion = $_POST['ubicacion'];
    $habitaciones_disponibles = $_POST['habitaciones_disponibles'];
    $tarifa_noche = $_POST['tarifa_noche'];

    $stmt = $pdo->prepare("INSERT INTO HOTEL (nombre, ubicacion, habitaciones_disponibles, tarifa_noche) VALUES (?, ?, ?, ?)");
    if ($stmt->execute([$nombre, $ubicacion, $habitaciones_disponibles, $tarifa_noche])) {
        echo "<script>alert('Hotel registrado con éxito'); window.location.href='registro_hotel.php';</script>";
    } else {
        echo "<script>alert('Error al registrar el hotel');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Hotel</title>
    <!-- Enlace a Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <link rel="stylesheet" href="../Assets/style.css">
</head>

<body>

    <div class="container mt-5">
        <h2 class="text-center">Registrar Hotel</h2>


        <form method="POST">
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>
            <div class="form-group">
                <label for="ubicacion">Ubicación:</label>
                <input type="text" class="form-control" id="ubicacion" name="ubicacion" required>
            </div>
            <div class="form-group">
                <label for="habitaciones_disponibles">Habitaciones Disponibles:</label>
                <input type="number" class="form-control" id="habitaciones_disponibles" name="habitaciones_disponibles" required>
            </div>
            <div class="form-group">
                <label for="tarifa_noche">Tarifa por Noche:</label>
                <input type="number" class="form-control" id="tarifa_noche" name="tarifa_noche" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Registrar Hotel</button>
        </form>

        <!-- Botón para volver al archivo index.php -->
        <div class="text-center mt-4">
            <button class="btn btn-secondary" onclick="window.location.href='../index.php';">Volver al Inicio</button>
        </div>
    </div>

    <!-- Scripts de Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>