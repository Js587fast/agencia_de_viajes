<?php
include '../Includes/db_conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $origen = $_POST['origen'];
    $destino = $_POST['destino'];
    $fecha = $_POST['fecha'];
    $plazas_disponibles = $_POST['plazas_disponibles'];
    $precio = $_POST['precio'];

    $stmt = $pdo->prepare("INSERT INTO VUELO (origen, destino, fecha, plazas_disponibles, precio) VALUES (?, ?, ?, ?, ?)");
    if ($stmt->execute([$origen, $destino, $fecha, $plazas_disponibles, $precio])) {
        echo "<script>alert('Vuelo registrado con éxito'); window.location.href='registro_vuelo.php';</script>";
    } else {
        echo "<script>alert('Error al registrar el vuelo');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Vuelo</title>
    <!-- Enlace a Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <link rel="stylesheet" href="../Assets/style.css">
</head>

<body>

    <div class="container mt-5">
        <h2 class="text-center">Registrar Vuelo</h2>


        <form method="POST">
            <div class="form-group">
                <label for="origen">Origen:</label>
                <input type="text" class="form-control" id="origen" name="origen" required>
            </div>
            <div class="form-group">
                <label for="destino">Destino:</label>
                <input type="text" class="form-control" id="destino" name="destino" required>
            </div>
            <div class="form-group">
                <label for="fecha">Fecha:</label>
                <input type="date" class="form-control" id="fecha" name="fecha" required>
            </div>
            <div class="form-group">
                <label for="plazas_disponibles">Plazas Disponibles:</label>
                <input type="number" class="form-control" id="plazas_disponibles" name="plazas_disponibles" required>
            </div>
            <div class="form-group">
                <label for="precio">Precio:</label>
                <input type="number" class="form-control" id="precio" name="precio" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Registrar Vuelo</button>
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