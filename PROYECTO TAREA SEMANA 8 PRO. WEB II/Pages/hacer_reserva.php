<?php
include '../Includes/db_conexion.php';

// Obtener la lista de clientes
$stmt = $pdo->query("SELECT id_cliente, nombre FROM cliente");
$clientes = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Comprobamos si hay clientes
if (empty($clientes)) {
    echo "<script>alert('No hay clientes disponibles.');</script>";
}

// Obtener la lista de vuelos disponibles
$stmt = $pdo->query("SELECT id_vuelo, destino FROM vuelo");
$vuelos = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Obtener la lista de hoteles disponibles
$stmt = $pdo->query("SELECT id_hotel, nombre FROM hotel");
$hoteles = $stmt->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $cliente = filter_var($_POST['cliente'], FILTER_VALIDATE_INT);
    $vuelo_id = filter_var($_POST['vuelo_id'], FILTER_VALIDATE_INT);
    $hotel_id = filter_var($_POST['hotel_id'], FILTER_VALIDATE_INT);

    if (!$cliente || !$vuelo_id || !$hotel_id) {
        echo "<script>alert('Datos inválidos. Verifique e intente de nuevo.');</script>";
    } else {
        // Verificar si el cliente existe
        $stmt = $pdo->prepare("SELECT COUNT(*) FROM cliente WHERE id_cliente = ?");
        $stmt->execute([$cliente]);
        $clienteExiste = $stmt->fetchColumn();

        // Verificar si el vuelo existe
        $stmt = $pdo->prepare("SELECT COUNT(*) FROM vuelo WHERE id_vuelo = ?");
        $stmt->execute([$vuelo_id]);
        $vueloExiste = $stmt->fetchColumn();

        // Verificar si el hotel existe
        $stmt = $pdo->prepare("SELECT COUNT(*) FROM hotel WHERE id_hotel = ?");
        $stmt->execute([$hotel_id]);
        $hotelExiste = $stmt->fetchColumn();

        if ($clienteExiste && $vueloExiste && $hotelExiste) {
            // Insertar la reserva manualmente
            $stmt = $pdo->prepare("INSERT INTO reserva (id_cliente, id_vuelo, id_hotel, fecha_reserva) VALUES (?, ?, ?, NOW())");

            if ($stmt->execute([$cliente, $vuelo_id, $hotel_id])) {
                header("Location: hacer_reserva.php?mensaje=Reserva%20realizada%20con%20éxito");
                exit();
            } else {
                echo "<script>alert('Error al realizar la reserva. Inténtelo de nuevo.');</script>";
            }
        } else {
            echo "<script>alert('Cliente, Vuelo o Hotel no encontrados en la base de datos.');</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hacer Reserva</title>
    <!-- Enlace a Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <link rel="stylesheet" href="../Assets/style.css">
</head>

<body>

    <div class="container mt-5">
        <h2 class="text-center">Hacer Reserva</h2>


        <form method="POST">
            <div class="form-group">
                <label for="cliente">Cliente:</label>
                <select name="cliente" class="form-control" required>
                    <option value="">Seleccione un cliente</option>
                    <?php if (!empty($clientes)): ?>
                        <?php foreach ($clientes as $cliente): ?>
                            <option value="<?= $cliente['id_cliente'] ?>"><?= htmlspecialchars($cliente['nombre']) ?></option>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <option value="">No hay clientes disponibles</option>
                    <?php endif; ?>
                </select>
            </div>

            <div class="form-group">
                <label for="vuelo_id">Vuelo:</label>
                <select name="vuelo_id" class="form-control" required>
                    <option value="">Seleccione un vuelo</option>
                    <?php foreach ($vuelos as $vuelo): ?>
                        <option value="<?= $vuelo['id_vuelo'] ?>"><?= htmlspecialchars($vuelo['destino']) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label for="hotel_id">Hotel:</label>
                <select name="hotel_id" class="form-control" required>
                    <option value="">Seleccione un hotel</option>
                    <?php foreach ($hoteles as $hotel): ?>
                        <option value="<?= $hotel['id_hotel'] ?>"><?= htmlspecialchars($hotel['nombre']) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <button type="submit" class="btn btn-primary btn-block">Hacer Reserva</button>
        </form>

        <!-- Botón para volver al archivo index.php -->
        <div class="text-center mt-4">
            <button class="btn btn-secondary" onclick="window.location.href='../index.php';">Volver al Inicio</button>
        </div>
    </div>

    <?php if (isset($_GET['mensaje'])): ?>
        <script>
            alert("<?= htmlspecialchars($_GET['mensaje']) ?>");
        </script>
    <?php endif; ?>

    <!-- Scripts de Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>