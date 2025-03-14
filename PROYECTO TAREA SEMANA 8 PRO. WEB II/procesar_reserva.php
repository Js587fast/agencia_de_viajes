<?php
include '../Includes/db_conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtener los datos del formulario
    $id_vuelo = $_POST['id_vuelo'];
    $id_hotel = $_POST['id_hotel'];
    $cliente = trim($_POST['cliente']);
    $fecha_reserva = $_POST['fecha_reserva'];

    // Validaciones
    if (empty($id_vuelo) || empty($id_hotel) || empty($cliente) || empty($fecha_reserva)) {
        echo "<script>alert('Todos los campos son obligatorios.'); window.location.href='hacer_reserva.php';</script>";
        exit;
    }

    // Preparar la consulta para insertar la reserva
    $stmt = $pdo->prepare("INSERT INTO RESERVA (id_vuelo, id_hotel, cliente, fecha_reserva) VALUES (?, ?, ?, ?)");
    $stmt->execute([$id_vuelo, $id_hotel, $cliente, $fecha_reserva]);

    // Redireccionar con mensaje de éxito
    echo "<script>alert('Reserva realizada con éxito'); window.location.href='hacer_reserva.php';</script>";
}
